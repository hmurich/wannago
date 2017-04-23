@extends('company.layout')

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
                        <label for="name" >Тип:</label>
                        <select name='cat_id' class='form-control' required="">
                            @foreach ($ar_type as $k=>$name)
                                <option value="{{ $k }}">{{ $name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="name" >Название:</label>
                        <input type="text" class="form-control" name='name' placeholder="Название"  required="">
                    </div>
                    <div class="form-group">
                        <label for="p_name" >Ф.И.О:</label>
                        <input type="text" class="form-control" name='fio' placeholder="Ф.И.О" value='{{ $company->name }}'  required="">
                    </div>
                    <div class="form-group">
                        <label for="phone" >Телефон:</label>
                        <input type="text" class="form-control" name='phone' placeholder="Телефон" value='{{ $company->phone }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="address" >Почта:</label>
                        <input type="email" class="form-control" name='email' placeholder="Почта" value='{{ $user->email }}' required="">
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
