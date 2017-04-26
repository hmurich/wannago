<div class="top-up">
        <div class="heading">
            <span class="heading__mini">Календарь ближайших событий</span>
            <h4 class="heading__text">Куда сходить?</h4>
        </div>
        <a class="link" href="#">Смотреть все подборки</a>
</div>
<div class="w-slider">
    @foreach ($where_go as $g)
        <div class="where-mini">
            <div class="where-mini__img w-dr {{ $g->sys_key }}"></div>
            <span class="w-slider__heading">
                {{ $g->name }}
            </span>
        </div>
    @endforeach
</div>
