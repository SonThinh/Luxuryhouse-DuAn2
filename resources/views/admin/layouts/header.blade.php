<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-lux sidebar sidebar-dark accordion" id="accordionSidebar">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
            <div class="sidebar-brand-icon">
                <img src="{{asset('../resources/assets/images/logo/logo.ico')}}" alt="" class="w-100">
            </div>
            <div class="sidebar-brand-text mx-3">Luxury Admin<sup>1</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{route('admin.dashboard')}}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Giao diện tài khoản
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>Tài khoản người dùng</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Quản lý tài khoản:</h6>
                    <a class="collapse-item" href="{{route('admin.user.showUsers')}}">Member</a>
                    <a class="collapse-item" href="{{route('admin.host.showHosts')}}">Host</a>
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Giao diện trang home
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
               aria-expanded="true" aria-controls="collapsePages">
                <i class="fas fa-fw fa-folder"></i>
                <span>Quản lý trang home</span>
            </a>
            <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">Địa danh, khu vực:</h6>
                    <a class="collapse-item" href="{{route('admin.city.showCities')}}">Địa danh</a>
                    <a class="collapse-item" href="{{route('admin.city.showAreas')}}">Khu vực</a>
                    <div class="collapse-divider"></div>
                    <h6 class="collapse-header">Nhà, Căn hộ:</h6>
                    <a class="collapse-item" href="{{route('admin.house.showViewType')}}">Dạng nhà</a>
                    <a class="collapse-item" href="{{route('admin.house.showViewUtility')}}">Tiện ích</a>
                    <a class="collapse-item" href="{{route('admin.house.showViewTripType')}}">Dạng chuyến đi</a>
                    <a class="collapse-item" href="{{route('admin.house.showViewHouses')}}">Nhà, căn hộ</a>
                    <h6 class="collapse-header">Sự kiện:</h6>
                    <a class="collapse-item" href="{{route('admin.event.showViewEvent')}}">Slider</a>
                </div>
            </div>
        </li>

        <!-- Nav Item - Charts -->
        <li class="nav-item">
            <a class="nav-link" href="{{route('admin.bill.showBills')}}">
                <i class="fas fa-fw fa-chart-area"></i>
                <span>Quản lý doanh thu</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>
                <ul class="navbar-nav ml-auto">
                    <!-- Nav Item - Alerts -->
                    {{--                    <li class="nav-item dropdown no-arrow mx-1">--}}
                    {{--                        <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"--}}
                    {{--                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">--}}
                    {{--                            <i class="fas fa-bell fa-fw"></i>--}}
                    {{--                            <!-- Counter - Alerts -->--}}
                    {{--                            <span class="badge badge-danger badge-counter">3+</span>--}}
                    {{--                        </a>--}}
                    {{--                        <!-- Dropdown - Alerts -->--}}
                    {{--                        <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"--}}
                    {{--                             aria-labelledby="alertsDropdown">--}}
                    {{--                            <h6 class="dropdown-header">--}}
                    {{--                                Alerts Center--}}
                    {{--                            </h6>--}}
                    {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                                <div class="mr-3">--}}
                    {{--                                    <div class="icon-circle bg-primary">--}}
                    {{--                                        <i class="fas fa-file-alt text-white"></i>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div>--}}
                    {{--                                    <div class="small text-gray-500">December 12, 2019</div>--}}
                    {{--                                    <span class="font-weight-bold">A new monthly report is ready to download!</span>--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                                <div class="mr-3">--}}
                    {{--                                    <div class="icon-circle bg-success">--}}
                    {{--                                        <i class="fas fa-donate text-white"></i>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div>--}}
                    {{--                                    <div class="small text-gray-500">December 7, 2019</div>--}}
                    {{--                                    $290.29 has been deposited into your account!--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                            <a class="dropdown-item d-flex align-items-center" href="#">--}}
                    {{--                                <div class="mr-3">--}}
                    {{--                                    <div class="icon-circle bg-warning">--}}
                    {{--                                        <i class="fas fa-exclamation-triangle text-white"></i>--}}
                    {{--                                    </div>--}}
                    {{--                                </div>--}}
                    {{--                                <div>--}}
                    {{--                                    <div class="small text-gray-500">December 2, 2019</div>--}}
                    {{--                                    Spending Alert: We've noticed unusually high spending for your account.--}}
                    {{--                                </div>--}}
                    {{--                            </a>--}}
                    {{--                            <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>--}}
                    {{--                        </div>--}}
                    {{--                    </li>--}}

                    <div class="topbar-divider d-none d-sm-block"></div>

                    <!-- Nav Item - User Information -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            @php
                                $image = json_decode(auth()->user()->avatar);
                            @endphp
                            <span
                                class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->name ?? auth()->user()->email}}</span>
                            <img class="img-profile rounded-circle"
                                 src="@isset($image->image_path){{asset($image->image_path)}}@else{{asset('../resources/assets/images/avatar/avatar-default.png')}} @endisset"
                                 alt="">
                        </a>
                        <!-- Dropdown - User Information -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="#">
                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                Settings
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                Logout
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- End of Topbar -->
            <!-- Logout Modal-->
            <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                 aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Chắn chắn rời đi?</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">Chọn thoát để thoát ra</div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Hủy</button>
                            <a class="btn btn-primary" href="{{route('logout')}}">Thoát</a>
                        </div>
                    </div>
                </div>
            </div>
