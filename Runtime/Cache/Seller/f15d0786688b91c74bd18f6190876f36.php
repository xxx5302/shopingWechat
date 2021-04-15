<?php if (!defined('THINK_PATH')) exit();?> <div class='spec_item spec_class_<?php echo ($cur_cate_id); ?>' id='spec_<?php echo ($spec['id']); ?>' >
	 <div style='border:1px solid #e7eaec;padding:10px;margin-bottom: 10px;' >
		<input name="spec_id[]" type="hidden" class="form-control spec_id" value="<?php echo ($spec['id']); ?>"/>
		<div class="form-group">
		<div class="col-sm-12">
				<div class='input-group'>
					<input name="spec_title[<?php echo ($spec['id']); ?>]" type="text" class="form-control  spec_title" value="<?php echo ($spec['title']); ?>" placeholder="规格名称 (比如: 颜色)"/>
					<div class='input-group-btn'>
						<a href="javascript:;" id="add-specitem-<?php echo ($spec['id']); ?>" specid='<?php echo ($spec['id']); ?>' class='btn btn-info add-specitem' onclick="addSpecItem('<?php echo ($spec['id']); ?>')"><i class="fa fa-plus"></i> 添加规格项</a>
						<a href="javascript:void(0);" class='btn btn-danger' onclick="removeSpec('<?php echo ($spec['id']); ?>')"><i class="fa fa-remove"></i></a>
					</div>
				</div>
				
			</div>
		</div>
		<div class="form-group">
			<div class="col-md-12">
				<div id='spec_item_<?php echo ($spec['id']); ?>' class='spec_item_items'>
				<?php foreach( $spec['items'] as $specitem ){ ?>
					 
<div class="spec_item_item" style="float:left;margin:5px;width:250px; position: relative">
	<input type="hidden" class="form-control spec_item_show" name="spec_item_show_<?php echo ($spec['id']); ?>[]" value="<?php echo ($specitem['show']); ?>" />
	<input type="hidden" class="form-control spec_item_id" name="spec_item_id_<?php echo ($spec['id']); ?>[]" value="<?php echo ($specitem['id']); ?>" />
	
	<div class="input-group">
		<span class="input-group-addon">
			<input type="checkbox" <?php if($specitem['id']>0){ ?>checked<?php } ?> value="1" onclick='showItem(this)'>
		</span>
		<input type="text" class="form-control spec_item_title" onblur="refreshOptions()" name="spec_item_title_<?php echo ($spec['id']); ?>[]" VALUE="<?php echo ($specitem['title']); ?>" />
		
		<span class="input-group-addon spec_item_thumb <?php if(!empty($specitem['thumb'])){ ?>has_thumb<?php } ?>">
			           <input type='hidden'  name="spec_item_thumb_<?php echo ($spec['id']); ?>[]" value="<?php echo ($specitem['thumb']); ?>"
						/>
				<img onclick="selectSpecItemImage(this)" onerror="this.src='/static/images/nopic100.jpg'" 
					 src="<?php if(empty($specitem['thumb'])){ ?>/static/images/nopic100.jpg<?php  }else{ echo resize($specitem['thumb'],100); } ?>" style='width:100%;'
					
					 <?php if(!empty($specitem['thumb'])){ ?>
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




				<?php } ?>
				</div>
			</div>
		</div>
   </div> 
</div>