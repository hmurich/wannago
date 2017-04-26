<div class="top-up">
    <div class="heading">
        <h4 class="heading__text">Ближайшие события</h4>
    </div>
    <a class="link link--event" href="#">Все события</a>
</div>
<div class="events">
    <ul class="event-ul">
        @foreach ($events as $e)
            <li>
                <a href="#" class="mini-event">
                    <div class="mini-event__img">
                        @if ($e->catalog_image)
                            <img src="{{ $e->catalog_image }}" style="max-width: 112px;" />
                        @else
                            <img src="/front/img/event.png" />
                        @endif
                    </div>
                    <span class="mini-event__heading">
                        {{ $e->title }}
                    </span>
                    <div class="event-date">
                        <span class="event-date__time">{{ $e->time_str}}</span>
                        <span class="event-date__text">{{ $e->date_str }}</span>
                    </div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
