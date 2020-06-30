@extends('index')
@section('title','place detail')
@section('main')
    <section class="top-banner">
        <div class="background">
            @php
                $image = json_decode($city->image);
            @endphp
            <img src="{{asset($image->image_path)}}" alt="" class="w-100">
        </div>
        <div class="container search-place text-center">
            <div class="city-name">
                <h1>{{$city->name}}</h1>
            </div>
            <p class="desc-city px-4">{{$city->description}}</p>
            <div class="search-form">
                @include('layouts.search_place')
            </div>
        </div>
    </section>
    <section class="main house-list">
        <div class="container">
            <ul class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{route('place')}}">Địa điểm</a></li>
                <li class="breadcrumb-item active">{{$city->name}}</li>
            </ul>
            <div class="row ">
                <div class="col-md-3">
                    @include('layouts.search_nav_left_place')
                </div>
                <div class="col-md-9 content">
                    <div class="d-inline-block w-100">
                        <div class="row">
                            <div class="col-6">
                                <h2 class="float-left">{{count($houseList)}} homestay tại {{$city->name}}</h2>
                            </div>
                            {{--                            <div class="col-6">--}}
                            {{--                                <div class="view-switch">--}}
                            {{--                                    <div class="view-item view-active">--}}
                            {{--                                        <a href="#">--}}
                            {{--                                            <i class="fas fa-th-list"></i>--}}
                            {{--                                        </a>--}}
                            {{--                                    </div>--}}
                            {{--                                    <div class="view-item">--}}
                            {{--                                        <a href="#">--}}
                            {{--                                            <i class="fas fa-th-large"></i>--}}
                            {{--                                        </a>--}}
                            {{--                                    </div>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                        </div>
                    </div>
                    <div class="row ml-1">
                        @foreach($houseList as $house)
                            @php
                                $images = json_decode($house->image);
                            @endphp
                            <div class="col-sm-12 col-md-4">
                                <div class="home-content">
                                    <a href="{{route('places.HouseDetail',[$house->id])}}">
                                        <div class="image">
                                            <img src="{{asset($images["0"]->image_path)}}" alt="" class="w-100"
                                                 style="max-height: 158px">
                                        </div>
                                        <p class="home-type">
                                            @foreach($types as $type)
                                                @if($type->key == $house->types)
                                                    {{$type->name}}
                                                @endif
                                            @endforeach
                                        </p>
                                        <p class="home-name">{{$house->name}}</p>
                                        <div class="home">
                                            <div class="home-detail d-flex">
                                                <p>{{$house->max_guest}} khách - {{$house->n_room}} phòng ngủ
                                                    - {{$house->n_bath}} phòng tắm</p>
                                            </div>
                                            <p class="home-address">
                                                {{$house->address}},
                                                {{$house->district->name}}
                                                ,{{$house->city->name}}
                                            </p>
                                            <div class="home-price">
                                                <p>
                                                    <span>{{$house->price}}</span> đ/đêm
                                                </p>
                                            </div>
                                            <div class="bottom-field row">
                                                <div class="home-star col-6 text-left">
                                                    <i class="fas fa-star" style="color: yellow"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                    <i class="fal fa-star"></i>
                                                </div>
                                                <div class="comment col-6 text-right">
                                                    <i class="far fa-comment-alt-lines"></i>
                                                    <span>
                                                       {{isset($comments) ? count($comments->where('h_id',$house->id)) : '0'}}
                                                    </span>
                                                </div>
                                            </div>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{$houseList->render()}}
                </div>
            </div>
        </div>
    </section>
@endsection
