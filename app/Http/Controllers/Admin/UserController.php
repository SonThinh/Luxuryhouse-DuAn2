<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function showUsers()
    {
        $data['memberList'] = User::all();
        return view('admin.pages.admin_users', $data);
    }
}
