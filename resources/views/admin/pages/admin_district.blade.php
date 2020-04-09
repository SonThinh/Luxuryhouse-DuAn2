@extends('admin.index')
@section('title','manageCities')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle text-center">Quản lý khu vực</h2>
        <!-- tables -->
        <div class="agile-tables">
            <div class="w3l-table-info agile_info_shadow">
                <h3 class="w3_inner_tittle two">Danh sách khu vực</h3>
                <a href="{{route('admin.city.addAreas')}}" class="btn btn-primary btn-top">
                    <i class="far fa-plus-square"></i>
                </a>
                <table id="table">
                    <thead>
                    <tr>
                        <th>Tên khu vực</th>
                        <th>Tên tỉnh thành</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($areaList as $area)
                        <tr {{$area->id}}>
                            <td style="width: 15%">{{$area->name}}</td>
                            <td style="width: 15%">{{$area->city->name}}</td>
                            <td style="width: 15%">
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
            {{$areaList->render()}}
        </div>
@endsection
