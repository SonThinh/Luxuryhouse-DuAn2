<div id="form-edit-house" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Thêm chỗ ở</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
            <form action="{{route('users.host.editHouse',[$house->id])}}" method="post" class="mt-3"
                  autocomplete="off" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    @php
                        $images = json_decode($house->image);
                        $utilities_house = json_decode($house->utilities);
                        $rules = json_decode($house->rules);
                    @endphp
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Tên chủ hộ</label>
                        <div class="col-sm-8">
                            <input type="text" disabled class="form-control" name="host"
                                   value="{{isset($house->host->user->name) ? $house->host->user->name : $house->host->user->email}}">
                            <input type="hidden" name="host" value="{{$house->host->id}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Tên căn hộ</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name" value="{{$house->name}}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Hình ảnh chỗ ở</label>
                        <label class="col-sm-8">
                            <p class="ml-2 upload-icon form-control text-center">Nhấn thêm ảnh</p>
                            <input id="house_image" type="file" multiple name="house_image[]" class="d-none">
                        </label>
                        <div id="preview_house" style="display: contents">
                            @foreach($images as $image)
                                <img
                                    src="{{asset($image->image_path)}}" alt=""
                                    style="width: 165px; height: 100px;">
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Loại chỗ ở</label>
                        <div class="col-sm-8">
                            @foreach($types as $type)
                                <div class="form-check-inline">
                                    <label>
                                        <input type="radio" class="form-check-input" name="house_type"
                                               value="{{$type->key}}" @if($house->types === $type->key)
                                               checked @endif>{{$type->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Địa chỉ</label>
                        <div class="col-sm-8">
                            <div class="form-group">
                                <input type="text" class="w-100 form-control" name="house_number"
                                       placeholder="Số nhà" value="{{$house->address}}">
                            </div>
                            <div class="form-group">
                                <select
                                    class="form-control" name="selectCity"
                                    data-url="{{route('users.host.selectDistrict')}}">
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}" @if($city->id == $house->city_id)
                                        selected @endif>{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="selectAreas" class="selectAreas form-control">
                                    @foreach($districts as $district)
                                        @if($district->city->id == $house->city_id)
                                            <option value="{{$district->id}}"
                                                    @if($district->id == $house->district_id)
                                                    selected @endif>{{$district->name}}
                                            </option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Mô tả phòng</label>
                        <div class="col-sm-8">
                            <div class="form-check-inline w-100">
                                <input type="number" min="0" max="20" class="form-control" name="n_bed"
                                       value="{{$house->n_bed}}"
                                       placeholder="Số giường">
                                <input type="number" min="0" max="20" class="form-control" name="n_bath"
                                       value="{{$house->n_bath}}"
                                       placeholder="Số phòng tắm">
                            </div>
                            <div class="form-check-inline w-100">
                                <input type="number" min="0" max="20" class="form-control" name="n_room"
                                       value="{{$house->n_room}}"
                                       placeholder="Số phòng ngủ">
                                <input type="number" min="0" max="50" class="form-control" name="max_guest"
                                       value="{{$house->max_guest}}"
                                       placeholder="Số khách tối đa">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Mô tả chi tiết căn hộ</label>
                        <div class="col-sm-8">
                                <textarea class="form-control" rows="5" name="description"
                                          placeholder="Mô tả chi tiết căn hộ">{{$house->description}}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 control-label">Các quy định chung</label>
                            <div class="col-sm-8">
                                <textarea disabled class="form-control" rows="5">{{$rules->cancel_rule}}
                                </textarea>
                                <input type="hidden" name="cancel_rules"
                                       value="Miễn phí hủy phòng trong vòng 48h sau khi đặt phòng thành công và trước 1 ngày so với thời gian check-in. Sau đó, hủy phòng trước 1 ngày so với thời gian check-in, được hoàn lại 100% tổng số tiền đã trả (trừ phí dịch vụ).">
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 control-label">Lưu ý</label>
                            <div class="col-sm-8">
                                <textarea style="overflow: hidden" class="form-control mt-3" rows="5" name="attention"
                                          placeholder="Lưu ý">{{$rules->attention}}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 control-label">Thời gian nhận phòng</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control time-checkin w-100" name="check_in"
                                       value="{{$rules->check_in}}">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 control-label">Thời gian trả phòng</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control time-checkout w-100" name="check_out"
                                       value="{{$rules->check_out}}">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Các tiện ích</label>
                        <div class="col-sm-8">
                            @foreach($utilities as $utility)
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="house_utilities[]"
                                               value="{{$utility->key}}" @foreach($utilities_house as $utility_house)
                                               @if($utility_house == $utility->key) checked @endif
                                            @endforeach>{{$utility->symbol}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Phù hợp với loại chuyến đi</label>
                        <div class="col-sm-8">
                            @foreach($trips as $trip)
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="trip_type"
                                               value="{{$trip->key}}" @if($house->trip_type == $trip->key)
                                               checked @endif>{{$trip->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Bảng giá</label>
                        <div class="col-sm-8">
                            <div class="form-check-inline w-100">
                                <input type="number" min="0" class="form-control" name="m_to_t"
                                       value="{{$house->price_m_to_t}}"
                                       placeholder="Thứ 2-thứ 5">
                                <input type="number" min="0" class="form-control" name="f_to_s"
                                       value="{{$house->price_f_to_s}}"
                                       placeholder="Thứ 6-chủ nhật">
                            </div>
                            <div class="form-check-inline w-100">
                                <input type="number" min="0" class="form-control" name="exGuest_fee"
                                       value="{{$house->exGuest_fee}}"
                                       placeholder="Phí khách thêm">
                                <input type="number" min="1" class="form-control" name="min_night"
                                       value="{{$house->min_night}}"
                                       placeholder="Số đêm tối thiểu">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input id="btn-agree" class=" btn btn-block btn-success m-auto" type="submit"
                               value="Sửa">
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

