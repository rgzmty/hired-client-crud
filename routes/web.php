<?php
Route::get('/',            'ClientController@index');
Route::get('/new',         'ClientController@create');
Route::get('/{client}',    'ClientController@edit');
Route::delete('/{client}', 'ClientController@destroy');
Route::post('/',           'ClientController@store');

Auth::routes();
