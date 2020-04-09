@extends('index')
@section('title','dashboard')
@section('main')
    <div class="container">
        <div class="m-4">
            @include('cms.host.menu')
            <div class="content-host">
                <a class="btn btn-primary w-25" href="{{route('users.host.addHouse',[$host->id])}}"><i class="far fa-plus"></i> Thêm chỗ mới</a>
            </div>
        </div>
    </div>
@endsection
