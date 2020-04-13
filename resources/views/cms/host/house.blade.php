@extends('index')
@section('title','house')
@section('main')
    <div class="container">
        <div class="m-4">
            @include('cms.host.menu')
            <div class="content-host">
                <div class="table-responsive-sm" style="font-size: 15px;">
                    <table class="house-table table table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>Tên nhà</th>
                            <th>Hình ảnh</th>
                            <th>Địa chỉ</th>
                            <th>Dạng nhà</th>
                            <th>Mô tả phòng</th>
                            <th>Tiện ích</th>
                            <th>Chi tiết</th>
                            <th >Các quy định chung</th>
                            <th width="10%">Dành cho chuyến đi</th>
                            <th>Bảng giá</th>
                            <th>Trạng thái</th>
                            <th>Thao tác</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($housesList as $house)
                            @php
                                $images = json_decode($house->image);
                                $address = json_decode($house->address);
                                $utilities_house = json_decode($house->utilities);
                                $room = json_decode($house->room);
                                $price_detail = json_decode($house->price_detail);
                                $rules = json_decode($house->rules);
                            @endphp
                            <tr {{$house->id}}>
                                <td class="img">{{$house->name}}</td>
                                <td class="img w-25">
                                    @foreach($images as $image)
                                        <img src="{{asset($image->image_path)}}" alt=""
                                             style="width: 25%">
                                    @endforeach
                                </td>
                                <td>
                                    {{$address->house_number}},
                                    @foreach($districts as $district)
                                        @if($district->id == $address->district_id)
                                            {{$district->name}}
                                        @endif
                                    @endforeach
                                    ,{{$house->city->name}}
                                </td>
                                <td>
                                    @foreach($types as $type)
                                        @if($type->key ==$house->types)
                                            {{$type->name}}
                                        @endif
                                    @endforeach
                                </td>

                                <td>
                                    Số giường: {{$room->number_bed}},
                                    Số phòng tắm: {{$room->number_bath}},
                                    Số phòng ngủ: {{$room->number_room}},
                                    Số khách tối đa: {{$room->max_guest}}
                                </td>
                                <td>
                                    @foreach($utilities_house as $utility_house)
                                        @foreach($utilities as $utility)
                                            @if($utility->key == $utility_house)
                                                {{$utility->symbol}},
                                            @endif
                                        @endforeach
                                    @endforeach
                                </td>
                                <td>{{Str::limit($house->description,50)}}</td>
                                <td>
                                    {{Str::limit($rules->cancel_rule,15)}},
                                    {{Str::limit($rules->attention,15)}},
                                    Thời gian nhận phòng: {{$rules->check_in}},
                                    Thời gian trả phòng: {{$rules->check_out}},
                                </td>
                                <td>
                                    @foreach($trip_types as $trip)
                                        @if($trip->key == $house->trip_type)
                                            {{$trip->name}}
                                        @endif
                                    @endforeach
                                </td>
                                <td>
                                    Thứ 2-5: {{$price_detail->Mon_to_Thus}}đ,
                                    Thứ 6-cn: {{$price_detail->Fri_to_Sun}}đ,
                                    Khách thêm: {{$price_detail->Ex_guest}}đ,
                                    Số đêm tối thiểu: {{$price_detail->max_night}}
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
                                        <button class="btn btn-block btn-primary" name="btn-edit"><i
                                                class="far fa-edit"></i></button>
                                    </a>
                                    <a href="{{route('users.host.deleteHouse',[$house->id])}}"
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
        </div>
    </div>
@endsection
