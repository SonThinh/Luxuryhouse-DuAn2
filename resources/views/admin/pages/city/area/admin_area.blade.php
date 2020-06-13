@extends('admin.index')
@section('title','admin-areas')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Khu vực</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary align-self-center">Quản lý Khu vực</h6>
                <a href="{{route('admin.city.addAreas')}}" class="btn btn-primary ml-auto">
                    <i class="far fa-plus-square"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap"
                           id="dataTable" width="100%">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên khu vực</th>
                            <th>Tên tỉnh thành</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($areaList as $area)
                            <tr>
                                <td>{{$area->id}}</td>
                                <td>{{$area->name}}</td>
                                <td>{{$area->city->name}}</td>
                                <td>
                                    <a href="{{route('admin.city.editAreas',[$area->id])}}">
                                        <button class="btn btn-primary" name="btn-edit"><i
                                                class="far fa-edit"></i></button>
                                    </a>
                                    <a href="{{route('admin.city.deleteAreas',[$area->id])}}" style="margin-top: 5px"
                                       onclick="return confirm('Bạn có muốn xóa không?')">
                                        <button class="btn btn-danger" name="btn-delete"><i
                                                class="far fa-trash-alt"></i></button>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
