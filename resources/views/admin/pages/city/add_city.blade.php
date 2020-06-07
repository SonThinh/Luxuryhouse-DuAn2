@extends('admin.index')
@section('title','addCity')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4 form-middle">
            <form action="{{route('admin.city.addCities')}}" class="form-horizontal" method="post"
                  enctype="multipart/form-data" id="upload">
                <div class="card-header py-3 d-flex">
                    <h3 class="m-0 font-weight-bold text-primary align-self-center">Thêm địa danh</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Thành phố</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="city_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Hình ảnh</label>
                        <div class="col-sm-8">
                            <label>
                                <input style="display:none;" name="image_city" type="file" accept="image/*"
                                       onchange="loadFile(event)">
                                <p class="upload-image">
                                    Chọn hình ảnh
                                </p>
                                <img id="output" alt="" style="width: 50%"/>
                            </label>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Mô tả</label>
                        <div class="col-sm-8">
                            <textarea id="city-description" class="form-control" name="city_description"
                                      rows="4"
                                      cols="2"></textarea>
                        </div>
                    </div>
                    <div class="d-flex">
                        <input type="submit" class="btn btn-block btn-primary m-auto" id="btn-city" value="Thêm">
                        <a href="{{route('admin.city.showCities')}}" type="submit"
                           class="btn btn-block btn-danger m-auto"
                           id="cancel">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
