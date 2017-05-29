<a class="zaved-book__button btn fancybox fancybox.ajax" href="{{ action('Front\Object\ReserveController@getForm', $object->id) }}">Забронировать столик</a>
@if ($object->relLocation && $object->relLocation->lng && $object->relLocation->lat)
    <a class="zaved-book__map" href="{{ action('Front\Object\ShowController@getIndex', $object->alias) }}#map">Посмотреть на карте</a>
@endif
