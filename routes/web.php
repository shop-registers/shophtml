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


Route::get("/good_info/{id}",'IndexController@good_info');
Route::get('/pay','IndexController@good_pay');
Route::get('/success','IndexController@success_pay');

//购物车列表
Route::post('/check_user', 'Shopping_CartController@check_user');          //检测用户是否登录接口

Route::any('/car_show', 'Shopping_CartController@car_show');               //购物车列表

Route::any('/car_update', 'Shopping_CartController@car_update');                //购物车修改商品数量

Route::any('/car_delete', 'Shopping_CartController@car_delete');                 //购物车删除商品

Route::any('/add_order', 'Shopping_CartController@add_order');               //购物车商品结算

Route::any('/collection_list', 'CollectionsController@collections_list');   //我的收藏列表

Route::any('/collections_del', 'CollectionsController@collections_del');    //取消收藏

//个人信息展示
Route::get('/person_show', 'ShopController@person_show');

//个人信息修改
Route::post('/person_upd', 'ShopController@person_upd');

//我的信息
Route::get('/news', 'ShopController@news');

