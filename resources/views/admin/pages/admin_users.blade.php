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
                            <th>Email</th>
                            <th>Tên</th>
                            <th>Avatar</th>
                            <th>Địa chỉ</th>
                            <th>Giới tính</th>
                            <th>Ngày sinh</th>
                            <th>Số điện thoại</th>
                            <th>Google</th>
                            <th>Facebook</th>
                            <th>Mô tả</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($memberList as $members)
                            @php
                                $image = json_decode($members->avatar);
                            @endphp
                            @if($members->level != 0)
                                <tr {{$members->id}}>
                                    <td>{{$members->username}}</td>
                                    <td>{{$members->email}}</td>
                                    <td class="text-center w-15"><img
                                            src="@isset($image->image_path){{asset($image->image_path)}}@else{{asset('../resources/assets/home/images/avatar/avatar-default.png')}} @endisset"
                                            alt="" style="width: 100%"></td>
                                    <td>{{$members->address}}</td>
                                    <td>{{$members->gender}}</td>
                                    <td>{{date('d-m-Y',strtotime($members->birth))}}</td>
                                    <td>{{$members->phone}}</td>
                                    <td>{{$members->google}}</td>
                                    <td>{{$members->facebook}}</td>
                                    <td>{{$members->description}}</td>
                                </tr>
                            @endif
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection

