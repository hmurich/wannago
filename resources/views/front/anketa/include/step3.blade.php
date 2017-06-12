<span class="step-form__heading">
    Данные о заведении
</span>
<div class="form-row">
    <span class="form-row__text">Описание:</span>
    <textarea type="text" class="form-row__textarea" name='description'></textarea>
</div>
<div class="form-row">
    <span class="form-row__text">Фотографии:</span>
    <div class="photo-load">
        <div class="photo-load__file">
            <input type="file"  name='ar_photo'>
            <span>Загрузить фото</span>
        </div>
        <div class="photo-load__zakas">
            <input type="checkbox"  name='photo_service_true'>
            <span>Заказать фотосессию</span>
            <div class="check"></div>
        </div>
    </div>
    <div class="photo-time">
        <span class="form-row__text">Время фотосессии:</span>
        <ul class="week-ul">
            <li>Пн</li>
            <li>Вт</li>
            <li>Ср</li>
            <li>Чт</li>
            <li>Пт</li>
            <li>Сб</li>
            <li>Вс</li>
        </ul>
        <div class="form-clock">
            <span>С</span>
            <input class="form-clock__input form-clock__input--left" type="text"  name='photo_service_time_from'>
            <span>До</span>
            <input class="form-clock__input" type="text"  name='photo_service_time_to'>
        </div>
    </div>
</div>
<div class="form-bot">
    <span class="btn form-bot__left step2">Назад</span>
    <span class="btn form-bot__next step4">Далее</span>
</div>
