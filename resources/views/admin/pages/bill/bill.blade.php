@extends('admin.index')
@section('title','admin-bills')
@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">
        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Quản lý doanh thu</h1>
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3 d-flex">
                <h6 class="m-0 font-weight-bold text-primary align-self-center">Danh sách hóa đơn</h6>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered dt-responsive nowrap" id="dataTable" width="100%"
                           cellspacing="0">
                        <thead>
                        <tr>
                            <th>Mã hóa đơn</th>
                            <th>Tên căn hộ</th>
                            <th>Chủ hộ</th>
                            <th>Khách hàng</th>
                            <th>Ngày check-in</th>
                            <th>Ngày check-out</th>
                            <th>Phí</th>
                            <th>Ngày tạo hóa đơn</th>
                            <th>Trạng thái</th>
                            <th>Trạng thái thanh toán</th>
                            <th>Số người</th>
                            <th>Yêu cầu</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($billsList as $bill)
                            <tr {{$bill->id}}>
                                <td>{{$bill->code}}</td>
                                <td>{{$bill->house->name}}</td>
                                <td>@isset($bill->host->user->username){{$bill->host->user->username}} @else {{$bill->host->user->email}}@endisset</td>
                                <td>@isset($bill->user->username){{$bill->user->username}} @else {{$bill->user->email}}@endisset</td>
                                <td>{{$bill->check_in}}</td>
                                <td>{{$bill->check_out}}</td>
                                <td>{{$bill->total}}</td>
                                <td>{{$bill->created_at}}</td>
                                <td>
                                    <input
                                        type="checkbox"
                                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                        data-on="Đã đồng ý" data-off="Chưa đồng ý"
                                        {{ $bill->status ? 'checked' : '' }}>
                                </td>
                                <td>
                                    <input
                                        type="checkbox"
                                        data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                        data-on="Đã thanh toán" data-off="Chưa thanh toán"
                                        {{ $bill->pay ? 'checked' : '' }}>
                                </td>
                                <td>{{$bill->number}}</td>
                                <td>{{$bill->request_guest}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->
@endsection
