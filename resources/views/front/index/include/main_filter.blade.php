<div class="filtr">
    <div class="filtr-up">
        Поиск заведений по параметрам
    </div>
    <div class="filtr-bot">
        <form action='{{ action("Front\CatalogController@getIndex", $cat_id) }}' method="get" data-action='{{ action("Front\CatalogController@getIndex", 0) }}'>
            <div class="filtr-select">
                <span class='js_option_title' data-def='Вид заведения'>{{ ($request->has('cat_id') ? $ar_object_type[$request->input('cat_id')] : 'Вид заведения') }}</span>
                <div class="filtr-option">
                    <div class="filtr-option__heading">Выберите вид заведения:</div>
                    @foreach ($ar_object_type as $k=>$v)
                        <a class="filtr-option__item js_option_select js_select_type" href="#cat_id" data-id='{{ $k }}' data-type='pub_id'>{{ $v }}</a>
                    @endforeach
                    <input type='hidden' name='cat_id' value='{{ $cat_id }}' class='js_option_pub_id'>
                </div>
            </div>
            <div class="filtr-select js_special_block">
                <span class='js_option_title js_special_title' data-def='Особенности'>Особенности</span>
                <div class="filtr-option">
                    <div class="filtr-option__heading">Выберите особенности:</div>
                    @foreach ($ar_object_type as $type_id=>$v)
                        @foreach ($spec_option[$type_id] as $k=>$v)
                            <a class="filtr-option__item js_option_select js_special_all js_special_{{ $type_id }}"
                                href="#spec_option" data-id='{{ $k }}' data-type='spec_option' style="{{ ($type_id == $cat_id ? '' : 'display:none') }}">{{ $v }}</a>
                        @endforeach
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
            <button class="btn filtr-search">Искать по каталогу</button>
        </form>
    </div>
</div>
