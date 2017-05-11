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
        	        <th>Email</th>
        	        <th>Ф.И.О.</th>
        	        <th>Телефон</th>
                    <th>Адрес</th>
                    <th>Заметка</th>
                    <th>Кол-во завед.</th>
                    <th>Создан</th>
        	        <th>
                        <a href='{{ action("Admin\Company\EditController@getIndex") }}'>
                            <i class="glyphicon glyphicon-plus"></i>
                        </a>
                    </th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
            	        <td>{{ $i->relUser->email }}</td>
            	        <td>{{ $i->name }}</td>
            	        <td>{{ $i->phone }}</td>
                        <td>{{ $i->address }}</td>
                        <td>{{ $i->note }}</td>
                        <td>{{ $i->relObjects()->count() }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td>
                            <a href="{{ action("Admin\Company\EditController@getPassword", $i->id) }}" >
                                <i class="fa fa-key"></i>
            				</a>
            	        	<a href="{{ action("Admin\Company\EditController@getIndex", $i->id) }}" >
                                <i class="glyphicon glyphicon-edit"></i>
            				</a>
                            <a href="{{ action("Admin\Company\ListController@getDelete", $i->id) }}" >
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
