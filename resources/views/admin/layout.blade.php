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
            @include('admin.include.content_top')

            <section class="content">
                @yield('content')
            </section>
        </div>

        <footer class="main-footer">
            @include('admin.include.footer')
        </footer>
    </div>

    <script type="text/javascript" src="{{ URL::asset('admin/plugins/jQuery/jquery-2.2.3.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/bootstrap/js/bootstrap.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/slimScroll/jquery.slimscroll.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/plugins/fastclick/fastclick.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/dist/js/app.min.js') }}" ></script>
    <script type="text/javascript" src="{{ URL::asset('admin/dist/js/demo.js') }}" ></script>
</body>
</html>
