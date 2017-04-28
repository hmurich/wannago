@extends('front.layout')
@section('title', $title)

@section('content')
<main>
	<div class="inner">
		<ul class="breadcrumbs">
            @include('front.object.include.breadcrumbs')
		</ul>
		<div class="zaved-part">
			<div class="zaved-up">
                @include('front.object.include.zaved_up')
			</div>
			<div class="zaved-menu">
                @include('front.object.include.zaved_menu')
			</div>

			<div class="big-slider">
                @foreach ($object->relSlider as $s)
                    <div>
                        <img src="{{ $s->image }}" style="width: 100%;">
                    </div>
                @endforeach
			</div>
			<div class="mini-slider">
                @foreach ($object->relSlider as $s)
                    <div>
                        <img src="{{ $s->image }}" style="width: 100%;">
                    </div>
                @endforeach
			</div>
			<ul class="zaved-rows">
                @if ($main_pub)
    				<li>
    					<div class="character">
    						<span class="character__heading">Тип заведения</span>
    						<p class="character__text">{{ $main_pub }}</p>
    					</div>
    				</li>
                @endif
                @if ($main_karaoke)
    				<li>
    					<div class="character">
    						<span class="character__heading">Тип размещения</span>
    						<p class="character__text">{{ $main_karaoke }}</p>
    					</div>
    				</li>
                @endif
                @if ($main_kitchen)
    				<li>
    					<div class="character">
    						<span class="character__heading">Кухня</span>
    						<p class="character__text">{{ $main_kitchen }}</p>
    					</div>
    				</li>
                @endif
                @if ($main_musik)
    				<li>
    					<div class="character">
    						<span class="character__heading">Музыка</span>
    						<p class="character__text">{{ $main_musik }}</p>
    					</div>
    				</li>
                @endif
                @if (isset($ar_avg_price[$object->relStandartData->avg_price_id]))
    				<li>
    					<div class="character">
    						<span class="character__heading">Средний счет</span>
    						<p class="character__text">{{ $ar_avg_price[$object->relStandartData->avg_price_id] }}</p>
    					</div>
    				</li>
                @endif
                @if ($object->relStandartData->price_for_hout > 0)
                    <li>
                        <div class="character">
                            <span class="character__heading">Цена за час</span>
                            <p class="character__text">{{ $object->relStandartData->price_for_hout }}</p>
                        </div>
                    </li>
                @endif
                @foreach ($object->relDopOption as $o)
                    <li>
                        <div class="character">
                            <span class="character__heading">{{ $o->option_name }}</span>
                            <p class="character__text">{{ $o->option_value }}</p>
                        </div>
                    </li>
                @endforeach
			</ul>
			<div class="zav-events">
				<div class="zav-up">
					<h3 class="zav-up__heading">Ближайшие события в <span>chechil pub</span></h3>
					<a class="link" href="#">Все события</a>
				</div>
				<ul class="event-list">
                    @foreach ($events as $e)
                        <li>
                             <a href="{{ action('Front\Object\EventController@getShow', array($object->alias, $e->id)) }}" class="mini-event">
                                <div class="mini-event__img">
                                    @if ($e->catalog_image)
                                        <img src="{{ $e->catalog_image }}" style="max-width: 112px;" />
                                    @else
                                        <img src="/front/img/event.png" />
                                    @endif
                                </div>
                                <span class="mini-event__heading">
                                    {{ $e->title }}
                                </span>
                                <div class="event-date">
                                    <span class="event-date__time">{{ $e->time_str}}</span>
                                    <span class="event-date__text">{{ $e->date_str }}</span>
                                </div>
                            </a>
                        </li>
                    @endforeach
                </ul>
			</div>
			<div class="zav-des">
				<div class="zav-up">
					<h3 class="zav-up__heading">{{ $object->name }}</span></h3>
				</div>
                {!! $object->relStandartData->note !!}
            </div>
			<div class="zav-map">
				<div class="zav-up">
					<h3 class="zav-up__heading">Найти нас <span>на карте</span></h3>
				</div>
				<div class="map">
					<div id='map' data-lng='{{ $object->relLocation->lng }}' data-lat='{{ $object->relLocation->lat }}' style="width: 100%; height: 400px;"></div>
				</div>
			</div>
		</div>
		<div class="reccoments">
			<div class="top-up">
				<div class="heading">
					<span class="heading__mini">Рейтинговые заведения</span>
					<h4 class="heading__text">Рекомендации</h4>
				</div>
			</div>
			<ul class="new-ul">
                @foreach ($simular_object as $r)
    				<li>
                        <a href="{{ action('Front\Object\ShowController@getIndex', $r->alias) }}" class="new-zaved">
                            <div class="new-zaved__img">
                                @if ($r->relSlider()->first())
                                    <img src="{{ $r->relSlider()->first()->image }}">
                                @else
                                    <img src="/front/img/zaved2.jpg">
                                @endif
                            </div>
                            <div class="t-zaved">
                                <span class="t-zaved__type">
                                    {{ $ar_object_type[$r->cat_id] }}
                                </span>
                                <span class="t-zaved__heading" href="#">
                                    {{ $r->name }}
                                </span>
                                <div class="stars {{ $r->raiting_full_round }}-star"></div>
                            </div>
                        </a>
    				</li>
                @endforeach
			</ul>
		</div>
	</div>
</main>

@endsection
