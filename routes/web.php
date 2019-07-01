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
// Route::get('/',function(){
// 	return view('header');
// });
Route::get('/index', 'IndexController@index');
Route::get('/spike/{id?}', 'IndexController@spike');

//添加用户
Route::get('/register', 'ShopController@register');

//添加数据
Route::post('/add_register', 'ShopController@add_register');

//登录用户
Route::get('/login', 'ShopController@login');

//登录用验证
Route::post('/logins', 'ShopController@logins');

//登录成功存入session
Route::post('/loginn', 'ShopController@loginn');

//找回密码
Route::get('/zhao_mi', 'ShopController@zhao_mi');

//找回密码_获取数据
Route::post('/get_mi', 'ShopController@get_mi');

