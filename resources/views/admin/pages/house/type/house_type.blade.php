@extends('admin.index')
@section('title','admin-house')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Dạng căn hộ</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary align-self-center">Quản lý dạng căn hộ</h6>
                <a href="{{route('admin.house.addType')}}" class="btn btn-primary ml-auto">
                    <i class="far fa-plus-square"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap"
                           id="dataTable" width="100%">
                        <thead>
                        <tr>
                            <th>Tên dạng nhà</th>
                            <th>Từ khóa</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($typesList as $type)
                            <tr {{$type->id}}>
                                <td>{{$type->key}}</td>
                                <td>{{$type->name}}</td>
                                <td>
                                    <a href="{{route('admin.house.editType',[$type->id])}}">
                                        <button class="btn btn-primary" name="btn-edit"><i
                                                class="far fa-edit"></i></button>
                                    </a>
                                    <a href="{{route('admin.house.deleteType',[$type->id])}}" style="margin-top: 5px"
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
