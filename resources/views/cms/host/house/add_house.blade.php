<div id="form-add-house" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="text-center">Thêm chỗ ở</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                        aria-hidden="true">&times;</span></button>
            </div>
{{--            {{route('users.host.addHouse',[$host->id])}}--}}
            <form action="{{route('users.host.addHouse',[$host->id])}}" method="post" class="mt-3 add-house"
                  id="add-house"
                  autocomplete="off" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Tên chủ hộ</label>
                        <div class="col-sm-8">
                            <input type="text" disabled class="form-control" name="host"
                                   @isset($host->user->username)
                                   value="{{$host->user->username}}" @else value="{{$host->user->email}}" @endif>
                            <input type="hidden" name="host" value="{{$host->id}}">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Tên căn hộ</label>
                        <div class="col-sm-8">
                            <input type="text" class="form-control" name="name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Hình ảnh chỗ ở</label>
                        <label class="col-sm-8">
                            <p class="ml-2 upload-icon form-control text-center">Nhấn thêm ảnh</p>
                            <input id="house_image" type="file" multiple name="house_image[]" class="d-none">
                        </label>
                        <div id="preview_house"></div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Loại chỗ ở</label>
                        <div class="col-sm-8">
                            @foreach($types as $type)
                                <div class="form-check-inline">
                                    <label>
                                        <input type="radio" class="form-check-input" name="house_type"
                                               value="{{$type->key}}">{{$type->name}}
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
                                       placeholder="Số nhà">

                            </div>
                            <div class="form-group">
                                <select
                                    class="form-control" name="selectCity"
                                    data-url="{{route('users.host.selectDistrict')}}">
                                    <option value="">Chọn tỉnh, thành phố</option>
                                    @foreach($cities as $city)
                                        <option value="{{$city->id}}">{{$city->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <select name="selectAreas" class="selectAreas form-control">
                                    <option value="">Chọn khu vực</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Mô tả phòng</label>
                        <div class="col-sm-8">
                            <div class="form-check-inline w-100">
                                <input type="number" min="1" max="20" class="form-control" name="n_bed"
                                       placeholder="Số giường">
                                <input type="number" min="1" max="20" class="form-control" name="n_bath"
                                       placeholder="Số phòng tắm">
                            </div>
                            <div class="form-check-inline w-100">
                                <input type="number" min="1" max="20" class="form-control" name="n_room"
                                       placeholder="Số phòng ngủ">
                                <input type="number" min="1" max="50" class="form-control" name="max_guest"
                                       placeholder="Số khách tối đa">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Mô tả chi tiết căn hộ</label>
                        <div class="col-sm-8">
                                <textarea class="form-control" rows="5" name="description"
                                          placeholder="Mô tả chi tiết căn hộ"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Các tiện ích</label>
                        <div class="col-sm-8">
                            @foreach($utilities as $utility)
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input" name="house_utilities[]"
                                               value="{{$utility->key}}">{{$utility->symbol}}
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
                                               value="{{$trip->key}}">{{$trip->name}}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="row">
                            <label class="col-sm-4 control-label">Các quy định chung</label>
                            <div class="col-sm-8">
                                <textarea style="overflow: hidden" name="cancel_rules" disabled class="form-control" rows="5">Miễn phí hủy phòng trong vòng 48h sau khi đặt phòng thành công và trước 1 ngày so với thời gian check-in. Sau đó, hủy phòng trước 1 ngày so với thời gian check-in, được hoàn lại 100% tổng số tiền đã trả (trừ phí dịch vụ).
                                </textarea>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 control-label">Lưu ý</label>
                            <div class="col-sm-8">
                                <textarea style="overflow: hidden" class="form-control mt-3" rows="5" name="attention"
                                          placeholder="Lưu ý"></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <label class="col-sm-4 control-label">Thời gian nhận phòng</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control w-100" name="check_in">
                            </div>
                        </div>

                        <div class="row">
                            <label class="col-sm-4 control-label">Thời gian trả phòng</label>
                            <div class="col-sm-8">
                                <input type="time" class="form-control w-100" name="check_out">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-sm-4 control-label">Bảng giá</label>
                        <div class="col-sm-8">
                            <div class="form-check-inline w-100">
                                <input type="number" min="0" class="form-control" name="m_to_t"
                                       placeholder="Thứ 2-thứ 5">
                                <input type="number" min="0" class="form-control" name="f_to_s"
                                       placeholder="Thứ 6-chủ nhật">
                            </div>
                            <div class="form-check-inline w-100">
                                <input type="number" min="0" class="form-control" name="exGuest_fee"
                                       placeholder="Phí khách thêm">
                                <input type="number" min="1" class="form-control" name="min_night"
                                       placeholder="Số đêm tối thiểu">
                            </div>
                        </div>
                    </div>

                    <div class="form-group form-check-inline">
                        <label class="form-check-label">
                            <input type="checkbox" name="agree" class="form-check-input"> Đồng ý với <a
                                href="#">chính sách
                                sử dụng</a> và <a href="#">các điều khoản</a>
                        </label>
                    </div>

                    <div class="modal-footer">
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
