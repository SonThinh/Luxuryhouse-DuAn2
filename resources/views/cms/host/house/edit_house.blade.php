@extends('index')
@section('title','edit house')
@section('main')
    <div class="container">
        <div class="row">
            <div class="edit-form my-5 mx-auto">
                <h2 class="text-center mt-4">Sửa chỗ ở</h2>
                <form action="#" method="post" class="mt-3" id="add_house"
                      autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            @php
                                $images = json_decode($house->image);
                                $address = json_decode($house->address);
                                $utilities_house = json_decode($house->utilities);
                                $room = json_decode($house->room);
                                $price_detail = json_decode($house->price_detail);
                            @endphp
                            <div class="my-4">
                                <p>Tên chủ hộ</p>
                                @foreach($host as $host)
                                    @if($host->id == $house->host_id)
                                        <input type="text" disabled class="form-control" name="host"
                                               @isset($host->user->username)
                                               value="{{$host->user->username}}"
                                               @else value="{{$host->user->email}}" @endif>
                                        <input type="hidden" class="form-control" name="host" value="{{$host->id}}">
                                    @endif
                                @endforeach
                            </div>
                            <div class="my-4">
                                <input type="text" class="form-control" name="name" placeholder="Tên nhà"
                                       value="{{$house->name}}">
                                @if($errors->has('name'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <label>
                                    <p class="ml-2 upload-icon form-control">Hình ảnh chỗ ở</p>
                                    <input id="house_image" type="file" multiple name="house_image[]" class="d-none">
                                </label>

                                <div id="preview_house">@foreach($images as $image) <img
                                        src="{{asset($image->image_path)}}" alt=""
                                        style="width: 25%"> @endforeach</div>
                                @if($errors->has('house_image'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('house_image') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="my-4">
                                <p>Loại chỗ ở</p>
                                @foreach($types as $type)
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="house_type"
                                                   value="{{$type->key}}"
                                                   @if($house->types == $type->key)
                                                   checked @endif>{{$type->name}}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                            <div class="my-4 d-block">
                                <p>Địa chỉ</p>
                                <input type="text" class="w-50 form-control" name="house_number" placeholder="Số nhà"
                                       value="{{$address->house_number}}">
                                @if($errors->has('house_number'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('house_number') }}</strong>
                                    </div>
                                @endif
                                <div class="form-check-inline">
                                    <select
                                        class="form-control" name="selectCity"
                                        data-url="{{route('users.host.selectDistrict')}}">
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}"
                                                    @if($city->id == $address->city_id)
                                                    selected @endif>{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-check-inline">
                                    <select name="selectAreas" class="selectAreas form-control">
                                        @foreach($districts as $district)
                                            @if($district->city->id == $address->city_id)
                                                <option value="{{$district->id}}"
                                                        @if($district->id == $address->district_id)
                                                        selected @endif>{{$district->name}}
                                                </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                @if($errors->has('selectCity'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert"
                                           aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('selectCity') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <p>Mô tả phòng</p>
                                <input type="number" class="w-24 form-control" name="n_bed"
                                       placeholder="Số giường" value="{{$room->number_bed}}">
                                @if($errors->has('n_bed'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('n_bed') }}</strong>
                                    </div>
                                @endif
                                <input type="number" class="w-24 form-control" name="n_bath"
                                       placeholder="Số phòng tắm" value="{{$room->number_bath}}">
                                @if($errors->has('n_bath'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('n_bath') }}</strong>
                                    </div>
                                @endif
                                <input type="number" class="w-24 form-control" name="n_room"
                                       placeholder="Số phòng ngủ" value="{{$room->number_room}}">
                                @if($errors->has('n_room'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('n_room') }}</strong>
                                    </div>
                                @endif
                                <input type="number" class="w-24 form-control" name="max_guest"
                                       placeholder="Số khách tối đa" value="{{$room->max_guest}}">
                                @if($errors->has('max_guest'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('max_guest') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="my-4">
                                <textarea class="form-control" rows="5" name="description"
                                          placeholder="Mô tả chi tiết căn hộ">{{$house->description}}</textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <textarea class="form-control" rows="5" name="rules"
                                          placeholder="Các quy định chung">{{$house->rules}}</textarea>
                                @if($errors->has('rules'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('rules') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <p>Các tiện ích</p>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        @foreach($utilities as $utility)
                                            <input type="checkbox" class="form-check-input" name="house_utilities[]"
                                                   value="{{$utility->key}}"
                                                   @foreach($utilities_house as $utility_house)
                                                   @if($utility_house == $utility->key) checked @endif
                                                @endforeach
                                            >{{$utility->symbol}}
                                        @endforeach
                                    </label>
                                </div>
                                @if($errors->has('house_utilities'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('house_utilities') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <p>Phù hợp với loại chuyến đi</p>
                                @foreach($trips as $trip)
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" name="trip_type"
                                                   value="{{$trip->key}}"
                                                   @if($house->trip_type == $trip->key)
                                                   checked @endif
                                            >{{$trip->name}}
                                        </label>
                                    </div>
                                @endforeach
                                @if($errors->has('trip_type'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('trip_type') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <p>Bảng giá</p>
                                <input type="number" class="w-24 form-control" name="m_to_t"
                                       value="{{$price_detail->Mon_to_Thus}}"
                                       placeholder="Thứ 2-thứ 5">
                                @if($errors->has('m_to_t'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('m_to_t') }}</strong>
                                    </div>
                                @endif
                                <input type="number" class="w-24 form-control" name="f_to_s"
                                       value="{{$price_detail->Fri_to_Sun}}"
                                       placeholder="Thứ 6-chủ nhật">
                                @if($errors->has('f_to_s'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('f_to_s') }}</strong>
                                    </div>
                                @endif
                                <input type="number" class="w-24 form-control" name="extra_guest" value="{{$price_detail->Ex_guest}}"
                                       placeholder="Phí khách thêm">
                                @if($errors->has('extra_guest'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('extra_guest') }}</strong>
                                    </div>
                                @endif
                                <input type="number" class="w-24 form-control" name="max_night" value="{{$price_detail->max_night}}"
                                       placeholder="Số đêm tối thiểu">
                                @if($errors->has('max_night'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('max_night') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <input
                                class=" btn btn-block btn-success " type="submit" value="Sửa" id="btn-edit-house">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

