@extends('cms.host.nav.host')
@section('title','host dashboard')
@section('main-host')
    <div class="table-responsive">
        <h2 class="title mb-2">Quản lý doanh thu</h2>
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
            @foreach($bookings as $booking)
                <tr {{$booking->id}}>
                    <td>{{$booking->code}}</td>
                    <td>{{$booking->house->name}}</td>
                    <td>{{isset($booking->user->name) ? $booking->user->name : $booking->user->email}}</td>
                    <td>{{isset($booking->host->user->name) ? $booking->host->user->name : $booking->host->user->email}}</td>
                    <td>{{$booking->total}}đ</td>
                    <td>
                        {{\Carbon\Carbon::parse($booking->updated_at)->format('d-m-Y h:m:i')}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
