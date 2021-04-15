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
<style>
.input-group .form-control{min-width:600px;}
.multi-audio-details .multi-audio-item {
    width: 155px;
    height: 40px;
    position: relative;
    float: left;
    margin-right: 5px;
}
.multi-audio-details .input-group .form-control {
	min-width: auto;
}
</style>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text"><?php if( !empty($item['id'])){ ?>编辑<?php  }else{ ?>添加<?php } ?>幻灯片<?php if( !empty($item['id'])){ ?>(<?php echo ($item['advname']); ?>)<?php } ?></span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
				
				<input type="hidden" name="data[id]" value="<?php echo ($item['id']); ?>"/>
					<div class="layui-form-item">
						<label class="layui-form-label">幻灯片名称</label>
						<div class="layui-input-block ">
							<input type="text" id='advname' lay-verify="required"  name="data[advname]" class="form-control" value="<?php echo ($item['advname']); ?>"/>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">图片</label>
						<div class="layui-input-block">
							<?php echo tpl_form_field_image2('data[thumb]', $item['thumb']);?>
							<span class='help-block'>建议尺寸:710 * 320或同比例, 请将所有幻灯片图片尺寸保持一致</span>
						</div>
					</div>
					
					
					<div class="layui-form-item">
						<label class="layui-form-label">链接类型</label>
						<div class="layui-input-block">
							<label class='radio-inline'>
								<input type='radio' name='data[linktype]' lay-filter="linktype"  title="本小程序链接" value=1 <?php if($item['linktype']==1 || empty($item)){ ?>checked<?php } ?> />
							</label>
							<label class='radio-inline'>
								<input type='radio' name='data[linktype]' lay-filter="linktype" title="webview外链" value=0 <?php if( $item['linktype']==0 && !empty($item) ){ ?>checked<?php } ?> />
							</label>
							<label class='radio-inline'>
								<input type='radio' name='data[linktype]' lay-filter="linktype"  title="外部小程序链接" value=2 <?php if( $item['linktype']==2 && !empty($item) ){ ?>checked<?php } ?> /> 
							</label>
							<label class='radio-inline'>
								<input type='radio' name='data[linktype]' title="客服" lay-filter="linktype" value=5 <?php if( $item['linktype']==5 && !empty($item) ){ ?>checked<?php } ?> /> 
							</label>
							<label class='radio-inline'>
								<input type='radio' name='data[linktype]' title="优惠券" lay-filter="linktype" value=6 <?php if( $item['linktype']==6 && !empty($item) ){ ?>checked<?php } ?> /> 
							</label>
						</div>
					</div>
					
					<!-- 优惠券 -->
					<div class="layui-form-item" id="couponId" style="<?php if( $item['linktype']!=6 ){ ?>display: none;<?php } ?>">
						<label class="layui-form-label must">优惠券</label>
						<div class="layui-input-block">
							<div class="input-group " style="margin: 0;">
	                            <input type="text" disabled value="" class="form-control valid" name="coupon_dan_id" placeholder="" id="coupon_id">
	                            <span class="input-group-btn">
	                                <span data-input="#coupon_id_box" data-name="coupon_id" id="chose_coupon_id"  class="btn btn-default">选择优惠券</span>
	                            </span>
	                        </div>
							<div class="multi-audio-details container" id="coupon_id_box" style="width:auto;">
	                            <?php if( !empty($couponinfo) ){ ?>
	                            	<?php foreach($couponinfo as $c){ ?>
	                                <div class="multi-audio-item " data-id="<?php echo ($c['id']); ?>">
	                                    <div class="input-group">
	                                       <input type="text" class="form-control img-textname" readonly="" value="<?php echo ($c['voucher_title']); ?>">
	                                       <input type="hidden" value="<?php echo ($c['id']); ?>" name="coupon_id[]">
	                                       <div class="input-group-btn">
	                                            <button class="btn btn-default" data-id="<?php echo ($c['id']); ?>" onclick="cancle_coupon(this, <?php echo ($c['id']); ?>)" type="button"><i class="fa fa-remove"></i></button>
	                                       </div>
	                                    </div>
	                                </div>
	                                <?php } ?>
	                            <?php } ?>
	                        </div>
						</div>
					</div>
					
					<div class="layui-form-item" style="<?php if( $item['linktype']!=2){ ?>display: none;<?php } ?>" id="typeGroup">
						<label class="layui-form-label">外链小程序appid</label>
						<div class="layui-input-block ">
							<input type="text" id='appid' name="data[appid]" class="form-control" value="<?php echo ($item['appid']); ?>" maxlength="32"/>
						</div>
					</div>
					<div class="layui-form-item" style="<?php if($item['linktype']==5||$item['linktype']==6){ ?>display: none;<?php } ?>" id="typeUrl">
						<label class="layui-form-label">链接</label>
						<div class="layui-input-block">
							<div class="input-group " style="margin: 0;">
								<input type="text" value="<?php echo ($item['link']); ?>" class="form-control valid" name="data[link]" placeholder="" id="advlink">
								<span class="input-group-btn" id="chose_link_box" <?php if( $item['linktype']==0 && !empty($item) ){ ?> style="display:none;" <?php } ?> >
									<span data-input="#advlink" id="chose_link"  class="btn btn-default">选择链接</span>
								</span>
							</div>
								<span class='help-block' <?php if( $item['linktype']==0 && !empty($item) ){ ?>  <?php }else{ ?>style="display:none;"<?php } ?> id="chose_link_tip">备注：请使用http或https链接，需要在<a href="http://mp.weixin.qq.com" target="_blank">mp.weixin.qq.com</a>开发-开发设置-业务域名添加上此域名</span>
						</div>
					</div>

					<div class="layui-form-item">
						<label class="layui-form-label">排序</label>
						<div class="layui-input-block">
							<input type="text" name="data[displayorder]" class="form-control" value="<?php echo ($item['displayorder']); ?>"/>
							<span class='help-block'>数字越大，排名越靠前</span>
						</div>
					</div>
					<div class="layui-form-item">
						<label class="layui-form-label">状态</label>
						<div class="layui-input-block">
							<label class='radio-inline'>
								<input type='radio' name='data[enabled]' title="显示" value=1 <?php if( $item['enabled']==1 || empty($item)){ ?>checked<?php } ?> /> 
							</label>
							<label class='radio-inline'>
								<input type='radio' name='data[enabled]' title="隐藏" value=0 <?php if( $item['enabled']==0 && !empty($item) ){ ?>checked<?php } ?> /> 
							</label>
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
var iptname;

