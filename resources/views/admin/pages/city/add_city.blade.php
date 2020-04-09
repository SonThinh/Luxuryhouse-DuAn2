@extends('admin.index')
@section('title','addCity')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <div class="forms-main_agileits">
            <div class="wthree_general graph-form agile_info_shadow ">
                <h2 class="w3_inner_tittle text-center">Thêm khu vực, thành phố</h2>
                <div style="width: 25%; margin: auto;">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('success')}}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-body post-form">
                    <form action="{{route('admin.city.addCities')}}" class="form-horizontal " method="post"
                          enctype="multipart/form-data" id="upload">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Thành phố</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="city_name">
                                @if($errors->has('city_name'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('city_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="upload-ad-photos">
                                <label class="col-sm-2 control-label">Hình ảnh</label>
                                <div class="photos-upload-view col-sm-8">
                                    <label>
                                        <input style="display:none;" name="image_city" type="file" accept="image/*" onchange="loadFile(event)">
                                        <p class="upload-image">
                                            Chọn hình ảnh
                                        </p>
                                    </label>

                                    <img id="output" alt="" style="width: 50%;"/>
                                    @if($errors->has('image_city'))
                                        <div class="alert alert-danger alert-dismissible" style="width: 93%">
                                            <a href="#" class="close" data-dismiss="alert"
                                               aria-label="close">&times;</a>
                                            <strong>{{ $errors->first('image_city') }}</strong>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mô tả</label>
                            <div class="col-sm-8">
                                    <textarea id="city-description" name="city_description" rows="4"
                                              cols="2"></textarea>
                                @if($errors->has('city_description'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('city_description') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="btn-bot">
                            <input type="submit" class="btn btn-block btn-primary" value="Thêm">
                            <a href="{{route('admin.city.showCities')}}" type="submit" class="btn btn-block btn-danger"
                               id="cancel">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var loadFile = function (event) {
            var old = document.getElementById('img-old');
            if (old) {
                old.remove();
                var reader = new FileReader();
                reader.onload = function () {
                    var output = document.getElementById('output');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            } else {
                var reader = new FileReader();
                reader.onload = function () {
                    var output = document.getElementById('output');
                    output.src = reader.result;
                };
                reader.readAsDataURL(event.target.files[0]);
            }
        };
    </script>
@endsection
