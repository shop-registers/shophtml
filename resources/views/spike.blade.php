@extends('header')
@section('content')
	<div class="am-g am-g-fixed">
		<div class="am-u-sm-12 am-u-md-12">
      	<div class="theme-popover">														
			<div class="searchAbout">
				<span class="font-pale">相关搜索：</span>
				<a title="坚果" href="#">坚果</a>
				<a title="瓜子" href="#">瓜子</a>
				<a title="鸡腿" href="#">豆干</a>

			</div>
			<ul class="select">
				<p class="title font-normal">
					<span class="fl">松子</span>
					<span class="total fl">搜索到<strong class="num">997</strong>件相关商品</span>
				</p>
				<div class="clear"></div>
				<li class="select-result">
					<dl>
						<dt>已选</dt>
						<dd class="select-no"></dd>
						<p class="eliminateCriteria">清除</p>
					</dl>
				</li>
				<div class="clear"></div>
				<li class="select-list">
					<dl id="select1">
						<dt class="am-badge am-round">品牌</dt>	
					
						 <div class="dd-conent">										
							<dd class="select-all selected"><a href="#">全部</a></dd>
							<dd><a href="#">百草味</a></dd>
							<dd><a href="#">良品铺子</a></dd>
							<dd><a href="#">新农哥</a></dd>
							<dd><a href="#">楼兰蜜语</a></dd>
							<dd><a href="#">口水娃</a></dd>
							<dd><a href="#">考拉兄弟</a></dd>
						 </div>
		
					</dl>
				</li>
				<li class="select-list">
					<dl id="select2">
						<dt class="am-badge am-round">种类</dt>
						<div class="dd-conent">
							<dd class="select-all selected"><a href="#">全部</a></dd>
							<dd><a href="#">东北松子</a></dd>
							<dd><a href="#">巴西松子</a></dd>
							<dd><a href="#">夏威夷果</a></dd>
							<dd><a href="#">松子</a></dd>
						</div>
					</dl>
				</li>
				<li class="select-list">
					<dl id="select3">
						<dt class="am-badge am-round">选购热点</dt>
						<div class="dd-conent">
							<dd class="select-all selected"><a href="#">全部</a></dd>
							<dd><a href="#">手剥松子</a></dd>
							<dd><a href="#">薄壳松子</a></dd>
							<dd><a href="#">进口零食</a></dd>
							<dd><a href="#">有机零食</a></dd>
						</div>
					</dl>
				</li>
	        
			</ul>
			<div class="clear"></div>
        </div>
			<div class="search-content" id='am-g'>
				<div class="sort">
					<li class="first"><a title="综合">综合排序</a></li>
					<li><a title="销量">销量排序</a></li>
					<li><a title="价格">价格优先</a></li>
					<li class="big"><a title="评价" href="#">评价为主</a></li>
				</div>
				<div class="clear"></div>

				<ul class="am-avg-sm-2 am-avg-md-3 am-avg-lg-4 boxes">
					<li v-for='value in info.data'>
						<a :href="'../good_info/'+value.id">
						<div class="i-pic limit">
							<img src="../static/images/imgsearch1.jpg" />											
							<p class="title fl">@{{ value.type_name }}</p>
							<p class="price fl">
								<b>¥</b>
								<strong>56.90</strong>
							</p>
							<p class="number fl">
								销量<span>1110</span>
							</p>
						</div>
						</a>
					</li>
				</ul>
			</div>
			<div class="search-side">

				<div class="side-title">
					经典搭配
				</div>

				<li>
					<div class="i-pic check">
						<img src="../static/images/cp.jpg" />
						<p class="check-title">萨拉米 1+1小鸡腿</p>
						<p class="price fl">
							<b>¥</b>
							<strong>29.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic check">
						<img src="../static/images/cp2.jpg" />
						<p class="check-title">ZEK 原味海苔</p>
						<p class="price fl">
							<b>¥</b>
							<strong>8.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>
				<li>
					<div class="i-pic check">
						<img src="../static/images/cp.jpg" />
						<p class="check-title">萨拉米 1+1小鸡腿</p>
						<p class="price fl">
							<b>¥</b>
							<strong>29.90</strong>
						</p>
						<p class="number fl">
							销量<span>1110</span>
						</p>
					</div>
				</li>

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

		</div>
	</div>
	<!-- 分类商品 -->
	<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
	<script src="https://cdn.staticfile.org/axios/0.18.0/axios.min.js"></script>
	<script type="text/javascript" src="{{asset('js/vue.min.js')}}"></script>
	<script type="text/javascript">
		var vm = new Vue({
			el:'#am-g',
			data(){
				return {
					info: null
				}
			},
			mounted(){
				axios
				.get('http://www.hhh.com/api/goodstype')
				.then(response=>(this.info = response))
				.catch(function(error){
					console.log(error);
				});
			}
		});
	</script>

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

