@if (Auth::check())
    <div class="add-comment">
        <form action="{{ action('Front\Object\CommentController@postSave', $object->alias) }}" method="post">
            <span class="add-comment__heading">Ваш комментарий</span>
            <input class="add-comment__input" name='title' placeholder="Представьтесь пожалуйста..." type="text" required="">
            <textarea class="add-comment__textarea" name='note' placeholder="Текст отзыва..." required=""></textarea>
            <button class="btn add-comment__btn" type="submit">Отправить сообщение</button>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">
        </form>
    </div>
@else
    <script src="//ulogin.ru/js/ulogin.js"></script>
    <script src="//ulogin.ru/js/ulogin.js"></script>
    <?php
        $uri = $_SERVER['REQUEST_URI'];
        $uri = str_replace("/", "%2F", $uri);
    ?>
    <script src="//ulogin.ru/js/ulogin.js"></script>
    Авторизуйтель для отзыва
    <div id="uLogin"
        data-ulogin="display=small;theme=classic;fields=first_name,last_name;providers=vkontakte,odnoklassniki,mailru,facebook;hidden=other;redirect_uri=http%3A%2F%2F{{ $_SERVER['HTTP_HOST'].$uri }};mobilebuttons=0;">
    </div>
@endif

<ul class="otzyv-ul">
    @foreach ($comments as $c)
        <li>
            <div class="otzyv-left">
                <span class="otzyv-left__login">
                    {{ $c->title }}
                </span>
                <span class="otzyv-left__date">
                    {{ $c->date_str }}
                </span>
            </div>
            <div class="otzyv-right">
                <p>{!! $c->note !!}</p>
            </div>
        </li>
    @endforeach
</ul>
