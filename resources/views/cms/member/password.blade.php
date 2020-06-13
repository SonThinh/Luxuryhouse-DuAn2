@extends('cms.member.nav.member')
@section('title','member dashboard')
@section('main-user')
    <div class="notify">
        <h2 class="title mb-2">Đổi mật khẩu</h2>
        <div class="edit-form m-3">
            <h2 class="text-center mt-4">Đổi mật khẩu</h2>
            <form action="{{route('users.dashboard.updatePass',[$user->id])}}" method="post" class="mt-3"
                  autocomplete="off">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input type="text" class="form-control" name="email" disabled
                                   value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password" placeholder="Mật khẩu">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" name="password_confirmation"
                                   placeholder="Xác nhận mật khẩu mới">
                        </div>
                        <input class="btn btn-block btn-primary" type="submit" id="btn-change-pass" value="Cập nhật">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


