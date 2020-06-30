<?php

namespace App\Http\Controllers;

use App\House;
use App\Model\Bill;
use App\Model\City;
use App\Model\Comment;
use App\Model\District;
use App\Model\Trip;
use App\Model\Type;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function searchView(Request $request)
    {
        $b = explode(" - ", $request->date_search);
        $c = [
            'check_in' => $b[0],
            'check_out' => $b[1]
        ];
        if ($request->location != '') {
            $data['cities'] = City::query()->where('name', 'like', '%' . $request->location . '%')->paginate(12);
            $data['houses'] = House::query()->where('name', 'like', '%' . $request->location . '%')->paginate(12);

            foreach ($data['cities'] as $city) {
                if ($city->name === $request->location) {
                    $data['houses'] = House::query()
                        ->where('status', 1)
                        ->where('city_id', $city->id)
                        ->where('h_status', 1)
                        ->where('max_guest', '>=', (int)$request->n_person)->paginate(12);
                    $h = House::query()
                        ->where('status', 1)
                        ->where('h_status', 1)
                        ->where('city_id', $city->id)->get();
                }
            }
        } else {
            $h = House::query()
                ->where('status', 1)
                ->where('h_status', 1)->get();
            $data['houses'] = House::query()
//                ->select('houses.*', 'bills.*')
//                ->join('bills', 'bills.h_id', '=', 'houses.id')
//                ->where('bills.check_in', '!=', $c['check_in'])
                ->where('houses.status', 1)
                ->where('houses.h_status', 1)
                ->where('houses.max_guest', '>=', (int)$request->n_person)->paginate(12);
        }


        $data['max_price'] = $h->max('price');
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
        $data['max_price'] = $h->max('price');
        if ($request->location !== null) {
            foreach ($cities as $city) {
                if ($city->name === $request->location) {
                    $data['cities'] = City::query()->where('name', 'like', '%' . $request->location . '%')->get();
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
            $house = $houses->where('price', '>=', (int)$request->price_min);
        } elseif ($request->price_min === 0) {
            $house = $houses->where('price', '<=', (int)$request->price_max);
        } else {
            $house = $houses
                ->where('price', '>=', (int)$request->price_min)
                ->where('price', '<=', (int)$request->price_max);
        }

        if ($request->house_type && $request->trip_type) {
            $data['houses'] = $house->where('trip_type', $request->trip_type)->where('types', $request->house_type)->paginate(12);
        } else if ($request->house_type) {
            $data['houses'] = $house->where('types', $request->house_type)->paginate(12);
        } else if ($request->trip_type) {
            $data['houses'] = $house->where('trip_type', $request->trip_type)->paginate(12);
        } else {
            $data['houses'] = $house->paginate(12);
        }
        return view('pages.search', $data);
    }

    public function searchCityByName(Request $request)
    {
        $city = City::query()->where('name', 'like', '%' . $request->value . '%')->get();
        return response()->json($city);
    }

    public function searchHouseByName(Request $request)
    {
        $house = House::query()->where('name', 'like', '%' . $request->value . '%')->get();
        return response()->json($house);
    }
}
