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
                    <th>Отзыв</th>
                    <th>Создан</th>
        	        <th>
                    </th>
        	    </tr>
                @foreach($items as $i)
            	    <tr>
            	        <td>{{ $i->id }}</td>
            	        <td>{{ $i->title }}</td>
                        <td>{{ $i->note }}</td>
                        <td>{{ $i->created_at }}</td>
            	        <td>
                            @if (!$i->had_answer)
                                <a href="{{ action("Company\CommentController@getAnswer", $i->id) }}" >
                                    Ответить
                				</a>
                            @else
                                Отвечен
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
