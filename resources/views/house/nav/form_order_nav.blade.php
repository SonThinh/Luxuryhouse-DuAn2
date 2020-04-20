<div id="form-order" class="modal fade" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{route('users.house.showPrice',$house->id)}}" method="POST" autocomplete="off">
                @csrf
                <div class="modal-header">
                    <h4 class="modal-title">Đặt lịch trình</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">&times;</span></button>
                    <input type="hidden" name="host_member_id" value="{{$host->id}}">
                    <input type="hidden" name="user_id"
                           value="@isset(auth()->user()->id){{auth()->user()->id}}@endisset">
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <p>Lịch trình</p>
                        <div class="d-flex">
                            <input name="check_in" disabled class="form-control"/>
                            <input name="check_in_clone" type="hidden" class="form-control"/>
                            <p class="m-auto">đến</p>
                            <input name="check_out" disabled class="form-control"/>
                            <input name="check_out_clone" type="hidden" class="form-control"/>
                        </div>
                    </div>
                    <div class="form-group">
                        <label>Giá thuê 1 đêm</label>
                        <input type="number" class="form-control" disabled
                               value="@if(\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Sunday' ||\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Saturday' ||\Carbon\Carbon::now('Asia/Ho_Chi_Minh')->format('l') == 'Friday'){{$price_detail->Fri_to_Sun}}@else{{$price_detail->Mon_to_Thus}}@endif"
                               name="price" min="0">
                    </div>
                    <div class="form-group">
                        <label id="hire_dates"></label>
                        <input type="number" disabled class="form-control" name="price_hire_dates" min="0">
                        <input type="hidden" name="dates_range">
                    </div>
                    <div class="form-group">
                        <label>Số Khách</label>
                        <input type="number" name="n_person" class="form-control" value="1" min="1"
                               max="{{$room->max_guest}}">
                        <input type="hidden" name="max_guest" class="form-control" value="{{$room->max_guest}}">
                    </div>
                    <div class="form-group" id="fee_extra_guest" style="display: none">
                        <label>Phí khách tăng thêm</label>
                        <input type="hidden" disabled name="Ex_guest" class="form-control"
                               value="{{$price_detail->Ex_guest}}">
                        <input type="number" disabled name="Ex_fee" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Tổng tiền</label>
                        <input type="number" disabled class="form-control" name="total" min="0">
                        <input type="hidden" class="form-control" name="total" min="0">
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-primary" id="btn-booking-request" value="Yêu cầu đặt phòng">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Hủy</button>
                </div>
            </form>
        </div>
    </div>
</div>
