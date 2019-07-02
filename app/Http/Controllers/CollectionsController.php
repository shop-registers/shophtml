<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Collect;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\Response;


class CollectionsController extends Controller
{
    //我的收藏列表
    public function collections_list(Request $request)
    {
    	
        //$user_id=$request->session()->get('user_id');
        $user_id=1;
        $res =DB::table('collect')
            ->where('collect.user_id',$user_id)
            ->join('goods', 'collect.good_id', '=', 'goods.id')
            ->get();
        if($res)
        {
            return view("collections/collection",['data'=>$res]);
        }else{
            return json_encode(['code'=>0,"msg"=>"接口请求失败"]);
        }
    }
    //删除收藏
    public function collections_del(Request $request)
    {
        
        // $user_id=$request->input("user_id");
        $good_id=$request->input("good_id");
        $user_id=1;
        $res =DB::table('collect')->where('user_id',$user_id)->where('good_id',$good_id)->delete();
        if($res)
        {
            // return json_encode(['code'=>1,"msg"=>"接口请求成功"]);
            return redirect("collection_list");
        }else{
            return json_encode(['code'=>0,"msg"=>"接口请求失败"]);
        }
    }
}



// <!-- <div class="s-extra-box">
//                                                 <span class="ddd"><a href="collections_del?good_id={{$sort->good_id}}">取消收藏</a></span>
//                                             </div> -->

