@extends('cms.host.nav.host')
@section('title','host dashboard')
@section('main-host')
    @isset($bookings)
        <div class="notify">
            <h2 class="title mb-2">Thông báo</h2>
            <div class="content-notify">
                <div class="inf-notify">
                    @forelse($bookings as $book)
                        <div class="inf-bill row mb-1">
                            <div class="col-md-3">
                                <label>Mã hóa đơn</label>
                                <p>{{$book->code}}</p>
                                <label>Căn hộ</label>
                                <p>{{$book->h_id}}</p>
                            </div>
                            <div class="col-md-3">
                                <label>Check-in</label>
                                <p>{{$book->check_in}}</p>
                                <label>Check-out</label>
                                <p>{{$book->check_out}}</p>
                            </div>
                            <div class="col-md-3">
                                <label>Khách hàng</label>
                                <p>{{isset($book->user->name) ? $book->user->name : $book->user->email}}</p>
                                <label>Trạng thái</label>
                                <input data-id="{{$book->id}}"
                                       data-url="{{route('users.host.changeStatusBooking')}}"
                                       class="toggle-book-status" type="checkbox"
                                       data-onstyle="success" data-offstyle="danger" data-toggle="toggle"
                                       data-on="Đồng ý" data-off="Từ chối"
                                    {{ $book->status ? 'checked' : '' }}>
                            </div>
                            <div class="col-md-3">
                                <label>Ngày tạo hóa đơn</label>
                                <p>{{$book->created_at}}</p>
                                <label>Tổng cộng</label>
                                <p>{{$book->total}}</p>
                            </div>
                            <i class="far fa-times red close-btn-notify"></i>
                        </div>
                    @empty
                        <p class="empty-notify">Chưa có thông báo mới</p>
                    @endforelse
                </div>
            </div>
        </div>
    @endisset
@endsection
