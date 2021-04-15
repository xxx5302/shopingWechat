<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php $shoname_name = D('Home/Front')->get_config_by_name('shoname'); ?>
  <title><?php echo $shoname; ?></title>
  <link rel="shortcut icon" href="" />
        
  <meta name="renderer" content="webkit">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=0">

  <link rel="stylesheet" href="/layuiadmin/style/admin.css" media="all">
 
<!-- 让IE8/9支持媒体查询，从而兼容栅格 -->
<!--[if lt IE 9]>
  <script src="https://cdn.staticfile.org/html5shiv/r29/html5.min.js"></script>
  <script src="https://cdn.staticfile.org/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->  

<link href="./resource/css/bootstrap.min.css?v=201903260001" rel="stylesheet">
<link href="./resource/css/common.css?v=201903260001" rel="stylesheet">
<script type="text/javascript">
            window.sysinfo = {
            <?php if (!empty($_W['uniacid']) ){ ?>'uniacid': '<?php echo ($_W['uniacid']); ?>',<?php } ?>
			
            <?php if( !empty($_W['acid']) ){ ?>'acid': '<?php echo ($_W['acid']); ?>',<?php } ?>
			
            <?php if (!empty($_W['openid']) ) { ?>'openid': '<?php echo ($_W['openid']); ?>',<?php } ?>
			
            <?php if( !empty($_W['uid']) ) { ?>'uid': '<?php echo ($_W['uid']); ?>',<?php } ?>
			
            'isfounder': <?php if (!empty($_W['isfounder']) ) { ?>1<?php  }else{ ?>0<?php } ?>,
			
            'siteroot': '<?php echo ($_W['siteroot']); ?>',
                    'siteurl': '<?php echo ($_W['siteurl']); ?>',
                    'attachurl': '<?php echo ($_W['attachurl']); ?>',
                    'attachurl_local': '<?php echo ($_W['attachurl_local']); ?>',
                    'attachurl_remote': '<?php echo ($_W['attachurl_remote']); ?>',
                    'module' : {'url' : '<?php if( defined('MODULE_URL') ) { ?>{MODULE_URL}<?php } ?>', 'name' : '<?php if (defined('IN_MODULE') ) { ?>{IN_MODULE}<?php } ?>'},
            'cookie' : {'pre': ''},
            'account' : <?php echo json_encode($_W['account']);?>,
            };
        </script>
		
<script type="text/javascript" src="./resource/js/lib/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="./resource/js/lib/bootstrap.min.js"></script>
<script type="text/javascript" src="./resource/js/app/util.js?v=201903260001"></script>
<script type="text/javascript" src="./resource/js/app/common.min.js?v=201903260001"></script>
<script type="text/javascript" src="./resource/js/require.js?v=201903260001"></script>
<script type="text/javascript" src="./resource/js/lib/jquery.nice-select.js?v=201903260001"></script>
<link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
<link href="/static/css/snailfish.css" rel="stylesheet">
<style>
	body.dragging, body.dragging * {
		cursor: move !important;
	}
	.dragged {
		position: absolute;
		opacity: 0.5;
		z-index: 2000;
		border: 1px solid #ccc;
		border-radius: 5px;
		background: #fff;
	}
	#sortable li {
		border-top: 1px solid #c5c5c5;
		padding-top: 20px;
	}
	#sortable li:first-child {
		border: 0;
	}
	#sortable li.placeholder {
		position: relative;
	}
	#sortable li.placeholder:before {
		position: absolute;
	}
