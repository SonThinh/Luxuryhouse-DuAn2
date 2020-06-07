@extends('admin.index')
@section('title','addArea')
@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4 form-middle">
            <form action="{{route('admin.city.editAreas',[$areas->id])}}" class="form-horizontal" method="post"
                  enctype="multipart/form-data" id="upload">
                <div class="card-header py-3 d-flex">
                    <h3 class="m-0 font-weight-bold text-primary align-self-center">Sửa khu vực</h3>
                </div>
                <div class="card-body">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Thành phố</label>
                        <div class="col-sm-8">
                            <div class="d-flex">
                                @foreach($cities as $city)
                                    <div class="mr-2">
                                        <input type="radio" name="city_name" value="{{$city->id}}"
                                               @if($city->id === $areas->city_id)
                                               checked
                                            @endif> {{$city->name}}
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Tên khu vực</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="area_name" value="{{$areas->name}}">
                        </div>
                    </div>
                    <div class="d-flex">
                        <input type="submit" class="btn btn-block btn-primary m-auto" id="btn-area" value="Sửa">
                        <a href="{{route('admin.city.showAreas')}}" type="submit"
                           class="btn btn-block btn-danger m-auto"
                           id="cancel">Hủy</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
