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
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
                <th>Trạng thái đơn</th>
                <th>Thao tác</th>
                <th>Ngày đến</th>
                <th>Ngày đi</th>
                <th>Tên người đặt</th>
                <th>Số người</th>
                <th>Yêu cầu</th>
                <th>Số đêm</th>
                <th>Tổng giá</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
                <tr {{$booking->id}}>
                    <td><a class="house-d-booking"
                           href="{{route('users.dashboard.booking-profile.bookingDetail',[$booking->code])}}">{{$booking->code}}</a>
                    </td>
                    <td><a class="house-d-booking"
                           href="{{route('places.HouseDetail',[$booking->house->id])}}">{{$booking->house->name}}</a>
                    </td>
                    <td>@if($booking->pay == 0)
                            <a class="pay-booking" href="{{route('users.showPayView',[$booking->code])}}">Chưa
                                thanh toán</a>
                        @else
                            <p style="color:green;">
                                <i class="far fa-check"></i>
                                Đã thanh toán
                            </p>
                        @endif
                    </td>
                    <td>
                        {{\Carbon\Carbon::parse($booking->created_at)->format('d/m/Y h:m:i')}}
                    </td>
                    <td>@if($booking->status == 0)
                            <p style="color:red;">
                                Chưa đồng ý
                            </p>
                        @else
                            <p style="color:green;">
                                <i class="far fa-check"></i>
                                Đồng ý
                            </p>
                        @endif
                    </td>
                    <td>
                        @if($booking->status == 0)
                            <a
                                style="margin-top: 5px"
                                onclick="return confirm('Bạn có muốn xóa không?')">
                                <button class="btn btn-danger" name="btn-delete"><i
                                        class="far fa-trash-alt"></i></button>
                            </a>
                        @endif
                    </td>
                    <td>{{$booking->check_in}}</td>
                    <td>{{$booking->check_out}}</td>
                    <td>@isset($booking->user->username){{$booking->user->username}}@else{{$booking->user->email}}@endisset</td>
                    <td>{{$booking->n_person}}</td>
                    <td>{{$booking->request_guest}}</td>
                    <td>{{$booking->date_range}}</td>
                    <td>{{$booking->total}}đ</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
