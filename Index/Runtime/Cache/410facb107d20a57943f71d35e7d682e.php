<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><!-- saved from url=(0048)http://store.weiapps.cn/index.php --><html><meta charset="utf-8" /><title><?php echo ($user_site['set_name']); ?></title><meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" /><meta name="description" content="<?php echo ($page_seo["description"]); ?>" /><meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport"><!--商城cssss begin--><link type="text/css" rel="stylesheet" href="__STATIC__/weixin/css/shop.css"><!--商城css end--><script type="text/javascript" src="__STATIC__/js/template.js"></script><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/dist/zepto.js"></script><!--<script src="http://code.baidu.com/touch-0.2.13.min.js"></script>--><script type="text/javascript" src="__STATIC__/GMU/dist/touch-0.2.13.min.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/offset.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/parseTpl.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/gmu.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/event.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/widget.js"></script><!--组件依赖js end--><link rel="stylesheet" type="text/css" href="__STATIC__/css/category_m.css" /><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/icons.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/loading.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><!--组件依赖css end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/extend/matchMedia.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.ortchange.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/slider.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/dots.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$touch.js"></script><!--组件依赖js end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$autoplay.js"></script><!--组件依赖js end--><script type="text/javascript" src="__STATIC__/GMU/src/extend/throttle.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.scrollStop.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/panel/panel.js"></script><!--组件依赖js end--><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><script type="text/javascript" src="__STATIC__/weixin/js/cart.js" charset="utf-8"></script><link rel="stylesheet" type="text/css" href="__STATIC__/css/item/item.css" /><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/button/button.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/button/button.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/icons.default.css" /><!--组件依赖css end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/extend/highlight.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/button/button.js"></script><!--组件依赖js end--><head></head><body id="touch"><div class ="com-content" ><div id="nav"><ul class="navlist"><li id="n_0" class="r"><span class="r" style ="background-size: 21px 22px;"></span></li><li class="r" id="n_1"><a class="r" href="<?php echo ($user_site['index_url']); ?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li><li class="r" id="n_2"><a class="r" href="<?php echo U('user/index');?>"><span class="r" style ="background-size: 23px 21px;"></span></a></li><li class="r" id="n_3"><a class="r"href="<?php echo U('shopcart/index');?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li></ul></div><div class="push"><div id="load" class="ui-loading" style=" margin-top: 50%;  margin-left: 45%;position: absolute;z-index:999"></div><div id="content"><?php if(count($_SESSION['cart'])==0){ ?><div class="null_shopping"><div class="cart_pic"></div><h4>您还没有宝贝，赶快去逛逛吧！</h4><p><a class="enter" href="<?php echo U('index/index');?>">马上去逛逛</a></p></div><?php }else{ ?><h3 id="chose_all"><b class="ico">全选商品</b></h3><ul class="cart_list"><?php if(is_array($item)): $i = 0; $__LIST__ = $item;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li id="cart_item_<?php echo ($vo["id"]); ?>"><p class="goods_info"><span class="img"><a href="<?php echo U('item/index',array('id'=>$vo['id']));?>" ><img src="<?php echo attach(get_thumb($vo['img'], '_m'), $_SESSION['user_token'].'/item');?>" height="80" width="80"></a></span><span class="tit"><a href="<?php echo U('item/index',array('id'=>$vo['id']));?>" ><?php echo ($vo["name"]); echo ($vo["spec_1"]); echo ($vo["spec_2"]); ?></a><br><span>价格:</span><span class="price1">￥<?php echo ($vo["price"]); ?></span><br><span>数量:</span><input type ="hidden" id="spec_id_<?php echo ($vo["id"]); ?>" value ="<?php echo ($vo["spec_id"]); ?>"></input><span ><a class="button" data-icon="minus" onClick="decrease_quantity(<?php echo ($vo["id"]); ?>,<?php echo ($vo["spec_id"]); ?>);"></a><input id="input_item_<?php echo ($vo["id"]); echo ($vo["spec_id"]); ?>" value="<?php echo ($vo["num"]); ?>" orig="1" changed="<?php echo ($vo["num"]); ?>" onKeyUp="change_quantity(<?php echo ($vo["id"]); ?>,<?php echo ($vo["spec_id"]); ?>, this);" class="button" style="height: 31px;bottom: 5px;"><a class="button" data-icon="plus" onClick="add_quantity(<?php echo ($vo["id"]); ?>,<?php echo ($vo["spec_id"]); ?>);"></a>(库存:<?php echo ($vo["goods_stock"]); ?>)
					  </span><span><a class="del" href="javascript:;" onClick="drop_cart_item(<?php echo ($vo["id"]); ?>,<?php echo ($vo["spec_id"]); ?>);"><img src="__STATIC__/weixin/images/del.png"  style="vertical-align: middle;height:20px;width=:20px"></a></span></span></p><p class="buy_info"><span class="total"><span>小计:</span><span class="price2" id="item<?php echo ($vo["id"]); echo ($vo["spec_id"]); ?>_subtotal">￥<?php echo sprintf("%01.2f",$vo['num']*$vo['price']); ?></span></span></p></li><?php endforeach; endif; else: echo "" ;endif; ?></ul><div class="buy_foot"><p class="goods_amount"><span>商品总价:</span><strong class="fontsize1" id="cart_amount">￥<?php echo ($sumPrice); ?></strong></p><p class="jiesuan_btn"><a href="<?php echo U('order/jiesuan');?>" class="btn"><span>去结算</span><img src="__STATIC__/weixin/images/jiesuan.png" width="50%"></a></p></div><?php } ?><div class="sku_tip" id="skuNotice" style="display:none"><span id="skuTitle2"></span></div>        ﻿
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
</script><div id="footer" ><p class="foot_nav"><a href="<?php echo U('index/index');?>">商城首页</a> | <a href="<?php echo U('user/index');?>">会员中心</a> | <a href="<?php echo U('index/comp_info');?>">品牌介绍</a></p><p class="foot_nav1"><?php echo ($user_site['set_company']); ?></p><p class="foot_nav1">All Rights Reserved.</p></div></body><script>    $('.button').button();
</script></html>