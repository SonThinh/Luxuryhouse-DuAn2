<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class AdminController extends Controller
{
    public function index(){
        return view('admin');
    }
    public function show_dashboard(){
        return view('admin.dashboard');
    }
}