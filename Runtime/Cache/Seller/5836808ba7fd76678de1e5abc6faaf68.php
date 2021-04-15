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

   
<script type="text/javascript" src="/static/js/dist/area/cascade.js"></script>
<script src="https://map.qq.com/api/js?v=2.exp&key=6R4BZ-WAB3W-JITRG-OE7GY-R2753-P3BZ2" type="text/javascript" charset="utf-8"></script>
   <style>
	   .myText{
		   padding-left: 30px;
		   font-size: 13px;
		   color: #C4C4C4;
	   }
   </style>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">模板消息设置</span></div>
		
		
		<div class="layui-tab layui-tab-brief" >
			<ul class="layui-tab-title">
				<li  <?php if( $type==1 ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('weprogram/templateconfig', array('type' => 1));?>">公众号模板消息</a></li>
				<li  <?php if( $type==2 ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U('weprogram/templateconfig', array('type' => 2));?>">平台订单通知</a></li>
				
			</ul>
		</div>
	
		
		<?php if( $type == 1 ){ ?>
		<div class="layui-card-body" style="padding:15px;display:block" >
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				<div class="layui-form-item">
					<label class="layui-form-label">公众号APPID</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[weixin_appid]" class="layui-input" value="<?php echo ($data['weixin_appid']); ?>" />
					</div>
					<span class="myText" >登录<span style="font-size: 16px;color:#009688">公众号平台</span>，在管理中心-应用详情中查看</span>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">订单支付成功通知</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[weixin_template_pay_order]" class="layui-input" value="<?php echo ($data['weixin_template_pay_order']); ?>" />
					</div>
					<span class="myText" >用户订单支付成功，消息通知用户</span>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">订单发货通知</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[weixin_template_send_order]" class="layui-input" value="<?php echo ($data['weixin_template_send_order']); ?>" />
					</div>
					<span class="myText">商品订单发货成功，消息通知用户</span>
				</div>
				<div class="layui-form-item" >
					<label class="layui-form-label">核销成功通知</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[weixin_template_hexiao_success]" class="layui-input" value="<?php echo ($data['weixin_template_hexiao_success']); ?>" />
					</div>
					<span class="myText" >商品订单核销成功，消息通知用户</span>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">团长申请成功发送通知</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[weixin_template_apply_community]" class="layui-input" value="<?php echo ($data['weixin_template_apply_community']); ?>" />
					</div>
					<span class="myText" >用户申请团长，平台通过审核以后，消息通知用户团长申请成功</span>
				</div>
				
				
				<div class="layui-form-item">
					<label class="layui-form-label">售后订单申请通知(平台)</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[weixin_template_apply_refund]" class="layui-input" value="<?php echo ($data['weixin_template_apply_refund']); ?>" />
					</div>
					<span class="myText" >消息通知平台管理人员，有“售后订单"需要处理</span>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">取消订单通知(平台)</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[weixin_template_cancle_order]" class="layui-input" value="<?php echo ($data['weixin_template_cancle_order']); ?>" />
					</div>
					<span class="myText" >消息通知平台管理人员，有“取消订单需要处理</span>
				</div>
				
				
				
				<div class="layui-form-item">
					<label class="layui-form-label">会员下单成功提醒团长</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[weixin_template_order_buy]" class="layui-input" value="<?php echo ($data['weixin_template_order_buy']); ?>" />
					</div>
					<span class="myText" >用户下单成功以后，消息通知团长</span>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label">同城配送骑手接单通知</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[weixin_template_order_riders_receive]" class="layui-input" value="<?php echo ($data['weixin_template_order_riders_receive']); ?>" />
					</div>
					<span class="myText" >同城配送订单，消息通知骑手进行接单</span>
				</div>
					
				<div class="layui-form-item">
					<label class="layui-form-label">团长提现到账提醒</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[weixin_template_apply_tixian]" class="layui-input" value="<?php echo ($data['weixin_template_apply_tixian']); ?>" />
					</div>

					<span class="myText" >团长申请提现，消息通知团长提现申请成功</span>
					<br>
					<div class="layui-form-mid" style="margin-left: 180px;">
						注意，公众号需要是小程序的关联主体。(未填写appid 即不发送模板消息)<br>
					<a href="https://shiziyu.liofis.com/公众号模板消息.docx" style="color:blue;">点击下载设置教程</a>
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
		
		<?php }else if( $type == 3 ){ ?>
		<div class="layui-card-body" style="padding:15px;display:block" >
			 <form action="<?php echo U('weprogram/templateconfig_fenxi', array('type' => 3));?>" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				
				<div class="layui-form-item">
					<label class="layui-form-label">示例：</label>
					<div class="layui-input-block">
						<blockquote class="layui-elem-quote layui-quote-nm">
						{{first.DATA}}<br/><br/>
						产品名称：{{hotelName.DATA}}<br/><br/>
						团购券号:{{voucher_number.DATA}}<br/><br/>
						{{remark.DATA}}<br/><br/>
						小程序后台——模板消息——我的模板——某模板详情——详细内容（复制粘粘到此处）<br/>
						</blockquote>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">模板详细内容</label>
					<div class="layui-input-block">
						<textarea  name="subtitle" id="subtitle" rows="8"  class="form-control"  ></textarea>
						<div class="layui-form-mid layui-word-aux"></div>
					</div>
				</div>
				<div id="analy_div">
				
				
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">发送会员类型</label>
					<div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='all_msg_send_type' lay-filter="all_msg_send_type"  title="指定会员" value=1 checked />
						</label>
						<label class='radio-inline'>
							<input type='radio' name='all_msg_send_type' lay-filter="all_msg_send_type" title="某个会员组" value=2  />
						</label>
						<label class='radio-inline'>
							<input type='radio' name='all_msg_send_type' lay-filter="all_msg_send_type"  title="全部会员" value=3  /> 
						</label>
					</div>
				</div>
				
				
				<div class="layui-form-item" id="type_1">
					<label class="layui-form-label">关联会员</label>
					<div class="layui-input-block">
						<div class="input-group " style="margin: 0;">
							<input type="text" disabled value="" class="form-control valid" name="" placeholder="" id="agent_id">
							<span class="input-group-btn">
								<span data-input="#agent_id" id="chose_agent_id"  class="btn btn-default">选择会员</span>
							</span>
						</div>
					</div>
				</div>
					
					
				<div class="layui-form-item" id="type_2" style="display:none;">
					<label class="layui-form-label must">会员组</label>
					<div class="layui-input-block">
						<select name="member_group_id">
							<?php foreach($member_group_list as $val){ ?>
							<option value="<?php echo ($val['id']); ?>"><?php echo ($val['groupname']); ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">模板ID</label>
					<div class="layui-input-block">
						<input type="text" name="all_send_template_id" class="layui-input" value="" />
					</div>
					<div class="layui-form-mid" style="margin-left:25px;">
						开发者调用模板消息接口时需提供模板ID
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">点击链接</label>
					<div class="layui-input-block">
						<div class="input-group " style="margin: 0;">
							<input type="text" value="" class="form-control valid" name="link" placeholder="" id="advlink">
							<span class="input-group-btn">
								<span data-input="#advlink" id="chose_link"  class="btn btn-default">选择链接</span>
							</span>
						</div>
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
		
		<?php }else{ ?>
		<div class="layui-card-body" style="padding:15px;display:block" >
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
			
				<div class="layui-form-item" id="user_form_item">
					<label class="layui-form-label">关联会员</label>
					<div class="layui-input-block">
						<div class="input-group " style="margin: 0;">
							<input type="text" disabled value="" class="form-control valid" name="" placeholder="" id="agent_id">
							<span class="input-group-btn">
								<span data-input="#agent_id" id="chose_agent_id"  class="btn btn-default">选择会员</span>
							</span>
						</div>
						<div class="input-group layui-word-aux">订单信息提示，平台用户下单后通知关联会员进行接单处理</div>
						<?php if(!empty($user_list)){ ?>
						<?php foreach( $user_list as $a ){ ?>
						<div class="input-group mult_choose_member_id" data-member-id="<?php echo ($a['member_id']); ?>" style="border-radius: 0;float: left;margin: 10px;margin-left:0px;width: 22%;">	
							<div class="layadmin-text-center choose_user">		
								<img style="" src="<?php echo ($a['avatar']); ?>">		
								<div class="layadmin-maillist-img" style=""><?php echo ($a['nickname']); ?></div>		
								<button type="button" class="layui-btn layui-btn-sm" onclick="cancle_bind(this)">
									<i class="layui-icon"></i>
								</button>	
							</div>
						</div>
						<?php }} ?>
					</div>
				</div>
			
				<div class="layui-form-item">
					<label class="layui-form-label"> </label>
					<div class="layui-input-block">
						
						<?php if( $_GPC['type']!='0' && $_GPC['type']!='1' ){ ?>
						<input type="hidden" name="limit_user_list" value="" id="limit_user_list" />
						<?php } ?>
						<input type="submit" value="提交" lay-submit lay-filter="formDemo" class="btn btn-primary"  />
					</div>
				</div>
			
			</form>
		</div>
		
		</div>
		<?php } ?>
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

var can_sub = true;
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

	form.on('radio(all_msg_send_type)', function(data){
            if (data.value == 1) {
                
				$('#type_1').show();
				
            } else if( data.value == 2 )
			{
				$('#type_1').hide();
				$('#type_2').show();
			}
			else if( data.value == 3 )
			{
				$('#type_1').hide();
				$('#type_2').hide();
			}
			
        });
		
	

	//subtitle
	$(document).on("input propertychange","#subtitle",function(){
        
		//("\r|\n|\\s", "");
		var s_content = $('#subtitle').val();
		s_content.replace(/\r|\n|\\s/g,"");
		
		var regex3 = /\{{(.+?)}\}/g; // {}
		
		var new_arr = s_content.match(regex3);
		
		var s_html = "";
		
		for( var i in  new_arr )
		{
			s_html+='	<div class="layui-form-item">';
			s_html+='		<label class="layui-form-label">'+new_arr[i]+'内容</label>';
			s_html+='		<div class="layui-input-block">';
			s_html+='			<input type="text" name="datas['+new_arr[i]+']" class="layui-input" lay-required="true" value="" />';
			s_html+='		</div>';
			s_html+='	</div>';
			
		}
		
		$('#analy_div').html(s_html);
		
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
	
	$('#chose_agent_id').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('user/zhenquery_many', array('template' => 'mult'));?>", {}, function(shtml){
		 layer.open({
			type: 1,
			area: '930px',
			content: shtml //注意，如果str是object，那么需要字符拼接。
		  });
		});
	})
	
	
	$('#chose_link').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('util/selecturl', array('ok' => 1));?>", {}, function(shtml){
		 layer.open({
			type: 1,
			area: '930px',
			content: shtml //注意，如果str是object，那么需要字符拼接。
		  });
		});
	})
  
  
  form.on('submit(auto_get)', function(data){
	var loadingIndex = layer.load(); // 加载中动画遮罩层（1）
	
	$.ajax({
		url: "<?php echo U('weprogram/autotemplateconfig',array('ok'=>'1'));?>",
		type: 'get',
		dataType:'json',
		success: function (info) {
		   layer.close(loadingIndex); // 提交成功失败都需要关闭
			if(info.status == 0)
			{
				layer.msg('请选择会员',{time: 1000});
				
			}else if(info.status == 1){
				
				layer.msg('操作成功',{time: 1000,
					end:function(){
						var backurl = "<?php echo U('weprogram/templateconfig');?>";
						location.href = backurl;
						// location.href = info.result.url;
					}
				});

				can_sub = true;				
			}
		}
	});
	return false;
	
  })
  //监听提交
  form.on('submit(formDemo)', function(data){
	 
	 
	var gd_ar = [];
	var gd_str = '';
	$('.mult_choose_member_id').each(function(){
		gd_ar.push( $(this).attr('data-member-id') );
	})
	gd_str = gd_ar.join(',');
	
	data.field.limit_user_list = gd_str;
	
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


function cancle_bind(obj,sdiv)
{
	$('#'+sdiv).val('');
	$(obj).parent().parent().remove();
}



</script>  
</body>