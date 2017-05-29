<div class="top-zav">
    <span class="top-zav__heading">
        Ближайшие события в заведении
    </span>
</div>
@foreach ($events as $e)
    <a href="{{ action('Front\Object\EventController@getShow', array($object->alias, $e->id)) }}" class="new-zaved">
        <div class="new-zaved__img">
            @if ($e->image)
               <img src="{{ $e->image }}" style="max-width: 112px;" />
            @else
               <img src="/front/img/event.png" />
            @endif
        </div>
        <div class="t-zaved event-part">
            <span class="event-part__heading">
                {{ $e->title }}
            </span>
            <span class="event-part__date">
                {{ $e->date_str }}
            </span>
            <span class="btn btn--second" href="#">Подробнее</span>
        </div>
    </a>
@endforeach
