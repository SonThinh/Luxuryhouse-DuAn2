@extends('admin.index')
@section('title','editUser')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <div class="forms-main_agileits">
            <div class="wthree_general graph-form agile_info_shadow ">
                <h2 class="w3_inner_tittle text-center">Thêm tài khoản</h2>
                <div style="width: 25%; margin: auto;">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('success')}}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-body post-form">
                    <form action="{{route('admin.user.editUsers',[$user->id])}}" class="form-horizontal " method="post"
                          enctype="multipart/form-data" id="upload">
                        @csrf
                        <div class="form-group">
                            <div class="upload-ad-photos">
                                <label class="col-sm-2 control-label">Avatar</label>
                                <div class="photos-upload-view col-sm-8">
                                    <input name="avatar" type="file" accept="image/*" onchange="loadFile(event)">

                                    <img id="output" alt="" style="width: 50%"/>
                                    @if($errors->has('avatar'))
                                        <div class="alert alert-danger alert-dismissible" style="width: 93%">
                                            <a href="#" class="close" data-dismiss="alert"
                                               aria-label="close">&times;</a>
                                            <strong>{{ $errors->first('avatar') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Email</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="email">
                                @if($errors->has('email'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mật khẩu</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control1" name="pass" placeholder="********">
                                @if($errors->has('pass'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('pass') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Họ tên</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="username">
                                @if($errors->has('username'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Địa chỉ</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="address">
                                @if($errors->has('address'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Giới tính</label>
                            <div class="col-sm-8">
                                <select name="gender">
                                    <option value="default">Chọn giới tính</option>
                                    <option value="male">Nam</option>
                                    <option value="female">Nữ</option>
                                    <option value="other">Khác</option>
                                </select>
                                @if($errors->has('gender'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Ngày sinh</label>
                            <div class="col-sm-8">
                                <input type="date" class="form-control1" name="birth">
                                @if($errors->has('birth'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('birth') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Số điện thoại</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="phone">
                                @if($errors->has('phone'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('phone') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tài khoản Google</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="google">
                                @if($errors->has('google'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('google') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tải khoản Facebook</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="fb">
                                @if($errors->has('fb'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('fb') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mô tả</label>
                            <div class="col-sm-8">
                                    <textarea id="user-description" name="description" rows="4"
                                              cols="2"></textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="btn-bot">
                            <input type="submit" class="btn btn-block btn-primary" value="Thêm" id="add">
                            <a href="{{route('admin.user.showUsers')}}" type="submit" class="btn btn-block btn-danger"
                               id="cancel">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var loadFile = function (event) {
            var reader = new FileReader();
            reader.onload = function () {
                var output = document.getElementById('output');
                output.src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        };

    </script>
@endsection
