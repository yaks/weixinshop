<?php if (!defined('THINK_PATH')) exit();?><!--添加禁止IP-->

<script type="text/javascript" language="javascript" src='__STATIC__/weixin/js/dizhi.js'></script>
<script type="text/javascript" language="javascript" src='__STATIC__/weixin/js/diqu.js'></script>
<script language="javascript">
		new PCAS("Province","City","Area","","","");
</script>
<div class="dialog_content">
	<form id="info_form" name="info_form" action="<?php echo u('address/add');?>" method="post">
	<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
		<tr>
			<th width="100"><span class="red">*</span>联系人：</th>
			<td><input type="text" name="contacts" id="contacts" class="input-text"></td>
		</tr>
		<tr>
			<th width="100"><span class="red">*</span>所在地区：</th>
			<td>
			<select id="Province" name="Province"></select>
		     <select id="City" name="City"></select>
			<select id="Area" name="Area"></select>
			 </td>
		</tr>
		<tr>
			<th width="100"><span class="red">*</span>详细地址：</th>
			<td><input type="text" name="address" id="address" class="input-text"></td>
		</tr>
		<tr>
			<th width="100">邮政编码：</th>
			<td><input type="text" name="postcode" id="postcode" class="input-text"></td>
		</tr>
		<tr>
			<th width="100">手机号码：</th>
			<td><input type="text" name="mobile" id="mobile" class="input-text"></td>
		</tr>
		<tr>
			<th width="100">电话号码：</th>
			<td><input type="text" name="phone" id="phone" class="input-text"></td>
		</tr>
		<tr>
			<th width="100">公司名称：</th>
			<td><input type="text" name="name" id="name" class="input-text"></td>
		</tr>
		<tr>
			<th width="100">是否默认：</th>
			<td><input type="checkbox" value="1" name="isno" id="isno" class="input-text">（设为默认发货地址）</td>
		</tr>
        <tr>
			<th width="100">排序值 :</th>
			<td><input type="text" name="ordid" id="ordid" class="input-text" size="10"></td>
		</tr>
		<tr>
			<th><?php echo L('enabled');?> :</th>
			<td>
				<label><input type="radio" name="status" class="radio_style" value="1" checked="checked"> <?php echo L('yes');?></label>
				<label class="ml10"><input type="radio" name="status" class="radio_style" value="0"> <?php echo L('no');?></label>
			</td>
		</tr>
	</table>
	</form>
</div>
<script>
var check_name_url = "<?php echo U('address/ajax_check_name');?>";
$(function(){
	$.formValidator.initConfig({formid:"info_form",autotip:true});
	/*$("#name").formValidator({onshow:lang.please_input+'名称',onfocus:lang.please_input+'名称'}).inputValidator({min:1,onerror:lang.please_input+'名称'}).ajaxValidator({
	    type : "get",
		url : check_name_url,
		datatype : "json",
		async:'false',
		success : function(result){	
            if(result.status == 0){
                return false;
			}else{
                return true;
			}
		},
		onerror : '名称已存在',
		onwait : lang.connecting_please_wait
	});
	*/
	$("#contacts").formValidator({onshow:'请填写联系人',onfocus:'请填写联系人'}).inputValidator({min:1,onerror:'请填写联系人'});
	$("#address").formValidator({onshow:'请填写详细地址',onfocus:'请填写详细地址'}).inputValidator({min:1,onerror:'请填写详细地址'});
	$("#Province").formValidator({onshow:'请选择所在地区',onfocus:'请选择所在地区'}).inputValidator({min:1,onerror:'请选择所在地区'});
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