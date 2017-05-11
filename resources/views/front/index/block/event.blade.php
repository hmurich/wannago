<div class="top-up">
    <h4 class="top-up__heading">Ближайшие события</h4>
    <a class="link link--event" href="{{ action('Front\EventController@getIndex') }}">Все события</a>
</div>

<div class="events scroll-pane">
    <ul class="event-ul">
        @foreach ($events as $e)
            <li>
                <a href="{{ action('Front\Object\EventController@getShow', array($e->relObject->alias, $e->id)) }}" class="mini-event">
                    <div class="mini-event__img">
                        @if ($e->catalog_image)
                            <img src="{{ $e->catalog_image }}" style="max-width: 112px;" />
                        @else
                            <img src="/front/img/event.png" />
                        @endif
                    </div>
                    <div class="event-right">
                        <div class="event-date">
                            <span class="event-date__time">{{ $e->time_str}}</span>
                            <span class="event-date__text">{{ $e->date_str }}</span>
                        </div>
                        <div class="mini-event__zaved">
                            {{ $e->title }}
                        </div>
                        <div class="mini-event__heading">
                            {{ $e->relObject->name }}
                        </div>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
