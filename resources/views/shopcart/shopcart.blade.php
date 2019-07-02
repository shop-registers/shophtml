<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>购物车页面</title>

		<link href="static/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="static/basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="static/css/cartstyle.css" rel="stylesheet" type="text/css" />
		<link href="static/css/optstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="static/js/jquery.js"></script>

	</head>

	<body>

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
					<div class="menu-hd">
						<a href="#" target="_top">
						<i class="am-icon-heart am-icon-fw"></i>
						<span>收藏夹</span>
						</a>
					</div>
			</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="../images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="../images/logobig.png" /></li>
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

			<!--购物车 -->
			<div class="concent">
				<div id="cartTable">
					<div class="cart-table-th">
						<div class="wp">
							<div class="th th-chk">
								<div id="J_SelectAll1" class="select-all J_SelectAll">

								</div>
							</div>
							<div class="th th-item">
								<div class="td-inner">商品信息</div>
							</div>
							<div class="th th-price">
								<div class="td-inner">单价</div>
							</div>
							<div class="th th-amount">
								<div class="td-inner">数量</div>
							</div>
							<div class="th th-sum">
								<div class="td-inner">金额</div>
							</div>
							<div class="th th-op">
								<div class="td-inner">操作</div>
							</div>
						</div>
					</div>
					<div class="clear"></div>
					@foreach($data as $key=>$sort)
                     <tr class="item-list">
						<div class="bundle  bundle-last ">
						    <input type="hidden" value="{{$sort->good_id}}"  class="good_id" />
							<div class="bundle-hd">
								<div class="bd-promos">
									<div class="bd-has-promo">已享优惠:<span class="bd-has-promo-content">省￥19.50</span>&nbsp;&nbsp;</div>
									<div class="act-promo">
										<a href="#" target="_blank">第二支半价，第三支免费<span class="gt">&gt;&gt;</span></a>
									</div>
									<span class="list-change theme-login">编辑</span>
								</div>
							</div>
							<div class="clear"></div>
							
							<div class="bundle-main">
								<ul class="item-content clearfix">
									<li class="td td-chk">
										<div class="cart-checkbox ">
											<input class="check" type="checkbox" value="">
											<label for="J_CheckBox_170769542747"></label>
										</div>
									</li>
									<li class="td td-item">
										<div class="item-pic">
											<a href="#" target="_blank" data-title="美康粉黛醉美东方唇膏口红正品 持久保湿滋润防水不掉色护唇彩妆" class="J_MakePoint" data-point="tbcart.8.12">
												<img src="static/images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg">
                                                <!-- <img src="{{$sort->img_src}}" class="itempic J_ItemImg"> -->
												</a>
										</div>
										<div class="item-info">
											<div class="item-basic-info">
												<a href="#" target="_blank" title="{{$sort->good_name}}" class="item-title J_MakePoint" data-point="tbcart.8.11">{{ $sort -> good_name  }}</a>
											</div>
										</div>
									</li>
									<li class="td td-info">
										<div class="item-props item-props-can">
											<span class="sku-line">颜色：10#蜜橘色</span>
											<span class="sku-line">包装：两支手袋装（送彩带）</span>
											<span tabindex="0" class="btn-edit-sku theme-login">修改</span>
											<i class="theme-login am-icon-sort-desc"></i>
										</div>
									</li>
									<li class="td td-price">
										<div class="item-price price-promo-promo">
											<div class="price-content">
												<div class="price-line">
													<em class="price-original">{{$sort->good_old_price}}</em>
												</div>
												<div class="price-line">
													<em class="J_Price UnitPrice" tabindex="0">{{$sort->good_price}}</em>
												</div>
											</div>
										</div>
									</li>
									<li class="td td-amount">
										<div class="amount-wrapper ">
											<div class="item-amount ">
												<div class="sl">
													<input class="am-btn car_add_min"  name="" type="button" value="-" />
													<input class="text_box" type="text" value="{{$sort->goods_number}}" style="width:30px;" />
													<input class="am-btn car_add_min" name="" type="button" value="+" />
												</div>
											</div>
										</div>
									</li>
									<li class="td td-sum" id="price_row">
										<div class="td-inner">
											<em tabindex="0" class="J_ItemSum number price" id="price" value="{{$sort->goods_number*$sort->good_price}}">{{$sort->goods_number*$sort->good_price}}</em>
										</div>
									</li>
									<li class="td td-op">
										<div class="td-inner">
											<a title="移入收藏夹" class="btn-fav" href="#">
                  移入收藏夹</a>
											<a href="car_delete?good_id={{$sort->good_id}}" data-point-url="#" class="delete">
                  删除</a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</tr>
					@endforeach
					<div class="clear"></div>
				</div>
				<div class="clear"></div>

				<div class="float-bar-wrapper">
					<div id="J_SelectAll2" class="select-all J_SelectAll">
						<div class="cart-checkbox">
							<input class="check-all" id="J_SelectAllCbx2"  name="select-all" value="true" type="checkbox">
							<label for="J_SelectAllCbx2"></label>
						</div>
						<span>全选</span>
					</div>
					<div class="operations">
						<a href="#" hidefocus="true" class="deleteAll">删除</a>
						<a href="#" hidefocus="true" class="J_BatchFav">移入收藏夹</a>
					</div>
					<div class="float-bar-right">
						<div class="amount-sum">
							<span class="txt">已选商品</span>
							<em id="J_SelectedItemsCount">0</em><span class="txt">件</span>
							<div class="arrow-box">
								<span class="selected-items-arrow"></span>
								<span class="arrow"></span>
							</div>
						</div>
						<div class="price-sum">
							<span class="txt">合计:</span>
							<strong class="price">¥<em id="J_Total">0:00</em></strong>
						</div>
						<div class="btn-area">
							<a href="#" id="J_Go" class="submit-btn submit-btn-disabled" aria-label="请注意如果没有选择宝贝，将无法结算">
								<span>结&nbsp;算</span></a>
						</div>
					</div>

				</div>

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

			<!--操作页面-->

			<div class="theme-popover-mask"></div>

			<!-- <div class="theme-popover">
				<div class="theme-span"></div>
				<div class="theme-poptit h-title">
					<a href="javascript:;" title="关闭" class="close">×</a>
				</div>
				<div class="theme-popbod dform">
					<form class="theme-signin" name="loginform" action="" method="post">

						<div class="theme-signin-left">

							<li class="theme-options">
								<div class="cart-title">颜色：</div>
								<ul>
									<li class="sku-line selected">12#川南玛瑙<i></i></li>
									<li class="sku-line">10#蜜橘色+17#樱花粉<i></i></li>
								</ul>
							</li>
							<li class="theme-options">
								<div class="cart-title">包装：</div>
								<ul>
									<li class="sku-line selected">包装：裸装<i></i></li>
									<li class="sku-line">两支手袋装（送彩带）<i></i></li>
								</ul>
							</li>
							<div class="theme-options">
								<div class="cart-title number">数量</div>
								<dd>
									<input class="min am-btn am-btn-default" name="" type="button" value="-" />
									<input class="text_box" name="" type="text" value="1" style="width:30px;" />
									<input class="add am-btn am-btn-default" name="" type="button" value="+" />
									<span  class="tb-hidden">库存<span class="stock">1000</span>件</span>
								</dd>

							</div>
							<div class="clear"></div>
							<div class="btn-op">
								<div class="btn am-btn am-btn-warning">确认</div>
								<div class="btn close am-btn am-btn-warning">取消</div>
							</div>

						</div>
						<div class="theme-signin-right">
							<div class="img-info">
								<img src="../images/kouhong.jpg_80x80.jpg" />
							</div>
							<div class="text-info">
								<span class="J_Price price-now">¥39.00</span>
								<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
							</div>
						</div>

					</form>
				</div>
			</div> -->
		<!--引导 -->
		<div class="navCir">
			<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
			<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
			<li class="active"><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
			<li><a href="static/person/index.html"><i class="am-icon-user"></i>我的</a></li>					
		</div>
	</body>

