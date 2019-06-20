<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class IndexController extends Controller
{
    //首页无限分类
    public function index()
    {
    	// 无限分类
    	$type = Cache::remember('type',120,function(){
    		$str = file_get_contents('http://localhost/show_qian/public/goodstype');
    		return json_decode($str,true);
    	});

    	//分类商品1
    	$data1 = Cache::remember('data1',120,function(){
    		$str = file_get_contents('http://localhost/show_qian/public/getgoods1');
    		return json_decode($str,true);
    	});

    	//分类商品2
    	$data2 = Cache::remember('data2',120,function(){
    		$str = file_get_contents('http://localhost/show_qian/public/getgoods2');
    		return json_decode($str,true);
    	});

    	//分类商品3
    	$data3 = Cache::remember('data3',120,function(){
    		$str = file_get_contents('http://localhost/show_qian/public/getgoods3');
    		return json_decode($str,true);
    	});

    	//分类商品4
    	$data4 = Cache::remember('data4',120,function(){
    		$str = file_get_contents('http://localhost/show_qian/public/getgoods4');
    		return json_decode($str,true);
    	});
    	//print_r($data1);die;
    	return view('index',['data'=>$type,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4]);
    }
}
