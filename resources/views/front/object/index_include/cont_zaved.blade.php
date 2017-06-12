<div class="cont-zaved__map">
    <div id='map' data-lng='{{ $object->relLocation->lng }}' data-lat='{{ $object->relLocation->lat }}' style="width: 100%; height: 170px;"></div>
</div>
<div class="cont-info">
    <span class="cont-info__row cont-info__row--adress">
        {{ $standart_data->address }}
    </span>
    <span class="cont-info__row cont-info__row--clock">
        {{ $standart_data->work_time }}
    </span>
    <span class="cont-info__row cont-info__row--phone">
        {{ $standart_data->phone }}
    </span>
</div>
<div class="cont-bot">
    <a class="btn fancybox fancybox.ajax" href="{{ action('Front\Object\ReserveController@getForm', $object->id) }}">Забронировать столик</a>
</div>
