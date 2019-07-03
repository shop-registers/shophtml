<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">

        <title>首页</title>

        <link href="static/AmazeUI-2.4.2/assets/css/amazeui.css" rel="stylesheet" type="text/css" />
        <link href="static/AmazeUI-2.4.2/assets/css/admin.css" rel="stylesheet" type="text/css" />

        <link href="static/basic/css/demo.css" rel="stylesheet" type="text/css" />

        <link href="static/css/hmstyle.css" rel="stylesheet" type="text/css"/>
        <link href="static/css/skin.css" rel="stylesheet" type="text/css" />
        <script src="static/AmazeUI-2.4.2/assets/js/jquery.min.js"></script>
        <script src="static/AmazeUI-2.4.2/assets/js/amazeui.min.js"></script>

    </head>

    <body>
        <div class="hmtop">
            <!--顶部导航条 -->
            <div class="am-container header">
                <ul class="message-l">
                    <div class="topMessage">
                        <div class="menu-hd">
                        	@yield('user')
                        </div>
                    </div>
                </ul>
                <ul class="message-r">
                    <div class="topMessage home">
                        <div class="menu-hd"><a href="index" target="_top" class="h">商城首页</a></div>
                    </div>
                    <div class="topMessage my-shangcheng">
                        <div class="menu-hd MyShangcheng"><a href="#" target="_top"><i class="am-icon-user am-icon-fw"></i>个人中心</a></div>
                    </div>
                    <div class="topMessage mini-cart">
                        <div class="menu-hd shop_car">
                            <a id="mc-menu-hd" href="#" target="_top">
                            <i class="am-icon-shopping-cart  am-icon-fw"></i>
                            <span>购物车</span>
                            <strong id="J_MiniCartNum" class="h"></strong>
                            </a>
                        </div>
                    </div>
                    <div class="topMessage favorite">
                        <div class="menu-hd"><a href="#" target="_top"><i class="am-icon-heart am-icon-fw"></i><span>收藏夹</span></a></div>
                </ul>
                </div>

                
                <script src="text/javascript"></script>
                

                <!--悬浮搜索框-->

                <div class="nav white">
                    <div class="logo"><img src="static/images/logo.png" /></div>
                    <div class="logoBig">
                        <li><img src="static/images/logobig.png" /></li>
                    </div>

                    <div class="search-bar pr">
                        <a name="index_none_header_sysc" href="#"></a>
                        <form>
                            <input id="searchInput" name="index_none_header_sysc" type="text" placeholder="搜索" autocomplete="off">
                            <input id="ai-topsearch" class="submit am-btn" value="搜索" index="1" type="submit">
                        </form>
                    </div>
                </div>
			</div>
			<script>
                //收藏夹
                $(".favorite").click(function(){
                    $.ajax({ 
                            url: "{{ url('check_user') }}" , 
                            type: 'POST',
                            data: { _token : '<?php echo csrf_token()?>'},
                            dataType: 'json', 
                            success: function(data){ 
                                // console.log(data);
                                if(data.code==0)
                                {
                                   alert("请先登录");
                                   // window.location.href = "http://www.jb51.net";
                                }
                                //跳转购物车列表
                                 if(data.code==1)
                                 {
                                    var url = "collection_list";//此处拼接内容
                                    window.location.href = url;
                                 }
                            }, 
                            error: function(xhr, type){ 
                                alert('Ajax error!') 
                            } 
                        });
                });
                // <!-- 购物车 -->
                   $(".shop_car").click(function()
                   {
                       $.ajax({ 
                            url: "{{ url('check_user') }}" , 
                            type: 'POST',
                            data: { _token : '<?php echo csrf_token()?>'},
                            dataType: 'json', 
                            success: function(data){ 
                                console.log(data);
                                if(data.code==0)
                                {
                                   alert("请先登录");
                                   // window.location.href = "http://www.jb51.net";
                                }
                                //跳转购物车列表
                                 if(data.code==1)
                                {
                                    var url = "car_show";//此处可以拼接内容
                                    window.location.href = url;
                                }
                                
                            }, 
                            error: function(xhr, type){ 
                                alert('Ajax error!') 
                            } 
                        });
                   })
                </script>			
                @yield('content')
			</div>

	</body>

</html>