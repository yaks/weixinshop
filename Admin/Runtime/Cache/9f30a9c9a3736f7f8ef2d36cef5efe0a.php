<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
	<meta charset="utf-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	
	<link href="__STATIC__/css/admin/style.css" rel="stylesheet"/>
	<title><?php echo L('website_manage');?></title>
	<script>
	var URL = '__URL__';
	var SELF = '__SELF__';
	var ROOT_PATH = '__ROOT__';
	var APP	 =	 '__APP__';
	//语言项目
	var lang = new Object();
	<?php $_result=L('js_lang');if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?>lang.<?php echo ($key); ?> = "<?php echo ($val); ?>";<?php endforeach; endif; else: echo "" ;endif; ?>
	</script>
</head>

<body>
<div id="J_ajax_loading" class="ajax_loading"><?php echo L('ajax_loading');?></div>
<?php if(($sub_menu != '') OR ($big_menu != '')): ?><div class="subnav">
    <div class="content_menu ib_a blue line_x">
    	<?php if(!empty($big_menu)): ?><a class="add fb J_showdialog" href="javascript:void(0);" data-uri="<?php echo ($big_menu["iframe"]); ?>" data-title="<?php echo ($big_menu["title"]); ?>" data-id="<?php echo ($big_menu["id"]); ?>" data-width="<?php echo ($big_menu["width"]); ?>" data-height="<?php echo ($big_menu["height"]); ?>"><em><?php echo ($big_menu["title"]); ?></em></a>　<?php endif; ?>
        <?php if(!empty($sub_menu)): if(is_array($sub_menu)): $key = 0; $__LIST__ = $sub_menu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($key % 2 );++$key; if($key != 1): ?><span>|</span><?php endif; ?>
        <a href="<?php echo U($val['module_name'].'/'.$val['action_name'],array('menuid'=>$menuid)); echo ($val["data"]); ?>" class="<?php echo ($val["class"]); ?>"><em><?php echo L($val['name']);?></em></a><?php endforeach; endif; else: echo "" ;endif; endif; ?>
    </div>
</div><?php endif; ?>
<script charset="utf-8" src="__STATIC__/weixin/js/jquery.js" type="text/javascript"></script>
<!--添加商品-->
<div class="subnav">
    <h1 class="title_2 line_x">支付信息配置</h1>
</div>
<form id="info_form" action="<?php echo u('user_paymode/index');?>" method="post" enctype="multipart/form-data">
<div class="pad_lr_10">
	<div class="col_tab">
		
		<div class="J_panes">
        <div class="content_list pad_10">
		<table class="table_form">
			<input type="hidden" name="id" value="<?php echo ($user_paymode["id"]); ?>" >
	      <tr>
		      <th>显示支付宝账号:</th>
		      <td><input value="1" <?php if($user_paymode["alipay"] == 1): ?>checked=''<?php endif; ?> type="checkbox" name="alipay" >&nbsp;</td>
		    </tr>
			<tr>
		      <th>显示银行账号:</th>
		      <td><input value="1" <?php if($user_paymode["bankpay"] == 1): ?>checked=''<?php endif; ?> type="checkbox" name="bankpay" >&nbsp;</td>
		    </tr>
			<tr>
		      <th>显示货到付款:</th>
		      <td><input value="1" <?php if($user_paymode["otherpay"] == 1): ?>checked=''<?php endif; ?> type="checkbox" name="otherpay" >&nbsp;</td>
		    </tr>
       
		

		</table>
		</div>
        
        </div>
		<div class="mt10"><input type="submit" value="<?php echo L('submit');?>" class="btn btn_submit"></div>
	</div>
</div>
<input type="hidden" name="menuid"  value="<?php echo ($menuid); ?>"/>
</form>