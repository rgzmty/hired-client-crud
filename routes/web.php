<?php
Route::get('/',                    'ClientController@index');
Route::get('/clients',             'ClientController@index');
Route::get('/clients/create',      'ClientController@create');
Route::get('/clients/{client}',    'ClientController@edit');
Route::post('/clients',            'ClientController@store');
Route::delete('/clients/{client}', 'ClientController@destroy');

Auth::routes();
