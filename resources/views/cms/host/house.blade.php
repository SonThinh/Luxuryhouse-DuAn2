@extends('index')
@section('title','house')
@section('main')
    <style>
        table tr td {
            text-align: center;
        }
    </style>
    <div class="container">
        <div class="m-4">
            @include('cms.host.menu')
            <div class="content-host">
                <a class="btn btn-primary w-25" href="{{route('users.host.addHouse',[$host->id])}}"><i
                        class="far fa-plus"></i> Thêm chỗ mới</a>
                <div class="table-responsive-sm mt-2" style="font-size: 15px;">
                    <table class="house-table table table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>Tên nhà</th>
                            <th>Hình ảnh</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($housesList as $house)
                            @php
                                $images = json_decode($house->image);
                            @endphp
                            <tr {{$house->id}}>
                                <td class="img">{{$house->name}}</td>
                                <td class="img w-50">
                                    @foreach($images as $image)
                                        <img src="{{asset($image->image_path)}}" alt=""
                                             style="width: 25%">
                                    @endforeach
                                </td>
                                <td>
                                    {{$house->address}},
                                    @foreach($districts as $district)
                                        @if($district->id == $house->district_id)
                                            {{$district->name}}
                                        @endif
                                    @endforeach
                                    ,{{$house->city->name}}
                                </td>
                                <td>
                                    <input data-id="{{$house->id}}"
                                           data-url="{{route('users.host.changeStatus')}}"
                                           class="toggle-class"
                                           type="checkbox"
                                           data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                           data-on="Full" data-off="Empty"
                                        {{ $house->h_status ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <a href="{{route('users.host.editHouse',[$house->id])}}">
                                        <button class="btn btn-primary" name="btn-edit"><i
                                                class="far fa-edit"></i></button>
                                    </a>
                                    <a href="{{route('users.host.deleteHouse',[$house->id])}}"
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
