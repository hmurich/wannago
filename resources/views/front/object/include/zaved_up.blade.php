<div class="zaved-up__logo">
    @if ($standart_data->logo)
        <img alt="{{ $object->name }}" src="{{ $standart_data->logo }}" style="width: 100%;">
    @else
        <img alt="{{ $object->name }}" src="/front/img/zaved-logo.png">
    @endif
</div>
<div class="zaved-up__info">
    <div class="zaved-rating">
        <div class="stars {{ $object->raiting_full_round }}-star"></div>
        <div class="zaved-rating__ocenka">
            <span>Рейтинг: {{ $object->raiting_view }}</span>
        </div>
    </div>

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
            <a class="zaved-book__button btn fancybox fancybox.ajax" href="{{ action('Front\Object\ReserveController@getForm', $object->id) }}">Забронировать столик</a>
            @if ($object->relLocation && $object->relLocation->lng && $object->relLocation->lat)
                <a class="zaved-book__map" href="{{ action('Front\Object\ShowController@getIndex', $object->alias) }}#map">Посмотреть на карте</a>
            @endif
        </div>
    </div>

</div>
