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
   <script type="text/javascript" src="{php echo SNAILFISH_LOCAL}/static/js/dist/jquery/nestable/jquery.nestable.js"></script>
<link href="/static/js/dist/jquery/nestable/nestable.css" rel="stylesheet">
<style type='text/css'>
    .dd-handle { height: 40px; line-height: 30px}
    .dd-list { width:860px;}
    .dd-handle span {
        font-weight: normal;
    }
	.cate_sort{width: 35px;height: 20px;text-align:center;
		border:1px solid #ebebeb;}
</style>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">商品分类</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<div class="page-table-header">
				<span class="pull-right"> 
					<a href="<?php echo U('group/addcategory', array('ok' => 1));?>" class="layui-btn  layui-btn-sm"><i class="fa fa-plus"></i> 添加分类</a>
				</span>
				<div style="clear:both;"></div>
			</div>	
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
		
				 <div class="dd" id="div_nestable">
					<ol class="dd-list">

						<?php foreach( $category as $row ){ ?>
						<?php if( empty($row['pid'])){ ?>
						<li class="dd-item full" data-id="<?php echo ($row['id']); ?>">

							<div class="dd-handle" >
								[<input type="text" class="cate_sort" name="cate_sort" id="cate_sort_<?php echo ($row['id']); ?>" cate_id="<?php echo ($row['id']); ?>" value="<?php echo ($row['sort_order']); ?>" onchange="updateSort(this)"/>] <?php echo ($row['name']); ?>
								<span class="pull-right">

									<input type="checkbox" name="" lay-filter="enabledwsitch" data-href="<?php echo U('group/category_enabled',array('id'=>$row['id']));?>" <?php if( $row['is_show']==1){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="显示|隐藏">
													
										<a class='btn btn-default btn-sm btn-operation btn-op' data-toggle="ajaxModal" href="<?php echo U('group/addcategory', array('pid' => $row['id'], 'ok' => 1));?>" title='' >
											 <span data-toggle="tooltip" data-placement="top" title="" data-original-title="添加子分类">
												添加子分类
											 </span>

										</a>
										   <a class='btn btn-default btn-sm btn-operation btn-op' data-toggle="ajaxModal" href="<?php echo U('group/addcategory', array('id' => $row['id'] , 'ok' => 1));?>"  >
											   <span data-toggle="tooltip" data-placement="top"  data-original-title="修改">
												修改
												 </span>
										   </a>
										  
										   
												
												<a class='btn btn-default btn-sm btn-operation btn-op deldom'  href="javascript:;" data-href="<?php echo U('group/category_delete', array('id' => $row['id']));?>" data-confirm='确认删除此分类吗？'>删除</a>
											
									</span>
								</div>
								<?php if( count($children[$row['id']])>0){ ?>

								<ol class="dd-list">
									<?php foreach( $children[$row['id']] as $child ){ ?>
									<li class="dd-item full" data-id="<?php echo ($child['id']); ?>">
										<div class="dd-handle" style="width:100%;">
											<img src="<?php echo tomedia($child['thumb']);;?>" width='30' height="30" onerror="$(this).remove()" style='padding:1px;border: 1px solid #ccc;float:left;' /> &nbsp;
											[<input type="text" class="cate_sort" name="cate_sort" id="cate_sort_<?php echo ($child['id']); ?>" cate_id="<?php echo ($child['id']); ?>" value="<?php echo ($child['sort_order']); ?>" onchange="updateSort(this)"/>] <?php echo ($child['name']); ?>
											<span class="pull-right">
													<input type="checkbox" name="" lay-filter="enabledwsitch" data-href="<?php echo U('group/category_enabled',array('id'=>$child['id']));?>" <?php if( $child['is_show']==1){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="显示|隐藏">
													
														<a class='btn btn-default btn-sm btn-operation btn-op' data-toggle="ajaxModal" href="<?php echo U('group/addcategory', array('pid' => $child['id']));?>" title='添加子分类' >
														   <span data-toggle="tooltip" data-placement="top" title="" data-original-title="添加子分类">
															添加子分类
														   </span>
														</a>
													    <a class='btn btn-default btn-sm btn-operation btn-op' data-toggle="ajaxModal" href="<?php echo U('group/addcategory', array('id' => $child['id']));?>" title="修改" >
															  <span data-toggle="tooltip" data-placement="top" title="" data-original-title="修改">
																	修改
															 </span>
														</a>
														<a class='btn btn-default btn-sm btn-operation btn-op deldom'  href="javascript:;" data-href="<?php echo U('group/category_delete', array('id' => $child['id']));?>" data-confirm="确认删除此分类吗？">
														  <span data-toggle="tooltip" data-placement="top"  data-original-title="删除">
																删除
															</span>
														</a>
														
												</span>
											</div>
											<?php if( count($children[$child['id']])>0 ){ ?>

											<ol class="dd-list"  style='width:100%;'>
												<?php foreach( $children[$child['id']] as $third ){ ?>
												<li class="dd-item" data-id="<?php echo ($third['id']); ?>">
													<div class="dd-handle">
														<img src="<?php echo tomedia($third['thumb']);;?>" width='30' height="30" onerror="$(this).remove()" style='padding:1px;border: 1px solid #ccc;float:left;' /> &nbsp;
														[<input type="text" class="cate_sort" name="cate_sort" id="cate_sort_<?php echo ($third['id']); ?>" cate_id="<?php echo ($third['id']); ?>" value="<?php echo ($third['sort_order']); ?>" onchange="updateSort(this)"/>] <?php echo ($third['name']); ?>
														<span class="pull-right">
														
														<input type="checkbox" name="" lay-filter="enabledwsitch" data-href="<?php echo U('group/category_enabled',array('id'=>$third['id']));?>" <?php if( $third['is_show']==1){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="显示|隐藏">
														

															<a class='btn btn-default btn-sm btn-operation btn-op' href="<?php echo U('group/addcategory', array('id' => $third['id']));?>" title="修改" >
															 <span data-toggle="tooltip" data-placement="top" title="" data-original-title="修改">
																<i class="icow icow-bianji2"></i>修改
																 </span>
															</a>
																<a class='btn btn-default btn-sm btn-operation btn-op deldom'  href="javascript:;" data-href="<?php echo U('group/category_delete', array('id' => $third['id']));?>" data-confirm="确认删除此分类吗？">
																	删除
																</a>
														</span>
													</div>
												</li>
												<?php } ?>
											</ol>
											<?php } ?>
										</li>
										<?php } ?>
									</ol>
									<?php } ?>

								</li>
								<?php } ?>
								<?php } ?>

					</ol>
					<!-- 
					<table class='table'>
						<tr>
							<td>

								
								<input id="save_category" type="submit" class="btn btn-primary" value="保存">
								
								<input type="hidden" name="token" value="<?php echo ($_W['token']); ?>" />
								<input type="hidden" name="datas" value="" />
							</td>
						</tr>
						</tbody>
					</table> -->
				</div>
				
			</form>
		</div>
</div>
</div>

<script src="/layuiadmin/layui/layui.js"></script>

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

	form.on('switch(enabledwsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var s_value = 1;
	  if(data.elem.checked)
	  {
		s_value = 1;
	  }else{
		s_value = 0;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{enabled:s_value},
			success:function(info){
			
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
		})
	});  
	
	$('.deldom').click(function(){
		var s_url = $(this).attr('data-href');
		layer.confirm($(this).attr('data-confirm'), function(index){
					 $.ajax({
						url:s_url,
						type:'post',
						dataType:'json',
						success:function(info){
						
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
					})
				}); 
	})
	$('#chose_link').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('util.selecturl', array('ok' => 1));?>", {}, function(shtml){
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
</script> 
 
 <script language='javascript'>
	$(function () {

		$('#btnExpand').click(function () {
			var action = $(this).data('action');
			if (action === 'expand') {
				$('#div_nestable').nestable('collapseAll');
				$(this).data('action', 'collapse').html('<i class="fa fa-angle-up"></i> 展开所有');

			} else {
				$('#div_nestable').nestable('expandAll');
				$(this).data('action', 'expand').html('<i class="fa fa-angle-down"></i> 折叠所有');
			}
		})
		var depth = <?php echo intval($_W['shopset']['category']['level']);?>;
		if (depth <= 0) {
			depth = 3;
		}
		

		$('.dd-item').addClass('full');

		$(".dd-handle a,.dd-handle div").mousedown(function (e) {

			e.stopPropagation();
		});
		var $expand = false;
		$('#nestableMenu').on('click', function (e)
		{
			if ($expand) {
				$expand = false;
				$('.dd').nestable('expandAll');
			} else {
				$expand = true;
				$('.dd').nestable('collapseAll');
			}
		});

		$('form').submit(function(){
			var json = window.JSON.stringify($('#div_nestable').nestable("serialize"));
			$(':input[name=datas]').val(json);
		});

	})

	function updateSort(obj){
		var cate_id = $(obj).attr('cate_id');
		var sort_order = $(obj).val();
		$.ajax({
			url: "<?php echo U('group/update_catesort');?>",
			type: "post",
			data: {cate_id:cate_id,sort_order:sort_order},
			dataType:'json',
			success: function (info) {
				if(info.status == 1){
					var go_url = location.href;
					if( info.result.hasOwnProperty("url") )
					{
						go_url = info.result.url;
					}
					location.href = info.result.url;
				}else {
					layer.msg(info.result.message,{icon: 1,time: 2000});
				}
			}
		});
	}
</script>
</body>