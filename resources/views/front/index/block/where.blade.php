<div class="top-up">
    <h4 class="top-up__heading">ПОДБОРКИ ЗАВЕДЕНИЙ</h4>
</div>
<ul class="w-slider">
    @foreach ($where_go as $g)
        <li class="w-slider__li">
            <a href="{{ action("Front\WhereGoController@getList", $g->id) }}" class="where-item {{ $g->sys_key }}">
                @if ($g->note)
                    <img src="{{ $g->note }}">
                @else
                    <img src="/front/img/where-dr.jpg">
                @endif
                <span class="where-item__icon "></span>
                <span class="where-item__text">
                    {{ $g->name }}
                </span>
                <span class="btn" href="#">Подробнее</span>
            </a>
        </li>
    @endforeach
</ul>
