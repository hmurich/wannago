@extends('front.layout')
@section('title', $title)



@section('js')
	@parent
	<script>
		$(function() {
			$( "#anketa" ).tabs();
		});
	</script>
@endsection

@section('content')

<form action='{{ action("Front\AnketaController@postIndex") }}' method="post" enctype="multipart/form-data" class='js_anketa_form'>
    <main>
    	<div id="anketa" class="anketa">
    		<div class="anketa-center">
    			<img class="anketa-center__img" src="/front/img/anketa-logo.png">
    			<a class="btn" href="/">Смотреть каталог</a>
    			<p>Заполните поля, что бы наш менеджер мог добавить вас в наш каталог</p>
    			<ul class="step-ul">
    				<li>
    					<a class="step-item step-item--1" href="#step1">шаг 1</a>
    				</li>
    				<li>
    					<a class="step-item step-item--2"  href="#step2">шаг 2</a>
    				</li>
    				<li>
    					<a class="step-item step-item--3" href="#step3">шаг 3</a>
    				</li>
    				<li>
    					<a class="step-item step-item--4" href="#step4">шаг 4</a>
    				</li>
    			</ul>
    		</div>
    		<div id="step1" class="step-form">
                @include('front.anketa.include.step1')
    		</div>
    		<div id="step2" class="step-form">
                @include('front.anketa.include.step2')
    		</div>
    		<div id="step3" class="step-form">
                @include('front.anketa.include.step3')
    		</div>
    		<div id="step4" class="step-form">
                @include('front.anketa.include.step4')
    		</div>
    	</div>
    </main>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>

<div class='pre_loader'>
	
</div>
@endsection
