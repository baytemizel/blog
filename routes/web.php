<?php

Auth::routes();

Route::get('/', 'HomeController@index');

Route::group(['middleware' => ['web', 'auth']], function (){
    Route::get('home', 'HomeController@home');
    Route::get('page/create', 'PageController@newPage');
    Route::post('page/create', 'PageController@create');
});
