<div id="booking" style="width:700px;display: block;" class='booking'>
    <form action="{{ $action }}" method="post">
        <div class="booking-part">
    		<div class="book-up">
    			<span class="book-up__heading">
    				Забронировать столик
    			</span>
    			<div class="book-tel">
    				<span class="book-tel__text">
    					онлайн или по телефону
    				</span>
    				<span class="book-tel__number">
    					{{ $standart_data->phone }}
    				</span>
    			</div>
    		</div>
    		<div class="ov">
    			<div class="book-left">
    				<div class="book-left__inner">
    					<input class="book-left__input" name='name' placeholder="Ваше Имя..." type="text" required="">
    					<input class="book-left__input" name='email' placeholder="Ваш e-mail..." type="text" required="">
    					<input class="book-left__input" name='phone' placeholder="Номер телефона..." type="text" required="">
                        <div class="book-row">
							<span class="book-row__text">Количество человек</span>
							<div class="pnumber">
								<input value="1" type="text" class="pnumber__input" name='count_person'>
								<div class="pnumber__add pnumber__add--plus">+</div>
								<div class="pnumber__add pnumber__add--minus">-</div>
							</div>
						</div>
    				</div>
    			</div>
    			<div class="book-right"  >
                    <?php $unix_begin = strtotime($standart_data->reserve_time_b) - strtotime(date('d-m-Y')); ?>
                    <?php $unix_end = strtotime($standart_data->reserve_time_e) - strtotime(date('d-m-Y')); ?>
                    @if ($unix_end < $unix_begin)
                        <?php $unix_end = $unix_end + (60 * 60 * 24); ?>
                    @endif
                    <?php $unix_begin = $unix_begin - ($unix_begin % (60 * 30)); ?>
                    <div class="book-row">
    					<span class="book-row__text">Выберите дату</span>
    					<input class="book-row__datepicker"  value="05/10/2017" type="text" id="datepicker" size="30">
    				</div>
    				<div class="book-time">
                        @for ($unix_begin; $unix_begin <= $unix_end; $unix_begin = $unix_begin + (60 * 30))
                            <div class="book-time__item ">
                                <input name="time" type="radio" value="{{ date('H:i', $unix_begin) }}">
                                <span>{{ date('H:i', $unix_begin) }}</span>
                            </div>
                        @endfor
    				</div>
    			</div>
    		</div>
    		<textarea placeholder="Пожелание к брони" class="book-comment" name='note' ></textarea>
    		<button class="btn booking-but" type="submit">Забронировать столик</button>
    	</div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
    </form>
</div>
