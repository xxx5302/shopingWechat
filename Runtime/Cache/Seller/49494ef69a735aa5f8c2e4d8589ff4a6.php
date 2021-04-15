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
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text"><?php if( !empty($group['id'])){ ?>编辑<?php  }else{ ?>添加<?php } ?>配送员</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="<?php echo U('Orderdistribution/adddistribution');?>" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
		
				<input type="hidden" name="id" value="<?php echo ($distribution['id']); ?>" />
	 
				<div class="layui-form-item">
					<label class="layui-form-label">配送员姓名</label>
					<div class="layui-input-block">
						<input type="text" name="username" class="form-control" value="<?php echo ($distribution['username']); ?>" data-rule-required="true" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">联系电话</label>
					<div class="layui-input-block">
						<input type="text" name="mobile" class="form-control" value="<?php echo ($distribution['mobile']); ?>" data-rule-required="true" />
					</div>
				</div>
				
				
				<div class="layui-form-item">
					<label class="layui-form-label ">关联会员</label>
					
					<div class="layui-input-block">
						<div class="input-group " style="margin: 0;">
							<input type="text" disabled value="<?php echo ($distribution['member_id']); ?>" class="form-control valid" name="member_id" placeholder="" id="member_id">
							<span class="input-group-btn">
								<span data-input="#member_id" id="chose_member_id"  class="btn btn-default">选择会员</span>
							</span>
						</div>
						<?php if( $saler){ ?>
						<div class="input-group " style="margin: 0;">
							<div class="layadmin-text-center choose_user">
								<img style="" src="<?php echo ($saler['avatar']); ?>">
								<div class="layadmin-maillist-img" style=""><?php echo ($saler['nickname']); ?></div>
								<button type="button" class="layui-btn layui-btn-sm" onclick="cancle_bind(this,'member_id')"><i class="layui-icon">&#xe640;</i></button>
							</div>
						</div>
						<?php } ?>
						<div class="layui-form-mid layui-word-aux">关联会员以后，会员可在“底部菜单我的--配送员中心”进行接单配送</div>

					</div>
				</div>
				
				 <div class="layui-form-item">
                        <label class="layui-form-label">状态</label>
                        <div class="layui-input-block">
                            <input type='radio' name='state' title="启用" value=1 <?php if( $distribution['state']==1 || empty($distribution)){ ?>checked<?php } ?> /> 
                            <input type='radio' name='state' title="禁用" value=0 <?php if( $distribution['state']==0 && !empty($distribution) ){ ?>checked<?php } ?> /> 
                        </div>
                 </div>
				 
				 <div class="layui-form-item">
					<label class="layui-form-label">常驻地址</label>
					<div class="layui-input-block">
						<input type="text" name="always_address" class="form-control" value="<?php echo ($distribution['always_address']); ?>" data-rule-required="true" />
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"> </label>
					<div class="layui-input-block">
						<input type="submit" value="提交" lay-submit lay-filter="formDemo" class="btn btn-primary"  />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="btn btn-default" style='margin-left:10px;' href="<?php echo U('orderdistribution/index',array('ok'=>'1'));?>">返回列表</a>
						
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
  
	form.on('radio(linktype)', function(data){
		if (data.value == 2) {
			$('#typeGroup').show();
		} else {
			$('#typeGroup').hide();
		}
	});  

	
	$('#chose_member_id').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('user/zhenquery', array('ok' => 1));?>", {}, function(shtml){
		 layer.open({
			type: 1,
			area: '930px',
			content: shtml //注意，如果str是object，那么需要字符拼接。
		  });
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
	var loadingIndex = layer.load(); // 加载中动画遮罩层（1）
	 $.ajax({
		url: data.form.action,
		type: data.form.method,
		data: data.field,
		dataType:'json',
		success: function (info) {
		  
			if(info.status == 0)
			{
				layer.close(loadingIndex); // 提交成功失败都需要关闭
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

function cancle_bind(obj,sdiv)
{
	$('#'+sdiv).val('');
	$(obj).parent().parent().remove();
}

</script>  
</body>