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
</head>
<body layadmin-themealias="default">
<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">小程序设置</span></div>
		
		
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				<div class="layui-form-item">
					<label class="layui-form-label">支付模式</label>
					<div class="layui-input-block">
						<label class='radio-inline'><input type="radio" name="parameter[is_open_yinpay]" value="0" title="微信支付商户" <?php if(empty($data) || $data['is_open_yinpay'] ==0){ ?>checked  <?php } ?> onclick="$('#wepro').show();$('#wepro_sub').hide();$('#wepro2').show();$('#wepro_sub2').hide();" /></label>
						<label class='radio-inline'><input type="radio" name="parameter[is_open_yinpay]" value="3" title="服务商+特约商户" <?php if( !empty($data) && $data['is_open_yinpay'] ==3 ){ ?>checked <?php } ?> onclick="$('#wepro_sub').show();$('#wepro').hide();$('#wepro_sub2').show();$('#wepro2').hide();" /></label>
					</div>
					
				</div>
				
					<div class="layui-form-item">
						<label class="layui-form-label">小程序APPID</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[wepro_appid]" class="form-control" value="<?php echo ($data['wepro_appid']); ?>" />
							<span class="layui-form-mid">mp.weixin.qq.com 开发-开发配置</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">小程序APPSECRET</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[wepro_appsecret]" class="form-control" value="<?php echo ($data['wepro_appsecret']); ?>" />
						</div>
					</div>
				
					<div class="layui-form-item">
						<label class="layui-form-label" id="wepro2" style="<?php if( !empty($data['is_open_yinpay']) || $data['is_open_yinpay'] ==3 ){ ?>display:none;<?php } ?>">支付秘钥</label>
						<label class="layui-form-label" id="wepro_sub2" style="<?php if( empty($data['is_open_yinpay']) || $data['is_open_yinpay'] ==0 ){ ?>display:none;<?php } ?>">服务商秘钥</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[wepro_key]" class="form-control" value="<?php echo ($data['wepro_key']); ?>" />
							<span class="layui-form-mid">pay.weixin.qq.com 账户中心-api安全</span>
						</div>
					</div>
					
				<div class="layui-form-item" id="wepro" style="<?php if( !empty($data['is_open_yinpay']) || $data['is_open_yinpay'] ==3 ){ ?>display:none;<?php } ?>">

					<div class="layui-form-item">
						<label class="layui-form-label">商户ID</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[wepro_partnerid]" class="form-control" value="<?php echo ($data['wepro_partnerid']); ?>" />
						</div>
					</div>


					<div class="layui-form-item">
						<label class="layui-input-block">CERT证书文件</label>
						<div class="layui-input-block">
							<textarea style="height:100px;" name="parameter[wechat_apiclient_cert_pem]" class="layui-textarea" rows="5" placeholder="<?php if( $data[wechat_apiclient_cert_pem]){ ?>为保证安全性，不显示证书内容。若要修改请直接输入<?php } ?>"></textarea>
							<div class="layui-form-mid">
								<?php if( $data[wechat_apiclient_cert_pem]){ ?>
								<span class="label label-primary">已上传</span>
								<?php  }else{ ?>
								<span class="label label-danger">未上传</span>
								<?php } ?>从商户平台上下载支付证书，解压并取得其中的<span class="bg-danger">apiclient_cert.pem</span>用记事本打开并复制文件内容，填至此处</div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-input-block">KEY证书秘钥</label>
						<div class="layui-input-block">
							<textarea style="height:100px;" name="parameter[wechat_apiclient_key_pem]" class="layui-textarea" rows="5" placeholder="<?php if( $data[wechat_apiclient_key_pem]){ ?>为保证安全性，不显示证书内容。若要修改请直接输入<?php } ?>"></textarea>
							<div class="layui-form-mid">
								<?php if( $data[wechat_apiclient_key_pem]){ ?>
								<span class="label label-primary">已上传</span>
								<?php  }else{ ?>
								<span class="label label-danger">未上传</span>
								<?php } ?>从商户平台上下载支付证书，解压并取得其中的<span class="bg-danger">apiclient_key.pem</span>用记事本打开并复制文件内容，填至此处
								<br/>
								<br/>
								<a href="https://pay.weixin.qq.com" target="_blank">pay.weixin.qq.com</a>&nbsp;&nbsp;账户中心&nbsp;->&nbsp;api安全&nbsp;->&nbsp;申请证书&nbsp;->&nbsp;查看证书
								&nbsp;&nbsp;严格按照腾讯提示
							</div>
						</div>
					</div>
				</div>

				<div class="layui-form-item" id="wepro_sub" style="<?php if( empty($data['is_open_yinpay']) || $data['is_open_yinpay'] ==0 ){ ?>display:none;<?php } ?>">
					<div class="layui-form-item">
						<label class="layui-form-label">特约商户商户号</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[wepro_sub_mch_id]" class="form-control" value="<?php echo ($data['wepro_sub_mch_id']); ?>" />
						</div>
					</div>

					
					<div class="layui-form-item">
						<label class="layui-form-label">服务商公众号AppID</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[wepro_fuwu_appid]" class="form-control" value="<?php echo ($data['wepro_fuwu_appid']); ?>" />
						</div>
					</div>
					
					<div class="layui-form-item">
						<label class="layui-form-label">服务商商户号</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[wepro_fuwu_partnerid]" class="form-control" value="<?php echo ($data['wepro_fuwu_partnerid']); ?>" />
						</div>
					</div>

					<div class="layui-form-item">
						<label class="layui-form-label">特约商户秘钥</label>
						<div class="layui-input-block">
							<input type="text" name="parameter[sup_wepro_key]" class="form-control" value="<?php echo ($data['sup_wepro_key']); ?>" />
							<span class="layui-form-mid">pay.weixin.qq.com 账户中心-api安全，特约商户提现必须填写特约商户秘钥，CERT证书文件，KEY证书秘钥。</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-input-block">服务商证书CERT证书文件</label>
						<div class="layui-input-block">
							<textarea style="height:100px;" name="parameter[sup_wechat_apiclient_cert_pem]" class="layui-textarea" rows="5" placeholder="<?php if( $data[sup_wechat_apiclient_cert_pem]){ ?>为保证安全性，不显示证书内容。若要修改请直接输入<?php } ?>"></textarea>
							<div class="layui-form-mid">
								<?php if( $data[sup_wechat_apiclient_cert_pem]){ ?>
								<span class="label label-primary">已上传</span>
								<?php  }else{ ?>
								<span class="label label-danger">未上传</span>
								<?php } ?>从服务商商户平台上下载支付证书，解压并取得其中的<span class="bg-danger">apiclient_cert.pem</span>用记事本打开并复制文件内容，填至此处</div>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-input-block">服务商证书KEY证书秘钥</label>
						<div class="layui-input-block">
							<textarea style="height:100px;" name="parameter[sup_wechat_apiclient_key_pem]" class="layui-textarea" rows="5" placeholder="<?php if( $data[sup_wechat_apiclient_key_pem]){ ?>为保证安全性，不显示证书内容。若要修改请直接输入<?php } ?>"></textarea>
							<div class="layui-form-mid">
								<?php if( $data[sup_wechat_apiclient_key_pem]){ ?>
								<span class="label label-primary">已上传</span>
								<?php  }else{ ?>
								<span class="label label-danger">未上传</span>
								<?php } ?>从服务商商户平台上下载支付证书，解压并取得其中的<span class="bg-danger">apiclient_key.pem</span>用记事本打开并复制文件内容，填至此处
								<br/>
								<br/>
								<a href="https://pay.weixin.qq.com" target="_blank">pay.weixin.qq.com</a>&nbsp;&nbsp;账户中心&nbsp;->&nbsp;api安全&nbsp;->&nbsp;申请证书&nbsp;->&nbsp;查看证书
								&nbsp;&nbsp;严格按照腾讯提示
							</div>
						</div>
					</div>

				</div>
				

				<div class="layui-form-item">
					<label class="layui-form-label"></label>
					<div class="layui-input-block">
						<input type="submit" lay-submit lay-filter="formDemo"  value="提交" class="btn btn-primary"  />
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