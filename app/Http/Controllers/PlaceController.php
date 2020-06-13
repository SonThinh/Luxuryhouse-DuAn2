<?php

namespace App\Http\Controllers;

use App\Host;
use App\House;
use App\Model\Bill;
use App\Model\City;
use App\Model\District;
use App\Model\Trip;
use App\Model\Type;
use App\Model\Utility;
use Illuminate\Http\Request;

class PlaceController extends Controller
{
    public function viewCityDetail($id)
    {
        $data['city'] = City::find($id);
        $data['districts'] = District::all();
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $houses = House::query()->where('city_id', $id)->where('status', 1);
        $data['houseList'] = $houses->paginate(12);
        if (date_format(now(), 'l') == 'Friday' ||
            date_format(now(), 'l') == 'Saturday' ||
            date_format(now(), 'l') == 'Sunday') {
            $data['max_price'] = $houses->max('price_f_to_s');
        } else {
            $data['max_price'] = $houses->max('price_m_to_t');
        }
        return view('pages.place_detail', $data);
    }

    public function viewHouseDetail($id)
    {
        $data['house'] = House::find($id);
        $data['city'] = City::find($data['house']->city->id);
        $data['districts'] = District::with(['city'])->get();
        $data['types'] = Type::all();
        $data['utilities'] = Utility::all();
        $data['hosts'] = Host::with(['user'])->get();
        $data['bills'] = Bill::query()->where('h_id', $id)->get();
        $data['houses_hint'] = House::query()->where('id', '!=', $data['house']->id)->where('city_id',$data['city']->id)->get();
        return view('house.house_detail', $data);
    }

    public function searchHousesWithCityID(Request $request, $id)
    {
        $data['city'] = City::find($id);
        $data['districts'] = District::all();
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $h = House::query()
            ->where('status', 1)
            ->where('city_id', $id);
        if ($request->district !== null) {
            $houses = House::query()
                ->where('status', 1)
                ->where('city_id', $id)
                ->where('district_id', $request->district);
        } else {
            $houses = House::query()
                ->where('status', 1)
                ->where('city_id', $id);
        }
        if (date_format(now(), 'l') == 'Friday' || date_format(now(), 'l') == 'Saturday' || date_format(now(), 'l') == 'Sunday') {
            $data['max_price'] = $h->max('price_f_to_s');
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
            $data['max_price'] = $h->max('price_m_to_t');
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

        if ($request->district) {
            $data['houseList'] = $house->where('district_id', $request->district)->paginate(12);
        } else if ($request->house_type) {
            $data['houseList'] = $house->where('types', $request->house_type)->paginate(12);
        } else if ($request->trip_type) {
            $data['houseList'] = $house->where('trip_type', $request->trip_type)->paginate(12);
        } else {
            $data['houseList'] = $house->paginate(12);
        }
        return view('pages.place_detail', $data);
    }

}
