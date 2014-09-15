<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html><html><head><meta charset="utf-8" /><title><?php echo ($user_site['set_name']); ?></title><meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" /><meta name="description" content="<?php echo ($page_seo["description"]); ?>" /><meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport"><!--商城cssss begin--><link type="text/css" rel="stylesheet" href="__STATIC__/weixin/css/shop.css"><!--商城css end--><script type="text/javascript" src="__STATIC__/js/template.js"></script><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/dist/zepto.js"></script><!--<script src="http://code.baidu.com/touch-0.2.13.min.js"></script>--><script type="text/javascript" src="__STATIC__/GMU/dist/touch-0.2.13.min.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/offset.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/parseTpl.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/gmu.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/event.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/widget.js"></script><!--组件依赖js end--><link rel="stylesheet" type="text/css" href="__STATIC__/css/category_m.css" /><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/icons.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/loading.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><!--组件依赖css end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/extend/matchMedia.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.ortchange.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/slider.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/dots.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$touch.js"></script><!--组件依赖js end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$autoplay.js"></script><!--组件依赖js end--><script type="text/javascript" src="__STATIC__/GMU/src/extend/throttle.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.scrollStop.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/panel/panel.js"></script><!--组件依赖js end--><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--></head><style type="text/css">@charset "UTF-8";
.wx_bar_back a:after,.wx_backtop:after,.wx_bar_new:after,.wx_bar_best:before
{
	background-image: url(__STATIC__/weixin/images/sprites_v2.png);
	background-repeat: no-repeat;
	background-size: 100px 100px;
}
*
{
	outline: 0;
	webkit-tap-highlight-color: transparent;
}
body,h1,h2,h3,h4,h5,h6,hr,p,blockquote,dl,dt,dd,ul,ol,li,pre,form,fieldset,legend,button,input,textarea,th,td
{
	margin: 0;
	padding: 0;
	vertical-align: baseline;
}
img
{
	border: 0 none;
}
i,em
{
	font-style: normal;
}
ol,ul
{
	list-style: none;
}
input,select,h1,h2,h3,h4,h5,h6
{
	font-size: 100%;
}
table
{
	border-collapse: collapse;
	border-spacing: 0;
}
a
{
	color: #333;
	text-decoration: none;
}
a,img
{
	webkit-touch-callout: none;
}
body
{
	background: #FFF;
	color: #666;
	font-family: Helvetica,STHeiti STXihei, Microsoft JhengHei, Microsoft YaHei, Arial;
	font-size: 14px;
	height: 100%;
	line-height: 1.5;
	margin: 0 auto;
	user-select: none;
	webkit-text-size-adjust: 100%;
	webkit-user-select: none;
}
.hide,.h
{
	display: none !important;
}
.link_blue
{
	color: #007AFF;
}
.wx_bar_back a:after,.wx_backtop:after,.wx_bar_new:after,.wx_bar_best:before
{
	content: '\20';
	display: block;
}
.wx_bar
{
	background-color: #e7e7e7;
	height: 45px;
	line-height: 45px;
	position: relative;
	width: 100%;
}
.wx_bar_fixed
{
	left: 0;
	position: fixed;
	top: 0;
	z-index: 30;
}
.wx_bar_tit
{
	color: #333;
	font-size: 18px;
	font-weight: normal;
	height: 45px;
	text-align: center;
	width: 100%;
}
.wx_bar_back
{
	height: 45px;
	position: absolute;
	width: 20%;
}
.wx_bar_back a
{
	display: block;
	height: 100%;
	overflow: hidden;
}
.wx_bar_back a:after
{
	background-position: 0 0;
	display: block;
	height: 25px;
	margin: 10px 0 0 15px;
	width: 25px;
}
.wx_bar_back a:active
{
	background-color: rgba(0, 0, 0, 0.2);
}
.wx_bar_best
{
	background-color: #685c5b;
	border-radius: 2px;
	color: #fff;
	display: block;
	font-size: 12px;
	height: 25px;
	line-height: 26px;
	margin: 10px 15px 0 0;
	padding: 0 0 0 32px;
	position: relative;
	webkit-border-radius: 2px;
	width: 56px;
}
.wx_bar_best:before
{
	background-position: -60px -50px;
	display: block;
	height: 20px;
	left: 6px;
	position: absolute;
	top: 2px;
	width: 20px;
}
.wx_bar_act
{
	height: 45px;
	position: absolute;
	right: 0;
	top: 0;
}
.wx_bar_new
{
	display: block;
	height: 100%;
	overflow: hidden;
	width: 60px;
}
.wx_bar_new:after
{
	background-position: -25px 0;
	display: block;
	float: right;
	height: 25px;
	margin: 10px 15px 0 0;
	width: 25px;
}
.wx_bar_new:active
{
	background-color: rgba(0, 0, 0, 0.2);
}
.wx_con
{
	padding-top: 45px;
}
.WX_bar_2
{
	box-sizing: border-box;
	padding-left: 86px;
	webkit-box-sizing: border-box;
}
.WX_bar_2 .WX_nav
{
	float: none;
	margin: 0 auto;
}
.WX_bar_2 .WX_bar_back
{
	color: #fff;
	left: 0;
	position: absolute;
	top: 0;
	width: 100px;
}
.WX_bar_2 .WX_bar_back .WX_bar_back_tit:after
{
	display: none;
}
.WX_bar_2 .WX_bar_back_tit span,.WX_bar_2 .WX_bar_back_tit span:after,.WX_bar_2 .WX_bar_back_tit em
{
	background-image: url(__STATIC__/weixin/images/WX_bar_back.png);
	background-repeat: no-repeat;
	background-size: 25px 90px;
}
.WX_bar_2 .WX_bar_back_tit span
{
	float: left;
	height: 30px;
	line-height: 30px;
	margin: 7px 0 0 15px;
	padding-left: 25px;
}
.WX_bar_2 .WX_bar_back_tit em
{
	background-position: 0 -30px;
	background-repeat: repeat-x;
	float: left;
	padding: 0 0 0 6px;
}
.WX_bar_2 .WX_bar_back_tit span:after
{
	background-position: 100% -60px;
	content: '\20';
	float: left;
	height: 30px;
	width: 12px;
}
.wx_footer
{
	margin: 15px 0;
}
.wx_footer a:active
{
	background-color: rgba(0, 0, 0, 0.2);
}
.wx_footer .copyright
{
	font-size: 12px;
	text-align: center;
}
.wx_footer .copyright a
{
	display: block;
	margin: 0 100px;
	padding: 12px 0 7px 0;
}
.wx_footer .userinfo
{
	background-color: #fff;
	border: 1px solid #E0E0E0;
	border-width: 1px 0;
	height: 43px;
	line-height: 43px;
	overflow: hidden;
}
.wx_footer .userinfo a
{
	float: left;
}
.wx_footer .userinfo .nickname,.wx_footer .userinfo .login
{
	padding: 0 15px;
}
.wx_footer .userinfo .logout
{
	color: #999;
}
.wx_footer .userinfo .back
{
	float: right;
	padding: 0 30px 0 15px;
	position: relative;
}
.wx_footer .userinfo .back:before
{
	border-bottom: 2px solid #666;
	border-right: 2px solid #666;
	content: "";
	height: 7px;
	position: absolute;
	right: 15px;
	top: 19px;
	webkit-transform: rotate(-135deg);
	width: 7px;
}
.wx_loading
{
	background-color: transparent;
	bottom: 0;
	left: 0;
	position: fixed;
	right: 0;
	top: 0;
	z-index: 90;
}
.wx_loading_inner
{
	background-color: rgba(0, 0, 0, 0.5);
	border-radius: 6px;
	color: #fff;
	font-size: 14px;
	left: 50%;
	margin-left: -70px;
	margin-top: -48px;
	padding: 58px 0 10px 0;
	position: fixed;
	text-align: center;
	top: 50%;
	width: 140px;
}
.wx_loading_icon
{
	animation: gif 1s infinite linear;
	border: 2px solid #fff;
	border-radius: 24px;
	clip: rect(0 auto 12px 0);
	height: 24px;
	left: 50%;
	margin-left: -16px;
	position: absolute;
	top: 15px;
	webkit-animation: gif 1s infinite linear;
	width: 24px;
}
@keyframes gif
{
	0%
	{
		transform: rotate(0deg);
	}
	100%
	{
		transform: rotate(360deg);
	}
}
@-webkit-keyframes gif
{
	0%
	{
		webkit-transform: rotate(0deg);
	}
	100%
	{
		webkit-transform: rotate(360deg);
	}
}
.wx_loading2
{
	height: 32px;
	padding: 5px;
	position: relative;
	text-align: center;
}
.wx_loading2 .wx_loading_icon
{
	border-color: #237FE5;
	top: 7px;
}
.wx_loader
{
	background-color: rgba(0, 0, 0, 0.5);
	border-radius: 6px;
	color: #fff;
	font-size: 14px;
	height: 60px;
	left: 50%;
	line-height: 60px;
	margin: -30px 0 0 -60px;
	position: absolute;
	text-align: center;
	top: 50%;
	width: 120px;
}
.wx_ending
{
	line-height: 18px;
	padding: 10px;
	text-align: center;
}
.wx_ending strong
{
	color: #FF8C00;
}
.my_nav
{
	box-sizing: border-box;
	webkit-box-sizing: border-box;
}
.my_menu:after
{
	clear: both;
	content: '\20';
	display: block;
}
body
{
	background-color: #f3f3f3;
}
.wx_wrap
{
	position: relative;
}
.my_profile
{
	height: 55px;
	padding: 15px;
}
.my_profile .avatar
{
	border-radius: 55px;
	float: left;
	height: 55px;
	margin-right: 10px;
	overflow: hidden;
	width: 55px;
}
.my_profile .avatar img
{
	height: 55px;
	width: 55px;
}
.my_profile .nickname
{
	color: #333;
	font-size: 18px;
	line-height: 34px;
	overflow: hidden;
	text-overflow: ellipsis;
	white-space: nowrap;
}
.my_profile .id
{
	color: #999;
}
.my_nav
{


	border-width: 1px 0;
	background-color: #fff;
	border: 1px solid #e0e0e0;
	
	border-width: 1px 0;
	
	border-width: 1px 0;
	margin: 0 0 15px 0;
	width: 100%;
}
.my_nav ul
{
	display: -webkit-box;
}
.my_nav .tiao
{
	border-left: 1px solid #e0e0e0;
	border-left: 1px;
	font-size: 12px;
	text-align: center;
	webkit-box-flex: 1;
	width: 24%;
}

