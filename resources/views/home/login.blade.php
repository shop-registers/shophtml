<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>登录</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" href="/cheng_js/layui/layui/css/layui.css">

		<script src="https://ssl.captcha.qq.com/TCaptcha.js"></script>

		<link rel="stylesheet" href="/cheng_js/AmazeUI-2.4.2/assets/css/amazeui.css" />
		<link href="/cheng_js/css/dlstyle.css" rel="stylesheet" type="text/css">
	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home.html"><img alt="logo" src="/cheng_js/images/logobig.png" /></a>
		</div>

		<div class="login-banner">
			<div class="login-main">
				<div class="login-banner-bg"><span></span><img src="/cheng_js/images/big.jpg" /></div>
				<div class="login-box">

							<h3 class="title">登录商城</h3>

							<div class="clear"></div>
						
						<div class="login-form">
						  <form>
							   <div class="user-name">
								    <label for="user"><i class="am-icon-user"></i></label>
								    <input type="text" name="name" id="user" placeholder="用户账号">
                 </div>
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pwd" id="password" placeholder="请输入密码">
                 </div>
              </form>
           </div>
            
            <div class="login-links">
                <label for="remember-me"><input id="remember-me" type="checkbox">记住密码</label>
								<a href="/zhao_mi" class="am-fr">忘记密码</a>
								<a href="/register" class="zcnext am-fr am-btn-default">注册</a>
								<br />
            </div>
								<div class="am-cf">
									<!-- <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm"> -->
									<button id="TencentCaptcha"
								        data-appid="2068230639"
								        data-cbfn="callback" class="sub am-btn am-btn-primary am-btn-sm ">验证</button>
								</div>
						<div class="partner">		
								<h3>合作账号</h3>
							<div class="am-btn-group">
								<li><a href="#"><i class="am-icon-qq am-icon-sm"></i><span>QQ登录</span></a></li>
								<li><a href="#"><i class="am-icon-weibo am-icon-sm"></i><span>微博登录</span> </a></li>
								<li><a href="#"><i class="am-icon-weixin am-icon-sm"></i><span>微信登录</span> </a></li>
							</div>
						</div>	

				</div>
			</div>
		</div>


					<div class="footer ">
						<div class="footer-hd ">
							<p>
								<a href="# ">恒望科技</a>
								<b>|</b>
								<a href="# ">商城首页</a>
								<b>|</b>
								<a href="# ">支付宝</a>
								<b>|</b>
								<a href="# ">物流</a>
							</p>
						</div>
						<div class="footer-bd ">
							<p>
								<a href="# ">关于恒望</a>
								<a href="# ">合作伙伴</a>
								<a href="# ">联系我们</a>
								<a href="# ">网站地图</a>
								<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
							</p>
						</div>
					</div>
	</body>

</html>
<script src="/cheng_js/jquery.js"></script>
<script src="/layer/layer.js"></script>
<script type="text/javascript">
	
	

			window.callback = function(res){

			    // console.log(res)
			    // // res（用户主动关闭验证码）= {ret: 2, ticket: null}
			    // // res（验证成功） = {ret: 0, ticket: "String", randstr: "String"}
			    // if(res.ret === 0){
			    //     alert(res.ticket)   // 票据
			    // }
					var name = $("[name = 'name']").val();
					var pwd = $("[name = 'pwd']").val();
					$.ajax({
						url:"/logins",
						type:"post",
						data:{name:name,pwd:pwd},
						headers: {
			            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			        	},
			        	success:function(data)
			        	{
			        		//转换json数据
			        		var arr = JSON.parse(data);
			        		//验证规则
			        		if(arr.code == '1002')
			        		{
			        			layer.msg('参数缺失', {icon: 5});
			        			return false;
			        		}

			        		if(arr.code == '1003')
			        		{
			        			layer.msg('用户名、密码不正确！', {icon: 5});
			        			return false;
			        		}

			        		if(arr.code == '1003')
			        		{
			        			layer.msg('用户名、密码不正确！', {icon: 5});
			        			return false;
			        		}

			        		if(arr.code == '1004')
			        		{
			        			layer.msg('请激活您的账号！', {icon: 5});
			        			return false;
			        		}

			        		if(arr.code == '0')
			        		{
			        			
								var formdata = new FormData();
								var user_id = arr.data.user_id;
								var token = arr.data.token;
								formdata.append("user_id" , user_id);
								$.ajax({
									url:"/loginn",
									type:"post",
									data:{user_id:user_id,token:token},
									headers: {
						            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
						        	},
						        	success:function(data)
						        	{
						        	    // 获取用户信息
						        		// layer.alert('登陆成功', {icon: 1});
						        		$.ajax({
						        			url:"/api/birth",
						        			type:"post",
						        			data:{user_id:user_id},
						        			headers: {
								            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
								        	},
						        			success:function(data)
						        			{
						        				if(data == 1)
						        				{
						        					alert('登录成功');
						        				}
						        			}
						        		})
						        	}
								})
			        		}




			        	}
					})



			}

	
</script>
