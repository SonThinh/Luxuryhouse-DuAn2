<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Host;
use App\Model\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function showUsers()
    {
        $data['memberList'] = User::all();

        return view('admin.pages.admin_users', $data);
    }

    public function showHosts()
    {
        $data['hostsList'] = Host::all();

        return view('admin.pages.admin_hosts', $data);
    }

    public function changeStatus(Request $request)
    {
        $host = Host::find($request->id);
        $host->status = $request->status;
        $host->save();

        return response()->json(['success' => 'Đổi trạng thái thành công.']);
    }
}
