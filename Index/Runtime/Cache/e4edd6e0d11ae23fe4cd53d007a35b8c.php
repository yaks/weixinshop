<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><!-- saved from url=(0048)http://store.weiapps.cn/index.php --><html><meta charset="utf-8" /><title><?php echo ($user_site['set_name']); ?></title><meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" /><meta name="description" content="<?php echo ($page_seo["description"]); ?>" /><meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport"><!--商城cssss begin--><link type="text/css" rel="stylesheet" href="__STATIC__/weixin/css/shop.css"><!--商城css end--><script type="text/javascript" src="__STATIC__/js/template.js"></script><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/dist/zepto.js"></script><!--<script src="http://code.baidu.com/touch-0.2.13.min.js"></script>--><script type="text/javascript" src="__STATIC__/GMU/dist/touch-0.2.13.min.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/offset.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/parseTpl.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/gmu.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/event.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/widget.js"></script><!--组件依赖js end--><link rel="stylesheet" type="text/css" href="__STATIC__/css/category_m.css" /><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/icons.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/loading.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><!--组件依赖css end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/extend/matchMedia.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.ortchange.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/slider.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/dots.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$touch.js"></script><!--组件依赖js end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$autoplay.js"></script><!--组件依赖js end--><script type="text/javascript" src="__STATIC__/GMU/src/extend/throttle.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.scrollStop.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/panel/panel.js"></script><!--组件依赖js end--><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/css/cate/cate.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/loading.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/refresh/refresh.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><!--组件依赖css end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$lazyloadimg.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/refresh/refresh.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/refresh/$lite.js"></script><!--向上拉动插件--><!--组件依赖js end--><head></head><body><div class ="com-content" ><div id="nav"><ul class="navlist"><li id="n_0" class="r"><span class="r" style ="background-size: 21px 22px;"></span></li><li class="r" id="n_1"><a class="r" href="<?php echo ($user_site['index_url']); ?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li><li class="r" id="n_2"><a class="r" href="<?php echo U('user/index');?>"><span class="r" style ="background-size: 23px 21px;"></span></a></li><li class="r" id="n_3"><a class="r"href="<?php echo U('shopcart/index');?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li></ul></div><div class="push"><div id="load" class="ui-loading" style=" margin-top: 50%;  margin-left: 45%;position: absolute;z-index:999"></div><div id="content"><div class="ui-refresh"><div class="mod_itemgrid data-list" id="itemCont"></div><div class="ui-refresh-down"></div></div><!--setup方式带有class为ui-refresh-down或ui-refresh-up的元素必须加上，用于放refresh按钮--><script id="item_list" type="text/html"><%each data as sub index%><div class="hproduct"><a href="./index.php?m=item&a=index&id=<%sub.id%>&token=<%sub.token%>"><p class="cover"><img src="./data/upload/<%sub.token%>/item/<%sub.img%>"></p><p class="fn"><%if sub.rexiao!='0'%><span class="dis"><%sub.rexiao%></span><%else%><span class="dis" style= "display:none;"><%sub.xinping%></span><%/if%><%if sub.xinping!='0'%><span class="dis"><%sub.xinping%></span><%else%><span class="dis" style= "display:none;"><%sub.xinping%></span><%/if%><span class="title"><%sub.title%></span></p><p class="prices"><%if sub.dis_flag=='1'%><strong><em>                    ￥<%sub.price | dateFormat:<?php echo ($discount); ?>%></em></strong><%if 10==<?php echo ($discount); ?>%><del>                ￥<%sub.markprice%></del><span class="discount"><%sub.sale%>折
            </span><%else%><del>                ￥<%sub.price%></del><span class="discount"><?php echo ($discount); ?>折
            </span><%/if%><%else%><strong><em>                    ￥<%sub.price%></em></strong><del>                ￥<%sub.markprice%></del><span class="discount"><%sub.sale%>折
            </span><%/if%></p></a></div><%/each%></script><script type="text/javascript">	var page =1;
	var item_list=<?php echo ($json_goods); ?>;
	function cutString(str, len) {
	if(str.length*2 <= len) {
		return str;
	}
	var strlen = 0;
	var s = "";
	for(var i = 0;i < str.length; i++) {
		s = s + str.charAt(i);
		if (str.charCodeAt(i) > 128) {
			strlen = strlen + 2;
			if(strlen >= len){
				return s.substring(0,s.length-1) + "...";
			}
		} else {
			strlen = strlen + 1;
			if(strlen >= len){
				return s.substring(0,s.length-2) + "...";
			}
		}
	}
	return s;
};
function isInteger(obj) {

    return obj%1 === 0

}
template.helper('dateFormat', function (date, format) {
	if(format==10)
		return date;
	
	if(format<10){
	var price =format*date/10;
	  if(isInteger(price)){
	  return price+'.00';
	  }else{
	  return price.toFixed(1)+'0'; 
	  } 
	 }


});	
    (function () {


template.config('openTag','<%');
template.config('closeTag','%>');

var html = template('item_list', item_list);
document.getElementById('itemCont').innerHTML = html;
		
        /*组件初始化js begin*/
        $('.ui-refresh').refresh({
            load: function (dir, type) {
                var me = this;
				
				
                $.get('./index.php?m=book&a=get_items_ajax&cateid=<?php echo ($cate_id); ?>&page='+page, function (data) {
					page+=1;
					console.log(data.status);
					if (data.status==0){
					
                    var $list = $('.data-list'),
                            html = (function (data) {      //数据渲染
                                var html_ajax = template('item_list', data);
                                return html_ajax;
                            })(data);

                    $list[dir == 'up' ? 'prepend' : 'append'](html);
                    me.afterDataLoading();
					}else{
					me.afterDataLoading();
					me.disable();
					}
					//数据加载完成后改变状态
			

			
			
						 $(".fn").each(function() {
					var maxh =document.body.scrollWidth
					var len = 36;
					if ( maxh < 350 )
					{ 
						len =24;
					}
                 inText = $(this).find('.dis')
				 text1=inText.text()
				 text2=inText.next().text()
				
	
				 if ( (text1.length+text2.length) <29){
				 
				   len=len-5;
				   }
				if ( (text1.length+text2.length) >29){
				 
				  len=len-10;
				   }
				   var inText = $(this).find('.title')
				   var text3 =inText.text();
				   inText.text(cutString(text3,len));
				   
				   
				   
				 				
				
          	
            });
			
			
			
                });
            }
        });
        /*组件初始化js end*/
		
		
		
    })();
</script>        ﻿
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
</script><div id="footer" ><p class="foot_nav"><a href="<?php echo U('index/index');?>">商城首页</a> | <a href="<?php echo U('user/index');?>">会员中心</a> | <a href="<?php echo U('index/comp_info');?>">品牌介绍</a></p><p class="foot_nav1"><?php echo ($user_site['set_company']); ?></p><p class="foot_nav1">All Rights Reserved.</p></div></body></html><script type="text/javascript">    (function () {
	
	

			
			 $(".fn").each(function() {
					var maxh =document.body.scrollWidth
					var len = 36;
					if ( maxh < 350 )
					{ 
						len =24;
					}
                 inText = $(this).find('.dis')
				 text1=inText.text()
				 text2=inText.next().text()
				
	
				 if ( (text1.length+text2.length) <29){
				 
				   len=len-5;
				   }
				if ( (text1.length+text2.length) >29){
				 
				  len=len-10;
				   }
				   var inText = $(this).find('.title')
				   var text3 =inText.text();
				   inText.text(cutString(text3,len));
				   
				   
				 				
				
          	
            });


    })();

</script>