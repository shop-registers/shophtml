<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PersonalCenterController extends Controller
{
    //个人中心首页
    public function PersonalCenter()
    {
    	return view('PersonalCenter.PersonalCenter');
    }
    //个人资料
    public function PersonalData()
    {
    	return view('PersonalCenter.PersonalData');
    }
}
