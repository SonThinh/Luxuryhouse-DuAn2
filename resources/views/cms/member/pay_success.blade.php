@extends('index')
@section('title','order detail')
@section('main')
    <div class="main p-3">
        <div class="container">
            <div class="row">
                <div class="content-top">
                    <p style="font-size: 26px"><i class="fal fa-check-circle" style="color:green"></i>Thanh toán thành công !</p>
                    <a class="btn btn-block btn-primary" href="{{route('users.booking-profile.bookingDetail',[$code])}}">Chi tiết thanh toán</a>
                </div>
            </div>
        </div>
    </div>
@endsection
