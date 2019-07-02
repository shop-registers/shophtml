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
        $arr_good_id=$request->input('arr_good_id');
        $arr_good_number=$request->input('arr_good_number');
        $arr_price=$request->input('arr_price');
        $allPrice=$request->input('allPrice');
        $arr=[];
        for($i=0;$i<count($arr_price);$i++)
        {
            $arr[]=['order_id'=>'1','product_id'=>"$arr_good_id[$i]",'sku_code'=>'2','product_cnt'=>"$arr_good_number[$i]",'product_price'=>"$arr_price[$i]",'order_money'=>$allPrice,'child_order_sn'=>'cd'.$this->create_order_code($data['customer_name'],$arr['sku_code']];
        }
        $data['customer_name']=1;        //用户id
        $data['order_sn']=$this->create_order_code($data['customer_name']);//订单编码
        $data['create_time']=date('Y-m-d H:i:s',time());//时间
        $res=DB::table('order_master')->insert($data);
        if(!$res){
             return json_encode(40016,"添加订单失败");
        }
        // $arr[]=$res;
        // $arr['product_id']=$request->input('good_id');//商品的ID
        // $arr['sku_code']=$request->input('sku_code');//sku编码
        // $arr['product_cnt']=$request->input('text_box');//商品数量
        // $arr['product_price']=$request->input('good_price');//订单金额
        // $arr['order_money']=$request->input('allPrice');//支付金额
        // $arr['child_order_sn']='cd'.$this->create_order_code($data['customer_name'],$arr['sku_code']);
        // $result=Order_detail::insertGetId($arr);
        $result=DB::table('order_detail')->insert($arr);
        if($result){
            $last=base64_encode("order_sn=".$data['order_sn']."&id=".$res);//总的订单号和主订单的ID
            return json_encode(40015,"添加订单成功",$last);
        }else{
            
             return json_encode(40016,"添加订单失败");
        }
    }
    public function create_order_code($user_id,$sku_code=null){
        $code=date('YmdHis',time()).$user_id.rand(1111,9999).$sku_code;
        $res=Order_master::where('order_sn',$code)->select('order_sn')->get();
        if(count($res)==0){
            return $code;    
        }else{
            $this->create_order_code($user_id);
        }
    }

}




