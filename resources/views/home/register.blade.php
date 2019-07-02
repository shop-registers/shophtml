<!DOCTYPE html>
<html>

	<head lang="en">
		<meta charset="UTF-8">
		<title>注册</title>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="renderer" content="webkit">
		<meta http-equiv="Cache-Control" content="no-siteapp" />

		<meta name="csrf-token" content="{{ csrf_token() }}">

		<link rel="stylesheet" href="/cheng_js/AmazeUI-2.4.2/assets/css/amazeui.min.css" />
		<link href="/cheng_js/css/dlstyle.css" rel="stylesheet" type="text/css">
		<script src="/cheng_js/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/cheng_js/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

	</head>

	<body>

		<div class="login-boxtitle">
			<a href="home/demo.html"><img alt="" src="/cheng_js/images/logobig.png" /></a>
		</div>

		<div class="res-banner">
			<div class="res-main">
				<div class="login-banner-bg"><span></span><img src="/cheng_js/images/big.jpg" /></div>
				<div class="login-box">

						<div class="am-tabs" id="doc-my-tabs">
							<ul class="am-tabs-nav am-nav am-nav-tabs am-nav-justify">
								<li class="am-active"><a href="">邮箱注册</a></li>
								<!-- <li><a href="">手机号注册</a></li> -->
							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-active">
									<form  action="\register" method="post">

							 <div class="user-email">
										<label for="email"><i class="am-icon-code-fork"></i></label>
										<input type="email" name="name" id="name" placeholder="请输入用户账号">
                 </div>		
										
							   <div class="user-email">
										<label for="email"><i class="am-icon-envelope-o"></i></label>
										<input type="email" name="email" id="email" placeholder="请输入邮箱账号">
                 </div>										
                 <div class="user-pass">
								    <label for="password"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pwd" id="password" placeholder="设置密码">
                 </div>										
                 <div class="user-pass">
								    <label for="passwordRepeat"><i class="am-icon-lock"></i></label>
								    <input type="password" name="pwd_cc" id="passwordRepeat" placeholder="确认密码">
                 </div>	
                 
                
								 </form>
                 
								 <div class="login-links">
										<label for="reader-me">
											<input id="reader-me" type="checkbox"> 点击表示您同意商城《服务协议》
										</label>
							  	</div>
										<div class="am-cf">
											<input type="submit" value="注册" class="am-btn am-btn-primary am-btn-sm am-fl sub">
											<br><br><br>
											<a href="/login"><input type="submit" value="登录" class="am-btn am-btn-primary am-btn-sm am-fl"></a>
											
										</div>

										


								</div>

								<script>
									$(function() {
									    $('#doc-my-tabs').tabs();
									  })
								</script>

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
  <script src="/layer/layer.js"></script>
<script type="text/javascript"></script>
<script>
	$(document).on("click",".sub",function(){
		//获取表单数据
		var name = $("[name='name']").val();
		var email = $("[name='email']").val();
		var pwd = $("[name='pwd']").val();
		var pwd_cc = $("[name='pwd_cc']").val();
		var app = $("input[type='checkbox']:checked").length;

		if(!app == 1)
		{
			layer.msg('请签订协议', {icon: 5});
		}
		//发送post请求 
		$.ajax({
			url:"/add_register",
			type:"post",
			data:{name:name,email:email,pwd:pwd,pwd_cc:pwd_cc},
			headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        	},
			success:function(data)
			{
				//获取接口数据转换json数据
				obj = JSON.parse(data);


				// 验证信息
				if(obj.msg == "名字不能为空")
				{
					layer.msg('名字不能为空');
				}
				
				if(obj.msg == "邮箱不能重复注册")
				{
					layer.msg('邮箱不能重复注册');
				}

				if(obj.msg == "名字不能重复")
				{
					layer.msg('名字不能重复');
				}

				if(obj.code == 0)
				{
					layer.alert('添加成功', {icon: 1});
				}
				
			}

		})
	})
</script>