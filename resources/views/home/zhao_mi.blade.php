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

	<style type="text/css">
		/*body {background-color: red}
		p {margin-left: 20px}*/
		.bb {margin-left: -550px;}
	</style>

	<body>

				<div class="bb">
				<div class="login-main">
					<div class="login-box">

								<h3 class="title">找回密码</h3>

								<div class="clear"></div>
							
							<div class="login-form">
							  <form>
								   <div class="user-name">
									    <label for="user"><i class="am-icon-user"></i></label>
									    <input type="text" name="name" id="user" placeholder="用户账号：">
	                 </div>
	                
	              </form>
	           </div>

				<a href="/login" class="zcnext am-fr am-btn-default">返回</a>
				
				<div class="am-cf">
					<button id="TencentCaptcha"
				        data-appid="2068230639"
				        data-cbfn="callback" class="sub am-btn am-btn-primary am-btn-sm ">验证</button>
				</div>
						

				</div>
			</div>

			</div>

	</body>

</html>
<script src="/cheng_js/jquery.js"></script>
<script src="/layer/layer.js"></script>
<script type="text/javascript">
		$(document).on("click",".sub",function(){
			var name = $("[name = 'name']").val();
			$.ajax({
				url:"/api/reset_pwd",
				type:"post",
				data:{name:name},
				headers: {
			     'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			    },
				success:function(data)
				{
					var arr = JSON.parse(data);
					if(arr.code == '1001')
					{
						layer.msg('请求参数缺失', {icon: 5});
						return false;
					}

					if(arr.code == '1002')
					{
						layer.msg('没有改账号', {icon: 5});
						return false;
					}

					if(arr.code == '0')
					{
						layer.alert('邮箱发送成功', {icon: 1});
					}



				}
			})
		})
</script>
