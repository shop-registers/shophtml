<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0 ,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>结算页面</title>

		<link href="AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />

		<link href="basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link href="css/cartstyle.css" rel="stylesheet" type="text/css" />

		<link href="css/jsstyle.css" rel="stylesheet" type="text/css" />

		<script type="text/javascript" src="js/address.js"></script>

		<!-- 弹框 -->
		<script  src="js/alert.js"></script>
		<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
		<script src="https://cdn.staticfile.org/vue/2.4.2/vue.min.js"></script>
	</head>
<script type="text/javascript">
	$(document).on('click','.del_address',function(){
		new Vue({
	  el: '.del_address',
	  
	  mounted () {
	    axios.get('http://localhost/cffirm/show_qian/public/api/del_address')
	       .then(function (response) {
		    console.log(response);
		  })
	      .catch(function (error) { // 请求失败处理
	        console.log(error);
	      });
	  }
		})	
	})
	
</script>
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
					<div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
			</ul>
			</div>

			<!--悬浮搜索框-->

			<div class="nav white">
				<div class="logo"><img src="images/logo.png" /></div>
				<div class="logoBig">
					<li><img src="images/logobig.png" /></li>
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
			<div class="concent">
				<!--地址 -->
				<div class="paycont">
					<div class="address">
						<h3>确认收货地址 </h3>
						<div class="control">
							<div class="tc-btn createAddr theme-login am-btn am-btn-danger">使用新地址</div>
						</div>
						<div class="clear"></div>
						<ul>
							<div class="per-border"></div>
							@foreach($data['address'] as $v)
							<li class="user-addresslist {{$v['default']==1 ? 'defaultAddr' : ''}}" id="{{$v['address_id']}}">
								<div class="address-left">
									<div class="user DefaultAddr">

										<span class="buy-address-detail">   
                   <span class="buy-user">{{$v['address_name']}} </span>
										<span class="buy-phone">{{$v['address_tel']}}</span>
										</span>
									</div>
									<div class="default-address DefaultAddr">
										<span class="buy-line-title buy-line-title-type">收货地址：</span>
										<span class="buy--address-detail">
										<span class="street">{{$v['address_detailed']}}</span>
										</span>

										</span>
									</div>
									<ins class="deftip hidden">默认地址</ins>
								</div>
								<div class="address-right">
									<span class="am-icon-angle-right am-icon-lg"></span>
								</div>
								<div class="clear"></div>

								<div class="new-addr-btn">
									@if($v['default']==0)
									
									
									@else
									<span>默认地址</span>
									<span class="new-addr-bar">|</span>
									@endif
									<a href="javascript:void(0);" class="del_address">删除</a>
								</div>

							</li>
							<div class="per-border"></div>
							@endforeach
						</ul>

						<div class="clear"></div>
					</div>

					<!--支付方式-->
					<div class="logistics">
						<h3>选择支付方式</h3>
						<ul class="pay-list">
							<li class="pay card"><img src="images/wangyin.jpg" />银联<span></span></li>
							<li class="pay qq"><img src="images/weizhifu.jpg" />微信<span></span></li>
							<li class="pay taobao"><img src="images/zhifubao.jpg" />支付宝<span></span></li>
						</ul>
					</div>
					<div class="clear"></div>

					<!--订单 -->
					<div class="concent">
						<div id="payTable">
							<h3>确认订单信息</h3>
							<div class="cart-table-th">
								<div class="wp">

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
									<div class="th th-oplist">
										<div class="td-inner">配送方式</div>
									</div>

								</div>
							</div>
							<div class="clear"></div>
							<input type="hidden" name="order_sn" id="order_sn" value="{{$data['order_sn']}}">
							@foreach($data['orderinfo']['order'] as $v)
							@foreach($v as $item)
							<tr class="item-list" >
								<div class="bundle  bundle-last">

									<div class="bundle-main" asdf="{{$item['child_order_sn']}}">
										<ul class="item-content clearfix">
											<div class="pay-phone">
												<li class="td td-item">
													<div class="item-pic">
														<a href="#" class="J_MakePoint">
															<img src="images/kouhong.jpg_80x80.jpg" class="itempic J_ItemImg"></a>
													</div>
													<div class="item-info">
														<div class="item-basic-info">
															<a href="#" class="item-title J_MakePoint" data-point="tbcart.8.11">{{$item['good_name']}}</a>
														</div>
													</div>
												</li>
												<li class="td td-info">
													<div class="item-props">
														<span class="sku-line">{{$item['sku_desc']}}</span>
													</div>
												</li>
												<li class="td td-price">
													<div class="item-price price-promo-promo">
														<div class="price-content">
															<em class="J_Price price-now" id="once_total">{{$item['order_money']}}</em>
														</div>
													</div>
												</li>
											</div>
											<li class="td td-amount">
												<div class="amount-wrapper ">
													<div class="item-amount ">
														<span class="phone-title">购买数量</span>
														<div class="sl">
															<input class="min am-btn" name="" type="button" value="-" id="min" />
															<input class="text_box" name="" type="text" id="num" value="{{$item['product_cnt']}}" style="width:30px;" />
															<input class="add am-btn" name="" type="button" value="+" id="add" />
														</div>
													</div>
												</div>
											</li>
											<li class="td td-sum">
												<div class="td-inner">
													<em tabindex="0" class="J_ItemSum number" id="total">{{$item['payment_money']}}</em>
												</div>
											</li>
											<li class="td td-oplist">
												<div class="td-inner">
													<span class="phone-title">配送方式</span>
													<div class="pay-logis">
														快递
														@if($item['shipping_money']==0)
														<b class="sys_item_freprice">免运费</b>
														@else
														<b class="sys_item_freprice">{{$item['shipping_money']}}</b>元
														@endif
													</div>
												</div>
											</li>

										</ul>
										<div class="clear"></div>

									</div>
							</tr>
							<div class="clear"></div>
							</div>
							@endforeach
							@endforeach
							</tr>
							</div>
							<script type="text/javascript">
								$(document).on('click','#add',function(){
									num=$('#num').val();
									total=$('#once_total').html();
									total_price=$('#J_ActualFee').html();
									$('#total').html(total*num+'.00');
									$('#total_price').html(total*num);
									$('#J_ActualFee').html(Number(total_price)+Number(total));
								})
								$(document).on('click','#min',function(){
									num=$('#num').val();
									total=$('#once_total').html();
									total_price=$('#J_ActualFee').html();
									$('#total').html(total*num+'.00');
									$('#total_price').html(total*num);
									$('#J_ActualFee').html(Number(total_price)-total);
								})
								$(document).on('click','.user-addresslist',function(){
									name=$(this).find('.buy-user').html();
									tel=$(this).find('.buy-phone').html();
									street=$(this).find('.street').html();
									$('#holyshit268').find('.buy--address-detail').html(street);
									$('#holyshit268').find('.buy-user').html(name);
									$('#holyshit268').find('.buy-phone').html(tel);
								})
								$(document).on('click','.del_address',function(){
									id=$(this).parents('li').attr('id');
									that=$(this).parents('li');
									$.ajax({
										url:"http://localhost/cffirm/show_qian/public/api/del_address",
										data:{id:id},
										dataType:"json",
										type:"GET",
										success:function(res){
											if(res.code==40017){
												showToast({
												   title:"成功删除！",
												   icon:'success',
												   duration:3000,
												   mask:true,
												   success:function (res) {
												       console.warn(JSON.stringify(res))
												   }
												});
												that.empty();
											}else{
												showToast({
												   title:"删除失败！",
												   icon:'none',
												   duration:3000,
												   mask:true,
												   success:function (res) {
												       console.warn(JSON.stringify(res))
												   }
												});
											}
										}
									})
								})
								$(document).on('change','#integral',function(){
									total_price=$('#total_price').html();
									if($(this).val()==0 || $(this).val()<20){
										if($('.after').html()!=""){
											$('.after').html("");
										}else{
											$('.after').html("您的积分不足");	
										}
									}else{
										if($('#check').val()==1){
											zhi=$('#J_ActualFee').html()
											$('#J_ActualFee').html(Number(zhi)+0.5);
											$('#check').val('0');	
										}else{
											$('#J_ActualFee').html(total_price-0.5);
											$('#check').val('1');	
										}
										
									}
								})
								$(document).on('click','#J_Go',function(){
									var order_sn=$('#order_sn').val();
									var chile_order_sn=[];
									$('.bundle-main').each(function(){
										chile_order_sn.push($(this).attr('asdf'));
									})
									chile_order_sn=chile_order_sn.join(',');
									var pay_list=$('.pay-list').children('.selected').text();
									if(pay_list==""){
										showToast({
										   title:"请选择支付方式！",
										   icon:'none',
										   duration:3000,
										   mask:true,
										   success:function (res) {
										       console.warn(JSON.stringify(res));return;
										   }
										});
									}
									var shipping_user=$('.buy-user').html();
									var shipping_tel=$('.buy-phone').html();
									var address=$('#address').text();
									var order_num=$('#num').val();
									var price=$('#J_ActualFee').html();
									var total_price=$('#total_price').text();
									$.ajax({
										url:"http://localhost/cffirm/show_qian/public/api/payment_success",
										data:{
											'_token':'{{csrf_token()}}',
											'order_sn':order_sn,
											'child_order_sn':chile_order_sn,
											'pay_list':pay_list,
											'shipping_tel':shipping_tel,
											'shipping_user':shipping_user,
											'address':address,
											'order_num':order_num,
											'price':price,
											'total_price':total_price
										},
										dataType:"json",
										type:"post",
										success:function(res){
											console.log(res);
											if(res.code==40015){
												showToast({
												   title:"提交成功！",
												   icon:'success',
												   duration:3000,
												   mask:true,
												   success:function (res) {
												       
												   }
												});
												location.href="success?code="+res.data;
											}else if(res.code==40017){
												showToast({
												   title:"订单已提交，请勿重复提交！",
												   icon:'success',
												   duration:3000,
												   mask:true,
												   success:function (res) {
												       
												   }
												});
											}
										}
									})
								})
							</script>
							<div class="clear"></div>
							<div class="pay-total">
						<!--留言-->
							<div class="order-extra">
								<div class="order-user-info">
									<div id="holyshit257" class="memo">
										<label>买家留言：</label>
										<input type="text" title="选填,对本次交易的说明（建议填写已经和卖家达成一致的说明）" placeholder="选填,建议填写和卖家达成一致的说明" class="memo-input J_MakePoint c2c-text-default memo-close">
										<div class="msg hidden J-msg">
											<p class="error">最多输入500个字符</p>
										</div>
									</div>
								</div>

							</div>
							<!--优惠券 -->
							<div class="buy-agio">
								<li class="td td-bonus">
									<input type="checkbox" name="integral" id="integral" value="{{$data['user_integral'][0]['integral']}}">
									<span class="bonus-title">20积分可抵扣0.5元(每次购买只能抵扣一次)</span>
									<input type="hidden" name="check" id="check" value="0">

								</li>
								<span class="after"></span>
							</div>
							<div class="clear"></div>
							</div>
							<!--含运费小计 -->
							<div class="buy-point-discharge ">
								<p class="price g_price ">
									合计（含运费） <span>¥</span><em class="pay-sum" id="total_price">{{$data['orderinfo']['total_price']}}</em>
								</p>
							</div>

							<!--信息 -->
							<div class="order-go clearfix">
								<div class="pay-confirm clearfix">
									<div class="box">
										<div tabindex="0" id="holyshit267" class="realPay"><em class="t">实付款：</em>
											<span class="price g_price ">
                                    <span>¥</span> <em class="style-large-bold-red " id="J_ActualFee">{{$data['orderinfo']['total_price']}}</em>
											</span>
										</div>

										<div id="holyshit268" class="pay-address">
											@foreach($data['address'] as $item)
											@if($item['default']==1)
											<p class="buy-footer-address">
												<span class="buy-line-title buy-line-title-type">寄送至：</span>
												<span class="buy--address-detail" id="address">
								   				{{$item['address_detailed']}}
												</span>
												</span>
											</p>
											<p class="buy-footer-address">
												<span class="buy-line-title">收货人：</span>
												<span class="buy-address-detail">   
                                         <span class="buy-user">{{$item['address_name']}}</span>
												<span class="buy-phone">{{$item['address_tel']}}</span>
												</span>
											</p>
											@endif
											@endforeach
										</div>
									</div>

									<div id="holyshit269" class="submitOrder">
										<div class="go-btn-wrap">
											<a id="J_Go" href="#" class="btn-go" tabindex="0" title="点击此按钮，提交订单">提交订单</a>
										</div>
									</div>
									<div class="clear"></div>
								</div>
							</div>
						</div>

						<div class="clear"></div>
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
			<div class="theme-popover-mask"></div>
			<div class="theme-popover">

				<!--标题 -->
				<div class="am-cf am-padding">
					<div class="am-fl am-cf"><strong class="am-text-danger am-text-lg">新增地址</strong> / <small>Add address</small></div>
				</div>
				<hr/>

				<div class="am-u-md-12">
					<form class="am-form am-form-horizontal">

						<div class="am-form-group">
							<label for="user-name" class="am-form-label">收货人</label>
							<div class="am-form-content">
								<input type="text" id="user-name" placeholder="收货人">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">手机号码</label>
							<div class="am-form-content">
								<input id="user-phone" placeholder="手机号必填" type="email">
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-phone" class="am-form-label">所在地</label>
							<div class="am-form-content address">
								<select data-am-selected>
									<option value="a">浙江省</option>
									<option value="b">湖北省</option>
								</select>
								<select data-am-selected>
									<option value="a">温州市</option>
									<option value="b">武汉市</option>
								</select>
								<select data-am-selected>
									<option value="a">瑞安区</option>
									<option value="b">洪山区</option>
								</select>
							</div>
						</div>

						<div class="am-form-group">
							<label for="user-intro" class="am-form-label">详细地址</label>
							<div class="am-form-content">
								<textarea class="" rows="3" id="user-intro" placeholder="输入详细地址"></textarea>
								<small>100字以内写出你的详细地址...</small>
							</div>
						</div>

						<div class="am-form-group theme-poptit">
							<div class="am-u-sm-9 am-u-sm-push-3">
								<div class="am-btn am-btn-danger">保存</div>
								<div class="am-btn am-btn-danger close">取消</div>
							</div>
						</div>
					</form>
				</div>

			</div>

			<div class="clear"></div>
	</body>

</html>