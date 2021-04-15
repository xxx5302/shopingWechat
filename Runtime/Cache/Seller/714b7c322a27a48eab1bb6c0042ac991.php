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
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">手动发送优惠券</small></span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" enctype="multipart/form-data" >
				
				<div class="layui-form-item">
					<label class="layui-form-label">选择优惠券</label>
					<div class="layui-input-block">
						<select name='voucher_id' id="voucher_id" class="layui-input layui-unselect">
							<option value=''></option>
							<?php foreach($quan_list as $c){ ?>
							<option value="<?php echo ($c['id']); ?>" person_limit_count="<?php echo ($c['person_limit_count']); ?>" total_count="<?php echo ($c['total_count']); ?>" send_count="<?php echo ($c['send_count']); ?>"><?php echo ($c['voucher_title']); ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">每人发送张数</label>
					<div class="layui-input-block">
						<input type="text" name="send_count" id="send_count" class="form-control" value="1"  />
						<span class='help-block'>此处受总数限制，如果剩余张数不足以发放给选定会员数量，则无法发放</span>
					</div>
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label">首页领取</label>
					<div class="layui-input-block" >
						<input type="radio" lay-filter="is_limit_goodsbuy" name="send_person" value="1" checked="true" title="指定用户发送" />
						<input type="radio" lay-filter="is_limit_goodsbuy" name="send_person" value="2"  title="按用户分组等级发送" />
						<input type="radio" lay-filter="is_limit_goodsbuy" name="send_person" value="3"  title="全部发送(<?php echo ($membercount); ?>人)" />
						<input type="hidden" id="member_all_count" name="member_all_count" value="<?php echo ($membercount); ?>"/>
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
						<select name="member_group_id" id="member_group_id">
							<?php foreach($list as $val){ ?>
							<option value="<?php echo ($val['id']); ?>" member_count="<?php echo ($val['membercount']); ?>"><?php echo ($val['groupname']); ?>(<?php echo ($val['membercount']); ?>人)</option>
							<?php } ?>
						</select>
					</div>
				</div>
				
				
				<div class="layui-form-item">
					<label class="layui-form-label"></label>
					<div class="layui-input-block">
						<input type="hidden" name="limit_goods_list" value="<?php echo ($item['limit_goods_list']); ?>" id="limit_goods_list" />
						<input type="submit" name="submit" value="确认发送" lay-submit lay-filter="formDemo" class="btn btn-primary col-lg-1"/>
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
  
  form.on('radio(is_limit_goodsbuy)', function(data){
	 
		if(data.value == 1)
		{
			$('#type_1').show();
			$('#type_2').hide();
		}else if(data.value == 2)
		{
			$('#type_1').hide();
			$('#type_2').show();
		}
		else{
			$('#type_1').hide();
			$('#type_2').hide();
		}
	});  

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
	
	$('#chose_member_id').click(function(){ 
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('user/query', array('is_quan' => 1));?>", {}, function(shtml){
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
  
	var gd_ar = [];
	var gd_str = '';
	var member_count = 0;
	$('.mult_choose_member_id').each(function(){
		gd_ar.push( $(this).attr('data-member-id') );
		member_count++;
	})
	gd_str = gd_ar.join(',');
	
	data.field.limit_user_list = gd_str;
	
	if(data.field.voucher_id == ''){
		layer.msg('请选择优惠券');
		return false;
	}
	
	if(data.field.send_count <= 0 )
	{
		layer.msg('请填写发送数量'); 
		return false;
		
	}
	
	if(data.field.send_person == 1 )
	{
		if(gd_str == '')
		{
			layer.msg('请选择发送人'); 
			return false;
		}
	}

	var person_limit_count = $('#voucher_id').find("option:selected").attr("person_limit_count");
	if(parseInt(data.field.send_count) > parseInt(person_limit_count) && parseInt(person_limit_count)!=0 ){
		layer.msg('每人发送张数不能超过优惠券设定的每人限领');
		return false;
	}
	var total_count = $('#voucher_id').find("option:selected").attr("total_count");
	var send_count = $('#voucher_id').find("option:selected").attr("send_count");
	var sy_count = parseInt(total_count)-parseInt(send_count);
	var send_total_count = 0;
	if(data.field.send_person == 1 ){
		send_total_count = parseInt(member_count)*parseInt(data.field.send_count);
	}else if(data.field.send_person == 2 ){
		var member_group_count = $('#member_group_id').find("option:selected").attr("member_count");
		send_total_count = parseInt(member_group_count)*parseInt(data.field.send_count);
	}else if(data.field.send_person == 3 ){
		send_total_count = $('#member_all_count').val();
	}
	if(parseInt(total_count) != -1 ){
			if(parseInt(send_total_count) > parseInt(sy_count)){
				  layer.msg('发放总数（发放人数*每人张数）必须小于或等于优惠券剩余的数量');
				  return false;
			}
	
	}

	layer.confirm('确认发送吗？', function(index){
			$.post("<?php echo U('marketing/couponsend_do');?>", data.field, function(shtml){
             layer.open({
                type: 1,
                area: '930px',
                content: shtml //注意，如果str是object，那么需要字符拼接。
              });
            });
	   })
	
	return false;
	//mult_choose_goodsid limit_goods_list
	var gd_ar = [];
	var gd_str = '';
	$('.mult_choose_goodsid').each(function(){
		gd_ar.push( $(this).attr('data-gid') );
	})
	gd_str = gd_ar.join(',');
	
	data.field.limit_goods_list = gd_str;
	
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
						var backurl = "<?php echo U('marketing',array('ok'=>'1'));?>";
						location.href = backurl;
						// location.href = info.result.url;
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
</html>