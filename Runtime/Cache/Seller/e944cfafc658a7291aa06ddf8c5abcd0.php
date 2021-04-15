<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <?php
 $shoname_name = D('Home/Front')->get_config_by_name('shoname'); $shop_domain = D('Home/Front')->get_config_by_name('shop_domain'); ?>
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

	<script type="text/javascript" src="/static/js/dist/area/cascade.js"></script>
	<script src="https://map.qq.com/api/js?v=2.exp&key=6R4BZ-WAB3W-JITRG-OE7GY-R2753-P3BZ2" type="text/javascript" charset="utf-8"></script>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">同城配送设置</div>
		<div class="layui-card-body" style="padding:15px;">
			<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
				<ul class="layui-tab-title">
					<li><a href="<?php echo U('express/localtownconfig');?>">商家配送</a></li>
					<li><a href="<?php echo U('express/localtown_imdada_config');?>">达达配送平台</a></li>
					<li class="layui-this">顺丰同城</li>
					<li><a href="<?php echo U('express/localtown_mk_config');?>">码科跑腿</a></li>
					<li><a href="<?php echo U('express/localtown_ele_config');?>">蜂鸟即配</a></li>
				</ul>
				<div class="layui-tab-content" style="height: 100%;">
					<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
						<div class="layui-form-item">
							<label class="layui-form-label">
								顺丰同城对接
							</label>
							<div class="layui-input-block">
								<label class='radio-inline'>
									<input type='radio' title="开启" name='parameter[is_localtown_sf_status]' value='1' <?php if( isset($data['is_localtown_sf_status']) && $data['is_localtown_sf_status'] ==1 ){ ?> checked<?php }else{ ?> <?php } ?>  />
								</label>
								<label class='radio-inline'>
									<input type='radio' title="关闭" name='parameter[is_localtown_sf_status]' value='0' <?php if(!isset($data['is_localtown_sf_status']) || $data['is_localtown_sf_status'] ==0){ ?> checked<?php }else{ ?> <?php } ?> />
								</label>
								<div></div>
								<div class="layui-form-mid layui-word-aux">开启此功能需要向顺丰同城开放平台申请，具体配送费和接口信息请咨询<a href="http://commit-openic.sf-express.com/" target="_blank" style="color:#009688;">顺丰同城开放平台</a></div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">
								预查询第三方配送费
							</label>
							<div class="layui-input-block">
								<label class='radio-inline'>
									<input type='radio' title="开启" name='parameter[is_sf_prequery_status]' value='1' <?php if( isset($data['is_sf_prequery_status']) && $data['is_sf_prequery_status'] ==1 ){ ?> checked<?php }else{ ?> <?php } ?>  />
								</label>
								<label class='radio-inline'>
									<input type='radio' title="关闭" name='parameter[is_sf_prequery_status]' value='0' <?php if(!isset($data['is_sf_prequery_status']) || $data['is_sf_prequery_status'] ==0){ ?> checked<?php }else{ ?> <?php } ?> />
								</label>
								<div></div>
								<div class="layui-form-mid layui-word-aux">开启后，用户 “同城配送” 订单支付成功以后会提前计算此单推送 “第三方配送” 需要的配送费金额，订单配送金额以实际产生的金额为准，该功能只进行预估提示</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">开发者ID(dev_id)</label>
							<div class="layui-input-block">
								<input type="text" name="parameter[localtown_sf_dev_id]" class="form-control" value="<?php echo ($data['localtown_sf_dev_id']); ?>" placeholder="顺丰同城开发者ID">
								<span class="layui-form-mid layui-word-aux">ID（登录顺丰同城开放平台开发者中心-开发者信息里面查看），<a href="http://commit-openic.sf-express.com/" target="_blank" style="color:#009688;">顺丰同城开放平台</a></span>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">密钥(dev_key)</label>
							<div class="layui-input-block">
								<input type="text" name="parameter[localtown_sf_dev_key]" class="form-control" value="<?php echo ($data['localtown_sf_dev_key']); ?>" placeholder="顺丰同城密钥">
								<span class="layui-form-mid layui-word-aux">密钥（登录顺丰同城开放平台控制台-开发者信息里面查看），<a href="http://commit-openic.sf-express.com/" target="_blank" style="color:#009688;">顺丰同城开放平台</a></span>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">顺丰店铺ID</label>
							<div class="layui-input-block">
								<input type="text" name="parameter[localtown_sf_store_id]" class="form-control" value="<?php echo ($data['localtown_sf_store_id']); ?>" placeholder="顺丰店铺ID">
								<span class="layui-form-mid layui-word-aux">店铺ID（登录顺丰同城开放平台控制台-开发者信息里面查看），<a href="http://commit-openic.sf-express.com/" target="_blank" style="color:#009688;">顺丰同城开放平台</a></span>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">顺丰同城回调URL</label>
							<div class="layui-input-block">
								<span style="color:#009688;" class="form-control"><?php echo $shop_domain;?>delivery_notify.php</span>
								<span class="layui-form-mid layui-word-aux">在顺丰同城开放平台-开发者中心-开发者信息-URL处，点击修改，回调URL需填写链接，不填写则无法接收顺丰同城推送的消息</span>
							</div>
						</div>

						<div class="layui-form-item">
							<label class="layui-form-label"> </label>
							<div class="layui-input-block">
								<input type="submit" value="提交" lay-submit lay-filter="formDemo" class="btn btn-primary"  />
							</div>
						</div>
					</form>
				</div>
			</div>
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


</body>