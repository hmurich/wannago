@extends('company.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Добавить категорию</h3>
            </div>
            <form action='{{ $action }}' method='post' enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="p_name" >Наименование категории:</label>
                        <input type="text" name='name' class='form-control' required=""/>
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
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">
                <table class="table table-striped">
                    <tr>
            	        <th>id</th>
            	        <th>Наименование</th>
                        <th>Создан</th>
            	        <th></th>
            	    </tr>
                    @foreach($items as $i)
                	    <tr>
                	        <td>{{ $i->id }}</td>
                	        <td>{{ $i->name }}</td>
                            <td>{{ $i->created_at }}</td>
                	        <td>
                	        	<a href="{{ action("Company\GaleryController@getIndex", $i->id) }}" >
                                    <i class="glyphicon glyphicon-edit"></i>
                				</a>
                                <a href="{{ action("Company\GaleryTypeController@getDelete", $i->id) }}" >
                                    <i class="glyphicon glyphicon-remove "></i>
                				</a>
                			</td>
                	    </tr>
                    @endforeach
                </table>
            </div>
            <div class="box-footer">
                {!! $items->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
