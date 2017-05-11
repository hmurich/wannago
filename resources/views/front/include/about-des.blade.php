<?php
    $about_text = App\Model\Page::where('sys_key', $sys_key)->first();
?>
@if ($about_text)
    <div class="top-up">
        <h4 class="top-up__heading">{{ $about_text->title }}</h4>
    </div>
    {!! $about_text->note !!}
@endif
