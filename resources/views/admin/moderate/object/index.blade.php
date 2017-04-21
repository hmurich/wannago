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
            	        <td>{{ $i->relUser->email }}</td>
            	        <td>{{ $i->relStandartData->phone }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td>
                            <div class="btn-group">
                                  <button type="button" class="btn btn-success">Action</button>
                                  <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <span class="caret"></span>
                                    <span class="sr-only">Toggle Dropdown</span>
                                  </button>
                                  <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
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
