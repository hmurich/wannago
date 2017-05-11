<div class="top-up">
        <h4 class="top-up__heading">Куда сходить?</h4>
        <a class="link" href="{{ action('Front\WhereGoController@getIndex') }}">Смотреть все подборки</a>
</div>
<div class="w-slider">
    @foreach ($where_go as $g)
        <div class="where-mini">
            <a href='{{ action("Front\WhereGoController@getList", $g->id) }}'>
                <div class="where-mini__img w-dr"></div>
                <span class="w-slider__heading">
                    {{ $g->name }}
                </span>
            </a>
        </div>
    @endforeach
</div>
