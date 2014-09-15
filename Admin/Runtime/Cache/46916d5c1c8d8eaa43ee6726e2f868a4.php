<?php if (!defined('THINK_PATH')) exit();?>﻿
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="X-UA-Compatible" content="IE=EmulateIE7 charset=utf-8" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>管理中心 - 模版设置</title>
<meta name="copyright" content="" />
<meta name="author" content="" />
<link href="__STATIC__/css/templet/user.css" rel="stylesheet" type="text/css" />






<script type="text/javascript" src="__STATIC__/weixin/item/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="__STATIC__/weixin/item/jquery.ui.js" charset="utf-8"></script>
<script charset="utf-8" type="text/javascript" src="__STATIC__/js/item_dialog.js" id="dialog_js" charset="utf-8"></script>



<script type="text/javascript">
$(function(){
    $('#left h1 span,h2.title a.fold').click(function(){
        if($(this).hasClass('span_close')){
            $(this).removeClass('span_close');
            $(this).addClass('span_open');
            this.title = 'open';
            closeSubmenu($(this).parent());
        }
        else{
            $(this).removeClass('span_open');
            $(this).addClass('span_close');
            this.title = 'close';
            openSubmenu($(this).parent());
        }
    });

    var span = $("#child_nav");
    span.hover(function(){
        $("#float_layer:not(:animated)").show();
    }, function(){
        $("#float_layer").hide();
    });
});
function closeSubmenu(h1){
    h1.next('ul').css('display', 'none');
}
function openSubmenu(h1){
    h1.next('ul').css('display', '');
}
</script>
</head>
<body>
<script type="text/javascript">
var curr_template_name = 'default2';
var curr_style_name    = 'default';
var preview_img = new Image();
preview_img.onload = function(){
    var d = DialogManager.get('preview_image');
    if (!d)
    {
        return;
    }

    if (d.getStatus() != 'loading')
    {

        return;
    }

    d.setWidth(this.width + 50);
    d.setPosition('center');
    d.setContents($('<img src="' + this.src + '" alt="" />'));
    ScreenLocker.lock();
};
preview_img.onerror= function(){
    alert('加载预览失败');
    DialogManager.close('preview_image');
};
function preview_theme(template_name, style_name){
    var screenshot = style_name;

    var d = DialogManager.create('preview_image');
    d.setTitle('预览');
    d.setContents('loading', {'text':'loading'});
    d.setWidth(270);
    d.show('center');

    preview_img.src = screenshot;
}

function preview_theme_no(screenshot){
    var screenshot =  screenshot;

    var d = DialogManager.create('preview_image');
    d.setTitle('预览');
    d.setContents('loading', {'text':'loading'});
    d.setWidth(270);
    d.show('center');

    preview_img.src = screenshot;
}



</script>
<div class="content1111">
            <div class="wrap">

            <div class="public" style="padding:30px 0">
               <?php if(is_array($user_temp)): $i = 0; $__LIST__ = $user_temp;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><div class="information_index">
                    <div class="templet">
                        <div class="nonce"><img src=<?php echo ($val["preview_img"]); ?>  style="width:250px;" id="current_theme_img" /></div>
                        <div class="txt">
                            <p><a href="admin.php?m=templet&a=preview" target="_blank" class="btn">商城预览</a></p>
                          <!--  <p>店铺名称:<span></span><a href="index.php?app=store&amp;id=2" target="_blank" class="btn">店铺首页</a></p>-->
                        <!--    <p>当前模板名称:<b id='current_template'>default2</b></p>
                            <p>当前风格名称:<b id='current_style'>default</b></p>
                            <!--<div class="btn_layer">
                                <a href="javascript:void(0);" class="btn">店铺首页</a>
                            </div>-->
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                    <h5 class="motif_title">可用主题</h5>
                    <div class="motif">
                        <ul>
						<?php if(is_array($templet_list)): $i = 0; $__LIST__ = $templet_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li>
                                <p><img id="themeimg_default_default" src=<?php echo ($val["preview_img"]); ?> style="width:200px;" ></p>
                                 <h2></h2>
                              <!-- <h2>模板名称: default<br />风格名称: default</h2>-->
                                <span>
                                    <a href="admin.php?m=templet&a=set_temp&templet_name=<?php echo ($val["templet_name"]); ?>" class="employ">使用</a>
                                    <a href="javascript:preview_theme('<?php echo ($val["templet_name"]); ?>', '<?php echo ($val["templet_img"]); ?>');" class="preview">预览</a>
                                </span>
                            </li><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </ul>
                    </div>
                                       </div>
            </div>
            <div class="wrap_bottom"></div>
        </div>
        <div class="clear"></div>
      
    </div>
    <div class="clear"></div>
</div>

</body>
 </html>