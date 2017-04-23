@extends('company.layout')

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
        	        <th>Заголовок</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Продолжительность</th>
                    <th>Одобрено</th>
                    <th>Создан</th>
        	        <th>
                        <a href='{{ action("Company\EventController@getItem") }}'>
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>
                    </th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
            	        <td>{{ $i->title }}</td>
                        <td>{{ $i->date_event }}</td>
                        <td>{{ $i->time_event }}</td>
                        <td>{{ $i->duration }}</td>
                        <td>{{ ($i->is_active ? 'Одобрено' : 'На модерации') }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td>
            	        	<a href="{{ action("Company\EventController@getItem", $i->id) }}" >
                                <i class="glyphicon glyphicon-edit"></i>
            				</a>
                            <a href="{{ action("Company\EventController@getDelete", $i->id) }}" >
                                <i class="glyphicon glyphicon-remove "></i>
            				</a>
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
