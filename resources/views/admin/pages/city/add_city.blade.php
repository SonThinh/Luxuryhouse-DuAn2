@extends('admin.index')
@section('title','addCity')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <div class="forms-main_agileits">
            <div class="wthree_general graph-form agile_info_shadow ">
                <h2 class="w3_inner_tittle text-center">Thêm khu vực, thành phố</h2>
                <div class="form-body post-form">
                    <form action="{{route('admin.city.addCities')}}" class="form-horizontal " method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Thành phố</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="city_name">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Hình ảnh</label>
                            <div class="col-sm-8">
                                <textarea class="ckeditor" name="city_image"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Mô tả</label>
                            <div class="col-sm-8">
                                    <textarea class="ckeditor" name="city_description" rows="4"
                                              cols="2"></textarea>
                                <script type="text/javascript">
                                    CKEDITOR.replace('city_description', {
                                        filebrowserBrowseUrl: '../resources/assets/ckfinder/ckfinder.html',
                                        filebrowserUploadUrl: '../resources/assets/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
                                        filebrowserWindowWidth: '1000',
                                        filebrowserWindowHeight: '700'
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Các khu vực</label>
                            <div class="col-sm-8 area-form">
                                <div class="area">
                                    <input type="text" class="form-control1" name="city_areas">
                                    <a href="#"><i class="far fa-times" style="color: red"></i></a>
                                </div>
                                <p><a href="#"><i class="far fa-plus-circle"></i> Thêm khu vực</a></p>
                            </div>
                        </div>
                        <div class="btn-bot">
                            <input type="submit" class="btn btn-block btn-primary" value="Thêm" id="add_city">
                            <a href="{{route('admin.city.showCities')}}" type="submit" class="btn btn-block btn-danger"
                               id="cancel">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

