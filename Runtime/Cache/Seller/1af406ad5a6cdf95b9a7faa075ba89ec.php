<?php if (!defined('THINK_PATH')) exit();?>
<div class="spec_item_item" style="float:left;margin:5px;width:250px; position: relative">
	<input type="hidden" class="form-control spec_item_show" name="spec_item_show_<?php echo ($spec['id']); ?>[]" value="<?php echo ($specitem['show']); ?>" />
	<input type="hidden" class="form-control spec_item_id" name="spec_item_id_<?php echo ($spec['id']); ?>[]" value="<?php echo ($specitem['id']); ?>" />
	
	<div class="input-group">
		<span class="input-group-addon">
			<input type="checkbox" <?php if($specitem['id']>0){ ?>checked<?php } ?> value="1" onclick='showItem(this)'>
		</span>
		<input type="text" class="form-control spec_item_title" onblur="refreshOptions()" name="spec_item_title_<?php echo ($spec['id']); ?>[]" VALUE="<?php echo ($specitem['title']); ?>" />
		
		<span class="input-group-addon spec_item_thumb <?php if( !empty($specitem['thumb']) ){ ?>has_thumb<?php } ?>">
			           <input type='hidden'  name="spec_item_thumb_<?php echo ($spec['id']); ?>[]" value="<?php echo ($specitem['thumb']); ?>"
						/>
				<img onclick="selectSpecItemImage(this)" onerror="this.src='/static/images/nopic100.jpg'" 
					 src="<?php if(empty($specitem['thumb'])){ ?>/static/images/nopic100.jpg<?php  }else{ echo tomedia( resize($specitem['thumb'],100) ); } ?>" style='width:100%;'
					
					 <?php if( !empty($specitem['thumb']) ){ ?>
							data-toggle='popover'
							data-html ='true'
							data-placement='top'
							data-trigger ='hover'
							data-content="<img src='<?php echo tomedia($specitem['thumb']);?>' style='width:100px;height:100px;' />"
                                                            <?php } ?>
					 >
				<i class="fa fa-times-circle" <?php if(empty($specitem['thumb'])){ ?>style="display:none"<?php } ?>></i> 
		</span>
		
		<span class="input-group-addon">
			<a href="javascript:;" onclick="removeSpecItem(this)" title='删除'><i class="fa fa-times"></i></a>
	  		<a href="javascript:;" class="fa fa-arrows" title="拖动调整显示顺序" ></a>
		</span>
	</div>
  
                
</div>