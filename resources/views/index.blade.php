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
<script type="text/javascript" src="{{asset('../resources/assets/home/js/bootstrap.js')}}"></script>
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

<script type="text/javascript" src="{{asset('../resources/assets/home/js/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('../resources/assets/home/js/daterangepicker.min.js')}}"></script>
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
<!-- //js-scripts -->
</body>
</html>
