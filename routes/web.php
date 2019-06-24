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
//首页
Route::get('/PersonalCenter', 'PersonalCenterController@PersonalCenter');
//个人资料
Route::get('/PersonalData', 'PersonalCenterController@PersonalData');