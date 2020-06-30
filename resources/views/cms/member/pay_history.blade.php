@extends('cms.member.nav.member')
@section('title','member dashboard')
@section('main-user')
    <div class="table-responsive">
        <h2 class="title mb-2">Thông tin đặt phòng</h2>
        <table class="table table-striped table-bordered dt-responsive nowrap"
               id="dataTable" width="100%">
            <thead>
            <tr>
                <th>Mã đặt phòng</th>
                <th>Tên phòng</th>
                <th>Tên người đặt</th>
                <th>Tên chủ hộ</th>
                <th>Đã Thanh toán</th>
                <th>Ngày thanh toán</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bills as $bill)
                <tr {{$bill->id}}>
                    <td>{{$bill->code}}</td>
                    <td>{{$bill->house->name}}</td>
                    <td>{{isset($bill->user->name) ? $bill->user->name : $bill->user->email}}</td>
                    <td>{{isset($bill->host->user->name) ? $bill->host->user->name : $bill->host->user->email}}</td>
                    <td>{{$bill->total}}đ</td>
                    <td>
                        {{\Carbon\Carbon::parse($bill->updated_at)->format('d-m-Y h:m:i')}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
