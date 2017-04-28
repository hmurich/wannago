@extends('front.layout')
@section('title', $title)

@section('content')
<main class="news">
	<div class="inner">
		<ul class="breadcrumbs">
			<li><a href="/">Главная</a></li>
			<li><span>куда сходить?</span></li>
		</ul>
		<h1 class="search-heading">Куда сходить?</h1>
			<ul class="where-ul">
                @foreach($where_go as $w)
                    <li>
                        <a href="#" class="podborka">
                            <img class="podborka__img" src="img/podborka.jpg">
                            <span class="podborka__text">Пойти потанцевать</span>
                        </a>
                    </li>
                @endforeach
            </ul>
		<div class="about-des">
			@include('front.include.about-des', ['sys_key' => 'about_where'])
		</div>
	</div>
</main>

@endsection
