<?php if (!defined('THINK_PATH')) exit();?><style>
	.fui-goods-list{width:100%;border-bottom: 1px dashed #e1ecee;padding-top:5px;padding-bottom:5px;}
	.fui-goods-list span{display: block;padding:0;}
</style>
<form class="form-horizontal form-validate" action="<?php if( $edit_flag==1){ echo U('order/opchangeExpress'); }else{ echo U('order/opsend'); } ?>" method="post" enctype="multipart/form-data">
	<input type='hidden' name='id' value='<?php echo ($id); ?>' />

	<div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title"><?php if( $edit_flag==1){ ?>修改物流信息<?php  }else{ ?>订单发货<?php } ?></h4>
            </div>
            <div class="modal-body">
                   	<div class="form-group">
						<label class="col-sm-2 control-label">收 货 人</label>
						<div class="col-sm-9 col-xs-12">
							<div class="form-control-static">
								联系人: <?php echo ($item['shipping_name']); ?> / <?php echo ($item['shipping_tel']); ?> <br/>
								地    址: <?php echo ($province_info['name']); echo ($city_info['name']); echo ($area_info['name']); ?> <?php echo ($item['shipping_address']); ?>
							</div>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label">快递公司</label>
						<div class="col-sm-9 col-xs-12">
						
							<select name="express" class='form-control select2'  data-placeholder="商品分类">
								<option value="" data-name="">请选择快递公司</option>
								<?php foreach( $express_list as $value ){ ?>
								<option value="<?php echo ($value['id']); ?>" <?php if( $item['shipping_method'] == $value['id']){ ?>selected<?php } ?> data-name="<?php echo ($value['name']); ?>"><?php echo ($value['name']); ?></option>
								<?php } ?>
							</select>
						
							<input type='hidden' name='expresscom' id='expresscom' value="<?php echo ($item['expresscom']); ?>"/>
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 control-label must">快递单号</label>
						<div class="col-sm-9 col-xs-12">
							<input type="text" name="shipping_no" class="form-control" value="<?php echo ($item['shipping_no']); ?>" data-rule-required='true' />
						</div>
					</div>
				<?php if( $order_goods){ ?>
					<div class="form-group sendpress" >
						<label class="col-sm-2 control-label">发货商品</label>
						<div class="col-sm-9 col-xs-12">
							
							<?php foreach( $order_goods as $k => $g ){ ?>
							<label class="fui-goods-list checkbox-inline row">
								<span class="col-sm-1">
									
									<img src="<?php echo tomedia($g['thumb']);?>" width="25" height="25" alt="">
								</span>
								<span class="col-sm-11" style="height:25px;line-height: 25px;display: block;overflow: hidden;">
									<?php echo ($g['title']); ?>
								</span>
							</label>
							<?php } ?>
							
						</div>
					</div>
			   		<?php } ?>
				

			   

            </div>
            <div class="modal-footer">
                <button class="btn btn-primary" type="submit"><?php if( $edit_flag==1){ ?>保存信息<?php  }else{ ?>确认发货<?php } ?></button>
                <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
            </div>
        </div>
</form>

<script language="javascript">
    
	$("input[name=sendtype]").off("click").on("click",function(){
		window.sendtype = $(this).val();
		if(window.sendtype==1){
			$(".sendpress").show();
		}else{
			$(".sendpress").hide();
		}
	});


</script>