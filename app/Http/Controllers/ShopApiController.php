<?php
namespace App\Http\Controllers;

use App\Http\Requests\RegisterUserRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Users_token;
use App\Models\Shop_admin_comment;
use App\Models\Shop_admin_goods;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
// use cache;
class ShopApiController extends Controller
{
    //注册
    public function register(Request $request)
    {
        //获取接收数据
        $data = $request->post();

        // 验证器验证规则
        $rules=[
            'name'=>'unique:users,name|required|alpha_dash|between:2,30',
            'pwd'=>'required|between:6,30',
            'pwd_cc'=>'required|same:pwd',
            'email'=>'unique:users,email|required|email',
        ];
        $message=[
            'name.required'=>'名字不能为空',
            'name.between'=>'最少两个汉子',
            'name.alpha_dash'=>'必须汉子',
            'name.unique'=>'名字不能重复',
            'pwd.required'=>'密码不能为空',
            'pwd_cc.same'=>'密码必须一致',
            'pwd_cc.required'=>'确认密码不能为空',
            'pwd.between'=>'密码最少6位字符最多30个字符',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不正确',
            'email.unique'=>'邮箱不能重复注册',
        ];
        $validator=Validator::make($data,$rules,$message);
        if(!$validator->passes()){
            //返回错误信息
            $validatorErrs = $validator->errors()->first();
            return $this->error('001',$validatorErrs);
        }
        unset($data['pwd_cc']);
        $email = $data['email'];
        //添加用户信息
        $data['last_time'] = time();
        $create_data = User::insertGetId($data);
        if(!$create_data)
        {
            return $this->error('1002','添加信息失败');
        }
        $token = "激活连接"."www.shop.com/api/verifcation/".$create_data;
        // 发送邮箱验证
        return $this->sendMail($email,$token);
        
    }

    //账号激活
    public function verifcation(Request $request)
    {
        $id = $request->route('token');
        $data = User::where('id',$id)->update(['status'=>'1']);
        if($data)
        {
            echo "激活成功";                                                                                  
        }
        else
        {
            echo "您已经激活成功了";
        }
    }

    //登录接口
    public function login(Request $request)
    {
        //获取登录数据
        $data = $request->all();
        $name = $data['name'];
        $pwd = $data['pwd'];
        if(empty($data['name']) || empty($data['pwd']))
        {
            return $this->error('1002','参数缺失');
        }
        // 判断登录数据是否一致
        $data = User::where('name',$name)->where('pwd',$pwd)->first();
        $user_id = $data['id'];
        if(empty($data['name']) || empty($data['pwd']))
        {
            return $this->error('1003','用户名、密码不正确！');
        }
        if($data['status'] == 0)
        {
            return $this->error('1004','请激活您的账号！');
        }
        //生成token
        $res = Users_token::where('user_id',$user_id)->first();
        if(!empty($res))
        {
            $token = md5($name.$pwd.rand(999,111));
            // $data = Cache::forever('key',$token);
            $data = Cache::put('key',$token,744*60);
            $res = Users_token::where('user_id',$user_id)->update(['token'=>$token]);
            return $this->success(['user_id'=>$user_id,'token'=>$token]);
            //实例化
        }
        else
        {
            $token = md5($name.$pwd.rand(999,111));
            // $data = Cache::forever('key',$token);
            $data = Cache::put('key',$token,744*60);
            $res = Users_token::insert(['user_id'=>$user_id,'token'=>$token]);
            return $this->success(['user_id'=>$user_id,'token'=>$token]);
        }
        
    }


    //发送生日祝福
    public function birth(Request $request)
    {
       $id =  $request->post('user_id');
       $user = User::where('id',$id)->first();
       $name = $user['name'];
       $email = $user['email'];
       $birth = $user['birth'];
       $births = date('m-d H:i');
       $time = date('m-d H:i',time());
       // print_r($births);die;
       // echo $births."<br>".$time;die;
       // if($births == $time)
       // {
       //      return $this->sendMail($emial,"亲爱的：".$name."恭喜！今天是你的生日祝你天天开心! "); 
       //      echo 1;die;
       // }
       // else
       // {
       //      echo 1;die;
       // }
       echo 1;die;
    }

    //用户名发送邮箱
    public function reset_pwd(Request $request)
    {
        //获取用户名称发送到用户的邮箱
        $data = $request->post();
        $name = User::where('name',$data['name'])->first();
        if(empty($name))
        {
            return $this->error('1001','请求参数缺失');
        }
        $email = $name['email'];
        $token ="您的密码是：".$name['pwd'];
        return $this->sendMail($email,$token);

    }

