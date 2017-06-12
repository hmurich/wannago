@forelse ($object->relSlider as $s)
    <div>
        <img src="{{ $s->image }}" style="width: 100%;">
    </div>
@empty 
	<div>
        <img src="/upload/galerea/1496129422_.jpg" style="width: 100%;">
    </div>
@endforelse
