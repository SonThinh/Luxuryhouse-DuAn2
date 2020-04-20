@extends('index')
@section('title','house')
@section('main')
    <div class="container">
        <div class="m-4">
            @foreach($bookings as $booking)
                @include('cms.host.menu')
                <div class="content-host">
                    <div class="table-responsive-sm" style="font-size: 15px;">
                        <table class="house-table table table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Mã đặt phòng</th>
                                <th>Tên phòng</th>
                                <th>Tên người đặt</th>
                                <th>Số người</th>
                                <th>Ngày đến</th>
                                <th>Ngày đi</th>
                                <th>Các yêu cầu</th>
                                <th>Số đêm</th>
                                <th>Tổng giá</th>
                                <th>Trạng thái thanh toán</th>
                                <th>Trạng thái đơn</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($booking->pay == 0)
                                <tr {{$booking->id}}>
                                    <td>{{$booking->code}}</td>
                                    <td>{{$booking->h_id}}</td>
                                    <td>{{$booking->guest_id}}</td>
                                    <td>{{$booking->n_person}}</td>
                                    <td>{{$booking->check_in}}</td>
                                    <td>{{$booking->check_out}}</td>
                                    <td>{{$booking->request_guest}}</td>
                                    <td>{{$booking->date_range}}</td>
                                    <td>{{$booking->total}}</td>
                                    <td>
                                        <input class="toggle-class"
                                               type="checkbox"
                                               data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                               data-on="Đã thanh toán" data-off="Chưa thanh toán"
                                            {{ $booking->pay ? 'checked' : '' }}>
                                    </td>
                                    <td>
                                        <input data-id="{{$booking->id}}"
                                               data-url="{{route('users.host.changeStatusBooking')}}"
                                               class="toggle-class"
                                               type="checkbox"
                                               data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                               data-on="Chấp nhận" data-off="Từ chối"
                                            {{ $booking->status ? 'checked' : '' }}>
                                    </td>
                                </tr>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
