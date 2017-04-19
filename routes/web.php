<?php
Route::get('/', function () {
    return view('admin.example');
});

Route::get('adminka/login', 'Admin\AuthController@getLogin');
Route::post('adminka/login', 'Admin\AuthController@postLogin');


Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('adminka', 'Admin\IndexController@getIndex');

    Route::get('adminka/profile', 'Admin\AuthController@getProfile');
    Route::post('adminka/profile', 'Admin\AuthController@postProfile');
    Route::get('adminka/logout', 'Admin\AuthController@getLogout');
});