</html>

<script>
arr_price=new Array();
arr_good_id=new Array();
// 修改购物车中商品的数量
$(".car_add_min").click(function()
{
	var type=$(this).val();
	if(type=='-')   //点击减号
	{ 
        var num=parseInt($(this).next().val());    //获取当前商品数量  转换成整型
		num=num-1;   //点击一次jian一
		if(num=='0') //商品数目最小值为1
		{
           alert("宝贝不能再减了！！");die
		}
	}else if(type=='+'){   //点加减号 
        var num=parseInt($(this).prev().val());    //获取当前商品数量  转换成整型
		num=num+1;         //点击一次加一
	}else{
		alert("请求错误");die;
	}
	//获取商品id   
	var good_id=$(this).parents('.bundle-main').siblings(".good_id").val();
    //ajax提交数据修改数据库
    $.ajax({
                type: "Post", //方法
                url: "car_update", //url
                 //下面很多条数据，仔细看  有冒号和逗号，分得清
                data: { _token : '<?php echo csrf_token()?>',good_id:good_id,num:num},  //数据
                dataType: "json", //数据格式
                success: function (data) {
                    if (data.code=="1") {
                    	//修改成功
                    	// $(".text_box").val(num);    //替换商品数量
                    	// // $(".price").val(price);    //替换商品小计
                    	window.location.reload()//刷新当前页面.
                    }
                }
          })
})


