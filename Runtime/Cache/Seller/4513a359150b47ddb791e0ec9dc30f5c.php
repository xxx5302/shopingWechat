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
        'module': {'url' : '<?php if( defined('MODULE_URL') ) { ?>{MODULE_URL}<?php } ?>', 'name' : '<?php if (defined('IN_MODULE') ) { ?>{IN_MODULE}<?php } ?>'},
        'cookie': {'pre': ''},
        'account': <?php echo json_encode($_W['account']);?>,
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
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">供应商权限设置</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				
				以下权限是针对独立供应商后台设置
				<hr>
				
				<div class="layui-form-item">
					<label class="layui-form-label">商品权限设置</label>
					<div class="layui-input-block">
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_goods_updown]" value="1" <?php if( !isset($data['supply_can_goods_updown']) || (isset($data['supply_can_goods_updown']) && $data['supply_can_goods_updown'] ==1) ){ ?> checked="checked" <?php } ?> title="" /> 上下架</label>
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_vir_count]" value="1" <?php if( !isset($data['supply_can_vir_count']) || (isset($data['supply_can_vir_count']) && $data['supply_can_vir_count'] ==1) ){ ?> checked="checked" <?php } ?> title="" /> 虚拟销量</label>
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_goods_istop]" value="1" <?php if( !isset($data['supply_can_goods_istop']) || (isset($data['supply_can_goods_istop']) && $data['supply_can_goods_istop'] ==1) ){ ?> checked="checked" <?php } ?> title="" /> 商品置顶</label>
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_goods_isindex]" value="1" <?php if( !isset($data['supply_can_goods_isindex']) || (isset($data['supply_can_goods_isindex']) && $data['supply_can_goods_isindex'] ==1 ) ){ ?> checked="checked" <?php } ?> title="" /> 首页推荐</label>
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_goods_sendscore]" value="1" <?php if( (isset($data['supply_can_goods_sendscore']) && $data['supply_can_goods_sendscore'] ==1 ) ){ ?> checked="checked" <?php } ?> title="" /> 下单送积分</label>
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_goods_newbuy]" value="1" <?php if( !isset($data['supply_can_goods_newbuy']) || (isset($data['supply_can_goods_newbuy']) && $data['supply_can_goods_newbuy'] ==1 ) ){ ?> checked="checked" <?php } ?> title="" /> 新人专享</label>
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_goods_spike]" value="1" <?php if( !isset($data['supply_can_goods_spike']) || (isset($data['supply_can_goods_spike']) && $data['supply_can_goods_spike'] ==1 ) ){ ?> checked="checked" <?php } ?> title="" /> 限时秒杀</label>
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_distribution_sale]" value="1" <?php if( !isset($data['supply_can_distribution_sale']) || (isset($data['supply_can_distribution_sale']) && $data['supply_can_distribution_sale'] ==1 ) ){ ?> checked="checked" <?php } ?> title="" /> 分配售卖团长</label>
					
					</div>
				</div>
			
				<div class="layui-form-item">
					<label class="layui-form-label">订单权限设置</label>
					<div class="layui-input-block">
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_look_headinfo]" value="1" <?php if( !isset($data['supply_can_look_headinfo']) || (isset($data['supply_can_look_headinfo']) && $data['supply_can_look_headinfo'] ==1) ){ ?> checked="checked" <?php } ?> title="" /> 显示团长信息（团长姓名，手机号，地址）</label>
						
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_confirm_delivery]" value="1" <?php if( !isset($data['supply_can_confirm_delivery']) || (isset($data['supply_can_confirm_delivery']) && $data['supply_can_confirm_delivery'] ==1) ){ ?> checked="checked" <?php } ?> title="" /> 确认配送（确认送达团长）</label>
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_confirm_receipt]" value="1" <?php if( !isset($data['supply_can_confirm_receipt']) || (isset($data['supply_can_confirm_receipt']) && $data['supply_can_confirm_receipt'] ==1) ){ ?> checked="checked" <?php } ?> title="" /> 确认收货（已发货待收货）</label>
						
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">售后订单权限设置</label>
					<div class="layui-input-block">
						<label class="radio-inline"><input lay-ignore type="checkbox" name="data[supply_can_nowrfund_order]" value="1" <?php if( !isset($data['supply_can_nowrfund_order']) || (isset($data['supply_can_nowrfund_order']) && $data['supply_can_nowrfund_order'] ==1) ){ ?> checked="checked" <?php } ?> title="" /> 立即退款</label>
						
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

layui.use(['jquery', 'layer','form','colorpicker'], function(){ 
  $ = layui.$;
  var form = layui.form;
  var colorpicker = layui.colorpicker;
 
  
   //表单赋值
    colorpicker.render({
      elem: '#minicolors'
      ,color: '<?php echo ($data['nav_bg_color']); ?>'
      ,done: function(color){
        $('#test-colorpicker-form-input').val(color);
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
</html>