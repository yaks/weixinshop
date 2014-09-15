<?php if (!defined('THINK_PATH')) exit();?>

<div class="dialog_content">
<div class="J_tablelist_spec table_list" data-acturi="<?php echo U('item/spec_edit');?>">
    <table width="100%" cellspacing="0">
        <thead>
            <tr>
                <th style="display:none;"><span data-field="spec_id">ID</span></th>
                <th align="center"><span data-field="spec_1"><?php echo ($item["spec_name_1"]); ?></span></th>
				<th align="center"><span data-field="spec_2"><?php echo ($item["spec_name_2"]); ?></span></th>
				<th width="60" align="center"><span data-field="price">商场价格</span></th>
				<th width="60" align="center"><span data-field="markprice">市场价格</span></th>
				<th width="40" align="center"><span data-field="sku">编号</span></th>
				<th width="40" align="center"><span data-field="stock">库存</span></th>
				<th align="center"><span data-field="buy_num">销量</span></th>
                <th  style="display:none;" width="80"><?php echo L('operations_manage');?></th>
            </tr>
        </thead>
    	<tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><tr>
                <td  style="display:none;" align="center"><?php echo ($val["spec_id"]); ?></td>
                <td align="center"><span data-field="spec_1" data-id="<?php echo ($val["spec_id"]); ?>" ><?php echo ($val["spec_1"]); ?></span></td>
                <td align="center"><span data-field="spec_2" data-id="<?php echo ($val["spec_id"]); ?>" ><?php echo ($val["spec_2"]); ?></span></td>
				<td align="center"><span data-tdtype="edit" data-field="price" data-id="<?php echo ($val["spec_id"]); ?>" class="tdedit"><?php echo ($val["price"]); ?></span></td>
				<td align="center"><span data-tdtype="edit" data-field="markprice" data-id="<?php echo ($val["spec_id"]); ?>" class="tdedit"><?php echo ($val["markprice"]); ?></span></td>
				<td align="center"><span data-tdtype="edit" data-field="sku" data-id="<?php echo ($val["spec_id"]); ?>" class="tdedit"><?php echo ($val["sku"]); ?></span></td>
				<td align="center"><span data-tdtype="edit" data-field="stock" data-id="<?php echo ($val["spec_id"]); ?>" class="tdedit"><?php echo ($val["stock"]); ?></span></td>
				<td align="center"><span data-field="buy_num" data-id="<?php echo ($val["spec_id"]); ?>" ><?php echo ($val["buy_num"]); ?></span></td>

                <td  style="display:none;" align="center">
                <a href="javascript:void(0);" class="J_confirmurl" data-uri="<?php echo u('user/delete', array('id'=>$val['spec_id']));?>" data-acttype="ajax" data-msg="<?php echo sprintf(L('confirm_delete_one'),$val['spec_id']);?>"><?php echo L('delete');?></a></td>
            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
    	</tbody>
    </table>
</div>
</div>
<script src="__STATIC__/js/jquery/plugins/listTable.js"></script>
<script>
$(function(){
	$('.J_tablelist_spec').listTable();
});
</script>