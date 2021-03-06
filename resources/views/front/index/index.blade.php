<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>{{ $title }}</title>
		<link rel="icon" type="image/png" href="/favicon.png" />
		<link href="{{ URL::asset('front/css/style.css') }}" rel="stylesheet" type="text/css">
		<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
	</head>
	<body class="main">
		<div class="header">
			<div class="header-top">
				<div class="inner">
					@include('front.index.include.header')
				</div>
			</div>
			@include('front.index.include.header_bot')
		</div>
		<div class="main-part">
			<div class="main-slider">
				@include('front.index.include.main_slider')
			</div>
			<div class="main-filtr">
				@include('front.index.include.main_filter')
			</div>
		</div>

		<main role="main">
			@if ($recomended->count() > 0)
				<div class="inner news">
					@include('front.index.block.reccoments')				
				</div>
			@endif
			@if ($events->count() > 0)
				<div class="events">
					<div class="inner">
						@include('front.index.block.event')
					</div>
				</div>
			@endif
			@if ($news->count() > 0)
				<div class="news">
					<div class="inner">
						@include('front.index.block.news')
					</div>
				</div>
			@endif

			<div class="about-des">
				<div class="inner">
					@include('front.include.about-des', ['sys_key' => 'about_main'])
				</div>
			</div>
		</main>

		<footer class="footer">
            @include('front.include.footer')
        </footer>

		<div class="instagram">
			@include('front.include.instagram')

		</div>

		@include('front.modal.new_object')
    <script type="text/javascript" src="{{ URL::asset('http://code.jquery.com/jquery-3.0.0.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('front/js/jquery.fancybox.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('front/js/script.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('front/js/slick.min.js') }}"></script>		
	</body>
</html>
