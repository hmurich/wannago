@extends('front.layout')
@section('title', $title)

@section('content')
<main class="news">
    <div class="inner">
        <ul class="breadcrumbs">
            <li><a href="#">Главная</a></li>
            <li><span>события</span></li>
        </ul>
        <h1 class="search-heading">События</h1>
        <div class="events-filter">
            <form method="get" id='datepicker_event_form' >
                <input value="{{ (isset($ar_input['event_data']) ? $ar_input['event_data'] : 'Календарь') }}" type="text" id="datepicker_event" class="events-filter__item js_send_event_data" name='event_data'>
            </form>

            <a class="events-filter__item" href="{{ App\Model\Generators\ModelSnipet::getUrlParams(array('is_hot'=>$is_hot)) }}">Горячие события</a>
            <div class="right-search">
                <form method="get" >
                    <input class="right-search__input" type="search" name='title' placeholder="название события" value="{{ (isset($ar_input['title']) ? $ar_input['title'] : null) }}">
                    <input class="right-search__submit" type="submit">
                    @foreach ($ar_input as $k=>$v)
                        @if ($k == 'page' || $k == 'title')
                            <?php continue; ?>
                        @endif
                        <input type="hidden" name='{{ $k }}' value="{{ $v }}">
                    @endforeach
                </form>
            </div>
        </div>
        <ul class="big-ul">
            @foreach ($items as $i)
                <li>
					<a href="{{ action('Front\Object\EventController@getShow', array($i->relObject->alias, $i->id)) }}" class="event-item">
						<div class="event-item__img">
                            @if ($i->catalog_image)
                                <img src="{{ $i->catalog_image }}" alt="{{ $i->title }}" style="width: 100%;" />
                            @else
                                <img src="/front/img/event.png" alt="{{ $i->title }}" />
                            @endif
						</div>
						<div class="big-event">
							<div class="item-date">
								<span class="item-date__time">{{ $i->time_str }}</span>
								<span class="item-date__text">{{ $i->date_str }}</span>
							</div>
							<span class="event-item__heading">
								{{ $i->title }}
							</span>
							<div class="event-item__zaved">
								{{ $i->relObject->name }}
							</div>
							<div class="event-item__adress">
								{{ $i->relObject->relStandartData->address }}
							</div>
						</div>
					</a>
				</li>
            @endforeach
        </ul>

        {!! $items->render() !!}

        <div class="about-des">
            @include('front.include.about-des', ['sys_key' => 'about_event'])
        </div>
    </div>
</main>

@endsection
