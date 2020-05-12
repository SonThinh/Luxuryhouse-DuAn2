@extends('index')
@section('title','dashboard')
@section('main')
    <div class="container">
        <div class="m-4">
            @include('cms.host.menu')
            <div class="content-host">
                <a class="btn btn-primary w-25" href="{{route('users.host.addHouse',[$host->id])}}"><i
                        class="far fa-plus"></i> Thêm chỗ mới</a>
                @isset($bookings)
                    <div class="table-responsive-sm mt-2" style="font-size: 15px;">
                        <table class="house-table table table-sm">
                            <thead class="thead-dark">
                            <tr>
                                <th>Mã đặt</th>
                                <th>Nhà</th>
                                <th>Người đặt</th>
                                <th>Số người</th>
                                <th>Ngày đến</th>
                                <th>Ngày đi</th>
                                <th>Các yêu cầu</th>
                                <th>Số đêm</th>
                                <th>Tổng giá</th>
                                <th>Thanh toán</th>
                                <th>Trạng thái đơn</th>
                                <th>Ngày tạo</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($bookings as $booking)
                                @if($booking->pay == 0 && $booking->status == 0)
                                    <tr {{$booking->id}}>
                                        <td>{{$booking->code}}</td>
                                        <td>@foreach($houses as $house) @if($booking->h_id == $house->id) {{$house->name}} @endif @endforeach</td>
                                        <td>@foreach($users as $user) @if($user->id == $booking->guest_id) @isset($user->username) {{$user->username}} @else {{$user->email}} @endisset @endif @endforeach</td>
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
                                        <td>
                                            {{date("d-m-Y h:m:i",strtotime($booking->created_at))}}
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                @endisset
            </div>
        </div>
    </div>
@endsection
