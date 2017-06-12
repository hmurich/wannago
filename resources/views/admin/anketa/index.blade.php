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
                    <th>Наименование</th>
        	        <th>ФИО</th>
                    <th>Телефон</th>
                    <th>Почтовый адресс</th>
                    <th>Создан</th>
        	        <th></th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
                        <td>{{ $i->name }}</td>
            	        <td>{{ $i->fio }}</td>
            	        <td>{{ $i->phone }}</td>
                        <td>{{ $i->email }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td>
                            <a href="{{ action("Admin\AnketaController@getShow", array($i->id)) }}" >
                                <i class="glyphicon glyphicon-eye-open"></i>
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
