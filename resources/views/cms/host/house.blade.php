@extends('cms.host.nav.host')
@section('title','host dashboard')
@section('main-host')
    <div class="table-responsive">
        <h2 class="title mb-2">Chỗ của bạn</h2>
        <table class="table table-striped table-bordered dt-responsive nowrap"
               id="dataTable" width="100%">
            <thead>
            <tr>
                <th>Tên nhà</th>
                <th>Hình ảnh</th>
                <th>Trạng thái</th>
                <th>Thao tác</th>
                <th>Địa chỉ</th>
            </tr>
            </thead>
            <tbody>
            @foreach($housesList as $house)
                @php
                    $images = json_decode($house->image);
                @endphp
                <tr {{$house->id}}>
                    <td>{{$house->name}}</td>
                    <td class="image-house d-contents">
                        @foreach($images as $image)
                            <img src="{{asset($image->image_path)}}" alt="" class="w-32" style="height: 50px">
                        @endforeach
                    </td>
                    <td>
                        <input data-id="{{$house->id}}"
                               data-url="{{route('users.host.changeStatus')}}"
                               class="toggle-house-status"
                               type="checkbox"
                               data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                               data-on="Hoạt động" data-off="Ngưng"
                            {{ $house->h_status ? 'checked' : '' }}>
                    </td>
                    <td>
                        <a href="#" data-toggle="modal" data-target="#form-edit-house" class="btn btn-primary"
                           id="btn-edit">
                            <i class="far fa-edit"></i>
                        </a>
                        <a href="{{route('users.host.deleteHouse',[$house->id])}}"
                           onclick="return confirm('Bạn có muốn xóa không?')" class="btn btn-danger" id="btn-delete">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                    <td>
                        {{$house->address}},
                        {{$house->district->name}}
                        ,{{$house->city->name}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @foreach($housesList as $house)
        @include('cms.host.house.edit_house',['house'=>$house])
    @endforeach
@endsection
