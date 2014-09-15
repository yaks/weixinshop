<?php if (!defined('THINK_PATH')) exit();?><html><head><meta charset="utf-8" /><title><?php echo ($user_site['set_name']); ?></title><meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" /><meta name="description" content="<?php echo ($page_seo["description"]); ?>" /><meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport"><!--商城cssss begin--><link type="text/css" rel="stylesheet" href="__STATIC__/weixin/css/shop.css"><!--商城css end--><script type="text/javascript" src="__STATIC__/js/template.js"></script><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/dist/zepto.js"></script><!--<script src="http://code.baidu.com/touch-0.2.13.min.js"></script>--><script type="text/javascript" src="__STATIC__/GMU/dist/touch-0.2.13.min.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/offset.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/parseTpl.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/gmu.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/event.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/widget.js"></script><!--组件依赖js end--><link rel="stylesheet" type="text/css" href="__STATIC__/css/category_m.css" /><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/icons.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/loading.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><!--组件依赖css end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/extend/matchMedia.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.ortchange.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/slider.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/dots.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$touch.js"></script><!--组件依赖js end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$autoplay.js"></script><!--组件依赖js end--><script type="text/javascript" src="__STATIC__/GMU/src/extend/throttle.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.scrollStop.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/panel/panel.js"></script><!--组件依赖js end--><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--></head><body id="touch"><div class ="com-content" ><div id="nav"><ul class="navlist"><li id="n_0" class="r"><span class="r" style ="background-size: 21px 22px;"></span></li><li class="r" id="n_1"><a class="r" href="<?php echo ($user_site['index_url']); ?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li><li class="r" id="n_2"><a class="r" href="<?php echo U('user/index');?>"><span class="r" style ="background-size: 23px 21px;"></span></a></li><li class="r" id="n_3"><a class="r"href="<?php echo U('shopcart/index');?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li></ul></div><div class="push"><div id="load" class="ui-loading" style=" margin-top: 50%;  margin-left: 45%;position: absolute;z-index:999"></div><div id="content" class ='content'><div class="particular"><div class="particular_wrap"><dl class="order_detail"><dt class="til_font">订单详情</dt><dt>订单状态</dt><dd><?php switch($order["status"]): case "1": ?>待付款<?php break; case "2": ?>待发货<?php break; case "3": ?>待收货<?php break; case "4": ?>已完成<?php break; default: ?>已取消<?php endswitch;?></dd><dt>订单号</dt><dd><?php echo ($order["orderId"]); ?></dd><dt>下单时间</dt><dd><?php echo (date('Y-m-d H:i:s',$order["add_time"])); ?></dd></dl><div class="ware_line"><div class="ware"><?php if(is_array($item_detail)): $i = 0; $__LIST__ = $item_detail;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$item): $mod = ($i % 2 );++$i;?><div class="ware_list"><div class="ware_pic"><img src="<?php echo attach(get_thumb($item['img'], '_b'), $_SESSION['user_token'].'/item');?>" height="50" width="50"></div><div class="ware_text"><div class="ware_text1"><a href="#"><?php echo ($item["title"]); echo ($item["spec_1"]); echo ($item["spec_2"]); ?></a><br><span></span></div><div class="ware_text2"><span>数量:<strong><?php echo ($item["quantity"]); ?></strong></span><span>价格:<strong>¥<?php echo ($item["price"]); ?></strong></span><?php if($item["comment_flag"] == 1): ?><a class="order_cancel" href="<?php echo U('item/comment',array('item_id'=>$item['item_id']));?>" > 评价</a><?php endif; ?></div></div></div><?php endforeach; endif; else: echo "" ;endif; ?><div class="transportation"><!--优惠打折<span>¥0.00</span><br>--><?php if($order["freetype"] == 0): ?>卖家包邮 <?php else: ?>                    运费:<span>¥<?php echo ($order["freeprice"]); ?><strong>(<?php switch($order["freetype"]): case "1": ?>平邮<?php break; case "2": ?>快递<?php break; default: ?>EMS<?php endswitch;?>)</strong></span><?php endif; ?><br>                    	总价:<b>¥<?php echo ($order["order_sumPrice"]); ?></b></div><?php if($order["status"] != 1): ?><ul class="order_detail_list"><li>支付方式:<?php switch($order["supportmetho"]): case "1": ?>支付宝<?php break; case "3": ?>支付宝转账<?php break; default: ?>货到付款<?php endswitch;?></li><?php if($order["supportmetho"] == 3): ?></li>支付宝账号:<?php echo ($order["ali_name"]); ?></li><?php endif; if($order["supportmetho"] == 4): ?></li>转账信息:<?php echo ($order["bank_info"]); ?></li><?php endif; ?><li>下单时间:<?php echo (date('Y-m-d H:i:s',$order["support_time"])); ?></li></ul><?php endif; ?><ul class="order_detail_list"><li>配送快递:  <?php if($order["userfree"] == '0'): ?>无需快递<?php elseif($order["userfree"] != '' and $order["userfree"] != '0' ): echo ($order["userfree"]); else: ?>-<?php endif; ?></li><li>快递编号:<?php if($order["freecode"] == ''): ?>-<?php else: echo ($order["freecode"]); endif; ?></li><li>发货时间:<?php if($order["fahuo_time"] == ''): ?>-<?php else: echo (date('Y-m-d H:i:s',$order["fahuo_time"])); endif; ?></li></ul></div></div><dl><dt class="til_font">物流信息</dt><dt>收货地址</dt><dd><?php echo ($order["address_name"]); ?>, &nbsp;<?php echo ($order["mobile"]); ?>, <?php echo ($order["address"]); ?></dd><dt>配送方式</dt><dd><?php switch($order["freetype"]): case "1": ?>平邮<?php break; case "2": ?>快递<?php break; case "3": ?>EMS<?php break; default: ?>卖家包邮<?php endswitch;?></dd></dl></div><div class="clear"></div><?php if($order["status"] == 1): ?><div class="btn_list"><a class="order_cancel" href="<?php echo U('order/cancelOrder',array('orderId'=>$order['orderId']));?>" id="order118_action_cancel"> 取消订单</a><a class="order_pay" href="<?php echo U('order/pay',array('orderId'=>$order['orderId']));?>" id="order118_action_pay">付款</a></div><?php endif; ?><div class="adorn_right2"></div><div class="adorn_right3"></div><div class="adorn_right4"></div></div><div class="clear"></div>﻿
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