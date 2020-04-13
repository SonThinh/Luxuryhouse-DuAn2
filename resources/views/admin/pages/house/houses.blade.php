@extends('admin.index')
@section('title','manageHouse')
@section('content')
    <style>
        table tr th {
            text-align: center;
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
                            <th>Dạng nhà</th>
                            <th>Chi tiết</th>
                            <th>Mô tả phòng</th>
                            <th>Chuyến đi</th>
                            <th>Quy định</th>
                            <th>Chi tiết giá</th>
                            <th>Tiện ích</th>
                            <th>Trạng thái phòng</th>
                            <th>Tùy chọn</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($housesList as $house)
                            @php
                                $images = json_decode($house->image);
                                $address = json_decode($house->address);
                                $utilities = json_decode($house->utilities);
                                $room = json_decode($house->room);
                                $price_detail = json_decode($house->price_detail);
                                $rules = json_decode($house->rules);
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
                                <td>{{$address->house_number}},
                                    @foreach($district as $d)
                                        @if($d->id == $address->district_id)
                                            {{$d->name}}
                                        @endif
                                    @endforeach
                                    ,{{$house->city->name}}</td>
                                <td>
                                    @foreach($types as $type)
                                        @if($type->key == $house->types)
                                            {{$type->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td >{{Str::limit($house->description,50)}}</td>
                                <td>
                                    Số giường: {{$room->number_bed}},
                                    Số phòng tắm: {{$room->number_bath}},
                                    Số phòng ngủ: {{$room->number_room}},
                                    Số khách tối đa: {{$room->max_guest}}
                                </td>
                                <td>
                                    @foreach($trip_types as $trip)
                                        @if($trip->key == $house->trip_type)
                                            {{$trip->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    Thời gian nhận phòng: {{$rules->check_in}},
                                    Thời gian trả phòng: {{$rules->check_out}},
                                </td>
                                <td>
                                    Thứ 2-5: {{$price_detail->Mon_to_Thus}}đ<br>
                                    Thứ 6-cn: {{$price_detail->Fri_to_Sun}}đ<br>
                                    Giá khách thêm: {{$price_detail->Ex_guest}}đ<br>
                                    Số đêm tối thiểu: {{$price_detail->max_night}}
                                </td>
                                <td>
                                    @foreach($utilities as $utility)
                                        {{$utility}},
                                    @endforeach
                                </td>
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
                                    <a href="{{route('admin.house.deleteHouse',[$house->id])}}" style="margin-top: 5px"
                                       onclick="return confirm('Bạn có muốn xóa không?')">
                                        <button class="btn btn-block btn-danger" name="btn-delete"><i
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
