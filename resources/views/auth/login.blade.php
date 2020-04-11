@extends('index')
@section('title','login')
@section('main')
    <div class="container">
        <div class="login-form m-5" id="login-form">
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
                        @if(Session::has('error'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{ Session::get('error')}}</strong>
                            </div>
                        @endif
                        <input class="login-input" type="text" name="email" placeholder="Email">
                        @if($errors->has('email'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                        <input class="login-input" type="password" name="password" placeholder="Mật khẩu">
                        @if($errors->has('password'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                        <input type="submit" value="Đăng nhập" class="btn btn-block btn-success" id="btn-login">
                    </div>
                </div>
                <div class="bottom-button mt-4">
                    <div class="row">
                        <div class="col">
                            <a href="{{route('users.register')}}" style="color:white" class="btn">Đăng ký</a>
                        </div>
                        <div class="col">
                            <a href="#" style="color:white" class="btn">Quên mật khẩu ?</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
