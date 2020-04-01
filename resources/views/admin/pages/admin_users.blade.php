@extends('admin.index')
@section('title','manageUsers')
@section('content')
    <div class="inner_content_w3_agile_info two_in">
        <h2 class="w3_inner_tittle text-center">Quản lý tài khoản</h2>
        <!-- tables -->
        <div class="agile-tables">
            <h3 class="w3_inner_tittle two">Danh sách tài khoản</h3>
            <table id="table">
                <thead>
                <tr>
                    <th>Họ tên</th>
                    <th>Email</th>
                    <th>Ảnh đại diện</th>
                    <th>Đại chỉ</th>
                    <th>Giới tính</th>
                    <th>Ngày sinh</th>
                    <th>Số điện thoại</th>
                    <th>Google</th>
                    <th>Facebook</th>
                    <th>Mô tả bản thân</th>
                    <th>Tùy chọn</th>
                </tr>
                </thead>
                <tbody>
                @foreach($memberList as $members)
                    @if($members->level != 0)
                        <tr {{$members->id}}>
                            <td>{{Str::limit($members->username , 10)}}</td>
                            <td>{{Str::limit($members->email , 8)}}</td>
                            <td>{{Str::limit($members->avatar)}}</td>
                            <td>{{$members->address}}</td>
                            <td>{{$members->gender}}</td>
                            <td>{{$members->birth}}</td>
                            <td>{{$members->phone}}</td>
                            <td>{{$members->google}}</td>
                            <td>{{$members->facebook}}</td>
                            <td>{{$members->description}}</td>
                            <td>
                                <a href="{{route('admin.user.editUsers',[$members->id])}}">
                                    <button class="btn btn-block btn-primary" name="btn-edit"><i
                                            class="far fa-edit"></i></button>
                                </a>
                                <a href="#">
                                    <button class="btn btn-block btn-danger" name="btn-delete"><i
                                            class="far fa-trash-alt"></i></button>
                                </a>
                            </td>
                        </tr>
                    @endif
                @endforeach
                </tbody>
            </table>
            {{$memberList->render()}}
        </div>
@endsection

