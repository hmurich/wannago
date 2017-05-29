<div class="top-up">
    <h4 class="top-up__heading">Ближайшие события</h4>
    <div class="arrows">
		<span class="arrows__item"><-</span>
		<span class="arrows__item">-></span>
	</div>
</div>

<ul class="new-ul">
    @foreach ($events as $e)
        <li>
            <a href="{{ action('Front\Object\EventController@getShow', array($e->relObject->alias, $e->id)) }}" class="new-zaved">
                <div class="new-zaved__img">
                    @if ($e->image)
                        <img src="{{ $e->image }}"  />
                    @else
                        <img src="/front/img/event.png" />
                    @endif
                </div>
                <div class="t-zaved event-part">
                    <span class="event-part__heading">
						{{ $e->relObject->name }}
					</span>
                    <span class="event-part__date">
						{{ $e->date_str }}
					</span>
					<span class="btn btn--second" href="#">Подробнее</span>
                </div>
            </a>
        </li>
    @endforeach
</ul>
