@extends('company.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">Добавить фото</h3>
            </div>
            <form action='{{ $action }}' method='post' enctype="multipart/form-data">
                <div class="box-body">
                    <div class="form-group">
                        <label for="p_name" >Фото:</label>
                        <input type="file" name='image' class='form-control' required=""/>
                    </div>
                    <div class="form-group">
                        <label for="name" >Тип меню:</label>
                        <select class="form-control select2" style="width: 100%;" name='is_main' required="">
                            @foreach ($is_main as $id=>$name)
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
        <div class="box box-success">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <div class="box-body">
                <div class="row">
                    @foreach ($items as $i)
                        <div class='col-md-3' style="    padding-bottom: 10px">
                            <span>{{ $is_main[$i->is_main] }}</span>
                            <img src="{{ $i->image }}"  class="img-thumbnail">
                            <a href="{{ action('Company\MenuController@getDelete', $i->id) }}" class="btn btn-block btn-danger">Удалить</a>
                        </div>
                    @endforeach
                </div>
            </div>
            <div class="box-footer">
                {!! $items->render() !!}
            </div>
        </div>
    </div>
</div>
@endsection
