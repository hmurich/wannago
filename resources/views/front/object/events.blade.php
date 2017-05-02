@extends('front.layout')
@section('title', $title)

@section('content')
<main>
	<div class="inner">
		<ul class="breadcrumbs">
            @include('front.object.include.breadcrumbs')
		</ul>
		<div class="zaved-part">
			<div class="zaved-up">
                @include('front.object.include.zaved_up')
			</div>
			<div class="zaved-menu">
                @include('front.object.include.zaved_menu')
			</div>
            <div class="other-part other-part--events">
				<div class="zav-events">
					<div class="zav-up">
						<h3 class="zav-up__heading">Ближайшие события в <span>{{ $object->name }}</span></h3>
					</div>
					<ul class="event-list">
                        @foreach ($event as $e)
                            <li>
                                <a href="{{ action('Front\Object\EventController@getShow', array($object->alias, $e->id)) }}" class="mini-event">
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

                    {!! $event->render() !!}
				</div>
			</div>
        </div>
		<div class="reccoments">
			@include('front.object.include.simular_object')
		</div>
	</div>
</main>

@endsection
