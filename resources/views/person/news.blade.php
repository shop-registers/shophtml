<!DOCTYPE html>
<html>

	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=0">

		<title>我的消息</title>

		<link href="/cheng_js/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css">
		<link href="/cheng_js/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css">

		<link href="/cheng_js/css/personal.css" rel="stylesheet" type="text/css">
		<link href="/cheng_js/css/newstyle.css" rel="stylesheet" type="text/css">

		<script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
		<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>

		<script src="/cheng_js/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
		<script src="/cheng_js/AmazeUI-2.4.2/assets/js/amazeui.js"></script>

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

					<div class="user-news">

						<!--标题 -->
						<div class="am-cf am-padding">
							<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">我的消息</strong> / <small>News</small></div>
						</div>
						<hr/>

						<div class="am-tabs am-tabs-d2" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active"><a href="#tab1">未读消息</a></li>
								<!-- <li><a href="#tab2">已读信息</a></li> -->
								<!-- <li><a href="#tab3">交易信息</a></li> -->

							</ul>

							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active" id="tab1">

									<div class="news-day">
										<div class="goods-date" data-date="2015-12-21">
											<span><i class="month-lite"></i><i class="day-lite"></i>	<i class="date-desc">您有<i id="count" style="color: red;"></i>条未读信息 </i></span>
										</div>

										<!--消息 -->

				<div id="newss"></div>
					

									</div>
								</div>
								<div class="am-tab-panel am-fade" id="tab2">
									<!--消息 -->
									
										<div class="s-msg-item s-msg-temp i-msg-downup">
											<h6 class="s-msg-bar"><span class="s-name">订单已签收</span></h6>
											<div class="s-msg-content i-msg-downup-wrap">
												<div class="i-msg-downup-con">
													<a class="i-markRead" target="_blank" href="logistics.html">
													<div class="m-item">	
														<div class="item-pic">															
																	<img src="/cheng_js/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
														</div>
														<div class="item-info">
															您购买的美康粉黛醉美唇膏已签收，
															快递单号:373269427868
														</div>
																											
                                                    </div>	

													<p class="s-row s-main-content">
															查看详情 <i class="am-icon-angle-right"></i>
													</p>
													</a>
												</div>
											</div>
											<a class="i-btn-forkout" href="#"><i class="am-icon-close am-icon-fw"></i></a>
										</div>
								</div>

								<div class="am-tab-panel am-fade" id="tab3">
									<!--消息 -->
										<div class="s-msg-item s-msg-temp i-msg-downup">
											<h6 class="s-msg-bar"><span class="s-name">卖家已退款&nbsp;¥12.90元</span></h6>
											<div class="s-msg-content i-msg-downup-wrap">
												<div class="i-msg-downup-con">
													<a class="i-markRead" target="_blank" href="record.html">
													<div class="m-item">	
														<div class="item-pic">					
															<img src="/cheng_js/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
														</div>
														<div class="item-info">
															<p class="item-comment">您购买的美康粉黛醉美唇膏卖家已退款</p>
															<p class="item-time">2015-12-21&nbsp;17:38:29</p>
														</div>
																											
                                                    </div>	

													<p class="s-row s-main-content">
															<a href="record.html">钱款去向</a> <i class="am-icon-angle-right"></i>
													</p>
													</a>
												</div>
											</div>
											<a class="i-btn-forkout" href="#"><i class="am-icon-close am-icon-fw"></i></a>
										</div>
								</div>
							</div>
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
							<li> <a href="information.html">个人信息</a></li>
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
							<li class="active"> <a href="news.html">消息</a></li>
						</ul>
					</li>

				</ul>
				<input type="hidden" name="id" value="{{$user_id}}">
				<input type="hidden" name="token" value="{{$token}}">

			</aside>
		</div>

	</body>

</html>
<script src="/cheng_js/jquery.js"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
<script src="/layer/layer.js"></script>
<script type="text/javascript">
	$(this).ready(function(){
		var user_id = $("[name = 'id']").val();
		var token = $("[name = 'token']").val();
		// alert(user_id);return;
		$.ajax({
			url:"api/wo_unread_news/"+user_id,
			type:"get",
			headers:{'Content-Type':'application/json;charset=utf8','token':token},
			success:function(data)
			{
				$("#newss").empty();
				var div="";
				var len = "";
				$.each(data.data,function(key,val){ 
					// console.log(val.status);return;
					if(val.status == 0)
					{
						div+= "<div style='background:#18484;color:red;'>";
					}
					if(val.status == 1)
					{
						div+= "<div style='background:#18484;color:grey;'>";
					}
					div+="<div class='s-msg-item s-msg-temp i-msg-downup  dian' id='news' ids='"+val.id+"' >";
					div+="<h6 class='s-msg-bar'><span class='s-name'>"+val.shop_admin_goods.good_name+"</span></h6>";
					div+="<div class='s-msg-content i-msg-downup-wrap'>";
					div+="<div class='i-msg-downup-con'>";
					// div+="<a class='i-markRead' target='_blank'  href='#'";
					div+="<img src='"+val.shop_admin_goods.good_img+"' style='width:100px;height:100px' />";
					div+="<p class='s-main-content'>回复内容："+val.content+"</p>";
					// div+="</a>";
					div+="</div>";
					div+="</div>";
					div+="<a class='i-btn-forkout' href='#'><iclass='am-icon-closeam-icon-fw'></i></a>";  
					div+="</div>";
					div+="</div>";
					if(val.status == 0)
					{
						len+=key+1;
					}
				})
				$("#count").html(len.length);
				$("#newss").html(div);
				
			}
		})
	})

	$(document).on("click",".dian",function(){
		var ids = $(this).attr('ids');
		$.ajax({
			url:"/api/news/"+ids,
			type:"get",
			success:function(data)
			{
				if(data == 1)
				{
					history.go(0);
				}
				if(data == 2)
				{
					alert('消息已读！');
				}
			}

		})
	})
	
</script>