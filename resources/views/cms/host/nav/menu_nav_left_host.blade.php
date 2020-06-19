<div class="top-nav-menu">
    <div class="avatar-profile">
        <img
            src="{{asset($image->image_path ?? '../resources/assets/images/avatar/avatar-default.png')}}"
            alt="" class="w-100">
    </div>
    <ul class="profile-detail">
        <li class="text-center"><h5>@isset($user->name) {{$user->name}} @else {{$user->email}} @endisset</h5>
        </li>
        <li>
            <label class="mr-1"><i class="fal fa-envelope"></i> Email:</label>
            <p>{{$user->email}}</p>
        </li>
        <li>
            <label class="mr-1"><i class="fal fa-home-alt"></i> Số căn hộ đang quản lý: </label>
            <p>
                {{count($houses->where('status',1))}}
            </p>
        </li>
        <li>
            <label class="mr-1"><i class="fal fa-id-card"></i> CMND:</label>
            <p>{{$host->ID_card}}</p>
        </li>
        <li class="btn-update">
            <a href="#" class="btn btn-block btn-lux" data-toggle="modal" data-target="">
                <i class="fas fa-fw fa-cog"></i> Chỉnh sửa thông tin host
            </a>
            <a href="#" class="btn btn-block btn-primary" data-toggle="modal" data-target="#form-add-house">
                <i class="far fa-plus"></i> Thêm chỗ mới</a>
            @include('cms.host.house.add_house',['host'=>$host])
        </li>
    </ul>
    <div class="cl-both"></div>
</div>
<div class="bottom-nav-menu mt-3">
    <ul class="profile-setting">
        <li>
            <a href="@if((request()->segment(3) == 'dashboard')) javascript:void(0) @else {{route('users.host.showDashboard',[auth()->user()->host->id])}} @endif"
               class="btn btn-block btn-noti">
                <i class="far fa-envelope"></i>
                Thông báo
            </a>
        </li>
        <li>
            <a href="@if((request()->segment(3) == 'house')) javascript:void(0) @else {{route('users.host.ViewHouse',[auth()->user()->host->id])}} @endif"
               class="btn btn-block btn-primary">
                <i class="far fa-hotel"></i>
                Chỗ của bạn
            </a>
        </li>
        <li>
            <a href="@if((request()->segment(3) == 'booking')) javascript:void(0) @else {{route('users.host.viewBooking',[auth()->user()->host->id])}} @endif"
               class="btn btn-block btn-success">
                <i class="fal fa-list"></i>
                Đặt phòng
            </a>
        </li>
        <li>
            <a href="#"
               class="btn btn-block btn-pay-profile">
                <i class="fal fa-money-check-alt"></i>
                Thanh toán
            </a>
        </li>
    </ul>
</div>

