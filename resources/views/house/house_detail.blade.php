@extends('index')
@section('title','house detail')
@section('main')
    <link rel="stylesheet" href="{{asset('../resources/assets/css/slider-jssort101.css')}}">
    <link rel="stylesheet" href="{{asset('../resources/assets/css/jssort101.css')}}">

    <div class="main p-3">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('place')}}">Địa điểm</a></li>
                @if($city->id == $house->city_id)
                    <li class="breadcrumb-item"><a
                            href="{{route('places.CityDetail',[$city->id])}}">{{$city->name}}</a></li>
                @endif
                <li class="breadcrumb-item active">{{$house->name}}</li>
            </ul>
            @php
                $images = json_decode($house->image);
                $utilities_house = json_decode($house->utilities);
                $rules = json_decode($house->rules);
            @endphp
            <div class="slide-home text-center">
                @include('house.nav.slider-js',['images'=>$images])
            </div>
            <div class="row house-detail">
                <div class="col-sm-12 col-md-8 mt-2">
                    <h2 class="title font-s-28">Thông tin chi tiết {{$house->name}}</h2>
                    <div class="house-detail p-3">
                        <div class="house-address d-flex">
                            <i class="far fa-map-marker-alt"></i>
                            <p class="ml-1">
                                {{$house->address}},
                                @foreach($districts as $district)
                                    @if($district->id == $house->district_id)
                                        {{$district->name}},
                                    @endif
                                @endforeach
                                {{$house->city->name}}
                            </p>
                        </div>
                        <div class="house-area d-flex">
                            <i class="fal fa-hotel"></i>
                            <p class="ml-1">
                                <span class="house-type">
                                @foreach($types as $type)
                                        @if($type->key == $house->types)
                                            {{$type->name}}
                                        @endif
                                    @endforeach
                                </span>
                            </p>
                        </div>
                        <div class="room-detail">
                            <p>{{$house->max_guest}} khách - {{$house->n_room}} phòng ngủ
                                - {{$house->n_bath}} phòng tắm</p>
                            <a data-toggle="collapse" href="#collapse-house-desc" aria-expanded="true">
                                <i class="fa fa-chevron-down pull-right"></i>
                                Xem chi tiết
                            </a>
                            <div id="collapse-house-desc" class="collapse">
                                <p class="house-description p-2">
                                    {{$house->description}}
                                </p>
                            </div>
                        </div>
                        <h3>Tiện nghi</h3>
                        <div class="house-facilities p-1">
                            <ul class="row">
                                @foreach($utilities_house as $utility_house)
                                    @foreach($utilities as $utility)
                                        @if($utility->key == $utility_house)
                                            <li class="col-1 p-3">
                                                <i class="{{$utility->icon}} fa-i-size-27"></i>
                                            </li>
                                        @endif
                                    @endforeach
                                @endforeach
                            </ul>
                        </div>
                        <div class="house-rules">
                            <h3>
                                Nội quy chỗ ở
                            </h3>
                            <div class="cance p-2">
                                <h4>Chính sách hủy phòng</h4>
                                <p class="p-2">{{$rules->cancel_rule}}</p>
                            </div>
                            <div class="attention p-2">
                                <h4>Lưu ý</h4>
                                <p class="p-2">
                                    {{$rules->attention}}
                                </p>
                            </div>
                            <div class="check-in-time p-2">
                                <h4>Thời gian nhận phòng</h4>
                                <table class="table">
                                    <tr>
                                        <td>Nhận phòng</td>
                                        <td>{{$rules->check_in}}</td>
                                    </tr>
                                    <tr>
                                        <td>Trả phòng</td>
                                        <td>{{$rules->check_out}}</td>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="contact-booking">
                        <div class="contact-owner mb-3">
                            @foreach($hosts as $host)
                                @if($host->id == $house->host_id)
                                    <a href="#">
                                        <div class="row">
                                            @php
                                                $avatar = json_decode($host->user->avatar);
                                            @endphp

                                            <div class="avatar-contact col-sm-3 m-auto">
                                                <img
                                                    src="@isset($avatar){{asset($avatar->image_path)}}@else{{asset('../resources/assets/home/images/avatar/avatar-default.png')}}@endisset"
                                                    alt="Avatar" class="w-100 h-55" >
                                            </div>

                                            <div class="contact col-sm-9">
                                                <p class="owner-name">
                                                    @isset($host->user->name)
                                                        {{$host->user->name}}
                                                    @else
                                                        {{$host->user->email}}
                                                    @endisset
                                                </p>
                                                <p style="color:black;">Tham
                                                    gia: {{\Carbon\Carbon::parse($host->user->created_at)->format('d/m/Y')}}</p>
                                            </div>
                                        </div>
                                    </a>
                                @endif
                            @endforeach
                        </div>
                        <div class="form-choose-day mt-3">
                            <div>
                                @isset($bills)
                                    @foreach($bills as $bill)
                                        @if($bill->status == 1 && $bill->pay == 1)
                                            <input type="hidden" name="checkin_booked[]" value="{{$bill->check_in}}">
                                            <input type="hidden" name="checkout_booked[]" value="{{$bill->check_out}}">
                                        @endif
                                    @endforeach
                                @endisset
                                <div class="input-date-house mt-3">
                                    <h3><i class="fal fa-calendar-alt"></i> Chọn lịch trình</h3>
                                    <input type="text" name="date_book" class="form-control" autocomplete="off"
                                           id="date-book">
                                    <input type="hidden" name="check_in">
                                    <input type="hidden" name="check_out">
                                </div>
                            </div>
                            <div class="house-price">
                                <h3><i class="far fa-sack-dollar"></i> Giá phòng</h3>
                                <p>Giá có thể tăng vào cuối tuần hoặc ngày lễ</p>
                                <div class="price-detail">
                                    <table class="table">
                                        <tr>
                                            <td>Thứ hai - Thứ năm</td>
                                            <td><span
                                                    style="font-weight: bold;font-size: 35px;">{{$house->price_m_to_t}}₫</span>/đêm
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Thứ sáu - Chủ nhật</td>
                                            <td><span
                                                    style="font-weight: bold;font-size: 35px;">{{$house->price_f_to_s}}₫</span>/đêm
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phí khách tăng thêm</td>
                                            <td><span
                                                    style="font-weight: bold;font-size: 35px;">{{$house->exGuest_fee}}₫</span>/đêm
                                                (sau {{$house->max_guest}} khách)
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Số đêm tối thiểu</td>
                                            <td>{{$house->min_night}} đêm</td>
                                            <input name="max_date" type="hidden"
                                                   value="{{$house->min_night}}"/>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            @if(auth()->check())
                                <input type="button" id="btn-showPrice"
                                       @foreach($hosts as $host)
                                       @isset(auth()->user()->host)
                                       @if(auth()->user()->host->id == $house->host_id  ) disabled @endisset
                                       @endif
                                       @endforeach
                                       class="btn btn-block btn-primary" data-toggle="modal"
                                       data-target="#form-order" value="Đặt ngay">
                                @include('house.nav.form_order_nav')
                            @else
                                <a type="button" id="btn-showPrice"
                                   class="btn btn-block btn-primary" href="{{route('users.login')}}">Đặt ngay</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="similar-house mb-4">
                @include('house.nav.hint_houses')
            </div>
            <div class="similar-house my-4">
                @foreach($hosts as $host)
                    @if($host->id == $house->host_id)
                        @include('house.nav.same_host',['host'=>$host])
                    @endif
                @endforeach
            </div>
        </div>
    </div>
    <script src="{{asset('../resources/assets/js/jssor.slider-28.0.0.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">jssor_1_slider_init();</script>
@endsection

