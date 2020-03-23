@extends('index')
@section('title','area')
@section('main')
    @include('layouts.banner')
    <div class="main p-3">
        <div class="container">
            <h2 class="title">Địa điểm nổi bật</h2>
            <p class="mt-2">Cùng Luxury House chinh phục danh lam thắng cảnh của Việt Nam</p>
            <div class="card-columns mt-2">
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/HCM.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Hồ Chí Minh</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/DL.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Đà Lạt</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/DN.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Đà Nẵng</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/HL.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Hạ Long</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/HN.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Hà Nội</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/HoiAn.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Hội An</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/Hue.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Huế</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/NT.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Nha Trang</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/PQ.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Phú Quốc</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/PT.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Phan Thiết</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/SP.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">SaPa</div>
                        </div>
                    </a>
                </div>
                <div class="card">
                    <a href="place-detail.html">
                        <img src="images/city/VT.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Vũng Tàu</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    @include('pages.service')
@endsection
