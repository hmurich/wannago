<div class="inner">
    <a class="logo" href='#'>
        TopList.kz
    </a>
    <ul class="zaved-nav">
        <li class="zaved-nav__li zaved-nav__li--active">
            <a href="{{ action("Front\CatalogController@getIndex", 9) }}">
                Пабы,бары
            </a>
        </li>
        <li class="zaved-nav__li">
            <a href="{{ action("Front\CatalogController@getIndex", 23) }}">
                Караоке
            </a>
        </li>
        <li class="zaved-nav__li">
            <a href="{{ action("Front\CatalogController@getIndex", 24) }}">
                Кофейни
            </a>
        </li>
        <li class="zaved-nav__li">
            <a href="{{ action("Front\CatalogController@getIndex", 26) }}">
                Рестораны
            </a>
        </li>
        <li class="zaved-nav__li">
            <a href="{{ action("Front\CatalogController@getIndex", 25) }}">
                Кафе
            </a>
        </li>
        <li class="zaved-nav__li">
            <a href="#">
                Другие
            </a>
        </li>
    </ul>
    <div class="right-search">
        <input class="right-search__input" type="search" placeholder="название заведения">
        <input class="right-search__submit" type="submit">
    </div>
</div>
