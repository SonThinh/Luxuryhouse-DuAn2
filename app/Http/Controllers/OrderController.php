<?php

namespace App\Http\Controllers;

use App\Host;
use App\House;
use App\Model\Bill;
use App\Model\City;
use App\Model\District;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\SendBill;

class OrderController extends Controller
{
    public function showPrice(Request $request, $id)
    {
        $data['user'] = User::find($request->user_id);
        $data['host'] = Host::find($request->host_member_id);
        $data['house'] = House::find($id);
        $data['check_in'] = $request->check_in_clone;
        $data['check_out'] = $request->check_out_clone;
        $data['n_person'] = $request->n_person;
        $data['total'] = $request->total;
        $data['date_range'] = $request->dates_range;
        $data['cities'] = City::all();
        $data['districts'] = District::with(['city'])->get();
        return view('house.order_view', $data);
    }

    public function AddBill(Request $request)
    {
        $code = now('Asia/Ho_Chi_Minh')->timestamp;
        $bill = new Bill;
        $bill->code = $code;
        $bill->host_id = $request->host_id;
        $bill->h_id = $request->h_id;
        $bill->guest_id = $request->guest_id;
        $bill->n_person = $request->n_person;
        $bill->check_in = $request->check_in;
        $bill->check_out = $request->check_out;
        $bill->request_guest = $request->request_guest;
        $bill->date_range = $request->date_range;
        $bill->total = $request->total;
        $bill->status = 0;
        $bill->pay = 0;
        $bill->save();
        $data = [
            'n_person' => $request->n_person,
            'h_name' => $request->h_name,
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
            'guest_name' => $request->guest_name,
            'phone' => $request->phone,
            'email' => $request->email,
            'request_guest' => $request->request_guest,
            'total' => $request->total,
            'date_range' => $request->date_range,
        ];
        $this->sendBill_detail($data);
        return redirect()->route('users.showViewBookingComplete', $code);
    }

    public function sendBill_detail($data)
    {
        $email = [
            $data['email'],
            'pst269@gmail.com'
        ];
        Mail::to($email)->send(new SendBill($data));
    }

    public function showViewBookingComplete($code)
    {
        $data['bills'] = Bill::query()->where('code', $code)->get();
        $data['cities'] = City::all();
        $data['districts'] = District::with(['city'])->get();
        return view('house.booking_success', $data);
    }

    public function showPayView($code)
    {
        $bills = Bill::query()->where('code', $code)->get();
        foreach ($bills as $bill) {
            $bill->pay = 1;
            $bill->save();
        }
        $data['code'] = $code;
        return view('cms.member.pay_success', $data);
    }
}
