@extends('admin.index')
@section('title','admin-Cities')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Địa danh</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary align-self-center">Quản lý địa danh</h6>
                <a href="{{route('admin.city.addCities')}}" class="btn btn-primary ml-auto">
                    <i class="far fa-plus-square"></i>
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap"
                           id="dataTable" width="100%">
                        <thead>
                        <tr>
                            <th>Tên địa danh</th>
                            <th>Hình ảnh</th>
                            <th>Tùy chọn</th>
                            <th>Mô tả</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($citiesList as $city)
                            @php
                                $image = json_decode($city->image);
                            @endphp
                            <tr {{$city->id}}>
                                <td>{{$city->name}}</td>
                                <td class="text-center"><img src="{{asset($image->image_path)}}" alt="" class="w-50"></td>
                                <td>
                                    <a href="{{route('admin.city.editCities',[$city->id])}}">
                                        <button class="btn btn-primary" name="btn-edit"><i
                                                class="far fa-edit"></i></button>
                                    </a>
                                    <a href="{{route('admin.city.deleteCity',[$city->id])}}" style="margin-top: 5px"
                                       onclick="return confirm('Bạn có muốn xóa không?')">
                                        <button class="btn btn-danger" name="btn-delete"><i
                                                class="far fa-trash-alt"></i></button>
                                    </a>
                                </td>
                                <td>{{Str::limit($city->description,100) }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
