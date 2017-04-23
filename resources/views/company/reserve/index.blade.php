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
        	        <th>Имя</th>
                    <th>Телефон</th>
                    <th>Email</th>
                    <th>Текст</th>
                    <th>Дата</th>
                    <th>Время</th>
                    <th>Создан</th>
        	        <th></th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
            	        <td>{{ $i->name }}</td>
                        <td>{{ $i->phone }}</td>
                        <td>{{ $i->email }}</td>
                        <td>{{ $i->note }}</td>
                        <td>{{ $i->enter_date }}</td>
                        <td>{{ $i->enter_time }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td>
                            @if (!$i->is_accept)
                	        	<a href="{{ action("Company\ReserveController@getAccept", $i->id) }}" >
                                    закрыть
                				</a>
                            @else
                                закрыто
                            @endif
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
