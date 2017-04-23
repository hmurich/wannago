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
                    <div class="form-group">
                        <label for="p_name" >Заголовок:</label>
                        <input type="text" class="form-control" name='title' placeholder="Заголовок" value='{{ isset($item) ? $item->title : null }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="note" >Описание:</label>
                        <textarea name='note' style="width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"
                                 class="wysihtml5">{{ isset($item) ? $item->note : null }}</textarea>

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

@endsection
