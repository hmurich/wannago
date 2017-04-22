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
                    <th>Организация</th>
        	        <th>Заголовок</th>
                    <th>Дата события</th>
        	        <th>Время события</th>
        	        <th>Продолжительность</th>
                    <th>Создан</th>
        	        <th>
                    </th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
                        <td>{{ $i->relObject->name }}</td>
            	        <td>{{ $i->title }}</td>
                        <td>{{ $i->date_event }}</td>
            	        <td>{{ $i->time_event }}</td>
            	        <td>{{ $i->duration }}</td>
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
                                        <a href="{{ action('Admin\EventController@getActive', $i->id) }}">
                                            {{ ($i->is_active ? 'Отклонить' : 'Одобрить') }}
                                        </a>
                                    </li>
                                    <li>
                                        <a href="{{ action('Admin\EventController@getHot', $i->id) }}">
                                            {{ ($i->is_hot ? 'Отключить HOT' : 'HOT') }}
                                        </a>
                                    </li>
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ action('Admin\EventController@getDelete', $i->id) }}">Удалить</a>
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
