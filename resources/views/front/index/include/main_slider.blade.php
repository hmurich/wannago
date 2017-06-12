@foreach ($object_on_slide as $o)
    <div class="main-slider__part {{ $o->slide_css }}">
        <div class="inner">
            <div class="m-arrow m-arrow--left">
                Назад
            </div>
            <div class="center-part">
                <div class="center-part__top"></div>
                <div class="center-part__text">
                    <span>{{ $ar_object_type[$o->cat_id] }}</span>
                </div>
                <div class="center-part__text">
                    <span>“{{ $o->name }}”</span>
                </div>
                <div class="center-part__bot">
                    <a class="btn" href="{{ action('Front\Object\ShowController@getIndex', $o->alias) }}">Страница заведения</a>
                </div>
            </div>
            <div class="m-arrow m-arrow--right">
                Вперед
            </div>
        </div>
    </div>
@endforeach
