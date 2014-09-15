<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><html><head><meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0"/><meta http-equiv="Content-Type" content="text/html;charset=utf-8" /><title>会员中心 - 我的地址</title><link href="__STATIC__/weixin/css/shop.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="__STATIC__/weixin/js/jquery.js" charset="utf-8"></script><script type="text/javascript" src="__STATIC__/weixin/js/ecmall.js" charset="utf-8"></script><script type="text/javascript" src="__STATIC__/weixin/js/touchslider.dev.js" charset="utf-8"></script><script charset="utf-8" type="text/javascript" src="__STATIC__/weixin/js/dialog.js" id="dialog_js"></script><script charset="utf-8" type="text/javascript" src="__STATIC__/weixin/js/jquery.ui.js" ></script><script charset="utf-8" type="text/javascript" src="__STATIC__/weixin/js/jquery.validate.js" ></script><script charset="utf-8" type="text/javascript" src="__STATIC__/weixin/js/mlselection.js" ></script><script type="text/javascript" language="javascript" src='__STATIC__/weixin/js/dizhi2.js'></script><script type="text/javascript" language="javascript" src='__STATIC__/weixin/js/diqu2.js'></script><link rel="stylesheet" type="text/css" href="__STATIC__/weixin/css/jquery.ui.css" /></head><body onLoad="setup()"><script type="text/javascript" src="__STATIC__/weixin/js/jquery_002.js" charset="utf-8"></script><script type="text/javascript">//<!CDATA[
$(function(){
    regionInit("region");
    $('#address_form').validate({
        /*errorPlacement: function(error, element){
            var _message_box = $(element).parent().find('.field_message');
            _message_box.find('.field_notice').hide();
            _message_box.append(error);
        },
        success       : function(label){
            label.addClass('validate_right').text('OK!');
        },*/
        errorLabelContainer: $('#warning'),
        invalidHandler: function(form, validator) {
           var errors = validator.numberOfInvalids();
           if(errors)
           {
               $('#warning').show();
           }
           else
           {
               $('#warning').hide();
           }
        },
        onkeyup : false,
        rules : {
            consignee : {
                required : true
            },
            sheng : {
                required : true
              
            },
            address   : {
                required : true
            },
            phone_mob : {
                required : true,
                minlength:6,
                digits : true
            }
        },
        messages : {
            consignee : {
                required : '请填写收货人姓名. '
            },
            sheng : {
                required : '请选择所在地区. '
             
            },
            address   : {
                required : '请填写详细地址. '
            },
            phone_mob : {
                required : '固定电话和手机请至少填写一项. ',
                minlength: '错误的手机号码,只能是数字,并且不能少于6位. ',
                digits : '错误的手机号码,只能是数字,并且不能少于6位. '
            }
        }
    });
});
function check_phone(){
    return ($('[name="phone_tel"]').val() == '' && $('[name="phone_mob"]').val() == '');
}
function hide_error(){
    $('#region').find('.error').hide();
}
//]]></script><div class ="com-content" ><div id="nav"><ul class="navlist"><li id="n_0" class="r"><span class="r" style ="background-size: 21px 22px;"></span></li><li class="r" id="n_1"><a class="r" href="<?php echo ($user_site['index_url']); ?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li><li class="r" id="n_2"><a class="r" href="<?php echo U('user/index');?>"><span class="r" style ="background-size: 23px 21px;"></span></a></li><li class="r" id="n_3"><a class="r"href="<?php echo U('shopcart/index');?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li></ul></div><div class="push"><div id="load" class="ui-loading" style=" margin-top: 50%;  margin-left: 45%;position: absolute;z-index:999"></div><div class="eject_con" id="content"><div class="add"><div id="warning"></div><form method="post" action="<?php echo U('user/addaddress');?>" id="address_form"><ul class="form_address"><li><!-- <h3>收货人姓名: </h3> --><input class="text width_normal" name="consignee" placeholder="请填写您的真实姓名" type="text"><label class="field_message"><span class="field_notice"></span></label></li><li><!-- <h3>所在地区: </h3> --><!--  <div id="region"><input name="region_id" value="" id="region_id" class="mls_id" type="hidden"><input name="region_name" value="" class="mls_names" type="hidden"><select onchange="hide_error();"><option selected="selected">请选择...</option><option value="1">中国</option></select><b class="field_message" style="font-weight:normal;"><label class="field_notice"></label></b></div>--><select name="sheng" id="s1"></select><select name="shi" id="s2"></select><select name="qu" id="s3"></select><script language="javascript">								new PCAS("sheng","shi","qu","","","");
				</script></li><li><!-- <h3>详细地址: </h3> --><input class="text width_normal" name="address" placeholder="不必重复填写地区" type="text"><label class="field_message"><span class="field_notice"></span></label></li><li><!-- <h3>手机号码:</h3> --><input class="text width_normal" name="phone_mob" placeholder="电话号码" type="text"><label class="field_message"><span class="field_notice"></span></label></li></ul><div class="submit"><input class="btn enter" value="新增地址" type="submit"></div></form></div></div>﻿
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