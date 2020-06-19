@extends('index')
@section('title','order detail')
@section('main')
    <div class="main p-3">
        <div class="container">
            <div class="row">
                <div class="content-top">
                    <p style="font-size: 26px"><i class="fal fa-check-circle" style="color:green"></i>Thanh toán thành công !</p>
                    <a class="btn btn-block btn-primary" href="{{route('users.dashboard.booking-profile.bookingDetail',['id'=>$user_id,'code'=>$code])}}">Chi tiết thanh toán</a>
                </div>
            </div>
        </div>
    </div>
@endsection
