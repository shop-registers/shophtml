<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

		<title>商品页面</title>

		<link href="../AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />
		<link href="../AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
		<link href="../basic/css/demo.css" rel="stylesheet" type="text/css" />
		<link type="text/css" href="../css/optstyle.css" rel="stylesheet" />
		<link type="text/css" href="../css/style.css" rel="stylesheet" />

		<script type="text/javascript" src="../basic/js/jquery-1.7.min.js"></script>
		<script type="text/javascript" src="../basic/js/quick_links.js"></script>

		<script type="text/javascript" src="../AmazeUI-2.4.2/assets/js/amazeui.js"></script>
		<script type="text/javascript" src="../js/jquery.imagezoom.min.js"></script>
		<script type="text/javascript" src="../js/jquery.flexslider.js"></script>
		<script type="text/javascript" src="../js/list.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/vue"></script>

		<!-- vue -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/velocity/1.2.3/velocity.min.js"></script>
		<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

		<!-- 弹框效果 -->
		<script  src="../js/alert.js"></script>
	</head>

	<body>
			@include('asdf')
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
            <b class="line"></b>
			<div class="listMain">

				<!--分类-->
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
				<ol class="am-breadcrumb am-breadcrumb-slash">
					<li><a href="#">首页</a></li>
					<li><a href="#">分类</a></li>
					<li class="am-active">内容</li>
				</ol>
				<script type="text/javascript">
					$(function() {});
					$(window).load(function() {
						$('.flexslider').flexslider({
							animation: "slide",
							start: function(slider) {
								$('body').removeClass('loading');
							}
						});
					});
				</script>
				<div class="scoll">
					<section class="slider">
						<div class="flexslider">
							<ul class="slides">
								<li>
									<img src="../images/01.jpg" title="pic" />
								</li>
								<li>
									<img src="../images/02.jpg" />
								</li>
								<li>
									<img src="../images/03.jpg" />
								</li>
							</ul>
						</div>
					</section>
				</div>

				<!--放大镜-->

				<div class="item-inform">
					<div class="clearfixLeft" id="clearcontent">

						<div class="box">
							<script type="text/javascript">
								$(document).ready(function() {
									$(".jqzoom").imagezoom();
									$("#thumblist li a").click(function() {
										$(this).parents("li").addClass("tb-selected").siblings().removeClass("tb-selected");
										$(".jqzoom").attr('src', $(this).find("img").attr("mid"));
										$(".jqzoom").attr('rel', $(this).find("img").attr("big"));
									});
								});
							</script>

							<div class="tb-booth tb-pic tb-s310">
								<a href="../images/01.jpg"><img src="../uploads/{{$goodinfo['good_img']}}" alt="细节展示放大镜特效" rel="../uploads/{{$goodinfo['good_img']}}" class="jqzoom" /></a>
							</div>
							<ul class="tb-thumb" id="thumblist">
								@foreach($imginfo as $item)
								<li class="tb-selected">
									<div class="tb-pic tb-s40">
										<a href="#"><img src="../uploads/{{$item['img_src']}}" mid="../uploads/{{$item['img_src']}}" big="../uploads/{{$item['img_src']}}"></a>
									</div>
								</li>
								@endforeach
							</ul>
						</div>

						<div class="clear"></div>
					</div>

					<div class="clearfixRight">

						<!--规格属性-->
						<!--名称-->
						<div class="tb-detail-hd">
							<h1 id="good_name">	
				 {{$goodinfo['good_name']}}
	          </h1>
						</div>
						<input type="hidden" name="good_id" id="good_id" value="{{$goodinfo['id']}}">
						<div class="tb-detail-list">
							<!--价格-->
							<div class="tb-detail-price">
								<li class="price iteminfo_price">
									<dt>促销价</dt>
									<dd><em>¥</em><b class="sys_item_price" id="good_price">{{$goodinfo['good_price']}}</b>  </dd>                                 
								</li>
								<li class="price iteminfo_mktprice">
									<dt>原价</dt>
									<dd><em>¥</em><b class="sys_item_mktprice">{{$goodinfo['good_old_price']}}.00</b></dd>									
								</li>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>

							<!--销量-->
							<ul class="tm-ind-panel">
								<li class="tm-ind-item tm-ind-sellCount canClick">
									<div class="tm-indcon"><span class="tm-label">月销量</span><span class="tm-count">1015</span></div>
								</li>
								<li class="tm-ind-item tm-ind-sumCount canClick">
									<div class="tm-indcon"><span class="tm-label">累计销量</span><span class="tm-count">6015</span></div>
								</li>
								<li class="tm-ind-item tm-ind-reviewCount canClick tm-line3">
									<div class="tm-indcon"><span class="tm-label">累计评价</span><span class="tm-count">640</span></div>
								</li>
							</ul>
							<div class="clear"></div>

							<!--各种规格-->
							<dl class="iteminfo_parameter sys_item_specpara">
								<dt class="theme-login"><div class="cart-title">可选规格<span class="am-icon-angle-right"></span></div></dt>
								<dd>
									<!--操作页面-->

									<div class="theme-popover-mask"></div>
									<input type="hidden" name="sku_code"  id="sku_code" value="">
									<div class="theme-popover">
										<div class="theme-span"></div>
										<div class="theme-poptit">
											<a href="javascript:;" title="关闭" class="close">×</a>
										</div>
										<div class="theme-popbod dform">
											<form class="theme-signin" name="loginform" action="" method="post">
												<input type="hidden" name="arrcount" id="attrcount" value="{{count($attrinfo)}}">
												<script type="text/javascript">
													$(function(){

														var lenth=$('#attrcount').val();
														var arr=new Array();
														var p_id=$('.theme-signin-left').children().eq(0).attr('id');
														$(document).on('click','.sku-line',function(){
															var good_id=$('#good_id').val();
															zhi=$(this).val();
															p_class=$(this).attr('class');
															p_name=$(this).parent().parent().attr('id');
															if(p_class=="sku-line selected"){
																arr[p_name]=zhi;	
															}
															newarr=Object.keys(arr);

															if(newarr.length==lenth){
																str=Object.values(arr);
																newstr=str.join(',');
																$.ajax({
																	url:"http://localhost/cffirm/show_qian/public/api/goodattr_change",
																	data:{str:newstr,good_id:good_id},
																	dataType:"json",
																	type:"get",
																	success:function(res){
																		if(res.code==40014){
																			$('.pay').html('<li><div class="clearfix tb-btn tb-btn-buy theme-login"><a id="LikBuy" am-disabled title="暂无库存" href="#">暂无库存</a></div></li>');
																		}else{
																			$('.sys_item_price').html(res.data[0]['price']);
																			$('.stock').html(res.data[0]['inventory']);
																			$('#sku_code').attr('value',res.data[0]['sku_id']);
																			$('.pay').html('<li><div class="clearfix tb-btn tb-btn-buy theme-login"><a id="LikBuy" title="点此按钮到下一步确认购买信息" href="#">立即购买</a></div></li><li><div class="clearfix tb-btn tb-btn-basket theme-login" id="asdf"><input type="hidden" name="suk" value="123" ref="skudesc"><a id="LikBasket" title="加入购物车" href="#" v-on:click="greet"><i></i>加入购物车</a></div></li>');
																		}
																	}
																})
															}
														})
														
													})
												</script>
												<div class="theme-signin-left">
													@foreach($attrinfo as $item)
													<div class="theme-options" id="{{$item['attr_name']}}">
														<div class="cart-title asdf" asdf="{{$item['attr_name']}}">{{$item['attr_name']}}</div>
														<ul>
															@foreach($item['attr_desc'] as $v)
															<li class="sku-line" v-model="sku_desc" ref="skudesc" value="{{$v}}">{{$v}}<i></i></li>
															@endforeach
														</ul>
													</div>
													@endforeach
													<div class="theme-options">
														<div class="cart-title number">数量</div>
														<dd>
															<input id="min" class="am-btn am-btn-default" name="" type="button" value="-" />
															<input id="text_box" name="" type="text" value="1" style="width:30px;" min="1" ref="goodNum"/>
															<input id="add" class="am-btn am-btn-default" name="" type="button" value="+" />
															<span id="Stock" class="tb-hidden">库存<span class="stock">{{$goodinfo['good_inventory']}}</span>件</span>
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
														<img src="../images/songzi.jpg" />
													</div>
													<div class="text-info">
														<span class="J_Price price-now">¥39.00</span>
														<span id="Stock" class="tb-hidden">库存<span class="stock">1000</span>件</span>
													</div>
												</div>

											</form>
										</div>
									</div>

								</dd>
							</dl>
							<div class="clear"></div>
							<!--活动	-->
							
						</div>

						<div class="pay">
							
							<li>
								<div class="clearfix tb-btn tb-btn-buy theme-login">
									<a id="LikBuy" title="点此按钮到下一步确认购买信息" href="#">立即购买</a>
								</div>
							</li>
							<li>
								<div class="clearfix tb-btn tb-btn-basket theme-login" id="asdf">
									<a id="LikBasket" title="加入购物车" href="#" v-on:click="greet"><i></i>加入购物车</a>
								</div>
							</li>
						</div>

					</div>
					<script type="text/javascript">
						$(document).on('click','#LikBasket',function(){
							var good_id=$('#good_id').val();
							var attr_value=[];
							var attr_name=[];
							var arr=[];
							$('.selected').each(function(){
								attr_value.push($(this).val());
							})
							$('.asdf').each(function(){
								attr_name.push($(this).attr('asdf'));
							})
							for (var i = 0; i <= attr_name.length-1; i++) {
								arr[i]=attr_name[i]+":"+attr_value[i];
							}
							arr=arr.join(' ');
							var good_name=$('#good_name').text();
							var sku_code=$('#sku_code').val();
							var good_price=$('#good_price').text();
							var text_box=$('#text_box').val();
							$.ajax({
								url:"http://localhost/cffirm/show_qian/public/api/add_shopcart",
								data:{
									'_token':'{{csrf_token()}}',
									'good_id':good_id,
									'good_name':good_name,
									'sku_code':sku_code,
									'sku_desc':arr,
									'good_price':good_price,
									'text_box':text_box
								},
								type:"POST",
								dataType:"json",
								success:function(res){
									if(res.code==40012){
										showToast({
										   title:"成功加入购物车！",
										   icon:'success',
										   duration:3000,
										   mask:true,
										   success:function (res) {
										       console.warn(JSON.stringify(res))
										   }
										});
									}else{

									}
								}
							})
						})
						$(document).on('click','#LikBuy',function(){
							var good_id=$('#good_id').val();
							var sku_code=$('#sku_code').val();
							var good_price=$('#good_price').text();
							var text_box=$('#text_box').val();
							$.ajax({
								url:"http://localhost/cffirm/show_qian/public/api/add_order",
								data:{
									'_token':'{{csrf_token()}}',
									'good_id':good_id,
									'sku_code':sku_code,
									'good_price':good_price,
									'text_box':text_box
								},
								type:"POST",
								dataType:"json",
								success:function(res){
									if(res.code==40015){
										showToast({
										   title:"正在生成订单，请稍候",
										   icon:'success',
										   duration:3000,
										   mask:true,
										   success:function (res) {
										       console.warn(JSON.stringify(res))
										       
										   }
										});
										location.href="../pay?code="+res.data;
									}else{
										
									}
								}
							})
						})
						$(document).on('click','#loadcommit',function(){
							var good_id=$('#good_id').val();
							$.ajax({
								url:"http://localhost/cffirm/show_qian/public/api/good_comment",
								data:{goods_id:good_id},
								dataType:"json",
								type:"GET",
								success:function(res){
									str='';
									$.each(res.data.comment,function(k,v){
										str+='<li class="am-comment"><a href=""><img class="am-comment-avatar" src="../images/hwbn40x40.jpg" /></a><div class="am-comment-main"><header class="am-comment-hd"><div class="am-comment-meta"><a href="#link-to-user" class="am-comment-author">b***1 (匿名)</a>评论于<time datetime="">'+v.addtime+'</time></div></header><div class="am-comment-bd"><div class="tb-rev-item " data-id="'+v.id+'"><div class="J_TbcRate_ReviewContent tb-tbcr-content ">'+v.content+'</div></div></div></div></li>';
									})
									$('#commit').html(str);
									$('#total').html(res.data.total);
									$('#good').html(res.data.good);
									$('#common').html(res.data.common);
									$('#gap').html(res.data.gap);
								}
							})
						})
					</script>
					<!-- Vue_lose -->
					<!-- <script>
						var example2 = new Vue({
							  el: '#asdf',
							  data: {
							    name: 'Vue.js'
							  },
							  // 在 `methods` 对象中定义方法
							  methods: {
							    greet: function (event) {
							    	alert(123);
							     	var good_id = document.getElementById("good_id").value;//商品id
							     	console.log(good_id);
							     	var good_name = document.getElementById("good_name").text;//商品名称
							     	console.log(good_name);
							     	var sku_code = document.getElementById("sku_code").value;
							     	console.log(sku_code);
							     	var good_price = document.getElementById("good_price").value;
							     	console.log(good_price);
							     	var text_box = document.getElementById("text_box").value;//库存
							     	console.log(text_box);
							     	/*this.prototype.$axios({
							     		method:"get",
							     		url:"http://localhost/cffirm/show_qian/public/api/add_shopcart",
							     		data:this.prototype.qs.stringify({
							     			good_id:good_id,
							     			good_name:good_name,
							     			sku_code:sku_code,
							     			good_price:good_price,
							     			text_box:text_box
							     		})
							     	}).than((response)=>{
							     		console.log(response);
							     	})*/
							    }
							  }
							})

					</script> -->
					<div class="clear"></div>

				</div>

				<!--优惠套装-->
				<div class="match">
					<div class="match-title">优惠套装</div>
					<div class="match-comment">
						<ul class="like_list">
							<li>
								<div class="s_picBox">
									<a class="s_pic" href="#"><img src="../images/cp.jpg"></a>
								</div> <a class="txt" target="_blank" href="#">萨拉米 1+1小鸡腿</a>
								<div class="info-box"> <span class="info-box-price">¥ 29.90</span> <span class="info-original-price">￥ 199.00</span> </div>
							</li>
							<li class="plus_icon"><i>+</i></li>
							<li>
								<div class="s_picBox">
									<a class="s_pic" href="#"><img src="../images/cp2.jpg"></a>
								</div> <a class="txt" target="_blank" href="#">ZEK 原味海苔</a>
								<div class="info-box"> <span class="info-box-price">¥ 8.90</span> <span class="info-original-price">￥ 299.00</span> </div>
							</li>
							<li class="plus_icon"><i>=</i></li>
							<li class="total_price">
								<p class="combo_price"><span class="c-title">套餐价:</span><span>￥35.00</span> </p>
								<p class="save_all">共省:<span>￥463.00</span></p> <a href="#" class="buy_now">立即购买</a> </li>
							<li class="plus_icon"><i class="am-icon-angle-right"></i></li>
						</ul>
					</div>
				</div>
				<div class="clear"></div>
				
							
				<!-- introduce-->

				<div class="introduce">
					<div class="browse">
					    <div class="mc"> 
						     <ul>					    
						     	<div class="mt">            
						            <h2>看了又看</h2>        
					            </div>
						     	
							      <li class="first">
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="../images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="../images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="../images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>							      
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="../images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>							      
							      <li>
							      	<div class="p-img">                    
							      		<a  href="#"> <img class="" src="../images/browse1.jpg"> </a>               
							      	</div>
							      	<div class="p-name"><a href="#">
							      		【三只松鼠_开口松子218g】零食坚果特产炒货东北红松子原味
							      	</a>
							      	</div>
							      	<div class="p-price"><strong>￥35.90</strong></div>
							      </li>							      
					      
						     </ul>					
					    </div>
					</div>
					<div class="introduceMain">
						<div class="am-tabs" data-am-tabs>
							<ul class="am-avg-sm-3 am-tabs-nav am-nav am-nav-tabs">
								<li class="am-active">
									<a href="#">
										<span class="index-needs-dt-txt">宝贝详情</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="index-needs-dt-txt" id="loadcommit">全部评价</span>
									</a>
								</li>
								<li>
									<a href="#">
										<span class="index-needs-dt-txt">猜你喜欢</span>
									</a>
								</li>
							</ul>
							<div class="am-tabs-bd">
								<div class="am-tab-panel am-fade am-in am-active">
									<div class="J_Brand">
										<div class="attr-list-hd tm-clear">
											<h4>产品参数：</h4></div>
										<div class="clear"></div>
										<ul id="J_AttrUL">
											<li title="">产品类型:&nbsp;烘炒类</li>
											<li title="">原料产地:&nbsp;巴基斯坦</li>
											<li title="">产地:&nbsp;湖北省武汉市</li>
											<li title="">配料表:&nbsp;进口松子、食用盐</li>
											<li title="">产品规格:&nbsp;210g</li>
											<li title="">保质期:&nbsp;180天</li>
											<li title="">产品标准号:&nbsp;GB/T 22165</li>
											<li title="">生产许可证编号：&nbsp;QS4201 1801 0226</li>
											<li title="">储存方法：&nbsp;请放置于常温、阴凉、通风、干燥处保存 </li>
											<li title="">食用方法：&nbsp;开袋去壳即食</li>
										</ul>
										<div class="clear"></div>
									</div>

									<div class="details">
										<div class="attr-list-hd after-market-hd">
											<h4>商品细节</h4>
										</div>
										<div class="twlistNews">
											@foreach($imginfo as $item)
												<img src="../uploads/{{$item['img_src']}}"  width="790px" height="521px" />
											@endforeach
										</div>
									</div>
									<div class="clear"></div>

								</div>

								<div class="am-tab-panel am-fade">
									
                                    <div class="actor-new">
                                    	<div class="rate">                
                                    		<strong>100<span>%</span></strong><br> <span>好评度</span>            
                                    	</div>
                                        <dl>                    
                                            <dt>买家印象</dt>                    
                                            <dd class="p-bfc">
                                            			<q class="comm-tags"><span>味道不错</span><em>(2177)</em></q>
                                            			<q class="comm-tags"><span>颗粒饱满</span><em>(1860)</em></q>
                                            			<q class="comm-tags"><span>口感好</span><em>(1823)</em></q>
                                            			<q class="comm-tags"><span>商品不错</span><em>(1689)</em></q>
                                            			<q class="comm-tags"><span>香脆可口</span><em>(1488)</em></q>
                                            			<q class="comm-tags"><span>个个开口</span><em>(1392)</em></q>
                                            			<q class="comm-tags"><span>价格便宜</span><em>(1119)</em></q>
                                            			<q class="comm-tags"><span>特价买的</span><em>(865)</em></q>
                                            			<q class="comm-tags"><span>皮很薄</span><em>(831)</em></q> 
                                            </dd>                                           
                                         </dl> 
                                    </div>	
                                    <div class="clear"></div>
									<div class="tb-r-filter-bar">
										<ul class=" tb-taglist am-avg-sm-4">
											<li class="tb-taglist-li tb-taglist-li-current">
												<div class="comment-info">
													<span>全部评价</span>
													<span class="tb-tbcr-num" id="total"></span>
												</div>
											</li>
											<li class="tb-taglist-li tb-taglist-li-1">
												<div class="comment-info">
													<span>好评</span>
													<span class="tb-tbcr-num" id="good"></span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li-0">
												<div class="comment-info">
													<span>中评</span>
													<span class="tb-tbcr-num" id="common"></span>
												</div>
											</li>

											<li class="tb-taglist-li tb-taglist-li--1">
												<div class="comment-info">
													<span>差评</span>
													<span class="tb-tbcr-num" id="gep"></span>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>

									<ul class="am-comments-list am-comments-list-flip" id="commit">
										
									</ul>

									<div class="clear"></div>

									<!--分页 
									<ul class="am-pagination am-pagination-right">
										<li class="am-disabled"><a href="#">&laquo;</a></li>
										<li class="am-active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
									-->
									<div class="clear"></div>

									<div class="tb-reviewsft">
										<div class="tb-rate-alert type-attention">购买前请查看该商品的 <a href="#" target="_blank">购物保障</a>，明确您的售后保障权益。</div>
									</div>

								</div>

								<div class="am-tab-panel am-fade">
									<div class="like">
										<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
											<li>
												<div class="i-pic limit">
													<img src="../images/imgsearch1.jpg" />
													<p>【良品铺子_开口松子】零食坚果特产炒货
														<span>东北红松子奶油味</span></p>
													<p class="price fl">
														<b>¥</b>
														<strong>298.00</strong>
													</p>
												</div>
											</li>
										</ul>
									</div>
									<div class="clear"></div>

									<!--分页 -->
									<ul class="am-pagination am-pagination-right">
										<li class="am-disabled"><a href="#">&laquo;</a></li>
										<li class="am-active"><a href="#">1</a></li>
										<li><a href="#">2</a></li>
										<li><a href="#">3</a></li>
										<li><a href="#">4</a></li>
										<li><a href="#">5</a></li>
										<li><a href="#">&raquo;</a></li>
									</ul>
									<div class="clear"></div>

								</div>

							</div>

						</div>

						<div class="clear"></div>

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

				</div>
			</div>
	</body>
</html>