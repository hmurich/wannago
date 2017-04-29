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
<ul class="menu">
	<li class="menu__li">
		<a href="{{ action('Front\EventController@getIndex') }}">События</a>
	</li>
	<li class="menu__li">
		<a href="{{ action('Front\NewsController@getIndex') }}">Новости</a>
	</li>
	<li class="menu__li">
		<a href="{{ action('Front\WhereGoController@getIndex') }}">Подборки</a>
	</li>
	<li class="menu__li">
		<a class="fancybox" href="#adding">Добавить заведение</a>
	</li>
</ul>
