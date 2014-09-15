<?php if (!defined('THINK_PATH')) exit();?>﻿<!--编辑会员-->
<div class="dialog_content">
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
			<td><?php echo ($info["username"]); ?></td>
		</tr>
		<tr>
			<th>用户积分:</th>
			<td><?php echo ($info["score"]); ?></td>
		</tr>      
        <tr>
			<th>电话 :</th>
			<td><?php echo ($info["phone"]); ?></td>
		</tr>
		<tr>
			<th>地址 :</th>
			<td>
			<?php echo ($info["address"]); ?>
            </td>
		</tr>
		 <tr>
			<th>备注 :</th>
			<td>
			<?php echo ($info["remark"]); ?>
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

</div>
<script src="__STATIC__/js/fileuploader.js"></script>