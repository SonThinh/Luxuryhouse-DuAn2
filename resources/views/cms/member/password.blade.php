@extends('index')
@section('title','member password')
@section('main')
    <div class="container">
        <div class="m-4">
            @include('cms.member.menu')
            <div class="content-host">
                <div class="edit-form m-3">
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
