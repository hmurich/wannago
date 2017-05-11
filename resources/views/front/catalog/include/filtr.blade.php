<div class="inner">
    <form method="get" action="{{ action('Front\CatalogController@getIndex', $cat->id) }}">
        <span class="under-search__heading">Выберите параметры:</span>
        <div class="unfilter">
            @if ($cat->id == 9)
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Тип заведения'>{{ (isset($ar_input['pub_id']) && isset($ar_pub_type[$ar_input['pub_id']]) ? $ar_pub_type[$ar_input['pub_id']] : 'Тип заведения') }}</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите тип заведения:</div>
                        @foreach ($ar_pub_type as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#pub_id" data-id='{{ $k }}' data-type='pub_id'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='pub_id' value='{{ (isset($ar_input['pub_id']) ? $ar_input['pub_id'] : 0) }}' class='js_option_pub_id'>
                    </div>
                </div>
            @elseif ($cat->id == 23)
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Тип размещения'>{{ (isset($ar_input['karaoke_type']) && isset($ar_karaoke_type[$ar_input['karaoke_type']]) ? $ar_karaoke_type[$ar_input['karaoke_type']] : 'Тип размещения') }}</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите тип размещения:</div>
                        @foreach ($ar_karaoke_type as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#karaoke_type" data-id='{{ $k }}' data-type='karaoke_type'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='karaoke_type' value='{{ (isset($ar_input['karaoke_type']) ? $ar_input['karaoke_type'] : 0) }}' class='js_option_karaoke_type'>
                    </div>
                </div>
            @elseif ($cat->id == 28)
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Музыка'>{{ (isset($ar_input['music_type']) && isset($ar_music_type[$ar_input['music_type']]) ? $ar_music_type[$ar_input['music_type']] : 'Музыка') }}</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите музыку:</div>
                        @foreach ($ar_music_type as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#music_type" data-id='{{ $k }}' data-type='music_type'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='music_type' value='{{ (isset($ar_input['music_type']) ? $ar_input['music_type'] : 0) }}' class='js_option_music_type'>
                    </div>
                </div>
            @else
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Кухня'>{{ (isset($ar_input['kitchen']) && isset($ar_kitchen[$ar_input['kitchen']]) ? $ar_kitchen[$ar_input['kitchen']] : 'Кухня') }}</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите кухню:</div>
                        @foreach ($ar_kitchen as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#kitchen" data-id='{{ $k }}' data-type='kitchen'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='kitchen' value='{{ (isset($ar_input['kitchen']) ? $ar_input['kitchen'] : 0) }}' class='js_option_kitchen'>
                    </div>
                </div>
            @endif
            <div class="filtr-select">
                <span class='js_option_title' data-def='Средний счет'>{{ (isset($ar_input['avg_price']) && isset($ar_avg_price[$ar_input['avg_price']]) ? $ar_avg_price[$ar_input['avg_price']] : 'Средний счет') }}</span>
                <div class="filtr-option">
                    <div class="filtr-option__heading">Выберите средний счет:</div>
                    @foreach ($ar_avg_price as $k=>$v)
                        <a class="filtr-option__item js_option_select" href="#avg_price" data-id='{{ $k }}' data-type='avg_price'>{{ $v }}</a>
                    @endforeach
                    <input type='hidden' name='avg_price' value='{{ (isset($ar_input['avg_price']) ? $ar_input['avg_price'] : 0) }}' class='js_option_avg_price'>
                </div>
            </div>
            @if ($city_id == 1)
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Местоположение'>{{ (isset($ar_input['ciry_area']) && isset($ar_ciry_area[$ar_input['ciry_area']]) ? $ar_ciry_area[$ar_input['ciry_area']] : 'Местоположение') }}</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите местоположение:</div>
                        @foreach ($ar_ciry_area as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#ciry_area" data-id='{{ $k }}' data-type='avg_price'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='ciry_area' value='{{ (isset($ar_input['ciry_area']) ? $ar_input['ciry_area'] : 0) }}' class='js_option_avg_price'>
                    </div>
    			</div>
            @endif
        </div>
        <div class="select-area">
            <span class="select-area__heading">Особенности:</span>
            <ul class="select-inputs">
                @foreach ($ar_spec_option as $k=>$v)
                    <li>
                        <span class="checkbox {{ (isset($ar_input['spec_option']) && in_array($k, $ar_input['spec_option']) ? 'checkbox--active' : null) }}">
                            <input type="checkbox" value="{{ $k }}" name="spec_option[]" {{ (isset($ar_input['spec_option']) && in_array($k, $ar_input['spec_option']) ? 'checked' : null) }}>
                            {{ $v }}
                        </span>
                    </li>
                @endforeach
            </ul>
            <div class="fsearch">
                <button class="btn fsearch__input" type="submit">Искать по каталогу</button>
                <a class="fsearch__clear" href="?">Очистить параметры</a>
            </div>
        </div>
    </form>
</div>
