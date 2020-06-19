<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\AreaRequest;
use App\Http\Requests\CitiesRequest;
use App\Model\City;
use App\Http\Controllers\Controller;
use App\Model\District;

class CityController extends Controller
{
    public function showCities()
    {
        $data['citiesList'] = City::all();
        return view('admin.pages.city.admin_cities', $data);
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

    public function postAddCities(CitiesRequest $request)
    {
        if ($request->image_city !== 'undefined') {
            $image = $request->file('image_city');
            $file_name = $request->city_name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/city/' . $request->city_name), $file_name);
            $data = [
                'image_name' => $file_name,
                'image_path' => 'uploads/city/' . $request->city_name . '/' . $file_name
            ];
            $cities = new City;
            $cities->name = $request->city_name;
            $cities->image = json_encode($data);
            $cities->description = $request->city_description;
            $cities->save();
            if ($cities) {
                return response()->json([
                    'status' => 'true',
                    'message' => 'Thêm địa danh thành công',
                    'url' => route('admin.city.showCities'),
                ]);
            } else
                return response()->json([
                    'status' => 'false',
                    'message' => 'Thêm địa danh thất bại!',
                ]);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Chưa chọn ảnh!',
            ]);
        }
    }

    public function postEditCities(CitiesRequest $request, $id)
    {
        $cities = City::find($id);
        $cities->name = $request->city_name;
        $cities->description = $request->city_description;
        if ($request->image_city !== 'undefined') {
            $image = $request->file('image_city');
            $file_name = $request->city_name . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/city/' . $request->city_name), $file_name);
            $data = [
                'image_name' => $file_name,
                'image_path' => 'uploads/city/' . $request->city_name . '/' . $file_name
            ];
            $cities->image = json_encode($data);
        }
        $cities->save();
        if ($cities) {
            return response()->json([
                'status' => 'true',
                'message' => 'Sửa địa danh thành công',
                'url' => route('admin.city.showCities'),
            ]);
        } else
            return response()->json([
                'status' => 'false',
                'message' => 'Sửa địa danh thất bại!',
            ]);
    }

    public function deleteCity($id)
    {
        City::destroy($id);
        return back();
    }

    public function showAreas()
    {
        $data['areaList'] = District::all();
        return view('admin.pages.city.area.admin_area', $data);
    }

    public function showViewAddAreas()
    {
        $data['cities'] = City::all();
        return view('admin.pages.city.area.add_area', $data);
    }

    public function addAreas(AreaRequest $request)
    {
        if ($request->city_name !== 'undefined') {
            $areas = new District();
            $areas->name = $request->area_name;
            $areas->city_id = $request->city_name;
            $areas->save();
            if ($areas) {
                return response()->json([
                    'status' => 'true',
                    'message' => 'Thêm khu vực thành công',
                    'url' => route('admin.city.showAreas'),
                ]);
            } else
                return response()->json([
                    'status' => 'false',
                    'message' => 'Thêm khu vực thất bại!',
                ]);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Chưa chọn thành phố!',
            ]);
        }
    }

    public function showViewEditAreas($id)
    {
        $data['areas'] = District::find($id);
        $data['cities'] = City::all();
        return view('admin.pages.city.area.edit_area', $data);
    }

    public function editAreas(AreaRequest $request, $id)
    {
        $areas = District::find($id);
        $areas->name = $request->area_name;
        $areas->city_id = $request->city_name;
        $areas->save();
        if ($areas) {
            return response()->json([
                'status' => 'true',
                'message' => 'Sửa khu vực thành công',
                'url' => route('admin.city.showAreas'),
            ]);
        } else
            return response()->json([
                'status' => 'false',
                'message' => 'Sửa khu vực thất bại!',
            ]);
    }

    public function deleteAreas($id)
    {
        District::destroy($id);
        return back();
    }
}
