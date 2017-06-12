@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
        <div class="box-body">
        	<table class="table table-striped">
                <tr>
        	        <th>id</th>
                    <th>Город</th>
        	        <th>Наименование</th>
                    <th>Рэйтинг</th>
        	        <th>Email</th>
        	        <th>Телефон</th>
                    <th>Создан</th>
        	        <th>
                    </th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
                        <td>{{ $ar_city[$i->city_id] }}</td>
            	        <td>{{ $i->name }}</td>
                        <td>{{ $i->raiting_view }}</td>
            	        <td>{{ $i->relUser->email }}</td>
            	        <td>{{ $i->relStandartData->phone }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Действие</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ action('Admin\Object\ListController@getAuth', $i->user_id) }}">Авторизоваться</a>
                                    </li>

                                    <li>
                                        <a href="{{ action('Admin\Object\EditController@getIndex', $i->id) }}">Изменить</a>
                                    </li>
                                    <li>
                                        <a href="{{ action('Admin\Object\RaitingController@getIndex', $i->id) }}">
                                            Рэйтинг
                                        </a>
                                    </li>

                                    <li>
                                        <a href="{{ action('Admin\Object\ListController@getSlide', $i->id) }}">
                                            {{ ($i->is_slide ? 'Отключить Слайд' : 'Слайд') }}
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
        	{!! $items->render() !!}
        </div>
    </div>
</div>

@endsection
