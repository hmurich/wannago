<span class="zaved-up__heading">{{ $object->name }}</span>
<span class="zaved-up__ocenky">{{ $object->relScore()->count() }} оценки</span>
<div class="stars {{ $object->raiting_full_round }}star"></div>