</style>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">配送方式设置</div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >

				<blockquote class="layui-elem-quote">购物车页面顶部选项卡配送方式自定义</blockquote>
				<div class="layui-form-item">
					<label class="layui-form-label">全部商品</label>
					<div class='layui-input-block'>
						<div class="radio-inline">
							<div class="layui-form-mid layui-word-aux">修改名称</div>
							<div class="layui-input-inline">
								<input type="text" name="parameter[shopcar_tab_all_name]" value="<?php echo ($data['shopcar_tab_all_name']); ?>" class="layui-input" placeholder="全部商品"/>
							</div>
							<div class="layui-form-mid layui-word-aux">默认：全部商品</div>
						</div>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">快递商品</label>
					<div class='layui-input-block'>
						<div class="radio-inline">
							<div class="layui-form-mid layui-word-aux">修改名称</div>
							<div class="layui-input-inline">
								<input type="text" name="parameter[shopcar_tab_express_name]" value="<?php echo ($data['shopcar_tab_express_name']); ?>" class="layui-input" placeholder="快递商品"/>
							</div>
							<div class="layui-form-mid layui-word-aux">默认：快递商品</div>
						</div>
					</div>
				</div>

				<blockquote class="layui-elem-quote">订单提交页面配送方式自定义(点击<i class="fa fa-arrows-alt text-primary"></i>并拖动排序)</blockquote>
				<ul id="sortable" class="limited_drop_targets">
					<?php foreach($data['delivery_diy_sort_arr'] as $vo){ ?>
						<?php if($vo==0){ ?>
							<li data-id="0">
								<div class="layui-form-item">
									<label class="layui-form-label">
										<i class="fa fa-arrows-alt text-primary"></i>
										社区自提
									</label>
									<div class="layui-input-block">
										<label class='radio-inline'>
											<input type='radio' title="关闭"  name='parameter[delivery_type_ziti]' value='2' <?php if(isset($data['delivery_type_ziti']) && $data['delivery_type_ziti'] ==2){ ?>checked <?php } ?> /> 
										</label>
										<label class='radio-inline'>
											<input type='radio' title="开启" name='parameter[delivery_type_ziti]' value='1' <?php if( !isset($data['delivery_type_ziti']) || $data['delivery_type_ziti'] ==1 ){ ?>checked <?php } ?> /> 
										</label>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label"></label>
									<div class='layui-input-block'>
										<div class="radio-inline">
											<div class="layui-form-mid layui-word-aux">名称</div>
											<div class="layui-input-inline">
												<input type="text" name="parameter[delivery_ziti_name]" value="<?php echo ($data['delivery_ziti_name']); ?>" class="layui-input" placeholder="社区自提"/>
											</div>
											<div class="layui-form-mid layui-word-aux">默认：社区自提（下单页面，配送方式变更为修改的名称）</div>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>

						<?php if($vo==1){ ?>
							<li data-id="1">
								<div class="layui-form-item">
									<label class="layui-form-label">
										<i class="fa fa-arrows-alt text-primary"></i>
										团长配送
									</label>
									<div class="layui-input-block">
										<label class='radio-inline'>
											<input type='radio' id="close_tuanz" title="关闭" lay-filter="formtuanz"  name='parameter[delivery_type_tuanz]' value='2' <?php if( !isset($data['delivery_type_tuanz']) || $data['delivery_type_tuanz'] ==2 ){ ?>checked <?php } ?> /> 
										</label>
										<label class='radio-inline'>
											<input type='radio' id="open_tuanz" title="开启" lay-filter="formtuanz"  name='parameter[delivery_type_tuanz]' value='1' <?php if( isset($data['delivery_type_tuanz']) && $data['delivery_type_tuanz'] ==1 ){ ?>checked <?php } ?> /> 
										</label>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label"></label>
									<div class='layui-input-block'>
										<div class="radio-inline">
											<div class="layui-form-mid layui-word-aux">名称</div>
											<div class="layui-input-inline">
												<input type="text" name="parameter[delivery_tuanzshipping_name]" value="<?php echo ($data['delivery_tuanzshipping_name']); ?>" class="layui-input" placeholder="团长配送"/>
											</div>
											<div class="layui-form-mid layui-word-aux">默认：团长配送（下单页面，配送方式变更为修改的名称）</div>
										</div>
									</div>
								</div>
								
								<div class="layui-form-item">
									<label class="layui-form-label"></label>
									<div class='layui-input-block'>
										<div class="radio-inline">
											<div class="layui-form-mid layui-word-aux">"配送费"自定义</div>
											<div class="layui-input-inline">
												<input type="text" name="parameter[placeorder_tuan_name]" value="<?php echo ($data['placeorder_tuan_name']); ?>" class="layui-input" placeholder="配送费"/>
											</div>
											<div class="layui-form-mid layui-word-aux">下单页面"配送费"文字自定义，默认：配送费</div>
										</div>
									</div>
								</div>
								
								<div class="layui-form-item">
									<label class="layui-form-label"></label>
									<div class="layui-input-block">
										<div class="radio-inline" id="txtPickupDateTip" <?php if(isset($data['delivery_type_tuanz']) && $data['delivery_type_tuanz'] ==1){ ?> display: inline-block;<?php }else{ ?> display: none;<?php } ?>>
											<div class="layui-form-mid layui-word-aux">团长配送费</div>
											<div class="layui-input-inline">
												<input type="text"  name="parameter[delivery_tuanz_money]" value="<?php echo ($data['delivery_tuanz_money']); ?>" class="layui-input" />
											</div>
											<div class="layui-form-mid layui-word-aux">开启请填写团长配送每单配送费(元)</div>
										</div>
										
										<div class="radio-inline" id="free_tuanz_free" <?php if( isset($data['delivery_type_tuanz']) && $data['delivery_type_tuanz'] ==1 ){ ?> display: inline-block;<?php }else{ ?> display: none;<?php } ?>>
											<div class="layui-form-mid layui-word-aux">满</div>
											<div class="layui-input-inline">
												<input type="text" name="parameter[man_free_tuanzshipping]" value="<?php echo ($data['man_free_tuanzshipping']); ?>" class="layui-input" />
											</div>
											<div class="layui-form-mid layui-word-aux">免团长配送费（0则不减免运费,只对非独立供应商商品有效）</div>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>

						<?php if($vo==2){ ?>
							<li data-id="2">
								<div class="layui-form-item">
									<label class="layui-form-label">
										<i class="fa fa-arrows-alt text-primary"></i>
										快递配送
									</label>
									<div class="layui-input-block">
										<label class='radio-inline'>
											<input type='radio' title="关闭" lay-filter="formexpress"  name='parameter[delivery_type_express]' value='2' <?php if(!isset($data['delivery_type_express']) || $data['delivery_type_express'] ==2){ ?> checked<?php }else{ ?> <?php } ?> /> 
										</label>
										<label class='radio-inline'>
											<input type='radio' title="开启" lay-filter="formexpress"  name='parameter[delivery_type_express]' value='1' <?php if( isset($data['delivery_type_express']) && $data['delivery_type_express'] ==1 ){ ?> checked<?php }else{ ?> <?php } ?>  /> 
										</label>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label"></label>
									<div class='layui-input-block'>
										<div class="radio-inline">
											<div class="layui-form-mid layui-word-aux">名称</div>
											<div class="layui-input-inline">
												<input type="text" name="parameter[delivery_express_name]" value="<?php echo ($data['delivery_express_name']); ?>" class="layui-input" placeholder="快递配送"/>
											</div>
											<div class="layui-form-mid layui-word-aux">默认：快递配送（下单页面，配送方式变更为修改的名称）</div>
										</div>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label"></label>
									<div class='layui-input-block'>
										<div class="radio-inline">
											<div class="layui-form-mid layui-word-aux">"快递费"自定义</div>
											<div class="layui-input-inline">
												<input type="text" name="parameter[placeorder_trans_name]" value="<?php echo ($data['placeorder_trans_name']); ?>" class="layui-input" placeholder="快递费"/>
											</div>
											<div class="layui-form-mid layui-word-aux">下单页面"快递费"文字自定义，默认：快递费</div>
										</div>
									</div>
								</div>
									
								<div class="layui-form-item">
									<label class="layui-form-label"></label>
									<div class='layui-input-block'>
										<div class="radio-inline" id="man_free_shipping" <?php if( isset($data['delivery_type_express']) && $data['delivery_type_express'] ==1 ){ ?> <?php }else{ ?> style="display:none;" <?php } ?> >
											<div class="layui-form-mid layui-word-aux">满</div>
											<div class="layui-input-inline">
												<input type="text"  name="parameter[man_free_shipping]" value="<?php echo ($data['man_free_shipping']); ?>" class="layui-input" />
											</div>
											<div class="layui-form-mid layui-word-aux">免配送费（0则不减免运费,只对非独立供应商商品有效）</div>
										</div>
									</div>
								</div>
							</li>
						<?php } ?>
					<?php } ?>
				</ul>
		
				<blockquote class="layui-elem-quote">订单提交页面新增自定义备注信息</blockquote>
				<div class="layui-form-item">
					<label class="layui-form-label">
						备注信息
					</label>
					<div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' title="关闭" lay-filter="formordernote"  name='parameter[order_note_open]' value='0' <?php if( !isset($data['order_note_open']) || $data['order_note_open'] ==0){ ?> checked<?php }else{ ?> <?php } ?> /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' title="开启" lay-filter="formordernote"  name='parameter[order_note_open]' value='1' <?php if( isset($data['order_note_open']) && $data['order_note_open'] ==1 ){ ?> checked<?php }else{ ?> <?php } ?>  /> 
						</label>
					</div>
				</div>
				<div class="layui-form-item" id="ordernotename" <?php if(!isset($data['order_note_open']) || $data['order_note_open'] ==0){ ?>style="display:none;"<?php } ?>>
					<label class="layui-form-label"></label>
					<div class='layui-input-block'>
						<div class="radio-inline">
							<div class="layui-form-mid layui-word-aux">名称</div>
							<div class="layui-input-inline">
								<input type="text" name="parameter[order_note_name]" value="<?php echo ($data['order_note_name']); ?>" class="layui-input" placeholder="店名" />
							</div>
							<div class="layui-form-mid layui-word-aux">默认：店名（下单页面，用户可以对整个订单进行备注）</div>
						</div>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">
						楼牌门号
					</label>
					<div class='layui-input-block'>
						<div class="radio-inline">
							<div class="layui-form-mid layui-word-aux">名称</div>
							<div class="layui-input-inline">
								<input type="text" name="parameter[order_lou_meng_hao]" value="<?php echo ($data['order_lou_meng_hao']); ?>" class="layui-input" placeholder="楼牌门号" />
							</div>
							<div class="layui-form-mid layui-word-aux">默认：楼牌门号</div>
						</div>
						<br>
						<div class="radio-inline" style="margin-left:0;">
							<div class="layui-form-mid layui-word-aux">提示语</div>
							<div class="layui-input-inline">
								<input type="text" name="parameter[order_lou_meng_hao_placeholder]" value="<?php echo ($data['order_lou_meng_hao_placeholder']); ?>" class="layui-input" placeholder="例如：A座106室" />
							</div>
							<div class="layui-form-mid layui-word-aux">默认：例如：A座106室</div>
						</div>
					</div>
				</div>
				
		
				<div class="layui-form-item">
					<label class="layui-form-label"> </label>
					<div class="layui-input-block">
						<input type="hidden" value="<?php echo ($data['delivery_diy_sort']); ?>" name="parameter[delivery_diy_sort]" id="sortIpt" />
						<input type="submit" value="提交" lay-submit lay-filter="formDemo" class="btn btn-primary"  />
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<script src="/layuiadmin/layui/layui.js"></script>
<script src="/static/js/jquery-sortable.js"></script>
<script>
	layui.config({
		base: '/layuiadmin/' //静态资源所在路径
	}).extend({
		index: 'lib/index' //主入口模块
	}).use('index');
</script>
<script>
//由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
var layer = layui.layer;
var $;

var cur_open_div;

layui.use(['jquery', 'layer','form'], function(){ 
  $ = layui.$;
  var form = layui.form;
  
	form.on('radio(linktype)', function(data){
		if (data.value == 2) {
			$('#typeGroup').show();
		} else {
			$('#typeGroup').hide();
		}
	}); 
	form.on('radio(formexpress)', function(data){
		if (data.value == 1) {
			$('#man_free_shipping').show();
		} else {
			/*$.ajax({
				url: "<?php echo U('goods/check_express', array('ok' => 1));?>",
				type: 'post',
				dataType:'json',
				success: function (info) {
					if(info.status == 1){
						$('input[name="parameter[delivery_type_express]"][value=2]').prop("checked","false");
						$('input[name="parameter[delivery_type_express]"][value=1]').prop("checked","true");

						layer.msg("商品列表或拼团模式存在仅快递，不能关闭快递配送。关闭快递配送，不影响积分商品配送",{icon: 2,time: 3000});
						form.render();
					}else{
						$('#man_free_shipping').hide();
					}
				}
			});*/
			$('#man_free_shipping').hide();
		}
	});  
	form.on('radio(formordernote)', function(data){
		if (data.value == 1) {
			$('#ordernotename').show();
		} else {
			$('#ordernotename').hide();
		}
	});  

	$('#close_tuanz').click(function(){
		$('#txtPickupDateTip').hide();
		$('#free_tuanz_free').hide();
	})
	$('#open_tuanz').click(function(){
		$('#txtPickupDateTip').css('display','inline-block');
		$('#free_tuanz_free').css('display','inline-block');
	})
		
	$('#chose_link').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("{php echo shopUrl('util.selecturl', array('ok' => 1))}", {}, function(shtml){
		 layer.open({
			type: 1,
			area: '930px',
			content: shtml //注意，如果str是object，那么需要字符拼接。
		  });
		});
	})
		
  //监听提交
  form.on('submit(formDemo)', function(data){
	
	 $.ajax({
		url: data.form.action,
		type: data.form.method,
		data: data.field,
		dataType:'json',
		success: function (info) {
		  
			if(info.status == 0)
			{
				layer.msg(info.result.message,{icon: 1,time: 2000});
			}else if(info.status == 1){
				var go_url = location.href;
				if( info.result.hasOwnProperty("url") )
				{
					go_url = info.result.url;
				}
				
				layer.msg('操作成功',{time: 1000,
					end:function(){
						location.href = info.result.url;
					}
				}); 
			}
		}
	});
	
	return false;
  });
})

$(function  () {
	var group = $("#sortable").sortable({
		group: 'limited_drop_targets',
		handle: 'i.fa-arrows-alt',
		onDrop: function ($item, container, _super) {
			console.log(group.sortable("serialize").get().join("\n"));
			$('#sortIpt').val(group.sortable("serialize").get().join("\n"));
			_super($item, container);
		},
		serialize: function (parent, children, isContainer) {
			return isContainer ? children.join() : $(parent).data('id');
		},
		tolerance: 6,
		distance: 10
	})

})

</script>  
</body>