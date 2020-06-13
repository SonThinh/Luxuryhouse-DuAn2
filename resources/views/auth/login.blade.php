@extends('index')
@section('title','login')
@section('main')
    <div class="container">
        <div class="login-form" id="login-form">
            <h2 class="text-center mt-4">Đăng nhập</h2>
            <form action="{{route('users.login')}}" method="post" class="mt-3" autocomplete="off">
                @csrf
                <div class="row">
                    <div class="vl">
                        <span class="vl-innertext">hoặc</span>
                    </div>
                    <div class="col">
                        <a href="#" class="fb btn btn-block">
                            <i class="fab fa-facebook-f"></i> Đăng nhập bằng Facebook
                        </a>
                        <a href="#" class="google btn btn-block">
                            <i class="fab fa-google-plus-g"></i> Đăng nhập với Google+
                        </a>
                    </div>

                    <div class="col">
                        <div class="hide-md-lg">
                            <p>hoặc</p>
                        </div>
                        <div class="form-group">
                            <input class="login-input form-control" type="text" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="login-input form-control" type="password" name="password" placeholder="Mật khẩu">
                        </div>
                        <div class="form-group">
                            <input type="checkbox" class="form-group" name="remember" value="Remember me"> Remember me
                        </div>

                        <input type="submit" value="Đăng nhập" class="btn btn-block btn-primary" id="btn-login">
                    </div>
                </div>
                <div class="bottom-button mt-4">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('users.register')}}" style="color:white" class="btn btn-block">Đăng ký</a>
                        </div>
                        <div class="col">
                            <a href="#" style="color:white" class="btn btn-block">Quên mật khẩu ?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
