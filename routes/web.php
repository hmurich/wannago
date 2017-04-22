<?php
Route::get('/', function () {
    return view('admin.example');
});

Route::get('adminka/login', 'Admin\AuthController@getLogin');
Route::post('adminka/login', 'Admin\AuthController@postLogin');


Route::group(['middleware' => ['auth.admin']], function () {
    Route::get('adminka', 'Admin\IndexController@getIndex');

    //company routes
    Route::get('adminka/company/', 'Admin\Company\ListController@getIndex');
    Route::get('adminka/company/delete/{id}', 'Admin\Company\ListController@getDelete');
    Route::get('adminka/company/item/{id?}', 'Admin\Company\EditController@getIndex');
    Route::post('adminka/company/item/{id?}', 'Admin\Company\EditController@postSave');

    //event routes
    Route::get('adminka/event/{id}', 'Admin\EventController@getIndex');
    Route::get('adminka/event/active/{id}', 'Admin\EventController@getActive');
    Route::get('adminka/event/hot/{id}', 'Admin\EventController@getHot');
    Route::get('adminka/event/delete/{id}', 'Admin\EventController@getDelete');

    //add objects
    Route::get('adminka/object/add/{id}', 'Admin\Object\AddController@getIndex');
    Route::post('adminka/object/add/{id}', 'Admin\Object\AddController@postSave');

    //list of objects
    Route::get('adminka/object/list/{id}', 'Admin\Object\ListController@getIndex');
    Route::get('adminka/object/list/vip/{id}', 'Admin\Object\ListController@getVip');
    Route::get('adminka/object/list/specail/{id}', 'Admin\Object\ListController@getSpecial');
    Route::get('adminka/object/list/moderate/{id}', 'Admin\Object\ListController@getModerate');
    Route::get('adminka/object/list/new/{id}', 'Admin\Object\ListController@getNew');
    Route::get('adminka/object/list/delete/{id}', 'Admin\Object\ListController@getDelete');

    //add objects
    Route::get('adminka/object/edit/{id}', 'Admin\Object\EditController@getIndex');
    Route::post('adminka/object/edit/{id}', 'Admin\Object\EditController@postSave');

    //WhereGoController
    Route::get('adminka/where-go/{id}', 'Admin\WhereGoController@getIndex');
    Route::post('adminka/where-go/add/{id}', 'Admin\WhereGoController@postAdd');
    Route::get('adminka/where-go/delete/{id}/{object_id}', 'Admin\WhereGoController@getDelete');

    //ModeratorController
    Route::get('adminka/directory/moderator', 'Admin\Directory\ModeratorController@getIndex');
    Route::get('adminka/directory/moderator/item/{id?}', 'Admin\Directory\ModeratorController@getEdit');
    Route::post('adminka/directory/moderator/item/{id?}', 'Admin\Directory\ModeratorController@postEdit');
    Route::get('adminka/directory/moderator/password/{id?}', 'Admin\Directory\ModeratorController@getPassword');
    Route::post('adminka/directory/moderator/password/{id?}', 'Admin\Directory\ModeratorController@postPassword');
    Route::get('adminka/directory/moderator/delete/{id}', 'Admin\Directory\ModeratorController@getDelete');

    //CityController
    Route::get('adminka/directory/city', 'Admin\Directory\CityController@getIndex');
    Route::get('adminka/directory/city/item/{id?}', 'Admin\Directory\CityController@getEdit');
    Route::post('adminka/directory/city/item/{id?}', 'Admin\Directory\CityController@postEdit');
    Route::get('adminka/directory/city/delete/{id}', 'Admin\Directory\CityController@getDelete');

    //AvgPriceController
    Route::get('adminka/directory/avg-price', 'Admin\Directory\AvgPriceController@getIndex');
    Route::get('adminka/directory/avg-price/item/{id?}', 'Admin\Directory\AvgPriceController@getEdit');
    Route::post('adminka/directory/avg-price/item/{id?}', 'Admin\Directory\AvgPriceController@postEdit');
    Route::get('adminka/directory/avg-price/delete/{id}', 'Admin\Directory\AvgPriceController@getDelete');

    //ObjectCatController
    Route::get('adminka/directory/object-cat', 'Admin\Directory\ObjectCatController@getIndex');
    Route::get('adminka/directory/object-cat/item/{id?}', 'Admin\Directory\ObjectCatController@getEdit');
    Route::post('adminka/directory/object-cat/item/{id?}', 'Admin\Directory\ObjectCatController@postEdit');
    Route::get('adminka/directory/object-cat/delete/{id}', 'Admin\Directory\ObjectCatController@getDelete');

    //PubTypeController
    Route::get('adminka/directory/pub-type', 'Admin\Directory\PubTypeController@getIndex');
    Route::get('adminka/directory/pub-type/item/{id?}', 'Admin\Directory\PubTypeController@getEdit');
    Route::post('adminka/directory/pub-type/item/{id?}', 'Admin\Directory\PubTypeController@postEdit');
    Route::get('adminka/directory/pub-type/delete/{id}', 'Admin\Directory\PubTypeController@getDelete');

    //KaraokeTypeController
    Route::get('adminka/directory/karaoke-type', 'Admin\Directory\KaraokeTypeController@getIndex');
    Route::get('adminka/directory/karaoke-type/item/{id?}', 'Admin\Directory\KaraokeTypeController@getEdit');
    Route::post('adminka/directory/karaoke-type/item/{id?}', 'Admin\Directory\KaraokeTypeController@postEdit');
    Route::get('adminka/directory/karaoke-type/delete/{id}', 'Admin\Directory\KaraokeTypeController@getDelete');

    //KitchenController
    Route::get('adminka/directory/kitchen', 'Admin\Directory\KitchenController@getIndex');
    Route::get('adminka/directory/kitchen/item/{id?}', 'Admin\Directory\KitchenController@getEdit');
    Route::post('adminka/directory/kitchen/item/{id?}', 'Admin\Directory\KitchenController@postEdit');
    Route::get('adminka/directory/kitchen/delete/{id}', 'Admin\Directory\KitchenController@getDelete');

    //MusicController
    Route::get('adminka/directory/music', 'Admin\Directory\MusicController@getIndex');
    Route::get('adminka/directory/music/item/{id?}', 'Admin\Directory\MusicController@getEdit');
    Route::post('adminka/directory/music/item/{id?}', 'Admin\Directory\MusicController@postEdit');
    Route::get('adminka/directory/music/delete/{id}', 'Admin\Directory\MusicController@getDelete');

    //WhereGoController
    Route::get('adminka/directory/where-go', 'Admin\Directory\WhereGoController@getIndex');
    Route::get('adminka/directory/where-go/item/{id?}', 'Admin\Directory\WhereGoController@getEdit');
    Route::post('adminka/directory/where-go/item/{id?}', 'Admin\Directory\WhereGoController@postEdit');
    Route::get('adminka/directory/where-go/delete/{id}', 'Admin\Directory\WhereGoController@getDelete');

    //special options
    //PubController
    Route::get('adminka/special-option/pub', 'Admin\SpecailOption\PubController@getIndex');
    Route::get('adminka/special-option/pub/item/{id?}', 'Admin\SpecailOption\PubController@getEdit');
    Route::post('adminka/special-option/pub/item/{id?}', 'Admin\SpecailOption\PubController@postEdit');
    Route::get('adminka/special-option/pub/delete/{id}', 'Admin\SpecailOption\PubController@getDelete');

    //KaraokeControlller
    Route::get('adminka/special-option/karaoke', 'Admin\SpecailOption\KaraokeControlller@getIndex');
    Route::get('adminka/special-option/karaoke/item/{id?}', 'Admin\SpecailOption\KaraokeControlller@getEdit');
    Route::post('adminka/special-option/karaoke/item/{id?}', 'Admin\SpecailOption\KaraokeControlller@postEdit');
    Route::get('adminka/special-option/karaoke/delete/{id}', 'Admin\SpecailOption\KaraokeControlller@getDelete');

    //KofeController
    Route::get('adminka/special-option/kofe', 'Admin\SpecailOption\KofeController@getIndex');
    Route::get('adminka/special-option/kofe/item/{id?}', 'Admin\SpecailOption\KofeController@getEdit');
    Route::post('adminka/special-option/kofe/item/{id?}', 'Admin\SpecailOption\KofeController@postEdit');
    Route::get('adminka/special-option/kofe/delete/{id}', 'Admin\SpecailOption\KofeController@getDelete');

    //CafeController
    Route::get('adminka/special-option/cafe', 'Admin\SpecailOption\CafeController@getIndex');
    Route::get('adminka/special-option/cafe/item/{id?}', 'Admin\SpecailOption\CafeController@getEdit');
    Route::post('adminka/special-option/cafe/item/{id?}', 'Admin\SpecailOption\CafeController@postEdit');
    Route::get('adminka/special-option/cafe/delete/{id}', 'Admin\SpecailOption\CafeController@getDelete');

    //RestoranController
    Route::get('adminka/special-option/restoran', 'Admin\SpecailOption\RestoranController@getIndex');
    Route::get('adminka/special-option/restoran/item/{id?}', 'Admin\SpecailOption\RestoranController@getEdit');
    Route::post('adminka/special-option/restoran/item/{id?}', 'Admin\SpecailOption\RestoranController@postEdit');
    Route::get('adminka/special-option/restoran/delete/{id}', 'Admin\SpecailOption\RestoranController@getDelete');

    //BanketController
    Route::get('adminka/special-option/banket', 'Admin\SpecailOption\BanketController@getIndex');
    Route::get('adminka/special-option/banket/item/{id?}', 'Admin\SpecailOption\BanketController@getEdit');
    Route::post('adminka/special-option/banket/item/{id?}', 'Admin\SpecailOption\BanketController@postEdit');
    Route::get('adminka/special-option/banket/delete/{id}', 'Admin\SpecailOption\BanketController@getDelete');

    //ClubController
    Route::get('adminka/special-option/club', 'Admin\SpecailOption\ClubController@getIndex');
    Route::get('adminka/special-option/club/item/{id?}', 'Admin\SpecailOption\ClubController@getEdit');
    Route::post('adminka/special-option/club/item/{id?}', 'Admin\SpecailOption\ClubController@postEdit');
    Route::get('adminka/special-option/club/delete/{id}', 'Admin\SpecailOption\ClubController@getDelete');

    //SummerResController
    Route::get('adminka/special-option/summer-res', 'Admin\SpecailOption\SummerResController@getIndex');
    Route::get('adminka/special-option/summer-res/item/{id?}', 'Admin\SpecailOption\SummerResController@getEdit');
    Route::post('adminka/special-option/summer-res/item/{id?}', 'Admin\SpecailOption\SummerResController@postEdit');
    Route::get('adminka/special-option/summer-res/delete/{id}', 'Admin\SpecailOption\SummerResController@getDelete');

    //dop options
    //PubController
    Route::get('adminka/dop-option/pub', 'Admin\DopOption\PubController@getIndex');
    Route::get('adminka/dop-option/pub/item/{id?}', 'Admin\DopOption\PubController@getEdit');
    Route::post('adminka/dop-option/pub/item/{id?}', 'Admin\DopOption\PubController@postEdit');
    Route::get('adminka/dop-option/pub/delete/{id}', 'Admin\DopOption\PubController@getDelete');

    //KaraokeControlller
    Route::get('adminka/dop-option/karaoke', 'Admin\DopOption\KaraokeControlller@getIndex');
    Route::get('adminka/dop-option/karaoke/item/{id?}', 'Admin\DopOption\KaraokeControlller@getEdit');
    Route::post('adminka/dop-option/karaoke/item/{id?}', 'Admin\DopOption\KaraokeControlller@postEdit');
    Route::get('adminka/dop-option/karaoke/delete/{id}', 'Admin\DopOption\KaraokeControlller@getDelete');

    //KofeController
    Route::get('adminka/dop-option/kofe', 'Admin\DopOption\KofeController@getIndex');
    Route::get('adminka/dop-option/kofe/item/{id?}', 'Admin\DopOption\KofeController@getEdit');
    Route::post('adminka/dop-option/kofe/item/{id?}', 'Admin\DopOption\KofeController@postEdit');
    Route::get('adminka/dop-option/kofe/delete/{id}', 'Admin\DopOption\KofeController@getDelete');

    //CafeController
    Route::get('adminka/dop-option/cafe', 'Admin\DopOption\CafeController@getIndex');
    Route::get('adminka/dop-option/cafe/item/{id?}', 'Admin\DopOption\CafeController@getEdit');
    Route::post('adminka/dop-option/cafe/item/{id?}', 'Admin\DopOption\CafeController@postEdit');
    Route::get('adminka/dop-option/cafe/delete/{id}', 'Admin\DopOption\CafeController@getDelete');

    //RestoranController
    Route::get('adminka/dop-option/restoran', 'Admin\DopOption\RestoranController@getIndex');
    Route::get('adminka/dop-option/restoran/item/{id?}', 'Admin\DopOption\RestoranController@getEdit');
    Route::post('adminka/dop-option/restoran/item/{id?}', 'Admin\DopOption\RestoranController@postEdit');
    Route::get('adminka/dop-option/restoran/delete/{id}', 'Admin\DopOption\RestoranController@getDelete');

    //BanketController
    Route::get('adminka/dop-option/banket', 'Admin\DopOption\BanketController@getIndex');
    Route::get('adminka/dop-option/banket/item/{id?}', 'Admin\DopOption\BanketController@getEdit');
    Route::post('adminka/dop-option/banket/item/{id?}', 'Admin\DopOption\BanketController@postEdit');
    Route::get('adminka/dop-option/banket/delete/{id}', 'Admin\DopOption\BanketController@getDelete');

    //ClubController
    Route::get('adminka/dop-option/club', 'Admin\DopOption\ClubController@getIndex');
    Route::get('adminka/dop-option/club/item/{id?}', 'Admin\DopOption\ClubController@getEdit');
    Route::post('adminka/dop-option/club/item/{id?}', 'Admin\DopOption\ClubController@postEdit');
    Route::get('adminka/dop-option/club/delete/{id}', 'Admin\DopOption\ClubController@getDelete');

    //SummerResController
    Route::get('adminka/dop-option/summer-res', 'Admin\DopOption\SummerResController@getIndex');
    Route::get('adminka/dop-option/summer-res/item/{id?}', 'Admin\DopOption\SummerResController@getEdit');
    Route::post('adminka/dop-option/summer-res/item/{id?}', 'Admin\DopOption\SummerResController@postEdit');
    Route::get('adminka/dop-option/summer-res/delete/{id}', 'Admin\DopOption\SummerResController@getDelete');

    Route::get('adminka/profile', 'Admin\AuthController@getProfile');
    Route::post('adminka/profile', 'Admin\AuthController@postProfile');
    Route::get('adminka/logout', 'Admin\AuthController@getLogout');
});
