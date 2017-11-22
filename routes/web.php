<?php

Route::get('/', function() {
    // return view('welcome');
    return getenv("DATABASE_URL");
});

Route::get('/firma', 'FirmasController@index')->name('lista_firmi');

Route::get('/firma/{id}', 'FirmasController@show')
  ->where('id', '[0-9]+')
  ->name('detalji_firme');

Route::get('/firma/nova', 'FirmasController@newform')->name('unos_firme');
Route::post('/firma', 'FirmasController@store');

Route::get('/firma/izmena/{id}', 'FirmasController@editform')
  ->where('id', '[0-9]+')
  ->name('izmena_firme');
Route::put('/firma/{id}', 'FirmasController@update')
  ->where('id', '[0-9]+');

Route::get('/firma/brisanje/{id}', 'FirmasController@deleteform')
  ->where('id', '[0-9]+')
  ->name('brisanje_firme');
Route::delete('/firma/{id}', 'FirmasController@destroy')
  ->where('id', '[0-9]+');

Route::get('/firma/izbor/{id}', 'FirmasController@choose')
  ->where('id', '[0-9]+');
