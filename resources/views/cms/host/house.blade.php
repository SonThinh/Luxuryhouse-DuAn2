@extends('cms.host.nav.host')
@section('title','host dashboard')
@section('main-host')
    <div class="table-responsive">
        <h2 class="title mb-2">Chổ của bạn</h2>
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
                    <td class="image-house">
                        @foreach($images as $image)
                            <img src="{{asset($image->image_path)}}" alt="" class="w-32">
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
                    <td>
                        {{$house->address}},
                        @foreach($districts as $district)
                            @if($district->id == $house->district_id)
                                {{$district->name}}
                            @endif
                        @endforeach
                        ,{{$house->city->name}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
