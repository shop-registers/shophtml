<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    //
    public function index()
    {
    	$str = file_get_contents('http://localhost/show_qian/public/goodstype');
    	$data = json_decode($str,true);
    	return view('index',['data'=>$data]);
    }
}
