<div class="cont-zaved__map">
    <div id='map' data-lng='{{ $object->relLocation->lng }}' data-lat='{{ $object->relLocation->lat }}' style="width: 100%; height: 150px;"></div>
</div>
<div class="cont-info">
    <span class="cont-info__row">
        {{ $standart_data->address }}
    </span>
    <span class="cont-info__row">
        {{ $standart_data->work_time }}
    </span>
    <span class="cont-info__row">
        {{ $standart_data->phone }}
    </span>
</div>
<div class="cont-bot">
    <a class="btn fancybox fancybox.ajax" href="{{ action('Front\Object\ReserveController@getForm', $object->id) }}">Забронировать</a>
</div>
