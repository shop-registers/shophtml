<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Cache;
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
		$url = 'http://www.hhh.com/api/register'; 
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

    	$url = "www.hhh.com/api/login";
        $data = json_decode($this->curl($url,$data),true);
        if($data['code'] == 0){
            $request->session()->put('user',$data['data']['user']);
        }
            
        return $data;
        // print_r($res);die;

    }


    //我的首页
    public function loginn(Request $request)
    {
    	//获取数据存入session
    	$data = $request->post();
        
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


    // 个人信息展示
    public function person_show(Request $request)
    {
        // 获取缓存数据
        $user_id = $request->session()->get('user_id');
        if($request->session()->has('user_id'))
        {
            $token = Cache::get('key');
            return view('person/information',['user_id'=>$user_id,'token'=>$token]);
        }
        else
        {
            echo "<script>alert('请先登录');windows:location.href='http://www.shop.com/login'</script>";
        }
        
    }



    // 未读信息
    public function news(Request $request)
    {
        $user_id = $request->session()->get('user_id');
        $token = Cache::get('key');
        if($request->session()->has('user_id'))
        {
            return view('/person/news',['user_id'=>$user_id,'token'=>$token]);
        }
        else
        {
            echo "<script>alert('请先登录');windows:location.href='http://www.shop.com/login'</script>";
        }
        
    }

}
