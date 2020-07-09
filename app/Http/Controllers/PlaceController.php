<?php

namespace App\Http\Controllers;

use App\Host;
use App\House;
use App\Model\Bill;
use App\Model\City;
use App\Model\Comment;
use App\Model\District;
use App\Model\Trip;
use App\Model\Type;
use App\Model\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class PlaceController extends Controller
{
    public function viewCityDetail($id)
    {
        $data['city'] = City::find($id);
        $data['districts'] = District::with(['city'])->get();
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $houses = House::query()->where('city_id', $id)->where('status', 1)->where('h_status', 1);
        $data['houseList'] = $houses->paginate(12);
        $data['max_price'] = $houses->get()->max('price');
        $data['comments'] = Comment::all();

        return view('pages.place_detail', $data);
    }

    public function viewHouseDetail($id)
    {
        $data['house'] = House::find($id);
        $data['city'] = City::find($data['house']->city->id);
        $data['districts'] = District::with(['city'])->get();
        $data['types'] = Type::all();
        $data['utilities'] = Utility::all();
        $data['host'] = Host::with(['user'])->find($data['house']->host->id);
        $data['bills'] = Bill::query()->where('h_id', $id)->get();
        $data['houses_hint'] = House::query()->where('id', '!=', $data['house']->id)->where('city_id', $data['city']->id)->where('status', 1)->where('h_status', 1)->take(4)->get();
        $data['houses_same'] = House::query()->where('id', '!=', $data['house']->id)->where('status', 1)->where('h_status', 1)->where('host_id', $data['house']->host_id)->take(4)->get();
        $data['comments'] = Comment::query()->where('h_id', $id)->paginate(6);
        $data['comments_list'] = Comment::all();

        return view('house.house_detail', $data);
    }

    public function searchHousesWithCityID(Request $request, $id)
    {
        $data['city'] = City::find($id);
        $data['districts'] = District::with(['city'])->get();
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $h = House::query()
            ->where('status', 1)
            ->where('h_status', 1)
            ->where('city_id', $id);
        $data['max_price'] = $h->get()->max('price');
        if ($request->district !== null) {
            $houses = $h->where('district_id', $request->district);
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
            $listHouse = $house->where('trip_type', $request->trip_type)
                ->where('types', $request->house_type);
        } else if ($request->house_type) {
            $listHouse = $house->where('types', $request->house_type);
        } else if ($request->trip_type) {
            $listHouse = $house->where('trip_type', $request->trip_type);
        } else {
            $listHouse = $house;
        }
        $data['houseList'] = $listHouse->paginate(12)->appends(request()->except('page'));
        return view('pages.place_detail', $data);
    }

}
