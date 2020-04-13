@extends('admin.index')
@section('title','manageHouse')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle text-center">Quản lý tiện ích</h2>
        <!-- tables -->
        <div class="agile-tables">
            <div class="w3l-table-info agile_info_shadow">
                <h3 class="w3_inner_tittle two">Danh sách tiện ích</h3>
                <a href="{{route('admin.house.addUtility')}}" class="btn btn-primary btn-top">
                    <i class="far fa-plus-square"></i>
                </a>
                @if(Session::has('success'))
                    <div class="alert alert-success alert-dismissible">
                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                        <strong>{{ Session::get('success')}}</strong>
                    </div>
                @endif
                <table id="table">
                    <thead>
                    <tr>
                        <th>Biểu tượng</th>
                        <th>Icon</th>
                        <th>Tùy chọn</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($utilitiesList as $utility)
                        <tr {{$utility->id}}>
                            <td>{{$utility->symbol}}</td>
                            <td><i class="{{$utility->icon}}"></i></td>
                            <td>
                                <a href="{{route('admin.house.editUtility',[$utility->id])}}">
                                    <button class="btn btn-primary" name="btn-edit"><i
                                            class="far fa-edit"></i></button>
                                </a>
                                <a href="{{route('admin.house.deleteUtility',[$utility->id])}}" style="margin-top: 5px"
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
            {{$utilitiesList->render()}}
        </div>
@endsection
