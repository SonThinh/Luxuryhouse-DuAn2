@extends('admin.index')
@section('title','manageCity')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <div class="agile_top_w3_grids">
            <ul class="ca-menu manageHouse">
                <li>
                    <a href="{{route('admin.event.showViewEvent')}}">
                        <i class="fal fa-calendar-star"></i>
                        <div class="ca-content">
                            <h4 class="ca-main">16,808</h4>
                            <h3 class="ca-sub">Event</h3>
                        </div>
                    </a>
                </li>
                <div class="clearfix"></div>
            </ul>
        </div>
@endsection
