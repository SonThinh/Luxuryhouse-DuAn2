<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Model\Bill;

class BillController extends Controller
{
    public function showBills()
    {
        $data['billsList'] = Bill::all()->sortByDesc('created_at');

        return view('admin.pages.bill.bill', $data);
    }
}
