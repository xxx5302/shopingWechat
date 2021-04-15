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
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">拼团设置</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				
				
				<div class="layui-form-item">
                    <label class="layui-form-label">是否开启分销</label>
                    <div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[is_open_pintuan_commiss]' value='0' <?php if( empty($data) || $data['is_open_pintuan_commiss'] ==0 ){ ?>checked <?php } ?> title="关闭" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[is_open_pintuan_commiss]' value='1' <?php if( !empty($data) && $data['is_open_pintuan_commiss'] ==1 ){ ?>checked <?php } ?> title="开启" /> 
						</label>
						<span class="help-block"> 
							注：必须先在<a class="blue_txt" lay-href="<?php echo U('distribution/config', array('ok' => 1));?>" >“会员=>会员分销=>分销设置”</a>中设置分销等级，才能使用
						</span>
                    </div>
                </div>
				<div class="layui-form-item">
                    <label class="layui-form-label">是否开启订单打印</label>
                    <div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[is_open_pintuan_orderprint]' value='0' <?php if( empty($data) || $data['is_open_pintuan_orderprint'] ==0 ){ ?>checked <?php } ?> title="关闭" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[is_open_pintuan_orderprint]' value='1' <?php if( !empty($data) && $data['is_open_pintuan_orderprint'] ==1 ){ ?>checked <?php } ?> title="开启" /> 
						</label>
						<span class="help-block"> 
							注：必须先在<a class="blue_txt" lay-href="<?php echo U('order/config', array('ok' => 1));?>" >“订单=>订单设置”</a>中设置小票打印，才能使用
						</span> 
                    </div>
                </div>
				
				
				<div class="layui-form-item">
                    <label class="layui-form-label">活动商品展示方式</label>
                    <div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_show_type]' value='0' <?php if( empty($data) || $data['pintuan_show_type'] ==0 ){ ?>checked <?php } ?> title="横向布局" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_show_type]' value='1' <?php if( !empty($data) && $data['pintuan_show_type'] ==1 ){ ?>checked <?php } ?> title="左右布局" /> 
						</label> 
						<span class="help-block"> 
							左右布局为每行俩个商品，商品多建议左右布局，横向布局为每行一个商品
						</span> 
                    </div>
                </div>
				
				<div class="layui-form-item" style="display:none;">
                    <label class="layui-form-label">是否开启推广团</label>
                    <div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' lay-filter="is_open_pintuan_tuiguang" name='parameter[is_open_pintuan_tuiguang]' value='0' <?php if( empty($data) || $data['is_open_pintuan_tuiguang'] ==0 ){ ?>checked <?php } ?> title="关闭" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' lay-filter="is_open_pintuan_tuiguang" name='parameter[is_open_pintuan_tuiguang]' value='1' <?php if( !empty($data) && $data['is_open_pintuan_tuiguang'] ==1 ){ ?>checked <?php } ?> title="开启" /> 
						</label>
						<span class="help-block"> 
							发起拼团，发起拼团的人不生成订单，邀请的好友参团成功，团长会产生相应的佣金
						</span> 						
                    </div>
					
                </div>
				
				<div class="layui-form-item" id="is_new_old_yongjin" <?php if(!empty($data) && $data['is_open_pintuan_tuiguang'] ==1 ){ ?> <?php }else{ ?> style="display:none;" <?php } ?> >
                    <label class="layui-form-label">推广团佣金计算方式</label>
                    <div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_tuiguang_just_new]' value='0' <?php if( empty($data) || $data['pintuan_tuiguang_just_new'] ==0 ){ ?>checked <?php } ?> title="所有人有效" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_tuiguang_just_new]' value='1' <?php if( !empty($data) && $data['pintuan_tuiguang_just_new'] ==1 ){ ?>checked <?php } ?> title="仅新人有效" /> 
						</label> 
						<span class="help-block"> 
							仅新人有效： 只有新人参团的商品才计算佣金给团长。所有有效：无论新老会员参团都算佣金给团长
						</span> 
                    </div>
                </div>
				
				
				<div class="layui-form-item">
                    <label class="layui-form-label">拼团详情，猜你喜欢</label>
                    <div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[is_open_pipntuan_like]' value='0' <?php if( empty($data) || $data['is_open_pipntuan_like'] ==0 ){ ?>checked <?php } ?> title="关闭" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[is_open_pipntuan_like]' value='1' <?php if( !empty($data) && $data['is_open_pipntuan_like'] ==1 ){ ?>checked <?php } ?> title="开启" /> 
						</label> 
						<span class="help-block"> 
						</span> 
                    </div>
                </div>
				<div class="layui-form-item">
					<label class="layui-form-label">拼团规则介绍</label>
					<div class="layui-input-block fixmore-input-group">
						<div class="">
							<?php echo tpl_ueditor('parameter[pintuan_publish]',$data['pintuan_publish'],array('height'=>'300'));?>
						</div>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">佣金团说明</label>
					<div class="layui-input-block">
						<textarea style="height:100px;" name="parameter[pintuan_newman_notice]" class="layui-textarea" rows="5" placeholder="仅新人参团的说明"><?php echo ($data['pintuan_newman_notice']); ?></textarea>
						<div class="layui-form-mid">			
							
						</div>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">分享标题</label>
					<div class="layui-input-block">
						<input type="text" name="parameter[pintuan_index_share_title]" maxlength="30" class="form-control" value="<?php echo ($data['pintuan_index_share_title']); ?>" data-rule-required="true" />
						<span class='help-block'>拼团首页分享标题</span>
					</div>
				</div>

				<div class="layui-form-item">
					<label class="layui-form-label ">分享图片</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[pintuan_index_share_img]', $data['pintuan_index_share_img']);?>
						<span class='help-block'>此图为拼团首页分享图片（比例为长宽比5:4）</span>
					</div>
				</div>
				
				<div class="layui-form-item">
                    <label class="layui-form-label">首页显示</label>
                    <div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_index_show]' value='0' <?php if( empty($data) || $data['pintuan_index_show']==0 ){ ?>checked <?php } ?> title="隐藏" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_index_show]' value='1' <?php if( !empty($data) && $data['pintuan_index_show']==1 ){ ?>checked <?php } ?> title="样式一（小方块）" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_index_show]' value='2' <?php if( !empty($data) && $data['pintuan_index_show']==2 ){ ?>checked <?php } ?> title="样式二（大篇幅）" /> 
						</label>
						<span class="help-block">
							样式一：首页“新人专享”、“限时秒杀”之间显示“封面图+拼团商品”；
							<br>
							样式二：首页商品列表顶部图之上显示“封面图+拼团商品”。
						</span> 
                    </div>
                </div>
				
				<div class="layui-form-item">
                    <label class="layui-form-label">自动虚拟成团</label>
                    <div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_isvirs_success]' value='0' <?php if( empty($data) || $data['pintuan_isvirs_success'] ==0 ){ ?>checked <?php } ?> title="关闭" /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_isvirs_success]' value='1' <?php if( !empty($data) && $data['pintuan_isvirs_success'] ==1 ){ ?>checked <?php } ?> title="开启" /> 
						</label> 
						<span class="help-block"> 
							注：开启模拟成团后，拼团有效期内人数未满的团，系统将会模拟“匿名买家”凑满人数，使该团成团。
							你只需要对已付款参团的真实买家发货。建议合理开启，以提高成团率。
							</br>
							(需设置<a class="blue_txt" href="<?php echo U('user/userjia',array('ok'=>'1'));?>">虚拟会员</a>，虚拟会员人数不足以补足剩余参团人数，拼团还是会失败)
						</span> 
                    </div>
                </div>
				
				
				<div class="layui-form-item" >
                    <label class="layui-form-label">拼团模式</label>
                    <div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_model_buy]' lay-filter="pintuan_model_buy" value='0' <?php if( empty($data) || $data['pintuan_model_buy'] ==0 ){ ?>checked <?php } ?> title="仅快递" />
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_model_buy]' lay-filter="pintuan_model_buy" value='1' <?php if( !empty($data) && $data['pintuan_model_buy'] ==1 ){ ?>checked <?php } ?> title="关联团长" />
						</label> 
						<span class="help-block"> 
							备注：<br/> 
								“仅快递” 模式，不关联团长，仅快递可送达<br/> 
								“关联团长”模式，用户自提，团长配送，快递均可使用，并结算给团长佣金
						</span> 
                    </div>
                </div>
				
				
        		<div class="layui-form-item">
					<label class="layui-form-label ">首页拼团入口封面图</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('parameter[pintuan_index_coming_img]', $data['pintuan_index_coming_img']);?>
						<span class='help-block'>此图为首页拼团入口封面图,备注：不设置不显示，但还会显示拼团商品</span>
					</div>
				</div>
				
				<div class="layui-form-item">
                    <label class="layui-form-label">拼团详情团长信息</label>
                    <div class="layui-input-block">
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_show_community_info]' value='0' <?php if( empty($data) || $data['pintuan_show_community_info'] ==0 ){ ?>checked <?php } ?> title="隐藏" />
						</label>
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_show_community_info]' value='1' <?php if( !empty($data) && $data['pintuan_show_community_info'] ==1 ){ ?>checked <?php } ?> title="显示" />
						</label> 
						<span class="help-block"> 
							备注：“关联团长” 模式，并且开启此开关才会显示
						</span> 
                    </div>
                </div>
				
				
                <div class="layui-form-item">
                    <label class="layui-form-label">陌生人参团</label>
                    <div class="layui-input-block">
                    	<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_close_stranger]' lay-filter="xianshickbox" value='1' <?php if( !empty($data) && $data['pintuan_close_stranger']==1 ){ ?>checked <?php } ?> title="隐藏" />
						</label> 
						<label class='radio-inline'>
							<input type='radio' name='parameter[pintuan_close_stranger]' lay-filter="xianshickbox" value='0' <?php if( empty($data) || $data['pintuan_close_stranger']==0 ){ ?>checked <?php } ?> title="显示" />
						</label>
                    </div>
                </div>
				
				<div class="layui-form-item" id="pintuan_stranger_zero" <?php if( !empty($data) && $data['pintuan_close_stranger']==1 ){ ?>style="display:none;" <?php } ?> >
				   <label class="layui-form-label">包含0元开团</label>
					<div class="layui-input-block ">
						<input type="checkbox"  lay-skin="primary" title="是" name="parameter[pintuan_stranger_zero]" class="form-control valid" <?php if( !empty($data) && $data['pintuan_stranger_zero'] ==1 ){ ?>checked<?php } ?> value="1" />
					</div>
					<div class="layui-form-mid layui-word-aux" style="margin-left:15px;">
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

