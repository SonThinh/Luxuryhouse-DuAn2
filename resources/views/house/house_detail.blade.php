@extends('index')
@section('title','house detail')
@section('main')
    <link rel="stylesheet" href="{{asset('/css/slider-jssort101.css')}}">
    <link rel="stylesheet" href="{{asset('/css/jssort101.css')}}">

    <div class="main p-3">
        <div class="container">
            @isset($city)
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{route('place')}}">Địa điểm</a></li>
                    @if($city->id == $house->city_id)
                        <li class="breadcrumb-item"><a
                                href="{{route('places.CityDetail',[$city->id])}}">{{$city->name}}</a></li>
                    @endif
                    <li class="breadcrumb-item active">{{$house->name}}</li>
                </ul>
            @endisset
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
                                {{$house->district->name}},
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
                            <div class="cancel p-2">
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
                        <div class="users-comments">
                            <h3>Bình luận về {{$house->name}}</h3>
                            @foreach($comments as $comment)
                                <div class="row p-2 mb-3">
                                    @php
                                        $avatar = json_decode($comment->user->avatar);
                                    @endphp

                                    <div class="avatar-comment col-sm-2 text-right">
                                        <img
                                            src="{{isset($avatar) ? asset($avatar->image_path) : asset('/images/avatar/avatar-default.png')}}"
                                            alt="Avatar" class="w-55 h-55">
                                    </div>

                                    <div class="content-comment col-sm-10">
                                        <p class="user-comment-name">
                                            {{isset($comment->user->name) ? $comment->user->name : $comment->user->email}}
                                            <span>{{\Carbon\Carbon::parse($comment->created_at)->diffForHumans(\Carbon\Carbon::now('Asia/Ho_Chi_Minh'))}}</span>
                                        </p>
                                        <p>{{$comment->content}} </p>
                                        {{--                                        <ul class="d-flex">--}}
                                        {{--                                            <li class="mr-2">--}}
                                        {{--                                                <div class="d-flex">--}}
                                        {{--                                                    <i class="fas fa-thumbs-up"></i>--}}
                                        {{--                                                    <p class="ml-2">0</p>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </li>--}}
                                        {{--                                            <li>--}}
                                        {{--                                                <div class="d-flex">--}}
                                        {{--                                                    <i class="fas fa-thumbs-down mt-1"></i>--}}
                                        {{--                                                    <p class="ml-2">0</p>--}}
                                        {{--                                                </div>--}}
                                        {{--                                            </li>--}}
                                        {{--                                        </ul>--}}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-sm-12 col-md-4">
                    <div class="contact-booking">
                        <div class="contact-owner mb-3">
                            @if($host->id === $house->host_id)
                                <a href="#">
                                    <div class="row">
                                        @php
                                            $avatar = json_decode($host->user->avatar);
                                        @endphp

                                        <div class="avatar-contact col-sm-3 m-auto">
                                            <img
                                                src="{{isset($avatar) ? asset($avatar->image_path) : asset('/images/avatar/avatar-default.png')}}"
                                                alt="Avatar" class="w-100 h-55">
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
                                            <td>Giá phòng</td>
                                            <td><span
                                                    style="font-weight: bold;font-size: 32px;">{{$house->price}}₫</span>/đêm
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Phí khách tăng thêm</td>
                                            <td><span
                                                    style="font-weight: bold;font-size: 32px;">{{$house->exGuest_fee}}₫</span>/đêm
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
                                       @isset(auth()->user()->host)
                                       @if(auth()->user()->host->id === $house->host_id) disabled @endisset
                                       @endif
                                       class="btn btn-block btn-lux" data-toggle="modal"
                                       data-target="#form-order" value="Đặt ngay">
                                @include('house.nav.form_order_nav')
                            @else
                                <a type="button" id="btn-showPrice"
                                   class="btn btn-block btn-lux" href="{{route('users.login')}}">Đặt ngay</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="similar-house mb-4">
                @include('house.nav.hint_houses')
            </div>
            <div class="similar-house my-4">
                @include('house.nav.same_host',['host'=>$host])
            </div>
        </div>
    </div>
    <script src="{{asset('/js/jssor.slider-28.0.0.min.js')}}" type="text/javascript"></script>
    <script type="text/javascript">jssor_1_slider_init();</script>
@endsection

