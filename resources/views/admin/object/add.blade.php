@extends('admin.layout')

@section('title', $title)

@section('content')
<form action='{{ $action }}' method='post'>
    <div class="row">
        <div class='col-md-6'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Заведение</h3>
                </div>
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" >Владелец:</label>
                        <select class="form-control select2" style="width: 100%;" name='company_id' required="">
                            @foreach ($ar_company as $id=>$name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" >Город:</label>
                        <select class="form-control select2" style="width: 100%;" name='city_id' required="">
                            @foreach ($ar_city as $id=>$name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" >Наименование</label>
                        <input type="text" class="form-control" name='name' placeholder="Наименование"  required="">
                    </div>
                    <div class="form-group">
                        <label for="phone" >Телефон:</label>
                        <input type="text" class="form-control" name='phone' placeholder="Телефон"  required="">
                    </div>
                    <div class="form-group">
                        <label for="address" >Адресс:</label>
                        <input type="text" class="form-control" name='address' placeholder="Адресс"  required="">
                    </div>
                    <div class="form-group">
                        <label for="address" >Время работы:</label>
                        <input type="text" class="form-control" name='work_time' placeholder="Время работы"  required="">
                    </div>
                    <div class="form-group">
                        <label for="name" >Средний счет:</label>
                        <select class="form-control select2" style="width: 100%;" name='avg_price_id' required="">
                            @foreach ($ar_avg_pice as $id=>$name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    @if ($cat->id == 9)
                        <div class="form-group">
                            <label for="name" >Тип заведения:</label>
                            <select class="form-control select2" name='main_option[]'
                                    multiple="multiple" data-placeholder="Тип заведения" style="width: 100%;" required="">
                                @foreach ($ar_pub_type as $id=>$name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @elseif ($cat->id == 23)
                        <div class="form-group">
                            <label for="name" >Тип размещения:</label>
                            <select class="form-control select2" name='main_option[]'
                                    multiple="multiple" data-placeholder="Тип размещения" style="width: 100%;" required="">
                                @foreach ($ar_karaoke_type as $id=>$name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="name" >Цена за час:</label>
                            <input type="number" class="form-control" name='price_for_hout' placeholder="Цена за час"  required="">
                        </div>
                    @elseif ($cat->id == 28)
                        <div class="form-group">
                            <label for="name" >Музыка:</label>
                            <select class="form-control select2" name='main_option[]'
                                    multiple="multiple" data-placeholder="Музыка" style="width: 100%;" required="">
                                @foreach ($ar_music_type as $id=>$name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @else
                        <div class="form-group">
                            <label for="name" >Кухня:</label>
                            <select class="form-control select2" name='main_option[]'
                                    multiple="multiple" data-placeholder="Кухня" style="width: 100%;" required="">
                                @foreach ($ar_kitchen as $id=>$name)
                                    <option value="{{ $id }}">{{ $name }}</option>
                                @endforeach
                            </select>
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class='col-md-6'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Дополнительные свойтсва</h3>
                </div>
                <div class="box-body">
                    @foreach ($ar_dop_option as $id =>$name)
                        <div class="form-group">
                            <label for="lng" >{{ $name }}:</label>
                            <input type="text" class="form-control" name='dop_option[{{ $id }}]' placeholder="{{ $name }}"  required="">
                        </div>
                    @endforeach
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
                                <input type="checkbox" name='specail_option[]' value="{{ $id }}"> {{ $name }}
                            </div>
                        </div>
                    @endforeach
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lng" >Широта:</label>
                                <input type="text" class="form-control" name='lng' id='lng' placeholder="Телефон"  required="">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lat" >Долгота:</label>
                                <input type="text" class="form-control" name='lat' id='lat' placeholder="Телефон"  required="">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div id='map' style="width: 100%; height: 300px;"></div>
                    </div>
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
                            style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
                </div>
            </div>
        </div>
        <div class='col-md-12'>
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">Тэги</h3>
                </div>
                <div class="box-body">
                    <textarea name='tags' style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;" placeholder="Тэги, через заяпятую"></textarea>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Сохранить</button>
                </div>
            </div>
        </div>
    </div>

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
</form>
@endsection
