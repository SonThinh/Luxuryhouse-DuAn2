<!DOCTYPE html>
<html lang="vi">
<head>
    <title>Luxury house</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!--// Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="{{asset('resources/assets/css/bootstrap.css')}}"> <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('resources/assets/css/bootstrap.css')}}"/>
    <link rel="stylesheet" href="{{asset('resources/assets/css/style.css')}}" type="text/css" media="all"/> <!-- Style-CSS -->
    <link rel="stylesheet" href="{{asset('resources/assets/css/fontawesome-all.css')}}"> <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->

    <!-- favicon -->
    <link rel="icon" type="image/ico" href="{{asset('resources/assets/images/logo/logo.ico')}}"/>
    <!-- //favicon -->

</head>

<body>

<!-- Navigation -->
<header>
    <div class="top-nav">
        <div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="{{URL::to('/home')}}">
                    <div class="logo d-flex">
                        <img src="{{asset('resources/assets/images/logo/logo.png')}}">
                        <div class="logo-name text-uppercase ml-1 mt-2 d-block">
                            <p>Luxury<br>house</p>
                        </div>
                    </div>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-center pr-md-4" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active" href="index.html"><span>Địa điểm</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><span>Host</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="login.html"><span>Đăng nhập</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="register.html" ><span>Đăng ký</span></a>
                        </li>

                    </ul>
                </div>
            </nav>
        </div>
    </div>
</header>
<!-- //Navigation -->

@yield('content')
<!-- footer -->
<footer>
    <div class="container py-3 py-md-4">
        <div class="row">
            <div class="col-lg-2 col-md-12 text-center">
                <a href="index.html">
                    <img src="images/logo/logo.png" class="w-50">
                    <div class="logo-name text-uppercase">
                        <p>Luxury house</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-4 col-md-12">
                <span>TOP HOMESTAY ĐƯỢC YÊU THÍCH</span>
                <ul class="top-homestay">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Food menu</a></li>
                    <li><a href="#">Error page</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12">
                <span>KHÔNG GIAN YÊU THÍCH</span>
                <ul class="top-space">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Food menu</a></li>
                    <li><a href="#">Error page</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>
            </div>
            <div class="col-lg-3 col-md-12">
                <span>VỀ CHÚNG TÔI</span>
                <ul class="about-us">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Services</a></li>
                    <li><a href="#">Food menu</a></li>
                    <li><a href="#">Error page</a></li>
                    <li><a href="#">Contact</a></li>
                </ul>

                <span>KẾT NỐI VỚI CHÚNG TÔI</span>
                <ul class="follow-us d-flex">
                    <li><a href="#" id="fb"><i class="fab fa-facebook-square"></i></a></li>
                    <li class="pl-3"><a href="#" id="yt"><i class="fab fa-youtube"></i></a></li>
                    <li class="pl-3"><a href="#" id="ins"><i class="fab fa-instagram"></i></a></li>
                </ul>
            </div>
        </div>
        <div class="text-center">
            <p class="py-lg-4">© 2020 Luxury house.Design by <a href="#"><span style="color: #ff5722">PST</span></a>
            </p>
        </div>
    </div>

</footer>
<!-- footer -->
<!-- js-scripts -->

<!-- js -->
<script type="text/javascript" src="{{asset('resources/assets/js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/assets/js/bootstrap.js')}}"></script>
<!-- //js -->
<!--date range picker-->
<script>
    $(function () {
        $('input[name="datetimes"]').daterangepicker({
            timePicker: true,
            startDate: moment().startOf('hour'),
            endDate: moment().startOf('hour').add(32, 'hour'),
            locale: {
                format: 'DD/MM hh:mm A'
            }
        });
    });
</script>

<script type="text/javascript" src="{{asset('resources/assets/js/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/assets/js/daterangepicker.min.js')}}"></script>
<!--//date range picker-->
<!--slider-->
<script>
    $(".slider > div:gt(0)").hide();

    setInterval(function () {
        $('.slider > div:first')
            .fadeOut(1000)
            .next()
            .fadeIn(1000)
            .end()
            .appendTo('.slider');
    }, 5000);
</script>
<!--//slider-->
<!-- start-smooth-scrolling -->
<script type="text/javascript" src="{{asset('resources/assets/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('resources/assets/js/easing.js')}}"></script>
<script type="text/javascript">
    $(document).ready(function ($) {
        $(".scroll").click(function (event) {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1000);
        });
    });
</script>
<!-- here stars scrolling icon -->
<script type="text/javascript">
    $(document).ready(function () {
        $().UItoTop({easingType: 'easeOutQuart'});
    });
</script>
<!-- //here ends scrolling icon -->
<!-- start-smooth-scrolling -->
<!-- //js-scripts -->
</body>
</html>