layui.use(['jquery', 'layer','form'], function(){ 
  $ = layui.$;
  var form = layui.form;
  
	form.on('radio(linktype)', function(data){
		if (data.value == 2) {
			$('#typeGroup').show();
			$('#couponId').hide();
			$('#typeUrl').show();
		} 
		else if( data.value == 0 )
		{
			$('#typeGroup').hide();
			$('#chose_link_box').hide();
			$('#chose_link_tip').show();
			$('#couponId').hide();
			$('#typeUrl').show();
		}
		else if(data.value == 5){
			$('#typeGroup').hide();
			$('#chose_link_box').hide();
			$('#chose_link_tip').hide();
			$('#typeUrl').hide();
			$('#couponId').hide();
		} 
		else if( data.value == 6 )
		{
			$('#typeGroup').hide();
			$('#chose_link_box').hide();
			$('#chose_link_tip').hide();
			$('#typeUrl').hide();
			$('#couponId').show();
		}
		else {
			$('#typeGroup').hide();
			$('#chose_link_box').show();
			$('#chose_link_tip').hide();
			$('#couponId').hide();
			$('#typeUrl').show();
		}
	});  

	
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

	$('#chose_coupon_id').click(function(){
		cur_open_div = $(this).attr('data-input');
		iptname = $(this).data('name');
		var coupon_ids = [];
		$('.multi-audio-item').each(function(){
			coupon_ids.push( $(this).attr("data-id") );
		})
		$.post("<?php echo U('Marketing/couponquery', array('ok' => 1));?>", {coupon_ids:coupon_ids}, function(shtml){
		 layer.open({
			type: 1,
			area: '930px',
			content: shtml //注意，如果str是object，那么需要字符拼接。
		  });
		})
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
						//var backurl = "{php echo shopUrl('Configindex/slider',array('ok'=>'1'))}";
						var backurl = "seller.php?s=/configindex/slider";
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

function cancle_coupon(obj,sdiv)
{
    $('#coupon_id').val('');
    $('#'+sdiv).val('');
    $(obj).parents('.multi-audio-item').remove();

    var coupon_id = "";
    var head_arr = [];
    $('.mult_heads').each(function(){
        head_arr.push( $(this).val() );
    })
    coupon_id = head_arr.join(',');
    $('#coupon_id').val(coupon_id);
	//$('.mult_choose_goodsid').remove();
}

</script>  
</body>