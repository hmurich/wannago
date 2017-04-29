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
                <div class="events-filter__item">Календарь</div>
                <a class="events-filter__item" href="#">Горячие события</a>
                <div class="right-search">
                    <input class="right-search__input" type="search" placeholder="название события">
                    <input class="right-search__submit" type="submit">
                </div>
            </div>
            <ul class="big-ul">
                @foreach ($items as $i)
                    <li>
                        <a href="{{ action('Front\Object\EventController@getShow', array($i->relObject->alias, $i->id)) }}" class="event-item">
                            <div class="event-item__img">
                                @if ($i->image)
                                    <img src="{{ $i->image }}" alt="{{ $i->title }}" />
                                @else
                                    <img src="/front/img/event.png" alt="{{ $i->title }}" />
                                @endif
                            </div>
                            <div class="item-date">
                                <span class="item-date__time">{{ $e->time_str }}</span>
                                <span class="item-date__text">{{ $e->date_str }}</span>
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
