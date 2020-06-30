@extends('index')
@section('title','order detail')
@section('main')
    <div class="main p-3">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item">1. Thông tin đặt chỗ</li>
                <li class="breadcrumb-item active" style="color: #ff5722">2. Gửi yêu cầu thành công</li>
            </ul>
            @foreach($bills as $bill)
                <div class="row ">
                    <div class="col-md-8 complete-booking">
                        <h2>Yêu cầu đặt chỗ đã được gửi đến Host thành công!</h2>
                        <div class="m-3">
                            <p>Chúng tôi đã gửi thông tin đặt phòng đến email <span>{{$bill->user->email}}</span>.</p>
                            <p>Bạn vui lòng kiểm tra hộp thư đến của email trong ít phút!</p>
                            <div class="m-3 box-code">
                                <div class="d-flex">
                                    <label>Mã đặt chỗ:</label>
                                    <p>{{$bill->code}}</p>
                                </div>
                            </div>

                            <a href="{{route('users.dashboard.booking-profile.showProfileBooking',[auth()->user()->id])}}" type="button" class="btn btn-block btn-primary w-50 m-auto">Quản lý đặt chỗ</a>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3 class="title">Chi tiết đặt phòng</h3>
                        <div class="m-3 information-booking sticky-box">
                            @php
                                $images = json_decode($bill->house->image);
                                $rules = json_decode($bill->house->rules);
                            @endphp
                            <a href="{{route('places.HouseDetail',$bill->h_id)}}">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <h4>{{$bill->house->name}}</h4>
                                        <p style="font-size: 14px"><i class="far fa-map-marker-check"></i>
                                            {{$bill->house->address}},
                                            {{$bill->house->district->name}},
                                            {{$bill->house->city->name}}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <img src="{{asset($images["0"]->image_path)}}" alt="" class="w-100">
                                    </div>
                                </div>
                            </a>
                            <hr>
                            <div class="d-flex inf-booking">
                                <p><i class="far fa-calendar-alt" style="color: #ff5722"></i></p>
                                <p>{{$bill->date_range}} đêm</p> - <p>{{$bill->check_in}}</p> -
                                <p>{{$bill->check_out}}</p>
                            </div>
                            <div class="d-flex ">
                                <p class="ml-1"><i class="far fa-user" style="color: #ff5722"></i></p>
                                <p class="ml-2">{{$bill->n_person}} khách</p>
                            </div>

                            <table class="table mt-3" style="font-size: 16px ;font-weight: bold">
                                <tr>
                                    <td>Tổng giá thuê {{$bill->date_range}} đêm</td>
                                    <td>{{$bill->total}} đ</td>
                                </tr>
                            </table>
                            <hr>
                            <p id="cancel_rule">Chính sách hủy phòng</p>
                            <textarea style="overflow: hidden" class="form-control mt-3" rows="7" disabled>{{$rules->cancel_rule}}
                            </textarea>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
