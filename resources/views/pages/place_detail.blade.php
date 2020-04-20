@extends('index')
@section('title','place detail')
@section('main')
    <div class="main p-3">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('place')}}">Địa điểm</a></li>
                <li class="breadcrumb-item active">{{$city->name}}</li>
            </ul>
            <p class="decs mb-2">{{$city->description}}</p>
            <div class="row ">
                <div class="col-md-3">
                    @include('layouts.search_nav')
                </div>
                <div class="col-md-9 content">
                    <h2>{{count($houseList)}} homestay tại {{$city->name}}</h2>
                    <div class="row ml-1">
                        @foreach($houseList as $house)
                            @php
                                $images = json_decode($house->image);
                                $address = json_decode($house->address);
                                $room = json_decode($house->room);
                                $price_detail = json_decode($house->price_detail);
                            @endphp
                            <div class="col-sm-12 col-md-4 home-content">
                                <a href="{{route('places.HouseDetail',[$house->id])}}">
                                    <img src="{{asset($images["0"]->image_path)}}" alt="" class="w-100">
                                </a>
                                <p class="home-type">
                                    @foreach($types as $type)
                                        @if($type->key == $house->types)
                                            {{$type->name}}
                                        @endif
                                    @endforeach
                                </p>
                                <a href="{{route('places.HouseDetail',[$house->id])}}"><p
                                        class="home-name">{{$house->name}}</p></a>
                                <div class="home">
                                    <div class="home-detail d-flex">
                                        <p>{{$room->max_guest}} khách - {{$room->number_room}} phòng ngủ
                                            - {{$room->number_bath}} phòng tắm</p>
                                    </div>
                                    <p class="home-price">
                                        @if(\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Sunday' ||
                                            \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Saturday' ||
                                            \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Friday')
                                            {{$price_detail->Fri_to_Sun}} đ/đêm
                                        @else
                                            {{$price_detail->Mon_to_Thus}} đ/đêm
                                        @endif
                                    </p>
                                    <p class="home-address">
                                        {{$address->house_number}},
                                        @foreach($districts as $district)
                                            @if($district->id == $address->district_id)
                                                {{$district->name}}
                                            @endif
                                        @endforeach
                                        ,{{$house->city->name}}
                                    </p>
                                    <div class="home-star"><i class="fas fa-star" style="color: yellow"></i><i
                                            class="fal fa-star"></i><i
                                            class="fal fa-star"></i><i class="fal fa-star"></i><i
                                            class="fal fa-star"></i>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$houseList->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection
