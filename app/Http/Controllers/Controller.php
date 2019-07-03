<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Mail;
//$email 是要发送的邮件号，即接收方
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    //请求成功返回状态
    public function Success($data=array())
    {
		return response()->json([
	    'code' => '0',
	    'msg' => "请求成功",
	    'data' => $data
		],JSON_UNESCAPED_UNICODE);
    }

    //请求错误返回数据
    public function Error($code,$msg)
    {
    	return response()->json([
		    'code' => $code,
		    'msg' => $msg
		]);
    }


    //curl post获取接口数据
    public function curl($url,$data)
    {
        $ch = curl_init ();
        
        curl_setopt ( $ch, CURLOPT_URL, $url );

        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, 1 );
        
        curl_setopt ( $ch, CURLOPT_POST, 1 ); //启用POST提交

        curl_setopt( $ch, CURLOPT_POSTFIELDS, $data);//用post方法传送参数

        
        $file_contents = curl_exec ( $ch );

        curl_close ( $ch );

        return $file_contents;
    }


    public function curl_get($urls,$headers)
    {
        // print_r($headers);die;
         $curl = curl_init();
        //设置抓取的url
        $url=$urls;                       //地址要拼接上请求参数

        curl_setopt($curl, CURLOPT_URL, $url);         
        curl_setopt($curl, CURLOPT_HEADER, 0);        //设置头文件的信息作为数据流输出
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);//设置获取的信息以文件流的形式返回，而不是直接输出
         //设置获取的信息以文件流的形式返回，而不是直接输出。
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER, 0);

        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        $data = curl_exec($curl);                     //执行命令
        curl_close($curl);                            //关闭URL请求
        return  $data;                              //显示获得的数据
    }

    


    //$email 是要发送的邮件号，即接收方

	public function sendMail($email,$msg)
    {

        //在闭包函数内部不能直接使用闭包函数外部的变量  使用use导入闭包函数外部的变量$email

        Mail::send('emails.test' , ['msg'=>$msg] , function($message)use($email){

                //设置主题

                $message->subject("小小怪！");

                //设置接收方

                $message->to($email);


               	echo json_encode(['code'=>'0','msg'=>'请求成功'],JSON_UNESCAPED_UNICODE);

        });

	}
}
