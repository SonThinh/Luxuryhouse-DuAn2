@extends('admin.index')
@section('title','editArea')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <div class="forms-main_agileits">
            <div class="wthree_general graph-form agile_info_shadow ">
                <h2 class="w3_inner_tittle text-center">Sửa khu vực</h2>
                <div style="width: 25%; margin: auto;">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('success')}}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-body post-form">
                    <form action="{{route('admin.city.editAreas',[$areas->id])}}" class="form-horizontal "
                          method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Thành phố</label>
                            <div class="col-sm-8">
                                @foreach($cities as $city)
                                    <input type="radio" name="city_name"
                                           value="{{$city->id}}"
                                           @if($city->id === $areas->city_id)
                                           checked
                                        @endif
                                    > {{$city->name}}
                                @endforeach
                                @if($errors->has('area_name'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('area_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Tên khu vực</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="area_name" value="{{$areas->name}}">
                                @if($errors->has('area_name'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('area_name') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="btn-bot">
                            <input type="submit" class="btn btn-block btn-primary" value="Thêm">
                            <a href="{{route('admin.city.showAreas')}}" type="submit" class="btn btn-block btn-danger"
                               id="cancel">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
