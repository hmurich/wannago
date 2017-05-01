<div class="zaved-select">
    {{ $ar_object_type[$object->cat_id] }}
</div>
<ul class="nav-zaved">
    <li class="nav-zaved__li {{ ($active_menu == 'note' ? 'nav-zaved__li--active' : null) }}">
        <a href="{{ action('Front\Object\ShowController@getIndex', $object->alias) }}">Описание</a>
    </li>
    @if ($object->relMenu()->count())
        <li class="nav-zaved__li {{ ($active_menu == 'menu' ? 'nav-zaved__li--active' : null) }}">
            <a href="{{ action('Front\Object\MenuController@getIndex', $object->alias) }}">Меню</a>
        </li>
    @endif
    @if ($object->relGelerea()->count())
        <li class="nav-zaved__li {{ ($active_menu == 'galerea' ? 'nav-zaved__li--active' : null) }}">
            <a href="{{ action('Front\Object\GalereaController@getIndex', $object->alias) }}">Фотогалерея</a>
        </li>
    @endif
    @if ($object->relEvent()->count())
        <li class="nav-zaved__li {{ ($active_menu == 'event' ? 'nav-zaved__li--active' : null) }}">
            <a href="{{ action('Front\Object\EventController@getList', $object->alias) }}">События</a>
        </li>
    @endif
    @if ($object->relNews()->count())
        <li class="nav-zaved__li {{ ($active_menu == 'news' ? 'nav-zaved__li--active' : null) }}">
            <a href="{{ action('Front\Object\NewsController@getList', $object->alias) }}">Новости</a>
        </li>
    @endif
    <li class="nav-zaved__li {{ ($active_menu == 'comment' ? 'nav-zaved__li--active' : null) }}">
        <a href="{{ action('Front\Object\CommentController@getList', $object->alias) }}">Отзывы</a>
    </li>
</ul>
