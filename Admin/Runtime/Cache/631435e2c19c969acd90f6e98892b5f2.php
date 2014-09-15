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
<link href="__STATIC__/css/admin/user.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__STATIC__/weixin/item/jquery.js" charset="utf-8"></script>
<script type="text/javascript" src="__STATIC__/weixin/item/jquery.ui.js" charset="utf-8"></script>
<script charset="utf-8" type="text/javascript" src="__STATIC__/js/my_goods.js" charset="utf-8"></script>
<script charset="utf-8" type="text/javascript" src="__STATIC__/js/item_dialog.js" id="dialog_js" charset="utf-8"></script>


<style>
.box_arr .table_btn {width: 222px;}
.box_arr .table_btn a {float: left;}
.box_arr .table_btn a.disable_spec { background: url(http://vmall.waiwaili.com/themes/mall/new/styles/default/images/member/btn.gif) repeat 0 -1018px; float: right; }
.dialog_body{border:0px;}
.add_spec .add_link {color:#919191;}
.add_spec .add_link:hover {color:red;}
add_spec h2 {padding-left: 10px;}
.width7{width: 250px;}
.f_l{float:left;}
.mls_id {width: 0; filter: alpha(opacity=0);opacity: 0;}

</style>
<!--编辑商品-->
<form id="info_form" action="<?php echo u('item/edit');?>" method="post" enctype="multipart/form-data">
<div class="pad_lr_10">
	<div class="col_tab">
		<ul class="J_tabs tab_but cu_li">
			<li class="current">基本信息</li>
            <li>展示图片</li>
			<!--<li>SEO设置</li>-->
            <li>规格设置</li>
		</ul>
		<div class="J_panes">
        <div class="content_list pad_10">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tr>
				<th width="120">所属分类 :</th>
                <td><select class="J_cate_select mr10" data-pid="0" data-uri="<?php echo U('item_cate/ajax_getcates', array('type'=>0));?>" data-selected="<?php echo ($selected_ids); ?>"></select>
                <input type="hidden" name="cate_id" id="J_cate_id" value="<?php echo ($info["cate_id"]); ?>" /></td>
			</tr>
			

			
            <tr>
				<th>商品名称 :</th>
				<td><input  type="text" name="title" id="J_title" class="input-text" size="60" value="<?php echo ($info["title"]); ?>"></td>
			</tr>
		<!--	 <tr>
				<th>颜色 :</th>
				<td><input type="text" name="color" id="J_color" class="input-text" size="30" value="<?php echo ($info["color"]); ?>" ><font color="#FD5873">（不需要可不填, 格式：多个用竖杆“|”隔开，如：蓝色|红色|白色）</font></td>
			</tr>
			   <tr>
				<th>尺寸 :</th>
				<td><input type="text" name="size" id="J_size" class="input-text" size="30" value="<?php echo ($info["size"]); ?>"><font color="#FD5873">（不需要可不填, 格式：多个用竖杆“|”隔开，如：蓝色|红色|白色）</font></td>
			</tr>-->
			<tr>
                <th>商品简介 :</th>
                <td><textarea name="intro" cols="80" rows="2"><?php echo ($info["intro"]); ?></textarea></td>
            </tr>
            <tr>
				<th>商品图片 :</th>
				<td>
					<?php if(!empty($info['img'])): ?><img src="<?php echo attach(get_thumb($info['img'], '_m'), ''.session('token').'/item');?>" width="100" height="100"/><br /><?php endif; ?>
					<input type="file" name="img" />(宽px500*高500px)
				</td>
 			</tr>
 	
		    
		     <tr>
		      <th>运费:</th>
		      <td>
		      <select id='free' name="free">
		      <option <?php if($info["free"] == 1): ?>selected="selected"<?php endif; ?> value="1">卖家承担运费</option>
		      <option  <?php if($info["free"] == 2): ?>selected="selected"<?php endif; ?>  value="2">买家承担运费</option>
		      </select>
		      </td>
		    </tr>
		    
		      <script>
			  var SPEC = <?php echo ($spec_json); ?>;
   
		     $(function(){
        	 $('#free').change(function(){
        	  if($(this).val()==2)
        	  {
        	  	$('#address_form').show();
        	  }else
        	  {
        	  		$('#address_form').hide();
        	  }
        	 });
        	 set_address();
			 spec_update();
			 if (SPEC.spec_qty > 0){
			 	$("#item_price").hide();
				$("#item_stock").hide();
				$("#mark_price").hide();
				$("#item_sku").hide();
				}

        })
        
          function set_address()
          {
          var addr_id =$("#free").find("option:selected").val();
          	 //var addr_id = $("#free:selected").val();
          
           if(addr_id == 2)
            {
               
                $('#address_form').show();
            }
            else
            {
                $('#address_form').hide();
     
            }
          }
		    </script>
		    
		    <tr id="address_form" style="display:none;">
		    <th></th>
		    <td> 
		      平邮:<input value="<?php echo ($info["pingyou"]); ?>" onkeyup="value=value.replace(/[^\d\.]/g,'')" type="text" name="pingyou" />
		      快递:<input value="<?php echo ($info["kuaidi"]); ?>" onkeyup="value=value.replace(/[^\d\.]/g,'')" type="text" name="kuaidi" />
		      EMS:<input value="<?php echo ($info["ems"]); ?>" onkeyup="value=value.replace(/[^\d\.]/g,'')" type="text" name="ems" /></td>
		    </tr>
		    
			<!--<tr>
				<th>链接地址 :</th>
				<td><input type="text" name="url" class="input-text" size="50" value="<?php echo ($info["url"]); ?>"></td>
			</tr>
            <tr>
				<th>商品标签 :</th>
				<td>
                	<input type="text" name="tags" id="J_tags" class="input-text" size="50" value="<?php echo ($info["tags"]); ?>">
                    <input type="button" value="<?php echo L('auto_get');?>" id="J_gettags" name="tags_btn" class="btn">
                </td>
			</tr>-->
			<input  type="hidden" name="news" value="<?php echo ($info["news"]); ?>"> 
			<input  type="hidden" name="tuijian" value="<?php echo ($info["tuijian"]); ?>"> 
            <tr id="item_price">
				<th>商品价格 :</th>
				<td><input id='J_price' onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')"  type="text" name="price" size="10" class="input-text" value="<?php echo ($info["price"]); ?>"> 元</td>
			</tr>
			<tr id="mark_price">
				<th>市场价格 :</th>
				<td><input id='J_mark_price' onkeyup="this.value=this.value.replace(/[^0-9.]/g,'')" onafterpaste="this.value=this.value.replace(/[^0-9.]/g,'')"  type="text" name="markprice" size="10" class="input-text" value="<?php echo ($info["markprice"]); ?>"> 元</td>
			</tr>
			<tr id="item_stock">
				<th>商品库存 :</th>
				<td><input id='J_goods_stock' onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" type="text" name="goods_stock" class="input-text" size="10" value="<?php echo ($info["goods_stock"]); ?>"> </td>
			</tr>
			<tr id="item_sku">
				<th>商品编号 :</th>
				<td><input id='J_goods_num' onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" type="text" name="sku" class="input-text" size="10" value="<?php echo ($info["sku"]); ?>"> </td>
			</tr>
			
			<!--<tr>
				<th width="120">商品来源 :</th>
                <td>
				<select name="orig_id" id="orig_id">
            	<?php if(is_array($orig_list)): $i = 0; $__LIST__ = $orig_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><option value="<?php echo ($val["id"]); ?>" <?php if($info['orig_id'] == $val['id']): ?>selected="selected"<?php endif; ?>><?php echo ($val["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
            	</select></td>
			</tr>
			<tr>
            	<th>发布人 :</th>
                <td><?php echo ($info["uname"]); ?></td>
            </tr>-->
			 <tr>
			     <th>商品详情 :</th>
		         <td><textarea name="info" id ="info" style="width:68%;height:400px;visibility:hidden;resize:none;"><?php echo ($info["info"]); ?></textarea></td>
			</tr>
		</table>
		</div>
        <div class="content_list pad_10 hidden">
        	<style>
				.addpic {}
				.addpic li { float:left; text-align:center; margin:0 0 10px 20px;}
				.addpic a { display:block;}
            </style>
            <ul class="addpic">
            <?php if(is_array($img_list)): $i = 0; $__LIST__ = $img_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$val): $mod = ($i % 2 );++$i;?><li class="album_<?php echo ($val['id']); ?>">
            <a href="javascript:void(0)" onclick="del_album(<?php echo ($val['id']); ?>);"><img src="__STATIC__/css/admin/bgimg/tv-collapsable.gif" /></a>
            <a><img src="<?php echo attach(get_thumb($val['url'], '_b'), ''.session('token').'/item');?>" style="width:80px;height:60px; border:solid 1px #000; "/></a>
            </li><?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
            <div class="cb"></div>
            <table width="100%" cellpadding="2" cellspacing="1" class="table_form" id="first_upload_file">
                <tbody class="uplode_file">
                <tr>
                    <th width="100" align="left"><a href="javascript:void(0);" class="blue" onclick="add_file();"><img src="__STATIC__/css/admin/bgimg/tv-expandable.gif" /></a>上传文件 :</th>
                    <td><input type="file" name="imgs[]">(宽px500*高500px)</td>
                </tr>
                </tbody>
            </table>
        </div>
		<!--div class="content_list pad_10 hidden">
		<table width="100%" cellpadding="2" cellspacing="1" class="table_form">
			<tr>
				<th width="120"><?php echo L('seo_title');?> :</th>
 				<td><input type="text" name="seo_title" class="input-text" size="60" value="<?php echo ($info["seo_title"]); ?>"></td>
			</tr>
			<tr>
				<th><?php echo L('seo_keys');?> :</th>
				<td><input type="text" name="seo_keys" class="input-text" size="60" value="<?php echo ($info["seo_keys"]); ?>"></td>
			</tr>
			<tr>
				<th><?php echo L('seo_desc');?> :</th>
				<td><textarea name="seo_desc" cols="80" rows="8"><?php echo ($info["seo_desc"]); ?></textarea></td>
			</tr>
		</table>
		</div-->
        <div class="content_list pad_10 hidden">
		<!--start-->
           <div class="add_spec" id="wrapper" ectype="dialog_contents" style="display: none">
                            <!--<form>-->
                            <h2>编辑商品规格</h2>
                            <p>您最多可以添加两种规格（如：颜色和尺码）规格名称可以自定义<br/>如只有一项规格另一项留空</p>
                            <div class="table" ectype="spec_editor">
                                <ul class="th">
                                    <li><input col="spec_name_1" type="text" class="text width4" value="颜色"/></li>
                                    <li><input col="spec_name_2" type="text" class="text width4" value="尺码"/></li>
                                    <li class="distance1">商城价格</li>
									<li class="distance1">市场价格</li>
                                    <li class="distance1">库存</li>
                                    <li class="distance2">货号</li>
                                    <li class="distance3">操作</li>
                                </ul>
                                <ul class="td" ectype="spec_item">
                                    <li><input item="spec_1" type="text" class="text width4" /></li>
                                    <li><input item="spec_2" type="text" class="text width4" /></li>
                                    <li><input item="price" type="text" class="text width4" /></li>
									<li><input item="markprice" type="text" class="text width4" /></li>
                                    <li><input item="stock" type="text" class="text width4" /></li>
                                    <li><input item="sku" type="text" class="text width8" /><input item="spec_id" type="hidden" /></li>
                                    <li class="padding3">
                                        <span ectype="up_spec_item" class="up_btn"></span>
                                        <span ectype="down_spec_item" class="down_btn"></span>
                                        <span ectype="drop_spec_item" class="delete_btn"></span>
                                    </li>
                                </ul>
                                <ul>
                                    <li class="add"><a href="javascript:;" ectype="add_spec_item" class="add_link">添加新的规格属性</a></li>
                                </ul>
                            </div>
                            <div class="btn_wrap"><input ectype="save_spec" type="submit" class="btn" value="保存规格" /></div>
                            <!--</form>-->
                            <div style="position:relative">
                              <div class="add_spec_bottom"></div>
                            </div>
                        </div>

                            <div class="products">
                                <ul>
                                    <li>
                                        <h2>规格: </h2>
                                        <div class="arrange">
                                            <div class="box_arr" ectype="no_spec"  style="display: none;">
                                                <p class="pos_btn"><a ectype="add_spec" href="javascript:;" class="add_btn">开启规格</a></p>
                                                <p class="pos_txt">您最多可以添加两种商品规格（如：颜色，尺码）如商品没有规格则不用添加</p>
                                            </div>
                                            <div class="box_arr" ectype="has_spec"  style="display: none;">
                                            <table ectype="spec_result">
                                                <tr>
                                                    <th col="spec_name_1">loading..</th>
                                                    <th col="spec_name_2">loading..</th>
                                                    <th col="price">商城价格</th>
													<th col="markprice">市场价格</th>
                                                    <th col="stock">库存</th>
                                                    <th col="sku">货号</th>
                                                </tr>
                                                <tr ectype="spec_item" style="display:none">
                                                    <td item="spec_1"></td>
                                                    <td item="spec_2"></td>
                                                    <td item="price"></td>
													<td item="markprice"></td>
                                                    <td item="stock"></td>
                                                    <td item="sku"></td>
                                                </tr>
                                            </table>
                                            <p class="table_btn">
                                                <a ectype="edit_spec" href="javascript:;" class="add_btn edit_spec">编辑规格</a>
                                                <a ectype="disable_spec" href="javascript:;" class="add_btn disable_spec">关闭规格</a>
                                            </p>
                                        </div>
                                        </div>
                                    </li>   
                                </ul>
                            </div>
                            <div class="clear"></div>
                     
					
          
            <div class="wrap_bottom"></div>
			<div class="clear"></div>
		<!--end-->
		</div>
        </div>
		<div class="mt10"><input type="submit" value="<?php echo L('submit');?>" id="dosubmit" name="dosubmit" class="btn btn_submit" style="margin:0 0 10px 100px;"></div>
	</div>
</div>
<input type="hidden" name="menuid"  value="<?php echo ($menuid); ?>"/>
<input type="hidden" name="id" value="<?php echo ($info["id"]); ?>" />
</form>


<script src="__STATIC__/js/jquery/plugins/jquery.tools.min.js"></script>
<script src="__STATIC__/js/jquery/plugins/formvalidator.js"></script>
<script src="__STATIC__/js/pinphp.js"></script>
<script src="__STATIC__/js/admin.js"></script>


<?php if(isset($list_table)): ?><script src="__STATIC__/js/jquery/plugins/listTable.js"></script>
<script>
$(function(){
	$('.J_tablelist').listTable();
});
</script><?php endif; ?>


<script type="text/javascript">
$('.J_cate_select').cate_select('请选择');
$(function() {	
	$('ul.J_tabs').tabs('div.J_panes > div');
	//自动获取标签
	$('#J_gettags').live('click', function() {
		var title = $.trim($('#J_title').val());
		if(title == ''){
			$.pinphp.tip({content:lang.article_title_isempty, icon:'alert'});
			return false;
		}
		$.getJSON('<?php echo U("item/ajax_gettags");?>', {title:title}, function(result){
			if(result.status == 1){
				$('#J_tags').val(result.data);
			}else{
				$.pinphp.tip({content:result.msg});
			}
		});
	});
	$.formValidator.initConfig({formid:"info_form",autotip:true});
	$("#J_title").formValidator({onshow:'请填写商品名称',onfocus:'请填写商品名称'}).inputValidator({min:1,onerror:'请填写商品名称'}).defaultPassed();
	$("#J_price").formValidator({onshow:'请填写商品价格',onfocus:'请填写商品价格'}).inputValidator({min:1,onerror:'请填写商品价格'}).defaultPassed();
	$("#J_goods_stock").formValidator({onshow:'请填写商品库存',onfocus:'请填写商品库存'}).inputValidator({min:1,onerror:'请填写商品库存'}).defaultPassed();
	$("#J_mark_price").formValidator({onshow:'请填写市场价格',onfocus:'请填写市场价格'}).inputValidator({min:1,onerror:'请填写市场价格'}).defaultPassed();
	$("#J_goods_num").formValidator({onshow:'请填写商品编号',onfocus:'请填写商品编号'}).inputValidator({min:1,onerror:'请填写商品编号'}).defaultPassed();
});
function get_child_cates(obj,to_id)
{
	var parent_id = $(obj).val();
	if( parent_id ){
		$.get('?m=item&a=get_child_cates&g=admin&parent_id='+parent_id,function(data){
				var obj = eval("("+data+")");
				$('#'+to_id).html( obj.content );
	    });
    }
}

function add_file()
{
    $("#next_upload_file .uplode_file").clone().insertAfter($("#first_upload_file .uplode_file:last"));
}
function del_file_box(obj)
{
	$(obj).parent().parent().remove();
}
function del_album(id)
{
	var url = "<?php echo U('item/delete_album');?>";
    $.get(url+"&album_id="+id, function(data){
		if(data==1){
		    $('.album_'+id).remove();
		};
    });
}
function add_attr()
{
    $("#hidden_attr .add_item_attr").clone().insertAfter($("#item_attr .add_item_attr:last"));
}
function del_attrs(obj)
{
	$(obj).parent().parent().remove();
}
function del_attr(id,obj)
{
	var url = "<?php echo U('item/delete_attr');?>";
    $.get(url+"&attr_id="+id, function(data){
		if(data==1){
		    $(obj).parent().parent().remove();
		};
    });
}
</script>
<table id="next_upload_file" style="display:none;">
<tbody class="uplode_file">
   <tr>
      <th width="100"><a href="javascript:void(0);" onclick="del_file_box(this);" class="blue"><img src="__STATIC__/css/admin/bgimg/tv-collapsable.gif" /></a>上传文件 :</th>
      <td><input type="file" name="imgs[]"></td>
   </tr>
</tbody>
</table>
<table id="hidden_attr" style="display:none;">
<tbody class="add_item_attr">
<tr>
    <th width="200">
    <a href="javascript:void(0);" class="blue" onclick="del_attrs(this);"><img src="__STATIC__/css/admin/bgimg/tv-collapsable.gif" /></a>属性名 :<input type="text" name="attr[name][]" class="input-text" size="20">
    </th>
    <td>属性值 :<input type="text" name="attr[value][]" class="input-text" size="30"></td>
</tr>
</tbody>
</table>
</body>
</html>
<link rel="stylesheet" href="__STATIC__/KindEditor/themes/default/default.css" />
<link rel="stylesheet" href="__STATIC__/KindEditor/plugins/code/prettify.css" />
<script charset="utf-8" src="__STATIC__/KindEditor/kindeditor.js"></script>
<script charset="utf-8" src="__STATIC__/KindEditor/lang/zh_CN.js"></script>
<script charset="utf-8" src="__STATIC__/KindEditor/plugins/code/prettify.js"></script>
<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="info"]', {
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