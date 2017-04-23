@extends('admin.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <form action='{{ $action }}' method='post'>
                <div class="box-body">
                    @foreach($ar_value as $key=>$value)
                        <div class="form-group">
                            <label for="phone" >{{ (isset($ar_titles[$key]) ? $ar_titles[$key] : 'Заголовок не найден') }}:</label>
                            <input type="text" class="form-control" name='ar[{{ $key }}]' value='{{ $value }}' >
                        </div>
                    @endforeach
                </div>
                <div class="box-footer">
                    <button type="submit" class="btn btn-info pull-right">Сохранить</button>
                </div>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
            </form>
		</div>
	</div>

</div>

@endsection
