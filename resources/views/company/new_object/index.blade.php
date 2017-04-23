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
                    <th>Тип</th>
                    <th>Название</th>
        	        <th>Ф.И.О</th>
                    <th>Телефон</th>
        	        <th>Почта</th>
        	        <th>Статус</th>
                    <th>Создан</th>
        	        <th>
                        <a href="{{ action('Company\NewObjectController@getItem') }}">
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>
                    </th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
                        <td>{{ $ar_type[$i->cat_id] }}</td>
            	        <td>{{ $i->name }}</td>
                        <td>{{ $i->fio }}</td>
            	        <td>{{ $i->phone }}</td>
                        <td>{{ $i->email }}</td>
                        <td>{{ $ar_status[$i->status_id] }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td></td>
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
