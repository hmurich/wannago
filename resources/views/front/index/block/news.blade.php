<div class="zaved-news">
    <div class="top-up">
        <h4 class="top-up__heading">Новости</h4>
    </div>
    <ul class="news-ul">
        @foreach ($news as $n)
            <li class="news-ul__li">
                <span>Новости</span>
                <a href="{{ action('Front\Object\NewsController@getShow', array($n->relObject->alias, $n->id)) }}">{{ $n->title }}</a>
            </li>
        @endforeach
    </ul>
    <a class="news-link" href="{{ action('Front\NewsController@getIndex') }}">Смотреть все новости</a>
</div>
