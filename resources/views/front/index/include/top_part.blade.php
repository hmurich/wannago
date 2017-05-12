<div class="center-part">
		<div class="top-part__minitext">
			<span>Огромный каталог заведений по Казахстану</span>
		</div>
		<div class="main-text">
			<div class="main-text__info">
				<div class="main-text__heading">Найди лучшее заведение </div>
				<div class="city">
					<span class="active" href="#">В Астане</span>
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
		<div class="filtr">
			<form action='{{ action("Front\CatalogController@getIndex", $cat_id) }}' method="get">
				<div class="filtr-select">
					<span class='js_option_title' data-def='Вид заведения'>{{ ($request->has('cat_id') ? $ar_object_type[$request->input('cat_id')] : 'Вид заведения') }}</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите вид заведения:</div>
                        @foreach ($ar_object_type as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="?cat_id={{ $k }}" data-id='{{ $k }}' data-type='pub_id'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='cat_id' value='{{ $cat_id }}' class='js_option_pub_id'>
                    </div>
				</div>
				<div class="filtr-select">
					<span class='js_option_title' data-def='Особенности'>Особенности</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите особенности:</div>
                        @foreach ($spec_option[$cat_id] as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#spec_option" data-id='{{ $k }}' data-type='spec_option'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='spec_option[]' value='0' class='js_option_spec_option'>
                    </div>
				</div>
				<div class="filtr-select">
					<span class='js_option_title' data-def='Средний счет'>Средний счет</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите средний счет:</div>
                        @foreach ($ar_avg_pice as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#avg_price" data-id='{{ $k }}' data-type='avg_price'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='avg_price' value='0' class='js_option_avg_price'>
                    </div>
				</div>
				<button class="btn filtr-search" type="submit">Искать по каталогу</button>
			</form>
			</div>
		</div>
	</div>
