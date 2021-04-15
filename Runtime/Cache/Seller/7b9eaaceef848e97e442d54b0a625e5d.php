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
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
   <link href="/static/css/snailfish.css" rel="stylesheet">
<style>
	
	.modal-dialog{background-color: #fff;}
	
	.content{
		display:none;
		width:200px;
		height:200px;
		border-radius:10px;
		padding:20px;
		position:relative;
		top:15px;
		left:80px;
		background-color:FFFFFF;
		border:1px solid;
	}
	.shide{display:none}
</style>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">配送设置</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				<div class="layui-form-item shide">
					<label class="layui-form-label">配送员最多可抢</label>
					<div class="layui-input-block">
						<div class="input-group fixsingle-input-group">
							<input class="form-control" name="data[distri_config_maxcan_mbget]" type="text" placeholder="" value="<?php echo ($data['distri_config_maxcan_mbget']); ?>">
							<div class="input-group-addon">单</div>
						</div>
					</div>
				</div>


				<div class="layui-form-item" >
					<label class="layui-form-label">配送员佣金</label>
					<div class="col-sm-10 col-xs-12" id="radPickupDateTip">
						<label class="radio-inline"><input type="radio" lay-filter="commiss_type" name="data[distr_commiss_type]" <?php if( !isset($data['distr_commiss_type']) || $data['distr_commiss_type'] ==0 ){ ?> checked <?php } ?> value="0" title="每单固定" /><span class="fake-radio" ></span></label>
						<label  class="radio-inline"><input type="radio" lay-filter="commiss_type" name="data[distr_commiss_type]" <?php if( isset($data['distr_commiss_type']) && $data['distr_commiss_type'] ==1 ){ ?> checked <?php } ?> value="1" title="每单按照订单配送费抽成" /><span class="fake-radio" ></span></label>
						<label  class="radio-inline"><input type="radio" lay-filter="commiss_type" name="data[distr_commiss_type]" <?php if( isset($data['distr_commiss_type']) && $data['distr_commiss_type'] ==2 ){ ?> checked <?php } ?> value="2" title="按距离收配送费" /><span class="fake-radio" ></span></label>


					</div>
				</div>

				<div class="layui-form-item" id="distri_1" style="<?php if( !isset($data['distr_commiss_type']) || $data['distr_commiss_type'] ==0){ ?>display:block;<?php  }else{ ?>display: none;<?php } ?>">
					<label class="layui-form-label"></label>
					<div class="layui-input-block">
						<div class="input-group fixsingle-input-group">
							<div class="input-group-addon">每单固定</div>
							<input class="form-control" name="data[distri_shippingfare_fixed]" type="text" placeholder="" value="<?php echo ($data['distri_shippingfare_fixed']); ?>">
							<div class="input-group-addon">元</div>
						</div>
						<span class='layui-form-mid help-block'>配送员每一单获得的固定佣金金额</span>
					</div>
				</div>
				<div class="layui-form-item" id="distri_2" style="<?php if( isset($data['distr_commiss_type']) && $data['distr_commiss_type'] ==1){ ?>display:block;<?php  }else{ ?>display: none;<?php } ?>">
					<label class="layui-form-label"></label>
					<div class="layui-input-block">
						<div class="input-group fixsingle-input-group">
							<input class="form-control" name="data[distri_shippingfare_commission]" type="text" placeholder="" value="<?php echo ($data['distri_shippingfare_commission']); ?>">
							<div class="input-group-addon">%</div>
						</div>
						<span class='layui-form-mid help-block'>配送员佣金按照每单配送费的百分比进行收取</span>
					</div>
				</div>
				<div class="layui-form-item" id="distri_3" style="<?php if( isset($data['distr_commiss_type']) && $data['distr_commiss_type'] ==2){ ?>display:block;<?php  }else{ ?>display: none;<?php } ?>">
					<label class="layui-form-label"></label>
					<div class="layui-input-block">
						<div class="input-group fixsingle-input-group">
							<div class="input-group-addon">每单基础配送费</div>
							<input class="form-control" name="data[distri_shippingfare_distance_default]" type="text" placeholder="" value="<?php echo ($data['distri_shippingfare_distance_default']); ?>">
							<div class="input-group-addon">元，超过</div>
							<input class="form-control" name="data[distri_distance]" type="text" placeholder="" value="<?php echo ($data['distri_distance']); ?>">
							<div class="input-group-addon">公里(km)，超过部分每公里增加</div>
							<input class="form-control" name="data[distri_shippingfare_distance_increase]" type="text" placeholder="" value="<?php echo ($data['distri_shippingfare_distance_increase']); ?>">
							<div class="input-group-addon">元，最高</div>
							<input class="form-control" name="data[distri_shippingfare_distance_max]" type="text" placeholder="" value="<?php echo ($data['distri_shippingfare_distance_max']); ?>">
							<div class="input-group-addon">元</div>
						</div>
						<span class='layui-form-mid help-block'>
							仅适用于开启按照距离收取配送费的计费模式。最高设置为0表示不限制，<br/>
							计费规则：例如设置 每单基础配送费3元，超过 3km 超过部分每公里增加 3 元，最高100元。如果配送距离10km，配送员佣金：3 + （10 - 3）* 3 = 24元；
						</span>
					</div>
				</div>

				
				<div class="layui-form-item">
					<label class="layui-form-label"> </label>
					<div class="layui-input-block">
						<input type="submit" value="提交" lay-submit lay-filter="formDemo" class="btn btn-primary"  />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						
					</div>
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
  
	form.on('radio(commiss_type)', function(data){
		if (data.value == 0) {

            $('#distri_2').hide();
            $('#distri_3').hide();
            $('#distri_1').show();
		}
		else if( data.value == 1 )
		{
            $('#distri_1').hide();
            $('#distri_3').hide();
            $('#distri_2').show();
		}
		else if(data.value == 2)
		{
            $('#distri_1').hide();
            $('#distri_2').hide();
            $('#distri_3').show();
		}
	});  


		
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