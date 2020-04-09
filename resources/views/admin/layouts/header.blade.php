<div class="wthree_agile_admin_info">
    <!-- /w3_agileits_top_nav-->
    <!-- /nav-->
    <div class="w3_agileits_top_nav">
        <ul id="gn-menu" class="gn-menu-main">
            <!-- /nav_agile_w3l -->
            <li class="gn-trigger">
                <a class="gn-icon gn-icon-menu"><i class="fa fa-bars" aria-hidden="true"></i><span>Menu</span></a>
                <nav class="gn-menu-wrapper">
                    <div class="gn-scroller scrollbar1">
                        <ul class="gn-menu agile_menu_drop">
                            <li><a href="{{route('admin.dashboard')}}"><i class="far fa-tachometer-alt-slowest"></i>
                                    Dashboard</a></li>
                            <li><a href="{{route('admin.user.showUsers')}}"><i class="fas fa-users"></i> Tài khoản</a></li>
                            <li><a href="{{route('admin.city.showCities')}}"><i class="far fa-city"></i> Khu vực, thành phố</a>
                            </li>
                            <li><a href="{{route('admin.house.showDashboard')}}"><i class="fas fa-warehouse-alt"></i> Phòng, căn hộ</a></li>
                            <li><a href="{{route('admin.user.showUsers')}}"><i class="far fa-taxi"></i> Loại hình dịch vụ</a></li>
                            <li><a href="{{route('admin.user.showUsers')}}"><i class="far fa-clone"></i> Top,banner,event,slide</a></li>

                        </ul>
                    </div><!-- /gn-scroller -->
                </nav>
            </li>
            <!-- //nav_agile_w3l -->
            <li class="second logo"><h1><a href="{{route('admin.dashboard')}}"><i class="fa fa-graduation-cap"
                                                                                  aria-hidden="true"></i>{{isset(auth()->user()->username) ? auth()->user()->username : auth()->user()->email}}
                    </a></h1></li>
            <li class="second admin-pic">

                <ul class="top_dp_agile">
                    <li class="dropdown profile_details_drop">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                            <div class="profile_img">
                                <span class="prfil-img"><img
                                        src="{{asset('../resources/assets/admin/images/admin.jpg')}}" alt=""> </span>
                            </div>
                        </a>
                        <ul class="dropdown-menu drp-mnu">
                            <li><a href="#"><i class="fa fa-cog"></i> Settings</a></li>
                            <li><a href="#"><i class="fa fa-user"></i> Profile</a></li>
                            <li><a href="{{route('logout')}}"><i class="fa fa-sign-out"></i> Logout</a></li>
                        </ul>
                    </li>

                </ul>
            </li>
            <li class="second full-screen">
                <section class="full-top">
                    <button id="toggle"><i class="fa fa-arrows-alt" aria-hidden="true"></i></button>
                </section>
            </li>
        </ul>
        <!-- //nav -->
    </div>
    <div class="clearfix"></div>
    <!-- //w3_agileits_top_nav-->
