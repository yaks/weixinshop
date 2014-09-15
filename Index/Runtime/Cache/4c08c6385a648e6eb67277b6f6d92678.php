<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta charset="utf-8" /><title><?php echo ($user_site['set_name']); ?></title><meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" /><meta name="description" content="<?php echo ($page_seo["description"]); ?>" /><meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport"><!--商城cssss begin--><link type="text/css" rel="stylesheet" href="__STATIC__/weixin/css/shop.css"><!--商城css end--><script type="text/javascript" src="__STATIC__/js/template.js"></script><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/dist/zepto.js"></script><!--<script src="http://code.baidu.com/touch-0.2.13.min.js"></script>--><script type="text/javascript" src="__STATIC__/GMU/dist/touch-0.2.13.min.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/offset.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/parseTpl.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/gmu.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/event.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/widget.js"></script><!--组件依赖js end--><link rel="stylesheet" type="text/css" href="__STATIC__/css/category_m.css" /><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/icons.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/loading.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><!--组件依赖css end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/extend/matchMedia.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.ortchange.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/slider.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/dots.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$touch.js"></script><!--组件依赖js end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$autoplay.js"></script><!--组件依赖js end--><script type="text/javascript" src="__STATIC__/GMU/src/extend/throttle.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.scrollStop.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/panel/panel.js"></script><!--组件依赖js end--><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--></head><body id="touch"><div class ="com-content" ><div id="nav"><ul class="navlist"><li id="n_0" class="r"><span class="r" style ="background-size: 21px 22px;"></span></li><li class="r" id="n_1"><a class="r" href="<?php echo ($user_site['index_url']); ?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li><li class="r" id="n_2"><a class="r" href="<?php echo U('user/index');?>"><span class="r" style ="background-size: 23px 21px;"></span></a></li><li class="r" id="n_3"><a class="r"href="<?php echo U('shopcart/index');?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li></ul></div><div class="push"><div id="load" class="ui-loading" style=" margin-top: 50%;  margin-left: 45%;position: absolute;z-index:999"></div><div id="content"><h4 class="add_title"><a class="enter" href="<?php echo U('user/address');?>">管理收货地址</a></h4><div class="order_address_list"><h4 class="add_title">收货人地址</h4><script type="text/javascript" src="__STATIC__/weixin/js/mlselection.js" charset="utf-8"></script><link href="__STATIC__/weixin/css/dialog.css" rel="stylesheet" type="text/css"><script type="text/javascript" language="javascript" src='__STATIC__/weixin/js/dizhi2.js'></script><script type="text/javascript" language="javascript" src='__STATIC__/weixin/js/diqu2.js'></script><link rel="stylesheet" type="text/css" href="__STATIC__/css/item/item.css" /><script>		function showSkuNotice(str, t) {
        if (!str) return;
        t = t ? t: 2000;
        $('#skuTitle2').html(str);
        $('#skuNotice').show();
        $('#skuNotice').css('margin-left', '-' + ($('#skuNotice').width()) / 2 + 'px');
        setTimeout(function() {
            $('#skuNotice').hide();
        },
        t);
    };
        $(function(){

        	$('input[name=address_options]').change(function(){
        		if($(this).val()==0)
        		{
        			$('#address_form').show();
        		}else
        		{
        			$('#address_form').hide();
        		}
        	});
        	set_address();
        })

        function set_address()
        {
        	var addr_id = $("input[name='address_options']:checked").val();

        	if(addr_id == 0)
        	{

        		$('#address_form').show();
        	}
        	else
        	{
        		$('#address_form').hide();

        	}
        }

        function ordertj()
        {
        	var addr_id = $("input[name='address_options']:checked").val();
        	if(addr_id == 0)
        	{
        		var consignee=  $.trim($('#consignee').val());
        		var address=  $.trim($('#address').val());
        		var phone_mob=  $.trim($('#phone_mob').val());
        		var sheng=  $.trim($('#s1').val());

        		if(consignee=='')
        		{
        			showSkuNotice('请输入收货人姓名');
        			return false;
        		}
        		if(sheng=='')
        		{
        			showSkuNotice('请选择所在地区');return false;
        		}

        		if(address=='')
        		{
        			showSkuNotice('请输入详细地址');
        			return false;
        		}
        		if(phone_mob=='')
        		{
        			showSkuNotice('请输入手机号码');
        			return false;
        		}
        		if(isNaN(phone_mob))
        		{
        			showSkuNotice('请输入正确的手机号码');return false;
        		}
        	}
        	$('#order_form').submit();

        }
        </script><form method="POST"  action="<?php echo U('order/pay');?>" id="order_form" name="order_form"   ><?php if(count($address_list)!=0){ if(is_array($address_list)): $i = 0; $__LIST__ = $address_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><ul class="receive_add address_item selected_address"><li class="radio"><input id="address_<?php echo ($vo["id"]); ?>" checked="checked"  name="address_options" value="<?php echo ($vo["id"]); ?>" type="radio"></li><li class="particular"><?php echo ($vo["sheng"]); ?>&nbsp;<?php echo ($vo["shi"]); ?>&nbsp;<?php echo ($vo["qu"]); ?>&nbsp;<?php echo ($vo["address"]); ?></li><li class="name">收货人姓名: <?php echo ($vo["consignee"]); ?></li><li class="mobile">手机号码:<?php echo ($vo["mobile"]); ?></li></ul><?php endforeach; endif; else: echo "" ;endif; ?><ul class="new_receive_add address_item"><li class="radio"><input name="address_options" id="use_new_address" value="0"  type="radio"></li><li class="particular">使用新的收货地址</li></ul><ul style="display: none;" class="fill_in_content" id="address_form"><li><p class="title">收货人姓名</p><p><input value="" name="consignee" id="consignee" class="text" type="text"></p></li><li><p class="title">所在地区</p><p></p><div id="region"><select name="sheng" id="s1"></select><select name="shi" id="s2"></select><select name="qu" id="s3"></select></div><script language="javascript">								new PCAS("sheng","shi","qu","","","");
			</script><p></p></li><li><p class="title">详细地址</p><p><input value="" name="address" id="address" class="text width1" type="text"></p></li><li><p class="title">手机号码</p><p><input value="" id="phone_mob" name="phone_mob" class="text" type="text"></p></li><li><p class="title">&nbsp;</p><p><label><input value="1" id="save_address" name="save_address" type="checkbox">&nbsp;自动保存收货地址
                        <span class="explain">&nbsp;(&nbsp;选择后该地址将会保存到您的收货地址列表&nbsp;)&nbsp;</span></label></p></li></ul><?php }else{ ?><ul class="new_receive_add address_item"><li class="radio"><input checked='checked' name="address_options" id="use_new_address" value="0"  type="radio"></li><li class="particular">使用新的收货地址</li></ul><ul  class="fill_in_content" id="address_form"><li><p class="title">收货人姓名</p><p><input value="" name="consignee" id="consignee" class="text" type="text"></p></li><li><p class="title">所在地区</p><p></p><div id="region"><select name="sheng" id="s1"></select><select name="shi" id="s2"></select><select name="qu" id="s3"></select></div><script language="javascript">								new PCAS("sheng","shi","qu","","","");
			</script><p></p></li><li><p class="title">详细地址</p><p><input value="" name="address" id="address" class="text width1" type="text"></p></li><li><p class="title">手机号码</p><p><input value="" id="phone_mob" name="phone_mob" class="text" type="text"></p></li><li><p class="title">&nbsp;</p><p><label><input value="1" id="save_address" name="save_address" type="checkbox">&nbsp;自动保存收货地址
                        <span class="explain">&nbsp;(&nbsp;选择后该地址将会保存到您的收货地址列表&nbsp;)&nbsp;</span></label></p></li></ul><?php } ?></div><div class="order_delivery"><?php if($freesum<=0) {?>     卖家承担运费
     <?php }else{ ?><h4 class="add_title">选择配送方式</h4><div class="fashion_list"><?php if(is_array($freearr)): $k = 0; $__LIST__ = $freearr;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><ul class="receive_add" shipping_id="<?php echo ($vo["value"]); ?>"><li class="radio"><input id="<?php echo ($vo["price"]); ?>" <?php if($k == 1): ?>checked="checked"<?php endif; ?>  name="shipping_id" value="<?php echo ($vo["value"]); ?>" type="radio"></li><li class="fashion"><?php switch($vo["value"]): case "1": ?>平邮<?php break; case "2": ?>快递<?php break; default: ?>EMS<?php endswitch;?></li><li class="pay">配送费用:&nbsp;<span class="money" ectype="shipping_fee">¥<?php echo ($vo["price"]); ?></span></li><li class="explain"></li><input type="hidden" id="price_<?php echo ($vo["value"]); ?>" value="<?php echo ($vo["price"]); ?>" ></ul><?php endforeach; endif; else: echo "" ;endif; ?><!--   <ul class="receive_add" shipping_id="2"><li class="radio"><input checked="checked" name="shipping_id" value="2" type="radio"></li><li class="fashion">快递</li><li class="pay">配送费用:&nbsp;<span class="money" ectype="shipping_fee">¥0.01</span></li><li class="explain"></li></ul><ul class="receive_add" shipping_id="3"><li class="radio"><input checked="checked" name="shipping_id" value="3" type="radio"></li><li class="fashion">EMS</li><li class="pay">配送费用:&nbsp;<span class="money" ectype="shipping_fee">¥0.01</span></li><li class="explain"></li></ul>--></div><?php } ?></div><div class="message_box"><script type="text/javascript">        function postscript_activation(tt){
        	if (!tt.name)
        	{
        		tt.value    = '';
        		tt.name = 'postscript';
        	}

        }
        </script><span class="add_title">给卖家的附言</span><div class="message"><textarea id="postscript"  onclick="postscript_activation(this);">选填，可以告诉卖家您对商品的特殊需求，如颜色、尺码等</textarea></div></div></form><div class="make_sure"><p class="order_amount">订单总价:<strong class="fontsize3" id="order_amount">¥<font id='order_amount2'></strong><input class="btn1" onclick="$(this).parent('p').next().toggle();$('#coupon_sn').val('');" style="display:none" type="button"></p><div><a onclick="ordertj();" class="btn enter">下单完成并支付</a><a href="<?php echo U('shopcart/index');?>" class="back">返回购物车</a></div></div><input type="hidden" id="summoney" value="<?php echo ($sumPrice); ?>" /><div class="sku_tip" id="skuNotice" style="display:none"><span id="skuTitle2"></span></div>        ﻿
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
</script><div id="footer" ><p class="foot_nav"><a href="<?php echo U('index/index');?>">商城首页</a> | <a href="<?php echo U('user/index');?>">会员中心</a> | <a href="<?php echo U('index/comp_info');?>">品牌介绍</a></p><p class="foot_nav1"><?php echo ($user_site['set_company']); ?></p><p class="foot_nav1">All Rights Reserved.</p></div></body></html><script>		     $(function(){
		    
        	 $('input[name=shipping_id]').change(function(){
        	  if($(this).val()!=null)
        	  {
        	  
        	    var sumPrice=$('#summoney').val();
            	var freePrice= $('#price_'+$(this).val()).val();
            //alert(sumPrice);
            //	return false;
            	$('#order_amount2').html(Number(freePrice)+Number(sumPrice));
        	  }
        	 });
        	 set_free();
        })
        
          function set_free()
          {
          	var addr_id = $("input[name='shipping_id']:checked").val();
          //	 var addr_id =$("input[name=shipping_id]").find("option:checked").val();
          	
           if(addr_id !=null)
            {          
            	var sumPrice='<?php echo ($sumPrice); ?>';
            	var freePrice= $('#price_'+addr_id).val();
            	$('#order_amount2').html(Number(freePrice)+Number(sumPrice));
            }
            else
            {
            $('#order_amount2').html('<?php echo ($sumPrice); ?>');
            }
          }
		    </script>