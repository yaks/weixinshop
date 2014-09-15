<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
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

<div class="pad_lr_10">
	<form id="info_form" action="<?php echo u('user_setting/index');?>" method="post" enctype="multipart/form-data">
	<table width="100%" class="table_form">
	    <tr style="display:none;">
            <th width="150"><?php echo L('site_name');?> :</th>
            <td><input type="text" name="id" class="input-text" size="50" value=<?php echo ($user_setting['id']); ?>></td>
        </tr>
        <tr>
            <th width="150"><?php echo L('site_name');?> :</th>
            <td><input type="text" name="set_name" class="input-text" size="50"  value="<?php echo ($user_setting['set_name']); ?>"></input></td>
        </tr>
        <tr>
            <th>网络描述</th>
            <td><input type="text" name="set_desc" class="input-text" size="50" maxlength="20"  value="<?php echo ($user_setting['set_desc']); ?>"></td>
        </tr>
        <tr>
            <th>公司标识 :</th>
            <td><input type="text" name="set_company" class="input-text" size="50"   maxlength="20" value="<?php echo ($user_setting['set_company']); ?>"></td>
        </tr>
		<tr>
            <th>自定义主页 :</th>
            <td><input type="text" name="index_url" class="input-text" size="100"   maxlength="100" value="<?php echo ($user_setting['index_url']); ?>"></td>
        </tr>
       
    <tr>
			<th>公司介绍 :</th>
		                <td><textarea name="set_info" id ="info" style="width:68%;height:400px;visibility:hidden;resize:none;" ><?php echo ($user_setting['set_info']); ?></textarea></td>
					</tr>
     
       <!-- <tr>
            <th><?php echo L('site_icp');?> :</th>
            <td><input type="text" name="setting[site_icp]" class="input-text" size="50" value="<?php echo C('pin_site_icp');?>"></td>
        </tr>
        <tr>
            <th><?php echo L('statistics_code');?> :</th>
            <td><textarea rows="3" cols="50" name="setting[statistics_code]"><?php echo C('pin_statistics_code');?></textarea></td>
        </tr>-->
            <tr>
        	<th></th>
        	<td><input type="hidden" name="menuid"  value="<?php echo ($menuid); ?>"/><input type="submit" class="btn btn_submit" value="<?php echo L('submit');?>"/></td>
    	</tr>

	</table>
	</form>
</div>
<script src="__STATIC__/js/jquery/jquery.js"></script>
<script src="__STATIC__/js/jquery/plugins/jquery.tools.min.js"></script>
<script src="__STATIC__/js/jquery/plugins/formvalidator.js"></script>
<script src="__STATIC__/js/jquery/plugins/formValidatorRegex.js"></script>
<script src="__STATIC__/js/pinphp.js"></script>
<script src="__STATIC__/js/admin.js"></script>
<script>
//初始化弹窗
(function (d) {
    d['okValue'] = lang.dialog_ok;
    d['cancelValue'] = lang.dialog_cancel;
    d['title'] = lang.dialog_title;
})($.dialog.defaults);
</script>

<?php if(isset($list_table)): ?><script src="__STATIC__/js/jquery/plugins/listTable.js"></script>
<script>
$(function(){
	$('.J_tablelist').listTable();
});
</script><?php endif; ?>

<link rel="stylesheet" href="__STATIC__/KindEditor/themes/default/default.css" />
<link rel="stylesheet" href="__STATIC__/KindEditor/plugins/code/prettify.css" />
<script charset="utf-8" src="__STATIC__/KindEditor/kindeditor.js"></script>
<script charset="utf-8" src="__STATIC__/KindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="__STATIC__/KindEditor/plugins/code/prettify.js"></script>
<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="set_info"]', {
				cssPath : '__STATIC__/KindEditor/plugins/code/prettify.css',
				uploadJson : '<?php echo U("attachment/editer_upload");?>',
				fileManagerJson : '<?php echo U("attachment/editer_manager");?>',
				allowFileManager : true,
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=example]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
</script>
</body>
</html>