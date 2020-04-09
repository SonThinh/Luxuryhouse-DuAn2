@extends('admin.index')
@section('title','manageHouse')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <div class="agile_top_w3_grids">
            <ul class="ca-menu manageHouse">
                <li>
                    <a href="{{route('admin.house.showViewHouses')}}">
                        <i class="fas fa-warehouse-alt"></i>
                        <div class="ca-content">
                            <h4 class="ca-main">16,808</h4>
                            <h3 class="ca-sub">Phòng, căn hộ</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.house.showViewUtility')}}">
                        <i class="fas fa-refrigerator"></i>
                        <div class="ca-content">
                            <h4 class="ca-main one">26,808</h4>
                            <h3 class="ca-sub one">Tiện ích</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.house.showViewType')}}">
                        <i class="far fa-city"></i>
                        <div class="ca-content">
                            <h4 class="ca-main two">29,008</h4>
                            <h3 class="ca-sub two">Các dạng nhà</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.house.showViewTripType')}}">
                        <i class="far fa-biking"></i>
                        <div class="ca-content">
                            <h4 class="ca-main two">29,008</h4>
                            <h3 class="ca-sub two">Các dạng chuyến đi</h3>
                        </div>
                    </a>
                </li>
                <div class="clearfix"></div>
            </ul>
        </div>
@endsection
