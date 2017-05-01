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

			<div class="menu-img">
				<ul class="zav-menu">
					<li class="zav-menu__item {{ ($is_main  == 0 ? 'zav-menu__item--active' : null) }}">
						<a href="?is_main=0">Основное меню</a>
					</li>
					<li class="zav-menu__item {{ ($is_main  == 1 ? 'zav-menu__item--active' : null) }}">
						<a href="?is_main=1">Барное меню</a>
					</li>
				</ul>
				<ul class="bluda-ul">
					@foreach ($items as $i)
						<li>
							<img alt="{{ $title }}" src="{{ $i->image }}" style="width: 100%; padding-bottom: 15px;">
						</li>
					@endforeach
				</ul>
			</div>
        </div>
		<div class="reccoments">
            @include('front.object.include.simular_object')
		</div>
	</div>
</main>

@endsection
