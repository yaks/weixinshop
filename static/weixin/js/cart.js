function drop_cart_item(rec_id,spec_id){
	
    var tr = $('#cart_item_' + rec_id);
    var amount_span = $('#cart_amount');
    var cart_goods_kinds = $('#cart_goods_kinds');
   
    $.post("index.php?m=shopcart&a=remove_cart_item",{itemId:rec_id,spec_id:spec_id},function(data){
    	if(data.status==1)
    	{
    		window.location.reload(); 
    	}
    },'json');
    
    /*
    $.getJSON('index.php?app=cart&act=drop&rec_id=' + rec_id, function(result){
        if(result.done){
            //删除成功
            if(result.retval.cart.quantity == 0){
                window.location.reload();    //刷新
            }
            else{
                tr.remove();        //移除
                amount_span.html(price_format(result.retval.amount));  //刷新总费用
                cart_goods_kinds.html(result.retval.cart.kinds);       //刷新商品种类
            }
        }
    });
    */
}
function move_favorite(store_id, rec_id, goods_id){
    var tr = $('#cart_item_' + rec_id);
    $.getJSON('index.php?app=my_favorite&act=add&type=goods&item_id=' + goods_id, function(result){
        //没有做收藏后的处理，比如从购物车移除
        if(result.done){
            //drop_cart_item(store_id, rec_id);
            alert(result.msg);
        }
        else{
            alert(result.msg);
        }

    });
}
function change_quantity(rec_id,spec_id,input){
   //alert(spec_id);
	
    var subtotal_span = $('#item' + rec_id + spec_id + '_subtotal');
    var amount_span = $('#cart_amount');
    //暂存为局部变量，否则如果用户输入过快有可能造成前后值不一致的问题
    var _v = input.value;
	//var spec_id =$('#spec_id_'+rec_id).val();
  // alert($(input).attr('changed')); 
  
  if(isNaN(input.value)||input.value<1) 
  {
  	alert('请输入大于0的数字');
  	 //$(input).attr('changed', _v);
  	 $(input).val($(input).attr('changed'));
  	 return false;
  }
  
   $.post("index.php?m=shopcart&a=change_quantity",{itemId:rec_id,quantity:_v,spec_id:spec_id},function(data){
 
    	if(data.status==1)
    	{
    	 subtotal_span.html(price_format(data.item.price*data.item.num));
         amount_span.html(price_format(data.sumPrice));
         $(input).attr('changed',_v);
    	}else
    	{
    		showSkuNotice(data.msg);
    		 $(input).val($(input).attr('changed'));
    		return false;
    	}
    },'json');
   
    /*
    $.getJSON('index.php?app=cart&act=update&spec_id=' + spec_id + '&quantity=' + _v, function(result){
        if(result.done){
            //更新成功
            $(input).attr('changed', _v);
            subtotal_span.html(price_format(result.retval.subtotal));
            amount_span.html(price_format(result.retval.amount));
        }
        else{
            //更新失败
            alert(result.msg);
            $(input).val($(input).attr('changed'));
        }
    });
    */
}
function decrease_quantity(rec_id,spec_id){
    var item = $('#input_item_' + rec_id + spec_id);
    var orig = Number(item.val());
    if(orig > 1){
        item.val(orig - 1);
        item.attr('changed',orig);
        item.keyup();
    }
}
function add_quantity(rec_id,spec_id){
    var item = $('#input_item_' + rec_id + spec_id);
    
    var orig = Number(item.val());
    item.attr('changed',orig);
    item.val(orig + 1);
    item.keyup();
}

function price_format(price){
    if(typeof(PRICE_FORMAT) == 'undefined'){
        PRICE_FORMAT = '&yen;%s';
    }
    price = number_format(price, 2);

    return PRICE_FORMAT.replace('%s', price);
}

function number_format(num, ext){
    if(ext < 0){
        return num;
    }
    num = Number(num);
    if(isNaN(num)){
        num = 0;
    }
    var _str = num.toString();
    var _arr = _str.split('.');
    var _int = _arr[0];
    var _flt = _arr[1];
    if(_str.indexOf('.') == -1){
        /* 找不到小数点，则添加 */
        if(ext == 0){
            return _str;
        }
        var _tmp = '';
        for(var i = 0; i < ext; i++){
            _tmp += '0';
        }
        _str = _str + '.' + _tmp;
    }else{
        if(_flt.length == ext){
            return _str;
        }
        /* 找得到小数点，则截取 */
        if(_flt.length > ext){
            _str = _str.substr(0, _str.length - (_flt.length - ext));
            if(ext == 0){
                _str = _int;
            }
        }else{
            for(var i = 0; i < ext - _flt.length; i++){
                _str += '0';
            }
        }
    }

    return _str;
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