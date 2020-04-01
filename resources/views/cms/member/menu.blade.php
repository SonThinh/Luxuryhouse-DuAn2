<div class="menu-profile">
    <p><a class="{{ (request()->segment(2) == 'profile') ? 'active' : '' }}" href="{{route('users.showProfile',[$user->id])}}">Thông tin thành viên</a></p>
    <p><a class="{{ (request()->segment(2) == 'edit-pass') ? 'active' : '' }}" href="{{route('users.showViewUpdatePass',[$user->id])}}">Đổi mật khẩu</a></p>
    <p><a href="#">Lịch sử thanh toán</a></p>
</div>