//单选 点击多选框  选择商品
$(".check").click(function()
{
	var isChecked = $(this).prop("checked");
	if(isChecked==true)
	{
		var price=parseFloat($(this).parents('li').siblings('#price_row').children().children().text());
        var sum=parseFloat($("#J_Total").text());
        var num=parseFloat($("#J_SelectedItemsCount").text());
        var good_id=$(this).parents('.bundle-main').siblings(".good_id").val();
        arr_good_id.push(good_id);
        arr_price.push(price);   //追加商品小计
        sum+=price;
        num+=1;  
	}
	else if(isChecked==false){
		var price=parseFloat($(this).parents('li').siblings('#price_row').children().children().text());
        var sum=parseFloat($("#J_Total").text());
        var num=parseFloat($("#J_SelectedItemsCount").text());
        var good_id=$(this).parents('.bundle-main').siblings(".good_id").val();
        arr_good_id.pop(good_id);
        arr_price.pop(price);   //删除商品小计
        sum-=price;
        num-=1;
        if(num<=0)
        {
           num=0;
           sum=0;
        }
	}
	//替换新数据
	$("#J_Total").text(sum);
    $("#J_SelectedItemsCount").text(num);
	
}) 

//全选 
$(".check-all").click(function(){ 
	// console.log(this); 
	if(this.checked==true){
	    $(".check").prop("checked",true); 
	}else{ 
		$(".check").prop("checked",false);
	} 
	// allPrice(); 
	// checkNum(); 
});

//结算
$("#J_Go").click(function(){
    var allPrice=$("#J_Total").text();
    if(allPrice=='0:00' || allPrice=='0')
    {
        alert("还没有选择宝贝，无法结算");die
    }

    $.ajax({ 
                url: "{{ url('add_order') }}" , 
                type: 'POST',
                data: { _token : '<?php echo csrf_token()?>',allPrice:allPrice,arr_price:arr_price,arr_good_id:arr_good_id},
                dataType: 'json', 
                success: function(data){ 
                    console.log(data);
                    
                }, 
                error: function(xhr, type){ 
                    alert('Ajax error!') 
                } 
            });

})

</script>