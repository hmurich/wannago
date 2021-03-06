<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>CreativeCMS | @yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/bootstrap/css/bootstrap.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/plugins/select2/select2.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/dist/css/AdminLTE.min.css') }}" >
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('admin/dist/css/skins/_all-skins.min.css') }}" >

</head>
<body class="hold-transition skin-blue sidebar-mini">

    <div class="wrapper">
        <header class="main-header">
            @include('admin.include.header')
        </header>

        <aside class="main-sidebar">
            @include('admin.include.sidebar')
        </aside>

        <div class="content-wrapper">
            <section class="content">
                @include('admin.include.message')

                @yield('content')
            </section>
        </div>


    </div>

    <script type="text/javascript" src="{{ URL::asset('//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/select2/select2.full.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/fastclick/fastclick.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') }}" ></script>

    <script type="text/javascript" src="{{ URL::asset('admin/dist/js/app.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/dist/js/demo.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/my/map.js') }}" ></script>
    <script>
        $(function () {
            //Initialize Select2 Elements
            $(".select2").select2();
            $(".wysihtml5").wysihtml5();
        });
    </script>
</body>
</html>
