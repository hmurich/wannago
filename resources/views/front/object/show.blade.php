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
				<span class="zaved-up__heading">{{ $object->name }}</span>
				<div class="stars {{ $object->raiting_full_round }}star"></div>
				<span class="zaved-up__ocenky">{{ $object->relScore()->count() }} оценки</span>
			</div>
			<div class="zaved-second">
				<a class="zaved-book__button btn fancybox fancybox.ajax" href="{{ action('Front\Object\ReserveController@getForm', $object->id) }}">Забронировать столик</a>
				@if ($object->relLocation && $object->relLocation->lng && $object->relLocation->lat)
	                <a class="zaved-book__map" href="{{ action('Front\Object\ShowController@getIndex', $object->alias) }}#map">Посмотреть на карте</a>
	            @endif
			</div>
			<div class="zaved-info">
				<div class="zaved-info__left">
					<div class="wr">
						<div class="big-slider">
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
											<div class="feature">
												@foreach ($special_option as $i)
													<div class="{{ $i->sys_key }}">
														<span class="feature-text">
															{{ $i->name }}
														</span>
													</div>
												@endforeach
											</div>
										</div>
									</li>
								@endif
							</ul>
						</div>
						<div class="zav-des">
							<div class="top-up">
								<h3 class="top-up__heading">{{ $object->name }}</h3>
							</div>
							<div class="zav-content">
								{!! $object->relStandartData->note !!}
							</div>
						</div>

						@if (Auth::check())
							<div class="add-comment">
		                        <form action="{{ action('Front\Object\CommentController@postSave', $object->alias) }}" method="post">
		        					<span class="add-comment__heading">Ваш комментарий</span>
		        					<input class="add-comment__input" name='title' placeholder="Представьтесь пожалуйста..." type="text" required="">
		        					<textarea class="add-comment__textarea" name='note' placeholder="Текст отзыва..." required=""></textarea>
		        					<button class="btn add-comment__btn" type="submit">Отправить сообщение</button>
		                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
		                        </form>
							</div>
	                    @else
	                        <script src="//ulogin.ru/js/ulogin.js"></script>
	                        <script src="//ulogin.ru/js/ulogin.js"></script>
	                        <?php
	                            $uri = $_SERVER['REQUEST_URI'];
	                            $uri = str_replace("/", "%2F", $uri);
	                        ?>
	                        <script src="//ulogin.ru/js/ulogin.js"></script>
	                        Авторизуйтель для отзыва
	                        <div id="uLogin"
	                            data-ulogin="display=small;theme=classic;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri=http%3A%2F%2F{{ $_SERVER['HTTP_HOST'].$uri }};mobilebuttons=0;">
	                        </div>
	                    @endif

						<ul class="otzyv-ul">
							@foreach ($comments as $c)
								<li>
									<div class="otzyv-left">
										<span class="otzyv-left__login">
											{{ $i->title }}
										</span>
										<span class="otzyv-left__date">
											{{ $i->date_str }}
										</span>
									</div>
									<div class="otzyv-right">
										<p>{!! $i->note !!}</p>
									</div>
								</li>
							@endforeach
						</ul>
					</div>
				</div>
				<div class="zaved-info__right">
					<div class="wr">
						<div class="cont-zaved">
							<div class="cont-zaved__map">
								<div id='map' data-lng='{{ $object->relLocation->lng }}' data-lat='{{ $object->relLocation->lat }}' style="width: 100%; height: 150px;"></div>
							</div>
							<div class="cont-info">
								<span class="cont-info__row">
									{{ $standart_data->address }}
								</span>
								<span class="cont-info__row">
									{{ $standart_data->work_time }}
								</span>
								<span class="cont-info__row">
									{{ $standart_data->phone }}
								</span>
							</div>
							<div class="cont-bot">
								<a class="btn fancybox fancybox.ajax" href="{{ action('Front\Object\ReserveController@getForm', $object->id) }}">Забронировать</a>
							</div>
						</div>

						<div class="zav-events">
							<div class="top-zav">
								<span class="top-zav__heading">
									Ближайшие события в заведении
								</span>
							</div>
							@foreach ($events as $e)
								<a href="{{ action('Front\Object\EventController@getShow', array($object->alias, $e->id)) }}" class="new-zaved">
									<div class="new-zaved__img">
										@if ($e->image)
										   <img src="{{ $e->image }}" style="max-width: 112px;" />
										@else
										   <img src="/front/img/event.png" />
										@endif
									</div>
									<div class="t-zaved event-part">
										<span class="event-part__heading">
											{{ $e->title }}
										</span>
										<span class="event-part__date">
											{{ $e->date_str }}
										</span>
										<span class="btn btn--second" href="#">Подробнее</span>
									</div>
								</a>
							@endforeach
						</div>

						<div class="zav-news">
							<div class="top-zav">
								<span class="top-zav__heading">
									Акции заведения
								</span>
							</div>
							@foreach ($news as $n)
								<a href="{{ action('Front\Object\NewsController@getShow', array($object->alias, $n->id)) }}" class="new-zaved">
									<div class="new-zaved__img">
										@if ($n->image)
											<img alt="{{ $n->title }}" src="{{ $n->image }}">
										@else
											<img alt="{{ $n->title }}" src="/front/img/news-zaved.jpg">
										@endif
									</div>
									<div class="t-zaved event-part">
										<span class="event-part__heading">
											{{ $n->title }}
										</span>
										<span class="event-part__date">
											{{ $n->created_at }}
										</span>
										<span class="btn btn--second" href="#">Подробнее</span>
									</div>
								</a>
							@endforeach
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="reccoments">
			@include('front.object.include.simular_object')
		</div>
	</div>
</main>

@endsection
