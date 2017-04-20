@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Добавить организацию</h3>
            </div>
            <form action='{{ $action }}' method='post'>
                <div class="box-body">
                    <div class="form-group">
                        <label for="sys_key" >Организация:</label>
                        <select class="form-control select2" style="width: 100%;" name='object_id'>
                            <option value="0"></option>
                            @foreach ($ar_object as $id=>$name)
                                <option value="{{ $id }}">{{ $name }}</option>
                            @endforeach
                        </select>
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
                            <a href="{{ action("Admin\WhereGoController@getDelete", array($cat->id,$i->id)) }}" >
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
