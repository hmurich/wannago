<div class="zaved-select">
    {{ $ar_object_type[$object->cat_id] }}
</div>
<ul class="nav-zaved">
    <li class="nav-zaved__li {{ ($active_menu == 'note' ? 'nav-zaved__li--active' : null) }}">
        <a href="#">Описание</a>
    </li>
    @if ($standart_data->menu_file)
        <li class="nav-zaved__li {{ ($active_menu == 'menu' ? 'nav-zaved__li--active' : null) }}">
            <a href="#">Меню</a>
        </li>
    @endif
    @if ($object->relGelerea()->count())
        <li class="nav-zaved__li {{ ($active_menu == 'galerea' ? 'nav-zaved__li--active' : null) }}">
            <a href="#">Фотогалерея</a>
        </li>
    @endif
    @if ($object->relEvent()->count())
        <li class="nav-zaved__li {{ ($active_menu == 'event' ? 'nav-zaved__li--active' : null) }}">
            <a href="#">События</a>
        </li>
    @endif
    @if ($object->relNews()->count())
        <li class="nav-zaved__li {{ ($active_menu == 'news' ? 'nav-zaved__li--active' : null) }}">
            <a href="#">Новости</a>
        </li>
    @endif
    @if ($object->relComment()->count())
        <li class="nav-zaved__li {{ ($active_menu == 'comment' ? 'nav-zaved__li--active' : null) }}">
            <a href="#">Отзывы</a>
        </li>
    @endif
</ul>
