<!DOCTYPE html>
<html>
<head>
    <title>Luxury house</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta charset="utf-8">
    @include('layouts.header-style')
</head>
<body class="scrollbar" id="scrollbar">
<div class="preloader"></div>
<!-- Navigation -->
@include('layouts.header')
<!--main-->
@yield('main')
<!--main-->
@include('layouts.footer')
@include('layouts.footer-script')
</body>
</html>
