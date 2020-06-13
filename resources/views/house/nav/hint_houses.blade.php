<h2 class="title">Chỗ ở tương tự</h2>
<div class="row ml-1">
    @foreach($houses_hint as $house_hint)
        @dd($house_hint)
{{--        @php--}}
{{--            $images = json_decode($house_hint->image);--}}
{{--        @endphp--}}
        <div class="col-sm-12 col-md-4 home-content">
{{--            <a href="home-detail.html"><img src="{{asset($images->path)}}" alt="" class="w-100"></a>--}}
            <p class="home-type">Nhà riêng</p>
            <a href="home-detail.html"><p class="home-name">Hana house</p></a>
            <div class="home">
                <div class="home-detail d-flex">
                    <p>2 khách-1 phòng ngủ-1 phòng tắm</p>
                </div>
                <p class="home-price">370,000đ/đêm</p>
                <p class="home-address">Số 10, ngõ 61 Đường Đào Duy Từ, Phường 3, Thành phố Đà Lạt, Lâm
                    Đồng
                </p>
                <div class="home-star"><i class="fas fa-star" style="color: yellow"></i><i
                        class="fal fa-star"></i><i
                        class="fal fa-star"></i><i class="fal fa-star"></i><i class="fal fa-star"></i>
                </div>
            </div>
        </div>
    @endforeach
</div>
