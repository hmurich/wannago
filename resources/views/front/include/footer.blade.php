<div class="inner">
    <div class="f-row">
        <span class="f-row__heading">Портал</span>
        <div class="f-ul">
            <a href="/company/">Вход в личный кабинет</a>
            <a href='#adding' class='fancybox'>Добавить заведение</a>
            <a>Лицензионное соглашение</a>
        </div>
    </div>
    <div class="f-row f-row--second">
        <span class="f-row__heading">Категории</span>
        <div class="f-ul f-ul--second">
            <a href='{{ action("Front\CatalogController@getIndex", 9) }}'>Пабы и бары</a>
            <a href='{{ action("Front\CatalogController@getIndex", 23) }}'>Караоке</a>
            <a href='{{ action("Front\CatalogController@getIndex", 25) }}'>Кафе</a>
            <a href='{{ action("Front\CatalogController@getIndex", 24) }}'>Кофейени</a>
            <a href='{{ action("Front\CatalogController@getIndex", 26) }}'>Рестораны</a>
            <a href='{{ action("Front\CatalogController@getIndex", 28) }}'>Ночные клубы</a>
            <a href='{{ action("Front\CatalogController@getIndex", 27) }}'>Банкетные залы</a>
            <a href='{{ action("Front\CatalogController@getIndex", 29) }}'>Летние площадки</a>
        </div>
    </div>
    <div class="f-row">
        <span class="f-row__heading">Публикации</span>
        <div class="f-ul">
            <a href='{{ action('Front\EventController@getIndex') }}'>События</a>
            <a href='{{ action('Front\WhereGoController@getIndex') }}'>Куда сходить?</a>
            <a href='{{ action('Front\NewsController@getIndex') }}'>Новости</a>
        </div>
    </div>
    <div class="footer-right">
        <span class="footer-right__text">WannaGo.kz | 2017</span>
        <a class="created" href="http://astanacreative.kz" target="_blank">Разработано в <span>Astanacreative.kz</span></a>
    </div>
</div>
