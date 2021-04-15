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
		
<style>
	.selection_box
	{
		padding: 5px;
		font-size: 12px;
		background-color: #009688;
		color: #fff;
	}
</style>
			
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
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">会员详情</span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				<input type="hidden" name="is_showform" value="<?php echo $is_showform; ?>" />
				
				<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
				  <ul class="layui-tab-title">
					<li class="<?php if($is_showform ==0){ ?>layui-this<?php } ?>">会员详情</li>
					<?php if($member['is_writecommiss_form'] == 1){ ?>
					<li class="<?php if($is_showform ==1){ ?>layui-this<?php } ?>">分销表单</li>
					<?php } ?>
				  </ul>
				  <div class="layui-tab-content" >
					<div class="layui-tab-item <?php if($is_showform ==0){ ?>layui-show<?php } ?>" id="member_detail">
					
						<!--- begin -->	
						<div class="layui-form-item">
							<label class="layui-form-label">用户</label>
							<div class="layui-input-block">
								<img class="radius50" src="<?php echo ($member['avatar']); ?>" style='width:50px;height:50px;padding:1px;border:1px solid #ccc' />
								<?php echo ($member['username']); ?>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">OPENID</label>
							<div class="layui-input-block">
								<div class="form-control-static js-clip text-primary" data-url="<?php echo ($member['openid']); ?>"><?php echo ($member['openid']); ?></div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">会员等级</label>
							<div class="layui-input-block">
								
								<select name='data[level_id]' class='form-control'>
									<option value=''>普通会员</option>
									<?php foreach( $level_list as $level ){ ?>
									<option value='<?php echo ($level['id']); ?>' <?php if( $member['level_id']==$level['id']){ ?>selected<?php } ?>><?php echo ($level['levelname']); ?></option>
									<?php } ?>
								</select>
								
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">会员分组</label>
							<div class="layui-input-block">
								<select name='data[groupid]' class='form-control select2'  placeholder="无分组">
									<option value='' <?php if( empty($group['id'])){ ?>selected<?php } ?>>默认分组</option>
									<?php foreach( $group_list as $group ){ ?>
									<option value='<?php echo ($group['id']); ?>' <?php if( $group['id'] == $member['groupid'] ){ ?>selected<?php } ?>><?php echo ($group['groupname']); ?></option>
									<?php } ?>
								</select>
							</div>
						</div>
						<?php if($commiss_level > 0){ ?>
						<div class="layui-form-item">
							<label class="layui-form-label must">上级分销商</label>
							<div class="layui-input-block">
								<div class="input-group " style="margin: 0;">
									<input type="text" disabled value="<?php echo ($member['agentid']); ?>" class="form-control valid" name="data[agentid]" placeholder="" id="member_id">
									<span class="input-group-btn">
										<span data-input="#member_id" id="chose_member_id"  class="btn btn-default">选择会员</span>
									</span>
								</div>
								<?php if($saler){ ?>
								<div class="input-group " style="margin: 0;">
									<div class="layadmin-text-center choose_user">
										<img style="" src="<?php echo ($saler['avatar']); ?>">
										<div class="layadmin-maillist-img" style=""><?php echo ($saler['nickname']); ?></div>
										<button type="button" class="layui-btn layui-btn-sm" onclick="cancle_bind(this,'member_id')"><i class="layui-icon">&#xe640;</i></button>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
						<?php } ?>
						<div class="layui-form-item">
							<label class="layui-form-label">真实姓名</label>
							<div class="layui-input-block">
								<input type="text" name="data[realname]" class="form-control" value="<?php echo ($member['realname']); ?>"/>
							</div>
						</div>

						<div class="layui-form-item">
							<label class="layui-form-label">手机号</label>
							<div class="layui-input-block">
								<input type="text" name="data[telephone]" class="form-control" value="<?php echo ($member['telephone']); ?>"/>
							</div>
						</div>
					<input type="hidden" name="member_id" value="777">
						<div class="layui-form-item">
							<label class="layui-form-label">积分</label>
							<div class="layui-input-block">
								<div class='form-control-static'><?php echo ($member['score']); ?>&nbsp;&nbsp;
									<a class="selection_box ajaxModal " data-href="<?php echo U('user/recharge', array('type'=> 'score','id'=>$member['member_id']));?>" style="padding-left: 5px;cursor:pointer;">充值</a>&nbsp;&nbsp;
									<a class="text-primary ajaxModal" style="color:blue;" href="<?php echo U('user/integral_flow', array('id'=>$member['member_id']));?>"title=''>积分流水</a>
									
								</div>
							</div>
						</div>

						<div class="layui-form-item">
							<label class="layui-form-label">余额</label>
							<div class="layui-input-block">
								<div class='form-control-static'><?php echo ($member['account_money']); ?>&nbsp;&nbsp;					  
								  <a class="selection_box ajaxModal" data-href="<?php echo U('user/recharge', array('type'=> 'account_money','id'=>$member['member_id']));?>" style="padding-left: 5px;cursor:pointer;">充值</a>&nbsp;&nbsp;
								  <a class="text-primary ajaxModal" style="color:blue;" href="<?php echo U('user/recharge_flow', array('id'=>$member['member_id']));?>"title=''>余额流水</a>
								  
								  
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">付费会员</label>
							<div class="layui-input-block">
								<div class='form-control-static'>
									<?php if($member['card_id'] > 0){?>
										<span>会员卡名称：</span>
										<span class="text-primary"><?php echo $member['cardname']; ?></span>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<?php if($member['card_end_time'] > time()){ ?>
											<span style="color:#c31d0c;">有效期内</span>
											&nbsp;&nbsp;&nbsp;&nbsp;
											<span>到期时间：<?php echo date('Y-m-d',$member['card_end_time']); ?></span>
											&nbsp;&nbsp;&nbsp;&nbsp;
										<?php }else{ ?>
											<span style="color:#c31d0c;">已到期</span>
											&nbsp;&nbsp;&nbsp;&nbsp;
											<span style="color:#c31d0c;">到期时间：<?php echo date('Y-m-d',$member['card_end_time']); ?></span>
											&nbsp;&nbsp;&nbsp;&nbsp;
										<?php } ?>
										<a class="layui-btn layui-btn-xs actbtn" href="javascript:void(0)" data-href="<?php echo U('user/edit_expiretime', array('id'=>$member['member_id']));?>" data-title="修改到期时间" title="修改到期时间">修改到期时间</a>
									<?php }else{ ?>
										<span class="text-primary">非会员</span>
										&nbsp;&nbsp;&nbsp;&nbsp;
										<a class="layui-btn layui-btn-xs actbtn" href="javascript:void(0)" data-href="<?php echo U('user/query_card', array('id'=>$member['member_id']));?>" data-title="开通会员"  title="开通会员">开通会员</a>
									<?php } ?>
								</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">注册时间</label>
							<div class="layui-input-block">
								<div class='form-control-static'><?php echo date("Y-m-d H:i:s",$member['create_time']);?></div>
							</div>
						</div>
						
					  <?php if(!empty($member['comsiss_time'])){ ?>
					  <div class="layui-form-item">
						  <label class="layui-form-label">成为分销商时间</label>
						  <div class="layui-input-block">
							  <div class='form-control-static'><?php echo date("Y-m-d H:i:s",$member['comsiss_time']);?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
								  <?php if($member['is_writecommiss_form'] == 1){ ?>
								  <a class="layui-btn layui-btn-xs " href="javascript:void(0)" title="">
									<span data-toggle="tooltip" data-placement="top" title="" data-original-title="表单">
										<i class='icow icow-bianji2'></i>表单
									</span>
								  </a>
								  <?php } ?>
								  <?php if($member['is_share_tj'] == 1){ ?>
								  <a class="layui-btn layui-btn-xs  " href="javascript:void(0)"  title="">
									<span data-toggle="tooltip" data-placement="top" title="" data-original-title="分享">
										<i class='icow icow-bianji2'></i>分享
									</span>
								  </a>
								  <?php } ?>
							  </div>
						  </div>
					  </div>
					  <?php } ?>
						<div class="layui-form-item">
							<label class="layui-form-label">是否禁用</label>
							<div class="layui-input-block">
							   
								<label class="radio-inline"><input type="radio" name="data[isblack]" value="1" <?php if( $member['isblack']==1){ ?>checked<?php } ?> title="禁用" ></label>
								<label class="radio-inline" ><input type="radio" name="data[isblack]" value="0" <?php if( $member['isblack']==0){ ?>checked<?php } ?> title="启用" ></label>
								<span class="help-block">设置禁用后，此会员无法访问商城</span>
							   
							</div>
						</div>


						<?php  if($is_user_shenhe == 1){ ?>
						<div class="layui-form-item">
							<label class="layui-form-label">是否审核</label>
							<div class="layui-input-block">

								<label class="radio-inline"><input type="radio" name="data[is_apply_state]" value="1" <?php if( $member['is_apply_state']==1){ ?>checked<?php } ?> title="审核通过" ></label>
								<label class="radio-inline"><input type="radio" name="data[is_apply_state]" value="0" <?php if( $member['is_apply_state']==0 ){ ?>checked<?php } ?> title="未审核" ></label>
								<label class="radio-inline" ><input type="radio" name="data[is_apply_state]" value="2" <?php if( $member['is_apply_state']==2){ ?>checked<?php } ?> title="拒绝审核" ></label>
								<span class="help-block">设置未审核、拒绝审核后，此会员无法下单</span>

							</div>
						</div>
						<?php } ?>
						<?php if($is_get_formdata == 1){ ?>
						<div class="layui-form-item">
							<label class="layui-form-label">会员表单</label>
							<div class="layui-input-block">
								<div class='form-control-static'>
									<?php if($member['is_write_form'] == 0) { ?>
									<span>未填写 </span><br/>
									<?php }else{ ?>

									<?php if( !empty($member['form_info']) ){ ?>
									<span>姓名:<?php echo ($member['form_info']['username']); ?> </span><br/>
									<span>电话:<?php echo ($member['form_info']['mobile']); ?> </span><br/>
									<?php }else{ ?>
									<span>姓名:-- </span><br/>
									<span>电话:-- </span><br/>
									<?php } ?>

									<?php } ?>
								</div>
							</div>
						</div>
						<?php } ?>

						<div class="layui-form-item">
							<label class="layui-form-label">成交订单数</label>
							<div class="layui-input-block">
								<div class='form-control-static'><?php echo round($member['self_ordercount'],0);?> </div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">成交金额</label>
							<div class="layui-input-block">
								<div class='form-control-static'><?php echo round($member['self_ordermoney'],2);?> 元</div>
							</div>
						</div>
						<div class="layui-form-item">
							<label class="layui-form-label">备注</label>
							<div class="layui-input-block">
								<textarea name="data[content]" class='form-control' rows="5"><?php echo ($member['content']); ?></textarea>
							</div>
						</div>
						
					</div>
						<!-- end -->
					<?php if($member['is_writecommiss_form'] == 1){ ?>
					<div class="layui-tab-item <?php if($is_showform ==1){ ?>layui-show<?php } ?>" id="member_distribution">
						<!-- 分销表单 -->
						
							<?php  if( $member['is_writecommiss_form'] == 1 ){ ?>
							<?php if( !empty($member['commiss_formcontent']) ){ ?>
							
							<div class="region-goods-details ">
								<?php foreach($member['commiss_formcontent'] as $val){ ?>
								<?php if( in_array($val['type'], array('text','textarea','select','radio') ) ){ ?>
								<div class="layui-form-item">
									<label class="layui-form-label"><?php echo $val['name']; ?></label>
									<div class="layui-input-block">
										<input type="text" name="<?php echo $val['name'].'_'.$val['type']; ?>" class="form-control commiss_formcontent" value="<?php echo $val['value']; ?>"/>
									</div>
								</div>
								<?php } ?>
								
								<?php if( in_array($val['type'], array('checkbox') ) ){ ?>
								<div class="layui-form-item">
									<label class="layui-form-label"><?php echo $val['name']; ?></label>
									<div class="layui-input-block">
										<?php  $ck_val = ""; foreach($val['value'] as $vv){ $ck_val .= $vv.' '; } ?>
										<input type="text" name="<?php echo $val['name'].'_'.$val['type']; ?>" class="form-control commiss_formcontent" value="<?php echo $ck_val; ?>"/>
									</div>
								</div>
								<?php } ?>
								<?php } ?>	
							</div>
							<?php }else{ ?>
							<div class="region-goods-details ">
								<p>暂无内容</p>
							</div>
							<?php } ?>	
						<?php } ?>
						<!-- 分销表单 -->
					</div>
					<?php } ?>
				
				  </div>
				  
				</div>
				
				<div class="layui-form-item">
					<label class="layui-form-label"> </label>
					<div class="layui-input-block">
						<input type="submit" value="提交" lay-submit lay-filter="formDemo" class="btn btn-primary"  />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="btn btn-default" style='margin-left:10px;' onclick="history.go(-1)">返回列表</a>
						
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
  
   
  $('#chose_member_id').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('user/zhenquery_commission', array('ok' => 1));?>", {}, function(shtml){
		 layer.open({
			type: 1,
			area: '930px',
			content: shtml //注意，如果str是object，那么需要字符拼接。
		  });
		});
	})
	
	form.on('radio(linktype)', function(data){
		if (data.value == 2) {
			$('#typeGroup').show();
		} else {
			$('#typeGroup').hide();
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

	$('.actbtn').click(function(){
		var url = $(this).attr('data-href');
		var title = $(this).attr('data-title');
		$.post(url, {}, function(shtml){
			layer.open({
				type: 1,
				title: title,
				area: '930px',
				content: shtml //注意，如果str是object，那么需要字符拼接。
			});
		});
	})
})


function cancle_bind(obj,sdiv)
{
	$('#'+sdiv).val('');
	$(obj).parent().parent().remove();
}


</script>

<script>
var ajax_url = "";
$(function(){

	$(".ajaxModal").click(function () {
        var s_url = $(this).attr('data-href');
		ajax_url = s_url;

       $.ajax({
				url:s_url,
				type:"get",
				success:function(shtml){
					$('#ajaxModal').html(shtml);
					$("#ajaxModal").modal();
				}	
		})
    });
	$(document).delegate(".modal-footer .btn-primary","click",function(){
		var s_data = $('#ajaxModal form').serialize();
		$.ajax({
			url:ajax_url,
			type:'post',
			dataType:'json',
			data:s_data,
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
		return false;
	})
	
	
	
	
	//
	

	
	
})
</script>
<div id="ajaxModal" class="modal fade" style="display: none;">

</div>
<script type="text/javascript">
	$(function () {
		$(".btn-maxcredit").unbind('click').click(function () {
			var val = $(this).val();
			if(val==1){
				$(".maxcreditinput").css({'display':'inline-block'});
			}else{
				$(".maxcreditinput").css({'display':'none'});
			}
		});
	})
</script>  
</body>