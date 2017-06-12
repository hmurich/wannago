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
          @include('front.object.index_include.zaved_up')
			</div>
			<div class="zaved-info">
				<div class="zaved-info__left">
					<div class="wr">
						<div class="big-slider">
							<div>
                    @if ($event->image)
                        <img alt="{{ $event->title }}" src="{{ $event->image }}" style="width:100%">
                    @else
					   			<img alt="{{ $event->title }}" src="/front/img/bigFoto.jpg">
                    @endif
							</div>			
						</div>
						<div class="news-des">
							<div class="top-up">
								<h3 class="top-up__heading">{{ $event->title }}</h3>
							</div>
							<div class="zav-content">
								 {!! $event->note !!}
							</div>
						</div>
					</div>
				</div>
				<div class="zaved-info__right">
					<div class="wr">
						<div class="cont-zaved">
							@include('front.object.index_include.cont_zaved')
						</div>
					</div>
				</div>
			</div>            				
    </div>
	</div>
	<div class="reccoments">
		<div class="inner">	
			@include('front.object.include.simular_object')
		</div>	
	</div>
</main>

@endsection
