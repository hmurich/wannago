@extends('front.layout')
@section('title', $title)

@section('content')

<main class="news">
	<div class="inner">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><span>Карта сайта</span></li>
		</ul>
        <h1>Карта сайта</h1>

        <h2>Города</h2>
		<ul>
			@foreach ($ar_city as $k=>$v)
				<li>
					<a href="{{ action('Front\IndexController@getChangeCity', $k) }}">{{ $v }}</a>
				</li>
			@endforeach
		</ul>

		<h2>Категории</h2>
		<ul>
			@foreach ($ar_object_type as $k=>$v)
				<li>
					<a href="{{ action("Front\CatalogController@getIndex", $k) }}">{{ $v }}</a>
				</li>
			@endforeach
		</ul>

		<h2>Заведения</h2>
		<ul>
			@foreach ($objects as $k=>$v)
				<li>
					<a href="{{ action('Front\Object\ShowController@getIndex', $v->alias) }}">{{ $v->name }}</a>
				</li>
			@endforeach
		</ul>

    </div>
</main>

@endsection
