<div class="top-zav">
    <span class="top-zav__heading">
        Акции заведения
    </span>
</div>
@foreach ($news as $n)
    <a href="{{ action('Front\Object\NewsController@getShow', array($object->alias, $n->id)) }}" class="new-zaved">
        <div class="new-zaved__img">
            @if ($n->image)
                <img alt="{{ $n->title }}" src="{{ $n->image }}">
            @else
                <img alt="{{ $n->title }}" src="/front/img/news-zaved.jpg">
            @endif
        </div>
        <div class="t-zaved">
            <span class="t-zaved__type">
                {{ $n->created_at }}
            </span>            
            <span class="t-zaved__heading">
                {{ $n->title }}
            </span>

            <span class="btn btn--second" href="#">Подробнее</span>
        </div>
    </a>
@endforeach
