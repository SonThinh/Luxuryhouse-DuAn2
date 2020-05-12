<div class="menu-host d-flex">
    <p><a class="{{ (request()->segment(2) == 'profile') ? 'active' : '' }}"
          href="{{route('users.showProfile',[auth()->user()->id])}}">Thông tin thành viên</a></p>
    <p><a class="{{ (request()->segment(2) == 'edit-pass') ? 'active' : '' }}"
          href="{{route('users.showViewUpdatePass',[auth()->user()->id])}}">Đổi mật khẩu</a></p>
    <p><a class="{{ (request()->segment(2) == 'booking') ? 'active' : '' }}"
          href="{{route('users.booking-profile.showProfileBooking',[auth()->user()->id])}}">Thông tin đặt chỗ</a></p>
    <p><a class="{{ (request()->segment(2) == 'pay-history') ? 'active' : '' }}"
          href="{{route('users.showViewPayHistory',[auth()->user()->id])}}">Lịch sử thanh toán</a></p>
</div>
