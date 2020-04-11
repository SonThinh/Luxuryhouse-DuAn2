<?php

namespace App\Http\Controllers;

use App\Host;
use App\House;
use App\Http\Requests\HouseEditRequest;
use App\Http\Requests\HouseRequest;
use App\Http\Requests\RegisterHostRequest;
use App\Model\City;
use App\Model\District;
use App\Model\Trip;
use App\Models\User;
use App\Model\Type;
use App\Model\Utility;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HostController extends Controller
{
    public function showViewRegisterHost($id)
    {
        $data['user'] = User::find($id);
        return view('cms.host.register_host', $data);
    }

    public function postRegisterHost(RegisterHostRequest $request, $id)
    {
        foreach ($request->file('imgIdCard') as $image) {
            $file_name = 'ID_Card' . '_' . $request->id_card . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $file_name);
            $id_card [] = [
                'image_name' => $file_name,
                'image_path' => 'uploads/' . $file_name
            ];
        }
        $host = new Host;
        $host->m_id = $id;
        $host->status = 1;
        $host->ID_card = $request->id_card;
        $host->ID_card_image = json_encode($id_card);
        if ($request->business_license) {
            if ($request->hasFile('imgBL')) {
                foreach ($request->file('imgBL') as $image) {
                    $file_name = 'BL' . '_' . $request->business_license . '.' . $image->getClientOriginalExtension();
                    $image->move(public_path('uploads'), $file_name);
                    $business_license [] = [
                        'image_name' => $file_name,
                        'image_path' => 'uploads/' . $file_name
                    ];
                }
            }
            $host->business_license = $request->business_license;
            $host->business_license_image = json_encode($business_license);
        }
        $host->save();
        return back()->withInput()->with('success', 'Đăng ký host thành công!');
    }

    public function ViewDashboard($id)
    {
        $data['host'] = Host::find($id);

        return view('cms.host.dashboard', $data);
    }

    public function viewAddHouse($id)
    {
        $data['host'] = Host::with(['user'])->find($id);
        $data['cities'] = City::all();
        $data['types'] = Type::all();
        $data['utilities'] = Utility::all();
        $data['trips'] = Trip::all();
        return view('cms.host.house.add_house', $data);
    }

    public function selectDistrict(Request $request)
    {
        $areas = District::query()
            ->where('city_id', $request->city_id)
            ->select('id', 'name')
            ->get();
        return response()->json([
            'data' => $areas,
        ]);
    }

    public function postAddHouse(HouseRequest $request)
    {
        foreach ($request->file('house_image') as $image) {
            $file_name = $request->name . rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $file_name);
            $house_image [] = [
                'image_name' => $file_name,
                'image_path' => 'uploads/' . $file_name
            ];
        }
        $address = [
            'house_number' => $request->house_number,
            'city_id' => $request->selectCity,
            'district_id' => $request->selectAreas
        ];
        $room = [
            'number_bed' => $request->n_bed,
            'number_bath' => $request->n_bath,
            'number_room' => $request->n_room,
            'max_guest' => $request->max_guest
        ];
        $price_detail = [
            'Mon_to_Thus' => $request->m_to_t,
            'Fri_to_Sun' => $request->f_to_s,
            'Ex_guest' => $request->extra_guest,
            'max_night' => $request->max_night
        ];
        $house = new House();
        $house->city_id = $request->selectCity;
        $house->host_id = $request->host;
        $house->utilities = json_encode($request->house_utilities);
        $house->types = $request->house_type;
        $house->name = $request->name;
        $house->description = $request->description;
        $house->rules = $request->rules;
        $house->trip_type = $request->trip_type;
        $house->address = json_encode($address);
        $house->room = json_encode($room);
        $house->price_detail = json_encode($price_detail);
        $house->image = json_encode($house_image);
        $house->status = 0;
        $house->h_status = 0;
        $house->save();
        return back()->withInput()->with('success', 'Đăng ký nhà thành công! Đợi duyệt!');
    }

    public function ViewHouse($id)
    {
        $data['housesList'] = House::query()->where('host_id', $id)->where('status', 1)->paginate(10);
        $data['house'] = House::with(['city'])->get();
        $data['district'] = District::with(['city'])->get();
        $data['types'] = Type::all();
        $data['trip_types'] = Trip::all();
        $data['utilities'] = Utility::all();
        return view('cms.host.house', $data);
    }

    public function changeStatus(Request $request)
    {
        $house = House::find($request->id);
        $house->h_status = $request->h_status;
        $house->save();
        return response()->json(['success' => 'Đổi trạng thái thành công.']);
    }

    public function ViewEditHouse($id)
    {
        $data['house'] = House::find($id);
        $data['host'] = Host::with(['user'])->get();
        $data['cities'] = City::all();
        $data['types'] = Type::all();
        $data['utilities'] = Utility::all();
        $data['trips'] = Trip::all();
        $data['districts'] = District::all();
        return view('cms.host.house.edit_house', $data);
    }
    public function editHouse(HouseEditRequest $request,$id){
        $address = [
            'house_number' => $request->house_number,
            'city_id' => $request->selectCity,
            'district_id' => $request->selectAreas
        ];
        $room = [
            'number_bed' => $request->n_bed,
            'number_bath' => $request->n_bath,
            'number_room' => $request->n_room,
            'max_guest' => $request->max_guest
        ];
        $price_detail = [
            'Mon_to_Thus' => $request->m_to_t,
            'Fri_to_Sun' => $request->f_to_s,
            'Ex_guest' => $request->extra_guest,
            'max_night' => $request->max_night
        ];
        $house = House::find($id);
        $house->city_id = $request->selectCity;
        $house->host_id = $request->host;
        $house->utilities = json_encode($request->house_utilities);
        $house->types = $request->house_type;
        $house->name = $request->name;
        $house->description = $request->description;
        $house->rules = $request->rules;
        $house->trip_type = $request->trip_type;
        $house->address = json_encode($address);
        $house->room = json_encode($room);
        $house->price_detail = json_encode($price_detail);
        $house->status = 0;
        $house->h_status = 0;
        if($request->house_image){
            foreach ($request->file('house_image') as $image) {
                $file_name = $request->name . rand() . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads'), $file_name);
                $house_image [] = [
                    'image_name' => $file_name,
                    'image_path' => 'uploads/' . $file_name
                ];
            }
            $house->image = json_encode($house_image);
        }
        $house->save();
        return back()->withInput()->with('success', 'Sửa nhà thành công! Đợi duyệt!');
    }
}