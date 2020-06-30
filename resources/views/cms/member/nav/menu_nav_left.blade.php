<div class="top-nav-menu">
    <div class="avatar-profile">
        <img
            src="{{asset($image->image_path ?? '/images/avatar/avatar-default.png')}}"
            alt="" class="w-100">
    </div>
    <ul class="profile-detail">
        <li class="text-center"><h5>{{isset($user->name) ? $user->name : Str::limit($user->email,16)}}</h5>
        </li>
        <li>
            <label class="mr-1"><i class="fal fa-envelope"></i> Email:</label>
            <p>{{Str::limit($user->email,16)}}</p>
        </li>
        <li>
            <label class="mr-1"><i class="fas fa-user-shield"></i> Host:</label>
            <p>
                {{isset($user->host) ? (($user->host->status === 1) ? 'Đã đăng ký' : 'Đang đợi duyệt') : 'Chưa đăng ký'}}
            </p>
        </li>
        <li>
            <label class="mr-1"><i class="far fa-phone-square"></i> Số điện thoại:</label>
            <p>{{Str::limit($user->phone,10)}}</p>
        </li>
        <li class="btn-update">
            <a href="#" class="btn btn-block btn-lux" data-toggle="modal" data-target="#form-update-user">
                <i class="fas fa-fw fa-cog"></i> Chỉnh sửa
            </a>
            @include('cms.member.nav.modal_profile',['user'=>$user])
        </li>
    </ul>
    <div class="cl-both"></div>
</div>
<div class="bottom-nav-menu mt-3">
    <ul class="profile-setting">
        <li>
            <a href="{{route('users.dashboard.showDashboard',[auth()->user()->id])}}"
               class="btn btn-block btn-noti">
                <i class="far fa-envelope"></i>
                Thông báo
            </a>
        </li>
        <li>
            <a href="{{(request()->segment(3) == 'edit-pass') ? 'javascript:void(0)' : route('users.dashboard.showViewUpdatePass',[auth()->user()->id])}}"
               class="btn btn-block btn-primary">
                <i class="far fa-key"></i>
                Đổi mật khẩu
            </a>
        </li>
        <li>
            <a href="{{(request()->segment(3) == 'booking') ? 'javascript:void(0)' : route('users.dashboard.booking-profile.showProfileBooking',[auth()->user()->id])}}"
               class="btn btn-block btn-success">
                <i class="fal fa-list"></i>
                Thông tin đặt phòng
            </a>
        </li>
        <li>
            <a href="{{(request()->segment(3) == 'pay-history') ? 'javascript:void(0)' : route('users.dashboard.showViewPayHistory',[auth()->user()->id])}}"
               class="btn btn-block btn-pay-profile">
                <i class="far fa-donate"></i>
                Lịch sử thanh toán
            </a>
        </li>
    </ul>
</div>
