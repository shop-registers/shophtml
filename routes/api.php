<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//注册
Route::post('/register','ShopApiController@register');

//激活账号
Route::get('/verifcation/{token}','ShopApiController@verifcation');

//登录接口
Route::post('/login','ShopApiController@login');

//用户名发送密码
Route::post('/reset_pwd','ShopApiController@reset_pwd');

//修改密码
Route::get('/up_pwd/{id}','ShopApiController@up_pwd')->middleware('token');

//个人信息展示
Route::get('/personal_is_show/{id}','ShopApiController@personal_is_show')->middleware('token');

//修改查询个人信息
Route::get('/up_personal/{id}','ShopApiController@up_personal')->middleware('token');

//修改个人信息
Route::post('/ups_personal','ShopApiController@ups_personal')->middleware('token');

//我的未读消息接口
Route::get('/wo_unread_news/{id}','ShopApiController@wo_unread_news')->middleware('token');


//我的消息接口
Route::get('/wo_news/{id}','ShopApiController@wo_news')->middleware('token');

//我的钱包-积分
Route::get('/integral/{id}','ShopApiController@integral')->middleware('token');

//分组
// Route::group('/login','ShopApiController@reset_pwd');