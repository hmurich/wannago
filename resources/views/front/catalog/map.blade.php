@extends('front.layout')
@section('title', $title)

@section('content')
<div class="under-search">
	@include('front.catalog.include.filtr')
</div>

<main class="catalog">
	<div class="inner">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><a href="{{ action('Front\CatalogController@getIndex', $cat->id) }}">{{ $cat->name }}</a></li>
		</ul>
		<h1 class="search-heading">{{ $cat->name }}</h1>
		<div class="search-type">
			<a class="search-type__item search-type__item--map" href="{{ App\Model\Generators\ModelSnipet::getUrlParams(array('on_map'=>0)) }}">На карте</a>
		</div>

		<div class="map">
			<div id='total_map' style="width: 100%; height: 400px;"></div>
		</div>

		<div class="about-des">
			@include('front.include.about-des', ['sys_key' => 'about_catalog'])
		</div>
	</div>
</main>

@section('js')
	@parent
	<script>
		var myMap;
		ymaps.ready(init);

		function init()
		{
			var city_center = "{{ $city->note }}";
    		city_center = city_center.split(',');

			myMap = new ymaps.Map("total_map",{
				center: [city_center[0], city_center[1]],
				zoom: 12,
				behaviors: ["default", "scrollZoom"]
			},
			{
				balloonMaxWidth: 300
			});

			@foreach ($items as $i)
				@if ($i->relLocation && $i->relLocation->lng && $i->relLocation->lat)
					myPlacemark = new ymaps.Placemark([{{ $i->relLocation->lng }}, {{ $i->relLocation->lat }}], {
		               balloonContent: "{!! '<a href=\"'.action('Front\Object\ShowController@getIndex', $i->alias).'\">'.$i->name.'</a>' !!}"
		            });
					myMap.geoObjects.add(myPlacemark);
				@endif
			@endforeach

			myMap.controls.add("zoomControl");
			myMap.controls.add("mapTools");
			myMap.controls.add("typeSelector");
		}
	</script>
@endsection


@endsection
