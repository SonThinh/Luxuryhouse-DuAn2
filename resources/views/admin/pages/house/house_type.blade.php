@extends('admin.index')
@section('title','manageHouse')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle text-center">Quản lý dạng nhà</h2>
        <!-- tables -->
        <div class="agile-tables">
            <div class="w3l-table-info agile_info_shadow">
                <h3 class="w3_inner_tittle two">Danh sách dạng nhà</h3>
                <a href="{{route('admin.house.addType')}}" class="btn btn-primary btn-top">
                    <i class="far fa-plus-square"></i>
                </a>
                <table id="table">
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
            {{$typesList->render()}}
        </div>
@endsection
