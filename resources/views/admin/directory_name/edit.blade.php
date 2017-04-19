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
                        <label for="sys_key" >Системный код:</label>
                        <input type="text" class="form-control" id="sys_key" name='sys_key' value='{{ isset($item) ? $item->sys_key : null }}' >
                    </div>
                    <div class="form-group">
                        <label for="name" >Наименование:</label>
                        <input type="text" class="form-control" id="name" name='name' value='{{ isset($item) ? $item->name : null }}' >
                    </div>
                    <div class="form-group">
                        <label for="note" >Заметка:</label>
                        <input type="text" class="form-control" id="note" name='note' value='{{ isset($item) ? $item->note : null }}' >
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
