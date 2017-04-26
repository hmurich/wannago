<div class="banner-area">
    @foreach ($banners as $b)
        <a class="banner" href="{{ $b->href }}">
            <img src="{{ $b->image }}">
        </a>
    @endforeach
</div>
