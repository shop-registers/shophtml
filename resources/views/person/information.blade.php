<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>个人资料</title>

		<link href="/cheng_js/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/cheng_js/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/cheng_js/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/cheng_js/css/infstyle.css" rel="stylesheet" type="text/css">
		<script src="/cheng_js/AmazeUI-2.4.2/assets/js/jquery.min.js" type="text/javascript"></script>
		<script src="/cheng_js/AmazeUI-2.4.2/assets/js/amazeui.js" type="text/javascript"></script>
		<meta name="csrf-token" content="{{ csrf_token() }}">







	</head>

	<body>
		<!--头 -->
		<header>
			<article>
				<div class="mt-logo">
					<!--顶部导航条 -->
					<div class="am-container header">
						<ul class="message-l">
							<div class="topMessage">
								<div class="menu-hd">
									<a href="#" target="_top" class="h">亲，请登录</a>
									<a href="#" target="_top">免费注册</a>
								</div>
							</div>
						</ul>
						<ul class="message-r">
							<div class="topMessage home">
								<div class="menu-hd"><a href="#" target="_top" class="h">商城首页</a></div>
							</div>
							<div class="topMessage my-shangcheng">
								<div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
							</div>
							<div class="topMessage mini-cart">
								<div class="menu-hd"><a id="mc-menu-hd" href="#" target="_top"><i class="am-icon-shopping-cart  am-icon-fw"></i><span>购物车</span><strong id="J_MiniCartNum" class="h">0</strong></a></div>
							</div>
							<div class="topMessage favorite">
								<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
						</ul>
						</div>

						<!--悬浮搜索框-->

						<div class="nav white">
							<div class="logoBig">
								<li><img src="/cheng_js/images/logobig.png" /></li>
							</div>

							<div class="search-bar pr">
								<a name="index_none_header_sysc" href="#"></a>
								<form>
									<input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
									<input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
								</form>
							</div>
						</div>

						<div class="clear"></div>
					</div>
				</div>
			</article>
		</header>
            <div class="nav-table">
					   <div class="long-title"><span class="all-goods">全部分类</span></div>
					   <div class="nav-cont">
							<ul>
								<li class="index"><a href="#">首页</a></li>
                                <li class="qc"><a href="#">闪购</a></li>
                                <li class="qc"><a href="#">限时抢</a></li>
                                <li class="qc"><a href="#">团购</a></li>
                                <li class="qc last"><a href="#">大包装</a></li>
							</ul>
						    <div class="nav-extra">
						    	<i class="am-icon-user-secret am-icon-md nav-user"></i><b></b>我的福利
						    	<i class="am-icon-angle-right" style="padding-left: 10px;"></i>
						    </div>
						</div>
			</div>
			<b class="line"></b>
		<div class="center">
			<div class="col-main">
				<div class="main-wrap">

					<div class="user-info">
						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">个人资料</strong> / <small>Personal&nbsp;information</small></div>
						</div>
						<hr/>

						
						<form method="post" enctype="multipart/form-data">
						{{ csrf_field() }}
						<!--头像 -->
						<div class="user-infoPic">

							<div class="filePic" >
								<input type="file" name="image" onchange="postData(this)" class="inputPic" allowexts="gif,jpeg,jpg,png,bmp" accept="image/*">
								<b>
								<img class="am-circle am-img-thumbnail" id="img"  src="" alt="" /></b>

							</div>

							<p class="am-form-help">头像</p>

							<div class="info-m">
								<div><b>用户名：<i id="user"></i></b></div>
								<div class="u-level">
									<span class="rank r2">
							             <s class="vip1"></s>邮箱：	<i id="email"></i>
						            </span>
								</div>
						
							</div>
						</div>
					</form>
					



						<!--个人信息 -->
						<div class="info-main">
							<form class="am-form am-form-horizontal" method="post" action="/person_upd">


								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">用户名</label>
									<div class="am-form-content">
										<input id="user-phone user_name" name="name" placeholder="username" value="" type="tel">
									</div>
								</div>

								<div class="am-form-group">
									<label for="user-email" class="am-form-label">电子邮件</label>
									<div class="am-form-content">
										<input id="user-email user_email" name="email" placeholder="Email" value="" type="email">

									</div>
								</div>
							
								

								<div class="am-form-group">
									<label class="am-form-label">性别</label>
									
									<div class="am-form-content sex">
										
										<label class="am-radio-inline">
											<input type="radio" class="sex" name="sex" value="1"   data-am-ucheck> 男
										</label>
										<label class="am-radio-inline">
											<input type="radio" class="sex" name="sex" value="0"  data-am-ucheck> 女
										</label>
										<label class="am-radio-inline">
											<input type="radio" class="sex" name="sex" value="2" data-am-ucheck> 保密
										</label>
									</div>
								</div>
								
								
								


								<div class="am-form-group">

									<label for="user-birth" class="am-form-label">生日</label>
									<div class="am-form-content birth">
										<div class="birth-select">
											<input type="date" id="birth" name="birth">
										</div>
										<!-- <div class="birth-select2">
											<select data-am-selected>
												<option value="a">12</option>
												<option value="b">8</option>
											</select>
											<em>月</em></div>
										<div class="birth-select2">
											<select data-am-selected>
												<option value="a">21</option>
												<option value="b">23</option>
											</select>
											<em>日</em></div> -->
									</div>
							
								</div>
								<div class="am-form-group">
									<label for="user-phone" class="am-form-label">电话</label>
									<div class="am-form-content">
										<input id="user-phone user_tel" name="tel" placeholder="tel" type="tel">

									</div>
								</div>
								
								<div class="am-form-group address">
									<label for="user-address" class="am-form-label">收货地址</label>
									<div class="am-form-content address">
										<a href="address.html">
											<p class="new-mu_l2cw">
												<span class="province">湖北</span>省
												<span class="city">武汉</span>市
												<span class="dist">洪山</span>区
												<span class="street">雄楚大道666号(中南财经政法大学)</span>
												<span class="am-icon-angle-right"></span>
											</p>
										</a>

									</div>
								</div>
								<div class="am-form-group safety">
									<label for="user-safety" class="am-form-label">账号安全</label>
									<div class="am-form-content safety">
										<a href="safety.html">

											<span class="am-icon-angle-right"></span>

										</a>

									</div>
								</div>
								<div class="info-btn">
									<div class="am-btn am-btn-danger sub">保存修改</div>
								</div>

							</form>
						</div>

					</div>

				</div>
				<!--底部-->
				<div class="footer">
					<div class="footer-hd">
						<p>
							<a href="#">恒望科技</a>
							<b>|</b>
							<a href="#">商城首页</a>
							<b>|</b>
							<a href="#">支付宝</a>
							<b>|</b>
							<a href="#">物流</a>
						</p>
					</div>
					<div class="footer-bd">
						<p>
							<a href="#">关于恒望</a>
							<a href="#">合作伙伴</a>
							<a href="#">联系我们</a>
							<a href="#">网站地图</a>
							<em>© 2015-2025 Hengwang.com 版权所有. 更多模板 <a href="http://www.cssmoban.com/" target="_blank" title="模板之家">模板之家</a> - Collect from <a href="http://www.cssmoban.com/" title="网页模板" target="_blank">网页模板</a></em>
						</p>
					</div>
				</div>
			</div>

			<aside class="menu">
				<ul>
					<li class="person">
						<a href="index.html">个人中心</a>
					</li>
					<li class="person">
						<a href="#">个人资料</a>
						<ul>
							<li class="active"> <a href="information.html">个人信息</a></li>
							<li> <a href="safety.html">安全设置</a></li>
							<li> <a href="address.html">收货地址</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的交易</a>
						<ul>
							<li><a href="order.html">订单管理</a></li>
							<li> <a href="change.html">退款售后</a></li>
						</ul>
					</li>
					<li class="person">
						<a href="#">我的资产</a>
						<ul>
							<li> <a href="coupon.html">优惠券 </a></li>
							<li> <a href="bonus.html">红包</a></li>
							<li> <a href="bill.html">账单明细</a></li>
						</ul>
					</li>

					<li class="person">
						<a href="#">我的小窝</a>
						<ul>
							<li> <a href="collection.html">收藏</a></li>
							<li> <a href="foot.html">足迹</a></li>
							<li> <a href="comment.html">评价</a></li>
							<li> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>

			</aside>
			<input type="hidden" name="id" value="{{$user_id}}">
			<input type="hidden" name="ids" value="{{$user_id}}">
			<input type="hidden" name="idss" value="{{$user_id}}">
			<input type="hidden" name="token" value="{{$token}}">
		</div>


		<script src="/cheng_js/jquery.js"></script>
		<script src="/layer/layer.js"></script>
		<script type="text/javascript">


		 $.ajaxSetup({
		        headers: { 'X-CSRF-TOKEN' : '{{ csrf_token() }}' }
		    });

