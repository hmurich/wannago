<div class="top-up">
        <div class="heading">
            <span class="heading__mini">Рейтинговые заведения</span>
            <h4 class="heading__text">Рекомендации</h4>
        </div>
</div>
<ul class="new-ul">
    @foreach ($recomended as $r)
        <li>
            <a href="{{ action('Front\Object\ShowController@getIndex', $r->alias) }}" class="new-zaved">
                <div class="new-zaved__img">
                    @if ($r->relSlider()->first())
                        <img src="{{ $r->relSlider()->first()->image }}">
                    @else
                        <img src="/front/img/zaved2.jpg">
                    @endif
                </div>
                <div class="t-zaved">
                    <span class="t-zaved__type">
                        {{ $ar_object_type[$r->cat_id] }}
                    </span>
                    <span class="t-zaved__heading" href="#">
                        {{ $r->name }}
                    </span>
                    <div class="stars {{ $r->raiting_full_round }}-star"></div>
                </div>
            </a>
        </li>
    @endforeach

</ul>