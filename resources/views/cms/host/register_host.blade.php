@extends('cms.member.nav.member')
@section('title','member host')
@section('main-user')
    <div class="notify">
        <h2 class="title mb-2">Đăng ký host</h2>
        <div class="edit-form m-3">
            <h2 class="text-center mt-4">Đăng ký host</h2>
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
                        </div>
                        <div class="form-group">
                            <label>
                                <p class="ml-2 upload-icon">Hình ảnh chứng minh nhân dân</p>
                                <input id="id_card_image" type="file" name="imgIdCard" class="d-none">
                            </label>

                            <div id="preview_id_card"></div>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" name="business_license"
                                   placeholder="Giấy phép kinh doanh (nếu có)">
                        </div>
                        <div class="form-group">
                            <label>
                                <p class="ml-2 upload-icon">Hình ảnh giấy phép kinh doanh(nếu có)</p>
                                <input id="business_license_image" type="file" class="d-none" name="imgBL">
                            </label>

                            <div id="preview_business_license"></div>
                        </div>
                        <input type="submit" value="Đăng ký host" id="btn-reg-host" class="btn btn-block btn-success">
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
