<?php if (!defined('THINK_PATH')) exit();?><!--编辑会员-->
<div class="dialog_content">
	<form id="info_form" action="<?php echo u('user/edit');?>" method="post">
	<table width="100%" class="table_form">
		<tr>
			<th width="100">会员昵称 :</th>
			<td><?php echo ($info["nickname"]); ?></td>
		</tr>
		<tr>
			<th width="100">用户识别码 :</th>
			<td><?php echo ($info["openid"]); ?></td>
		</tr>
		<tr>
        	<th>性别 :</th>
            <td>
            	<label><input type="radio" name="sex" value="1" <?php if($info["sex"] == 1): ?>checked<?php endif; ?>> 男</label>&nbsp;&nbsp;
				<label><input type="radio" name="sex" value="0" <?php if($info["sex"] == 2): ?>checked<?php endif; ?>> 女</label>
            </td>
        </tr>
			<tr>
        	<th>区域 :</th>
            <td>
            	<?php echo ($info["country"]); ?> - <?php echo ($info["province"]); ?> - <?php echo ($info["city"]); ?>
            </td>
        </tr>
					<tr>
        	<th>首次登陆时间 :</th>
            <td>
            	<?php echo (date("Y-m-d H:i",$info["reg_time"])); ?> 
        </tr>
					<tr>
        	<th>最后登陆时间 :</th>
            <td>
            	<?php echo (date("Y-m-d H:i",$info["last_time"])); ?> 
            </td>
        </tr>
					<tr>
        	<th>最后登陆IP :</th>
            <td>
            	<?php echo ($info["last_ip"]); ?> 
            </td>
        </tr>
	    <!--<tr>
			<th>会员头像 :</th>
			<td>
            	<input type="text" name="img" id="J_img" class="input-text fl mr10" size="30" value="<?php echo ($info["img"]); ?>">
            	<div id="J_upload_img" class="upload_btn"><span><?php echo L('upload');?></span></div>
                <img src="<?php echo avatar($info['id'], 32);?>" />
				<?php if(!empty($info['img'])): ?><span class="attachment_icon J_attachment_icon" file-type="image" file-rel="<?php echo avatar($info['id'], 32);?>"><img src="__ROOT__/statics/images/filetype/image_s.gif" /></span><?php endif; ?>
            </td>
		</tr>-->
		<tr>
			<th>用户姓名(默认为用户识别码) :</th>
			<td><input type="text" name="username" id="username" class="input-text" value="<?php echo ($info["username"]); ?>" size="30"></td>
		</tr>
		<tr>
			<th>用户积分(通过积分可调整用户级别):</th>
			<td><input type="text" name="score" id="score" class="input-text" value="<?php echo ($info["score"]); ?>" size="30"></td>
		</tr>      
        <tr>
			<th>电话 :</th>
			<td><input type="text" name="phone" id="phone" class="input-text" size="30" value="<?php echo ($info["phone"]); ?>"></td>
		</tr>
		<tr>
			<th>地址 :</th>
			<td>
			<textarea  type="text" name="address" class="input-text" rows="2" cols="50"><?php echo ($info["address"]); ?></textarea>
            </td>
		</tr>
		 <tr>
			<th>备注 :</th>
			<td>
			<textarea  type="text" name="remark" class="input-text" rows="2" cols="50"><?php echo ($info["remark"]); ?></textarea>
            </td>
		</tr>

        
	    <tr>
			<th><?php echo L('enabled');?> :</th>
			<td>
				<label><input type="radio" name="status" value="1" <?php if($info["status"] == 1): ?>checked<?php endif; ?>> <?php echo L('yes');?></label>&nbsp;&nbsp;
				<label><input type="radio" name="status" value="0" <?php if($info["status"] == 0): ?>checked<?php endif; ?>> <?php echo L('no');?></label>
			</td>
		</tr>
	</table>
	<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
	</form>
</div>
<script src="__STATIC__/js/fileuploader.js"></script>
<script>

var check_name_url = "<?php echo U('user/ajax_check_name', array('id'=>$info['id']));?>";
var check_email_url = "<?php echo U('user/ajax_check_email', array('id'=>$info['id']));?>";
$(function(){
	$.formValidator.initConfig({formid:"info_form",autotip:true});
	$("#username").formValidator({onshow:'请填写用户名',onfocus:'请填写用户名'}).inputValidator({min:1,onerror:'请填写用户名'}).ajaxValidator({
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
		onerror : '用户已经存在',
		onwait : '正在检测'
	}).defaultPassed();
	$("#email").formValidator({onshow:"请填写邮箱",onfocus:"请填写邮箱"}).inputValidator({min:1,onerror:"请填写邮箱"}).regexValidator({regexp:"email",datatype:"enum",onerror:"邮箱格式错误"}).ajaxValidator({
	    type : "get",
		url : check_email_url,
		datatype : "json",
		async:'false',
		success : function(result){	
            if(result.status == 0){
                return false;
			}else{
                return true;
			}
		},
		onerror : '邮箱已经存在',
		onwait : '正在检测'
	}).defaultPassed();
	
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
	
	//上传图片
    var uploader = new qq.FileUploaderBasic({
    	allowedExtensions: ['jpg','gif','jpeg','png','bmp','pdg'],
        button: document.getElementById('J_upload_img'),
        multiple: false,
        action: "<?php echo U('user/ajax_upload_imgs');?>",
        inputName: 'img',
        forceMultipart: true, //用$_FILES
        messages: {
        	typeError: lang.upload_type_error,
        	sizeError: lang.upload_size_error,
        	minSizeError: lang.upload_minsize_error,
        	emptyError: lang.upload_empty_error,
        	noFilesError: lang.upload_nofile_error,
        	onLeave: lang.upload_onLeave
        },
        showMessage: function(message){
        	$.pinphp.tip({content:message, icon:'error'});
        },
        onSubmit: function(id, fileName){
        	$('#J_upload_img').addClass('btn_disabled').find('span').text(lang.uploading);
        },
        onComplete: function(id, fileName, result){
        	$('#J_upload_img').removeClass('btn_disabled').find('span').text(lang.upload);
            if(result.status == '1'){
        		$('#J_img').val(result.data);
        	} else {
        		$.pinphp.tip({content:result.msg, icon:'error'});
        	}
        }
    });
});
</script>