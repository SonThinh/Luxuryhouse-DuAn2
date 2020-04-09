<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AddCityRequest;
use App\Http\Requests\AreaRequest;
use App\Http\Requests\EditCityRequest;
use App\Model\City;
use App\Http\Controllers\Controller;
use App\Model\District;
use Illuminate\Http\Request;

class CityController extends Controller
{
    public function showDashboard()
    {
        return view('admin.pages.admin_dashboard_city');
    }

    public function showCities()
    {
        $data['citiesList'] = City::paginate(10);
        return view('admin.pages.admin_cities', $data);
    }

    public function showViewAddCities()
    {
        return view('admin.pages.city.add_city');
    }

    public function showViewEditCities($id)
    {
        $data['city'] = City::find($id);
        return view('admin.pages.city.edit_city', $data);
    }

    public function postAddCities(AddCityRequest $request)
    {
        $image = $request->file('image_city');
        $file_name = $request->city_name . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads'), $file_name);
        $data = [
            'image_name' => $file_name,
            'image_path' => 'uploads/' . $file_name
        ];
        $cities = new City;
        $cities->name = $request->city_name;
        $cities->image = json_encode($data);
        $cities->description = $request->city_description;
        $cities->save();
        return back()->withInput()->with('success', 'Thêm khu vực, thành phố thành công!');
    }

    public function postEditCities(EditCityRequest $request, $id)
    {
        $cities = City::find($id);
        $cities->name = $request->city_name;
        $cities->description = $request->city_description;
        if ($request->image_city) {
            $image = $request->file('image_city');
            $file_name = $request->city_name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $file_name);
            $data = [
                'image_name' => $file_name,
                'image_path' => 'uploads/' . $file_name
            ];
            $cities->image = json_encode($data);
        }
        $cities->save();
        return back()->withInput()->with('success', 'Sửa khu vực, thành phố thành công!');
    }

    public function deleteCity($id)
    {
        City::destroy($id);
        return back();
    }

    public function showAreas()
    {
        $data['areaList'] = District::paginate(10);
        return view('admin.pages.admin_district', $data);
    }

    public function showViewAddAreas()
    {
        $data['cities'] = City::all();
        return view('admin.pages.city.add_area', $data);
    }

    public function addAreas(AreaRequest $request)
    {
        $areas = new District();
        $areas->name = $request->area_name;
        $areas->city_id = $request->city_name;
        $areas->save();
        return back()->withInput()->with('success', 'Thêm khu vực thành công!');
    }

    public function showViewEditAreas($id)
    {
        $data['areas'] = District::find($id);
        $data['cities'] = City::all();
        return view('admin.pages.city.edit_area', $data);
    }
    public function editAreas(AreaRequest $request, $id)
    {
        $areas = District::find($id);
        $areas->name = $request->area_name;
        $areas->city_id = $request->city_name;
        $areas->save();
        return back()->withInput()->with('success', 'Sửa khu vực thành công!');
    }
    public function deleteAreas($id)
    {
        District::destroy($id);
        return back();
    }
}
