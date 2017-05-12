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
				<div class="search-type__left">
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
			</div>
			<a class="search-type__map"
					href="{{ App\Model\Generators\ModelSnipet::getUrlParams(array('on_map'=>1)) }}">
				На карте
			</a>
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
					<div class="right-info">
						<div class="zaved-center">
							<div class="zaved-center__inner">
								<span class="zaved-center__type">{{ $ar_object_type[$i->cat_id] }}</span>
								<a href="{{ action('Front\Object\ShowController@getIndex', $i->alias) }}" class="zaved-center__heading">
									{{ $i->name }}
								</a>
								<div class="stars {{ $i->raiting_full_round }}-star"></div>
								<a class="btn book fancybox fancybox.ajax" href="{{ action('Front\Object\ReserveController@getForm', $i->id) }}"> Забронировать</a>
							</div>
						</div>
						<div class="mini-info">
							@if ($i->relMainOptions()->whereIn('option_id', $ar_pub_id)->count())
	                            <div class="mini-info__row">
	                                <span>Тип заведения:</span>{{ $i->relMainOptions()->whereIn('option_id', $ar_pub_id)->select('name')->get()->implode('name', ', ') }}
	                            </div>
	                        @endif
	                        @if ($i->relMainOptions()->whereIn('option_id', $ar_karaoke_id)->count())
	                            <div class="mini-info__row">
	                                <span>Тип размещения:</span>{{ $i->relMainOptions()->whereIn('option_id', $ar_karaoke_id)->select('name')->get()->implode('name', ', ') }}
	                            </div>
	                        @endif
	                        @if ($i->relMainOptions()->whereIn('option_id', $ar_kitchen_id)->count())
	                            <div class="mini-info__row">
	                                <span>Кухня:</span>{{ $i->relMainOptions()->whereIn('option_id', $ar_kitchen_id)->select('name')->get()->implode('name', ', ') }}
	                            </div>
	                        @endif
	                        @if ($i->relMainOptions()->whereIn('option_id', $ar_music_id)->count())
	                            <div class="mini-info__row">
	                                <span>Музыка:</span>{{ $i->relMainOptions()->whereIn('option_id', $ar_music_id)->select('name')->get()->implode('name', ', ') }}
	                            </div>
	                        @endif


	                        @if ($i->relStandartData->price_for_hout > 0)
	                            <div class="mini-info__row">
	                                <span>Цена за час:</span>{{ $i->relStandartData->price_for_hout }}
	                            </div>
	                        @endif
	                        @if (isset($ar_avg_price[$i->relStandartData->avg_price_id]))
	        					<div class="mini-info__row">
	        						<span>Средний счет:</span>{{ $ar_avg_price[$i->relStandartData->avg_price_id] }}
	        					</div>
	                        @endif
	                        @if ($i->relStandartData->work_time	)
	        					<div class="mini-info__row">
	        						<span>Время работы:</span>{{ $i->relStandartData->work_time }}
	        					</div>
	                        @endif
	    					<div class="mini-info__row">
	    						<span>Телефон:</span>{{ $i->relStandartData->phone }}
	    					</div>
	    					<div class="mini-info__row">
	    						<span>Адрес:</span>{{ $i->relStandartData->address }}
	    					</div>

							@if ($i->relSpecialOption->count() > 0)
								<ul class="feature">
									@foreach ($i->relSpecialOption as $s)
										<li class="{{ $s->sys_key }}">
											<span class="feature-text">{{ $s->name }}</span>
										</li>
									@endforeach
								</ul>
							@endif
						</div>
					</div>
				</li>
            @endforeach
		</ul>
		{!! $items->appends($ar_input)->render() !!}
		<div class="about-des">
			@include('front.include.about-des', ['sys_key' => 'about_catalog_'.$cat->id])
		</div>
	</div>
</main>


@endsection
