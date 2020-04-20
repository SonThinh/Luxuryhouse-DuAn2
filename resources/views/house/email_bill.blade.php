<p>Xin chào <span>{{$data['guest_name']}}</span></p>
<p>Bạn đã thực hiện yêu cầu đặt phòng qua hệ thống của LuxuryHouse</p>
<table class="table mt-3" style="font-size: 16px ;font-weight: bold">
    <tr>
        <td>Tên căn hộ </td>
        <td>{{$data['h_name']}}</td>
    </tr>
    <tr>
        <td>Ngày đặt phòng</td>
        <td>{{\Carbon\Carbon::now('Asia/Ho_Chi_Minh')}}</td>
    </tr>
    <tr>
        <td>Họ tên khách hàng</td>
        <td>{{$data['guest_name']}}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{$data['email']}}</td>
    </tr>
    <tr>
        <td>Phone</td>
        <td>{{$data['phone']}}</td>
    </tr>
    <tr>
        <td>Yêu cầu khác</td>
        <td>{{$data['request_guest']}}</td>
    </tr>
    <tr>
        <td>Thời gian</td>
        <td>{{$data['check_in']}} - {{$data['check_out']}}</td>
    </tr>
    <tr>
        <td>Số đêm</td>
        <td>{{$data['date_range']}}</td>
    </tr>
    <tr>
        <td>Số khách</td>
        <td>{{$data['n_person']}}</td>
    </tr>
    <tr>
        <td>Tổng giá</td>
        <td>{{$data['total']}} đ</td>
    </tr>
</table>
