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
			<a class="search-type__item {{ (!isset($ar_input['sort']) || $ar_input['sort'] == 'raiting' ? 'search-type__item--active' : null) }}"
					href="{{ App\Model\Generators\ModelSnipet::getUrlParams(array('sort'=>'raiting')) }}">
				По рейтингу
			</a>
			<a class="search-type__item {{ (isset($ar_input['sort']) && $ar_input['sort'] == 'new' ? 'search-type__item--active' : null) }}"
					href="{{ App\Model\Generators\ModelSnipet::getUrlParams(array('sort'=>'new')) }}">
				Новые заведения
			</a>
			<a class="search-type__item {{ (isset($ar_input['sort']) && $ar_input['sort'] == 'cost' ? 'search-type__item--active' : null) }}"
					href="{{ App\Model\Generators\ModelSnipet::getUrlParams(array('sort'=>'cost')) }}">
				По Стоимости
			</a>
			<a class="search-type__item search-type__item--map" href="{{ App\Model\Generators\ModelSnipet::getUrlParams(array('on_map'=>0)) }}">На карте</a>
		</div>

		<div class="about-des">
			@include('front.include.about-des', ['sys_key' => 'about_catalog'])
		</div>
	</div>
</main>


@endsection
