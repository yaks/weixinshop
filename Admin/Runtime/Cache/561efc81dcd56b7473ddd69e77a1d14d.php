<?php if (!defined('THINK_PATH')) exit();?>﻿
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black" />
<title>店铺首页预览--微信商城</title>
<meta name="description" content="微信商城是一个能在你的微信聊天窗口自定义导航菜单,分组群发,对话及搜索商品,橱窗展示的微信商城系统工具,而且还有丰富的营销插件帮助你和会员进行互动,可以让你的微信瞬间变成商城APP。" />
<meta name="keywords" content="微信商城,微商城,微信商城,微信购物,微购物,社会化电商,移动电商" />
<script type="text/javascript" src="__STATIC__/weixin/item/jquery.js" charset="utf-8"></script>
</head>
<style>
.mask{background:url(static/images/admin/preview/bg.jpg); height:100%; width:100%; position:fixed; top:0; left:0;z-index:999; overflow:scroll;}
.mask .phone{background:url(static/images/admin/preview/phone.png) no-repeat; width:800px; height:746px; position:relative; margin:0 auto; z-index:1000;}
.mask .phone_right{background:url(static/images/admin/preview/phone.png) no-repeat right; width:50px; height:746px; position:absolute; right:400px; top:0; z-index:2222;}
.mask .preview{position:absolute; left:45px; top:156px; z-index:1234; background:#fff;}
.mask .right{width:316px;  overflow:hidden; position:absolute; right:50px; top:180px;}
.mask .right h1{color: #F5F5F5; font-size: 26px;font-weight: normal; margin: 35px 0 25px;text-align: center;text-shadow: 0 1px 3px #111111;}
.mask .right p{color:#B4B7BC; text-align:center;text-shadow: 0 -1px 0 #111112; font-size:12px;}
.mask .r_top{background:url(static/images/admin/preview/r_top.png) no-repeat; height:25px; display:block;}
.mask .r_center{background:url(static/images/admin/preview/r_center.png) repeat-y;  display:block; text-align:left; color:#fff; text-shadow: 0 -1px 0 #111112;color: #B4B7BC; padding:0 20px; width:276px; font-size:14px;}
.mask .r_bottom{background:url(static/images/admin/preview/r_bottom.png) no-repeat; height:25px; display:block;}
</style>
<body>

<div class="mask">
    <div class="phone">
    	<div class="phone_right"></div>
        <div class="close"></div>
        <iframe id ="preview" class="preview" src="index.php?token=<?php echo ($token); ?>" width="337" height="454" frameborder="0" scrolling="auto"></iframe>
		
        <div class="right">
        	<h1>微信商城多用户商城在线预览</h1>
            <span class="r_top"></span>
            <span class="r_center">为了能正常显示，请在高版本浏览器上查看。该页面只支持预览功能,不能进行操作。</span>
            <span class="r_bottom"></span>
            <p>&copy; 2001-2014 比斯迈科技版权所有</p>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){
if ($.browser.msie ) { 

$("#preview").attr("src","admin.php?m=templet&a=logo");


} 

});
</script>
</body>
</html>