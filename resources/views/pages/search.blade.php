@extends('index')
@section('title','place detail')
@section('main')
    <div class="main p-3">
        <div class="container">
            <div class="my-3">
                @include('layouts.search_location_nav')
            </div>
            <div class="row ">
                <div class="col-md-3">
                    @include('layouts.search_nav_left_search')
                </div>
                <div class="col-md-9 content">
                    <div class="d-inline-block w-100">
                        <h2 class="float-left">{{count($houses)}} homestay
                            @isset($cities) @if($cities->count() != 0 ) @foreach($cities as $city) {{$city->name}} @endforeach @else @endif @endisset</h2>
                    </div>
                    <div class="row ml-1 mt-2">
                        @foreach($houses as $house)
                            @php
                                $images = json_decode($house->image);
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
                                        <p>{{$house->max_guest}} khách - {{$house->n_room}} phòng ngủ
                                            - {{$house->n_bath}} phòng tắm</p>
                                    </div>
                                    <p class="home-price">
                                        @if(\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Sunday' ||
                                            \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Saturday' ||
                                            \Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Friday')
                                            {{$house->price_f_to_s}} đ/đêm
                                        @else
                                            {{$house->price_m_to_t}} đ/đêm
                                        @endif
                                    </p>
                                    <p class="home-address">
                                        {{$house->address}},
                                        @foreach($districts as $district)
                                            @if($district->id == $house->district_id)
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
                    {{$houses->render()}}
                </div>
            </div>
        </div>
    </div>
@endsection
