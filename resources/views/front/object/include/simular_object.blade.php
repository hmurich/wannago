<div class="top-up">
    <h4 class="top-up__heading">Схожие заведения</h4>
</div>
<ul class="new-ul">
    @foreach ($simular_object as $r)
        <li>
            <a href="{{ action('Front\Object\ShowController@getIndex', $r->alias) }}" class="new-zaved">
                <div class="new-zaved__img">
                    @if ($r->relSlider()->first())
                        <img src="{{ $r->relSlider()->first()->small_image }}" style="width: 100%;">
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
