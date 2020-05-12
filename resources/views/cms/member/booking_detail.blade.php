@extends('index')
@section('title','member booking detail')
@section('main')
    <div class="container">
        <div class="m-4">
            @include('cms.member.menu')
            @foreach($bookings as $booking)
                <div class="content-bookingDetail">
                    <div class="my-2">
                        <ul class="progressbar">
                            <li class="active">Gửi yêu cầu thành công
                                <p>{{$booking->created_at}}</p></li>
                            <li @if($booking->status == 1) class="active" @endif>Chủ nhà đồng
                                ý @if($booking->status == 1)
                                    <p>{{$booking->updated_at}}</p> @endif</li>
                            <li @if($booking->pay == 1) class="active" @endif>Thanh toán</li>
                            <li>Đánh giá</li>
                        </ul>
                    </div>
                </div>
                <div class="content-bottom-bookingDetail">
                    <div class="m-5">
                        <div class="row">
                            <div class="col-md-6">
                                <h3>Chi tiết giao dịch</h3>
                                <table class="table">
                                    <tr>
                                        <td>Ngày giao dịch</td>
                                        <td> {{date("d-m-Y",strtotime($booking->created_at))}}</td>
                                    </tr>
                                    <tr>
                                        <td>Tổng tiền</td>
                                        <td><p style="font-weight: bold">{{$booking->total}}đ</p></td>
                                    </tr>
                                </table>
                                <h3>Thông tin đặt chỗ</h3>
                                <table class="table">
                                    <tr>
                                        <td>Mã đặt chỗ</td>
                                        <td><p style="font-weight: bold">{{$booking->code}}</p></td>
                                    </tr>
                                    <tr>
                                        <td>Tên khách hàng</td>
                                        <td>
                                            <p style="font-weight: bold">@isset($booking->user->username){{$booking->user->username}} @else {{$booking->user->email}} @endisset</p>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Ngày đến</td>
                                        <td><p style="font-weight: bold">{{$booking->check_in}}</p></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày đi</td>
                                        <td><p style="font-weight: bold">{{$booking->check_out}}</p></td>
                                    </tr>
                                </table>
                            </div>
                            <div class="col-md-6">
                                <h3>Chi tiết chỗ ở</h3>
                                @foreach($houses as $house)
                                    @if($booking->h_id == $house->id)
                                        @php
                                            $images = json_decode($house->image);
                                        @endphp
                                        <a href="{{route('places.HouseDetail',[$house->id])}}" class="detail-booking">
                                            <div class="row m-2">
                                                <div class="col-md-6">
                                                    <h4>{{$house->name}}</h4>
                                                    <p style="font-size: 14px"><i class="far fa-map-marker-check"></i>
                                                        {{$house->address}},
                                                        @foreach($districts as $district)
                                                            @if($district->id == $house->district_id)
                                                                {{$district->name}},
                                                            @endif
                                                        @endforeach
                                                        {{$house->city->name}}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <img src="{{asset($images["0"]->image_path)}}" alt="" class="w-100">
                                                </div>
                                            </div>
                                        </a>
                                    @endif
                                @endforeach
                            </div>
                            <div class="button-bottom">
                                @if($booking->pay == 0)
                                    <a href="{{route('users.showPayView',[$booking->code])}}" class="btn btn-primary">Thanh
                                        toán</a>
                                @else
                                    <a href="#" class="btn btn-info">Đánh giá <i class="fal fa-arrow-right"></i></a>
                                @endif
                            </div>
                        </div>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
