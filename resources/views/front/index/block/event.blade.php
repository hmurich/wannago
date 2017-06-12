<div class="top-up">
    <h4 class="top-up__heading">Ближайшие события</h4>
    <div class="arrows">
		<span class="arrows__item"><-</span>
		<span class="arrows__item">-></span>
	</div>
</div>

<div class="event-c">
    @foreach ($events as $e)
        <div>
            <a href="{{ action('Front\Object\EventController@getShow', array($e->relObject->alias, $e->id)) }}" class="event-part">
                    @if ($e->catalog_image)
                        <img src="{{ $e->catalog_image }}"  />
                    @else
                        <img src="/front/img/event.jpg" />
                    @endif
                <div class="event-part__inside"></div>
            
                    <div class="event-text">
                        <span class="event-text__date">
                            {{ $e->date_str }}
                        </span>
                        <span class="event-text__heading">
                            {{ $e->title }}
                        </span>
                        <span class="btn">Подробнее</span>
                    </div>
            </a>
        </div>
    @endforeach
</div>
