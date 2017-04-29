<div id="tabs" class="filtr__inner">
    <div class="filtr-up">
        <ul class="filtr-ul">
            <li class="active">
                <a href="#pab">Пабы,бары</a>
            </li>
            <li>
                <a href="#karaoke">Караоке</a>
            </li>
            <li>
                <a href="#kofeiny">Кофейни</a>
            </li>
            <li>
                <a href="#kafe">Кафе</a>
            </li>
            <li>
                <a href="#restoran">Рестораны</a>
            </li>
        </ul>
        <div class="others">
            <span>Другие</span>
            <div class="others-zaved">
                <a href='#asd' rel="{{ action("Front\CatalogController@getIndex", 28) }}">Ночные клубы</a>
                <a href='#asd' rel="{{ action("Front\CatalogController@getIndex", 27) }}">Банкетные залы</a>
                <a href='#asd' rel="{{ action("Front\CatalogController@getIndex", 29) }}">Летние площадки</a>
            </div>
        </div>
        <div class="filtr-right">
            <input type="search" placeholder="название заведения">
        </div>
    </div>
    <div class="filtr-area">
        <div id="pab" class="filtr-part">
            <form action='{{ action("Front\CatalogController@getIndex", 9) }}' method="get">
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Тип заведения'>Тип заведения</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите тип заведения:</div>
                        @foreach ($ar_pub_type as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#pub_id" data-id='{{ $k }}' data-type='pub_id'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='pub_id' value='0' class='js_option_pub_id'>
                    </div>
                </div>
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Особенности'>Особенности</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите особенности:</div>
                        @foreach ($spec_option[9] as $k=>$v)
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
                <button class="filtr-search">Искать по каталогу</button>
            </form>
        </div>
        <div id="karaoke" class="filtr-part">
            <form action='{{ action("Front\CatalogController@getIndex", 23) }}' method="get">
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Тип размещения'>Тип размещения</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите тип размещения:</div>
                        @foreach ($ar_karaoke_type as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#karaoke_type" data-id='{{ $k }}' data-type='karaoke_type'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='karaoke_type' value='0' class='js_option_karaoke_type'>
                    </div>
                </div>
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Особенности'>Особенности</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите особенности:</div>
                        @foreach ($spec_option[23] as $k=>$v)
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
                <button class="filtr-search">Искать по каталогу</button>
            </form>
        </div>
        <div id="kofeiny" class="filtr-part">
            <form action='{{ action("Front\CatalogController@getIndex", 24) }}' method="get">
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Кухня'>Кухня</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите кухню:</div>
                        @foreach ($ar_kitchen as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#kitchen" data-id='{{ $k }}' data-type='kitchen'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='kitchen' value='0' class='js_option_kitchen'>
                    </div>
                </div>
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Особенности'>Особенности</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите особенности:</div>
                        @foreach ($spec_option[23] as $k=>$v)
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
                <button class="filtr-search">Искать по каталогу</button>
            </form>
        </div>
        <div id="kafe" class="filtr-part">
            <form action='{{ action("Front\CatalogController@getIndex", 25) }}' method="get">
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Кухня'>Кухня</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите кухню:</div>
                        @foreach ($ar_kitchen as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#kitchen" data-id='{{ $k }}' data-type='kitchen'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='kitchen' value='0' class='js_option_kitchen'>
                    </div>
                </div>
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Особенности'>Особенности</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите особенности:</div>
                        @foreach ($spec_option[23] as $k=>$v)
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
                <button class="filtr-search">Искать по каталогу</button>
            </form>
        </div>
        <div id="restoran" class="filtr-part">
            <form action='{{ action("Front\CatalogController@getIndex", 26) }}' method="get">
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Кухня'>Кухня</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите кухню:</div>
                        @foreach ($ar_kitchen as $k=>$v)
                            <a class="filtr-option__item js_option_select" href="#kitchen" data-id='{{ $k }}' data-type='kitchen'>{{ $v }}</a>
                        @endforeach
                        <input type='hidden' name='kitchen' value='0' class='js_option_kitchen'>
                    </div>
                </div>
                <div class="filtr-select">
                    <span class='js_option_title' data-def='Особенности'>Особенности</span>
                    <div class="filtr-option">
                        <div class="filtr-option__heading">Выберите особенности:</div>
                        @foreach ($spec_option[23] as $k=>$v)
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
                <button class="filtr-search">Искать по каталогу</button>
            </form>
        </div>
    </div>
<!-- 				<div class="more-filtr">
    <span class="more-filtr__heading">
        Расширинный поиск
    </span>
</div> -->
</div>
