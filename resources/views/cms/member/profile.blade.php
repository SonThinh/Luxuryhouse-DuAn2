@extends('index')
@section('title','profile')
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
                    <h2 class="text-center mt-4">Thông tin thành viên</h2>
                    <form action="{{route('users.updateUser',[$user->id])}}" method="post" class="mt-3"
                          autocomplete="off" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col">
                                @if(Session::has('success'))
                                    <div class="alert alert-success alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ Session::get('success')}}</strong>
                                    </div>
                                @endif
                                @php
                                    $image = json_decode($user->avatar);
                                @endphp

                                <label>
                                    <input name="avatar" type="file" accept="image/*" onchange="loadFile(event)"
                                           class="d-none">
                                    @isset($image)
                                        <img id="img-old" src="{{asset($image->image_path)}}" alt=""
                                             style="width: 50%"/>
                                        <img id="output" alt=""
                                             style="width: 50%;"/>
                                    @else
                                        <img id="img-old" alt=""
                                             src="{{asset('../resources/assets/home/images/avatar/avatar-default.png')}}"
                                             style="width: 50%;"/>
                                        <img id="output" alt=""
                                             style="width: 50%;"/>
                                    @endisset
                                </label>

                                <input type="text" class="form-control" name="email" disabled
                                       value="{{$user->email}}">
                                <input class="form-control" type="text" name="name" placeholder="Tên"
                                       value="{{$user->username}}">
                                <input class="form-control" type="text" name="address" placeholder="Địa chỉ"
                                       value="{{$user->address}}">
                                <input class="form-control" type="date" name="birth" placeholder="Ngày sinh"
                                       value="{{$user->birth}}">
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="male"
                                               @if($user->gender === 'male') checked @endif>Nam
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="female"
                                               @if($user->gender === 'female') checked @endif>Nữ
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="gender" value="other"
                                               @if($user->gender === 'other') checked @endif>Khác
                                    </label>
                                </div>
                                <input class="form-control" type="tel" name="phone" placeholder="Số điện thoại"
                                       value="{{$user->phone}}">
                                <input class="form-control" type="text" name="google" placeholder="Google"
                                       value="{{$user->google}}">
                                <input class="form-control" type="text" name="fb" placeholder="Facebook"
                                       value="{{$user->facebook}}">
                                <textarea class="form-control" name="description" rows="5"
                                          placeholder="Mô tả về bản thân">@isset($user->description){{$user->facebook}}@endisset</textarea>
                                <input class="btn btn-block btn-success" type="submit" value="Cập nhật">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
