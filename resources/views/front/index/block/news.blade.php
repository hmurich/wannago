<div class="top-up">
	<h4 class="top-up__heading">Акции и Скидки</h4>
</div>

<ul class="new-ul">
    @foreach ($news as $n)
        <li>
            <a href="{{ action('Front\Object\NewsController@getShow', array($n->relObject->alias, $n->id)) }}" class="new-zaved">
                <div class="new-zaved__img">
                    @if ($n->image)
                        <img src="{{ $n->image }}"/>
                    @else
                        <img src="/front/img/zaved.jpg"/>
                    @endif
                </div>
                <div class="t-zaved">
                    <span class="t-zaved__type">
                        {{ $n->date_str }}
                    </span>
                    <span class="t-zaved__heading">
                        {{ $n->title }}
                    </span>
                    <span class="btn btn--second" href="#">Подробнее</span>
                </div>
            </a>
        </li>
    @endforeach
</ul>
