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
            <div class="other-part">
                @foreach ($items as $i)
                    @if ($i->relPhotos()->count() == 0)
                        <?php continue; ?>
                    @endif
                    <div class="gallery-part">
                        <span class="gallery-part__heading">{{ $i->name }}</span>
                        <ul class="gallery-ul">
                            @foreach ($i->relPhotos as $photo)
                                <li>
                                    <a class="gallery-item fancybox" href="{{ $photo->image }}" data-fancybox-group="gallery">
                                        <img alt="" src="{{ $photo->image }}">
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                @endforeach

                {!! $items->render() !!}
			</div>
        </div>
		<div class="reccoments">
			@include('front.object.include.simular_object')
		</div>
	</div>
</main>

@endsection
