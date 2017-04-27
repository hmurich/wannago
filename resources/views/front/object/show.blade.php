@extends('front.layout')
@section('title', $title)

@section('content')
<main>
	<div class="inner">
		<ul class="breadcrumbs">
			<li><a href="#">Главная</a></li>
			<li><a href="#">Пабы,Бары</a></li>
			<li><span>Chechil Pub</span></li>
		</ul>
		<div class="zaved-part">
			<div class="zaved-up">
				<div class="zaved-up__logo">
					<img src="img/zaved-logo.png">
				</div>
				<div class="zaved-up__info">
					<div class="upzaved-text">
						<h1 class="upzaved-text__heading">
							Chechil pub
						</h1>
						<ul class="upzaved-ul">
							<li class="upzaved-ul__li upzaved-ul__li--adress">г. Астана, ул. Абая 67/2</li>
							<li class="upzaved-ul__li upzaved-ul__li--number">+7 (7172) 40 39 16</li>
							<li class="upzaved-ul__li upzaved-ul__li--click">19:00 - 21:00</li>
						</ul>
						<div class="zaved-book">
							<a class="zaved-book__button btn" href="#">Забронировать столик</a>
							<a class="zaved-book__map">Посмотреть на карте</a>
						</div>
					</div>
					<div class="zaved-rating">
						<div class="stars 5-star"></div>
						<div class="zaved-rating__ocenka">
							<span>Рейтинг: 4</span>
						</div>
						<div class="zaved-rating__numbers">
							<span>27 оценок</span>
						</div>
						<div class="zaved-rating__otzyv">
							<span>33 отзыва</span>
						</div>
					</div>
				</div>
			</div>
			<div class="zaved-menu">
				<div class="zaved-select">
					Пабы,бары
				</div>
				<ul class="nav-zaved">
					<li class="nav-zaved__li nav-zaved__li--active">
						<a href="#">Описание</a>
					</li>
					<li class="nav-zaved__li">
						<a href="#">Меню</a>
					</li>
					<li class="nav-zaved__li">
						<a href="#">Фотогалерея</a>
					</li>
					<li class="nav-zaved__li">
						<a href="#">События</a>
					</li>
					<li class="nav-zaved__li">
						<a href="#">Новости</a>
					</li>
					<li class="nav-zaved__li">
						<a href="#">Отзывы</a>
					</li>
				</ul>
			</div>
			<div class="big-slider">
				<div>
					<img alt="" src="img/bigFoto.jpg">
				</div>
				<div>
					<img alt="" src="img/bigFoto.jpg">
				</div>
				<div>
					<img alt="" src="img/bigFoto.jpg">
				</div>
				<div>
					<img alt="" src="img/bigFoto.jpg">
				</div>
				<div>
					<img alt="" src="img/bigFoto.jpg">
				</div>
				<div>
					<img alt="" src="img/bigFoto.jpg">
				</div>
			</div>
			<div class="mini-slider">
				<div>
					<img src="img/foto1.png">
				</div>
				<div>
					<img src="img/foto2.png">
				</div>
				<div>
					<img src="img/foto3.png">
				</div>
				<div>
					<img src="img/foto4.png">
				</div>
				<div>
					<img src="img/foto5.png">
				</div>
				<div>
					<img src="img/foto6.png">
				</div>
			</div>
			<ul class="zaved-rows">
				<li>
					<div class="character">
						<span class="character__heading">Кухня</span>
						<p class="character__text">Авторская, Итальянская, Средиземноморская</p>
					</div>
				</li>
				<li>
					<div class="character">
						<span class="character__heading">Предложения</span>
						<p class="character__text">Авторская, Итальянская, Средиземноморская</p>
					</div>
				</li>
				<li>
					<div class="character">
						<span class="character__heading">Кол-во залов</span>
						<p class="character__text">Авторская, Итальянская, Средиземноморская</p>
					</div>
				</li>
				<li>
					<div class="character">
						<span class="character__heading">Средний чек</span>
						<p class="character__text">Авторская, Итальянская, Средиземноморская</p>
					</div>
				</li>
				<li>
					<div class="character">
						<span class="character__heading">Оплата картой</span>
						<p class="character__text">Авторская, Итальянская, Средиземноморская</p>
					</div>
				</li>
				<li>
					<div class="character">
						<span class="character__heading">Предложения</span>
						<p class="character__text">Авторская, Итальянская, Средиземноморская</p>
					</div>
				</li>
				<li>
					<div class="character">
						<span class="character__heading">Кухня</span>
						<p class="character__text">Авторская, Итальянская, Средиземноморская</p>
					</div>
				</li>
				<li>
					<div class="character">
						<span class="character__heading">Кухня</span>
						<p class="character__text">Авторская, Итальянская, Средиземноморская</p>
					</div>
				</li>
			</ul>
			<div class="zav-events">
				<div class="zav-up">
					<h3 class="zav-up__heading">Ближайшие события в <span>chechil pub</span></h3>
					<a class="link" href="#">Все события</a>
				</div>
				<ul class="event-list">
					<li>
						 <a href="#" class="mini-event">
								<div class="mini-event__img">
									<img src="img/event.png">
								</div>
								<span class="mini-event__heading">
									Музыкальные вечер: Nоthing but the best!
								</span>
								<div class="event-date">
									<span class="event-date__time">21:30</span>
									<span class="event-date__text">12 Апреля</span>
								</div>
							</a>
					</li>
					<li>
						 <a href="#" class="mini-event">
								<div class="mini-event__img">
									<img src="img/event2.png">
								</div>
								<span class="mini-event__heading">
									Музыкальные вечер: Nоthing but the best!
								</span>
								<div class="event-date">
									<span class="event-date__time">21:30</span>
									<span class="event-date__text">12 Апреля</span>
								</div>
							</a>
					</li>
					<li>
						 <a href="#" class="mini-event">
								<div class="mini-event__img">
									<img src="img/event3.png">
								</div>
								<span class="mini-event__heading">
									Музыкальные вечер: Nоthing but the best!
								</span>
								<div class="event-date">
									<span class="event-date__time">21:30</span>
									<span class="event-date__text">12 Апреля</span>
								</div>
							</a>
					</li>
					<li>
						 <a href="#" class="mini-event">
								<div class="mini-event__img">
									<img src="img/event4.png">
								</div>
								<span class="mini-event__heading">
									Музыкальные вечер: Nоthing but the best!
								</span>
								<div class="event-date">
									<span class="event-date__time">21:30</span>
									<span class="event-date__text">12 Апреля</span>
								</div>
							</a>
					</li>
				</ul>
			</div>
			<div class="zav-des">
				<div class="zav-up">
					<h3 class="zav-up__heading">Chechil pub <span>по абая</span></h3>
				</div>
				<p>Добро пожаловать в Чечил паб, дорогие друзья! Здесь каждый ценитель может выбрать пиво по вкусу! А также специально для Вас пицца, горячие блюда и многое другое – всё, что душе угодно сегодня доступно всего за полцены! Стандартная защита покупателей
				Добро пожаловать в Чечил паб, дорогие друзья! Здесь каждый ценитель может выбрать пиво по вкусу! А также специально для Вас пицца, горячие блюда и многое другое – всё, что душе угодно сегодня доступно всего за полцены!</p>
			</div>
			<div class="zav-map">
				<div class="zav-up">
					<h3 class="zav-up__heading">Найти нас <span>на карте</span></h3>
				</div>
				<div class="map">
					<script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/	js/?um=constructor%3Af4afd07c5147822fa0e66a89c9820495f032220438c6863be4226f4417367372&amp;lang=ru_RU&amp;scroll=false"></script>
				</div>
			</div>
		</div>
		<div class="reccoments">
			<div class="top-up">
					<div class="heading">
						<span class="heading__mini">Рейтинговые заведения</span>
						<h4 class="heading__text">Рекомендации</h4>
					</div>
			</div>
			<ul class="new-ul">
				<li>
					<a href="#" class="new-zaved">
						<div class="new-zaved__img">
							<img src="img/zaved.jpg">
						</div>
						<div class="t-zaved">
							<span class="t-zaved__type">
								Ночной клуб
							</span>
							<span class="t-zaved__heading" href="#">
								Salco-Club
							</span>
							<div class="stars 5-star"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="new-zaved">
						<div class="new-zaved__img">
							<img src="img/zaved2.jpg">
						</div>
						<div class="t-zaved">
							<span class="t-zaved__type">
								Ночной клуб
							</span>
							<span class="t-zaved__heading" href="#">
								Salco-Club
							</span>
							<div class="stars 5-star"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="new-zaved">
						<div class="new-zaved__img">
							<img src="img/zaved.jpg">
						</div>
						<div class="t-zaved">
							<span class="t-zaved__type">
								Ночной клуб
							</span>
							<span class="t-zaved__heading" href="#">
								Salco-Club
							</span>
							<div class="stars 5-star"></div>
						</div>
					</a>
				</li>
				<li>
					<a href="#" class="new-zaved">
						<div class="new-zaved__img">
							<img src="img/zaved2.jpg">
						</div>
						<div class="t-zaved">
							<span class="t-zaved__type">
								Ночной клуб
							</span>
							<span class="t-zaved__heading" href="#">
								Salco-Club
							</span>
							<div class="stars 5-star"></div>
						</div>
					</a>
				</li>
			</ul>
		</div>
	</div>
</main>

@endsection
