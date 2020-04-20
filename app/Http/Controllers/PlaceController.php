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
        $data['houseList'] = House::query()->where('city_id', $id)->paginate(1);
        return view('pages.place_detail', $data);
    }

    public function viewHouseDetail($id)
    {
        $data['house'] = House::find($id);
        $data['cities'] = City::all();
        $data['districts'] = District::with(['city'])->get();
        $data['types'] = Type::all();
        $data['utilities'] = Utility::all();
        $data['host'] = Host::with(['user'])->get();
        $data['bills'] = Bill::query()->where('h_id',$id)->get();
        return view('house.house_detail',$data);
    }
}
