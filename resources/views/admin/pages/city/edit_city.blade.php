@extends('admin.index')
@section('title','editCity')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <div class="forms-main_agileits">
            <div class="wthree_general graph-form agile_info_shadow ">
                <h2 class="w3_inner_tittle text-center">Sửa khu vực, thành phố</h2>
                <div style="width: 25%; margin: auto;">
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('error')}}</strong>
                        </div>
                    @endif
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('success')}}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-body post-form">
                    <form action="{{route('admin.city.editCities',[$city->id])}}" class="form-horizontal " method="post"
                          enctype="multipart/form-data" id="upload">
                        @csrf
                        <input type="hidden" value="{{$city->id}}">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Thành phố</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="city_name" value="{{$city->name}}">
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
                                @php
                                    $image = json_decode($city->image);
                                @endphp

                                <div class="photos-upload-view col-sm-8">
                                    <input name="image_city" type="file" accept="image/*" onchange="loadFile(event)">
                                    <img id="img-old" src="{{asset($image->image_path)}}" alt="" style="width: 50%"/>
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
                                              cols="2">{{$city->description}}</textarea>
                                @if($errors->has('city_description'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('city_description') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Các khu vực</label>
                            <div class="col-sm-8 area-form">
                                @php
                                    $areas = json_decode($city->areas);
                                @endphp
                                @foreach($areas as $area)
                                    <div class="area">
                                        <input type="text" class="form-control1" name="city_areas[]" value="{{$area}}">
                                    </div>
                                @endforeach
                                <div class="input-group-btn">
                                    <button type="button" class="btn btn-success" onclick="addClone()"><i
                                            class="far fa-plus-circle"></i> Add
                                    </button>
                                </div>
                                @if($errors->has('city_areas.*'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('city_areas.*') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="btn-bot">
                            <input type="submit" class="btn btn-block btn-primary" value="Sửa" id="add_city">
                            <a href="{{route('admin.city.showCities')}}" type="submit" class="btn btn-block btn-danger"
                               id="cancel">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function addClone() {
            if ($('.area').length > 15) {
                return false;
            }
            $($('.area').prop('outerHTML')).insertBefore('.input-group-btn');
        }

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
