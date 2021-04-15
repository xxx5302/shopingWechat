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
	<script type="text/javascript" src="./resource/components/colpick/colpick.js"></script>
  <link rel="stylesheet" href="/layuiadmin/layui/css/layui.css" media="all">
   <link href="/static/css/snailfish.css" rel="stylesheet">
	<link href="./resource/components/colpick/colpick.css" rel="stylesheet">
</head>
<body layadmin-themealias="default">
<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">图片设置</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				
				<div class="layui-form-item" >
					<label class="layui-form-label">后台登录图片</label>
					<div class="layui-input-block" >
						<?php echo tpl_form_field_image2('parameter[seller_backimage]', $data['seller_backimage'], "Common/image/login_admin.png");?>  <span class='layui-form-mid'>商家后台登录页面，封面图（400*300）。（XXX|管理后台）也是这个图片。手动FTP替换地址：Common/image/pdd_small2.png</span>
					</div>
				</div>
				
				<div class="layui-form-item" >
					<label class="layui-form-label">XXX|管理后台图片</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[admin_login_image]', $data['admin_login_image'], "Common/image/login_small.png");?> <span class='layui-form-mid'>尺寸：250*32。</span>
					</div>
				</div>
		
		
				<div class="layui-form-item" >
					<label class="layui-form-label">首页商品列表加载图片</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[loading]', $data['loading']);?>
						<span class='layui-form-mid'>未加载图片时显示的背景图（小图模式为1:1图片，大图模式为670*400）</span>
					</div>
				</div>
				<div class="layui-form-item" >
					<label class="layui-form-label">商品详情价格区域背景图</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[goods_details_price_bg]', $data['goods_details_price_bg'], "/static/placeholder/shareBottomBg.png");?>
						<span class='layui-form-mid'>未设置将使用默认，尺寸：710*100。</span>
					</div>
				</div>
				
				<div class="layui-form-item" >
					<label class="layui-form-label">首页分享二维码背景图片</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[index_share_qrcode_bg]', $data['index_share_qrcode_bg'], "/static/images/index_share_bg.jpg");?>
						<span class='layui-form-mid'>不传则使用系统默认<b style="color:red">（请传jpg类型图片）</b>，尺寸：750*1334。</span>
					</div>
				</div>
				
				<div class="layui-form-item" >
					<label class="layui-form-label">二维码颜色</label>
					<div class="layui-input-block">
					
						<div class="" style="margin:0px;">
							<div class="layui-input-inline" style="width: 120px;">
							  <input type="text" name="parameter[qrcode_rgb]" value="<?php echo ($data['qrcode_rgb']); ?>" placeholder="请选择颜色" class="layui-input" id="test-colorpicker-form-input1">
							</div>
							<div class="layui-inline" style="left: -11px;">
							  <div id="minicolors">
								  <div class="layui-unselect layui-colorpicker"><span><span class="layui-colorpicker-trigger-span" lay-type="" style="background: <?php echo ($data['qrcode_rgb']); ?>"><i class="layui-icon layui-colorpicker-trigger-i layui-icon-down"></i></span></span></div>
							  </div>
							</div>
						</div>
						<span class='layui-form-mid'>二维码颜色自定义，不设置则默认红色<b style="color:red"></b></span>
					</div>
				</div>
				<div class="layui-form-item" >
					<label class="layui-form-label">海报头像圆角填充颜色</label>
					<div class="layui-input-block">
						
						<div class="" style="margin:0px;">
							<div class="layui-input-inline" style="width: 120px;">
							  <input type="text" name="parameter[avatar_rgb]" value="<?php echo ($data['avatar_rgb']); ?>" placeholder="请选择颜色" class="layui-input" id="test-colorpicker-form-input2">
							</div>
							<div class="layui-inline" style="left: -11px;">
							  <div id="avatar_rgb">
								  <div class="layui-unselect layui-colorpicker"><span><span class="layui-colorpicker-trigger-span" lay-type="" style="background: <?php echo ($data['avatar_rgb']); ?>"><i class="layui-icon layui-colorpicker-trigger-i layui-icon-down"></i></span></span></div>
							  </div>
							</div>
						</div>
						
						<span class='layui-form-mid'>二维码颜色自定义，不设置则默认黄色<b style="color:red"></b></span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">首页二维码自定义时分</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[modify_index_share_time]" class="form-control" value="<?php echo ($data['modify_index_share_time']); ?>" />
						<span class='layui-form-mid'>例如：08:00，用于首页海报显示的固定时分，日期随着每天改变</span>
					</div>
				</div>
				
				<div class="layui-form-item" style="">
					<label class="layui-form-label">首页底部图片</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[index_bottom_image]', $data['index_bottom_image'], "/static/placeholder/icon-index-slogan.png");?>
						<span class='layui-form-mid'>原尺寸：250*56。</span>
					</div>
				</div>
				<div class="layui-form-item" style="">
					<label class="layui-form-label">首页商品列表顶部图</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[index_list_top_image]', $data['index_list_top_image'], "/static/placeholder/past-title.png");?>
						<span class='layui-form-mid'>原尺寸：332*88。</span>
						<label class="layui-form-label" style="width: auto;padding-left: 0;">是否开启</label>
						<div class="layui-input-block">
							<label class='radio-inline'>
								<input type='radio' name='parameter[index_list_top_image_on]' title="显示" value='0' <?php if( !empty($data) && $data['index_list_top_image_on'] ==0 ){ ?>checked <?php } ?> />
							</label>
							<label class='radio-inline'>
								<input type='radio' name='parameter[index_list_top_image_on]' title="隐藏" value='1' <?php if( empty($data) || $data['index_list_top_image_on'] ==1 ){ ?>checked <?php } ?> /> 
							</label>
						</div>
					</div>
				</div>
				<div class="layui-form-item" style="">
					<label class="layui-form-label">商品详情页声明顶上图</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[goods_details_middle_image]', $data['goods_details_middle_image'], "/static/placeholder/past-title.png");?>
						<span class='layui-form-mid'>原尺寸：184*48。</span>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">首页引导加入我的小程序</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[index_lead_image]', $data['index_lead_image']);?>
						<span class='layui-form-mid'>原尺寸：750*1208</span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">是否显示引导</label>
					<div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[is_show_index_lead_image]' title="否" value='0' <?php if( !empty($data) && $data['is_show_index_lead_image'] ==0 ){ ?>checked <?php } ?> /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[is_show_index_lead_image]' title="是" value='1' <?php if( empty($data) || $data['is_show_index_lead_image'] ==1 ){ ?>checked <?php } ?> /> 
						</label>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">页头公共背景图</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[common_header_backgroundimage]', $data['common_header_backgroundimage'], "/static/placeholder/TOP_background@2x.png");?>
						<span class='layui-form-mid'>包括订单详情页头和社区选择页头，尺寸：750*340。</span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">首页页头背景图</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[index_header_backgroundimage]', $data['index_header_backgroundimage'], "/static/placeholder/TOP_background@2x.png");?>
						<span class='layui-form-mid'>尺寸：750*340。</span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">个人中心页头背景图</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[user_header_backgroundimage]', $data['user_header_backgroundimage'], "/static/placeholder/TOP_background@2x.png");?>
						<span class='layui-form-mid'>尺寸：750*340。</span>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">授权弹窗背景</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[newauth_bg_image]', $data['newauth_bg_image'], "/static/placeholder/auth-bg.png");?>
						<span class='layui-form-mid'>建议尺寸：宽度520，高度480~660之间。</span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">授权弹窗取消按钮</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[newauth_cancel_image]', $data['newauth_cancel_image']);?>
						<span class='layui-form-mid'>建议尺寸：180*70</span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">授权弹窗确认按钮</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[newauth_confirm_image]', $data['newauth_confirm_image']);?>
						<span class='layui-form-mid'>建议尺寸：180*70</span>
					</div>
				</div>
				
				<div class="layui-form-item" >
					<label class="layui-form-label">更新会员核销二维码</label>
					<div class="layui-input-block" style="padding-top:7px;">
						<a id="clear_qrcode" href="javascript:;"  data-href="<?php echo U('config/clearqrcode');?>"  class="text-primary">立即更新</a>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label"></label>
					<div class="layui-input-block">
						<input type="submit" lay-submit lay-filter="formDemo" value="提交" class="btn btn-primary"  />
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

	var minicolors = '<?php echo ($data["qrcode_rgb"]); ?>';
	$('#minicolors').colpick({
		submit:true,
		color: minicolors,
		onSubmit: function(color,color2){
			$('#test-colorpicker-form-input1').val('#'+color2);
			$('#minicolors').find('.layui-colorpicker-trigger-span').css('background','#'+color2);
			$('.colpick_full').hide();
		}
	});

	var avatar_rgb = '<?php echo ($data["avatar_rgb"]); ?>';
	$('#avatar_rgb').colpick({
		submit:true,
		color: avatar_rgb,
		onSubmit: function(color,color2){
			$('#test-colorpicker-form-input2').val('#'+color2);
			$('#avatar_rgb').find('.layui-colorpicker-trigger-span').css('background','#'+color2);
			$('.colpick_full').hide();
		}
	});
</script>

<script>
//由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
var layer = layui.layer;
var $;

layui.use(['jquery', 'layer','form','colorpicker'], function(){ 
  $ = layui.$;
  var form = layui.form;
  var colorpicker = layui.colorpicker;
 
							  
	$('#clear_qrcode').click(function(){
		var s_url = $(this).attr('data-href');
		
		console.log(s_url);
		
		layer.confirm('确认更新会员核销二维码吗？', function(index){
		  //do something
		  $.ajax({
			url : s_url,
			dataType:'json',
			success:function(ret){
				layer.msg('操作成功',{time: 1000,
					end:function(){
					}
				});
			}
		  })
		  layer.close(index);
		});  
	
	});
   //表单赋值
    /*colorpicker.render({
      elem: '#minicolors'
      ,color: '<?php echo ($data['qrcode_rgb']); ?>'
      ,done: function(color){
        $('#test-colorpicker-form-input1').val(color);
      }
    });
	
    colorpicker.render({
      elem: '#avatar_rgb'
      ,color: '<?php echo ($data['avatar_rgb']); ?>'
      ,done: function(color){
        $('#test-colorpicker-form-input2').val(color);
      }
    });*/
  
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