<!--引导 -->
<div class="navCir">
	<li><a href="home.html"><i class="am-icon-home "></i>首页</a></li>
	<li><a href="sort.html"><i class="am-icon-list"></i>分类</a></li>
	<li><a href="shopcart.html"><i class="am-icon-shopping-basket"></i>购物车</a></li>	
	<li><a href="../person/index.html"><i class="am-icon-user"></i>我的</a></li>					
</div>

<!--菜单 -->
<div class=tip>
	<div id="sidebar">
		<div id="wrap">
			<div id="prof" class="item">
				<a href="#">
					<span class="setting"></span>
				</a>
				<div class="ibar_login_box status_login">
					<div class="avatar_box">
						<p class="avatar_imgbox"><img src="../static/images/no-img_mid_.jpg" /></p>
						<ul class="user_info">
							<li>用户名：sl1903</li>
							<li>级&nbsp;别：普通会员</li>
						</ul>
					</div>
					<div class="login_btnbox">
						<a href="#" class="login_order">我的订单</a>
						<a href="#" class="login_favorite">我的收藏</a>
					</div>
					<i class="icon_arrow_white"></i>
				</div>

			</div>
			<div id="shopCart" class="item">
				<a href="#">
					<span class="message"></span>
				</a>
				<p>
					购物车
				</p>
				<p class="cart_num">0</p>
			</div>
			<div id="asset" class="item">
				<a href="#">
					<span class="view"></span>
				</a>
				<div class="mp_tooltip">
					我的资产
					<i class="icon_arrow_right_black"></i>
				</div>
			</div>

			<div id="foot" class="item">
				<a href="#">
					<span class="zuji"></span>
				</a>
				<div class="mp_tooltip">
					我的足迹
					<i class="icon_arrow_right_black"></i>
				</div>
			</div>

			<div id="brand" class="item">
				<a href="#">
					<span class="wdsc"><img src="../static/images/wdsc.png" /></span>
				</a>
				<div class="mp_tooltip">
					我的收藏
					<i class="icon_arrow_right_black"></i>
				</div>
			</div>

			<div id="broadcast" class="item">
				<a href="#">
					<span class="chongzhi"><img src="../static/images/chongzhi.png" /></span>
				</a>
				<div class="mp_tooltip">
					我要充值
					<i class="icon_arrow_right_black"></i>
				</div>
			</div>

			<div class="quick_toggle">
				<li class="qtitem">
					<a href="#"><span class="kfzx"></span></a>
					<div class="mp_tooltip">客服中心<i class="icon_arrow_right_black"></i></div>
				</li>
				<!--二维码 -->
				<li class="qtitem">
					<a href="#none"><span class="mpbtn_qrcode"></span></a>
					<div class="mp_qrcode" style="display:none;"><img src="../static/images/weixin_code_145.png" /><i class="icon_arrow_white"></i></div>
				</li>
				<li class="qtitem">
					<a href="#top" class="return_top"><span class="top"></span></a>
				</li>
			</div>

			<!--回到顶部 -->
			<div id="quick_links_pop" class="quick_links_pop hide"></div>

		</div>

	</div>
	<div id="prof-content" class="nav-content">
		<div class="nav-con-close">
			<i class="am-icon-angle-right am-icon-fw"></i>
		</div>
		<div>
			我
		</div>
	</div>
	<div id="shopCart-content" class="nav-content">
		<div class="nav-con-close">
			<i class="am-icon-angle-right am-icon-fw"></i>
		</div>
		<div>
			购物车
		</div>
	</div>
	<div id="asset-content" class="nav-content">
		<div class="nav-con-close">
			<i class="am-icon-angle-right am-icon-fw"></i>
		</div>
		<div>
			资产
		</div>

		<div class="ia-head-list">
			<a href="#" target="_blank" class="pl">
				<div class="num">0</div>
				<div class="text">优惠券</div>
			</a>
			<a href="#" target="_blank" class="pl">
				<div class="num">0</div>
				<div class="text">红包</div>
			</a>
			<a href="#" target="_blank" class="pl money">
				<div class="num">￥0</div>
				<div class="text">余额</div>
			</a>
		</div>

	</div>
	<div id="foot-content" class="nav-content">
		<div class="nav-con-close">
			<i class="am-icon-angle-right am-icon-fw"></i>
		</div>
		<div>
			足迹
		</div>
	</div>
	<div id="brand-content" class="nav-content">
		<div class="nav-con-close">
			<i class="am-icon-angle-right am-icon-fw"></i>
		</div>
		<div>
			收藏
		</div>
	</div>
	<div id="broadcast-content" class="nav-content">
		<div class="nav-con-close">
			<i class="am-icon-angle-right am-icon-fw"></i>
		</div>
		<div>
			充值
		</div>
	</div>
</div>
<script>
	window.jQuery || document.write('<script src="../static/basic/js/jquery-1.9.min.js"><\/script>');
</script>
<script type="text/javascript" src="../static/basic/js/quick_links.js"></script>

<div class="theme-popover-mask"></div>

@endsection