// 格式化日期，如月、日、时、分、秒保证为2位数
function formatNumber (n) {
    n = n.toString()
    return n[1] ? n : '0' + n;
}
// 参数number为毫秒时间戳，format为需要转换成的日期格式
function formatTime (number, format) {
    let time = new Date(number)
    let newArr = []
    let formatArr = ['Y', 'M', 'D', 'h', 'm', 's']
    newArr.push(time.getFullYear())
    newArr.push(formatNumber(time.getMonth() + 1))
    newArr.push(formatNumber(time.getDate()))

    newArr.push(formatNumber(time.getHours()))
    newArr.push(formatNumber(time.getMinutes()))
    newArr.push(formatNumber(time.getSeconds()))

    for (let i in newArr) {
        format = format.replace(formatArr[i], newArr[i])
    }
    return format;
}




		$(document).ready(function(){
			var id = $("[name='id']").val();
			var name = $("[name='name']").val();
			
			var token = $("[name='token']").val();
			$.ajax({
				url:"/api/personal_is_show/"+id,
				type:"get",
				headers:{'Content-Type':'application/json;charset=utf8','token':token},
				success:function(data)
				{

					// 图片默认展示
					if(data.data.image == null)
					{
						var res = "/cheng_js/images/getAvatar.do.jpg";
						$("b img").attr("src",res);
					}

					$("b img").attr("src",data.data.image);
					// 页面替换
					var user = document.getElementById("user").innerHTML="<i>"+data.data.name+"</i>";
					var email = document.getElementById("email").innerHTML="<i>"+data.data.email+"</i>";

					$.each($(".sex"),function(index,value){
						if ($(value).val() == data.data.sex) {
							$(value).prop('checked',true);							
						}
					});
					
					
					// 替换数据
					var id = "[name = 'id']";
					checkname(id,data.data.id);
					var name = "[name = 'name']";
					checkname(name,data.data.name);
					var email = "[name = 'email']";
					checkname(email,data.data.email);
					// var birth = "[name = 'birth']";
					// checkname(birth,data.data.birth);
					var tel = "[name = 'tel']";
					checkname(tel,data.data.tel);
					// alert(data.data.birth);return;
					// var ress = formatTime(data.data.birth*1000, 'Y-M-D');
					// alert(ress);return;
					$("#birth").val(data.data.birth);
				}
			})
		})

		//修改数据
		$(document).on("click",".sub",function(){
			// 获取数据进行修改
			var token = $("[name='token']").val();
			var ids = $("[name = 'ids']").val();
			var name = $("[name = 'name']").val();
			var email = $("[name = 'email']").val();
			var sex = $("[name = 'sex']").val();
			var birth = $("[name = 'birth']").val();
			var tel = $("[name = 'tel']").val();
			$.ajax({
				url:"/api/ups_personal",
				type:"get",
				data:{name:name,email:email,sex:sex,birth:birth,tel:tel,ids:ids},
				headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
	            'Content-Type':'application/json;charset=utf8','token':token
	        	},
	        	// headers:{},
				success:function(data)
				{
					// var obj JSON.pase(data);
					// console.log(data.code);
					if(data.msg == "名称不能为空")
					{
						layer.msg('名称不能为空');
						return false;
					}

					if(data.msg == "名称最少两个汉子")
					{
						layer.msg('名称最少两个汉子');
						return false;
					}

					if(data.msg == "名称必须汉子")
					{
						layer.msg('名称必须汉子');
						return false;
					}



					if(data.msg == "邮箱格式不正确")
					{
						layer.msg('邮箱格式不正确');
						return false;
					}

					if(data.msg == "邮箱不能为空")
					{
						layer.msg('邮箱不能为空');
						return false;
					}

					if(data == 0)
					{
						alert('不能重复提交');
						return;
						// history.go(0);
						// window.location.href="http://www.shop.com/person_show";
						// layer.alert('修改成功', {icon: 1});
					}

					if(data == 1)
					{
						alert('修改成功');
						history.go(0);
						// window.location.href="http://www.shop.com/person_show";
						// layer.alert('修改成功', {icon: 1});
					}

					if(data.code == 1000)
					{
						alert('不能重复提交');
						return false;
					}


				}
			})
		})

		//替换数据
	    function checkname(name,data)
		{
			let input = $(name);
			let content = input.val();
			content = content.replace('',data);
			input.val(content);
			
		}


		//ajax 图片替换
		function postData(obj)
		{
			var id = $("[name = 'idss']").val();
			var formdata = new FormData();
			formdata.append("image" , $(obj)[0].files[0]);
			formdata.append("id" , id);
			 $.ajax({
			      type : 'post',
			      url : '/api/image', //接口
			      data :formdata,
			      headers: {
	            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	        	},
			      cache : false,
			      processData : false, // 不处理发送的数据，因为data值是Formdata对象，不需要对数据做处理
			      contentType : false, // 不设置Content-type请求头
			      success : function(response){
			        // console.log(response);
			        if(response == 1)
			        {
			        	alert('成功替换');
			        }
			        
			      },
			      error : function(){ }
			    });
		

		}
		

</script>



	</body>

</html>
