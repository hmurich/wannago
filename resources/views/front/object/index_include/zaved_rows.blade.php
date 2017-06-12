@if ($main_pub)
    <li>
        <div class="character">
            <span class="character__heading">Тип заведения</span>
            <p class="character__text">{{ $main_pub }}</p>
        </div>
    </li>
@endif
@if ($main_karaoke)
    <li>
        <div class="character">
            <span class="character__heading">Тип размещения</span>
            <p class="character__text">{{ $main_karaoke }}</p>
        </div>
    </li>
@endif
@if ($main_kitchen)
    <li>
        <div class="character">
            <span class="character__heading">Кухня</span>
            <p class="character__text">{{ $main_kitchen }}</p>
        </div>
    </li>
@endif
@if ($main_musik)
    <li>
        <div class="character">
            <span class="character__heading">Музыка</span>
            <p class="character__text">{{ $main_musik }}</p>
        </div>
    </li>
@endif
@if (isset($ar_avg_price[$object->relStandartData->avg_price_id]))
    <li>
        <div class="character">
            <span class="character__heading">Средний счет</span>
            <p class="character__text">{{ $ar_avg_price[$object->relStandartData->avg_price_id] }}</p>
        </div>
    </li>
@endif
@if ($object->relStandartData->phone)
	<li>
        <div class="character">
            <span class="character__heading">ТЕЛЕФОН</span>
            <p class="character__text">{{ $object->relStandartData->phone }}</p>
        </div>
    </li>
@endif
@if ($object->relStandartData->address)
	<li>
        <div class="character">
            <span class="character__heading">АДРЕС</span>
            <p class="character__text">{{ $object->relStandartData->address }}</p>
        </div>
    </li>
@endif
@if ($object->relStandartData->work_time)
	<li>
        <div class="character">
            <span class="character__heading">ВРЕМЯ РАБОТЫ</span>
            <p class="character__text">{{ $object->relStandartData->work_time }}</p>
        </div>
    </li>
@endif

@if ($object->relStandartData->price_for_hout > 0)
    <li>
        <div class="character">
            <span class="character__heading">Цена за час</span>
            <p class="character__text">{{ $object->relStandartData->price_for_hout }}</p>
        </div>
    </li>
@endif
@foreach ($object->relDopOption as $o)
	@if (!$o->option_value)
		<?php continue; ?>
	@endif
    <li>
        <div class="character">
            <span class="character__heading">{{ $o->option_name }}</span>
            <p class="character__text">{{ $o->option_value }}</p>
        </div>
    </li>
@endforeach
@if ($special_option->count() > 0)
    <li>
        <div class="character">
            <span class="character__heading">Особенности</span>
            <div class="feature">
                @foreach ($special_option as $i)
                    <div class="{{ $i->sys_key }}">
                        <span class="feature-text">
                            {{ $i->name }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </li>
@endif
