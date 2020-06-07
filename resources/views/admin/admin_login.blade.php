<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Admin</title>
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{asset('../resources/assets/css/bootstrap-v4.5.min.css')}}" rel="stylesheet">
    <link href="{{asset('../resources/assets/css/admin/admin.min.css')}}" rel="stylesheet">
    <link href="{{asset('../resources/assets/css/toastr-v2.1.3.min.css')}}" rel="stylesheet">
    <link href="{{asset('../resources/assets/css/admin/admin-style-1.css')}}" rel="stylesheet">
    <link rel="icon" type="image/ico" href="{{asset('../resources/assets/images/logo/logo.ico')}}"/>
</head>

<body class="bg-gradient-primary">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-xl-10 col-lg-12 col-md-9">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Welcome to Admin</h1>
                                </div>
                                <form class="user" action="{{route('admin.login')}}" id="admin-login">
                                    @csrf
                                    <div class="form-group">
                                        <input type="text" name="email" class="form-control form-control-user"
                                               placeholder="Enter Email Address...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" name="password" class="form-control form-control-user"
                                               placeholder="Password">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck"
                                                   name="remember" value="remember">
                                            <label class="custom-control-label" for="customCheck">Remember Me</label>
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-primary btn-user btn-block" id="btn-login-admin"
                                           value="Đăng nhập">

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="{{asset('../resources/assets/js/jquery-v3.5.1.min.js')}}"></script>
<script src="{{asset('../resources/assets/js/toastr-v2.1.3.min.js')}}"></script>
<script src="{{asset('../resources/assets/js/admin/admin.min.js')}}"></script>
<script src="{{asset('../resources/assets/js/admin/admin-2.js')}}"></script>

</body>
</html>
