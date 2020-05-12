@extends('admin.index')
@section('title','manageHouse')
@section('content')
    <style>
        table tr th {
            text-align: center;
        }
        table tr td {
            text-align: center
        }
    </style>
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle text-center">Quản lý nhà</h2>
        <!-- tables -->
        <div class="agile-tables">
            <div class="w3l-table-info agile_info_shadow">
                <div class="table-responsive">
                    <h3 class="w3_inner_tittle two">Danh sách nhà</h3>
                    <table id="table" class="table">
                        <thead>
                        <tr>
                            <th>Chủ hộ</th>
                            <th style="width: 8%">Căn hộ</th>
                            <th>Hình ảnh</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái phòng</th>
                            <th>Tùy chọn</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($housesList as $house)
                            @php
                                $images = json_decode($house->image);
                            @endphp
                            <tr {{$house->id}}>
                                @foreach($host as $h)
                                    @if($h->id == $house->host_id)
                                        @isset($h->user->username)
                                            <td>{{$h->user->username}}</td>
                                        @else
                                            <td>{{$h->user->email}}</td>
                                        @endisset
                                    @endif
                                @endforeach
                                <td>{{$house->name}}</td>
                                <td style="text-align: center;width: 35%;">
                                    @foreach($images as $image)
                                        <img src="{{asset($image->image_path)}}" alt="" style="width: 25%">
                                    @endforeach
                                </td>
                                <td>{{$house->address}},
                                    @foreach($district as $d)
                                        @if($d->id == $house->district_id)
                                            {{$d->name}}
                                        @endif
                                    @endforeach
                                    ,{{$house->city->name}}</td>
                                <td>
                                    <input data-id="{{$house->id}}"
                                           type="checkbox"
                                           data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                           data-on="Đang sử dụng" data-off="Chưa sử dụng"
                                        {{ $house->h_status ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input data-id="{{$house->id}}"
                                           data-url="{{route('admin.house.changeStatus')}}"
                                           class="toggle-class" type="checkbox"
                                           data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                           data-on="Mở" data-off="Khóa"
                                        {{ $house->status ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <a href="#" class="btn btn-info" style="margin-bottom: 5px">Xem chi tiết</a>
                                    <a href="{{route('admin.house.deleteHouse',[$house->id])}}"
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
            {{$housesList->render()}}
        </div>
@endsection
