<?php

namespace App\Http\Controllers;

use App\Http\Requests\HouseEditRequest;
use App\Http\Requests\HouseRequest;
use App\Http\Requests\RegisterHostRequest;
use App\Model\Bill;
use App\Model\City;
use App\Model\District;
use App\Model\Host;
use App\Model\House;
use App\Model\Trip;
use App\Model\Type;
use App\Model\User;
use App\Model\Utility;
use Illuminate\Http\Request;

class HostController extends Controller
{
    public function showViewRegisterHost($id)
    {
        $data['user'] = User::find($id);

        return view('cms.host.register_host', $data);
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

    public function postRegisterHost(RegisterHostRequest $request, $id)
    {
        if ($request->imgIdCard !== 'undefined') {
            $image = $request->file('imgIdCard');
            $file_name = 'ID_Card'.$id.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/host/'.$id), $file_name);
            $img_card = [
                'image_name' => $file_name,
                'image_path' => 'uploads/host/'.$id.'/'.$file_name,
            ];
            $host = new Host;
            $host->m_id = $id;
            $host->status = 0;
            $host->ID_card = $request->id_card;
            $host->ID_card_image = json_encode($img_card);
            if ($request->business_license) {
                if ($request->imgBL !== 'undefined') {
                    $image = $request->file('imgBL');
                    $file_name = 'BL'.$id.'.'.$image->getClientOriginalExtension();
                    $image->move(public_path('uploads/host/'.$id), $file_name);
                    $img_business_license = [
                        'image_name' => $file_name,
                        'image_path' => 'uploads/host/'.$id.'/'.$file_name,
                    ];
                }
                $host->business_license = $request->business_license;
                $host->business_license_image = json_encode($img_business_license);
            }
            $host->save();
            if ($host) {
                $memberId = User::find($id);

                return response()->json([
                    'status'  => 'true',
                    'message' => 'Đăng ký host thành công! Đợi duyệt',
                    'url'     => route('users.dashboard.showDashboard', $memberId),
                ]);
            } else {
                return response()->json([
                    'status'  => 'false',
                    'message' => 'Đăng ký host thất bại! Vui lòng kiểm tra lại thông tin',
                ]);
            }
        } else {
            return response()->json([
                'status'  => 'false',
                'message' => 'Vui lòng kiểm tra lại thông tin',
            ]);
        }
    }

    public function ViewDashboard($id)
    {
        $data['host'] = Host::find($id);
        $data['bookings'] = Bill::query()->where('host_id', $id)->get();
        $data['houses'] = House::query()->where('host_id', $id)->get();
        $data['users'] = User::all();
        $data['cities'] = City::all();
        $data['types'] = Type::all();
        $data['utilities'] = Utility::all();
        $data['trips'] = Trip::all();

        return view('cms.host.dashboard', $data);
    }

    public function postAddHouse(HouseRequest $request)
    {
        $rules = [
            'cancel_rule' => $request->cancel_rules,
            'attention'   => $request->attention,
            'check_in'    => $request->check_in,
            'check_out'   => $request->check_out,
        ];
        $house = new House();
        $house->city_id = $request->selectCity;
        $house->host_id = $request->host;
        $house->utilities = json_encode($request->house_utilities);
        $house->types = $request->house_type;
        $house->name = $request->name;
        $house->description = $request->description;
        $house->rules = json_encode($rules);
        $house->trip_type = $request->trip_type;
        $house->address = $request->house_number;
        $house->district_id = $request->selectAreas;
        $house->n_room = $request->n_room;
        $house->n_bath = $request->n_bath;
        $house->n_bed = $request->n_bed;
        $house->price = $request->price;
        $house->exGuest_fee = $request->exGuest_fee;
        $house->min_night = $request->min_night;
        $house->max_guest = $request->max_guest;
        $house->image = json_encode($house_image);
        $house->status = 0;
        $house->h_status = 0;
        $house->save();
        $h = House::find($house->id);
        foreach ($request->file('house_image') as $image) {
            $file_name = $h.'_'.rand().'.'.$image->getClientOriginalExtension();
            $image->move(public_path('uploads/house/'.$h), $file_name);
            $house_image [] = [
                'image_name' => $file_name,
                'image_path' => 'uploads/house/'.$h.'/'.$file_name,
            ];
        }
        if ($house) {
            $host_id = Host::find($request->host);

            return redirect()->route('users.host.showDashboard', $host_id);
        }

        return back();
        //            return response()->json([
        //                'status' => 'true',
        //                'message' => 'Đăng ký host thành công! Đợi duyệt',
        //                'url' => route('users.dashboard.showDashboard', $memberId),
        //            ]);
        //        } else {
        //            return response()->json([
        //                'status' => 'false',
        //                'message' => 'Đăng ký host thất bại! Vui lòng kiểm tra lại thông tin',
        //            ]);
        //        }

    }

    public function ViewHouse($id)
    {
        $data['houses'] = House::query()->where('host_id', $id)->get();
        $data['housesList'] = House::query()->where('host_id', $id)->where('status', 1)->get();
        $data['house'] = House::with(['city'])->get();
        $data['cities'] = City::all();
        $data['districts'] = District::with(['city'])->get();
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $data['utilities'] = Utility::all();
        $data['bookings'] = Bill::query()->where('host_id', $id)->get();
        $data['host'] = Host::find($id);

        return view('cms.host.house', $data);
    }

    public function changeHouseStatus(Request $request)
    {
        $house = House::find($request->id);
        $house->h_status = $request->h_status;
        $house->save();

        return response()->json(['success' => 'Đổi trạng thái thành công.']);
    }

    public function editHouse(HouseEditRequest $request, $id)
    {
        $rules = [
            'cancel_rule' => $request->cancel_rules,
            'attention'   => $request->attention,
            'check_in'    => $request->check_in,
            'check_out'   => $request->check_out,
        ];
        $house = House::find($id);
        $house->city_id = $request->selectCity;
        $house->host_id = $request->host;
        $house->utilities = json_encode($request->house_utilities);
        $house->types = $request->house_type;
        $house->name = $request->name;
        $house->description = $request->description;
        $house->rules = json_encode($rules);
        $house->trip_type = $request->trip_type;
        $house->address = $request->house_number;
        $house->district_id = $request->selectAreas;
        $house->n_room = $request->n_room;
        $house->n_bath = $request->n_bath;
        $house->n_bed = $request->n_bed;
        $house->price = $request->price;
        $house->exGuest_fee = $request->exGuest_fee;
        $house->min_night = $request->min_night;
        $house->max_guest = $request->max_guest;
        $house->status = 0;
        $house->h_status = 0;
        if ($request->house_image) {
            foreach ($request->file('house_image') as $image) {
                $file_name = $house->id.rand().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('uploads/house/'.$house->id), $file_name);
                $house_image [] = [
                    'image_name' => $file_name,
                    'image_path' => 'uploads/'.$house->id.'/'.$file_name,
                ];
            }
            $house->image = json_encode($house_image);
        }
        $house->save();
        if ($house) {
            $host_id = Host::find($request->host);

            return redirect()->route('users.host.showDashboard', $host_id);
        }

        return back();
    }

    public function viewBooking($id)
    {
        $data['cities'] = City::all();
        $data['host'] = Host::find($id);
        $data['bookings'] = Bill::query()->where('host_id', $id)->get();
        $data['houses'] = House::all();
        $data['users'] = User::all();
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $data['utilities'] = Utility::all();

        return view('cms.host.booking', $data);
    }

    public function changeStatusBooking(Request $request)
    {
        $bill = Bill::find($request->id);
        $bill->status = $request->status;
        $bill->save();

        return response()->json(['success' => 'Đã đổi trạng thái đơn đặt phòng']);
    }

    public function viewBills($id)
    {
        $data['cities'] = City::all();
        $data['houses'] = House::all();
        $data['users'] = User::all();
        $data['types'] = Type::all();
        $data['trips'] = Trip::all();
        $data['utilities'] = Utility::all();
        $data['host'] = Host::find($id);
        $data['bookings'] = Bill::query()->where('host_id', $id)->where('status', 1)->where('pay', 1)->get();

        return view('cms.host.bills', $data);
    }
}
