<?php

namespace App\Http\Controllers\Admin;

use App\Host;
use App\House;
use App\Http\Requests\TypeRequest;
use App\Http\Requests\UtilityRequest;
use App\Model\District;
use App\Model\Trip;
use App\Model\Type;
use App\Model\Utility;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HouseController extends Controller
{
    public function showDashboardHouse()
    {
        return view('admin.pages.admin_dashboard_house');
    }

    public function showViewUtility()
    {
        $data['utilitiesList'] = Utility::paginate(10);
        return view('admin.pages.house.utility', $data);
    }

    public function showViewAddUtility()
    {
        return view('admin.pages.house.add_utility');
    }

    public function addUtility(UtilityRequest $request)
    {
        $utility = new Utility();
        $utility->symbol = $request->symbol;
        $utility->icon = json_encode($request->icon);
        $utility->key = $request->key;
        $utility->save();
        return back()->withInput()->with('success', 'Thêm tiện ích thành công!');
    }

    public function showViewEditUtility($id)
    {
        $data['utility'] = Utility::find($id);
        return view('admin.pages.house.edit_utility', $data);
    }

    public function editUtility(UtilityRequest $request, $id)
    {
        $utility = Utility::find($id);
        $utility->symbol = $request->symbol;
        $utility->icon = json_encode($request->icon);
        $utility->key = $request->key;
        $utility->save();
        return back()->withInput()->with('success', 'Sửa tiện ích thành công!');
    }
    public function deleteUtility($id)
    {
        Utility::destroy($id);
        return back();
    }

    public function showViewType()
    {
        $data['typesList'] = Type::paginate(10);
        return view('admin.pages.house.house_type', $data);
    }

    public function showViewAddType()
    {
        return view('admin.pages.house.add_type');
    }

    public function addType(TypeRequest $request)
    {
        $type = new Type();
        $type->key = $request->key;
        $type->name =$request->name;
        $type->save();
        return back()->withInput()->with('success', 'Thêm dạng nhà thành công!');
    }
    public function showViewEditType($id){
        $data['type'] = Type::find($id);
        return view('admin.pages.house.edit_type', $data);
    }
    public function editType(TypeRequest $request,$id){
        $type = Type::find($id);
        $type->key = $request->key;
        $type->name =$request->name;
        $type->save();
        return back()->withInput()->with('success', 'Sửa dạng nhà thành công!');
    }
    public function deleteType($id)
    {
        Type::destroy($id);
        return back();
    }

    public function showViewTripType()
    {
        $data['tripTypeList'] = Trip::paginate(10);
        return view('admin.pages.house.trip_types', $data);
    }

    public function showViewAddTripType()
    {
        return view('admin.pages.house.add_trip_type');
    }

    public function addTripType(TypeRequest $request)
    {
        $trip = new Trip();
        $trip->key = $request->key;
        $trip->name =$request->name;
        $trip->save();
        return back()->withInput()->with('success', 'Thêm dạng chuyến đi thành công!');
    }
    public function showViewEditTripType($id){
        $data['trip'] = Trip::find($id);
        return view('admin.pages.house.edit_trip_type', $data);
    }
    public function editTripType(TypeRequest $request,$id){
        $trip = Trip::find($id);
        $trip->key = $request->key;
        $trip->name =$request->name;
        $trip->save();
        return back()->withInput()->with('success', 'Sửa dạng chuyến đi thành công!');
    }
    public function deleteTripType($id)
    {
        Trip::destroy($id);
        return back();
    }

    public function showViewHouses()
    {
        $data['housesList'] = House::paginate(10);
        $data['host'] = Host::with(['user'])->get();
        $data['house'] = House::with(['city'])->get();
        $data['district'] = District::with(['city'])->get();
        $data['types'] = Type::all();
        $data['trip_types'] = Trip::all();
        return view('admin.pages.house.houses', $data);
    }
    public function deleteHouse($id){
        House::destroy($id);
        return back();
    }
    public function changeStatus(Request $request){
        $house = House::find($request->id);
        $house->status = $request->status;
        $house->save();
        return response()->json(['success'=>'Đổi trạng thái thành công.']);
    }

}
