@extends('admin.index')
@section('title','dashboard')
@section('content')
    <!-- /inner_content_w3_agile_info-->
    <div class="inner_content_w3_agile_info">
        <!-- /agile_top_w3_grids-->
        <div class="agile_top_w3_grids">
            <ul class="ca-menu">
                <li>
                    <a href="#">
                        <i class="fas fa-warehouse-alt"></i>
                        <div class="ca-content">
                            <h4 class="ca-main">16,808</h4>
                            <h3 class="ca-sub">Phòng, căn hộ</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.user.showUsers')}}">
                        <i class="fas fa-users"></i>
                        <div class="ca-content">
                            <h4 class="ca-main one">26,808</h4>
                            <h3 class="ca-sub one">Tài khoản</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="{{route('admin.city.showCities')}}">
                        <i class="far fa-city"></i>
                        <div class="ca-content">
                            <h4 class="ca-main two">29,008</h4>
                            <h3 class="ca-sub two">Khu vực, thành phố</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-taxi"></i>
                        <div class="ca-content">
                            <h4 class="ca-main three">49,436</h4>
                            <h3 class="ca-sub three">Loại hình dịch vụ</h3>
                        </div>
                    </a>
                </li>
                <li>
                    <a href="#">
                        <i class="far fa-clone"></i>
                        <div class="ca-content">
                            <h4 class="ca-main four">30,808</h4>
                            <h3 class="ca-sub four">Top,Banner,Event,Slider</h3>
                        </div>
                    </a>
                </li>
                <div class="clearfix"></div>
            </ul>
        </div>
        <!-- //agile_top_w3_grids-->
        <!-- /agile_top_w3_post_sections-->
        <div class="agile_top_w3_post_sections">
            <div class="col-md-6 agile_top_w3_post_info agile_info_shadow">
                <div class="img_wthee_post1">
                    <h3 class="w3_inner_tittle"> Flip Clock</h3>
                    <div class="main-example">
                        <div class="clock"></div>
                        <div class="message"></div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 agile_top_w3_post agile_info_shadow">
                <div class="img_wthee_post">
                    <h3 class="w3_inner_tittle">Latest Report</h3>
                    <div class="stats-wrap">
                        <div class="count_info"><h4 class="count">65,800,587 </h4><span
                                class="year">Total Companies</span></div>
                        <div class="year-info"><p class="text-no">20 </p><span class="year">This Year</span></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="stats-wrap">
                        <div class="count_info"><h4 class="count">2,690 </h4><span class="year">Total Companies</span>
                        </div>
                        <div class="year-info"><p class="text-no">40 </p><span class="year">This Month</span></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="stats-wrap">
                        <div class="count_info"><h4 class="count">24,660 </h4><span class="year">Total Companies</span>
                        </div>
                        <div class="year-info"><p class="text-no">30 </p><span class="year">This Week</span></div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="stats-wrap">
                        <div class="count_info"><h4 class="count">1,204</h4><span class="year">Total Companies</span>
                        </div>
                        <div class="year-info"><p class="text-no">10 </p><span class="year">This Day</span></div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
        <!-- //agile_top_w3_post_sections-->
    </div>
    <!-- //inner_content_w3_agile_info-->
@endsection

