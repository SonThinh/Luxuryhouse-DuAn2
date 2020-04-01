<header>
    <div class="top-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="{{route('place')}}">
                    <div class="logo d-flex">
                        <img src="{{asset('../resources/assets/home/images/logo/logo.png')}}">
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
                <div class="collapse navbar-collapse justify-content-center pr-md-4" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link {{ (request()->segment(1) == 'place') ? 'active' : '' }}"
                               href="{{route('place')}}"><span>Địa điểm</span></a>
                        </li>
                        @if(Auth::check())
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    @php
                                        $image = json_decode(auth()->user()->avatar);
                                    @endphp
                                    @isset($image)
                                        <img src="{{asset($image->image_path)}}" class="avatar" alt="">
                                    @else
                                        <img
                                            src="{{asset('../resources/assets/home/images/avatar/avatar-default.png')}}"
                                            class="avatar" alt="">
                                    @endisset
                                    <span>{{isset(auth()->user()->username) ? auth()->user()->username : auth()->user()->email}}</span>
                                    <b class="caret"></b></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{route('users.showProfile',[auth()->user()->id])}}"><i
                                                class="fal fa-id-card"></i> Hồ sơ cá nhân</a></li>
                                    <li><a href="{{route('users.logout')}}"><i class="fal fa-sign-out-alt"></i> Đăng
                                            xuất</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <input type="submit" class="btn btn-block btn-register-host" value="Host">
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
