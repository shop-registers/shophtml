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

Route::any('/', 'IndexController@index');
//购物车列表
Route::post('/check_user', 'Shopping_CartController@check_user');          //检测用户是否登录接口

Route::any('/car_show', 'Shopping_CartController@car_show');               //购物车列表

Route::any('/car_update', 'Shopping_CartController@car_update');                //购物车修改商品数量

Route::any('/car_delete', 'Shopping_CartController@car_delete');                 //购物车删除商品

Route::any('/add_order', 'Shopping_CartController@add_order');               //购物车商品结算

Route::any('/collection_list', 'CollectionsController@collections_list');   //我的收藏列表

Route::any('/collections_del', 'CollectionsController@collections_del');    //取消收藏
