@extends('cms.host.nav.host')
@section('title','host dashboard')
@section('main-host')
    <div class="table-responsive">
        <h2 class="title mb-2">Chỗ của bạn</h2>
        <table class="table table-striped table-bordered dt-responsive nowrap"
               id="dataTable" width="100%">
            <thead>
            <tr>
                <th>Mã đặt</th>
                <th>Nhà</th>
                <th>Người đặt</th>
                <th>Thanh toán</th>
                <th>Trạng thái đơn</th>
                <th>Ngày tạo</th>
                <th>Ngày đến</th>
                <th>Ngày đi</th>
                <th>Số người</th>
                <th>Các yêu cầu</th>
                <th>Số đêm</th>
                <th>Tổng giá</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bookings as $booking)
                @if($booking->status == 1)
                    <tr {{$booking->id}}>
                        <td>{{$booking->code}}</td>
                        <td>@foreach($houses as $house) @if($booking->h_id == $house->id) {{$house->name}} @endif @endforeach</td>
                        <td>@foreach($users as $user) @if($user->id == $booking->guest_id) @isset($user->username) {{$user->username}} @else {{$user->email}} @endisset @endif @endforeach</td>
                        <td>
                            @if($booking->pay === 1)
                                <p class="blinking-text green">
                                    <i class="far fa-check"></i> Đã thanh toán
                                </p>
                            @else
                                <p class="red">
                                    <i class="far fa-times"></i>
                                    Chưa thanh toán
                                </p>
                            @endif
                        </td>
                        <td>
                            <input data-id="{{$booking->id}}"
                                   data-url="{{route('users.host.changeStatusBooking')}}"
                                   class="toggle-book-status"
                                   type="checkbox"
                                   data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                   data-on="Chấp nhận" data-off="Từ chối"
                                {{ $booking->status ? 'checked' : '' }}>
                        </td>
                        <td>
                            {{date("d-m-Y h:m:i",strtotime($booking->created_at))}}
                        </td>
                        <td>{{$booking->check_in}}</td>
                        <td>{{$booking->check_out}}</td>
                        <td>{{$booking->n_person}}</td>
                        <td>{{$booking->request_guest}}</td>
                        <td>{{$booking->date_range}}</td>
                        <td>{{$booking->total}}</td>
                    </tr>
                @endif
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
