@extends('company.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>
            <form action='{{ $action }}' method='post' enctype="multipart/form-data">
                <div class="box-body">
                    @if (isset($item) && $item->image)
                        <div class="form-group">
                            <label for="name" >Фото</label> <br />
                            <img src="{{ $item->image }}"  class="img-thumbnail"><br />
                            <a href="{{ action('Company\EventController@getDeleteImage', $item->id) }}" class="btn  btn-danger">Удалить</a>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name" >Загрузить фото</label>
                        <input type="file" name='image' class='form-control' />
                    </div>
                    @if (isset($item) && $item->catalog_image)
                        <div class="form-group">
                            <label for="name" >Фото в каталоге</label> <br />
                            <img src="{{ $item->catalog_image }}"  class="img-thumbnail"><br />
                            <a href="{{ action('Company\EventController@getDeleteCatalogImage', $item->id) }}" class="btn  btn-danger">Удалить</a>
                        </div>
                    @endif
                    <div class="form-group">
                        <label for="name" >Загрузить фото в каталоге</label>
                        <input type="file" name='catalog_image' class='form-control' />
                    </div>


                    <div class="form-group">
                        <label for="p_name" >Заголовок:</label>
                        <input type="text" class="form-control" name='title' placeholder="Заголовок" value='{{ isset($item) ? $item->title : null }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="p_name" >Дата:</label>
                        <input type="date" class="form-control" name='date_event' placeholder="Дата" value='{{ isset($item) ? $item->date_event : null }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="p_name" >Время:</label>
                        <input type="time" class="form-control" name='time_event' placeholder="Время" value='{{ isset($item) ? $item->time_event : null }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="p_name" >Время окончания:</label>
                        <input type="time" class="form-control" name='time_end' placeholder="Время" value='{{ isset($item) ? $item->time_end : null }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="p_name" >Продолжительность:</label>
                        <input type="text" class="form-control" name='duration' placeholder="Продолжительность" value='{{ isset($item) ? $item->duration : null }}' required="">
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
