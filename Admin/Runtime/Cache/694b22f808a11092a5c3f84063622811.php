<?php if (!defined('THINK_PATH')) exit();?><!--添加禁止IP-->
<div class="dialog_content">
	<form id="info_form" name="info_form" action="<?php echo u('user_bank/edit');?>" method="post">
	 <input type="hidden" name="id" id="J_cate_id" value="<?php echo ($info["id"]); ?>" />
	<table width="800" cellpadding="2" cellspacing="1" class="table_form">
		<tr>
			<th width="80">银行名称 :</th>
			<td><input type="text" name="bank_name" id="level_name" class="input-text" value=<?php echo ($info["bank_name"]); ?> size="80"></td>
		</tr>
		<tr>
			<th width="80">银行账户 :</th>
			<td><input type="text" name="bank_num" id="min_num" class="input-text" value=<?php echo ($info["bank_num"]); ?> size="80"></td>
		</tr>
		<tr>
			<th width="80">银行账名 :</th>
			<td><input type="text" name="bank_user" id="max_num" class="input-text" value=<?php echo ($info["bank_user"]); ?> size="80"></td>
		</tr>
		<tr>
			<th width="80">描述 :</th>
			<td><input type="text" name="bank_desc" id="discount" class="input-text" value=<?php echo ($info["bank_desc"]); ?> size="80"></td>
		</tr>

	</table>
	</form>
</div>
<script>
var check_name_url = "<?php echo U('member_setting/ajax_check_name', array('id'=>$info['id']));?>";
var check_num_url = "<?php echo U('member_setting/ajax_check_min', array('id'=>$info['id']));?>";
var check_num_url2 = "<?php echo U('member_setting/ajax_check_max', array('id'=>$info['id']));?>";
$(function(){
	$.formValidator.initConfig({formid:"info_form",autotip:true});
	$("#level_name").formValidator({onshow:'银行名称',onfocus:'银行名称'}).inputValidator({min:1,onerror:lang.please_input+'银行名称'}).defaultPassed();
	$("#min_num").formValidator({onshow:'银行账户',onfocus:'银行账户'}).inputValidator({min:1,onerror:lang.please_input+'银行账户'}).defaultPassed();
	$("#max_num").formValidator({onshow:'银行账名',onfocus:'银行账名'}).inputValidator({min:1,onerror:lang.please_input+'银行账名'}).defaultPassed();
	
	$('#info_form').ajaxForm({success:complate,dataType:'json'});
	function complate(result){
		if(result.status == 1){
			$.dialog.get(result.dialog).close();
			$.pinphp.tip({content:result.msg});
			window.location.reload();
		} else {
			$.pinphp.tip({content:result.msg, icon:'alert'});
		}
	}
});
</script>