<div class="zaved-up__logo">
    @if ($standart_data->logo)
        <img alt="{{ $object->name }}" src="{{ $standart_data->logo }}">
    @else
        <img alt="{{ $object->name }}" src="/front/img/zaved-logo.png">
    @endif
</div>
<div class="zaved-up__info">
    <div class="upzaved-text">
        <h1 class="upzaved-text__heading">
            {{ $object->name }}
        </h1>
        <ul class="upzaved-ul">
            <li class="upzaved-ul__li upzaved-ul__li--adress">г. {{ $ar_city[$object->city_id] }}, {{ $standart_data->address }}</li>
            <li class="upzaved-ul__li upzaved-ul__li--number">{{ $standart_data->phone }}</li>
            <li class="upzaved-ul__li upzaved-ul__li--click">{{ $standart_data->work_time }}</li>
        </ul>
        <div class="zaved-book">
            <a class="zaved-book__button btn" href="#">Забронировать столик</a>
            <a class="zaved-book__map" href="#map">Посмотреть на карте</a>
        </div>
    </div>
    <div class="zaved-rating">
        <div class="stars {{ $object->raiting_full_round }}-star"></div>
        <div class="zaved-rating__ocenka">
            <span>Рейтинг: {{ $object->raiting_view }}</span>
        </div>
        <div class="zaved-rating__numbers">
            <span>{{ $object->relScore()->count() }} оценок</span>
        </div>
        <div class="zaved-rating__otzyv">
            <span>{{ $object->relComment()->count() }} отзыва</span>
        </div>
    </div>
</div>
