@extends('front.layout')
@section('title', $title)

@section('content')

<main class="news">
	<div class="inner">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><span>Новости</span></li>
		</ul>
		<h1 class="search-heading">Новости</h1>
		<ul class="news-list">
            @foreach ($items as $i)
				<li>
					<div class="news-mini">
						<a href="{{ action('Front\Object\NewsController@getShow', array($i->relObject->alias, $i->id)) }}" class="news-mini__img">
                            @if ($i->image)
                                <img alt="{{ $i->title }}" src="{{ $i->image }}">
                            @else
							    <img alt="{{ $i->title }}" src="/front/img/news.jpg">
                            @endif
						</a>
						<div class="news-text">
							<span class="news-text__date">
								{{ $i->created }}
							</span>
							<a href="{{ action('Front\Object\NewsController@getShow', array($i->relObject->alias, $i->id)) }}" class="news-text__heading">
                                {{ $i->title }}
                            </a>
                            {!! $i->note !!}
							<div class="news-comments">
								{{ $i->relComments()->count() }} комментариев
							</div>
						</div>
					</div>
				</li>
            @endforeach
        </ul>

        {!! $items->render() !!}

        <div class="about-des">
            @include('front.include.about-des')
        </div>
	</div>
</main>


@endsection
