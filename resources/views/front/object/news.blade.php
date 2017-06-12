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
            <div class="other-part other-part--news">
				<div class="zav-news">
					<div class="zav-up">
						<h3 class="zav-up__heading">Новости</h3>
					</div>
					<ul class="nzav-ul">
                        @foreach ($news as $n)
    						<li>
    							<div class="news-inner">
    								<a href="{{ action('Front\Object\NewsController@getShow', array($object->alias, $n->id)) }}" class="img-news">
                                        @if ($n->image)
                                            <img alt="{{ $n->title }}" src="{{ $n->image }}">
                                        @else
    									    <img alt="{{ $n->title }}" src="/front/img/news-zaved.jpg">
                                        @endif
    								</a>
    								<div class="nmini">
    									<a class="nmini__heading" href="{{ action('Front\Object\NewsController@getShow', array($object->alias, $n->id)) }}">
    										{{ $n->title }}
    									</a>
    									<span class="nmini__date">{{ $n->created_at }}</span>
    									{!! $n->note !!}
    								</div>
    							</div>
    						</li>
						@endforeach
					</ul>

                    {!! $news->render() !!}
				</div>
			</div>
        </div>
		<div class="reccoments">
			@include('front.object.include.simular_object')
		</div>
	</div>
</main>

@endsection
