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
            <div class="big-slider">
				<div>
                    @if ($event->image)
                        <img alt="{{ $event->title }}" src="{{ $event->image }}" style="width:100%">
                    @else
					   <img alt="{{ $event->title }}" src="/front/img/bigFoto.jpg">
                    @endif
				</div>
			</div>
			<div class="zav-des">
				<div class="zav-up">
					<h3 class="zav-up__heading">{{ $event->title }}</h3>
				</div>
                {!! $event->note !!}
			</div>
			<div class="zav-map">
				<div class="zav-up">
					<h3 class="zav-up__heading">Событие <span>на карте</span></h3>
				</div>
				<div class="map">
                    <div id='map' data-lng='{{ $object->relLocation->lng }}' data-lat='{{ $object->relLocation->lat }}' style="width: 100%; height: 400px;"></div>
				</div>
			</div>
        </div>
		<div class="reccoments">
			@include('front.object.include.simular_object')
		</div>
	</div>
</main>

@endsection
