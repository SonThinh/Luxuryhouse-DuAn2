<div class="menu-profile">
    <p><a class="{{ (request()->segment(2) == 'profile') ? 'active' : '' }}" href="{{route('users.showProfile',[auth()->user()->id])}}">Thông tin thành viên</a></p>
    <p><a class="{{ (request()->segment(2) == 'edit-pass') ? 'active' : '' }}" href="{{route('users.showViewUpdatePass',[auth()->user()->id])}}">Đổi mật khẩu</a></p>
    <p><a class="{{ (request()->segment(2) == 'profile-booking') ? 'active' : '' }}" href="{{route('users.showProfileBooking',[auth()->user()->id])}}">Thông tin đặt chỗ @isset($bookings) @if($booking->pay == 0) ( {{count($bookings)}} ) @endif @endisset</a></p>
    <p><a href="#">Lịch sử thanh toán</a></p>
</div>