    //通过邮箱重置密码修改密码
    public function up_pwd(Request $request)
    {
        //获取穿过来的数据
        $id = $request->route('id');
        $res = User::where('id',$id)->first();
        if(empty($res))
        {
            return $this->error('1004','没有该数据');
        }
        $data = $request->all();
        $pwd = $data['pwd'];
        $rpwd = $data['pwd_cc'];
        $pwd_len = strlen($rpwd);
        //判断密码和确认密码
        if(empty($data['pwd']) || empty($data['pwd_cc']))
        {
            return $this->error('1001','请求参数缺失');
        }
        //查找用户数据判断是否是用户的真实密码
        if(!$res['pwd'] == $pwd)
        {
            return $this->error('1003','密码不正确');
        }
        // 判断字符
        if($pwd_len < 8)
        {
            return $this->error('1005','最小8个字符');
        }
        $data = User::where('id',$id)->update(['pwd'=>$rpwd]);
        if($data)
        {
            return $this->success('1');
        }
    }

    //个人信息展示
    public function personal_is_show(Request $request)
    {
        //获取穿过来的数据
        $id = $request->route('id');
        if(empty($id))
        {
            return $this->error('1006','没有用户id');
        }
        $data = User::where('id',$id)->first()->toArray();
        $datas[] = $data;
        // print_r($datas);
        foreach ($datas as $key => $v) {
            // print_r($v['id']);die;
            $arr = [
                'id'=>$v['id'],
                'sex'=>$v['sex'],
                'name'=>$v['name'],
                'pwd'=>$v['pwd'],
                'email'=>$v['email'],
                'last_time'=>$v['last_time'],
                'image'=>$v['image'],
                'birth'=>date('Y-m-d',$v['birth']),
                'tel'=>$v['tel']
            ];
        }
        // print_r($arr);die;
        return $this->success($arr);
    }

    //图片
    public function image(Request $request)
    {

        $id = $request->post('id');
        $img = $request->file('image');
        // 获取后缀名
        $ext = $img->extension();
        // 新文件名
        $saveName =time().rand().".".$ext;
        $path = $img->store(date('Ymd'));
        $image = "http://www.shop.com/uploads/".$path;
        $data = User::where('id',$id)->update(['image'=>$image]);
        if($data)
        {
            echo 1;die;
        }
       
    }

    //修改查询个人信息
    // public function up_personal(Request $request)
    // {
    //     $id = $request->route('id');
    //     $data = User::where('id',$id)->first()->toArray();
    //     return $this->success($data);
    // }

    //修改用户信息
    //up_personal
    public function ups_personal(Request $request)
    {
        $data = $request->input();
        $id = $data['ids'];
         $rules=[
            'name'=>'required|alpha_dash|between:2,30',
            'email'=>'required|email',
        ];
        $message=[
            'name.required'=>'名称不能为空',
            'name.between'=>'名称最少两个汉子',
            'name.alpha_dash'=>'名称必须汉子',
            'email.required'=>'邮箱不能为空',
            'email.email'=>'邮箱格式不正确',
            // 'email.unique'=>'邮箱不能重复注册',
        ];
        $validator=Validator::make($data,$rules,$message);
        if(!$validator->passes()){
            //返回错误信息
            $validatorErrs = $validator->errors()->first();
            return $this->error('001',$validatorErrs);
        }
        $birth = $data['birth'];
        $births = strtotime($birth);
        // print_r($births);die;
        $arr = ['name'=>$data['name'],'email'=>$data['email'],'sex'=>$data['sex'],'birth'=>$births,'tel'=>$data['tel']];
        $res = User::where('id',$id)->update($arr);
        print_r($res);die;
        if($res)
        {
            return $this->success('修改成功');
        }
        else
        {
            return $this->error('1000','不能重复修改');
        }
    }

    //我的未读消息
    public function wo_unread_news(Request $request)
    {
        $id = $request->route('id');
        if(empty($id))
        {
            $this->error('1001','必须输入用户id');
        }
        // $res = Shop_admin_comment::select('userid','objectid','addtime','content','username','parentid')->where(['status'=>'0','userid'=>$id])->get();
        //     return $this->success($res);
        $res = Shop_admin_comment::with('Shop_admin_goods')->where(['userid'=>$id])->orderBy('status', 'asc')->get()->toArray();
        // dd($res);
        return $this->success($res);
        // print_r($res);die;
    }



    //我的已读消息
    public function wo_news(Request $request)
    {
        $id = $request->route('id');
        if(empty($id))
        {
            $this->error('1001','必须输入用户id');
        }
        $res = Shop_admin_comment::select('userid','objectid','addtime','content','username','parentid')->where(['status'=>'1','userid'=>$id])->get();
            return $this->success($res);
    }

    //我的钱包-我的积分
    public function integral(Request $request)
    {
        $id = $request->route('id');
        $data = User::select('name','id','integral')->where(['id'=>$id])->first()->toArray();
        return $this->success($data);
    }


    //未读的信息
    public function news(Request $request)
    {
       $id = $request->route('id');
       $res = Shop_admin_comment::where('id',$id)->update(['status'=>'1']);
       if($res)
       {
            return 1;die;
       }
       else
       {
            return 2;die;
       }
    }
}