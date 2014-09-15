<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="utf-8" /><title><?php echo ($user_site['set_name']); ?></title><meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" /><meta name="description" content="<?php echo ($page_seo["description"]); ?>" /><meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport"><!--商城cssss begin--><link type="text/css" rel="stylesheet" href="__STATIC__/weixin/css/shop.css"><!--商城css end--><script type="text/javascript" src="__STATIC__/js/template.js"></script><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/dist/zepto.js"></script><!--<script src="http://code.baidu.com/touch-0.2.13.min.js"></script>--><script type="text/javascript" src="__STATIC__/GMU/dist/touch-0.2.13.min.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/offset.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/parseTpl.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/gmu.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/event.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/widget.js"></script><!--组件依赖js end--><link rel="stylesheet" type="text/css" href="__STATIC__/css/category_m.css" /><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/icons.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/loading.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><!--组件依赖css end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/extend/matchMedia.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.ortchange.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/slider.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/dots.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$touch.js"></script><!--组件依赖js end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$autoplay.js"></script><!--组件依赖js end--><script type="text/javascript" src="__STATIC__/GMU/src/extend/throttle.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.scrollStop.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/panel/panel.js"></script><!--组件依赖js end--><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--></head><body id="touch"><div class ="com-content" ><div id="nav"><ul class="navlist"><li id="n_0" class="r"><span class="r" style ="background-size: 21px 22px;"></span></li><li class="r" id="n_1"><a class="r" href="<?php echo ($user_site['index_url']); ?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li><li class="r" id="n_2"><a class="r" href="<?php echo U('user/index');?>"><span class="r" style ="background-size: 23px 21px;"></span></a></li><li class="r" id="n_3"><a class="r"href="<?php echo U('shopcart/index');?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li></ul></div><div class="push"><div id="load" class="ui-loading" style=" margin-top: 50%;  margin-left: 45%;position: absolute;z-index:999"></div><div id="content"><div class="public"><?php if(!empty($item_orders)): if(is_array($item_orders)): $i = 0; $__LIST__ = $item_orders;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="order_form"><p class="num">订单号: <?php echo ($vo["orderId"]); ?></p><?php if(is_array($vo["items"])): $i = 0; $__LIST__ = $vo["items"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="con"><p class="ware_pic"><a href="<?php echo U('item/index',array('id'=>$item['itemId']));?>" ><img src="<?php echo attach(get_thumb($item['img'], '_b'), $_SESSION['user_token'].'/item');?>" height="80" width="80"></a></p><p class="ware_text"><a href="<?php echo U('item/index',array('id'=>$item['itemId']));?>"><?php echo ($item["title"]); echo ($item["spec_1"]); echo ($item["spec_2"]); ?></a><br><span class="attr"></span></p><p class="price">价格: <span>¥<?php echo ($item["price"]); ?></span></p><p class="amount">数量: <span><?php echo ($item["quantity"]); ?><br></span></p><p class="ware_text"><span><?php switch($vo["status"]): case "4": ?><!-- 待收货 --><?php if($item["comment_flag"] == 0): ?><a href="<?php echo U('order/comment',array('itemid'=>$item['itemId'],'status'=>$status));?>" >商品评价</a><?php endif; break; default: endswitch;?></span></p><p class="price"><span></div><?php endforeach; endif; else: echo "" ;endif; ?><div class="clear"></div><div class="foot"><p class="time">添加时间:<?php echo (date('Y-m-d H:i:s',$vo["add_time"])); ?></p><div class="handle"><div style="float:left;">
                                订单总价: <b id="order118_order_amount">¥<?php echo ($vo["order_sumPrice"]); ?>&nbsp;&nbsp;</b></div><?php switch($vo["status"]): case "1": ?><!--待付款 --><a href="<?php echo U('order/pay',array('orderId'=>$vo['orderId']));?>" id="order118_action_pay" class="btn">付款</a><a href="<?php echo U('order/cancelOrder',array('orderId'=>$vo['orderId']));?>" id="order118_action_cancel" style="font-size: 12px;"> 取消订单</a><a href="<?php echo U('order/checkOrder',array('orderId'=>$vo['orderId'],'status'=>$status));?>"  style="font-size: 12px;margin-left: 12px; ">查看订单</a><?php break; case "2": ?><!--待发货 --><a href="<?php echo U('order/cancelOrder',array('orderId'=>$vo['orderId']));?>" id="order118_action_cancel" style="font-size: 12px;"> 取消订单</a><a href="<?php echo U('order/checkOrder',array('orderId'=>$vo['orderId'],'status'=>$status));?>" style="font-size: 12px;margin-left: 12px;">查看订单</a><?php break; case "3": ?><!-- 待收货 --><a href="<?php echo U('order/confirmOrder',array('orderId'=>$vo['orderId'],'status'=>$status));?>" id="order118_action_confirm" style="font-size: 12px;" >确认收货</a><a href="<?php echo U('order/checkOrder',array('orderId'=>$vo['orderId'],'status'=>$status));?>" style="font-size: 12px;margin-left: 12px;" >查看订单</a><?php break; default: ?><a href="<?php echo U('order/checkOrder',array('orderId'=>$vo['orderId'],'status'=>$status));?>" style="font-size: 10px;">查看订单</a><?php endswitch;?></div></div></div><?php endforeach; endif; else: echo "" ;endif; else: ?><div class="order_form member_no_records"><span>没有符合条件的记录</span></div><?php endif; ?></div>﻿
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