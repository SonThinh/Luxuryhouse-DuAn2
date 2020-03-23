<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>Admin | Log In</title>
    <!-- custom-theme -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);

        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!-- //custom-theme -->
    <link href="{{asset('../resources/assets/admin/css/bootstrap.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="{{asset('../resources/assets/admin/css/style.css')}}" rel="stylesheet" type="text/css" media="all"/>
    <link href="//fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800" rel="stylesheet">
</head>
<body>
<!-- /pages_agile_info_w3l -->

<div class="pages_agile_info_w3l">
    <!-- /login -->
    <div class="over_lay_agile_pages_w3ls">
        <div class="registration">
            <div class="signin-form profile">
                <h2>Log in Admin</h2>
                <div class="login-form">
                    @if(Session::has('error'))
                        <div class="alert alert-danger alert-dismissible">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>{{ Session::get('error')}}</strong>
                        </div>
                    @endif
                    <form action="" method="post" id="login-form">
                        {{csrf_field()}}
                        <input type="text" name="email" placeholder="E-mail">
                        @if($errors->has('email'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{ $errors->first('email') }}</strong>
                            </div>
                        @endif
                        <input type="password" name="password" placeholder="Password">
                        @if($errors->has('password'))
                            <div class="alert alert-danger alert-dismissible">
                                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                <strong>{{ $errors->first('password') }}</strong>
                            </div>
                        @endif
                        <span><input type="checkbox" name="remember" id="remember" value="remember"> Remember</span>
                        <div class="tp">
                            <input type="submit" value="SIGN IN" id="btn-login">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!--copy rights start here-->
        <div class="copyrights_agile">
            <p>© 2019 . Admin <a href="#" target="_blank">PST</a></p>
        </div>
        <!--copy rights end here-->
    </div>
</div>
<!-- /login -->
<!-- //pages_agile_info_w3l -->
<!-- js -->
<script type="text/javascript" src="{{asset('../resources/assets/admin/js/jquery-2.1.4.min.js')}}"></script>
<!-- //js -->
<script type="text/javascript" src="{{asset('../resources/assets/admin/js/bootstrap-3.1.1.min.js')}}"></script>
</body>
</html>
