@extends('admin.index')
@section('title','admin-house')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4 form-middle">
            <form action="{{route('admin.house.addTripType')}}" class="form-horizontal" method="post"
                  enctype="multipart/form-data" id="upload">
                <div class="card-header py-3 d-flex">
                    <h3 class="m-0 font-weight-bold text-primary align-self-center">Thêm loại chuyến đi</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Dạng chuyến đi</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Từ khóa</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="key">
                        </div>
                    </div>
                    <div class="d-grid btn-form-n-btn">
                        <input type="submit" class="btn btn-block btn-primary m-auto" id="btn-trip-type" value="Thêm">
                        <a href="{{route('admin.house.showViewTripType')}}" type="submit"
                           class="btn btn-block btn-danger m-auto"
                           id="cancel">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
