@extends('admin.index')
@section('title','addUtility')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <div class="forms-main_agileits">
            <div class="wthree_general graph-form agile_info_shadow ">
                <h2 class="w3_inner_tittle text-center">Sửa tiện ích</h2>
                <div style="width: 25%; margin: auto;">
                    @if(Session::has('success'))
                        <div class="alert alert-success alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('success')}}</strong>
                        </div>
                    @endif
                </div>
                <div class="form-body post-form">
                    <form action="{{route('admin.house.editUtility',[$utility->id])}}" class="form-horizontal " method="post">
                        @csrf
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Biểu tượng</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="symbol" value="{{$utility->symbol}}">
                                @if($errors->has('symbol'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('symbol') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Từ khóa</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="key" value="{{$utility->key}}">
                                @if($errors->has('key'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('key') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Icon</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control1" name="icon" value="{{$utility->icon}}">
                                @if($errors->has('icon'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('icon') }}</strong>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="btn-bot">
                            <input type="submit" class="btn btn-block btn-primary" value="Sửa">
                            <a href="{{route('admin.house.showViewUtility')}}" type="submit" class="btn btn-block btn-danger"
                               id="cancel">Hủy</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
