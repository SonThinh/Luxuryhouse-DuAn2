@extends('admin.index')
@section('title','admin-user')
@section('content')
    <div class="container-fluid">
        <h1 class="h3 mb-2 text-gray-800">Tài khoản</h1>
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary align-self-center">Quản lý tài khoản</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap"
                           id="dataTable" width="100%">
                        <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên</th>
                            <th>Trạng thái</th>
                            <th>CMND</th>
                            <th>Hình ảnh CMND</th>
                            <th>GPKD</th>
                            <th>Hình ảnh GPKD</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($hostsList as $host)
                            @php
                                $image_ID = json_decode($host->ID_card_image);
                                $image_BL = json_decode($host->business_license_image);
                            @endphp
                            <tr {{$host->id}}>
                                <td>{{$host->id}}</td>
                                <td>{{isset($host->user->name) ? $host->user->name : $host->user->email}}</td>
                                <td>
                                    <input data-id="{{$host->id}}"
                                           data-url="{{route('admin.host.changeStatus')}}"
                                           class="change-host" type="checkbox"
                                           data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                           data-on="Mở" data-off="Khóa"
                                        {{ $host->status ? 'checked' : '' }}>
                                </td>
                                <td>{{$host->ID_card}}</td>
                                <td class="text-center d-content">
                                        <img src="{{asset($image_ID->image_path)}}" alt="" width="25%">
                                </td>
                                <td>{{$host->business_license}}</td>
                                <td class="text-center d-content">
                                        <img src="@isset($image_BL->image_path){{asset($image_BL->image_path)}}@else{{asset('../resources/assets/home/images/avatar/avatar-default.png')}} @endisset" alt="" width="25%">
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

