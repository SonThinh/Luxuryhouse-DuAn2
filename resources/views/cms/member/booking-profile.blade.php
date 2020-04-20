@extends('index')
@section('title','booking profile')
@section('main')
    <div class="container">
        <div class="row">
            @foreach($bookings as $booking)
                <div class="col-md-3">
                    <div class="register-form m-3">
                        @include('cms.member.menu')
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="edit-form m-3">
                        <div class="content-host">
                            <div class="table-responsive-sm" style="font-size: 15px;">
                                <table class="booking-table table table-sm">
                                    <thead class="thead-dark">
                                    <tr>
                                        <th>Mã đặt phòng</th>
                                        <th>Tên phòng</th>
                                        <th>Tên người đặt</th>
                                        <th>Số người</th>
                                        <th>Ngày đến</th>
                                        <th>Ngày đi</th>
                                        <th>Yêu cầu</th>
                                        <th>Số đêm</th>
                                        <th>Tổng giá</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if($booking->status == 1)
                                        <tr {{$booking->id}}>
                                            <td>{{$booking->code}}</td>
                                            <td>{{$booking->house->name}}</td>
                                            <td>@isset($booking->user->name){{$booking->user->name}}@else{{$booking->user->email}}@endisset</td>
                                            <td>{{$booking->n_person}}</td>
                                            <td>{{$booking->check_in}}</td>
                                            <td>{{$booking->check_out}}</td>
                                            <td>{{$booking->request_guest}}</td>
                                            <td>{{$booking->date_range}}</td>
                                            <td>{{$booking->total}}đ</td>
                                            <td class="d-flex">@if($booking->pay == 0)
                                                    <a href="#" style="color: red">Chưa thanh toán</a>
                                                    <a
                                                        href="{{route('users.deleteBooking',[$booking->id])}}"
                                                        style="margin-top: 5px"
                                                        onclick="return confirm('Bạn có muốn xóa không?')">
                                                        <button class="btn btn-danger" name="btn-delete"><i
                                                                class="far fa-trash-alt"></i></button>
                                                    </a>
                                                @else
                                                    <p style="color:green;">
                                                        <i class="far fa-check"></i>
                                                        Đã thanh toán
                                                    </p>
                                                @endif
                                            </td>
                                        </tr>
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
