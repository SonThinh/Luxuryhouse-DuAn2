@extends('index')
@section('title','area')
@section('main')
    @include('layouts.banner')
    <div class="main p-3">
        <div class="container">
            <h2 class="title">Địa điểm nổi bật</h2>
            <p class="mt-2">Cùng Luxury House chinh phục danh lam thắng cảnh của Việt Nam</p>
            <div class="card-columns mt-2">
                @foreach($citiesList as $city)
                    @php
                        $image = json_decode($city->image);
                    @endphp
                    <div class="card">
                        <a href="#">
                            <img src="{{asset($image->image_path)}}" class="w-100" alt="">
                            <div class="card-items">
                                <div class="card-body">{{$city->name}}</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            {{$citiesList->render()}}
        </div>
    </div>
    @include('pages.service')
@endsection
