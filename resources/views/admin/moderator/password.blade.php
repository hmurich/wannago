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
                        <label for="sys_key" >Email:</label>
                        <input type="email" class="form-control" name='email' placeholder="Email" value='{{ isset($user) ? $user->email : null }}' required="">
                    </div>
                    <div class="form-group">
                        <label for="sys_key" >Пароль:</label>
                        <input type="password" class="form-control" name='password' placeholder="Пароль" required="">
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
