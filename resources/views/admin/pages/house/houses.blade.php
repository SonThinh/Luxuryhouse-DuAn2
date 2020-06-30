@extends('admin.index')
@section('title','admin-house')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Căn hộ</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary align-self-center">Quản lý căn hộ</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap"
                           id="dataTable" width="100%">
                        <thead>
                        <tr>
                            <th>Chủ hộ</th>
                            <th>Căn hộ</th>
                            <th>Hình ảnh</th>
                            <th>Địa chỉ</th>
                            <th>Trạng thái phòng</th>
                            <th>Tùy chọn</th>
                            <th>Thao tác</th>
                            <th>Dạng nhà</th>
                            <th>Mô tả chi tiết căn hộ</th>
                            <th>Mô tả phòng</th>
                            <th>Phù hợp với chuyến đi</th>
                            <th>Các quy định chung</th>
                            <th>Chi tiết giá</th>
                            <th>Các tiện ích</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($housesList as $house)
                            @php
                                $images = json_decode($house->image);
                                $utilities_house = json_decode($house->utilities);
                                $rules = json_decode($house->rules);
                            @endphp
                            <tr {{$house->id}}>
                                <td>{{isset($house->host->user->name) ? $house->host->user->name : $house->host->user->email}}</td>
                                <td>{{$house->name}}</td>
                                <td class="text-center d-content w-75">
                                    @foreach($images as $image)
                                        <img src="{{asset($image->image_path)}}" alt="" width="25%" height="50px">
                                    @endforeach
                                </td>
                                <td>{{$house->address}},
                                    @foreach($district as $d)
                                        @if($d->id == $house->district_id)
                                            {{$d->name}}
                                        @endif
                                    @endforeach
                                    ,{{$house->city->name}}
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
                                    @if($house->h_status === 1)
                                        <p class="green">
                                            <i class="far fa-check"></i> Đang hoạt động
                                        </p>
                                    @else
                                        <p class="red">
                                            <i class="far fa-times"></i>
                                            Ngừng hoạt động
                                        </p>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.house.deleteHouse',[$house->id])}}"
                                       onclick="return confirm('Bạn có muốn xóa không?')">
                                        <button class="btn btn-danger" name="btn-delete"><i
                                                class="far fa-trash-alt"></i></button>
                                    </a>
                                </td>
                                <td>
                                    @foreach($types as $type)
                                        @if($type->key == $house->types)
                                            {{$type->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>{{Str::limit($house->description,300)}}</td>
                                <td>
                                    Số giường: {{$house->n_bed}},
                                    Số phòng tắm: {{$house->n_bath}},
                                    Số phòng ngủ: {{$house->n_room}},
                                    Số khách tối đa: {{$house->max_guest}}
                                </td>
                                <td>
                                    @foreach($trip_types as $trip)
                                        @if($trip->key == $house->trip_type)
                                            {{$trip->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    Hủy phòng:{{$rules->cancel_rule}}<br>
                                    Chú ý:{{$rules->attention}}<br>
                                    Check in:{{$rules->check_in}}<br>
                                    Check out:{{$rules->check_out}}
                                </td>
                                <td>
                                    Giá phòng: {{$house->price}}đ<br>
                                    Giá khách thêm: {{$house->exGuest_fee}}đ<br>
                                    Số đêm tối thiểu: {{$house->min_night}}
                                </td>
                                <td>
                                    @foreach($utilities as $utility)
                                        @foreach($utilities_house as $utility_house)
                                            @if($utility->key === $utility_house)
                                                {{$utility->symbol}},
                                            @endif
                                        @endforeach
                                    @endforeach
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
