<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>{{ $title }}</title>
	<link rel="icon" type="image/png" href="/favicon.png" />
	<link href="{{ URL::asset('front/css/style.css') }}" rel="stylesheet" type="text/css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">	
</head>
<body>
	<div class="header">
		<div class="header-top">
			<div class="inner">
				@include('front.index.include.header')
			</div>
		</div>
		@include('front.index.include.header_bot')
	</div>


    @yield('content')

    <footer class="footer">
        @include('front.include.footer')
    </footer>

    @include('front.modal.new_object')


	 <script type="text/javascript" src="{{ URL::asset('//api-maps.yandex.ru/2.0/?load=package.standard&lang=ru-RU') }}" ></script>
   <script type="text/javascript" src="{{ URL::asset('http://code.jquery.com/jquery-3.0.0.min.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('front/js/jquery.fancybox.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('front/js/script.js') }}"></script>
   <script type="text/javascript" src="{{ URL::asset('front/js/slick.min.js') }}"></script>   
	@yield('js')	
</body>
</html>
