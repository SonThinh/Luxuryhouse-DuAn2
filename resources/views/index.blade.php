<!DOCTYPE html>
<html>
<head>
    <title>Luxury house</title>
    <!-- Meta tag Keywords -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    <!--// Meta tag Keywords -->
    <!-- css files -->
    <link rel="stylesheet" href="{{asset('../resources/assets/home/css/bootstrap.css')}}"> <!-- Bootstrap-Core-CSS -->
    <link rel="stylesheet" type="text/css" href="{{asset('../resources/assets/home/css/daterangepicker.css')}}"/>
    <link rel="stylesheet" href="{{asset('../resources/assets/home/css/style.css')}}" type="text/css" media="all"/> <!-- Style-CSS -->
    <link href="{{asset('../resources/assets/home/css/toggle-bt4.min.css')}}" rel="stylesheet">
    <link href="{{asset('../resources/assets/admin/css/toast.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('../resources/assets/home/css/fontawesome-all.css')}}"> <!-- Font-Awesome-Icons-CSS -->
    <!-- //css files -->
    <!-- favicon -->
    <link rel="icon" type="image/ico" href="{{asset('../resources/assets/home/images/logo/logo.ico')}}"/>
    <!-- //favicon -->

</head>
<body>
<!-- Navigation -->
@include('layouts.header')
<!--main-->
@yield('main')
<!--main-->
@include('layouts.footer')

<!-- js-scripts -->
<!-- js -->

<script type="text/javascript" src="{{asset('../resources/assets/home/js/jquery-3.4.1.min.js')}}"></script>
<script type="text/javascript" src="{{asset('../resources/assets/home/js/daterangepicker.min.js')}}"></script>
<script src="{{asset('../resources/assets/home/js/toggle-bt4.min.js')}}"></script>
<script src="{{asset('../resources/assets/admin/js/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('../resources/assets/home/js/bootstrap.js')}}"></script>

<!-- //js -->
<!--date range picker-->
<script>

</script>

<script type="text/javascript" src="{{asset('../resources/assets/home/js/moment.js')}}"></script>
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
<script type="text/javascript" src="{{asset('../resources/assets/home/js/move-top.js')}}"></script>
<script type="text/javascript" src="{{asset('../resources/assets/home/js/home-thumbnail-detail.js')}}"></script>
<script type="text/javascript" src="{{asset('../resources/assets/home/js/easing.js')}}"></script>
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

<script type="text/javascript" src="{{asset('../resources/assets/home/js/script.js')}}"></script>


<!-- //js-scripts -->
</body>
</html>
