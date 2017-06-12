@extends('company.layout')

@section('title', $title)

@section('content')
<form action='{{ $action }}' method='post' enctype="multipart/form-data">
    <div class="row">
        <div class='col-md-6'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Заведение</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" >Город:</label>
                        <select class="form-control select2" style="width: 100%;" name='city_id' required="">
                            @foreach ($ar_city as $id=>$name)
                                <option value="{{ $id }}" {{ ($object->city_id == $id ? 'selected' : null) }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($object->city_id == 1)
                        <div class="form-group">
                            <label for="name" >Район Астаны:</label>
                            <select class="form-control select2" style="width: 100%;" name='city_area_id' required="">
                                @foreach ($ar_ciry_area as $id=>$name)
                                    <option value="{{ $id }}" {{ ($standart_data->city_area_id == $id ? 'selected' : null) }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name" >Наименование</label>
                        <input type="text" class="form-control" name='name' value='{{ $object->name }}' placeholder="Наименование"  required="">
                    </div>
                    <div class="form-group">
                        <label for="phone" >Телефон:</label>
                        <input type="text" class="form-control" name='phone' value='{{ $standart_data->phone }}' placeholder="Телефон"  required="">
                    </div>
                    <div class="form-group">
                        <label for="address" >Адресс:</label>
                        <input type="text" class="form-control" name='address' value='{{ $standart_data->address }}' placeholder="Адресс"  required="">
                    </div>
                    <div class="form-group">
                        <label for="address" >Время работы:</label>
                        <input type="text" class="form-control" name='work_time' value='{{ $standart_data->work_time }}' placeholder="Время работы"  required="">
                    </div>
                    <div class="form-group">
                        <label for="reserve_time_b" >Время начала брони:</label>
                        <input type="time" class="form-control" name='reserve_time_b' value='{{ $standart_data->reserve_time_b }}' placeholder="Время начала брони"  required="">
                    </div>
                    <div class="form-group">
                        <label for="reserve_time_e" >Время окончания брони:</label>
                        <input type="time" class="form-control" name='reserve_time_e' value='{{ $standart_data->reserve_time_e }}' placeholder="Время окончания брони"  required="">
                    </div>
                    <div class="form-group">
                        <label for="name" >Средний счет:</label>
                        <select class="form-control select2" style="width: 100%;" name='avg_price_id' required="">
                            @foreach ($ar_avg_pice as $id=>$name)
                                <option value="{{ $id }}" {{ ($standart_data->avg_price_id == $id ? 'selected' : null) }}>{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($cat->id == 9)
                        <div class="form-group">
                            <label for="name" >Тип заведения:</label>
                            <select class="form-control select2" name='main_option[]'
                                    multiple="multiple" data-placeholder="Тип заведения" style="width: 100%;" required="">
                                @foreach ($ar_pub_type as $id=>$name)
                                    <option value="{{ $id }}" {{ (isset($main_option[$id]) ? 'selected' : null) }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif ($cat->id == 23)
                        <div class="form-group">
                            <label for="name" >Тип размещения:</label>
                            <select class="form-control select2" name='main_option[]'
                                    multiple="multiple" data-placeholder="Тип размещения" style="width: 100%;" required="">
                                @foreach ($ar_karaoke_type as $id=>$name)
                                    <option value="{{ $id }}" {{ (isset($main_option[$id]) ? 'selected' : null) }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" >Цена за час:</label>
                            <input type="number" class="form-control" name='price_for_hout' value='{{ $standart_data->price_for_hout }}' placeholder="Цена за час"  required="">
                        </div>
                    @elseif ($cat->id == 28)
                        <div class="form-group">
                            <label for="name" >Музыка:</label>
                            <select class="form-control select2" name='main_option[]'
                                    multiple="multiple" data-placeholder="Музыка" style="width: 100%;" required="">
                                @foreach ($ar_music_type as $id=>$name)
                                    <option value="{{ $id }}" {{ (isset($main_option[$id]) ? 'selected' : null) }}>{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
					<div class="form-group">
						<label for="name" >Кухня:</label>
						<select class="form-control select2" name='main_option[]'
								multiple="multiple" data-placeholder="Кухня" style="width: 100%;" required="">
							@foreach ($ar_kitchen as $id=>$name)
								<option value="{{ $id }}" {{ (isset($main_option[$id]) ? 'selected' : null) }}>{{ $name }}</option>
							@endforeach
						</select>
					</div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Сохранить</button>
                </div>
            </div>
        </div>

        <div class='col-md-6'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Характеристики заведения</h3>
                </div>
                <div class="box-body">
                    @foreach ($ar_dop_option as $id =>$name)
                        <div class="form-group">
                            <label for="lng" >{{ $name }}:</label>
                            <input type="text" class="form-control" name='dop_option[{{ $id }}]' value='{{ (isset($dop_option[$id]) ? $dop_option[$id] : null) }}' placeholder="{{ $name }}"  >
                        </div>
                    @endforeach
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Сохранить</button>
                </div>
            </div>
        </div>
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Оссобености</h3>
                </div>
                <div class="box-body">
                    @foreach ($ar_spec_option as $id =>$name)
                        <div class="col-md-2">
                            <div class="form-group">
                                <input type="checkbox" name='specail_option[]' value="{{ $id }}" {{ (isset($special_option[$id]) ? 'checked' : null) }}> {{ $name }}
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Сохранить</button>
                </div>
            </div>
        </div>
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Карта</h3>
                </div>
                <div class="box-body">
                    <div class="row">
                        <div style="display:none">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lng" >Широта:</label>
                                <input type="text" class="form-control" name='lng' id='lng' value='{{ $location->lng }}' placeholder="Телефон"  required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lat" >Долгота:</label>
                                <input type="text" class="form-control" name='lat' id='lat' value='{{ $location->lat }}' placeholder="Телефон"  required="">
                            </div>
                        </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id='map' style="width: 100%; height: 300px;"></div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Сохранить</button>
                </div>
            </div>
        </div>

        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Описание</h3>
                </div>
                <div class="box-body">
                    <textarea name='note' class="wysihtml5"
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $standart_data->note }}</textarea>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Сохранить</button>
                </div>
            </div>
        </div>
        <!--
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Тэги</h3>
                </div>
                <div class="box-body">
                    <textarea name='tags' style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                            placeholder="Тэги, через заяпятую">{{ $tag->note }}</textarea>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
        -->
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection
