<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Model\City;
use App\Model\House;
use App\Model\Slider;
use App\Model\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $data['citiesList'] = City::all();
        $data['events'] = Slider::all();
        //$data['houses'] = House::query()->where('status', 1)->where('h_status', 1)->get();

        return view('pages.area', $data);
    }

    public function login()
    {
        return view('auth.login');
    }

    function logout()
    {
        Auth::logout();

        return redirect()->route('users.login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function postLogin(LoginRequest $request)
    {
        if ($request->remember !== 'undefined') {
            $remember_me = true;
        } else {
            $remember_me = false;
        }
        $data = [
            'email'    => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data, $remember_me)) {
            return response()->json([
                'status'  => 'true',
                'message' => 'Đăng nhập thành công',
                'url'     => route('users.dashboard.showDashboard', [auth()->user()->id]),
            ]);
        } else {
            return response()->json([
                'status'  => 'false',
                'message' => 'Sai tài khoản hoặc mật khẩu',
            ]);
        }
    }

    public function postRegister(RegisterRequest $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->level = 1;
        $user->save();
        if ($user) {
            return response()->json([
                'status'  => 'true',
                'message' => 'Đăng ký thành công! Mời đăng nhập',
                'url'     => route('users.login'),
            ]);
        } else {
            return response()->json([
                'status'  => 'false',
                'message' => 'Đăng ký thất bại! Vui lòng kiểm tra lại thông tin',
            ]);
        }
    }
}
