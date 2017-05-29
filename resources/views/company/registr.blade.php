<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CreativeCMS | {{ $title }}</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/bootstrap/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/dist/css/AdminLTE.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/dist/css/skins/_all-skins.min.css') }}" >
</head>
<body class="hold-transition login-page">
    <div class="login-box">

        @include('admin.include.message')

        <div class="login-logo">
            <a href="#"><b>Creative</b>CMS</a>
        </div>
        <div class="login-box-body">
            <p class="login-box-msg">Форма регистрации</p>
            <form action="{{ $action }}" method="post">
                <div class="form-group has-feedback">
                    <input type="email" class="form-control" placeholder="Email" name="email" required="">
                    <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="password" class="form-control" placeholder="Password" name="password" required="">
                    <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name='name' placeholder="ФИО"  required="">
                    <span class="glyphicon glyphicon-user form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="tel" class="form-control" name='phone' placeholder="Телефон"  required="">
                    <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                </div>
                <div class="form-group has-feedback">
                    <input type="text" class="form-control" name='address' placeholder="Адресс"  required="">
                    <span class="glyphicon glyphicon-home form-control-feedback"></span>
                </div>
                <div class="row">
                    <div class="col-xs-4">
                        <button type="submit" class="btn btn-primary btn-block btn-flat">Войти</button>
                    </div>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/fastclick/fastclick.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/iCheck/icheck.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/dist/js/app.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/dist/js/demo.js') }}" ></script>
    <script>
        $(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
        });
    </script>
</body>
</html>
