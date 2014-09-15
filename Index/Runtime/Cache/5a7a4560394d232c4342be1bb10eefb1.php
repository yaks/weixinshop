<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN"><!-- saved from url=(0048)http://store.weiapps.cn/index.php --><html><meta charset="utf-8" /><title><?php echo ($user_site['set_name']); ?></title><meta name="keywords" content="<?php echo ($page_seo["keywords"]); ?>" /><meta name="description" content="<?php echo ($page_seo["description"]); ?>" /><meta content="width=device-width,minimum-scale=1.0,maximum-scale=1.0" name="viewport"><!--商城cssss begin--><link type="text/css" rel="stylesheet" href="__STATIC__/weixin/css/shop.css"><!--商城css end--><script type="text/javascript" src="__STATIC__/js/template.js"></script><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/dist/zepto.js"></script><!--<script src="http://code.baidu.com/touch-0.2.13.min.js"></script>--><script type="text/javascript" src="__STATIC__/GMU/dist/touch-0.2.13.min.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/offset.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/parseTpl.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/gmu.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/event.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/core/widget.js"></script><!--组件依赖js end--><link rel="stylesheet" type="text/css" href="__STATIC__/css/category_m.css" /><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/icons.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/loading.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/slider/slider.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><!--组件依赖css end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/extend/matchMedia.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.ortchange.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/slider.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/dots.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$touch.js"></script><!--组件依赖js end--><!--组件依赖js begin--><script type="text/javascript" src="__STATIC__/GMU/src/widget/slider/$autoplay.js"></script><!--组件依赖js end--><script type="text/javascript" src="__STATIC__/GMU/src/extend/throttle.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/event.scrollStop.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/panel/panel.js"></script><!--组件依赖js end--><!--组件依赖css begin--><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/panel/panel.default.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><link rel="stylesheet" type="text/css" href="__STATIC__/css/item/item.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/transitions.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/tabs/tabs.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/tabs/tabs.default.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/dialog/dialog.css" /><link rel="stylesheet" type="text/css" href="__STATIC__/GMU/assets/widget/dialog/dialog.iOS7.css" /><!--皮肤文件，若不使用该皮肤，可以不加载--><script type="text/javascript" src="__STATIC__/GMU/src/extend/highlight.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/tabs/tabs.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/tabs/$swipe.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/tabs/$ajax.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/extend/parseTpl.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/dialog/dialog.js"></script><script type="text/javascript" src="__STATIC__/GMU/src/widget/dialog/$position.js"></script><!--组件依赖js end--><head></head><body id="touch"><div class ="com-content" ><div id="nav"><ul class="navlist"><li id="n_0" class="r"><span class="r" style ="background-size: 21px 22px;"></span></li><li class="r" id="n_1"><a class="r" href="<?php echo ($user_site['index_url']); ?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li><li class="r" id="n_2"><a class="r" href="<?php echo U('user/index');?>"><span class="r" style ="background-size: 23px 21px;"></span></a></li><li class="r" id="n_3"><a class="r"href="<?php echo U('shopcart/index');?>"><span class="r" style ="background-size: 24px 21px;"></span></a></li></ul></div><div class="push"><div id="load" class="ui-loading" style=" margin-top: 50%;  margin-left: 45%;position: absolute;z-index:999"></div><div id="content"><div class="mod_slider" id="loopImgDiv"><div class="inner"><ul class="pic_list" id="loopImgUl"></ul></div><div class="bar_wrap"><ul class="bar" id="loopImgBar"></ul></div></div><div class="buy_area"><div id="testtt" style="display: none"></div><div class="fn_wrap"><h1 class="fn" id="itemName"></h1></div><div class="price_wrap"><span class="tit" id="priceTitle">会员价：</span><span class="price" id="priceSale" >市场：</span><del class="old_price"><em id="priceMarket">.00</em></del><span class="col_right"><span class="sale_num">销量：<b id="saleNo">0</b>件</span></span></div><div class="detail_promote detail_sendto"><div class="tit">库存：</div><div class="promote_tag" id="addrArea"><div class="addr"><span id="addrName"><b id="stock">0</b></span><span class="postage" id="postPrice"></span></div><div class="time"><span id="postNotice1">有货，</span><span id="postNotice2">下单后立即发货,免邮</span></div></div><i class="icon_promote"></i></div><div class="buy_tip" id="statusNotice" style="display: none"><i class="icon_warn"></i><span id="statusNote"></span></div><div class="sku_container sku_container_on" id="skuCont"><div class="sku_wrap"><div id="propertyDiv"></div><div class="sku sku_num"><h3>数量</h3><div class="num_wrap"><span class="minus minus_disabled" id="minus"></span><input class="num" id="buyNum" type="tel" value="1"><span class="plus" id="plus"></span></div><div ></div></div></div></div><div class="sku_tip" id="skuNotice" style="display:none"><span id="skuTitle2"></span></div></div><div id="detailBaseLine" class="mod_tab_gap"></div><div id="container"><div id="tabs1"><ul><li data-url="#conten1">商品详细介绍</li><li data-url="./index.php?m=book&a=get_cate_ajax">商品评论（0）</li></ul><div id="conten1">content1</div></div></div><div class="btn_wrap btn_wrap_fixed btn_wrap_nocart" style="-webkit-transform: translateY(0px);"><div class="btn_col"><a class="btn btn_cart" href="javascript:;" id="addCart2" style="display: block;">加入购物车</a><a class="btn btn_buy" href="javascript:;" id="buyBtn2">立即购买</a></div></div><div class="mod_slider_mask" id="blackCover" style="display: none;"></div><div id="dialog1" title=""><p id="dialog_desc"></p></div>        ﻿
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
</script><div id="footer" ><p class="foot_nav"><a href="<?php echo U('index/index');?>">商城首页</a> | <a href="<?php echo U('user/index');?>">会员中心</a> | <a href="<?php echo U('index/comp_info');?>">品牌介绍</a></p><p class="foot_nav1"><?php echo ($user_site['set_company']); ?></p><p class="foot_nav1">All Rights Reserved.</p></div></body><script>
    //setup模式
    $('#dialog1').dialog({
        autoOpen: false,
        closeBtn: false,
        buttons: {
            '继续购物': function(){
                this.close();
            },
            '查购物车': function(){
				window.location.href="<?php echo U('shopcart/index');?>";
                this.close();
            }
        }
    });


