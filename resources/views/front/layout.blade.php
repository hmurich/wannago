<!DOCTYPE html>
<html lang="ru">
<head>
	<meta charset="utf-8">
	<title>{{ $title }}</title>
	<link rel="icon" type="image/png" href="/favicon.png" />
	<link href="{{ URL::asset('front/css/style.css') }}" rel="stylesheet" type="text/css">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
	<meta name="google-site-verification" content="eNekFUyOKHm1r_ZO9oEakGufsCgu2Mi5jfVCeLOR1oM" />
	<meta property="og:type" content="business.business">
	<meta property="og:title" content="Weekends - это гид #1 по заведениям Астаны, Алматы и всего Казахстана.">
	<meta property="og:url" content="http://weekends.kz/">
	<meta property="og:image" content="http://weekends.kz/upload/galerea/1497250428_barley.jpg">
	<meta property="business:contact_data:street_address" content="">
	<meta property="business:contact_data:locality" content="Астана">
	<meta property="business:contact_data:region" content="Акмолинская область">
	<meta property="business:contact_data:postal_code" content="010000">
	<meta property="business:contact_data:country_name" content="Казахстан">

	<div itemscope itemtype="http://schema.org/Product" style="    display: none;">
		<span itemprop="brand">Weekends</span> -
		<span itemprop="name">Weekends</span><br>
		<img itemprop="image" src="http://weekends.kz/"><br>
		<span itemprop="description">Weekends - это гид #1 по заведениям Астаны, Алматы и всего Казахстана.
			Устали искать заведения в одном сервисе, события в другом, актуальные информаций в третьем ?
			С Weekends теперь Вы можете получать информацию о самых свежих и об актуальных заведениях Вашего города,
			 о событиях, начиная от маленького концерта до больших масштабных ивентов, подборку наиболее подходящих мест
			 согласно Вашим личным предпочтениям. Также "Weekends" формирует рейтинг ТОПовых заведений, анализируя реальные отзывы
			 "живых" посетителей и много другое.
		 </span><br>
		  Product number: <span itemprop="productID" content="upc:"></span><br>
			<div itemprop="offers" itemscope itemtype="http://schema.org/Offer">
				Price: <span itemprop="price">0.00</span><br>
				Condition: <span itemprop="itemCondition" content="new">new</span>
			</div>
	</div>
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

	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-101881634-1', 'auto');
		ga('send', 'pageview');

	</script>
</body>
</html>
