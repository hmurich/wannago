@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">Фильтр</h3>
            </div>
            <form action='' method='get'>
                <div class="box-body">
                    <div class="form-group">
                        <label for="name" >Поиск по наименованию:</label>
                        <input type="text" class="form-control" name='name' placeholder="Наименование" value="{{ (isset($ar_input['name']) ? $ar_input['name'] : null) }}">
                    </div>
                    <div class='row'>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label for="address" >Поиск по городу:</label>
                                <select class="form-control select2" style="width: 100%;" name='city_id' >
                                    <option value="0">Все города</option>
                                    @foreach ($ar_city as $id=>$name)
                                        <option value="{{ $id }}" {{ (isset($ar_input['city_id']) && $ar_input['city_id'] == $id ? 'selected' : null) }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label for="note" >Поиск по типу:</label>
                                <select class="form-control select2" style="width: 100%;" name='cat_id' >
                                    <option value="0">Все типы</option>
                                    @foreach ($ar_object_type as $id=>$name)
                                        <option value="{{ $id }}" {{ (isset($ar_input['cat_id']) && $ar_input['cat_id'] == $id ? 'selected' : null) }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class='col-md-4'>
                            <div class="form-group">
                                <label for="note" >Заполнено:</label>
                                <select class="form-control select2" style="width: 100%;" name='is_fill' >
                                    <option value="0">Все </option>
                                    @foreach ($ar_fill as $id=>$name)
                                        <option value="{{ $id }}" {{ (isset($ar_input['is_fill']) && $ar_input['is_fill'] == $id ? 'selected' : null) }}>{{ $name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Сохранить</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
        </div>
    </div>
</div>


<div class="row">
    <div class='col-md-12'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
                <div class="box-tools">
                    <h4>Общее количество - {{ $total_count }}</h4>
                </div>
            </div>
        <div class="box-body">
        	<table class="table table-striped">
                <tr>
        	        <th>Наименование</th>
                    <th>Тип</th>
                    <th>Город</th>
                    <th>Описание</th>
        	        <th>Лого</th>
                    <th>Слайдер</th>
        	        <th>Галерея</th>
        	        <th>Карта</th>
                    <th>Оссобености</th>
        	        <th>Меню</th>
                    <th>Заполнено</th>
        	    </tr>
                @foreach($items as $i)
                    <?php $check = true; ?>
            	    <tr>
            	        <td>
                            <a href='{{ action('Front\Object\ShowController@getIndex', $i->alias) }}' target="_blank">
                                {{ $i->name }}
                            </a>
                        </td>
                        <td>{{ $ar_object_type[$i->cat_id] }}</td>
                        <td>{{ $ar_city[$i->city_id] }}</td>
                        <td style="text-align: center;">
                            @if ($i->relStandartData && $i->relStandartData->note)
                                <span class='fa fa-check-square-o text-green'></span>
                            @else
                                <span class='fa fa-remove text-red'></span>
                                <?php $check = false; ?>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($i->relStandartData && $i->relStandartData->logo)
                                <span class='fa fa-check-square-o text-green'></span>
                            @else
                                <span class='fa fa-remove text-red'></span>
                                <?php $check = false; ?>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($i->relSlider()->count() > 0)
                                <span class='fa fa-check-square-o text-green'></span>
                            @else
                                <span class='fa fa-remove text-red'></span>
                                <?php $check = false; ?>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($i->relGelerea()->count() > 0)
                                <span class='fa fa-check-square-o text-green'></span>
                            @else
                                <span class='fa fa-remove text-red'></span>
                                <?php $check = false; ?>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($i->relLocation && $i->relLocation->lng && $i->relLocation->lat)
                                <span class='fa fa-check-square-o text-green'></span>
                            @else
                                <span class='fa fa-remove text-red'></span>
                                <?php $check = false; ?>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($i->relSpecialOption()->count() > 0)
                                <span class='fa fa-check-square-o text-green'></span>
                            @else
                                <span class='fa fa-remove text-red'></span>
                                <?php $check = false; ?>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($i->relMenu()->count() > 0)
                                <span class='fa fa-check-square-o text-green'></span>
                            @else
                                <span class='fa fa-remove text-red'></span>
                                <?php $check = false; ?>
                            @endif
                        </td>
                        <td style="text-align: center;">
                            @if ($check)
                                <span class='fa fa-check-square-o text-green'></span>
                            @else
                                <span class='fa fa-remove text-red'></span>
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Действие</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ action('Admin\Object\EditController@getIndex', $i->id) }}">Изменить</a>
                                    </li>
                                    <li>
                                        <a href="{{ action('Admin\Object\RaitingController@getIndex', $i->id) }}">
                                            Рэйтинг
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ action('Admin\Object\ListController@getVip', $i->id) }}">
                                            {{ ($i->is_vip ? 'Отключить ВИП' : 'ВИП') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ action('Admin\Object\ListController@getSpecial', $i->id) }}">
                                            {{ ($i->is_special ? 'Отключить Специальное' : 'Специальное') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ action('Admin\Object\ListController@getNew', $i->id) }}">
                                            {{ ($i->is_new ? 'Отключить Новое' : 'Новое') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ action('Admin\Object\ListController@getRecomeded', $i->id) }}">
                                            {{ ($i->is_recomded ? 'Отключить Рекомендовано' : 'Рекомендовано') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ action('Admin\Object\ListController@getModerate', $i->id) }}">
                                            {{ ($i->is_moderate ? 'Возобновить' : 'Приостановить') }}
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ action('Admin\Object\ListController@getDelete', $i->id) }}">Удалить</a>
                                    </li>
                                </ul>
                            </div>
                        </td>
            	    </tr>
                @endforeach
            </table>
        </div>
        <div class="box-footer clearfix">
        	{!! $items->appends($ar_input)->render() !!}
        </div>
    </div>
</div>

@endsection
