<div class="top-zav">
    <span class="top-zav__heading">
        Ближайшие события в заведении
    </span>
</div>
@foreach ($events as $e)
    <a href="{{ action('Front\Object\EventController@getShow', array($object->alias, $e->id)) }}" class="event-part">       
            @if ($e->image)
               <img src="{{ $e->catalog_image }}" />
            @else
               <img src="/front/img/event.png" />
            @endif        
        <div class="event-part__inside"></div>
        <div class="event-text">
            <span class="event-text__date">
                {{ $e->date_str }}
            </span>
            <span class="event-text__heading">
                {{ $e->title }}
            </span>            
            <span class="btn" href="#">Подробнее</span>
        </div>
    </a>
@endforeach
