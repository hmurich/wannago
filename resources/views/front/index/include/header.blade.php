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

<a class="logo" href="/"></a>
<div class="mob-menu">
	<span></span>
	<span></span>
	<span></span>
</div>
<div class="right-search">
	<form action="{{ action('Front\SearchController@getIndex') }}">
		<input class="right-search__input" name='name' type="search" placeholder="название заведения">
		<input class="right-search__submit" type="submit">
	</form>
</div>
