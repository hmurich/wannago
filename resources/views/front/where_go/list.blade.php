@extends('front.layout')
@section('title', $title)

@section('content')

<main class="catalog">
	<div class="inner">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><a href="{{ action('Front\WhereGoController@getIndex') }}">Подборки</a></li>
			<li><span>{{ $where_go->name }}</span></li>
		</ul>
		<h1 class="search-heading">{{ $title }}</h1>
		<div class="search-type">
			<a class="search-type__item search-type__item--active" href="">По рейтингу</a>
			<a class="search-type__item" href="">Новые заведения</a>
			<a class="search-type__item" href="">По Стоимости</a>
			<a class="search-type__item search-type__item--map" href="">На карте</a>
		</div>

		<ul class="zaved-ul">
            @foreach ($items as $i)
                <li>
    				<div class="zaved-slider">
                        @forelse($i->relSlider as $s)
                            <div>
                                <img alt="{{ $i->title }}" src="{{ $s->image }}">
                            </div>
                        @empty
                            <div>
                                <img alt="{{ $i->title }}" src="/front/img/s-zaved.jpg">
                            </div>
                        @endforelse
    				</div>
    				<div class="zaved-center">
    					<div class="zaved-center__inner">
    						<span class="zaved-center__type">{{ $ar_object_type[$i->cat_id] }}</span>
    						<a href="{{ action('Front\Object\ShowController@getIndex', $i->alias) }}" class="zaved-center__heading">
                                {{ $i->name }}
                            </a>
    						<div class="stars {{ $i->raiting_full_round }}-star"></div>
    						<a class="btn book" href="#">Забронировать</a>
    					</div>
    				</div>
    				<div class="mini-info">
    					<div class="mini-info__row">
    						<span>Кухня:</span>Авторская, Восточная, Европейская
    					</div>
    					<div class="mini-info__row">
    						<span>Время работы:</span>Круглостуточно
    					</div>
    					<div class="mini-info__row">
    						<span>Телефон:</span>+7(7172) 40 39 16
    					</div>
    					<div class="mini-info__row">
    						<span>Адрес:</span>москва, ул. Покровка, д.19 М Китай-город, Чистые пруды
    					</div>
    					<div class="mini-info__row">
    						<span>Кол-во залов:</span> 1 этаж - 2 зала - 68 мест; 0 этаж - 2 зала -20 метс
    					</div>
    					<div class="feauture">

    					</div>
    				</div>
    			</li>
            @endforeach
		</ul>

		{!! $items->render() !!}
        <div class="about-des">
			@include('front.include.about-des', ['sys_key' => 'about_where'])
		</div>
	</div>
</main>


@endsection
