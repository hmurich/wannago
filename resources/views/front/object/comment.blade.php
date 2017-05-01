@extends('front.layout')
@section('title', $title)

@section('content')
<main>
	<div class="inner">
		<ul class="breadcrumbs">
            @include('front.object.include.breadcrumbs')
		</ul>
		<div class="zaved-part">
			<div class="zaved-up">
                @include('front.object.include.zaved_up')
			</div>
			<div class="zaved-menu">
                @include('front.object.include.zaved_menu')
			</div>
            <div class="otzyv-part">
				<div class="zav-up">
					<h3 class="zav-up__heading">Отзывы <span>{{ $object->name }}</span></h3>
				</div>
				<ul class="otzyv-ul">
                    @foreach ($items as $i)
    					<li>
    						<div class="otzyv-left">
    							<span class="otzyv-left__login">
    								{{ $i->title }}
    							</span>
    							<span class="otzyv-left__date">
    								{{ $i->date_str }}
    							</span>
    						</div>
    						<div class="otzyv-right">
    							<p>{!! $i->note !!}</p>
    						</div>
    					</li>
                    @endforeach
                </ul>
				{!! $items->render() !!}
				<div class="add-comment">
                    @if (Auth::check())
                        <form action="{{ action('Front\Object\CommentController@postSave', $object->alias) }}" method="post">
        					<span class="add-comment__heading">Ваш комментарий</span>
        					<input class="add-comment__input" name='title' placeholder="Представьтесь пожалуйста..." type="text" required="">
        					<textarea class="add-comment__textarea" name='note' placeholder="Текст отзыва..." required=""></textarea>
        					<button class="btn add-comment__btn" type="submit">Отправить сообщение</button>
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        </form>
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
				</div>
			</div>
        </div>
		<div class="reccoments">
			@include('front.object.include.simular_object')
		</div>
	</div>
</main>

@endsection
