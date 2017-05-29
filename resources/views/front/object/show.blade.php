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
			<div class="zaved-second">
				@include('front.object.index_include.zaved_second')
			</div>
			<div class="zaved-info">
				<div class="zaved-info__left">
					<div class="wr">
						<div class="big-slider">
							@include('front.object.index_include.slider')
						</div>
						<div class="zaved-in">
							<ul class="zaved-rows">
								@include('front.object.index_include.zaved_rows')
							</ul>
						</div>
						<div class="zav-des">
							<div class="top-up">
								<h3 class="top-up__heading">{{ $object->name }}</h3>
							</div>
							<div class="zav-content">
								{!! $object->relStandartData->note !!}
							</div>
						</div>

						@include('front.object.index_include.comment')
					</div>
				</div>
				<div class="zaved-info__right">
					<div class="wr">
						<div class="cont-zaved">
							@include('front.object.index_include.cont_zaved')
						</div>

						<div class="zav-events">
							@include('front.object.index_include.events')
						</div>

						<div class="zav-news">
							@include('front.object.index_include.news')
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="reccoments">
			@include('front.object.include.simular_object')
		</div>
	</div>
</main>

@endsection
