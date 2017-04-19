<?php
Route::get('/', function () {
    return view('admin.example');
});

Route::get('adminka/login', 'Admin\AuthController@getLogin');
Route::post('adminka/login', 'Admin\AuthController@postLogin');


Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('adminka', 'Admin\IndexController@getIndex');

    //CityController
    Route::get('adminka/directory/city', 'Admin\CityController@getIndex');
    Route::get('adminka/directory/city/item/{id?}', 'Admin\CityController@getEdit');
    Route::post('adminka/directory/city/item/{id?}', 'Admin\CityController@postEdit');
    Route::get('adminka/directory/city/delete/{id}', 'Admin\CityController@getDelete');

    //AvgPriceController
    Route::get('adminka/directory/avg-price', 'Admin\AvgPriceController@getIndex');
    Route::get('adminka/directory/avg-price/item/{id?}', 'Admin\AvgPriceController@getEdit');
    Route::post('adminka/directory/avg-price/item/{id?}', 'Admin\AvgPriceController@postEdit');
    Route::get('adminka/directory/avg-price/delete/{id}', 'Admin\AvgPriceController@getDelete');

    //ObjectCatController
    Route::get('adminka/directory/object-cat', 'Admin\ObjectCatController@getIndex');
    Route::get('adminka/directory/object-cat/item/{id?}', 'Admin\ObjectCatController@getEdit');
    Route::post('adminka/directory/object-cat/item/{id?}', 'Admin\ObjectCatController@postEdit');
    Route::get('adminka/directory/object-cat/delete/{id}', 'Admin\ObjectCatController@getDelete');

    Route::get('adminka/profile', 'Admin\AuthController@getProfile');
    Route::post('adminka/profile', 'Admin\AuthController@postProfile');
    Route::get('adminka/logout', 'Admin\AuthController@getLogout');
});
