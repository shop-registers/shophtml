<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Models\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Models\Shopcart;

class Shopping_CartController extends Controller
{
    public function check_user(Request $request){
        // $uid=$request->session()->get('uid');//session获取用户id
        $uid=1;
        if (empty($uid)){
            return json_encode(['code' =>'0','msg' => '用户未登录','data' => null]);
        }else{
           return json_encode(['code' => 1,'msg' => '请求成功','data' => null]);  
        }
    }
    public function car_show()
    {
        $uid=1;
        $data = DB::table('shopcart')
                    ->where('shopcart.user_id',$uid)
                    ->join('goods_img','shopcart.good_id','=','goods_img.goods_id')
                    ->join('goods','shopcart.good_id','=','goods.id')
                    // ->join('good_attr','shopcart.good_id','=','good_attr.good_id')
                    ->get();
        // var_dump($data);
        if($data)
        {
             return view("shopcart/shopcart",['data'=>$data]);
        }else{
             return json_encode(['code' => 0,'msg' => '请求失败','data' => null]);
        }
       
    }
    //删除购物车中的商品
    public function car_delete(Request $request){
        // $uid = $request->input('uid');
        $uid=1;
        $gid = $request->input('good_id');
        $res = DB::table('shopcart')->where('user_id',$uid)->where('good_id',$gid)->delete();
        if ($res){
            return redirect("car_show");
        }else{
            return json_encode(['code' => 0,'msg' => '请求失败','data' => null]);
        }
    }
    //修改信息
    public function car_update(Request $request){
        // $uid = $request->input('uid');
        $uid=1;
        $good_id = $request->input('good_id');
        $num = $request->input('num');
        $res = DB::table('shopcart')->where('user_id',$uid)->where('good_id',$good_id)->update(['goods_number' => $num]);
        if ($res){
            return json_encode(['code' => 1,'msg' => '请求成功','data' => $res]);
        }
        else{
            return json_encode(['code' => 0,'msg' => '请求失败','data' => null]);
        }
    }

    /**
     * 确认下单
     */
    public function add_order(Request $request){
        $data=$request->input();
        // $data['customer_name']=1;        //用户id
        // $data['order_sn']=$this->create_order_code($data['goods_id'],$data['customer_name']);//订单编码
        // $data['create_time']=date('Y-m-d H:i:s',time());//时间
        // $res=Order_master::insertGetId($data);
        // if(!$res){
        //     json(40016,"添加订单失败");return;
        // }
        // $arr['order_id']=$res;
        // $arr['product_id']=$data['goods_id'];
        // $arr['product_cnt']=$request->input('text_box');//商品数量
        // $arr['product_price']=$request->input('good_price');//订单金额
        // $arr['sku_code']=$data['sku_code'];
        // $arr['order_money']=$request->input('good_price')*$arr['product_cnt'];//支付金额
        // $arr['child_order_sn']='cd'.$this->create_order_code($data['goods_id'],$data['customer_name']);
        // $result=Order_detail::insertGetId($arr);
        // if($result){
        //     $last=base64_encode("order_sn=".$data['order_sn']."&id=".$res);//总的订单号和主订单的ID
        //     json(40015,"添加订单成功",$last);
        // }else{
        //     json(40016,"添加订单失败");
        // }
    }

}




