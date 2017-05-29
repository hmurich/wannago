<?php
    $about_text = App\Model\Page::where('sys_key', $sys_key)->first();
?>
@if ($about_text)
    <div class="top-up">
        <h4 class="top-up__heading">{{ $about_text->title }}</h4>
    </div>
    <div class="about-text">
		<img class="about-text__img" src="/front/img/about-img.jpg">
		<div class="about-text__info">
            {!! $about_text->note !!}
        </div>
    </div>
@endif
