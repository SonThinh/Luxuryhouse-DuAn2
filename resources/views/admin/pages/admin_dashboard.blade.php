@extends('admin.index')
@section('title','dashboard')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
        </div>

        <!-- Content Row -->
        <div class="row">

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-primary shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tài khoản
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($users)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-user-shield fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-success shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Địa danh
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($cities)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pending Requests Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-warning shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Căn hộ
                                </div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">{{count($house_all)}}</div>
                            </div>
                            <div class="col-auto">
                                <i class="fas fa-house fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-3 col-md-6 mb-4">
                <div class="card border-left-info shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Dịch vụ</div>
                                <div class="h5 mb-0 font-weight-bold text-gray-800">Comming soon!</div>
                            </div>
                            <div class="col-auto">
                                <i class="far fa-taxi fa-2x text-gray-300"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông báo tài khoản</h6>
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
                                @foreach($hosts as $host)
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
                                            <img
                                                src="@isset($image_BL->image_path){{asset($image_BL->image_path)}}@else{{asset('/home/images/avatar/avatar-default.png')}} @endisset"
                                                alt="" width="25%">
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Thông báo căn hộ</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered dt-responsive nowrap"
                                   id="dataTable" width="100%">
                                <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Chủ hộ</th>
                                    <th>Căn hộ</th>
                                    <th>Hình ảnh</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái phòng</th>
                                    <th>Tùy chọn</th>
                                    <th>Thao tác</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($houses as $house)
                                    @php
                                        $images = json_decode($house->image);
                                        $utilities_house = json_decode($house->utilities);
                                        $rules = json_decode($house->rules);
                                    @endphp
                                    @if($house->host->status === 1)
                                        <tr {{$house->id}}>
                                            <td>{{$house->id}}</td>
                                            <td>
                                                {{isset($house->host->user->name) ? $house->host->user->name : $house->host->user->email}}
                                            </td>
                                            <td>{{$house->name}}</td>
                                            <td class="d-content">
                                                @foreach($images as $image)
                                                    <img src="{{asset($image->image_path)}}" alt="" width="15%" height="50px">
                                                @endforeach
                                            </td>
                                            <td>{{$house->address}},
                                                @foreach($district as $d)
                                                    @if($d->id == $house->district_id)
                                                        {{$d->name}}
                                                    @endif
                                                @endforeach
                                                ,{{$house->city->name}}
                                            </td>
                                            <td>
                                                <input data-id="{{$house->id}}"
                                                       data-url="{{route('admin.house.changeStatus')}}"
                                                       class="toggle-class" type="checkbox"
                                                       data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                                       data-on="Mở" data-off="Khóa"
                                                    {{ $house->status ? 'checked' : '' }}>
                                            </td>
                                            <td>
                                                @if($house->h_status === 1)
                                                    <p class="green">
                                                        <i class="far fa-check"></i> Đang hoạt động
                                                    </p>
                                                @else
                                                    <p class="red">
                                                        <i class="far fa-times"></i>
                                                        Ngừng hoạt động
                                                    </p>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.house.deleteHouse',[$house->id])}}"
                                                   onclick="return confirm('Bạn có muốn xóa không?')">
                                                    <button class="btn btn-danger" name="btn-delete"><i
                                                            class="far fa-trash-alt"></i></button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
