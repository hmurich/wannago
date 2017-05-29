@foreach ($object->relSlider as $s)
    <div>
        <img src="{{ $s->image }}" style="width: 100%;">
    </div>
@endforeach
