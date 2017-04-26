@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Добавить баннер</h3>
            </div>
            <form action='{{ $action }}' method='post' enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="href" >Ссылка:</label>
                        <input type="text" class="form-control" name='href' placeholder="Ссылка"  required="">
                    </div>
                    <div class="form-group">
                        <label for="name" >Фото баннера</label>
                        <input type="file" name='image' class='form-control' required="">
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
                    <th>Ссылка</th>
        	        <th>Фото баннера</th>
                    <th>Кол-во просмотров</th>
                    <th>Создан</th>
        	        <th></th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
                        <td><a href='{{ $i->href }}' target="_blank">{{ $i->href }}</a></td>
            	        <td><img src="{{ $i->image }}"  class="img-thumbnail"></td>
            	        <td>{{ $i->view_count }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td>
                            <a href="{{ action("Admin\BannerController@getDelete", array($i->id)) }}" >
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
