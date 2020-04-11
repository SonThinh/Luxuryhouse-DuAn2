<!DOCTYPE html>
<html>
<head>
    <title>Admin | Dashboard</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
    <!-- //custom-theme -->
    <link href="{{asset('../resources/assets/admin/css/flipclock.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('../resources/assets/admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('../resources/assets/admin/css/component.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('../resources/assets/admin/css/style_grid.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('../resources/assets/admin/css/table-style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <link href="{{asset('../resources/assets/admin/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
    <!-- font-awesome-icons -->
    <link href="{{asset('../resources/assets/admin/css/bootstrap-toggle.min.css')}}" rel="stylesheet">
    <link href="{{asset('../resources/assets/admin/css/toast.min.css')}}" rel="stylesheet">
    <!-- //font-awesome-icons -->
    <link href="{{asset('../resources/assets/admin/css/font-awesome.css')}}" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>

@include("admin.layouts.header")
<!-- /inner_content-->
<div class="inner_content">
@yield('content')
</div>
<!-- //inner_content-->
@include("admin.layouts.footer")

<!-- js -->
<script type="text/javascript" src="{{asset('../resources/assets/home/js/jquery-3.4.1.min.js')}}"></script>
<script src="{{asset('../resources/assets/admin/js/classie.js')}}"></script>
<script src="{{asset('../resources/assets/admin/js/gnmenu.js')}}"></script>
<script>
    new gnMenu( document.getElementById( 'gn-menu' ) );
</script>
<!-- script-for-menu -->

<!-- //js -->
<script src="{{asset('../resources/assets/admin/js/screenfull.js')}}"></script>
<script>
    $(function () {
        $('#supported').text('Supported/allowed: ' + !!screenfull.enabled);

        if (!screenfull.enabled) {
            return false;
        }

        $('#toggle').click(function () {
            screenfull.toggle($('#container')[0]);
        });
    });
</script>
<script src="{{asset('../resources/assets/admin/js/flipclock.js')}}"></script>
<script type="text/javascript">
    var clock;

    $(document).ready(function() {

        clock = $('.clock').FlipClock({
            clockFace: 'HourlyCounter'
        });
    });
</script>

<script src="{{asset('../resources/assets/admin/js/bootstrap-toggle.min.js')}}"></script>
<script src="{{asset('../resources/assets/admin/js/toastr.min.js')}}"></script>
<script type="text/javascript" src="{{asset('../resources/assets/admin/js/bootstrap-3.1.1.min.js')}}"></script>
<script src="{{asset('../resources/assets/admin/js/jquery.nicescroll.js')}}"></script>
<script src="{{asset('../resources/assets/admin/js/scripts.js')}}"></script>

</body>
</html>
