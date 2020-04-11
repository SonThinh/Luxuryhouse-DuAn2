@extends('index')
@section('title','password')
@section('main')
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="register-form m-5">
                    @include('cms.member.menu')
                </div>
            </div>
            <div class="col-md-8">
                <div class="edit-form m-5">
                    <h2 class="text-center mt-4">Đổi mật khẩu</h2>
                    <form action="{{route('users.updatePass',[$user->id])}}" method="post" class="mt-3"
                          autocomplete="off">
                        @csrf
                        <div class="row">
                            <div class="col">
                                <input type="text" class="form-control" name="email" disabled
                                       value="{{$user->email}}">
                                <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                                @if($errors->has('password'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                                <input type="password" class="form-control" name="password_confirmation" placeholder="Xác nhận mật khẩu mới">
                                @if($errors->has('password'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </div>
                                @endif
                                <input class="btn btn-block btn-success" type="submit" value="Cập nhật">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection