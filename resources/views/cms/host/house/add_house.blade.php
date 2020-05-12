@extends('index')
@section('title','add house')
@section('main')
    <div class="container">
        <div class="row">
            <div class="edit-form my-5 mx-auto">
                <h2 class="text-center mt-4">Thêm chỗ ở</h2>
                <form action="{{route('users.host.addHouse',[$host->id])}}" method="post" class="mt-3" id="add_house"
                      autocomplete="off" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col">
                            @if(Session::has('success'))
                                <div class="alert alert-success alert-dismissible">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <strong>{{ Session::get('success')}}</strong>
                                </div>
                            @endif
                            <div class="my-4">
                                <p>Tên chủ hộ</p>
                                <input type="text" disabled class="form-control" name="host"
                                       @isset($host->user->username)
                                       value="{{$host->user->username}}" @else value="{{$host->user->email}}" @endif>
                                <input type="hidden" class="form-control" name="host" value="{{$host->id}}">
                            </div>
                            <div class="my-4">
                                <input type="text" class="form-control" name="name" placeholder="Tên nhà">
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
                                <div id="preview_house"></div>
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
                                                   value="{{$type->key}}">{{$type->name}}
                                        </label>
                                    </div>
                                @endforeach
                                @if($errors->has('house_type'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('house_type') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4 d-block">
                                <p>Địa chỉ</p>

                                <input type="text" class="w-50 form-control" name="house_number" placeholder="Số nhà">
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
                                        <option value="">Chọn tỉnh, thành phố</option>
                                        @foreach($cities as $city)
                                            <option value="{{$city->id}}">{{$city->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-check-inline">
                                    <select name="selectAreas" class="selectAreas form-control">
                                        <option value="">Chọn khu vực</option>
                                    </select>
                                </div>
                                @if($errors->has('selectCity'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('selectCity') }}</strong>
                                    </div>
                                @endif
                            </div>

                            <div class="my-4">
                                <p>Mô tả phòng</p>
                                <input type="number" min="1" max="20" class="w-24 form-control" name="n_bed"
                                       placeholder="Số giường">
                                @if($errors->has('n_bed'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('n_bed') }}</strong>
                                    </div>
                                @endif
                                <input type="number" min="1" max="20" class="w-24 form-control" name="n_bath"
                                       placeholder="Số phòng tắm">
                                @if($errors->has('n_bath'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('n_bath') }}</strong>
                                    </div>
                                @endif
                                <input type="number" min="1" max="20" class="w-24 form-control" name="n_room"
                                       placeholder="Số phòng ngủ">
                                @if($errors->has('n_room'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('n_room') }}</strong>
                                    </div>
                                @endif
                                <input type="number" min="1" max="50" class="w-24 form-control" name="max_guest"
                                       placeholder="Số khách tối đa">
                                @if($errors->has('max_guest'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('max_guest') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <textarea style="overflow: hidden" class="form-control" rows="5" name="description"
                                          placeholder="Mô tả chi tiết căn hộ"></textarea>
                                @if($errors->has('description'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <p>Các quy định chung</p>
                                <textarea style="overflow: hidden" disabled class="form-control" rows="5">Miễn phí hủy phòng trong vòng 48h sau khi đặt phòng thành công và trước 1 ngày so với thời gian check-in. Sau đó, hủy phòng trước 1 ngày so với thời gian check-in, được hoàn lại 100% tổng số tiền đã trả (trừ phí dịch vụ).
                                </textarea>
                                <input type="hidden" name="cancel_rules"
                                       value="Miễn phí hủy phòng trong vòng 48h sau khi đặt phòng thành công và trước 1 ngày so với thời gian check-in. Sau đó, hủy phòng trước 1 ngày so với thời gian check-in, được hoàn lại 100% tổng số tiền đã trả (trừ phí dịch vụ).">
                                <textarea style="overflow: hidden" class="form-control mt-3" rows="5" name="attention"
                                          placeholder="Lưu ý"></textarea>
                                @if($errors->has('attention'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('attention') }}</strong>
                                    </div>
                                @endif
                                <label>Thời gian nhận phòng</label>
                                <input type="time" class="w-24 form-control" name="check_in">
                                @if($errors->has('check_in'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('check_in') }}</strong>
                                    </div>
                                @endif
                                <label>Thời gian trả phòng</label>
                                <input type="time" class="w-24 form-control" name="check_out">
                                @if($errors->has('check_out'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('check_out') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="my-4">
                                <p>Các tiện ích</p>
                                @foreach($utilities as $utility)
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="house_utilities[]"
                                                   value="{{$utility->key}}">{{$utility->symbol}}
                                        </label>
                                    </div>
                                @endforeach
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
                                                   value="{{$trip->key}}">{{$trip->name}}
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
                                <input type="number" min="0" class="w-24 form-control" name="m_to_t"
                                       placeholder="Thứ 2-thứ 5">
                                @if($errors->has('m_to_t'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('m_to_t') }}</strong>
                                    </div>
                                @endif
                                <input type="number" min="0" class="w-24 form-control" name="f_to_s"
                                       placeholder="Thứ 6-chủ nhật">
                                @if($errors->has('f_to_s'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('f_to_s') }}</strong>
                                    </div>
                                @endif
                                <input type="number" min="0" class="w-24 form-control" name="exGuest_fee"
                                       placeholder="Phí khách thêm">
                                @if($errors->has('exGuest_fee'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('exGuest_fee') }}</strong>
                                    </div>
                                @endif
                                <input type="number" min="1" class="w-24 form-control" name="min_night"
                                       placeholder="Số đêm tối thiểu">
                                @if($errors->has('min_night'))
                                    <div class="alert alert-danger alert-dismissible">
                                        <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                        <strong>{{ $errors->first('min_night') }}</strong>
                                    </div>
                                @endif
                            </div>
                            <div class="form-check-inline">
                                <label class="form-check-label">
                                    <input type="checkbox" name="agree" class="form-check-input"> Đồng ý với <a
                                        href="#">chính sách
                                        sử dụng</a> và <a href="#">các điều khoản</a>
                                </label>
                            </div>
                            <input id="btn-dis" class="btn btn-block btn-success m-auto" disabled type="submit"
                                   value="Thêm mới">
                            <input id="btn-agree" class=" btn btn-block btn-success d-none m-auto" type="submit"
                                   value="Thêm mới">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

