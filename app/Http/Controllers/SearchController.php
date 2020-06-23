<?php

namespace App\Http\Controllers;

use App\House;
use App\Model\Bill;
use App\Model\City;
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
        $bills = Bill::query()->where('check_in', '!=', $c['check_in'])->get();
        dd($bills);

        if ($request->location != '') {
            $data['cities'] = City::query()->where('name', 'like', '%' . $request->location . '%')->get();
            $data['houses'] = House::query()->where('name', 'like', '%' . $request->location . '%')->paginate(12);

            foreach ($data['cities'] as $city) {
                if ($city->name === $request->location) {
                    $data['houses'] = House::query()
                        ->where('status', 1)
                        ->where('city_id', $city->id)
                        ->where('h_status', 0)
                        ->where('max_guest', '>=', (int)$request->n_person)->paginate(12);
                }
            }
        } else {
            $data['houses'] = House::query()
                ->where('houses.status', 1)
                ->where('houses.h_status', 0)
                ->where('houses.max_guest', '>=', (int)$request->n_person)->paginate(12);

        }
        if (date_format(now(), 'l') == 'Friday' ||
            date_format(now(), 'l') == 'Saturday' ||
            date_format(now(), 'l') == 'Sunday') {
            $data['max_price'] = $data['houses']->get()->max('price_f_to_s');
        } else {
            $data['max_price'] = $data['houses']->get()->max('price_m_to_t');
        }
        dd($data['houses']->get()->max('price_f_to_s'));
        $data['checkin'] = $request->check_in;
        $data['location'] = $request->location;
        $data['checkout'] = $request->check_out;
        $data['n_person'] = $request->n_person;
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $data['districts'] = District::with(['city'])->get();

        return view('pages.search', $data);
    }

    public function searchHouses(Request $request)
    {
        $data['districts'] = District::all();
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $cities = City::all();
        $data['checkin'] = $request->check_in;
        $data['location'] = $request->location;
        $data['checkout'] = $request->check_out;
        $data['n_person'] = $request->n_person;

        if ($request->location !== null) {
            foreach ($cities as $city) {
                if ($city->name === $request->location) {
                    $h = House::query()
                        ->where('status', 1)
                        ->where('city_id', $city->id);
                    if ($request->district) {
                        $houses = House::query()
                            ->where('status', 1)
                            ->where('city_id', $city->id)
                            ->where('district_id', $request->district);
                    } else {
                        $houses = House::query()
                            ->where('status', 1)
                            ->where('city_id', $city->id);
                    }
                    $data['cities'] = City::query()->where('name', 'like', '%' . $request->location . '%')->get();
                }
            }
        } else {
            $houses = House::query()
                ->where('status', 1);
        }
        if (date_format(now(), 'l') == 'Friday' || date_format(now(), 'l') == 'Saturday' || date_format(now(), 'l') == 'Sunday') {
            if (isset($h)) {
                $data['max_price'] = $h->get()->max('price_f_to_s');
            } else {
                $data['max_price'] = $houses->get()->max('price_f_to_s');
            }
            if ($request->price_max == $data['max_price']) {
                $house = $houses->where('price_f_to_s', '>=', (int)$request->price_min);
            } elseif ($request->price_min == 0) {
                $house = $houses->where('price_f_to_s', '<=', (int)$request->price_max);
            } else {
                $house = $houses
                    ->where('price_f_to_s', '>=', (int)$request->price_min)
                    ->where('price_f_to_s', '<=', (int)$request->price_max);
            }
        } else {
            if (isset($h)) {
                $data['max_price'] = $h->get()->max('price_m_to_t');
            } else {
                $data['max_price'] = $houses->get()->max('price_m_to_t');
            }
            if ($request->price_max == $data['max_price']) {
                $house = $houses->where('price_m_to_t', '>=', (int)$request->price_min);
            } elseif ($request->price_min == 0) {
                $house = $houses->where('price_m_to_t', '<=', (int)$request->price_max);
            } else {
                $house = $houses
                    ->where('price_m_to_t', '>=', (int)$request->price_min)
                    ->where('price_m_to_t', '<=', (int)$request->price_max);
            }
        }

        if ($request->district && $request->house_type && $request->trip_type) {
            $data['houses'] = $house->where('district_id', $request->district)->where('types', $request->house_type)->where('trip_type', $request->trip_type)->paginate(12);
        } else if ($request->district && $request->house_type) {
            $data['houses'] = $house->where('district_id', $request->district)->where('types', $request->house_type)->paginate(12);
        } else if ($request->district && $request->trip_type) {
            $data['houses'] = $house->where('district_id', $request->district)->where('trip_type', $request->trip_type)->paginate(12);
        } else if ($request->house_type && $request->trip_type) {
            $data['houses'] = $house->where('trip_type', $request->trip_type)->where('types', $request->house_type)->paginate(12);
        } else if ($request->district) {
            $data['houses'] = $house->where('district_id', $request->district)->paginate(12);
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
