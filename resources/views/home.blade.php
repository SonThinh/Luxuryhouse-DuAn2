@include("pages.layouts.header")
<!--banner-->
<div class="banner p-3">
    <div class="container">
        <div class="row p-3">
            <div class="search col-sm-12 col-md-4">
                <p class="title">Tìm kiếm</p>
                <form action="#">
                    <div class="form-group">
                        <span class="form-label"><i class="fas fa-location"></i> Địa điểm</span>
                        <input type="text" class="form-control" id="text" placeholder="Địa điểm cần tìm">
                    </div>
                    <div class="form-group">
                                <span class="form-label"><i class="fas fa-arrow-to-right"></i> Check in - <i
                                            class="fas fa-arrow-alt-from-left"></i> Check out</span>
                        <input name="datetimes" class="form-control" readonly/>
                    </div>
                    <div class="form-group ">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span class="form-label">Người lớn</span>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                        <option>6</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                            <div class="col-sm-4">
                                <div class="form-group">
                                    <span class="form-label">Trẻ em</span>
                                    <select class="form-control">
                                        <option>0</option>
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                    <span class="select-arrow"></span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-btn">
                        <input type="submit" class="btn btn-block btn-primary" value="Tìm kiếm">
                    </div>
                </form>
            </div>
            <div class="slider col-sm-12 col-md-8">
                <div>
                    <img src="images/banner/HCMC.png">
                </div>
                <div>
                    <img src="images/banner/HN.png">
                </div>
                <div>
                    <img src="images/banner/DN.png">
                </div>
            </div>
            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!--//banner-->

<!--main-->
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
<!--main-->
<!--main-->
<div class="main p-3">
    <div class="container">
        <h2 class="title">Dịch vụ nổi bật</h2>
        <p class="mt-2">Luxury house cung cấp những dịch vụ tốt nhất để phục vụ quý khách</p>
        <div class="row services">
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <a href="#">
                        <img src="images/services/hire-car.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Thuê xe</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <a href="#">
                        <img src="images/services/pick-car.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Đưa đón tận nơi</div>
                        </div>
                    </a>
                </div>
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="card">
                    <a href="#">
                        <img src="images/services/ship-food.png" class="w-100" alt="">
                        <div class="card-items">
                            <div class="card-body">Ship món ăn</div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!--main-->
@include("pages.layouts.footer")