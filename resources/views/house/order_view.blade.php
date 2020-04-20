@extends('index')
@section('title','order detail')
@section('main')
    <div class="main p-3">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item active" style="color: #ff5722">1. Thông tin đặt chỗ</li>
                <li class="breadcrumb-item">2. Gửi yêu cầu thành công</li>
            </ul>
            <form action="{{route('users.house.AddBill')}}" method="POST">
                <div class="row ">
                    @csrf
                    <div class="col-md-8">
                        @php
                            $images = json_decode($house->image);
                            $address = json_decode($house->address);
                            $price_detail = json_decode($house->price_detail);
                            $rules = json_decode($house->rules);
                        @endphp
                        <h3 class="title">Thông tin đặt chỗ</h3>
                        <div class="m-3 information-booking">
                            <div class="form-group">
                                <label>Số khách</label>
                                <input type="number" disabled value="{{$n_person}}" class="form-control w-25">
                                <input type="hidden" name="n_person" value="{{$n_person}}">
                            </div>
                            <div class="form-group">
                                <label>Tên nhà</label>
                                <input type="text" disabled value="{{$house->name}}" class="form-control w-25">
                                <input type="hidden" name="h_name" value="{{$house->name}}">
                                <input type="hidden" name="h_id" value="{{$house->id}}">
                                <input type="hidden" name="host_id" value="{{$host->id}}">
                            </div>
                            <div class="form-group d-flex">
                                <div class="d-block">
                                    <label>Nhận phòng</label>
                                    <input type="text" disabled value="{{$check_in}}" class="form-control w-50">
                                    <input type="hidden" name="check_in" value="{{$check_in}}">
                                </div>
                                <div class="d-block m-auto">
                                    <label>Trả phòng</label>
                                    <input type="text" disabled value="{{$check_out}}"
                                           class="form-control w-50">
                                    <input type="hidden" name="check_out" value="{{$check_out}}">
                                </div>
                            </div>
                            <p>Quy định chỗ ở</p>
                            <textarea style="overflow: hidden" class="form-control mt-3" rows="5" disabled
                                      name="attention">
                                {{$rules->attention}}
                        </textarea>
                        </div>
                        <h3 class="title">Thông tin cá nhân</h3>
                        <div class="m-3 information-booking">
                            <div class="form-group">
                                <label>Tên khách hàng<span style="color:red;">*</span></label>
                                <input type="text" class="form-control" name="guest_name"
                                       value="@isset($user->username){{$user->username}}@else {{$user->email}} @endisset">
                                <input type="hidden" name="guest_id" value="{{$user->id}}">
                            </div>
                            <div class="form-group d-flex">
                                <div class="d-block">
                                    <label>Số điện thoại<span style="color:red;">*</span></label>
                                    <input type="tel"
                                           value="@isset($user->phone){{$user->phone}}@endisset"
                                           name="phone"
                                           class="form-control">
                                </div>
                                <div class="d-block m-auto">
                                    <label>Email<span style="color:red;">*</span></label>
                                    <input type="email" name="email" disabled value="{{$user->email}}"
                                           class="form-control">
                                    <input type="hidden" name="email" value="{{$user->email}}">
                                </div>
                            </div>
                            <div class="form-group" id="attention">
                            <textarea style="overflow: hidden" class="form-control mt-3" rows="5" name="request_guest"
                                      placeholder="Yêu cầu"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h3 class="title">Chi tiết đặt phòng</h3>
                        <div class="m-3 information-booking sticky-box">
                            <a href="{{route('places.HouseDetail',[$house->id])}}">
                                <div class="row">
                                    <div class="col-md-6 ">
                                        <h4>{{$house->name}}</h4>
                                        <p style="font-size: 14px"><i class="far fa-map-marker-check"></i>
                                            {{$address->house_number}},
                                            @foreach($districts as $district)
                                                @if($district->id == $address->district_id)
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
                            <hr>
                            <div class="d-flex inf-booking">
                                <p><i class="far fa-calendar-alt" style="color: #ff5722"></i></p>
                                <p>{{$date_range}} đêm</p> - <p>{{$check_in}}</p> -
                                <p>{{$check_out}}</p>
                            </div>
                            <div class="d-flex ">
                                <p class="ml-1"><i class="far fa-user" style="color: #ff5722"></i></p>
                                <p class="ml-2">{{$n_person}} khách</p>
                            </div>

                            <table class="table mt-3" style="font-size: 16px ;font-weight: bold">
                                <tr>
                                    <td>Tổng giá thuê {{$date_range}} đêm</td>
                                    <td>{{$total}} đ</td>
                                    <input type="hidden" name="total" value="{{$total}}">
                                    <input type="hidden" name="date_range" value="{{$date_range}}">
                                </tr>
                            </table>
                            <hr>
                            <p id="cancel_rule">Chính sách hủy phòng</p>
                            <textarea style="overflow: hidden" class="form-control mt-3" rows="7" disabled>
                                {{$rules->cancel_rule}}
                            </textarea>
                        </div>
                    </div>
                    <div class="form-group m-auto">
                        <label class="form-check-label">
                            <input type="checkbox" name="agree" class="form-check-input"> Đồng ý với <a
                                href="#cancel_rule">chính sách hủy phòng</a> và <a href="#attention">các quy định chỗ ở</a>
                        </label>
                        <input id="btn-dis" class="btn btn-block btn-success" disabled value="Gửi yêu cầu đặt phòng">
                        <input id="btn-agree" class=" btn btn-block btn-success d-none m-auto" type="submit" value="Gửi yêu cầu đặt phòng">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
