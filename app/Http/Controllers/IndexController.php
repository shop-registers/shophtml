<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use App\Mongodb;

class IndexController extends Controller
{
    //首页无限分类
    public function index()
    {
    	// 无限分类
    	$type = Cache::remember('type',120,function(){
    		$str = file_get_contents('http://www.hhh.com/api/goodstype');
    		return json_decode($str,true);
    	});

    	//分类商品1
    	$data1 = Cache::remember('data1',120,function(){
    		$str = file_get_contents('http://www.hhh.com/api/getgoods1');
    		return json_decode($str,true);
    	});

    	//分类商品2
    	$data2 = Cache::remember('data2',120,function(){
    		$str = file_get_contents('http://www.hhh.com/api/getgoods2');
    		return json_decode($str,true);
    	});

    	//分类商品3
    	$data3 = Cache::remember('data3',120,function(){
    		$str = file_get_contents('http://www.hhh.com/api/getgoods3');
    		return json_decode($str,true);
    	});

    	//分类商品4
    	$data4 = Cache::remember('data4',120,function(){
    		$str = file_get_contents('http://www.hhh.com/api/getgoods4');
    		return json_decode($str,true);
    	});

        //图片
        $img = Cache::remember('img',120,function(){
            $str = file_get_contents('http://www.hhh.com/api/brand');
            return json_decode($str,true);
        });
    	//print_r($img);die;
    	return view('index',['data'=>$type,'data1'=>$data1,'data2'=>$data2,'data3'=>$data3,'data4'=>$data4,'img'=>$img]);
    }

    public function spike(Request $request,$id=null)
    {
        return view('spike');
    }


    public function good_info(Request $request,$id)
    {
    	/*$user_id=1;
    	$connection = Mongodb::connectionMongodb('shop');
		$result= $connection ->insert(['look_user_id'=>$user_id,'good_id'=>$id]);
		if($result){
			echo "成功";
		}else{
			echo "失败";
		}die;*/
    	$url="http://www.hhh.com/api/good_onceinfo/".$id;
    	$data=file_get_contents($url);
    	$data=json_decode($data,true);
    	$goodinfo=$data['data']['good'][0];
    	$attrinfo=$data['data']['attr'];
    	$imginfo=$data['data']['goodimg'];
    	return view('good_info',['goodinfo'=>$goodinfo,'attrinfo'=>$attrinfo,'imginfo'=>$imginfo]);
    }
    public function good_pay(Request $request){
    	$code=$request->input('code');
    	$url="http://www.hhh.com/api/payorder?code=".$code;
    	$data=file_get_contents($url);
    	$data=json_decode($data,true);
    	return view('pay',['data'=>$data['data']]);
    }
    public function success_pay(Request $request){
        $code=$request->input('code');
        $url="http://www.hhh.com/api/get_success?code=".$code;
        $data=file_get_contents($url);
        $data=json_decode($data,true);
        return view('success',$data);
    }
}
