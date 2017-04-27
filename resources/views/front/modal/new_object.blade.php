<div id="adding" style="width:400px;display: none;">
	<div class="adding-part">
		<form action='{{ action("Front\NewObjectController@postSave") }}' method="post">
			<h3 class="adding-part__heading">Подать заявку на добавление заведения</h3>
			<select name='cat_id' class='adding-part__input' required="">
				@foreach ($ar_object_type as $k=>$name)
					<option value="{{ $k }}">{{ $name }}</option>
				@endforeach
			</select>
			<input type="text" name='name' placeholder="Название заведения" class="adding-part__input" required="">
			<input type="text" name='fio' placeholder="Имя" class="adding-part__input" required="">
			<input type="text" name='phone' placeholder="Номер" class="adding-part__input" required="">
			<input type="email" name='email' placeholder="Почта" class="adding-part__input" required="">
			<button class="adding-part__submit" type="submit">Отправить заведение</button>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</div>
</div>
