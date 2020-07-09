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
    public function showViewUtility()
    {
        $data['utilitiesList'] = Utility::all();
        return view('admin.pages.house.utility.utility', $data);
    }

    public function showViewAddUtility()
    {
        return view('admin.pages.house.utility.add_utility');
    }

    public function addUtility(UtilityRequest $request)
    {
        $utility = new Utility();
        $utility->symbol = $request->symbol;
        $utility->icon = $request->icon;
        $utility->key = $request->key;
        $utility->save();
        if ($utility) {
            return response()->json([
                'status' => 'true',
                'message' => 'Thêm tiện ích thành công',
                'url' => route('admin.house.showViewUtility'),
            ]);
        } else
            return response()->json([
                'status' => 'false',
                'message' => 'Thêm dạng nhà thất bại!',
            ]);
    }

    public function showViewEditUtility($id)
    {
        $data['utility'] = Utility::find($id);
        return view('admin.pages.house.utility.edit_utility', $data);
    }

    public function editUtility(UtilityRequest $request, $id)
    {
        $utility = Utility::find($id);
        $utility->symbol = $request->symbol;
        $utility->icon = $request->icon;
        $utility->key = $request->key;
        $utility->save();
        if ($utility) {
            return response()->json([
                'status' => 'true',
                'message' => 'Sửa tiện ích  thành công',
                'url' => route('admin.house.showViewUtility'),
            ]);
        } else
            return response()->json([
                'status' => 'false',
                'message' => 'Sửa dạng nhà thất bại!',
            ]);
    }

    public function deleteUtility($id)
    {
        Utility::destroy($id);
        return back();
    }

    public function showViewType()
    {
        $data['typesList'] = Type::all();
        return view('admin.pages.house.type.house_type', $data);
    }

    public function showViewAddType()
    {
        return view('admin.pages.house.type.add_type');
    }

    public function addType(TypeRequest $request)
    {
        $type = new Type();
        $type->key = $request->key;
        $type->name = $request->name;
        $type->save();
        if ($type) {
            return response()->json([
                'status' => 'true',
                'message' => 'Thêm dạng nhà thành công',
                'url' => route('admin.house.showViewType'),
            ]);
        } else
            return response()->json([
                'status' => 'false',
                'message' => 'Thêm dạng nhà thất bại!',
            ]);
    }

    public function showViewEditType($id)
    {
        $data['type'] = Type::find($id);
        return view('admin.pages.house.type.edit_type', $data);
    }

    public function editType(TypeRequest $request, $id)
    {
        $type = Type::find($id);
        $type->key = $request->key;
        $type->name = $request->name;
        $type->save();
        if ($type) {
            return response()->json([
                'status' => 'true',
                'message' => 'Sửa dạng nhà thành công',
                'url' => route('admin.house.showViewType'),
            ]);
        } else
            return response()->json([
                'status' => 'false',
                'message' => 'Sửa dạng nhà thất bại!',
            ]);
    }

    public function deleteType($id)
    {
        Type::destroy($id);
        return back();
    }

    public function showViewTripType()
    {
        $data['tripTypeList'] = Trip::all();
        return view('admin.pages.house.trip.trip_types', $data);
    }

    public function showViewAddTripType()
    {
        return view('admin.pages.house.trip.add_trip_type');
    }

    public function addTripType(TypeRequest $request)
    {
        $trip = new Trip();
        $trip->key = $request->key;
        $trip->name = $request->name;
        $trip->save();
        if ($trip) {
            return response()->json([
                'status' => 'true',
                'message' => 'Thêm loại chuyến đi thành công',
                'url' => route('admin.house.showViewTripType'),
            ]);
        } else
            return response()->json([
                'status' => 'false',
                'message' => 'Thêm loại chuyến đi thất bại!',
            ]);
    }

    public function showViewEditTripType($id)
    {
        $data['trip'] = Trip::find($id);
        return view('admin.pages.house.trip.edit_trip_type', $data);
    }

    public function editTripType(TypeRequest $request, $id)
    {
        $trip = Trip::find($id);
        $trip->key = $request->key;
        $trip->name = $request->name;
        $trip->save();
        if ($trip) {
            return response()->json([
                'status' => 'true',
                'message' => 'Sửa loại chuyến đi thành công',
                'url' => route('admin.house.showViewTripType'),
            ]);
        } else
            return response()->json([
                'status' => 'false',
                'message' => 'Sửa loại chuyến đi thất bại!',
            ]);
    }

    public function deleteTripType($id)
    {
        Trip::destroy($id);
        return back();
    }

    public function showViewHouses()
    {
        $data['housesList'] = House::all();
        $data['house'] = House::with(['city'])->get();
        $data['district'] = District::with(['city'])->get();
        $data['types'] = Type::all();
        $data['trip_types'] = Trip::all();
        $data['utilities'] = Utility::all();
        return view('admin.pages.house.houses', $data);
    }

    public function deleteHouse($id)
    {
        House::destroy($id);
        return back();
    }

    public function changeStatus(Request $request)
    {
        $house = House::find($request->id);
        $house->status = $request->status;
        $house->save();
        return response()->json(['success' => 'Đổi trạng thái thành công.']);
    }

}
