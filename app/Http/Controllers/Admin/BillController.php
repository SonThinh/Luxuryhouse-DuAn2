<?php

namespace App\Http\Controllers\Admin;

use App\Model\Bill;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BillController extends Controller
{
    public function showBills()
    {
        $data['billsList'] = Bill::all()->sortByDesc('created_at');
        return view('admin.pages.bill.bill', $data);
    }
}
