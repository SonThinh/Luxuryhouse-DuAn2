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
                </tr>
                </thead>
                <tbody>
                @foreach($memberList as $members)
                    @php
                        $image = json_decode($members->avatar);
                    @endphp
                    @if($members->level != 0)
                        <tr {{$members->id}}>
                            <td>{{Str::limit($members->username , 10)}}</td>
                            <td>{{Str::limit($members->email , 8)}}</td>
                            <td class="text-center" style="width: 15%"><img
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
            {{$memberList->render()}}
        </div>
@endsection

