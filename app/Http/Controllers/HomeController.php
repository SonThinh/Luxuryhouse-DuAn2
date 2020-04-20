<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Model\City;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function index()
    {
        $data['citiesList'] = City::paginate(12);
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
        if ($request->has('remember') && !empty($request->remember)) {
            $remember_me = true;
        } else {
            $remember_me = false;
        }
        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($data, $remember_me)) {
            return redirect()->route('users.showProfile', [auth()->user()->id]);
        } else {
            return back()->withInput()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
        }
    }

    public function postRegister(Request $request)
    {
        $user = new User;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->level = 1;
        $user->save();
        return back()->withInput()->with('success', 'Tài khoản đăng ký thành công! Mời đăng nhập!');
    }
}