.my_nav .tiao1
{
	border-left: 1px solid #e0e0e0;
	border-left: 1px;
	background-color: #e0e0e0;
	width: 1px;

}
.my_nav li:first-child
{
	border-left: 0;
}
.my_nav li:active
{
	background-color: rgba(0, 0, 0, 0.2);
}
.my_nav li.cur
{
	background-color: #f9f9f9;
}
.my_nav a
{
	display: block;
	height: 36px;
	line-height: 24px;
	padding: 12px 0;
}
.my_nav em
{
	display: block;
	font-size: 18px;
	height: 18px;
	line-height: 18px;
}
.my_nav .num
{
	color: #FC004D;
}
.my_nav li:last-child em
{
	line-height: 10px;
}
.my_nav_fixed
{
	left: 0;
	position: fixed;
	top: 45px;
	z-index: 30;
}
.my_nav_fixed ~ .my_order_wrap
{
	padding-top: 106px;
}
.my_menu
{
	background-color: #fff;
	border: 1px solid #e0e0e0;
	border-width: 1px 0;
}
.my_menu ul
{
	margin-bottom: -1px;
	overflow: hidden;
}
.my_menu li
{
	border-bottom: 1px solid #e0e0e0;
	color: #333;
	float: left;
	height: 20px;
	line-height: 20px;
	padding: 15px 0;
	position: relative;
	width: 50%;
}
.my_menu li:active
{
	background-color: rgba(0, 0, 0, 0.2);
}
.my_menu li:nth-child(2n)
{
	border-left: 1px solid #e0e0e0;
	margin-right: -1px;
}
.my_menu span
{
	display: block;
	margin: 0 auto;
	width: 96px;
}
.my_menu span:before
{
	background: url(__STATIC__/weixin/images/icon_my.png) no-repeat;
	background-size: 120px 25px;
	content: '\20';
	float: left;
	height: 25px;
	margin-right: 8px;
	margin-top: -3px;
	width: 30px;
}
.my_menu .m1:before
{
	background-position: 0px 0;
}
.my_menu .m2:before
{
	background-position: -30px 0;
}
.my_menu .m3:before
{
	background-position: -60px 0;
}
.my_menu .m4:before
{
	background-position: -90px 0;

}
</style><body id="touch"><div class ="com-content" ><div id="nav"><ul class="navlist"><li id="n_0" class="r"><span class="r" style ="background-size: 21px 22px;"></span></li><li class="r" id="n_1"><a class="r" href="<?php echo ($user_site['index_url']); ?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li><li class="r" id="n_2"><a class="r" href="<?php echo U('user/index');?>"><span class="r" style ="background-size: 23px 21px;"></span></a></li><li class="r" id="n_3"><a class="r"href="<?php echo U('shopcart/index');?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li></ul></div><div class="push"><div id="load" class="ui-loading" style=" margin-top: 50%;  margin-left: 45%;position: absolute;z-index:999"></div><div id="content"><div class="wx_wrap" ><div class="my_profile"><div class="avatar"><img id="uinLogo" src="<?php echo ($user_info["headimgurl"]); ?>" alt=""></div><div class="id" id="qqid"><?php echo ($user_info["nickname"]); if($user_info["subscribe"] == 0): ?><a class="r" href="https://open.weixin.qq.com/connect/oauth2/authorize?appid=<?php echo ($appid); ?>&redirect_uri=http://shop.bismai.com/index.php/weixin/?a=author&response_type=code&scope=snsapi_base&state=1#wechat_redirect&baaaaa=aaaa">已关注点击刷新</a><?php endif; ?></div><div class="id" id="nickname" ><?php echo ($user_info["level_name"]); ?></div><div class="id" id="nickname" >积分:<?php echo ($user_info["score"]); ?></div><a style="display:none" href="<?php echo U('user/logout');?>">退出</a></div><div class="my_nav"><ul><li class="tiao" ><a href="<?php echo U('user/userorder',array('status'=>'1'));?>" ><em id="payDeaLNum"><?php echo ($status1); ?></em>待付款</a></li><li class="tiao1" ></li><li class="tiao" ><a href="<?php echo U('user/userorder',array('status'=>'2'));?>" ><em id="payDeaLNum"><?php echo ($status4); ?></em>待发货</a></li><li class="tiao1" ></li><li class="tiao" ><a href="<?php echo U('user/userorder',array('status'=>'3'));?>"><em id="receiveDeaLNum"><?php echo ($status2); ?></em>待收货</a></li><li class="tiao1" ></li><li class="tiao" ><a href="<?php echo U('user/userorder');?>"><em id="receiveDeaLNum" style="line-height:18px;"><?php echo ($status3); ?></em>所有订单</a></li></ul></div><div class="my_menu"><ul><li class="tiao" ><a href="<?php echo U('shopcart/index');?>"><span class="m1">购物车<i id="cartNum"></i></a></span></li><li class="tiao" ><a href="<?php echo U('user/address');?>"><span class="m2">收货地址</span></a></li></ul></div></div>﻿
	</div></div><div class="panel" id="panel_content"></div><script id="list_cate" type="text/html"><ul class="mod_list category" id="allcontent"><%each data as value i%><li keywordid="<%value.id%>" class=""><%if value.sub_cate!==null%><div class="list_inner level1"><p class="cat_desc"><%value.name%></p></div><%else%><a href="./index.php?m=book&a=cate&cateid=<%value.id%>"><div class="list_inner level"><p class="cat_desc"><%value.name%></p></div></a><%/if%><ul class="mod_list sub_category" style="opacity: 1;"><%each value.sub_cate as sub i%><li><a href="./index.php?m=book&a=cate&cateid=<%sub.id%>"><div class="list_inner"><div class="big" url=""><%sub.name%></div></div></a></li><%/each%></ul></li><%/each%></ul></script><script>$(function ($) {
	function showMenu2($curMenuDom, keywordid) {
	var next = $curMenuDom;
        if (next.css("display") == "none") {
            next.css("opacity", "0").show().animate({
                opacity: 1
            },
            500);
            var visibleHeight = $(window).height() + $(window).scrollTop(),
            objHeight = next.offset().top + next.height();
            if (objHeight > visibleHeight) {}
        } else {
            next.hide();
        }
    }
		      
	$.get('./index.php?m=book&a=get_cate_ajax', function (data) {
       
	   (function (data) {				
						template.config('openTag','<%');
						template.config('closeTag','%>');
						cate_data=data
						var html = template('list_cate', data);
						document.getElementById('panel_content').innerHTML = html;

        $('.level1').on('tap',
        function(e) {
            e.preventDefault();
            if ($(this).hasClass('level1')) {
                showMenu2($(this).next(), $(this).parent().attr("keywordid"));
                $(this).parent().toggleClass('opened');
            }
        });
		
        $(".sub_category li").on('tap',
        function(_event) {
            var target = $(_event.target || _event.srcElement),
            _tar = target.find('[class="big"]');
            go(target.find('[class="big"]').attr('url'));
        });

         })(data);
    });			
  });
</script><script type="text/javascript">    $(function ($) {
        $('.panel').panel({
            contentWrap: $('.push'),
			scrollMode:'follow',
			dismissible:false	
        });

        $('#n_0').on('tap', function () {
            $('.panel').panel('toggle', 'push', 'left');
        });
		  
		touch.on('#touch', 'swipeleft', function(ev){
            $('.panel').panel('close');
        });	  
    }(Zepto));
		

	window.onload=function(){
	$('#load').removeClass('ui-loading');
	var maxh =document.body.scrollHeight
	$('.com-content').css('min_height', document.body.scrollHeight);
	var footer_top=maxh-document.getElementById("content").offsetHeight-48-65;
	$('#footer').css('top', footer_top);
	
	}		
</script><div id="footer" ><p class="foot_nav"><a href="<?php echo U('index/index');?>">商城首页</a> | <a href="<?php echo U('user/index');?>">会员中心</a> | <a href="<?php echo U('index/comp_info');?>">品牌介绍</a></p><p class="foot_nav1"><?php echo ($user_site['set_company']); ?></p><p class="foot_nav1">All Rights Reserved.</p></div></body></html>