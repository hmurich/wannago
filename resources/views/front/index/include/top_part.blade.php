<a class="top-part__logo"></a>
<div class="top-part__minitext">
	<span>Огромный каталог заведений по Казахстану</span>
</div>
<div class="main-text">
	<div class="main-text__info">
		<div class="main-text__heading">Найди своё заведение </div>
		<div class="city">
			<span class="active" href="#">{{ (isset($ar_city[$city_id]) ? $ar_city[$city_id] : 'Астана') }}</span>
			<ul class="city-list">
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
</div>
