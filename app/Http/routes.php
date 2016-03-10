<?php


//user api_token must be passed to access routes
Route::group(['middleware'=>'auth'], function(){
	
Route::get('/container', 'ContainerController@index');
Route::get('/container/{id}', 'ContainerController@show');

Route::get('/location', 'LocationController@index');
Route::get('/location/{id}', 'LocationController@show');
Route::get('/location/city/{city}', 'LocationController@showCity');

});
