<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'IndexController@index');
Route::get("/good_info/{id}",'IndexController@good_info');
Route::get('/asdf',function(){
	return view('asdf');
});
Route::get('/pay','IndexController@good_pay');