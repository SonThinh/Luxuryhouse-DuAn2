<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MemberController extends Controller
{
    public function showProfile($id)
    {
        $data['user'] = User::find($id);
        return view('cms.member.profile', $data);
    }

    public function updateUser(Request $request, $id)
    {
        if ($request->avatar) {
            $image = $request->file('avatar');
            $file_name = 'user' . $id . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads'), $file_name);
            $data = [
                'image_name' => $file_name,
                'image_path' => 'uploads/' . $file_name
            ];
            $user = User::find($id);
            $user->username = $request->name;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->birth = $request->birth;
            $user->phone = $request->phone;
            $user->google = $request->google;
            $user->facebook = $request->fb;
            $user->avatar = json_encode($data);
            $user->description = $request->description;
            $user->save();
        } else {
            $user = User::find($id);
            $user->username = $request->name;
            $user->address = $request->address;
            $user->gender = $request->gender;
            $user->birth = $request->birth;
            $user->phone = $request->phone;
            $user->google = $request->google;
            $user->facebook = $request->fb;
            $user->description = $request->description;
        }
        return back()->withInput()->with('success', 'Sửa thông tin thành viên thành công!');

    }

    public function showViewUpdatePass($id)
    {
        $data['user'] = User::find($id);
        return view('cms.member.password', $data);
    }

    public function updatePass(ChangePasswordRequest $request, $id)
    {
        $user = User::find($id);
        $user->password = Hash::make($request->password);
        Auth::logout();
        return redirect()->route('users.login');
    }
}
