<div class="zaved-news">
    <div class="heading">
        <h4 class="heading__text">Новости</h4>
    </div>
    <ul class="news-ul">
        @foreach ($news as $n)
            <li class="news-ul__li">
                <span>Новости</span>
                <a href="#">{{ $n->title }}</a>
            </li>
        @endforeach
    </ul>
    <a class="news-link" href="#">Смотреть все новости</a>
</div>
