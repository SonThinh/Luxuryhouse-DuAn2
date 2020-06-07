@extends('index')
@section('title','member booking profile')
@section('main')
    <div class="container">
        <div class="m-4">
            @include('cms.member.menu')
            <div class="content-host">
                <select id="sort-data">
                    @foreach(Config::get('constants.SORT') as $sort=>$key)
                        <option
                            value="{{route('users.booking-profile.filterWith',['id'=>auth()->user()->id,'sort'=>$sort])}}"
                        >{{trans('filter.'.$key)}}</option>
                    @endforeach
                </select>
                <div class="table-responsive-sm" style="font-size: 15px;">
                    <table class="booking-table table table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>Mã đặt phòng</th>
                            <th>Tên phòng</th>
                            <th>Tên người đặt</th>
                            <th>Số người</th>
                            <th>Ngày đến</th>
                            <th>Ngày đi</th>
                            <th>Yêu cầu</th>
                            <th>Số đêm</th>
                            <th>Tổng giá</th>
                            <th>Trạng thái đơn</th>
                            <th>Trạng thái</th>
                            <th>Ngày tạo</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bookings as $booking)
                            <tr {{$booking->id}}>
                                <td><a class="house-d-booking"
                                       href="{{route('users.booking-profile.bookingDetail',[$booking->code])}}">{{$booking->code}}</a>
                                </td>
                                <td><a class="house-d-booking"
                                       href="{{route('places.HouseDetail',[$booking->house->id])}}">{{$booking->house->name}}</a>
                                </td>
                                <td>@isset($booking->user->username){{$booking->user->username}}@else{{$booking->user->email}}@endisset</td>
                                <td>{{$booking->n_person}}</td>
                                <td>{{$booking->check_in}}</td>
                                <td>{{$booking->check_out}}</td>
                                <td>{{$booking->request_guest}}</td>
                                <td>{{$booking->date_range}}</td>
                                <td>{{$booking->total}}đ</td>
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
                                    {{date("d-m-Y h:m:i",strtotime($booking->created_at))}}
                                </td>
                                <td>
                                    @if($booking->status == 0)
                                        <a
                                            href="{{route('users.deleteBooking',[$booking->id])}}"
                                            style="margin-top: 5px"
                                            onclick="return confirm('Bạn có muốn xóa không?')">
                                            <button class="btn btn-danger" name="btn-delete"><i
                                                    class="far fa-trash-alt"></i></button>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection
