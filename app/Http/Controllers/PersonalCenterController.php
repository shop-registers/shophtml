<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use DB;

class PersonalCenterController extends Controller
{
    //个人中心首页
    public function PersonalCenter()
    {
    	//返回个人中心首页
    	return view('PersonalCenter.PersonalCenter');
    }
    //个人资料
    public function PersonalData()
    {
    	//返回个人资料
    	return view('PersonalCenter.PersonalData');
    }
    //全部订单管理
    public function PersonalOrder()
    {
        return view('PersonalCenter.PersonalOrder');
    }
    //收货地址管理
    public function PersonalAddress(Request $request)
    {

        return view('PersonalCenter.PersonalAddress');
    }
}
