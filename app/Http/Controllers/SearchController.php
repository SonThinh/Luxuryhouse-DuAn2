<?php

namespace App\Http\Controllers;

use App\Model\Bill;
use App\Model\City;
use App\Model\Comment;
use App\Model\District;
use App\Model\House;
use App\Model\Trip;
use App\Model\Type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchView(Request $request)
    {
        $b = explode(" - ", $request->date_search);
        $c = [
            'check_in'  => $b[0],
            'check_out' => $b[1],
        ];
        if ($c['check_in'] === $c['check_out']) {
            $bills = Bill::query()
                         ->select('h_id')
                         ->where('check_in', $c['check_in'])
                         ->groupBy('h_id')
                         ->havingRaw('COUNT(h_id) > 1')
                         ->get();
        } else {
            $bills = Bill::query()
                         ->select('h_id')
                         ->where('check_in', $c['check_in'])
                         ->where('check_out', $c['check_out'])
                         ->groupBy('h_id')
                         ->havingRaw('COUNT(h_id) > 1')
                         ->get();
        }

        $houses = House::query()
                       ->where('status', 1)
                       ->where('h_status', 1);
        if ($request->location != '') {
            $data['cities'] = City::query()
                                  ->where('name', 'like', '%'.$request->location.'%')
                                  ->paginate(12)
                                  ->appends(request()->except('page'));
            $listHouse = House::query()->where('name', 'like', '%'.$request->location.'%');

            foreach ($data['cities'] as $city) {
                if ($city->name === $request->location) {
                    $listHouse = $houses->where('city_id', $city->id)
                                        ->where('max_guest', '>=', (int) $request->n_person);
                }
            }
        } else {
            if (count($bills) !== 0) {
                foreach ($bills as $bill) {
                    $listHouse = $houses->where('max_guest', '>=', (int) $request->n_person)
                                        ->where('houses.id', '!=', $bill->h_id);
                }
            } else {
                $listHouse = $houses->where('max_guest', '>=', (int) $request->n_person);
            }
        }
        $data['houses'] = $listHouse->paginate(12)->appends(request()->except('page'));
        $data['max_price'] = $houses->get()->max('price');
        $data['location'] = $request->location;
        $data['n_person'] = $request->n_person;
        $data['date_search'] = $request->date_search;
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $data['districts'] = District::with(['city'])->get();
        $data['comments'] = Comment::all();

        return view('pages.search', $data);
    }

    public function searchHouses(Request $request)
    {
        $data['districts'] = District::with(['city'])->get();
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $cities = City::all();
        $data['location'] = $request->location;
        $data['n_person'] = $request->n_person;
        $data['date_search'] = $request->date_search;
        $data['comments'] = Comment::all();
        $h = House::query()
                  ->where('status', 1)
                  ->where('h_status', 1);
        $data['max_price'] = $h->get()->max('price');
        if ($request->location !== null) {
            foreach ($cities as $city) {
                if ($city->name === $request->location) {
                    $data['cities'] = City::query()->where('name', 'like', '%'.$request->location.'%')->get();
                    if ($request->district) {
                        $houses = $h
                            ->where('city_id', $city->id)
                            ->where('district_id', $request->district);
                    } else {
                        $houses = $h
                            ->where('city_id', $city->id);
                    }
                }
            }
        } else {
            $houses = $h;
        }

        if ($request->price_max === $data['max_price']) {
            $house = $houses->where('price', '>=', (int) $request->price_min);
        } elseif ($request->price_min === 0) {
            $house = $houses->where('price', '<=', (int) $request->price_max);
        } else {
            $house = $houses
                ->where('price', '>=', (int) $request->price_min)
                ->where('price', '<=', (int) $request->price_max);
        }

        if ($request->house_type && $request->trip_type) {
            $listHouse = $house->where('trip_type', $request->trip_type)->where('types', $request->house_type);
        } else {
            if ($request->house_type) {
                $listHouse = $house->where('types', $request->house_type);
            } else {
                if ($request->trip_type) {
                    $listHouse = $house->where('trip_type', $request->trip_type);
                } else {
                    $listHouse = $house;
                }
            }
        }
        $data['houses'] = $listHouse->paginate(12)->appends(request()->except('page'));

        return view('pages.search', $data);
    }

    public function searchCityByName(Request $request)
    {
        $city = City::query()->where('name', 'like', '%'.$request->value.'%')->get();

        return response()->json($city);
    }

    public function searchHouseByName(Request $request)
    {
        $house = House::query()->where('name', 'like', '%'.$request->value.'%')->get();

        return response()->json($house);
    }
}
