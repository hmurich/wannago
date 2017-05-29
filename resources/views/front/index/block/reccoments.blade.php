<div class="top-up">
    <h4 class="top-up__heading">Рекомендации</h4>
</div>
<ul class="new-ul">
    @foreach ($recomended as $r)
        <li>
            <a href="{{ action('Front\Object\ShowController@getIndex', $r->alias) }}" class="new-zaved">
                <div class="new-zaved__img">
                    @if ($r->relSlider()->first())
                        <img src="{{ $r->relSlider()->first()->image }}">
                    @else
                        <img src="/front/img/zaved.jpg">
                    @endif
                </div>
                <div class="t-zaved">
                    <span class="t-zaved__type">
                        {{ $ar_object_type[$r->cat_id] }}
                    </span>
                    <span class="t-zaved__heading" href="#">
                        {{ $r->name }}
                    </span>
                    <span class="btn btn--second" href="#">Подробнее</span>
                </div>
            </a>
        </li>
    @endforeach

</ul>
