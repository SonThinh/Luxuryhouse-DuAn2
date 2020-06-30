@extends('cms.member.nav.member')
@section('title','member dashboard')
@section('main-user')
    <div>
        <h2 class="title mb-2">Thông tin đặt phòng</h2>
        @foreach($bookings as $booking)
            <div class="content-bookingDetail">
                <div class="my-2">
                    <ul class="progressbar">
                        <li class="active">Gửi yêu cầu thành công
                            <p>{{$booking->created_at}}</p></li>
                        <li @if($booking->status === 1) class="active" @endif>Chủ nhà đồng
                            ý @if($booking->status === 1)
                                <p>{{$booking->updated_at}}</p> @endif</li>
                        <li @if($booking->pay === 1) class="active" @endif>Thanh toán</li>
                        <li @foreach($comments as $comment) @if($comment->status === 1) class="active" @endif @endforeach>
                            Đánh giá
                        </li>
                    </ul>
                </div>
            </div>
            <div class="content-bottom-bookingDetail">
                <div class="row">
                    <div class="col-md-6">
                        <h3>Chi tiết giao dịch</h3>
                        <table class="table">
                            <tr>
                                <td>Ngày giao dịch</td>
                                <td>{{\Carbon\Carbon::parse($booking->created_at)->format('d/m/Y')}}</td>
                            </tr>
                            <tr>
                                <td>Tổng tiền</td>
                                <td><p style="font-weight: bold">{{$booking->total}}đ</p></td>
                            </tr>
                        </table>
                        <h3>Thông tin đặt chỗ</h3>
                        <table class="table nowrap">
                            <tr>
                                <td>Mã đặt chỗ</td>
                                <td><p style="font-weight: bold">{{$booking->code}}</p></td>
                            </tr>
                            <tr>
                                <td>Tên khách hàng</td>
                                <td>
                                    <p style="font-weight: bold">{{isset($booking->user->name) ? $booking->user->name : Str::limit($booking->user->email,16)}}</p>
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
                                                {{$house->district->name}},
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
                    <div class="button-bottom ml-3">
                        @if($booking->pay === 0 && $booking->status === 1)
                            <a href="{{route('users.showPayView',[$booking->code])}}" class="btn btn-primary">Thanh
                                toán</a>
                        @else
                            <a href="{{route('users.dashboard.booking-profile.showProfileBooking',[auth()->user()->id])}}"
                               class="btn btn-info"><i
                                    class="fal fa-arrow-left"></i> Quay lại</a>
                            <a href="javascript:void(0)" class="btn btn-info" data-toggle="modal"
                               data-target="#form-comment">Đánh
                                giá <i class="fal fa-arrow-right"></i></a>
                            @include('cms.member.nav.comment',['booking'=>$booking])
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endsection
