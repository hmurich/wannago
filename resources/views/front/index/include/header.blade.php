
<a class="logo" href="/">
</a>
<span class="slogan">Каталог заведений по Казахстану</span>
<div class="city-select">
	<div class="city-select__left">Город:</div>
	<div class="city-select__part">
		<span>{{ (isset($ar_city[$city_id]) ? $ar_city[$city_id] : 'Астана') }}</span>
		<ul class="city-lines">
			@foreach ($ar_city as $k=>$name)
				@if ($k != $city_id)
					<li>
						<a href="{{ action('Front\IndexController@getChangeCity', $k) }}">{{ $name }}</a>
					</li>
				@endif
			@endforeach
		</ul>
	</div>
</div>
<div class="mob-menu">
	<span></span>
	<span></span>
	<span></span>
</div>
