<?php

namespace App\Http\Controllers\Admin;

use App\House;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use App\Model\City;
use App\Model\Slider;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function getLogin()
    {
        return view('admin.admin_login');
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function getViewAdminDashboard()
    {
        $data['houses'] = House::all();
        $data['users'] = User::query()->where('level','!=',0)->get();
        $data['cities'] = City::all();
        return view('admin.pages.admin_dashboard',$data);
    }

    public function postLogin(LoginRequest $request)
    {
        if ($this->checkLevelByEmail($request->email)) {
            if ($request->remember !== 'undefined') {
                $remember_me = true;
            } else {
                $remember_me = false;
            }
            $data = [
                'email' => $request->email,
                'password' => $request->password,
            ];
            if (Auth::attempt($data, $remember_me)) {
                return response()->json([
                    'status' => 'true',
                    'message' => 'Đăng nhập thành công',
                    'url' => route('admin.dashboard'),
                ]);
            } else {
                return response()->json([
                    'status'  => 'false',
                    'message' => 'Sai tài khoản hoặc mật khẩu',
                ]);
            }
        } else
            return response()->json([
                'status'  => 'false',
                'message' => 'Sai tài khoản hoặc mật khẩu',
            ]);
    }

    public function checkLevelByEmail(String $email)
    {
        $email = User::all()->where('email',$email)->where('level', 0);
        if ($email->count() > 0)
            return true;
        return false;
    }

}
