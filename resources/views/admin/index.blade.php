<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title> Luxury House Admin</title>
    @include('admin.layouts.header-style')
</head>

<body id="page-top">
<!-- Page Wrapper -->
@include("admin.layouts.header")
@yield('content')
@include("admin.layouts.footer")
@include('admin.layouts.footer-script')
</body>
</html>
