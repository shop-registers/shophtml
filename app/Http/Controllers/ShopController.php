<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ShopController extends Controller
{
    //添加用户
    public function register(Request $request)
    {
    	if($request->isMethod('post'))
    	{
    		echo 2;die;
    	}
    	return view('home/register');
    }

    //添加数据
    public function add_register(Request $request)
    {
    	//获取post数据
    	$data = $request->post();
    	// 请求接口获取数据
		$url = 'http://www.shop.com/api/register'; 
		return $this->curl($url,$data);
    }

    //登录用户
    public function login()
    {
    	
    	return view('home/login');
    }

    //登录用户验证
    public function logins(Request $request)
    {
    	$data = $request->post();
    	$url = "www.shop.com/api/login";
    	return $this->curl($url,$data);

    	// 判断邮箱登录还是用户名登录
  		//$pattern="/\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/";
		// if(preg_match($pattern,$name)){
		//     // echo '邮箱验证通过！';
		//     return 1;die;
		// } else{
		//     // echo '邮箱格式错误！';
		//     return 2;die;
		// }

    }


    //我的首页
    public function loginn(Request $request)
    {
    	//获取数据存入session
    	$data = $request->post();
    	$user_id = $data['user_id'];
    	$token = $data['token'];
    	// print_r($data);die;
    	$request->session()->put('user_id',$user_id);
    	 // $value = $request->session()->get('user_id');
    }

    //找回密码
    public function zhao_mi(Request $request)
    {
       return view('home/zhao_mi');
    	
    }


    //获取数据
    public function get_mi(Request $request)
    {
    	$data = $request->post();
    	$url = "www.shop.com/api/reset_pwd";
 		return $this->curl($url,$data);
    }
}
