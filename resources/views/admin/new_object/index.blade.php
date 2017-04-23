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
                    <th>Компания</th>
                    <th>Тип</th>
                    <th>Название</th>
        	        <th>Ф.И.О</th>
                    <th>Телефон</th>
        	        <th>Почта</th>
        	        <th>Статус</th>
                    <th>Создан</th>
        	        <th></th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
                        <td>{{ ($i->relCompany ? $i->relCompany->name : 'не зарегистрирован') }}</td>
                        <td>{{ $ar_type[$i->cat_id] }}</td>
            	        <td>{{ $i->name }}</td>
                        <td>{{ $i->fio }}</td>
            	        <td>{{ $i->phone }}</td>
                        <td>{{ $i->email }}</td>
                        <td>{{ $ar_status[$i->status_id] }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td>
                            <div class="btn-group">
                                <button type="button" class="btn btn-default">Действие</button>
                                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                </button>
                                <ul class="dropdown-menu" role="menu">
                                    @if ($i->status_id == 0)
                                        <li>
                                            <a href="{{ action('Admin\NewObjectController@getActive', array($i->id, 1)) }}">Отказать</a>
                                        </li>
                                        <li>
                                            <a href="{{ action('Admin\NewObjectController@getActive', array($i->id, 2)) }}">Одобрить</a>
                                        </li>
                                    @endif
                                    <li class="divider"></li>
                                    <li>
                                        <a href="{{ action('Admin\NewObjectController@getDelete', $i->id) }}">Удалить</a>
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
