<?php

namespace App\Http\Controllers;

use App\Host;
use App\House;
use App\Http\Requests\ChangePasswordRequest;
use App\Model\Bill;
use App\Model\City;
use App\Model\District;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function bookingDetail($code){
        $data['bookings'] = Bill::query()->where('code',$code)->get();
        $data['houses'] = House::all();
        $data['cities'] = City::all();
        $data['districts'] = District::with(['city'])->get();
        return view('cms.member.booking_detail',$data);
    }
    public function filterWith($id,$sort){
        if ($sort === "RECENTLY"){
            $data['bookings'] = Bill::query()->where('guest_id',$id)->latest()->get();
        }else{
            $data['bookings'] = Bill::query()->where('guest_id',$id)->get();
        }
        return view('cms.member.booking_profile', $data);
    }
    public function showProfile($id)
    {
        $data['user'] = User::find($id);
        $data['bookings'] = Bill::query()->where('guest_id',$id)->get();
        return view('cms.member.profile', $data);
    }
    public function showProfileBooking($id)
    {
        $data['bookings'] = Bill::query()->where('guest_id',$id)->get();
        return view('cms.member.booking_profile', $data);
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->username = $request->name;
        $user->address = $request->address;
        $user->gender = $request->gender;
        $user->birth = $request->birth;
        $user->phone = $request->phone;
        $user->google = $request->google;
        $user->facebook = $request->fb;
        $user->description = $request->description;
        if ($request->avatar) {
            $image = $request->file('avatar');
            $file_name = 'user' . $id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $file_name);
            $data = [
                'image_name' => $file_name,
                'image_path' => 'uploads/' . $file_name
            ];
            $user->avatar = json_encode($data);
        }
        $user->save();
        return back()->withInput()->with('success', 'Sửa thông tin thành viên thành công!');

    }

    public function showViewUpdatePass($id)
    {
        $data['user'] = User::find($id);
        $data['bookings'] = Bill::query()->where('guest_id',$id)->get();
        return view('cms.member.password', $data);
    }

    public function updatePass(ChangePasswordRequest $request, $id)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        Auth::logout();
        return redirect()->route('users.login');
    }
    public function showViewPayHistory($id){
        $data['bills']= Bill::query()->where('guest_id',$id)->where('status',1)->where('pay',1)->get();
        return view('cms.member.pay_history',$data);
    }

}
