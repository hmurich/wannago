<?php
    $about_text = App\Model\Page::where('sys_key', $sys_key)->first();
?>
@if ($about_text)
    <div class="top-up">
        <div class="heading">
            <span class="heading__mini">Чем мы занимаемся?</span>
            <h4 class="heading__text">{{ $about_text->title }}</h4>
        </div>
    </div>
    {!! $about_text->note !!}
@endif
