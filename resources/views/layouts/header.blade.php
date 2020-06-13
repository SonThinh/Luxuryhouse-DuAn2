<header id="header">
    <div class="top-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="{{route('place')}}">
                    <div class="logo d-flex">
                        <img src="{{asset('../resources/assets/images/logo/logo.png')}}">
                        <div class="logo-name text-uppercase ml-1 mt-2 d-block">
                            <p>Luxury<br>house</p>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-center" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->segment(1) == 'place') ? 'active' : '' }}"
                               href="@if((request()->segment(1) == 'place')) javascript:void(0) @else {{route('place')}} @endif"><span>Địa điểm</span></a>
                        </li>
                        @if(Auth::check())
                            <li class="nav-item">
                                <a class="nav-link"
                                   href="@if((request()->segment(2) == 'dashboard')) javascript:void(0) @else {{route('users.dashboard.showDashboard',[auth()->user()->id])}} @endif">
                                    @php
                                        $image = json_decode(auth()->user()->avatar);
                                    @endphp
                                    <img
                                        src="{{isset($image) ? asset($image->image_path) : asset('../resources/assets/images/avatar/avatar-default.png')}}"
                                        class="avatar" alt="">
                                    <span>{{isset(auth()->user()->name) ? auth()->user()->name : auth()->user()->email}}</span>
                                    <b class="caret"></b>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('users.logout')}}"><span><i
                                            class="fal fa-sign-out-alt"></i> Đăng xuất</span></a>
                            </li>
                        @else
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->segment(2) == 'login') ? 'active' : '' }}"
                                   href="{{route('users.login')}}"><span>Đăng nhập</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link {{ (request()->segment(2) == 'register') ? 'active' : '' }}"
                                   href="{{route('users.register')}}"><span>Đăng ký</span></a>
                            </li>
                        @endif
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- //Navigation -->
