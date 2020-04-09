@extends('admin.index')
@section('title','manageCity')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <div class="agile_top_w3_grids">
            <ul class="ca-menu manageHouse">
                <li>
                    <a href="{{route('admin.city.showCities')}}">
                        <i class="fas fa-warehouse-alt"></i>
                        <div class="ca-content">
                            <h4 class="ca-main">16,808</h4>
                            <h3 class="ca-sub">Tỉnh,Thành phố</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.city.showAreas')}}">
                        <i class="fas fa-refrigerator"></i>
                        <div class="ca-content">
                            <h4 class="ca-main one">26,808</h4>
                            <h3 class="ca-sub one">Khu vực</h3>
                        </div>
                    </a>
                </li>
                <div class="clearfix"></div>
            </ul>
        </div>
@endsection
