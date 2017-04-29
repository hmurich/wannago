<div class="inner">
    <form method="get" action="{{ action('Front\CatalogController@getIndex', $cat->id) }}">
        <span class="under-search__heading">Выберите параметры:</span>
        <div class="unfilter">
            <div class="filtr-select">
                Тип заведения
                <div class="filtr-option">
                    <div class="filtr-option__heading">Выберите тип заведения:</div>
                    <a class="filtr-option__item" href="#">Паб</a>
                    <a class="filtr-option__item" href="#">Бар</a>
                    <a class="filtr-option__item" href="#">Лаундж бар</a>
                    <a class="filtr-option__item" href="#">Спорт бар</a>
                    <a class="filtr-option__item" href="#">Суши бар</a>
                </div>
            </div>
            <div class="filtr-select">
                Кухня
                <div class="filtr-option">
                    <div class="filtr-option__heading">Выберите особенности:</div>
                    <a class="filtr-option__item" href="#">Отдельный кабинет</a>
                    <a class="filtr-option__item" href="#">У воды</a>
                    <a class="filtr-option__item" href="#">Камин </a>
                    <a class="filtr-option__item" href="#">Круглосуточно</a>
                    <a class="filtr-option__item filtr-option__item--full" href="#">Бесплатная парковка</a>
                </div>
            </div>
            <div class="filtr-select">
                Средний счет
                <div class="filtr-option">
                    <div class="filtr-option__heading">Выберите средний счет:</div>
                    @foreach ($ar_avg_price as $k=>$v)
                        <a class="filtr-option__item" href="#avg_price" data-id='{{ $k }}' data-type='avg_price'>{{ $v }}</a>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="select-area">
            <span class="select-area__heading">Особенности:</span>
            <ul class="select-inputs">
                @foreach ($ar_spec_option as $k=>$v)
                    <li>
                        <span class="checkbox">
                            <input type="checkbox" value="{{ $k }}" name="spec_option[]">
                            {{ $v }}
                        </span>
                    </li>
                @endforeach
            </ul>
            <div class="fsearch">
                <button class="fsearch__input" type="submit">Искать по каталогу</button>
                <a class="fsearch__clear" href="?">Очистить параметры</a>
            </div>
        </div>
    </form>
</div>
