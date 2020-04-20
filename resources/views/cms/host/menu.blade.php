<div class="menu-host d-flex">
    <p><a class="{{ (request()->segment(3) == 'dashboard') ? 'active' : '' }}" href="{{route('users.host.showDashboard',[auth()->user()->host->id])}}">Bảng thông tin</a></p>
    <p><a class="{{ (request()->segment(3) == 'house') ? 'active' : '' }}" href="{{route('users.host.ViewHouse',[auth()->user()->host->id])}}">Chỗ của bạn</a></p>
    <p><a class="{{ (request()->segment(3) == 'booking') ? 'active' : '' }}" href="{{route('users.host.viewBooking',[auth()->user()->host->id])}}">Đặt phòng @isset($bookings) @if($booking->status == 0) ( {{count($bookings)}} ) @endif @endisset</a></p>
    <p><a href="#">Thanh toán</a></p>
    <p><a href="#">Khuyến mãi</a></p>
</div>
