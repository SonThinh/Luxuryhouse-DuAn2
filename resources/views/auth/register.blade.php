@extends('index')
@section('title','register')
@section('main')
    <div class="container">
        <div class="register-form" id="register-form">
            <h2 class="text-center mt-4">Đăng ký thành viên</h2>
            <form action="{{route('users.register')}}" method="post" class="mt-3" autocomplete="off">
                @csrf
                <div class="row mb-3">
                    <div class="vl">
                        <span class="vl-innertext">hoặc</span>
                    </div>
                    <div class="col">
                        <div class="d-block">
                            <p class="m-auto">Đã có tài khoản?</p>
                            <a type="button" class="btn btn-block btn-primary" href="{{route('users.login')}}">Đăng
                                nhập</a>
                        </div>
                        <a href="#" class="fb btn btn-block mt-2">
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
                            <input class="register-input form-control" type="text" name="email" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <input class="register-input form-control" type="text" name="phone" placeholder="Số điện thoại">
                        </div>
                        <div class="form-group">
                            <input class="register-input form-control" type="password" name="password" placeholder="Mật khẩu">
                        </div>
                        <div class="form-group">
                            <input class="register-input form-control" type="password" name="password_confirmation"
                                   placeholder="Xác nhận mật khẩu mới">
                        </div>
                        <input type="submit" value="Đăng ký" class="btn btn-block btn-primary" id="btn-reg">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
