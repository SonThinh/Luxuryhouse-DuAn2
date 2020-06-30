<?php

namespace App\Http\Controllers;

use App\House;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\UpdateMemberRequest;
use App\Model\Bill;
use App\Model\City;
use App\Model\Comment;
use App\Model\District;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function showDashboard($id)
    {
        $data['user'] = User::find($id);
        $data['bookings'] = Bill::query()->where('guest_id', $data['user']->id)->where('notify', 1)->get();
        return view('cms.member.member_dashboard', $data);
    }

    public function bookingDetail($id, $code)
    {
        $data['bookings'] = Bill::query()->where('code', $code)->get();
        foreach ($data['bookings'] as $booking){
            $h_id = $booking->h_id;
        }
        $data['houses'] = House::all();
        $data['cities'] = City::all();
        $data['districts'] = District::with(['city'])->get();
        $data['comments'] = Comment::query()->where('m_id',\auth()->id())->where('h_id',$h_id)->get();
        $data['user'] = User::find($id);

        return view('cms.member.booking_detail', $data);
    }

    public function showProfileBooking($id)
    {
        $data['user'] = User::find($id);
        $data['bookings'] = Bill::query()->where('guest_id', $id)->get();
        return view('cms.member.booking_profile', $data);
    }

    public function updateUser(UpdateMemberRequest $request, $id)
    {
        $user = User::find($id);
        $user->name = $request->name;
        $user->address = $request->address;
        $user->birth = $request->birth;
        $user->phone = $request->phone;
        $user->google = $request->google;
        $user->facebook = $request->fb;
        $user->description = $request->description;
        if ($request->gender !== 'undefined') {
            $user->gender = $request->gender;
        }
        if ($request->avatar !== 'undefined') {
            $image = $request->file('avatar');
            $file_name = 'user' . $id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/member/' . $id), $file_name);
            $data = [
                'image_name' => $file_name,
                'image_path' => 'uploads/member/' . $id . '/' . $file_name
            ];
            $user->avatar = json_encode($data);
        }

        $user->save();

        if ($user) {
            return response()->json([
                'status' => 'true',
                'message' => 'Đổi thông tin cá nhân thành công!',
                'url' => route('users.dashboard.showDashboard', $user->id),
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Đổi mật khẩu thất bại! Vui lòng kiểm tra lại thông tin',
            ]);
        }
    }

    public function showViewUpdatePass($id)
    {
        $data['user'] = User::find($id);
        $data['bookings'] = Bill::query()->where('guest_id', $id)->get();
        return view('cms.member.password', $data);
    }

    public function updatePass(ChangePasswordRequest $request, $id)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        $user->save();
        if ($user) {
            Auth::logout();
            return response()->json([
                'status' => 'true',
                'message' => 'Đổi mật khẩu thành công! Mời đăng nhập',
                'url' => route('users.login'),
            ]);
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Đổi mật khẩu thất bại! Vui lòng kiểm tra lại thông tin',
            ]);
        }
    }

    public function showViewPayHistory($id)
    {
        $data['user'] = User::find($id);
        $data['bills'] = Bill::query()->where('guest_id', $id)->where('status', 1)->where('pay', 1)->get();
        return view('cms.member.pay_history', $data);
    }

    public function postComment(Request $request, $m_id, $code)
    {
        if ($request->comment !== null) {
            $booking = Bill::query()->where('code', $code)->get();
            foreach ($booking as $bill) {
                $h_id = $bill->h_id;
                $b_id = $bill->id;
            }
            $comment = new Comment;
            $comment->m_id = $m_id;
            $comment->h_id = $h_id;
            $comment->b_id = $b_id;
            $comment->content = $request->comment;
            $comment->status = 1;
            $comment->save();
            if ($comment) {
                return response()->json([
                    'status' => 'true',
                    'message' => 'Đăng đánh giá thành công!',
                    'url' => route('places.HouseDetail', [$h_id]),
                ]);
            }
        } else {
            return response()->json([
                'status' => 'false',
                'message' => 'Đăng đánh giá thất bại! Vui lòng kiểm tra lại thông tin',
            ]);
        }
    }
}
