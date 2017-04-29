<!DOCTYPE html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<title>{{ $title }}</title>
		<link href="{{ URL::asset('front/css/style.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('front/css/scrollbar.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ URL::asset('front/css/jquery.fancybox.css') }}" rel="stylesheet" type="text/css">
		<meta content="initial-scale=1, minimum-scale=1, width=device-width" name="viewport">
	</head>
	<body class="main">
		<div class="header">
			<div class="inner">
				@include('front.index.include.header')
			</div>
		</div>
		<div class="inner top-part">
            @include('front.index.include.top_part')
		</div>
		<div class="filtr inner">
            @include('front.index.include.filtr')
		</div>
		<main>
			<div class="inner">
				<div class="zaved-main">
					<div class="zaved-main__event">
						@include('front.index.block.event')
					</div>
					<div class="zaved-main__news">
                        @include('front.index.block.news')
                    </div>
					<div class="zaved-main__banners">
                        @include('front.index.block.banners')
					</div>
				</div>
				<div class="where">
                    @include('front.index.block.where')
				</div>
				<div class="reccoments">
                    @include('front.index.block.reccoments')
                </div>
				<div class="about-des">
                    @include('front.include.about-des', ['sys_key' => 'about_main'])
				</div>
			</div>
		</main>
		<footer class="footer">
            @include('front.include.footer')
        </footer>

		@include('front.modal.new_object')

        <script type="text/javascript" src="{{ URL::asset('http://code.jquery.com/jquery-3.0.0.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('https://code.jquery.com/ui/1.12.1/jquery-ui.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('front/js/script.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('front/js/slick.min.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('front/js/scrollbar.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('front/js/mousewheel.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('front/js/jquery.fancybox.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('front/add/sain.js') }}"></script>
		<script type="text/javascript" src="{{ URL::asset('front/add/main.js') }}"></script>


	</body>
</html>
