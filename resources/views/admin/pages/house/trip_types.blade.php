@extends('admin.index')
@section('title','Trip Type')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle text-center">Quản lý dạng chuyến đi</h2>
        <!-- tables -->
        <div class="agile-tables">
            <div class="w3l-table-info agile_info_shadow">
                <h3 class="w3_inner_tittle two">Danh sách dạng chuyến đi</h3>
                <a href="{{route('admin.house.addTripType')}}" class="btn btn-primary btn-top">
                    <i class="far fa-plus-square"></i>
                </a>
                <table id="table">
                    <thead>
                    <tr>
                        <th>Tên dạng chuyến đi</th>
                        <th>Từ khóa</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($tripTypeList as $tripType)
                        <tr {{$tripType->id}}>
                            <td>{{$tripType->key}}</td>
                            <td>{{$tripType->name}}</td>
                            <td>
                                <a href="{{route('admin.house.editTripType',[$tripType->id])}}">
                                    <button class="btn btn-primary" name="btn-edit"><i
                                            class="far fa-edit"></i></button>
                                </a>
                                <a href="{{route('admin.house.deleteTripType',[$tripType->id])}}" style="margin-top: 5px"
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
            {{$tripTypeList->render()}}
        </div>
@endsection
