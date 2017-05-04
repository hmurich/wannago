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
			<div class="zaved-in">
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
					@if ($special_option->count() > 0)
						<li>
							<div class="character">
								<span class="character__heading">Особенности</span>
								<ul class="feature">
									@foreach ($special_option as $i)
										<li class="{{ $i->sys_key }}"></li>
									@endforeach
								</ul>
							</div>
						</li>
					@endif
				</ul>
				<a class="btn more-btn" href='#zav-des"'>Подробная информация</a>
			</div>

			@if ($events->count() > 0)
				<div class="zav-events">
					<div class="zav-up">
						<h3 class="zav-up__heading">Ближайшие события в <span>{{ $object->name }}</span></h3>
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
			@endif

			<div class="zav-des" id='zav-des"'>
				<div class="zav-up">
					<h3 class="zav-up__heading">{{ $object->name }}</span></h3>
				</div>
				<div class="zav-content">
                	{!! $object->relStandartData->note !!}
				</div>
            </div>

			@if ($news->count() > 0)
				<div class="zav-news">
					<div class="zav-up">
						<h3 class="zav-up__heading">Новости</h3>
						<a class="link" href="{{ action('Front\Object\NewsController@getList', $object->alias) }}">Все события</a>
					</div>
					<ul class="nzav-ul">
						@foreach ($news as $n)
							<li>
								<div class="news-inner">
									<a href="{{ action('Front\Object\NewsController@getShow', array($object->alias, $n->id)) }}" class="img-news">
										@if ($n->image)
											<img alt="{{ $n->title }}" src="{{ $n->image }}">
										@else
											<img alt="{{ $n->title }}" src="/front/img/news-zaved.jpg">
										@endif
									</a>
									<div class="nmini">
										<a class="nmini__heading" href="{{ action('Front\Object\NewsController@getShow', array($object->alias, $n->id)) }}">
											{{ $n->title }}
										</a>
										<span class="nmini__date">{{ $n->created_at }}</span>
										{!! $n->note !!}
									</div>
								</div>
							</li>
						@endforeach
					</ul>
				</div>
			@endif

			@if ($object->relLocation && $object->relLocation->lng && $object->relLocation->lat)
				<div class="zav-map">
					<div class="zav-up">
						<h3 class="zav-up__heading">Найти нас <span>на карте</span></h3>
					</div>
					<div class="map">
						<div id='map' data-lng='{{ $object->relLocation->lng }}' data-lat='{{ $object->relLocation->lat }}' style="width: 100%; height: 400px;"></div>
					</div>
				</div>
			@endif
		</div>
		<div class="reccoments">
			@include('front.object.include.simular_object')
		</div>
	</div>
</main>

@endsection
