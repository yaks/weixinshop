<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><!-- saved from url=(0048)http://store.weiapps.cn/index.php --><html><meta charset="utf-8" /><title><?php echo ($user_site['set_name']); ?></title><meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" /><meta name="description" content="<?php echo ($page_seo["description"]); ?>" /><meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport"><!--商城cssss begin--><link type="text/css" rel="stylesheet" href="__STATIC__/weixin/css/shop.css"><!--商城css end--><script type="text/javascript" src="__STATIC__/js/template.js"></script><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/dist/zepto.js"></script><!--<script src="http://code.baidu.com/touch-0.2.13.min.js"></script>--><script type="text/javascript" src="__STATIC__/GMU/dist/touch-0.2.13.min.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/offset.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/parseTpl.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/gmu.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/event.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/widget.js"></script><!--组件依赖js end--><link rel="stylesheet" type="text/css" href="__STATIC__/css/category_m.css" /><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/icons.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/loading.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><!--组件依赖css end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/extend/matchMedia.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.ortchange.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/slider.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/dots.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$touch.js"></script><!--组件依赖js end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$autoplay.js"></script><!--组件依赖js end--><script type="text/javascript" src="__STATIC__/GMU/src/extend/throttle.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.scrollStop.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/panel/panel.js"></script><!--组件依赖js end--><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><head></head><body id="touch"><div class ="com-content" ><div id="nav"><ul class="navlist"><li id="n_0" class="r"><span class="r" style ="background-size: 21px 22px;"></span></li><li class="r" id="n_1"><a class="r" href="<?php echo ($user_site['index_url']); ?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li><li class="r" id="n_2"><a class="r" href="<?php echo U('user/index');?>"><span class="r" style ="background-size: 23px 21px;"></span></a></li><li class="r" id="n_3"><a class="r"href="<?php echo U('shopcart/index');?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li></ul></div><div class="push"><div id="load" class="ui-loading" style=" margin-top: 50%;  margin-left: 45%;position: absolute;z-index:999"></div><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$lazyloadimg.js"></script><link type="text/css" rel="stylesheet" href="__STATIC__/weixin/css/cate_list.css"><div id="content"><div class="pages"><section id="S_widgets" class="__page__ widget_page" ><div id="scroller1" ><ul id="J_widgetList"><?php if(is_array($cate_list)): $i = 0; $__LIST__ = $cate_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cate): $mod = ($i % 2 );++$i;?><li><a href="./index.php?m=book&a=cate&cateid=<?php echo ($cate["id"]); ?>"><img src="./data/upload/<?php echo ($cate["token"]); ?>/item_cate/<?php echo ($cate["img"]); ?>" alt="<?php echo ($cate["name"]); ?>"><span class="title"><?php echo ($cate["name"]); ?></span></a></li><?php endforeach; endif; else: echo "" ;endif; ?></section></div>        ﻿
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