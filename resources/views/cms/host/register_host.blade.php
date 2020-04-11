@extends('index')
@section('title','register_host')
@section('main')
    <div class="container">
        <div class="register-host mx-auto my-5" id="login-form">
            <h2 class="text-center mt-4">Đăng ký host</h2>
            @if(Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                    <strong>{{ Session::get('success')}}</strong>
                </div>
            @endif
            <form action="{{route('users.host',[$user->id])}}" method="post" class="mt-3 host-form" autocomplete="off"
                  enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <input class="form-control" type="text" disabled name="email" value="{{$user->email}}">
                            <input type="hidden" name="member_id" value="{{$user->id}}">
                        </div>
                        <div class="form-group">
                            <input class="form-control" type="text" name="id_card" placeholder="Chứng minh nhân dân">
                            @if($errors->has('id_card'))
                                <div class="alert alert-danger alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ $errors->first('id_card') }}</strong>
                                </div>
                            @endif
                        </div>
                        <div class="form-group">
                            <label>
                                <p class="ml-2 upload-icon">Hình ảnh chứng minh nhân dân</p>
                                <input id="id_card_image" type="file" multiple name="imgIdCard[]" class="d-none">
                            </label>

                            <div id="preview_id_card"></div>
                        </div>
                        @if($errors->has('id_card_image'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{ $errors->first('id_card_image') }}</strong>
                            </div>
                        @endif
                        <div class="form-group">
                            <input type="text" class="form-control" name="business_license"
                                   placeholder="Giấy phép kinh doanh (nếu có)">
                        </div>
                        <div class="form-group">
                            <label>
                                <p class="ml-2 upload-icon">Hình ảnh giấy phép kinh doanh(nếu có)</p>
                                <input id="business_license_image" type="file" multiple class="d-none" name="imgBL[]">
                            </label>

                            <div id="preview_business_license"></div>
                        </div>
                        <input type="submit" value="Đăng ký host" class="btn btn-block btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
