@extends('index')
@section('title','member booking profile')
@section('main')
    <div class="container">
        <div class="m-4">
            @include('cms.member.menu')
            <div class="content-host">
                <div class="table-responsive-sm" style="font-size: 15px;">
                    <table class="booking-table table table-sm">
                        <thead class="thead-dark">
                        <tr>
                            <th>Mã đặt phòng</th>
                            <th>Tên phòng</th>
                            <th>Tên người đặt</th>
                            <th>Tên chủ hộ</th>
                            <th>Đã Thanh toán</th>
                            <th>Ngày thanh toán</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($bills as $bill)
                            <tr {{$bill->id}}>
                                <td>{{$bill->code}}</td>
                                <td>{{$bill->house->name}}</td>
                                <td>@isset($bill->user->username){{$bill->user->username}}@else{{$bill->user->email}}@endisset</td>
                                <td>@isset($bill->host->username) {{$bill->host->username}}@else {{$bill->host->email}}@endisset</td>
                                <td>{{$bill->total}}đ</td>
                                <td>
                                    {{date("d-m-Y h:m:i",strtotime($bill->updated_at))}}
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
