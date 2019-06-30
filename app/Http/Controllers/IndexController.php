<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mongodb;

class IndexController extends Controller
{
    //
    public function index()
    {
    	$str = file_get_contents('http://localhost/show_qian/public/goodstype');
    	$data = json_decode($str,true);
    	return view('index',['data'=>$data]);
    }
    public function good_info(Request $request,$id){
    	/*$user_id=1;
    	$connection = Mongodb::connectionMongodb('shop');
		$result= $connection ->insert(['look_user_id'=>$user_id,'good_id'=>$id]);
		if($result){
			echo "成功";
		}else{
			echo "失败";
		}die;*/
    	$url="http://localhost/cffirm/show_qian/public/api/good_onceinfo?good_id=".$id;
    	$data=file_get_contents($url);
    	$data=json_decode($data,true);
    	$goodinfo=$data['data']['good'][0];
    	$attrinfo=$data['data']['attr'];
    	$imginfo=$data['data']['goodimg'];
    	return view('good_info',['goodinfo'=>$goodinfo,'attrinfo'=>$attrinfo,'imginfo'=>$imginfo]);
    }
    public function good_pay(Request $request){
    	$code=$request->input('code');
    	$url="http://localhost/cffirm/show_qian/public/api/payorder?code=".$code;
    	$data=file_get_contents($url);
    	$data=json_decode($data,true);
    	return view('pay',['data'=>$data['data']]);
    }
    public function success_pay(Request $request){
        $code=$request->input('code');
        $url="http://localhost/cffirm/show_qian/public/api/get_success?code=".$code;
        $data=file_get_contents($url);
        $data=json_decode($data,true);
        return view('success',$data);
    }
}
