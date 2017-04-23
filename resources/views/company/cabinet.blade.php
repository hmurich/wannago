@extends('company.layout')

@section('title', $title)

@section('content')
<div class="row">
    <div class='col-md-12'>
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">{{ $title }}</h3>
            </div>

            <form action='{{ $action }}' method="post" role="form">
                <div class="box-body">
                    <div class="form-group">
                        <label for="email" >Email</label>
                        <input type="email" class="form-control" id="email" name='email' value='{{ $user->email }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="password" >Пароль</label>
                        <input type="password" class="form-control" id="password" name='password' placeholder="Password" required="">
                    </div>
                    <div class="form-group">
                        <label for="name" >Ф.И.О:</label>
                        <input type="text" class="form-control" name='name' placeholder="Отчество" value='{{ isset($item) ? $item->name : null }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="phone" >Телефон:</label>
                        <input type="text" class="form-control" name='phone' placeholder="Телефон" value='{{ isset($item) ? $item->phone : null }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="address" >Адресс:</label>
                        <input type="text" class="form-control" name='address' placeholder="Адресс" value='{{ isset($item) ? $item->address : null }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="note" >Заметка:</label>
                        <input type="text" class="form-control" name='note' placeholder="Заметка" value='{{ isset($item) ? $item->note : null }}' required="">
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
