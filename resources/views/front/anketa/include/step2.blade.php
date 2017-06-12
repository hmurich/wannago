<span class="step-form__heading">
    Данные о категориях заведения
</span>
<div class="form-row form-row--sel">
    <select class="form-row__select" name="cat_id">
        <option>Выберите категорию</option>
        <option>Выберите категорию</option>
    </select>
</div>
<div class="form-row">
    <span class="form-row__text">Номер:</span>
    <input type="text" class="form-row__input" name="number">
</div>
<div class="form-row">
    <span class="form-row__text">Средний счет:</span>
    <input type="text" class="form-row__input" name="avg_price">
</div>
<div class="form-row form-row--sel">
    <select class="form-row__select" name="kitchen_id">
        <option>Кухня</option>
        <option>Выберите категорию</option>
        <option>Выберите категорию</option>
        <option>Выберите категорию</option>
        <option>Выберите категорию</option>
        <option>Выберите категорию</option>
    </select>
</div>
<div class="form-row">
    <span class="form-row__text">Рабочие дни:</span>
    <ul class="week-ul">
        <li>Пн</li>
        <li>Вт</li>
        <li>Ср</li>
        <li>Чт</li>
        <li>Пт</li>
        <li>Сб</li>
        <li>Вс</li>
    </ul>
    <span class="form-row__text">Время работы:</span>
    <div class="form-clock">
        <span>С</span>
        <input class="form-clock__input form-clock__input--left" type="text"  name="work_time_from">
        <span>До</span>
        <input class="form-clock__input" type="text" name="work_time_to">
        <div class="kruglo">
            <input class="kruglo__input" type="checkbox"  name="work_time_full">
            <span class="kruglo__text">
                Круглосуточно
            </span>
        </div>
    </div>
</div>
<div class="form-row">
    <span class="form-row__text">Описание залов:</span>
    <textarea type="text" class="form-row__textarea" name="note_zal"></textarea>
</div>
<div class="form-row form-row--sel">
    <select class="form-row__select" name="kredit_cart">
        <option>Кредитные карты</option>
        <option>Выберите категорию</option>
    </select>
</div>
<div class="form-row form-row--sel">
    <select class="form-row__select" name="park">
        <option>Парковка</option>
        <option>Выберите категорию</option>
    </select>
</div>
<div class="form-row form-row--sel">
    <select class="form-row__select"  name="children">
        <option>Детям</option>
        <option>Выберите категорию</option>
    </select>
</div>
<div class="form-row form-row--sel">
    <select class="form-row__select"  name="musik">
        <option>Музыка</option>
        <option>Выберите категорию</option>
    </select>
</div>
<div class="form-row">
    <span class="form-row__text">Особенности:</span>
    <div class="check-row">
        <input type="checkbox"  name="name">
        <label>Кальяны</label>
    </div>
    <div class="check-row">
        <input type="checkbox">
        <label>Спортивные площадки</label>
    </div>
    <div class="check-row">
        <input type="checkbox">
        <label>Кальяны</label>
    </div>
    <div class="check-row">
        <input type="checkbox">
        <label>Спортивные площадки</label>
    </div>
</div>
<div class="form-bot">
    <span class="btn form-bot__left step1">Назад</span>
    <span class="btn form-bot__next step3">Далее</span>
</div>
