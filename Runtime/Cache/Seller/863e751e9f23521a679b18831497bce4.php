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
   <style>
   	.multi-audio-details .multi-audio-item {
	    width: 155px;
	    height: 40px;
	    position: relative;
	    float: left;
	    margin-right: 5px;
	}
   </style>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text"><?php if( !empty($item['id'])){ ?>编辑<?php  }else{ ?>添加<?php } ?>导航图标<?php if( !empty($item['id'])){ ?>(<?php echo ($item['navname']); ?>)<?php } ?></span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
		
		
				<input type="hidden" name="data[id]" value="<?php echo ($item['id']); ?>"/>
				<div class="layui-form-item">
					<label class="layui-form-label must">导航图标名称</label>
					<div class="layui-input-block ">
						<input type="text" id='advname' name="data[navname]" class="form-control" value="<?php echo ($item['navname']); ?>" data-rule-required="true"/>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label must">图片</label>
					<div class="layui-input-block">
						<?php echo tpl_form_field_image2('data[thumb]', $item['thumb']);?>
						<span class='help-block'>建议尺寸:120 * 120 , 请将所有图标尺寸保持1:1</span>
					</div>
				</div>
				<div class="layui-form-item">
					<label class="layui-form-label">链接类型</label>
					<div class="layui-input-block">
						
						<label class='radio-inline'>
							<input type='radio' name='data[type]' title="本小程序链接" lay-filter="linktype" value=1 <?php if($item['type']==1 || empty($item)){ ?>checked<?php } ?> /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='data[type]' title="webview外链" lay-filter="linktype" value=0 <?php if( $item['type']==0 && !empty($item) ){ ?>checked<?php } ?> /> 
						</label>
						
						<label class='radio-inline'>
							<input type='radio' name='data[type]' title="外部小程序链接" lay-filter="linktype" value=2 <?php if( $item['type']==2 && !empty($item) ){ ?>checked<?php } ?> /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='data[type]' title="首页分类" lay-filter="linktype" value=3 <?php if( $item['type']==3 && !empty($item) ){ ?>checked<?php } ?> /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='data[type]' title="独立分类页" lay-filter="linktype" value=4 <?php if( $item['type']==4 && !empty($item) ){ ?>checked<?php } ?> /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='data[type]' title="客服" lay-filter="linktype" value=5 <?php if( $item['type']==5 && !empty($item) ){ ?>checked<?php } ?> /> 
						</label>
						<label class='radio-inline'>
							<input type='radio' name='data[type]' title="优惠券" lay-filter="linktype" value=6 <?php if( $item['type']==6 && !empty($item) ){ ?>checked<?php } ?> /> 
						</label>
					</div>
				</div>
				<div class="layui-form-item" style="<?php if( $item['type']!=2 ){ ?>display: none;<?php } ?>" id="typeGroup">
				
					<label class="layui-form-label">外链小程序appid</label>
					<div class="layui-input-block ">
						<input type="text" id='appid' name="data[appid]" class="form-control" value="<?php echo ($item['appid']); ?>" maxlength="32"/>
					</div>
				</div>
				<div class="layui-form-item" style="<?php if( $item['type']==3 || $item['type']==4 || $item['type']==5 || $item['type']==6){ ?>display: none;<?php } ?>" id="typeUrl">
					<label class="layui-form-label must">链接</label>
					<div class="layui-input-block">
						<div class="input-group" style="margin: 0;">
							<input type="text" value="<?php echo ($item['link']); ?>" class="form-control valid" name="data[link]" placeholder="" id="advlink">
							<span class="input-group-btn">
								<span data-input="#advlink" id="chose_link" data-toggle="selectUrl" class="btn btn-default">选择链接</span>
							</span>
						</div>
					</div>
				</div>
				<div class="layui-form-item" style="<?php if( $item['type']!=3 && $item['type']!=4 ){ ?>display: none;<?php } ?>" id="typeCid">
					<label class="layui-form-label must">分类</label>
					<div class="layui-input-block">
						<select id="cates" name='data[cid]' class="form-control select2">
							
							<?php foreach($category as $c){ ?>
							<option value="<?php echo ($c['id']); ?>" <?php if($c['id']==$item['link']){ ?>selected<?php } ?> ><?php echo ($c['name']); ?></option>
							
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="layui-form-item" id="couponId" style="<?php if( $item['type']!=6 ){ ?>display: none;<?php } ?>">
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
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<!-- <a class="btn btn-default" style='margin-left:10px;' href="<?php echo U('configindex/navigat',array('ok'=>'1'));?>">返回列表</a>-->
						
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
		} else {
			$('#typeGroup').hide();
		}
		if(data.value == 3 || data.value == 4){
			$('#typeUrl').hide();
			$('#typeCid').show();
			$('#couponId').hide();
		} else if(data.value == 5){
			$('#typeUrl').hide();
			$('#typeCid').hide();
			$('#couponId').hide();
		} else if(data.value == 6){
			$('#typeUrl').hide();
			$('#typeCid').hide();
			$('#couponId').show();
		} else {
			$('#typeUrl').show();
			$('#typeCid').hide();
			$('#couponId').hide();
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
						var backurl = "<?php echo U('Configindex/navigat',array('ok'=>'1'));?>";
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