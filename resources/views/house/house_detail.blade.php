@extends('index')
@section('title','house detail')
@section('main')
    <div class="main p-3">
        <div class="container">
            <ul class="breadcrumb">

                <li class="breadcrumb-item"><a href="{{route('place')}}">Địa điểm</a></li>
                @foreach($cities as $city)
                    @if($city->id == $house->city_id)
                        <li class="breadcrumb-item"><a
                                href="{{route('places.CityDetail',[$city->id])}}">{{$city->name}}</a></li>
                    @endif
                @endforeach

                <li class="breadcrumb-item active">{{$house->name}}</li>
            </ul>
            @php
                $images = json_decode($house->image);
                $address = json_decode($house->address);
                $room = json_decode($house->room);
                $price_detail = json_decode($house->price_detail);
                $utilities_house = json_decode($house->utilities);
                $rules = json_decode($house->rules);
            @endphp
            <div class="slide-home text-center">
                @foreach($images as $image)
                    <div class="home-slider">
                        <img src="{{asset($image->image_path)}}" alt="" class="w-100">
                    </div>
                    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                    <a class="next" onclick="plusSlides(1)">&#10095;</a>
                @endforeach
            </div>
            <div class="row house-detail">
                <div class="col-sm-12 col-md-8 mt-2">
                    <h2 class="house-name">Hana house</h2>
                    <div class="house-detail p-2">
                        <div class="house-address d-flex">
                            <i class="far fa-map-marker-alt"></i>
                            <p class="ml-1">
                                {{$address->house_number}},
                                @foreach($districts as $district)
                                    @if($district->id == $address->district_id)
                                        {{$district->name}},
                                    @endif
                                @endforeach
                                {{$house->city->name}}
                            </p>
                        </div>

                        <div class="house-area d-flex">
                            <i class="fal fa-hotel"></i>
                            <p class="ml-1"><span class="house-type">
                                @foreach($types as $type)
                                        @if($type->key == $house->types)
                                            {{$type->name}}
                                        @endif
                                    @endforeach
                                </span></p>
                        </div>
                        <div class="room-detail">
                            <p>{{$room->max_guest}} khách - {{$room->number_room}} phòng ngủ
                                - {{$room->number_bath}} phòng tắm</p>
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
                        <div class="house-facilities p-3">
                            <div class="d-flex p-1">
                                @foreach($utilities_house as $utility_house)
                                    @foreach($utilities as $utility)
                                        @if($utility->key == $utility_house)
                                            <p class="ml-2">
                                                <i class="{{$utility->icon}}"></i>
                                            </p>
                                        @endif
                                    @endforeach
                                @endforeach
                            </div>
                        </div>
                        <div class="house-rules">
                            <h3>
                                Nội quy chỗ ở
                            </h3>
                            <div class="cance p-2">
                                <h4>Chính sách hủy phòng</h4>
                                <p>{{$rules->cancel_rule}}</p>
                            </div>
                            <div class="attention p-2">
                                <h4>Lưu ý</h4>
                                <p>
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
                    <div class="contact-owner">
                        @foreach($host as $host)
                            <a href="#" class="d-flex mt-1">
                                @if($host->id == $house->host_id)
                                    @php
                                        $avatar = json_decode($host->user->avatar);
                                    @endphp
                                    <img src="
                                    @isset($avatar)
                                    {{asset($avatar->image_path)}}
                                    @else
                                    {{asset('../resources/assets/home/images/avatar/avatar-default.png')}}
                                    @endisset
                                        " alt="Avatar" class="avatar">
                                    <div class="contact">
                                        <p class="owner-name">
                                            @isset($host->user->username)
                                                {{$host->user->username}}
                                            @else
                                                {{$host->user->email}}
                                            @endisset
                                        </p>
                                    </div>
                                @endif
                            </a>
                            <p>Tham gia: {{date("d-m-Y",strtotime($host->user->created_at))}}</p>
                        @endforeach
                    </div>
                    <div class="form-choose-day">
                        <div class="form-group">
                            <h3>Chọn lịch trình</h3>
                            <div class="d-flex">
                                <input name="checkin" class="form-control" autocomplete="off" id="txtCheckin"
                                       placeholder="dd/mm/YY"/>
                                <p class="m-auto">đến</p>
                                <input name="checkout" class="form-control" autocomplete="off" id="txtCheckout"
                                       placeholder="dd/mm/YY"/>
                            </div>
                        </div>
                        <div class="house-price">
                            <h3>Giá phòng</h3>
                            <p>Giá có thể tăng vào cuối tuần hoặc ngày lễ</p>
                            <div class="price-detail">
                                <table class="table">
                                    <tr>
                                        <td>Thứ hai - Thứ năm</td>
                                        <td><span style="font-weight: bold;font-size: 35px;">{{$price_detail->Mon_to_Thus}}₫</span>/đêm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Thứ sáu - Chủ nhật</td>
                                        <td><span style="font-weight: bold;font-size: 35px;">{{$price_detail->Fri_to_Sun}}₫</span>/đêm
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Phí khách tăng thêm</td>
                                        <td><span style="font-weight: bold;font-size: 35px;">{{$price_detail->Ex_guest}}₫</span>/đêm
                                            (sau {{$room->max_guest}} khách)
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Số đêm tối thiểu</td>
                                        <td>{{$price_detail->max_night}} đêm</td>
                                        <input name="max_date" type="hidden"
                                               value="{{$price_detail->max_night}}"/>
                                    </tr>
                                </table>
                            </div>
                        </div>
                        @foreach($bills as $bill)
                            @if($bill->status == 1 && $bill->pay == 1)
                                @php
                                    $checkin = date("Y-m-d", strtotime($bill->check_in));
                                    $checkout = date("Y-m-d", strtotime($bill->check_out));
                                @endphp
                                <input type="hidden" name="checkin_booked" value="{{$checkin}}">
                                <input type="hidden" name="checkout_booked" value="{{$checkout}}">
                            @endif
                        @endforeach
                        <input type="button" id="btn-showPrice"
                               @isset(auth()->user()->id) @if(auth()->user()->id == $host->user->id  ) disabled
                               @endif @endisset class="btn btn-block btn-primary" data-toggle="modal"
                               data-target="#form-order" value="Đặt ngay">
                        @include('house.nav.form_order_nav')

                    </div>

                </div>
            </div>
            <div class="similar-house">
                <h2 class="title">Chỗ ở tương tự</h2>
                <div class="row ml-1">
                    <div class="col-sm-12 col-md-4 home-content">
                        <a href="home-detail.html"><img src="images/houses/house1/1.png" alt="" class="w-100"></a>
                        <p class="home-type">Nhà riêng</p>
                        <a href="home-detail.html"><p class="home-name">Hana house</p></a>
                        <div class="home">
                            <div class="home-detail d-flex">
                                <p>2 khách-1 phòng ngủ-1 phòng tắm</p>
                            </div>
                            <p class="home-price">370,000đ/đêm</p>
                            <p class="home-address">Số 10, ngõ 61 Đường Đào Duy Từ, Phường 3, Thành phố Đà Lạt, Lâm
                                Đồng
                            </p>
                            <div class="home-star"><i class="fas fa-star" style="color: yellow"></i><i
                                    class="fal fa-star"></i><i
                                    class="fal fa-star"></i><i class="fal fa-star"></i><i class="fal fa-star"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