</script><script>
	var list =<?php echo ($json_item); ?>;
	var user_discount=<?php echo ($discount); ?>;
	var skuPro={};
	var spec_id=0;
	var loopImg = [];
	var scroll_loop='';
	var buyNum=1;
	var buymaxNum=1;
	var item_name='';
	var item_id='';
	var goodprice='';
	var SkuStatus=true;
	if (list.item.dis_flag ==0)
	{
	 user_discount =10;
	 }
function isInteger(obj) {

    return obj%1 === 0

}
function formatdate(date, format) {
	if(format==10){
	    goodprice = date
		return date;
	}
	if(format < 10){
	var price =format*date/10;
	  if(isInteger(price)){
	  goodprice = price+'.00';
	  return price+'.00';
	  }else{
	  goodprice = price.toFixed(1)+'0'; 
	  return price.toFixed(1)+'0'; 
	  } 
	 }


}
	
	function scroll(o){
        this.opt = {
            tp: 'text',
            moveDom: null,
            moveChild: [],
            tab: [],
            viewDom: null,
            sp: null,
            min: 0,
            minp: 0,
            step: 0,
            len: 1,
            index: 1,
            offset: 0,
            loadImg: false,
            image: [],
            loopScroll: false,
            lockScrY: false,
            holdAuto: false,
            stopOnce: false,
            autoTime: 0,
            tabClass: 'cur',
            transition: 0.3,
            fun: function() {}
        };
        $.extend(this, this.opt, o);
        this.len = this.moveChild.length;
        this.min = this.min || {
            'text': 100,
            'img': 30
        } [this.tp];
        this.minp = this.minp || this.min;
        if (!this.viewDom) this.viewDom = $(window);
        if (this.len > 1) this.startEvent();
        if (this.loadImg) this.image = this.moveDom.find('img');
        this.resize(this.step || this.moveChild.eq(0).width());
        if (this.autoTime) {
            var obj = this;
            setInterval(function() {
                if (!obj.holdAuto) {
                    if (!obj.stopOnce) obj.stepMove(obj.index + 1);
                    obj.stopOnce = false;
                }
            },
            this.autoTime);
        }
    };
    $.extend(scroll.prototype, {
        resize: function(step) {
            this.step = step || this.step;
            var harf = (this.viewDom.width() - this.step) / 2;
            this.offset = this.loopScroll ? this.step - harf: harf;
            if (this.len == 1) this.offset = -harf;
            this.stepMove(this.index, true);
        },
        addChild: function(dom, tabDom) {
            if (!this.loopScroll) return;
            this.moveChild.eq(0).after(dom);
            this.len += 1;
            this.tab.eq(this.len - 2).after(tabDom);
            this.tab = this.tab.parent().children();
            if (this.len == 2) {
                this.moveChild = this.moveDom.children();
                this.startEvent();
            } else {
                this.stepMove(2);
            }
        },
        startEvent: function() {
            var obj = this,
            dom = this.moveDom.get(0);
            dom.addEventListener("touchstart", this, false);
            dom.addEventListener("touchmove", this, false);
            dom.addEventListener("touchend", this, false);
            dom.addEventListener("touchcancel", this, false);
            dom.addEventListener("webkitTransitionEnd", this, false);
            this.tab.each(function(i, em) {
                $(em).attr('no', i + 1);
                $(em).click(function() {
                    obj.stepMove($(this).attr('no'));
                });
            });
            if (this.loopScroll) {
                this.moveDom.append(this.moveChild.eq(0).clone());
                var last = this.moveChild.eq(this.len - 1).clone();
                this.moveDom.prepend(last);
            }
        },
        handleEvent: function(e) {
            switch (e.type) {
            case "touchstart":
                this.sp = this.getPosition(e);
                this.holdAuto = true;
                this.stopOnce = true;
                break;
            case "touchmove":
                this.touchmove(e);
                break;
            case "touchend":
            case "touchcancel":
                this.move(e);
                this.holdAuto = false;
                break;
            case "webkitTransitionEnd":
                e.preventDefault();
                break;
            }
        },
        getPosition: function(e) {
            var touch = e.changedTouches ? e.changedTouches[0] : e;
            return {
                x: touch.pageX,
                y: touch.pageY
            };
        },
        touchmove: function(e) {
            var mp = this.getPosition(e),
            x = mp.x - this.sp.x,
            y = mp.y - this.sp.y;
            if (Math.abs(x) - Math.abs(y) > this.min) {
                e.preventDefault();
                var offset = x - this.step * (this.index - 1) - this.offset;
                this.moveDom.css({
                    "-webkit-backface-visibility": "hidden",
                    "-webkit-transform": "translate3D(" + offset + "px,0,0)",
                    "-webkit-transition": "0"
                });
            } else {
                if (!this.lockScrY) e.preventDefault();
            }
        },
        move: function(e) {
            var mp = this.getPosition(e),
            x = mp.x - this.sp.x,
            y = mp.y - this.sp.y;
            if (Math.abs(x) < Math.abs(y) || Math.abs(x) < this.minp) {
                this.stepMove(this.index);
                return;
            }
            if (x > 0) {
                e.preventDefault();
                this.stepMove(this.index - 1);
            } else {
                e.preventDefault();
                this.stepMove(this.index + 1);
            }
        },
        loadImage: function(no) {
            var img = this.image;
            var setImg = function(i) {
                if (img[i] && $(img[i]).attr('back_src')) {
                    img[i].src = $(img[i]).attr('back_src');
                    $(img[i]).removeAttr('back_src');
                }
            };
            setImg(no);
            setImg(no - 1);
            setImg(no + 1);
        },
        stepMove: function(no, isSetOffsetIndex) {
            this.index = no > this.len ? this.len: no < 1 ? 1 : no;
            this.tab.removeClass(this.tabClass);
            this.tab.eq(this.index - 1).addClass(this.tabClass);
            var tran = -this.step * ((this.loopScroll ? no: this.index) - 1) - this.offset;
            this.moveDom.css({
                "-webkit-transform": "translate3D(" + tran + "px,0,0)",
                "-webkit-transition": isSetOffsetIndex ? "0ms": "all " + this.transition + "s ease"
            });
            if (this.loadImg) this.loadImage(this.index);
            this.fun(this.index);
            if (this.loopScroll && !isSetOffsetIndex) {
                var obj = this,
                cindex = no;
                if (no <= 0) cindex = this.len;
                if (no > this.len) cindex = 1;
                if (cindex != no) setTimeout(function() {
                    obj.stepMove(cindex, true);
                },
                this.transition * 1000);
            }
        }
    });
	
	function setimg(images) {
        var imgStr = [],
        tab = [],
        subfix = 'http://shop.bismai.com/data/upload/<?php echo ($user_token); ?>/item/';
        this.loopImg = [];
        for (var i = 0; i < images.length; i++) {
            var src = subfix + images[i].url;
            this.loopImg.push(src.replace(/\s+/g, ''));
            imgStr.push('<li><img ' +  'src="' + src + '"></li>');
            tab.push('<li></li>');
        }
        $('#loopImgBar').html(tab.join(''));
        $('#loopImgUl').html(imgStr.join(''));
        $('#loopImgUl').css({
            left: '0px'
        });
	}
	
	function showSkuNotice(str, t) {
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
	
	  function resizeProtal(showBlack) {
        if (showBlack) {
            $('#loopImgDiv').hasClass('mod_slider_viewer') ? $('#loopImgDiv').removeClass('mod_slider_viewer') : $('#loopImgDiv').addClass('mod_slider_viewer');
        }
        scroll_loop.resize($('#loopImgUl li').eq(0).width());
    };
	

	function  hideBlackCover(){
            $('#blackCover').hide();
            var blackCoverShow = false;
            if ($('#loopImgDiv').hasClass('mod_slider_viewer')) {
                resizeProtal(true);
            } else {
                $('#imageViewer').hide();
            }
            $('#topBar').show();
        };
		
	   function showSingeImg(src)  {
            this.lockScrollH = $(window).scrollTop();
            this.blackCoverShow = true;
            $('#blackCover').show();
            $('#imageViewer').show();
            $('#fullImg').attr('src', src);
            $('#topBar').hide();
        };	
		
	
	
	function set_spec(arr,item) {
        arr = arr || [];
        this.skuPro = {
            color: {},
            size: {},
            name: {},
            rename: {},
            id: {}
        };
		this.spec_id = arr[0].spec_id;
        var obj = this;
		
    
        for (var i = 0; i < arr.length; i++) {
            this.skuPro.name[arr[i].spec_1 + '~~' + arr[i].spec_2] = arr[i].spec_id;
            this.skuPro.rename[arr[i].spec_1 + arr[i].spec_2] = arr[i].spec_id;
            this.skuPro.id[arr[i].spec_id] = arr[i].spec_1 + '~~' + arr[i].spec_2;
            this.skuPro.color[arr[i].spec_1] = this.skuPro.color[arr[i].spec_1] || arr[i].spec_id == this.spec_id;
            this.skuPro.size[arr[i].spec_2] = this.skuPro.size[arr[i].spec_2] || arr[i].spec_id == this.spec_id;
			if (arr[i].spec_id == this.spec_id)
			{
				document.getElementById('priceSale').innerHTML = '￥'+formatdate(arr[i].price,user_discount);
				if (user_discount==10 ){
				document.getElementById('priceMarket').innerHTML = '市场价:￥'+spec_arr[i].markprice;
				}else{
				document.getElementById('priceMarket').innerHTML = '商城价:￥'+spec_arr[i].price;
				}
				document.getElementById('saleNo').innerHTML = arr[i].buy_num;
				document.getElementById('stock').innerHTML = arr[i].stock;
				document.getElementById('itemName').innerHTML = item_name+' '+arr[i].spec_1+' '+arr[i].spec_2;
				buymaxNum =arr[i].stock;
			}
        };
		skuPro = this.skuPro
		if ($('#propertyDiv .sku').length == 0) {
            var str = '',
            i = 1,
            skus = this.skuPro;
            var getSkuHtml = function(n, tmp) {
                var html = [];
				 html.push('<div class="sku" id="sku'+i+'"><h3>'+n+'</h3><div class="sku_list">')
                for (s in tmp) {
                    if (!s) continue;
                    html.push('<span class="option' + (tmp[s] ? ' option_selected': '') + '">' + s + '</span>');
                }
				//console.log(html.join(''));
				html.push('</div></div>');
                str+= html.join('');
				i+=1;
				//console.log(str);
            };
			//console.log(str);
            getSkuHtml(item.spec_name_1, skus.color);
            getSkuHtml(item.spec_name_2, skus.size);
            $('propertyDiv').innerHTML = str;
			document.getElementById('propertyDiv').innerHTML = str;
        }

		}
		
		
	   function event_bind(){
		$('body').on('tap',
        function(e) {
            var target = e.srcElement || e.target,
            em = target,
            i = 1;
            while (!em.id && i <= 3) {
                em = em.parentNode;
                i++;
            }
            if (!em.id) return;

            switch (em.id) {
			case 'buyBtn2':
			if (!SkuStatus) {
            showSkuNotice('请选择颜色/尺寸');
            return;
			}
			$.post('index.php?m=shopcart&a=add_cart', { goodId: item_id,quantity: buyNum,spec_id: spec_id,price:goodprice }, function(response){
			data=$.parseJSON(response)
			if (!data.status)
			{
			showSkuNotice(data.msg);
			}else{
			window.location.href="<?php echo U('shopcart/index');?>";
			}     
			});
			break;
            case 'addCart2':
			if (!SkuStatus) {
            showSkuNotice('请选择颜色/尺寸');
            return;
			}
			$.post('index.php?m=shopcart&a=add_cart', { goodId: item_id,quantity: buyNum,spec_id: spec_id ,price:goodprice}, function(response){
			data=$.parseJSON(response)
			if (!data.status)
			{
			showSkuNotice(data.msg);
			}else{
			document.getElementById('dialog_desc').innerHTML=data.msg;
			$('#dialog1').dialog('open'); }
			
            
 });
           
                break;
			case 'plus':
            case 'minus':
                if (em.className.indexOf('disabled') != -1) return;
                var num = em.id == 'plus' ? buyNum + 1 : buyNum - 1;
                setBuyNum(num);
                e.preventDefault();
                break;
            case 'sku1':
            case 'sku2':
                if (target.nodeName != 'SPAN') return;
                if (target.className.indexOf('option_disabled') != -1) {
                    if (em.id == 'sku1' && $('#sku2 span').length) {
                        $('#sku1 span').removeClass('option_selected');
                        $(target).removeClass('option_disabled').addClass('option_selected');
                        $('#sku2 span').each(function() {
                            var name = target.innerHTML + '~~' + this.innerHTML;
                            skuPro.name[name] ? $(this).removeClass('option_disabled') : $(this).addClass('option_disabled');
                        });
                        SkuStatus = false;
						//alert("aaaaaaaaaaaaa");
                    }
                    return;
                }
                var sid = em.id,
                isSkuA = sid == 'sku1',
                skuNew = target.innerHTML,
                sid2 = isSkuA ? 'sku2': 'sku1';
                if (target.className.indexOf('option_selected') != -1) {
                    $(target).removeClass('option_selected');
                    $('#' + sid2 + ' span').removeClass('option_disabled');
                } else {
                    $('#' + sid + ' span').removeClass('option_selected');
                    $(target).addClass('option_selected');
                    $('#' + sid2 + ' span').each(function() {
                        var tmp = this.innerHTML,
                        name = isSkuA ? skuNew + '~~' + tmp: tmp + '~~' + skuNew;
                        skuPro.name[name] ? $(this).removeClass('option_disabled') : $(this).addClass('option_disabled');
                    });
                }
                var skuName = [$('#sku1 .option_selected').html(), $('#sku2 .option_selected').html()].join('~~');
                var sid = skuPro.name[skuName];
                if (!sid && !$('#sku2 span').length) sid = skuPro.rename[skuName.replace('~~', '')];
                if (sid) {
                    SkuStatus = true;
                    spec_id = sid;
            
					     for (var i = 0; i < spec_arr.length; i++) {
          
			if (spec_arr[i].spec_id == sid)
			{
				document.getElementById('priceSale').innerHTML = '￥'+formatdate(spec_arr[i].price,user_discount);
				if (user_discount==10 ){
				document.getElementById('priceMarket').innerHTML = '市场价:￥'+spec_arr[i].markprice;
				}else{
				document.getElementById('priceMarket').innerHTML = '商城价:￥'+spec_arr[i].price;
				}
				
				document.getElementById('saleNo').innerHTML = spec_arr[i].buy_num;
				document.getElementById('stock').innerHTML = spec_arr[i].stock;
				buymaxNum=spec_arr[i].stock;
				document.getElementById('itemName').innerHTML = item_name+' '+spec_arr[i].spec_1+' '+spec_arr[i].spec_2;
			}
        };
                } else {
				SkuStatus = false;
                    return;
                }
                break;
            default:
                break;
            }
        });
		
		 $('#buyNum').on('input',
        function() {
            if (this.value) setBuyNum(this.value);
        });
		
		$('#loopImgUl').on('click',
            function(e) {
			 if (window.WeixinJSBridge) {
                    WeixinJSBridge.invoke('imagePreview', {
                        'current': loopImg[scroll_loop.index - 1],
                        'urls': loopImg
                    });
                    return;
                }
            
                $('#topBar').hide();
                if (loopImg.length == 1) {
				    alert("baaaaaaaaaaaa");
                    showSingeImg(loopImg[0]);
                    return;
                }
				
				console.log(loopImg);
                if (!loopImg.length) return;
                if ($('#loopImgDiv').hasClass('mod_slider_viewer')) {
                    hideBlackCover();
                } else {
                    var lockScrollH = $(window).scrollTop();
                    var blackCoverShow = true;
                    $('#blackCover').show();
                    resizeProtal(true);
                }
            });	
		
		}
		
	function setBuyNum(num) {
        var tmp = num,
        maxNum = buymaxNum;
        num = Math.max(1, num);
        num = Math.min(maxNum, num);
        this.buyNum = num;
        $('#buyNum').val(num);
        if (tmp > maxNum) this.showSkuNotice('单款最多可买'+maxNum+'件');
        num == 1 ? $('#minus').addClass('minus_disabled') : $('#minus').removeClass('minus_disabled');
        maxNum <= num ? $('#plus').addClass('plus_disabled') : $('#plus').removeClass('plus_disabled');
    };
	
	function item_init(item_json)
	{
		
		spec_arr =item_json.item_spec;
		item_name=item_json.item.title;
		item_id=item_json.item.id;
		img_arr=item_json.item_img;
		document.getElementById('itemName').innerHTML = item_name;
		document.getElementById('conten1').innerHTML = item_json.item.info;
		if(item_json.item.free == 2)
		{
		   document.getElementById('postNotice2').innerHTML="邮费: "+"   平邮:"+item_json.item.pingyou+"元      EMS:"+item_json.item.ems+"元    EMS:"+item_json.item.kuaidi+"元";
		 }
		
		
		setimg(img_arr);
		scroll_loop=new scroll({
            tp: 'img',
            loadImg: true,
            moveDom: $('#loopImgUl'),
            moveChild: $('#loopImgUl li'),
            tab: $('#loopImgBar li'),
            loopScroll: true,
            lockScrY: true,
            index: 1,
            fun: function(index) {}}
		) 
	   
	    if(item_json.item.spec_qty!='0')
		 {
		  
			set_spec(item_json.item_spec,item_json.item);
		}else{
				document.getElementById('priceSale').innerHTML = '￥'+formatdate(item_json.item.price,user_discount);
				if (user_discount==10){
				document.getElementById('priceMarket').innerHTML = '市场价:￥'+item_json.item.markprice;
				}else
				{document.getElementById('priceMarket').innerHTML = '商城价:￥'+item_json.item.price;
				}
				document.getElementById('saleNo').innerHTML = item_json.item.buy_num;
				document.getElementById('stock').innerHTML = item_json.item.goods_stock;
				buymaxNum=item_json.item.goods_stock;
		}
		
		event_bind();
		//showSkuNotice("OK");
		
		    window.scrollTo(0, 1);//收起地址栏


	 }

	 item_init(list);

	 $(function ($) {
	 	     $('#tabs1').tabs({
        ajax: {
            dataType: 'json'
        },
        beforeRender: function(e, response, panel, index){
            var html = '';
            $.each(response.status, function(){
                html += '<p>'+'该商品还没有被评论'+'</p>';
            });
            panel.html(html);
            console.log(index);
            //需要阻止，否则会把response原文写入到div里面。
            e.preventDefault();
        }
    });
	var a =$('.ui-tabs-panel').height();
	});
	

		
		window.onload=function()//用window的onload事件，窗体加载完毕的时候
		
{var a =$('.ui-tabs-panel').height();
$('.ui-viewport').height(a);
$('#load').removeClass('ui-loading');
   }
		//console.log(test);
	</script><script></script></html>