layui.use(['jquery', 'layer','form','colorpicker'], function(){ 
  $ = layui.$;
  var form = layui.form;
  var colorpicker = layui.colorpicker;

  
	form.on('radio(linktype)', function(data){
		if (data.value == 2) {
			$('#typeGroup').show();
		} else {
			$('#typeGroup').hide();
		}
	}); 
	
	form.on('radio(xianshickbox)', function(data){
		if (data.value == 1) {
			$('#pintuan_stranger_zero').hide();
		} else {
			$('#pintuan_stranger_zero').show();
		}
	});
	<!--
	<?php if($data['delivery_type_express'] == 2){?>
	form.on('radio(pintuan_model_buy1111)', function(data){
		if (data.value == 0) {
			$('input[name="parameter[pintuan_model_buy]"][value=0]').prop("checked","false");
			$('input[name="parameter[pintuan_model_buy]"][value=1]').prop("checked","true");
			layer.msg("启用仅快递配送模式，请在物流设置开启快递配送方式！",{icon: 2,time: 3000});
			form.render();
		}
	});
	<?php }?>-->
	//表单赋值
    var goodsdetails_addcart_bg_color = '<?php echo ($data["goodsdetails_addcart_bg_color"]); ?>';
    colorpicker.render({
      elem: '#minicolors'
      ,color: goodsdetails_addcart_bg_color ? goodsdetails_addcart_bg_color : '#f9c706'
      ,done: function(color){
        $('#test-colorpicker-form-input').val(color);
      }
    });

    //表单赋值
    var goodsdetails_buy_bg_color = '<?php echo ($data["goodsdetails_buy_bg_color"]); ?>';
    colorpicker.render({
      elem: '#minicolors1'
      ,color: goodsdetails_buy_bg_color ? goodsdetails_buy_bg_color : '#ff5041'
      ,done: function(color){
        $('#test-colorpicker-form-input1').val(color);
      }
    });

	
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
</body>