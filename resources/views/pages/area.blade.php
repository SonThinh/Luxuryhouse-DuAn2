@extends('index')
@section('title','area')
@section('main')
    @include('layouts.banner')
    <div class="main">
        <div class="container">
            <h2 class="title">Địa điểm nổi bật</h2>
            <p class="mt-2">Cùng Luxury House chinh phục danh lam thắng cảnh của Việt Nam</p>
            <div class="row mt-2">
                @foreach($citiesList as $city)
                    @php
                        $image = json_decode($city->image);
                    @endphp
                    <div class="col-3">
                        <div class="top-destination-item">
                            <a href="{{route('places.CityDetail',[$city->id])}}">
                                <div class="img-place">
                                    <img src="{{asset($image->image_path)}}" class=" w-100" alt="">
                                </div>
                                <div class="content">
                                    <div class="row">
                                        <div class="col-sm-7 place">
                                            <h4>{{$city->name}}</h4>
                                        </div>
                                        <div class="col-sm-5 price">
                                            <p>
                                                {{count(collect($houses)->where('city_id',$city->id))}} căn hộ
                                            </p>
                                            <p class="icon"><i class="fal fa-chevron-circle-right"></i></p>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    {{--    @include('pages.service')--}}
@endsection
