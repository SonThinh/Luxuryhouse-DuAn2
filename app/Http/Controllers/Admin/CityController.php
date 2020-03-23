<?php

namespace App\Http\Controllers\Admin;

use App\Model\City;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CityController extends Controller
{
    public function showCities(){
        $data['citiesList'] = City::paginate(1);
        return view('admin.pages.admin_cities',$data);
    }
    public function addCities(){
        return view('admin.pages.city.add_city');
    }
    public function postAddCities(Request $request){
        dd($request->all());
    }
}
