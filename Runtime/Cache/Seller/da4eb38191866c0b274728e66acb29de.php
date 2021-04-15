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
   
<script type="text/javascript" src="/static/js/dist/area/cascade.js"></script>
<script type="text/javascript" src="/static/js/dist/select2/select2.min.js"></script>

<link rel="stylesheet" href="/static/js/dist/select2/select2-bootstrap.css">
<link rel="stylesheet" href="/static/js/dist/select2/select2.css">


<script type="text/javascript" src="/web/resource/js/lib/moment.js"></script>
<link rel="stylesheet" href="/web/resource/components/datetimepicker/jquery.datetimepicker.css">
<link rel="stylesheet" href="/web/resource/components/daterangepicker/daterangepicker.css">
<style type='text/css'>
    .tabs-container .layui-form-item {overflow: hidden;}
    .tabs-container .tabs-left > .nav-tabs {}
    .tab-goods .nav li {float:left;}
    .spec_item_thumb {position: relative; width: 30px; height: 20px; padding: 0; border-left: none;}
    .spec_item_thumb i {position: absolute; top: -5px; right: -5px;}
	.input-group .spec_item_thumb{padding:0px;}
	
    .multi-img-details, .multi-audio-details {margin-top:.5em;max-width: 700px; padding:0; }
    .multi-audio-details .multi-audio-item {width:155px; height: 40px; position:relative; float: left; margin-right: 5px;}
	.region-goods-details {
		background: #f8f8f8;
		margin-bottom: 10px;
		padding: 0 10px;
	}
	.region-goods-left{
		text-align: center;
		font-weight: bold;
		color: #333;
		font-size: 14px;
		padding: 20px 0;
	}
	.region-goods-right{
		border-left: 3px solid #fff;
		padding: 10px 10px;
	}
	.input-group .input-group-btn .btn:hover{background-color:#5bc0de}
	.layui-form-select{display:none;}
	.daterangepicker select.ampmselect, .daterangepicker select.hourselect, .daterangepicker select.minuteselect {
		width: auto!important;
	}
.input-group .input-group-addon{}
.fa-arrows{display:none;}
.spec_item_thumb img{min-height:20px;}
.choose_room_title{position: absolute;top: 0px;left: -90px;font-size: 14px;}
</style>

</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text"><?php if( !empty($item['id'])){ ?>编辑<?php  }else{ ?>添加<?php } ?>商品 <small><?php if( !empty($item['id'])){ ?>修改【<span class="text-info"><?php echo ($item['goodsname']); ?></span>】<?php } ?></small></span></div>
		<div class="layui-card-body" style="padding:15px;">
			<form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >
	
				<input type="hidden" name="goods_id" id="goods_id" value="<?php echo ($id); ?>"/>
				<input type="hidden" name="head_id_arr" id="head_id_arr" value="<?php echo ($head_id_arr); ?>"/>

				<div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
				  <ul class="layui-tab-title">
					<li  <?php if( empty($_GPC['tab']) || $_GPC['tab']=='basic'){ ?>class="layui-this"<?php } ?>>基本信息</li>
					<li  <?php if( $_GPC['tab']=='option'){ ?>class="layui-this"<?php } ?> >规格库存</li>
					<li <?php if( $_GPC['tab']=='des'){ ?>class="layui-this"<?php } ?> >商品详情</li>
					
					<?php $commiss_level = D('Home/Front')->get_config_by_name('commiss_level'); ?>
					
					<li <?php if( $_GPC['tab']=='community_head_level'){ ?>class="layui-this"<?php } ?> >等级/分销</li>
					
					<?php if( !empty($is_open_goods_relative_goods) && $is_open_goods_relative_goods == 1 ){ ?>
					<li <?php if( $_GPC['tab']=='goods_relative_goods'){ ?>class="layui-this"<?php } ?> >推荐商品</li>
					<?php } ?>
					<?php if (!defined('ROLE')) { ?>
					<?php if($isopen_localtown_delivery == 1){ ?>
					<li <?php if( $_GPC['tab']=='goods_distribution'){ ?>class="layui-this"<?php } ?> >同城配送</li>
					<?php $open_goods_distribution = 1 ?>
					<?php } ?>
					  <?php } ?>

					  <?php if (defined('ROLE') && ROLE == 'agenter' ){ ?>
							<?php if($isopen_localtown_delivery == 1 && $supply_is_open_localtown_distribution == 1){ ?>
							 <li <?php if( $_GPC['tab']=='goods_distribution'){ ?>class="layui-this"<?php } ?> >同城配送</li>
							 <?php $open_goods_distribution = 1 ?>
					  		<?php }?>
					  <?php }?>
					  <li <?php if( $_GPC['tab']=='hexiao'){ ?>class="layui-this"<?php } ?> >到店核销</li>
				  </ul>
				  <div class="layui-tab-content" >
					
					<div class="layui-tab-item   <?php if( empty($_GPC['tab']) || $_GPC['tab']=='basic'){ ?>layui-show<?php } ?>" >
						<!---- 基本信息begin --->
						<div class="region-goods-details layui-row">
							
							<div class="layui-form-item">
								<div class="layui-form-item" style="padding-top:10px;">
									<label class="layui-form-label must">商品名称<label style="color:red;font-size:16px;font-weight:900">*</label></label>
								  
									<div class="layui-input-block"  style="padding-right:0;" >
										<input type="text" name="goodsname" id="goodsname" class="form-control" value="<?php echo ($item['goodsname']); ?>" data-rule-required="true" />
									</div>
									
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">商品分类</label>
									<div class="layui-input-block">
										<select id="cates"  multiple="multiple"  name='cates[]'  class="form-control select2"  >
											<?php foreach( $category as $c ){ ?>
											<option value="<?php echo ($c['id']); ?>" <?php if( is_array($item['cates']) && in_array($c['id'],$item['cates'])){ ?>selected<?php } ?> ><?php echo ($c['name']); ?></option>
											<?php } ?>
										</select>
										
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">商品简介</label>
									<div class="layui-input-block">
										<textarea  name="subtitle" id="subtitle" rows="5"  class="form-control" data-parent=".subtitle" maxlength="100" data-rule-maxlength="100"><?php echo ($item['subtitle']); ?></textarea>
										<div class="layui-form-mid layui-word-aux">商品名称下方的副标题，标题长度请控制在100字以内</div>
									</div>
								</div>

								
								
								<div class="layui-form-item">
								   <label class="layui-form-label">默认商品预达简介</label>
									<div class="layui-input-block ">
										<input type="checkbox" lay-skin="primary" name="is_show_arrive" class="form-control valid" <?php if( empty($item) || $item['is_show_arrive'] ==1 || !isset($item['is_show_arrive']) ){ ?>checked<?php } ?> value="1" title="展示预达时间" />
										<br/>
										<div class="layui-form-mid layui-word-aux">“商品预达简介”为商品名称下方的“预计送达时间”。例如："现在下单 预计（12点前下单，预计当天送达）可自提" 默认开启，关闭后不进行显示。</div>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">商品自定义预达简介</label>
									<div class="layui-input-block">
										<label class="radio-inline"><input type="radio" name="diy_arrive_switch" value="0" <?php if( !isset($item['diy_arrive_switch']) || $item['diy_arrive_switch'] == 0 ){ ?>checked="true"<?php } ?> title="关闭" /> </label>
										<label class="radio-inline"><input type="radio" name="diy_arrive_switch" value="1" <?php if( isset($item['diy_arrive_switch']) && $item['diy_arrive_switch'] == 1 ){ ?>checked="true"<?php } ?> title="开启" /> </label>
										<div class="layui-form-mid layui-word-aux">“商品自定义预达简介”为商品名称下方“预计送达时间”，配合“商品预达简介”使用默认关闭状态，在“商品预达简介”描述不精确的情况下建议使用此项，如果使用此项建议关闭“商品预达简介”。</div>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label"></label>
									<div class="layui-input-block">
										<textarea  name="diy_arrive_details" id="diy_arrive_details" rows="3"  class="form-control" maxlength="35" data-rule-maxlength="35"><?php echo ($item['diy_arrive_details']); ?></textarea>
										<div class="layui-form-mid layui-word-aux">文字的长度请控制在35字以内</div>
									</div>
								</div>

								
								<div class="layui-form-item">
									<label class="layui-form-label">商品简短标题</label>
									<div class="layui-input-block">
										<input type="text" name="print_sub_title" id="print_sub_title" class="form-control" value="<?php echo ($item['print_sub_title']); ?>" />
										<div class="layui-form-mid layui-word-aux">小票打印机使用，请控制字数，未填写默认截取商品标题(无须打印的可以不填写)</div>
									</div>
								</div>
								
								<div class="layui-form-item">
									<label class="layui-form-label must">商品视频</label>
									<div class="layui-input-block gimgs">
											<?php echo tpl_form_field_video('video',$item['video'] );;?>
										<span class="layui-form-mid layui-word-aux image-block">
											请输入视频链接地址或者选择上传视频(支持抖音视频地址)
										</span>
									</div>
								</div>
								
								<div class="layui-form-item">
									<label class="layui-form-label must">首页商品（大图）</label>
									<div class="layui-input-block gimgs">
										<?php echo tpl_form_field_image2('big_img',$item['big_img']);?>
										<span class="layui-form-mid layui-word-aux image-block">此图为首页商品大图模式封面图，最佳尺寸:710*400</span>
									</div>
								</div>
							
								<div class="layui-form-item">
									<label class="layui-form-label must">商品图片<label style="color:red;font-size:16px;font-weight:900">*</label></label>
									<div class="layui-input-block gimgs" id="gimgs_mult">
										<?php echo tpl_form_field_multi_image3('thumbs',$item['piclist']);?>
										
										<span class="layui-form-mid layui-word-aux image-block">商品详情页主图（轮播图），第一张为商品列表调用图，<span style="color: red;">图片类型必须为jpg或者png24，不支持png8</span>，建议为正方型，尺寸建议宽度为640，并保持图片大小一致，可拖拽改变图片顺序</span>
										
									</div>
								</div>
								
								
								<div class="layui-form-item">
									<label class="layui-form-label">分享标题</label>
									<div class="layui-input-block">
										<input type="text" name="share_title" class="form-control" value="<?php echo ($item['share_title']); ?>" />
										<div class="layui-form-mid layui-word-aux"></div>
									</div>
								</div>
								
								<div class="layui-form-item">
									<label class="layui-form-label ">分享图片</label>
									<div class="layui-input-block gimgs">
										<?php echo tpl_form_field_image2('goods_share_image',$item['goods_share_image']);?>
										<span class="layui-form-mid layui-word-aux image-block">此图为商品详情页分享图片（比例为长宽比5:4）</span>
									</div>
								</div>

								<div class="layui-form-item">
									<label class="layui-form-label">起售数量</label>
									<div class="layui-input-block">
										<div style="float: left;height: 35px;line-height:35px">商品至少&nbsp;&nbsp;</div>
										<input style="width: 35px; height: 35px; border: 2px white; float: left;" type="button" value="-" onclick="reduction(this)"/>
										<input type="text" name="goods_start_count" class="layui-input goods_start_count" value="<?php if( isset($item['goods_start_count']) && !empty($item['goods_start_count'])){echo $item['goods_start_count'];}else{echo '1';} ?>" maxlength="10" style="width: 100px;float: left;" onchange="validationNumber(this, 0)"/>
										<input style="width: 35px; height: 35px; border: 2px white;float: left;" type="button" value="+" onclick="add(this)"/>
										<div style="float: left;height: 35px;line-height:35px">&nbsp;&nbsp;件起售</div>
										<br/>
										<div style="clear:both;"></div>
										<span class="layui-form-mid layui-word-aux image-block">起售数量超出商品库存时，买家无法购买该商品</span>
									</div>
								</div>

								<?php if($is_updown){ ?>
								<div class="layui-form-item">
									<label class="layui-form-label">商品状态</label>
									<div class="layui-input-block">
										<label class="radio-inline"><input type="radio" name="grounding" value="1" <?php if( !isset($item['grounding']) || $item['grounding'] == 1){ ?>checked="true"<?php } ?> title="上架" /> </label>
										<label class="radio-inline"><input type="radio" name="grounding" value="0" <?php if( isset($item['grounding']) && $item['grounding'] == 0){ ?>checked="true"<?php } ?> title="下架" /> </label>
									</div>
								</div>
								<?php } ?>
								<?php if($is_index){ ?>
								<div class="layui-form-item">
									<label class="layui-form-label">首页推荐</label>
									<div class="layui-input-block">
										<label class="radio-inline"><input type="radio" name="is_index_show" value="1" <?php if( !isset($item['is_index_show']) || $item['is_index_show'] == 1){ ?>checked="true"<?php } ?> title="是" /> </label>
										<label class="radio-inline"><input type="radio" name="is_index_show" value="0" <?php if( isset($item['is_index_show']) && $item['is_index_show'] == 0){ ?>checked="true"<?php } ?> title="否" /> </label>
									</div>
								</div>
								<?php } ?>
								<div class="layui-form-item" style="display:none;">
									<label class="layui-form-label">分享描述</label>
									<div class="layui-input-block">
										<input type="text" name="share_description" class="form-control" value="<?php echo ($item['share_description']); ?>" />
										<div class="layui-form-mid layui-word-aux">公众号才有的，小程序没有这个描述</div>
									</div>
								</div>
								<div class="layui-form-item price" >
									<label class="layui-form-label">售价<label style="color:red;font-size:16px;font-weight:900">*</label></label>
									<div class="layui-input-block">

										<div class="input-group">
											<input type="text" name="price" id="price" class="form-control" value="<?php echo ($item['price']); ?>" <?php if($item['hasoption']!=1){ ?> <?php } ?> />
											<span class="input-group-addon">元&nbsp;</span>
											<span class="input-group-addon">原价（市场价、划线价）</span>
											<input type="text" name="productprice" id="productprice" class="form-control"  value="<?php echo ($item['productprice']); ?>"   />
											<span class="input-group-addon">元&nbsp;</span>
											<span class="input-group-addon"> 成本价</span>
											<input type="text" name="costprice" id="costpriceprice" class="form-control" value="<?php echo ($item['costprice']); ?>"  placeholder=""/>
											<span class="input-group-addon">元&nbsp;</span>
										</div>
										<span class='layui-form-mid layui-word-aux' style="display:none;">如未启用商品规格，请填写商品价格</span>
										
									</div>
								</div>
								<?php if( !empty($is_open_vipcard_buy) && $is_open_vipcard_buy == 1 ){ ?>
								<div class="layui-form-item" >
									<label class="layui-form-label">付费会员专享价</label>
									<div class="col-sm-10 col-xs-12" style="width: 600px;">
										<div class="radio-inline">
											<input type="checkbox"  lay-skin="primary" lay-filter="is_take_vipcard" name="is_take_vipcard" <?php if( isset($item['is_take_vipcard']) && $item['is_take_vipcard'] ==1 ){ ?> checked <?php } ?> value="1" />
											<div class="input-group card_price_txt" style="width:500px;float: right; <?php if( isset($item['is_take_vipcard']) && $item['is_take_vipcard'] ==1 ){ }else{?>display: none;<?php } ?>">
												<span class="input-group-addon">商品付费会员价</span>
												<input type="text" name="card_price" id="card_price" style="width: 360px;" class="form-control" value="<?php echo ($item['card_price']); ?>" placeholder="请填写会员价"/>
												<span class="input-group-addon" style="width: auto;">元&nbsp;</span>
											</div>
											<div style="clear:both;"></div>
											<span class="layui-form-mid layui-word-aux">开启后，付费会员下单享专属价格</span>
										</div>
									</div>
								</div>
								<?php } ?>
								
								<?php if($is_vir_count){ ?>
								<div class="layui-form-item" >
									<label class="layui-form-label">已出售数</label>
									<div class="layui-input-block">
										<div class="input-group">
											<input type="text" name="sales" id="sales" class="form-control" value="<?php echo ($item['sales']); ?>" />
											<span class="input-group-addon">备注：前台销量=虚拟销量+实际销量</span>
										</div>
									</div>
								</div>
								<?php } ?>
								<div class="layui-form-item" >
									<label class="layui-form-label">提货时间</label>
									<div class="col-sm-10 col-xs-12" id="radPickupDateTip"> 
										<?php $item['pick_up_type'] = isset($item['pick_up_type']) ? $item['pick_up_type'] : 1; ?>
										<label class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( !isset($item['pick_up_type']) || $item['pick_up_type'] ==0 ){ ?> checked <?php } ?> value="0" title="当日达" /><span class="fake-radio"></span></label>
										<label  class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( isset($item['pick_up_type']) && $item['pick_up_type'] ==1 ){ ?> checked <?php } ?> value="1" title="次日达" /><span class="fake-radio"></span></label>
										<label  class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( isset($item['pick_up_type']) && $item['pick_up_type'] ==2 ){ ?> checked <?php } ?> value="2" title="隔日达" /><span class="fake-radio"></span></label>
										<label  class="radio-inline"><input type="radio"  name="pick_up_type" <?php if( isset($item['pick_up_type']) && $item['pick_up_type'] ==3 ){ ?> checked <?php } ?> value="3" title="自定义" /><span class="fake-radio"></span></label>
										
										<input class="form-control " id="txtPickupDateTip" name="pick_up_modify" style="vertical-align: sub; <?php if( isset($item['pick_up_type']) && $item['pick_up_type'] ==3){ ?>display:inline-block;<?php  }else{ ?>display: none;<?php } ?>width: 120px;" type="text" value="<?php echo ($item['pick_up_modify']); ?>">
										
									  
										<div style="clear:both;"></div>
										<span class="layui-form-mid layui-word-aux">系统会根据当前日期自动生成具体提货时间，或直接显示自定义内容</span>
									</div>
								</div>
								
								<div class="layui-form-item" style="display:none;">
									<label class="layui-form-label"></label>
									<div class="layui-input-block">
										<label class="checkbox-inline"><input type="checkbox" name="showsales" value="1" <?php if( $item['showsales'] == 1){ ?>checked="true"<?php } ?>   /> 显示销量</label>
										<span class="layui-form-mid layui-word-aux"></span>
									</div>
								</div>
								<div class="layui-form-item" style="display:none;">
									<label class="layui-form-label">标签</label>
									<div class="layui-input-block">
										<label class="checkbox-inline"><input type="checkbox" name="quality" value="1" <?php if( !empty($item['quality'])){ ?>checked="true"<?php } ?>   /> 正品保证</label>
										<label class="checkbox-inline"><input type="checkbox" name="seven" value="1" <?php if( !empty($item['seven'])){ ?>checked="true"<?php } ?>   /> 7天无理由退换</label>
										<label class="checkbox-inline"><input type="checkbox" name="repair" value="1" <?php if( !empty($item['repair'])){ ?>checked="true"<?php } ?>   /> 保修</label>
									</div>
								</div>
								
								
								<div class="layui-form-item">
									<label class="layui-form-label">自定义标签</label>
									
									<div class="layui-input-block">
										<div class="input-group " style="margin: 0;">
											<input type="text" disabled value="<?php echo ($item['label']['id']); ?>" class="form-control valid" name="labelname" placeholder="" id="label_id">
											<span class="input-group-btn">
												<span data-input="#label_id" id="chose_label_id"  class="btn btn-default">选择标签</span>
											</span>
										</div>
										<?php if( $item['label']){ ?>
										<div class="input-group " style="margin: 0;">
											<div class="layadmin-text-center choose_user">
												
												<div class="" style=""><?php echo ($item['label']['tagname']); ?></div>
												<button type="button" class="layui-btn layui-btn-sm" onclick="cancle_bind(this,'label_id')"><i class="layui-icon">&#xe640;</i></button>
											</div>
										</div>
										<?php } ?>
									</div>
								</div>
								<?php if($is_open_only_express == 1){ ?>
								<div class="layui-form-item" >
									<label class="layui-form-label">仅快递</label>
									<div class="col-sm-10 col-xs-12" > 
										<input type="checkbox"  lay-skin="primary" lay-filter="is_only_express" id="is_only_express"  name="is_only_express" <?php if(isset($item['is_only_express']) && $item['is_only_express'] ==1 ){ ?> checked <?php } ?> value="1" />
										<div style="clear:both;"></div>
										<span class="layui-form-mid layui-word-aux">勾选后该商品会在购物车中显示快递配送，所有仅快递的商品单独结算，订单提交页只有快递配送方式<br />
										<font color="red">勾选后,此商品为仅快递商品。会自动取消同城配送和到店核销的勾选</font>
										</span>

										<!--
										<span class="layui-form-mid layui-word-aux">开启仅快递后，该商品只会快递商品一起下单<br/>
											<font color="red">用户开启仅快递的时候，该商品只能快递配送。</font><br/>
											<font color="red">其他配送服务失效。</font><br/>
											<font color="red">购物车中，只能和快递商品一起结算。</font><br/>
										</span>-->
									</div>
									
								</div>
								<?php } ?>
								

								<div class="layui-form-item dispatch_info">
									<label class="layui-form-label">运费设置</label>
									<div class="layui-input-block" style='padding-left:0'>
										
										<div class="input-group">
											<span class='input-group-addon' style='border:none;padding:0px;'><label class="radio-inline" style='margin-top:-7px;' ><input type="radio" name="dispatchtype" value="0" <?php if( empty($item['dispatchtype'])){ ?>checked="true"<?php } ?> title="运费模板"  /> </label></span>
											<select class="form-control tpl-category-parent select2" id="dispatchid" name="dispatchid">
												
												<?php foreach( $dispatch_data as $dispatch_item ){ ?>
												<option value="<?php echo ($dispatch_item['id']); ?>" <?php if( $item['dispatchid'] == $dispatch_item['id']){ ?>selected="true"<?php } ?>><?php echo ($dispatch_item['name']); ?></option>
												<?php } ?>
											</select>
										</div>
										
									</div>
								</div>
								<div class="layui-form-item dispatch_info">
									<label class="layui-form-label"></label>
									<div class="layui-input-block" style='padding-left:0'>
										<div class="input-group">
											<span class='input-group-addon' style='border:none;padding:0px;'><label class="radio-inline"  style='margin-top:-7px;' >
											<input type="radio"name="dispatchtype" value="1" <?php if( $item['dispatchtype'] == 1){ ?>checked="true"<?php } ?> title="统一邮费"  /> </label></span>
											<input type="text" name="dispatchprice" id="dispatchprice" class="form-control" value="<?php echo ($item['dispatchprice']); ?>" />
											<span class="input-group-addon">元</span>
										</div>

									</div>
								</div>
								
								<?php  $is_show_fullre = true; if (defined('ROLE') && ROLE == 'agenter' ) { $supper_info = get_agent_logininfo(); if($supper_info['type'] == 1) { $is_show_fullre = false; } } ?>
								<?php if( $is_show_fullre && !empty($is_open_fullreduction) && $is_open_fullreduction == 1){ ?>
								
								<div class="layui-form-item" >
									<label class="layui-form-label">满减活动</label>
									<div class="col-sm-10 col-xs-12"> 
										<label class="radio-inline"><input type="radio"  name="is_take_fullreduction" <?php if( !isset($item['is_take_fullreduction']) || $item['is_take_fullreduction'] ==1 ){ ?> checked <?php } ?> value="1" title="参与" /><span class="fake-radio"></span></label>
										<label  class="radio-inline"><input type="radio"  name="is_take_fullreduction" <?php if( isset($item['is_take_fullreduction']) && $item['is_take_fullreduction'] ==0 ){ ?> checked <?php } ?> value="0" title="不参与" /><span class="fake-radio"></span></label>
										<div style="color:red;margin-left: 25px;">独立供应商不参与平台满减活动</div>
									</div>
								</div>
								<?php } ?>
								
								<?php if($open_buy_send_score == 1){ ?>
									<?php if($supply_can_goods_sendscore == 1){ ?>
									<div class="layui-form-item" >
										<label class="layui-form-label">下单送积分</label>
										<div class="col-sm-10 col-xs-12" id="send_score_div"> 
											
											<input type="checkbox" lay-filter="is_modify_sendscore" lay-skin="primary"  name="is_modify_sendscore" <?php if(isset($item['is_modify_sendscore']) && $item['is_modify_sendscore'] ==1){ ?> checked <?php } ?> value="1"  />
												
											<input class="form-control " id="send_score_divTip" name="send_socre" style="vertical-align: sub; <?php if(isset($item['is_modify_sendscore']) && $item['is_modify_sendscore'] ==1){ ?>display:inline;<?php }else{ ?>display: none;<?php } ?>width: 120px;" type="text" value="<?php echo ($item['send_socre']); ?>" >
											
											<div  id="send_score_divTip2" style=" display: inline; <?php if(isset($item['is_modify_sendscore']) && $item['is_modify_sendscore'] ==1){ ?>display:inline;<?php }else{ ?>display: none;<?php } ?>">积分</div>

											
											<div style="clear:both;"></div>
											<div style="color:#999">赠送数量 = 商品数量 * 下单送积分数量（未开启，则使用系统全局设置）</div>
											<div style="color:#999">订单结算，才送积分。订单结算时间，请看订单——订单设置——售后期设置</div>
										</div>
									</div>
									<?php } ?>
								<?php } ?>
								
								<?php if($index_sort_method == 1){ ?>
								<div class="layui-form-item" >
									<label class="layui-form-label">首页排序</label>
									<div class="layui-input-block">
										<div class="input-group">
											<input type="text" name="index_sort" id="index_sort" class="form-control" value="<?php echo ($item['index_sort']); ?>" />
											<span class="input-group-addon">备注：排序越大显示越靠前</span>
										</div>
									</div>
								</div>
								<?php } ?>
								
							</div>
							
							
						</div>




						<div class="region-goods-details ">
							
							<div class="layui-form-item">
								<div class="layui-form-item">
									<label class="layui-form-label">团购时间</label>
									<div class="layui-input-block">
										<?php echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $item['begin_time']),'endtime'=>date('Y-m-d H:i', $item['end_time'])),true);;?>
									</div>
								</div>
								
							</div>
						</div>

						<div class="region-goods-details ">
							<div class="layui-form-item">
								<div class="layui-form-item">
									<label class="layui-form-label">每天限购</label>
									<div class="layui-input-block">
										<input type="text" name="oneday_limit_count" class="form-control " value="<?php echo ($item['oneday_limit_count']); ?>" />

										<div class="layui-form-mid layui-word-aux">用户每天提交订单最多可购买数，默认为0表示不限制</div>
									</div>
								</div>

							</div>
						</div>

						<div class="region-goods-details ">
							<div class="layui-form-item">

								<div class="layui-form-item">
									<label class="layui-form-label">单次限购</label>
									<div class="layui-input-block">
										
										<input type="text" name="one_limit_count" class="form-control " value="<?php echo ($item['one_limit_count']); ?>" />
										
										<div class="layui-form-mid layui-word-aux">用户单次提交订单最多可购买数，默认为0表示不限制</div>
									</div>
								</div>
								<div class="layui-form-item">
									<label class="layui-form-label">历史限购</label>
									<div class="layui-input-block">
										
										<input type="text" name="total_limit_count" class="form-control" value="<?php echo ($item['total_limit_count']); ?>" />
										
										<div class="layui-form-mid layui-word-aux">用户历史累积最多可购买数，默认为0表示不限制</div>
									</div>
								</div>
							</div>
						</div>
						<div class="region-goods-details ">

							<div class="region-goods-right col-sm-10">
							
								<?php if( empty($community_head_level) || count($community_head_level) ==1 || $is_head_takegoods ==0 ){ ?>
								
								<div class="layui-form-item">
								<label class="layui-form-label"></label>
										<div class="layui-col-sm-10 ">
											<input type="checkbox" id="is_community_head_commission" lay-skin="primary" value="1" name="is_community_head_commission" lay-filter="is_community_head_commission" <?php if( $item['is_community_head_commission']==1){ ?>checked<?php } ?> title="商品启用独立团长提成" />
											<br />
											<div class="layui-form-mid layui-word-aux" style="margin-left: 155px;" >勾选使用 商品独立团长提成 计算佣金，不勾选则使用 后台——“团长设置”中团长提成比例 计算佣金</div>	
										</div>
										
								</div>
								<div id="head_commission_div2" <?php if( empty($item['is_community_head_commission'])){ ?>style="display:none"<?php } ?> >
								
									<div class="layui-form-item">

									   <label class="layui-form-label">商品独立团长提成</label>

									   <?php if( !empty($community_money_type) && $community_money_type ==1 ){ ?>
										<div class="layui-col-sm-10 ">
											<div class="input-group">
												<input type="text" name="community_head_commission" id="community_head_commission" class="form-control valid" value="<?php if(empty($item)){ echo ($communityhead_commission); }else{ echo ($item['community_head_commission']); } ?>" />
												<span class="input-group-addon">元 </span>
											</div>
											<div class="layui-form-mid layui-word-aux">预计团长可得佣金¥<font ><?php if(isset($item['community_head_commission'])){ echo round( $item['community_head_commission'] ,2) ; }else{ ?>0.00<?php } ?></font></div>	
										</div>
										<?php }else{ ?>
										<div class="layui-col-sm-10 ">
											<div class="input-group">
												<input type="text" name="community_head_commission" id="community_head_commission" class="form-control valid" value="<?php if( empty($item)){ echo ($communityhead_commission); }else{ echo ($item['community_head_commission']); } ?>" />
												<span class="input-group-addon">% </span>
											</div>
											<div class="layui-form-mid layui-word-aux">预计团长可得佣金¥<font id="precommiss_head_money_tip"><?php if( isset($item['community_head_commission'])){ echo round( ($item['community_head_commission']*$item['price'])/100 ,2); }else{ ?>0.00<?php } ?></font>，将根据商品最终的成交价格来计算佣金</div>	
										</div>
										<?php } ?>
										
										
									</div>
								</div>
								
								<?php } ?>
								<!--<div class="layui-form-item">
								   <label class="layui-form-label">所有团长可销售</label>
									<div class="layui-input-block ">
										<input type="checkbox" lay-skin="primary" name="is_all_sale" class="form-control valid" <?php if( empty($item) || $item['is_all_sale'] ==1 || !isset($item['is_all_sale'])){ ?>checked<?php } ?> value="1" />
											
									</div>
								</div>-->
								<?php if($supply_can_distribution_sale == 1){ ?>
								<div class="layui-form-item">
									<label class="layui-form-label">售卖团长</label>
									<div class="layui-input-block">
										<label class="radio-inline"><input type="radio" class="radio_sale" name="is_all_sale" value="1" <?php if( !isset($item['is_all_sale']) || $item['is_all_sale'] == 1){ ?>checked="true"<?php } ?> title="所有团长可售" /> </label>
										<label class="radio-inline"><input type="radio" class="radio_sale" name="is_all_sale" value="0" <?php if( isset($item['is_all_sale']) && $item['is_all_sale'] == 0){ ?>checked="true"<?php } ?> title="部分团长可售" /> </label>
									</div>
									<div class="layui-form-mid layui-word-aux" style="margin-left:15px;">选择所有团长可售，部分团长可售失效</div>
								</div>
								<?php } ?>
								
								<?php if($is_newbuy){ ?>
								<div class="layui-form-item">
								   <label class="layui-form-label">新人专享</label>
									<div class="layui-input-block ">
										<input type="checkbox" id="xinrenckbox" lay-filter="xinrenckbox" lay-skin="primary" name="is_new_buy" class="form-control valid" <?php if( !empty($item) && $item['is_new_buy'] ==1 ){ ?>checked<?php } ?> value="1" />
									</div>
									<div class="layui-form-mid layui-word-aux" style="margin-left:15px;">未付款过的用户。勾选后，只在首页新人专区显示</div>
								</div>
								<?php } ?>
								
								
								<?php if( $seckill_is_open == 1 ){ ?>
								<div class="layui-form-item">
								   <label class="layui-form-label">整点秒杀</label>
									<div class="layui-input-block ">
										<input type="checkbox" id="is_seckill" lay-filter="is_seckill" lay-skin="primary" name="is_seckill" class="form-control valid" <?php if( !empty($item) && $item['is_seckill'] ==1 ){ ?>checked<?php } ?> value="1" />
									</div>
									<div class="layui-form-mid layui-word-aux" style="margin-left:15px;">
									勾选后，商品团购时间设置整点，后台——营销——整点秒杀勾选这个整点，系统会自动调用显示到“整点秒杀”方块以及该页面中。该整点开始前设置好这些，才会调用
									</div>
								</div>
								<?php } ?>
								
								
								
								<?php if($is_goodsspike){ ?>
								<div class="layui-form-item">
								   <label class="layui-form-label">限时秒杀</label>
									<div class="layui-input-block ">
										<input type="checkbox" id="xianshickbox" lay-filter="xianshickbox" lay-skin="primary" name="is_spike_buy" class="form-control valid" <?php if(!empty($item) && $item['is_spike_buy'] ==1){ ?>checked<?php } ?> value="1" />
									</div>
									<div class="layui-form-mid layui-word-aux" style="margin-left:15px;">
										勾选后，只在首页限时秒杀显示
									</div>
								</div>
								<?php } ?>
								
								
								<div class="layui-form-item">
								   <label class="layui-form-label">限制普通会员下单</label>
									<div class="layui-input-block ">
										<input type="checkbox"  lay-skin="primary" name="is_limit_levelunbuy" class="form-control valid" <?php if( !empty($item) && $item['is_limit_levelunbuy'] ==1 ){ ?>checked<?php } ?> value="1" />
									</div>
									<div class="layui-form-mid layui-word-aux" style="margin-left:15px;">
										勾选后，默认等级会员不能购买此商品
									</div>
								</div>
								
								<div class="layui-form-item">
								   <label class="layui-form-label">付费会员专享</label>
									<div class="layui-input-block ">
										<input type="checkbox"  lay-skin="primary" name="is_limit_vipmember_buy" class="form-control valid" <?php if( !empty($item) && $item['is_limit_vipmember_buy'] ==1 ){ ?>checked<?php } ?> value="1" />
									</div>
									<div class="layui-form-mid layui-word-aux" style="margin-left:15px;">
										勾选后，非vip会员不能购买此商品
									</div>
								</div>
								
							</div>
						</div>

						<?php if( !defined('ROLE') ){ ?>		
						<div class="region-goods-details ">
							
							<div class="layui-form-item">
							   <label class="layui-form-label">选择供应商</label>
							   
								<div class="layui-input-block">
									<div class="input-group " style="margin: 0;">
										<input type="text" disabled value="<?php echo ($item['supply_id']); ?>" class="form-control valid" name="supply_id" placeholder="" id="member_id">
										<span class="input-group-btn">
											<span data-input="#member_id" id="chose_member_id"  class="btn btn-default">选择供应商</span>
										</span>
									</div>
									<?php if( $item['supply_info']){ ?>
									<div class="input-group " style="margin: 0;">
										<div class="layadmin-text-center choose_user">
											<img style="" src="<?php echo tomedia($item['supply_info']['logo']);?>">
											<div class="layadmin-maillist-img" style=""><?php echo ($item['supply_info']['shopname']); ?></div>
											<button type="button" class="layui-btn layui-btn-sm" onclick="cancle_bind(this,'member_id')"><i class="layui-icon">&#xe640;</i></button>
										</div>
									</div>
									<?php } ?>
								</div>
					
								
							</div>
								
							
						</div>	    
						<?php } ?>    
						<script language="javascript">
							function validationNumber(e, num) {
								var regu = /^[\-0-9]+\.?[0-9]*$/;
								if (e.value != "") {
									if (!regu.test(e.value)) {
										e.value = 1;
										e.focus();
									} else {
										if (num == 0) {
											if (e.value.indexOf('.') > -1) {
												e.value = e.value.substring(0, e.value.length - e.value.split('.')[1].length - 1);
												e.focus();
											}
										}
										if (e.value.indexOf('.') > -1) {
											if (e.value.split('.')[1].length > num) {
												e.value = e.value.substring(0, e.value.length - e.value.split('.')[1].length - 1);
												e.focus();
											}
										}
										if(parseFloat(e.value) < 1){
											e.value = 1;
											e.focus();
										}
									}
								}
							}

							function reduction(obj){
								var goods_start_count = $.trim($('.goods_start_count').val());
								if(goods_start_count == ''){
									$('.goods_start_count').val(1);
								}else{
									var count = parseInt(goods_start_count)-1;
									if(count < 1){
										$('.goods_start_count').val(1);
									}else{
										$('.goods_start_count').val(count);
									}
								}
							}

							function add(obj){
								var goods_start_count = $.trim($('.goods_start_count').val());
								if(goods_start_count == ''){
									$('.goods_start_count').val(1);
								}else{
									var count = parseInt(goods_start_count)+1;
									$('.goods_start_count').val(count);
								}
							}

							$(function () {

								$('#price').blur(function(){
									var price = parseFloat( $("#price").val() );

									  var community_head_commission = parseFloat( $("#community_head_commission").val() );
									  if(price > 0 && community_head_commission >0)
									  {
											$('#precommiss_head_money_tip').html( ( (price * community_head_commission) /100 ).toFixed(2) );
									  }else{
										$('#precommiss_head_money_tip').html('0.00');
									  }
								})
								
								$("#community_head_commission").blur(function(){
								  var price = parseFloat( $("#price").val() );

								  var community_head_commission = parseFloat( $(this).val() );
								  if(price > 0 && community_head_commission >0)
								  {
										$('#precommiss_head_money_tip').html( ( (price * community_head_commission) /100 ).toFixed(2) );
								  }else{
									$('#precommiss_head_money_tip').html('0.00');
								  }
								  
								});
								
								$('#radPickupDateTip input[type=radio]').click(function(){
									var s_val = $(this).val();
									if(s_val == 3)
									{
										$('#txtPickupDateTip').css('display','inline-block');
									}else{
										$('#txtPickupDateTip').css('display', 'none');
									}
								 })
								$("input[name=isstatustime]").off('click').on('click',function () {
									if($(this).val()==1){
										$("#shelves").show()
									}else{
										$("#shelves").hide();
									}
								})
							})
						</script>
						<!--- 基本信息 end -->
					</div>
					<div class="layui-tab-item  <?php if( $_GPC['tab']=='option'){ ?>layui-show<?php } ?>" >
						<!--规格begin-->
						
						<div class="region-goods-details ">
							<div class="region-goods-left col-sm-2">规格库存</div>
							<div class="region-goods-right col-sm-10">
								<div class="layui-form-item">
									<label class="layui-form-label">商品编码</label>
									<div class="layui-input-block">
										<input type="text" name="codes" class="form-control" value="<?php echo ($item['codes']); ?>" />
										<div class="help-block">商品编码 用部分商家用于统计</div>
									</div>
								</div>
								
								<div class="layui-form-item">
									<label class="layui-form-label">重量</label>
									<div class="layui-input-block">
										<div class="input-group fixsingle-input-group">
											<input type="text" name="weight" id="weight" <?php if( $item['hasoption']){ ?>readonly<?php } ?> class="form-control hasoption" value="<?php echo ($item['weight']); ?>"/>
											<span class="input-group-addon">克</span>
										</div>
									</div>
								</div>

								<div class="layui-form-item">
									<label class="layui-form-label">库存<label style="color:red;font-size:16px;font-weight:900">*</label></label>
									<div class="layui-input-block">
										<input type="text" name="total" id="total" class="form-control hasoption" lay-verify="" value="<?php echo ($item['total']); ?>"  style="width:150px;display: inline;margin-right: 20px;" <?php if( $item['hasoption']){ ?>readonly<?php } ?>/>
										<span class="help-block">商品的剩余数量, 如启用多规格，则此处设置无效.</span>
									</div>
								</div>

								
							</div>

						</div>




						<div class="region-goods-details ">
							<div class="region-goods-left  col-sm-2">
								规格
							</div>
							<div class="region-goods-right  col-sm-10">
								<div class="layui-form-item">
									<div class="layui-row" style=''>
									
										
										
											<input type="checkbox" lay-skin="primary" title="启用商品规格" lay-filter="hasoption" value="1" id="hasoption" name="hasoption" <?php if( $item['hasoption']==1){ ?>checked<?php } ?> />
									
										<span class="help-block">启用商品规格后，商品的价格及库存以商品规格为准,库存设置为0则会到”已售罄“中，手机也不会显示</span>

										
									</div>
								</div>

								<div id='tboption' style="padding-left:15px;<?php if( $item['hasoption']!=1){ ?>display:none<?php } ?>" >
									<div class="alert alert-info" style="display:none;">
										1. 拖动规格可调整规格显示顺序, 更改规格及规格项后请点击下方的【刷新规格项目表】来更新数据。<br/>
										2. 每一种规格代表不同型号，例如颜色为一种规格，尺寸为一种规格，如果设置多规格，手机用户必须每一种规格都选择一个规格项，才能添加购物车或购买。
									</div>
									<div id='specs'>
										<?php foreach( $item['allspecs'] as $spec ){ ?>
										<!--spec-->
										 <div class='spec_item spec_class_<?php echo ($cur_cate_id); ?>' id="spec_<?php echo ($spec['id']); ?>" >
											 <div style='border:1px solid #e7eaec;padding:10px;margin-bottom: 10px;' >
												<input name="spec_id[]" type="hidden" class="form-control spec_id" value="<?php echo ($spec['id']); ?>"/>
												<div class="form-group">
													<div class="col-sm-12">
														<div class='input-group'>
															<input name="spec_title[<?php echo ($spec['id']); ?>]" type="text" class="form-control  spec_title" value="<?php echo ($spec['title']); ?>" placeholder="规格名称 (比如: 颜色)"/>
															<div class='input-group-btn'>
																<a href="javascript:;" id="add-specitem-<?php echo ($spec['id']); ?>" specid='<?php echo ($spec['id']); ?>' class='btn btn-info add-specitem' onclick="addSpecItem('<?php echo ($spec['id']); ?>')"><i class="fa fa-plus"></i> 添加规格项</a>
																<a href="javascript:void(0);" class='btn btn-danger' onclick="removeSpec('<?php echo ($spec['id']); ?>')"><i class="fa fa-remove"></i></a>
															</div>
														</div>
													</div>
												</div>
												<div class="form-group">
													<div class="col-md-12">
														<div id='spec_item_<?php echo ($spec['id']); ?>' class='spec_item_items'>
														<?php foreach( $spec['items'] as $specitem ){ ?>
															 <!--spec_item begin-->
															<div class="spec_item_item" style="float:left;margin:5px;width:250px; position: relative">
																<input type="hidden" class="form-control spec_item_show" name="spec_item_show_<?php echo ($spec['id']); ?>[]" value="<?php echo ($specitem['show']); ?>" />
																<input type="hidden" class="form-control spec_item_id" name="spec_item_id_<?php echo ($spec['id']); ?>[]" value="<?php echo ($specitem['id']); ?>" />
																
																<div class="input-group">
																	<span class="input-group-addon">
																		<input type="checkbox" lay-skin="primary" <?php if( $specitem['id']>0){ ?>checked<?php } ?> value="1" onclick='showItem(this)'>
																	</span>
																	<input type="text" class="form-control spec_item_title" onblur="refreshOptions()" name="spec_item_title_<?php echo ($spec['id']); ?>[]" VALUE="<?php echo ($specitem['title']); ?>" />
																	
																	<span class="input-group-addon spec_item_thumb <?php if( !empty($specitem['thumb'])){ ?>has_thumb<?php } ?>">
																				   <input type='hidden'  name="spec_item_thumb_<?php echo ($spec['id']); ?>[]" value="<?php echo ($specitem['thumb']); ?>"
																					/>
																			<img onclick="selectSpecItemImage(this)"  
																				 src="<?php if( empty($specitem['thumb'])){ }else{ echo resize($specitem['thumb'],100); } ?>" style='width:100%;'
																				 <?php if( !empty($specitem['thumb'])){ ?>
																						data-toggle='popover'
																						data-html ='true'
																						data-placement='top'
																						data-trigger ='hover'
																						data-content="<img src='<?php echo tomedia($specitem['thumb']);?>' style='width:100px;height:100px;' />"
																				  <?php } ?>
																				 >
																			<i class="fa fa-times-circle" <?php if( empty($specitem['thumb'])){ ?>style="display:none"<?php } ?>></i> 
																	</span>
																	
																	<span class="input-group-addon">
																		<a href="javascript:;" onclick="removeSpecItem(this)" title='删除'><i class="fa fa-times"></i></a>
																		<a href="javascript:;" class="fa fa-arrows" title="拖动调整显示顺序" ></a>
																	</span>
																</div>
															  
																			
															</div>
															 <!--spec_item end-->
														<?php } ?>
														</div>
													</div>
												</div>
										   </div> 
										</div>

										<!--end spec-->
										<?php } ?>
									</div>
									
									<table class="table">
										<tr>
											<td>
											<div class="layui-form-item">
												<label class="col-sm-2 control-label">选择已有规格</label>
												<div class="col-sm-8 col-xs-12">
													<select id="cates2"   name='options[]' class="form-control select2" style='width:605px;' multiple='' >
														<?php foreach( $spec_list as $c ){ ?>
														<option value="<?php echo ($c['id']); ?>" data-names="<?php echo ($c['value_str']); ?>"><?php echo ($c['name']); ?></option>
														<?php } ?>
													</select>
													
												</div>
											</div>
											<td>
										</tr>
										<tr>
											<td>
												<h4>
													<a href="javascript:;" class='btn btn-primary' id='add-spec' onclick="addSpec()" style="margin-top:10px;margin-bottom:10px;" title="新建规格"><i class='fa fa-plus'></i> 新建规格</a>
													<a style="display:none;" href="javascript:;" onclick="refreshOptions();" title="刷新规格项目表" class="btn btn-primary"><i class="fa fa-refresh"></i> 刷新规格项目表</a>
												</h4>
											</td>
										</tr>
										<tr style="display: none;" >
											<td>
												<div class="alert alert-danger">警告：规格数据有变动，请重新点击上方 [刷新规格项目表] 按钮！</div>
											</td>
										</tr>
									</table>
								
									<div class="alert alert-info wholesalewarning"  style="display:none;">
									
									</div>
								<div id="options" style="padding:0;"><?php echo ($item['html']); ?></div>
							</div>

							
							</div>
						</div>
						<input type="hidden" name="optionArray" value=''>
						<input type="hidden" name="isdiscountDiscountsArray" value=''>
						<input type="hidden" name="discountArray" value=''>
						<input type="hidden" name="commissionArray" value=''>
						

						<!--规格end-->
					</div>
					
					
					<div class="layui-tab-item <?php if( $_GPC['tab']=='des'){ ?>layui-show<?php } ?>"  > 
						<div class="region-goods-details row">
							<div class="region-goods-left col-sm-2">商品详情</div>
							<div class=" region-goods-right col-sm-10">
								<div class="" >
								  
									<?php echo tpl_ueditor('content',htmlspecialchars_decode($item['content']),array('height'=>'300'));?>
									
								</div>
							</div>
						</div>


					</div>
					
				
					
					<!---团长分销begin --->
					<div class="layui-tab-item <?php if( $_GPC['tab']=='community_head_level'){ ?>layui-show<?php } ?>" > 
						
						<?php if( !empty($community_head_level) && count($community_head_level) > 1 && $is_head_takegoods == 1 ) { ?>
						
						<div class="region-goods-details row">
							<div class="region-goods-left col-sm-2">团长提成</div>
							<div class="region-goods-right col-sm-10">
								<div class="form-group">
									<label class="col-sm-2 control-label">独立规则</label>
									<div class="col-sm-9 col-xs-12">
										
											<input type="checkbox" id="is_modify_head_commission" lay-skin="primary" value="1" name="is_modify_head_commission" lay-filter="is_modify_head_commission" <?php if( $item['is_modify_head_commission']==1){ ?>checked<?php } ?> title="启用独立团长提成" />
										
										<span class="help-block">默认使用团长等级提成设置，启用独立团长提成设置，此商品拥有独自的团长提成比例,不受团长等级比例及默认设置限制，团长提成 = 订单有效金额 * 设置比例</span>
									</div>
								</div>
								<div id="head_commission_div" <?php if( empty($item['is_modify_head_commission'])){ ?>style="display:none"<?php } ?> >
									<?php foreach($community_head_level as $head_level){ ?>
									
									<div class="form-group">
										<label class="col-sm-2 control-label"><?php echo $head_level['levelname']; ?></label>
										<div class="col-sm-4 col-xs-12">
											<div class="input-group">
												<input type="text" name="head_level<?php echo $head_level['id']; ?>"  class="form-control" value="<?php echo $item['head_level'.$head_level['id']]; ?>" />
												<?php if( !empty($community_money_type) && $community_money_type ==1 ){ ?>
												<div class="input-group-addon">元 </div>
												<?php }else{ ?>
												<div class="input-group-addon">%</div>
												<?php } ?>
											</div>
										</div>
									</div>
									<?php } ?>
								</div>
							</div>
						</div>
							
						<?php } ?>
							
							
							<?php if($commiss_level > 0){ ?>
							<div class="region-goods-details row">					
								<div class="region-goods-left col-sm-2">会员分销</div>
								<div class="region-goods-right col-sm-10">
								
									<div class="form-group">
										<label class="col-sm-2 control-label">是否参与分销</label>
										<div class="col-sm-9 col-xs-12">
											
												<input type="radio"  value="0" name="nocommission" <?php if($item['nocommission']==0){ ?>checked<?php } ?> title="参与分销" /> 
											
												<input type="radio"  value="1" name="nocommission" <?php if($item['nocommission']==1){ ?>checked<?php } ?> title="不参与分销" /> 
											
												<span class="help-block">如果不参与分销，则不产生分销佣金</span>
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">独立规则</label>
										<div class="col-sm-9 col-xs-12">
										   
											<input type="checkbox" lay-filter="hascommission" lay-skin="primary" id="hascommission"  value="1" name="hascommission" <?php if($item['hascommission']==1){ ?>checked<?php } ?> title="启用独立佣金比例" />
											
											<span class="help-block">启用独立佣金设置，此商品拥有独自的佣金比例,不受分销商等级比例及默认设置限制</span>
										   
										</div>
									</div>
									<div style="clear:both;"></div>
									<div id="commission_div" <?php if(empty($item['hascommission'])){ ?>style="display:none"<?php } ?> >


										<div id="commission_0"  <?php if($commission_type!=0){ ?> style="display:none;" <?php } ?>>
										<div class='alert alert-danger'>
											如果比例为空，则使用固定规则，如果都为空则无分销佣金，都填写则以比例优先
										</div>
										
										<?php if($set['commiss_level']>=1){ ?>
										<div class="form-group">
											<label class="col-sm-2 control-label">一级分销</label>
											<div class="col-sm-4 col-xs-12">
											   
												<div class="input-group">
													<input type="text" name="commission1_rate" id="commission1_rate" class="form-control" value="<?php echo ($item['commission1_rate']); ?>" />
													<div class="input-group-addon">% 固定</div>
													<input type="text" name="commission1_pay" id="commission1_pay" class="form-control" value="<?php echo ($item['commission1_pay']); ?>" />
													<div class="input-group-addon">元</div>
												</div>
												
											</div>
										</div>
										<?php } ?>
										<?php if($set['commiss_level']>=2){ ?>
										
										<div class="form-group">
											<label class="col-sm-2 control-label">二级分销</label>
											<div class="col-sm-4 col-xs-12">
												
												<div class="input-group">
													<input type="text" name="commission2_rate" id="commission2_rate" class="form-control" value="<?php echo ($item['commission2_rate']); ?>" />
													<div class="input-group-addon">% 固定</div>
													<input type="text" name="commission2_pay" id="commission2_pay" class="form-control" value="<?php echo ($item['commission2_pay']); ?>" />
													<div class="input-group-addon">元</div>
												</div>
												
											</div>
										</div>
										<?php } ?>
										<?php if($set['commiss_level']>=3){ ?>
										<div class="form-group">
											<label class="col-sm-2 control-label">三级分销</label>
											<div class="col-sm-4 col-xs-12">
												<div class="input-group">
													<input type="text" name="commission3_rate" id="commission3_rate" class="form-control" value="<?php echo ($item['commission3_rate']); ?>" />
													<div class="input-group-addon">% 固定</div>
													<input type="text" name="commission3_pay" id="commission3_pay" class="form-control" value="<?php echo ($item['commission3_pay']); ?>" />
													<div class="input-group-addon">元</div>
												</div>
											</div>
										</div>
										<?php } ?>
									</div>
									
								</div>
								</div>
								
							</div>
							<?php } ?>
						
							
							
							<div class="region-goods-details row">					
								<div class="region-goods-left col-sm-2">会员等级折扣</div>
								<div class="region-goods-right col-sm-10">
								
									<div class="form-group">
										<label class="col-sm-2 control-label">是否参与会员折扣</label>
										<div class="col-sm-9 col-xs-12">
											
												<input type="radio"  value="1" name="is_mb_level_buy" <?php if(!isset($item['is_mb_level_buy']) || $item['is_mb_level_buy']==1){ ?>checked<?php } ?> title="参与" /> 
											
												<input type="radio"  value="0" name="is_mb_level_buy" <?php if($item['is_mb_level_buy']==0){ ?>checked<?php } ?> title="不参与" /> 
											
												<span class="help-block">如果不参与会员折扣，则不打折</span>
											
										</div>
									</div>

									<div class="form-group">
										<label class="col-sm-2 control-label">独立规则</label>
										<div class="col-sm-9 col-xs-12">
											<input type="checkbox" lay-filter="has_mb_level_buy" lay-skin="primary" id="has_mb_level_buy"  value="1" name="has_mb_level_buy" <?php if($item['has_mb_level_buy']==1){ ?>checked<?php } ?> title="启用独立折扣比例" />
											<span class="help-block">启用独立折扣设置，此商品拥有独立的会员等级折扣比例，不受会员等级折扣设置限制</span>
										</div>
									</div>

									<div style="clear:both;"></div>
									<div id="mb_level_div" <?php if(empty($item['has_mb_level_buy'])){ ?>style="display:none"<?php } ?> >
										<div id="mb_level_tip">
											<div class='alert alert-danger'>
												请填写1-99的<span style="color:red">整数</span>，100不打折。例如：80，打八折，该会员对应等级会员价=商品现价*80%
												<?php if( empty($member_level_ist) ){ ?>
													<br>
												<span style="color:red">暂无会员等级，请前往会员--》会员等级 添加会员等级</span>
												<?php } ?>
											</div>
										</div>
										<?php foreach($member_level_ist as $k=>$v){?>
										<div class="form-group">
											<label class="col-sm-2 control-label"><?php echo $v['levelname']?></label>
											<div class="col-sm-4 col-xs-4">
												<div class="input-group">
													<input type="hidden" name="level_id[]" class="form-control" value="<?php echo $v['id']?>" />
													<input type="text" name="discount[]" class="form-control" value="<?php echo $mb_level_discount_list[$v['id']];?>" />
													<div class="input-group-addon">% </div>
												</div>
											</div>
										</div>
										<?php }?>
									</div>
								</div>
							</div>
							
							
					
					<!--团长分销end--->
					
					
					
				  </div>
				 
					
				  <?php if( !empty($is_open_goods_relative_goods) && $is_open_goods_relative_goods == 1 ){ ?>
				  <div class="layui-tab-item <?php if( $_GPC['tab']=='goods_relative_goods'){ ?>layui-show<?php } ?>"  > 
						<div class="region-goods-details row">
							<div class="region-goods-left col-sm-2">推荐商品</div>
							<div class=" region-goods-right col-sm-10">
								<div class="input-group " style="margin: 0;">
									<input type="text" disabled value="" class="form-control valid" name="" placeholder="" id="agent_id">
									<span class="input-group-btn">
										<span data-input="#agent_id" id="chose_agent_id2"  class="btn btn-default">选择商品</span>
									</span>
								</div>
								<?php if(!empty($limit_goods)){ ?>
								<?php foreach( $limit_goods as $goods ){ ?>
								<div class="input-group mult_choose_goodsid" data-gid="<?php echo ($goods['gid']); ?>" style="border-radius: 0;float: left;margin: 10px;margin-left:0px;width: 22%;">	
									<div class="layadmin-text-center choose_user">		
										<img style="" src="<?php echo ($goods['image']); ?>">		
										<div class="layadmin-maillist-img" style=""><?php echo ($goods['goodsname']); ?></div>		
										<button type="button" class="layui-btn layui-btn-sm" onclick="cancle_bind(this)">
											<i class="layui-icon"></i>
										</button>	
									</div>
								</div>
								<?php }} ?>
							</div>
						</div>
					</div>
					<?php } ?>
					
					<?php if( $open_goods_distribution == 1 ) { ?>
					<div class="layui-tab-item <?php if( $_GPC['tab']=='goods_distribution'){ ?>layui-show<?php } ?>"  > 
						<div class="region-goods-details row">
							<div class="region-goods-left col-sm-2">同城配送</div>
							<div class=" region-goods-right col-sm-10">
								
								<div class="form-group">
									<label class="col-sm-2 control-label">同城配送</label>
									<div class="col-sm-4 col-xs-12 col-md-10">
										
										<div class="input-group">
											<input type="checkbox"  lay-skin="primary" id="is_only_distribution"  name="is_only_distribution" lay-filter="is_only_distribution" <?php if(isset($item['is_only_distribution']) && $item['is_only_distribution'] ==1 ){ ?> checked <?php } ?> value="1" />
										</div>

										<span style="color:#999!important;">勾选后该商品会在购物车中显示同城配送，所有同城配送的商品单独结算，订单提交只有同城配送方式</span><br />
										<span style="color:red">勾选后,此商品为同城配送商品。会自动取消仅快递和到店核销的勾选</span>

									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">包装费</label>
									<div class="col-sm-4 col-xs-12">
										<div class="input-group">
											<input type="text" name="packing_free" id="packing_free" class="form-control" value="<?php if( !isset($item['packing_free']) ){ ?>0<?php }else{ echo ($item['packing_free']); } ?>" />
											<div class="input-group-addon">元</div>
										</div>
										<span style="color:#999!important;">零元表示没有包装费这一项</span>
									</div>
								</div>
										
							</div>
						</div>
					</div>
					<?php } ?>

					<div class="layui-tab-item <?php if( $_GPC['tab']=='hexiao'){ ?>layui-show<?php } ?>"  >
						<div class="region-goods-details row">
							<div class="region-goods-left col-sm-2">到店核销</div>
							<div class="region-goods-right col-sm-10">
								<?php if(empty($is_exist_salesroom)){ ?>
									<div class="form-group" style="margin: 20px;">
										<div class="col-sm-12 col-xs-12 col-md-12">
											<span style="color:red;">“到店核销”功能需要与门店信息配合使用，您暂无设置门店信息，请先<a href="<?php echo U('salesroom/index');?>" style="color:#428bca;">去添加</a>门店信息然后再进行到店核销设置</span>
										</div>
									</div>

								<?php }else{ ?>
								<div class="form-group">
									<label class="col-sm-2 control-label">到店核销</label>
									<div class="col-sm-4 col-xs-12 col-md-10">
										<div class="input-group">
											<input type="checkbox"  lay-skin="primary"  name="is_only_hexiao" id="is_only_hexiao" lay-filter="is_only_hexiao" <?php if(isset($item['is_only_hexiao']) && $item['is_only_hexiao'] ==1 ){ ?> checked <?php } ?> value="1" />
										</div>
										<span style="color:#999!important;">勾选后该商品会在购物车中显示核销商品，所有核销商品单独结算，订单提交只有到店核销方式</span><br />
										<span style="color:red">勾选后,此商品为到店核销商品。会自动取消仅快递和同城配送的勾选</span>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">核销方式</label>
									<div class="col-sm-9 col-xs-12">
										<input type="radio"  value="0" name="hexiao_type" lay-filter="hexiao_type"  <?php if(!isset($item['hexiao_type']) || $item['hexiao_type'] == 0){ ?>checked<?php } ?> title="订单核销" />
										<input type="radio"  value="1" name="hexiao_type" lay-filter="hexiao_type"  <?php if(isset($item['hexiao_type']) && $item['hexiao_type'] == 1){ ?>checked<?php } ?> title="自定义核销次数" />
										<span class="help-block" style="font-size: 12px;<?php if(!isset($item['hexiao_type']) || $item['hexiao_type'] == 0){ ?>display:block;<?php }else{ ?>display:none;<?php } ?>" id="hexiao_type_0">核销一次后即过期</span>
										<span class="help-block" style="font-size: 12px;margin-left:120px;<?php if(isset($item['hexiao_type']) && $item['hexiao_type'] == 1){ ?>display:block;<?php }else{ ?>display:none;<?php } ?>" id="hexiao_type_1">设置的单个到店核销次数核销</span>
									</div>
								</div>
								<div class="form-group" id="hx_goods_time" style="<?php if(isset($item['hexiao_type']) && $item['hexiao_type'] == 1){ ?>display:block;<?php }else{ ?>display:none;<?php } ?>">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-9 col-xs-12">
										<div class="col-sm-9 col-xs-12">
											<label class="col-sm-2 control-label">单个到店核销次数</label>
											<div class="col-sm-9 col-xs-12">
												<input type="text" name="hx_one_goods_time" id="hx_one_goods_time" class="form-control" value="<?php echo ($item['hx_one_goods_time']); ?>" style="width: 500px;"/>
												<span class="help-block" style="font-size: 12px;">单个到店核销次数,不填或填写0及以下为默认不限次数，核销员 “全部核销”  为一次核销完成，管理员订单 “确认使用” 为一次核销完成</span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">核销有效期</label>
									<div class="col-sm-9 col-xs-12">
										<input type="radio"  value="0" name="hx_expire_type" lay-filter="hx_expire_type"  <?php if(!isset($item['hx_expire_type']) || $item['hx_expire_type'] == 0){ ?>checked<?php } ?> title="购买后有效期" />
										<input type="radio"  value="1" name="hx_expire_type" lay-filter="hx_expire_type"  <?php if(isset($item['hx_expire_type']) && $item['hx_expire_type'] == 1){ ?>checked<?php } ?> title="指定过期时间" />
									</div>
								</div>
								<div class="form-group" id="hx_expire_type_0" style="<?php if(!isset($item['hx_expire_type']) || $item['hx_expire_type'] == 0){ ?>display:block;<?php }else{ ?>display:none;<?php } ?>">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-9 col-xs-12">
										<div class="col-sm-9 col-xs-12">
											<label class="col-sm-2 control-label">有效天数</label>
											<div class="col-sm-9 col-xs-12">
												<input type="text" name="hx_expire_day" id="hx_expire_day" class="form-control" value="<?php echo ($item['hx_expire_day']); ?>" style="width: 300px;display: inline-block;"/><span style="margin:5px;">天</span>
												<span class="help-block" style="font-size: 12px;">自购买之日起多少天内有效，不写默认90天</span>
											</div>
										</div>
									</div>
								</div>
								<div class="form-group" id="hx_expire_type_1" style="<?php if(isset($item['hx_expire_type']) && $item['hx_expire_type'] == 1){ ?>display:block;<?php }else{ ?>display:none;<?php } ?>">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-9 col-xs-12">
										<div class="col-sm-9 col-xs-12">
											<label class="col-sm-2 control-label">过期时间</label>
											<div class="col-sm-9 col-xs-12">
												<input type="text" name="hx_expire_end_time" id="hx_expire_end_time" class="form-control" value="<?php echo ($item['hx_expire_end_time']); ?>" lay-filter="hx_expire_end_time" placeholder="yyyy-MM-dd HH:mm:ss" style="width: 300px;"/>
												<span class="help-block" style="font-size: 12px;">在指定过期时间之前才能核销</span>
											</div>
											<label class="col-sm-2 control-label"></label>
											<div class="col-sm-9 col-xs-12 input-group fixsingle-input-group" style="padding-left: 15px;">
												<div class="input-group-addon"><input type="checkbox"  lay-skin="primary"  name="hx_auto_off" id="hx_auto_off" lay-filter="hx_auto_off" <?php if(!isset($item['hx_auto_off']) || $item['hx_auto_off'] == 1){ ?>checked<?php } ?> value="1" />自动下架商品，提前</div>
												<input class="form-control" name="hx_auto_off_time" id="hx_auto_off_time" type="text" placeholder="" value="<?php if(!isset($item['hx_auto_off'])){?>6<?php }else{ echo $item['hx_auto_off_time'];} ?>">
												<div class="input-group-addon">小时</div>
											</div>
											<label class="col-sm-2 control-label" style="margin-right: 15px;"></label>
											<span class="layui-form-mid layui-word-aux" style="font-size: 12px;">在指定过期时间前多少个小时自动下架，防止已过期商品还可以购买；没勾选，到期自动下架。 </span>
										</div>
									</div>
								</div>
								<div class="form-group">
									<label class="col-sm-2 control-label">指定门店</label>
									<div class="col-sm-9 col-xs-12">
										<input type="radio"  value="0" name="hx_assign_salesroom" lay-filter="hx_assign_salesroom"  <?php if(!isset($item['hx_assign_salesroom']) || $item['hx_assign_salesroom'] == 0){ ?>checked<?php } ?> title="所有门店" />
										<input type="radio"  value="1" name="hx_assign_salesroom" lay-filter="hx_assign_salesroom"  <?php if(isset($item['hx_assign_salesroom']) && $item['hx_assign_salesroom'] == 1){ ?>checked<?php } ?> title="指定门店" />
									</div>
								</div>
								<div class="form-group" id="hx_assign_salesroom_1" style="<?php if(isset($item['hx_assign_salesroom']) && $item['hx_assign_salesroom'] == 1){ ?>display:block;<?php }else{ ?>display:none;<?php } ?>">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-9 col-xs-12">
										<div class="input-group " style="margin: 0;">
											<input type="text" disabled value="" class="form-control valid" placeholder="" id="salesroom_id">
											<span class="input-group-btn">
												<span data-input="#hexiao_salesroom_list" id="chose_salesroom_id"  class="btn btn-default">选择门店</span>
											</span>
										</div>
										<span class="help-block" style="font-size: 12px;">门店下方所有核销人员都可以核销该商品，也可以单独指定门店的核销人员进行核销。</span>
									</div>
								</div>
								<div class="form-group" id="hx_salesroom_list" style="<?php if(isset($item['hx_assign_salesroom']) && $item['hx_assign_salesroom'] == 1){ ?>display:block;<?php }else{ ?>display:none;<?php } ?>">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-9 col-xs-12">
										<?php if(isset($item['salesroom_list']) && count($item['salesroom_list']) > 0){ $i = 1;?>
										<?php foreach($item['salesroom_list'] as $rk=>$rv){?>
										<div class="input-group mult_choose_room_list" style="width:100%">
											<div class="input-group mult_choose_roomid" data-roomid="<?php echo $rv['salesroom_id']; ?>" style="border-radius: 0;margin: 10px;margin-left:0px;">
												<div class="choose_room_title">指定门店<?php echo $i;$i++;?></div>
												<div class="layadmin-text-center choose_user">
													<img style="" src="<?php echo tomedia($rv['room_logo']);?>">
													<div class="layadmin-maillist-img" style=""><?php echo $rv['room_name']; ?></div>
													<button type="button" class="layui-btn layui-btn-sm" onclick="cancle_room_bind(this)">
														<i class="layui-icon"></i>
													</button>
												</div>
											</div>
											<div class="input-group" style="margin-top: 10px;">
												<input type="checkbox" class="is_hx_member" lay-filter="is_hx_member" lay-skin="primary" name="is_hx_member" value="1" title="是否指定核销人员" <?php if(isset($rv['is_hx_member']) && $rv['is_hx_member'] == 1){ ?>checked<?php } ?>>
												<div class="layui-unselect layui-form-checkbox" lay-skin="primary">
													<span>是否指定核销人员</span>
													<i class="layui-icon layui-icon-ok"></i>
												</div>
											</div>

											<div class="input-group selectHxMember" style="margin-top: 10px;<?php if(empty($rv['smember_list'])){ ?>display:none;<?php } ?>">
												<input type="text" disabled="" value="" class="form-control valid" name="smember_id" placeholder="">
												<span class="input-group-btn">
													<span data-input="#hexiao_smember_list_<?php echo $rv['salesroom_id']; ?>" class="btn btn-default chose_smember_id">选择核销人员</span>
												</span>
											</div>

											<div class="form-group hx_smember_list" id="hx_smember_list" style="<?php if(empty($rv['smember_list'])){ ?>display:none;<?php } ?>">
												<div class="col-sm-12 col-xs-12">
													<div id="hexiao_smember_list_<?php echo $rv['salesroom_id']; ?>"></div>
													<?php if(isset($rv['smember_list']) && count($rv['smember_list']) > 0){?>
													<?php foreach($rv['smember_list'] as $mk=>$mv){?>
													<div class="input-group mult_choose_smemberid" data-smemberid="<?php echo $mv['smember_id']; ?>" style="border-radius: 0;float: left;margin: 10px;margin-left:0px;">
														<div class="layadmin-text-center choose_user">
															<img src="<?php echo $mv['avatar']; ?>" style="padding1px;border:1px solid #ccc">
															<div class="layadmin-maillist-img" style=""><?php echo $mv['username']; ?></div>
															<button type="button" class="layui-btn layui-btn-sm" onclick="cancle_bind(this)">
																<i class="layui-icon"></i>
															</button>
														</div>
													</div>
													<?php } ?>
													<?php } ?>
												</div>
											</div>
										</div>
										<?php } ?>
										<?php } ?>
										<div id="hexiao_salesroom_list"></div>
									</div>
								</div>
								<?php } ?>
								<!--
								<div class="form-group">
									<label class="col-sm-2 control-label"></label>
									<div class="col-sm-9 col-xs-12">
										<input type="button" value="测试按钮" class="btn btn-primary hexiao_btn"  />
									</div>
								</div>-->

							</div>
						</div>
					</div>
				</div> 
				
				<script>
					$(function(){
						$(".select2").select2({
							 placeholder:'请选择',
							 allowClear:true
						})
					})
				</script>
				<div class="layui-form-item">
					<label class="layui-form-label"> </label>
					<div class="layui-input-block">
						<input type="submit" value="提交" lay-submit lay-filter="formDemo" class="btn btn-primary"  />
						&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
						<a class="btn btn-default" style='margin-left:10px;' href="<?php echo U('goods/index' , array( 'ok' => 1));?>">返回列表</a>
						
					</div>
				</div>
			</form>
		</div>
</div>
</div>


<div id="batchheads" style="z-index: 999;display: none;position: fixed;top: 0;left: 0;right: 0;bottom: 0;background: rgba(0,0,0,0.5)" class="form-horizontal form-validate batchcates"  enctype="multipart/form-data">
	<div class="modal-dialog" style="position: absolute;margin-top: -300px">
		<div class="modal-content">
			<div class="modal-header" style="padding:5px;">
				<button data-dismiss="modal" class="close" type="button">×</button>
				<h4 class="modal-title">选取团长</h4>
			</div>
			<div class="modal-body" style="height:600px">
				<div class="form-group">
					<label class="col-sm-2 control-label">社区位置</label>
					<div class="col-sm-10 col-xs-12">
						<p>
							<select id="sel-provance" name="province_id" onChange="selectCity();" class="select form-control" style="width:160px;display:inline;">
								<option value="" selected="true">省/直辖市</option>
							</select>
							<select id="sel-city" name="city_id" onChange="selectcounty(0)" class="select form-control" style="width:160px;display:inline;">
								<option value="" selected="true">请选择</option>
							</select>
							<select id="sel-area" name="area_id" onChange="selectstreet(0)" class="select form-control" style="width:160px;display:inline;">
								<option value="" selected="true">请选择</option>
							</select>
							<select id="sel-street" name="country_id" class="select form-control" style="width:160px;display:inline;">
								<option value="" selected="true">请选择</option>
							</select>
						</p>
					</div>
				</div>
				<div class="form-group">
					<label class="col-sm-2 control-label">团长名称</label>
					<div class="col-sm-10 col-xs-12">
						<div class="input-group">
							<input type="text" class="form-control" name="keyword" id="supply_id_input" placeholder="团长名称/团长手机号/社区地址">
			            	<span class="input-group-btn">
			            		<button type="button" class="btn btn-default" onclick="search_heads()">搜索</button>
			            	</span>
						</div>
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-1 control-label">

					</div>
					<div class="col-sm-10 col-xs-12">
						<div class="page-table-header">
							<input type="checkbox" class="check_heads_all">
							<div class="btn-group">
								全选/反选
							</div>

							<br/>
							<label><input type="checkbox" class="is_cancle_old" id="is_cancle_old" style="vertical-align: text-bottom;">
								<div class="btn-group" style="color:#666;">
									同时取消以前所有分配
								</div>
							</label>
							&nbsp;&nbsp;&nbsp;&nbsp;

							<label><input type="checkbox" class="is_cancle_allhead" id="is_cancle_allhead" style="vertical-align: text-bottom;">
								<div class="btn-group" style="color:#666;">
									同时取消商品 “所有团长可售”
								</div>
							</label>


						</div>
					</div>
				</div>

				<div class="row">
					<label class="col-sm-1 control-label"></label>
					<div class="col-sm-11 col-xs-12">
						<div class="content" style="padding-top:5px;" data-name="supply_id">
							<div style="max-height:410px;overflow:auto;" id="batchheads_content">

							</div>
							<div class="" id="batchheads_page">

							</div>
						</div>
					</div>
				</div>


			</div>
			<div class="modal-footer">
				<button class="btn btn-primary model_heads">确认</button>
				<button class="btn btn-default" >取消</button>
			</div>
		</div>
	</div>
</div>

<script src="/layuiadmin/layui/layui.js"></script>

<script type="text/javascript" src="/static/js/jquery-migrate-1.1.1.js"></script>
<script src="/static/js/jquery-ui.min.js"></script>
<style>
.multi-img-details{width:100%;}
</style>
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
var form;

layui.use(['jquery', 'layer','form', 'laydate'], function(){
  $ = layui.$;
	form = layui.form;
	laydate = layui.laydate;
	laydate.render({
		elem: '#hx_expire_end_time'
		,type: 'datetime'
		,min: '<?php echo date("Y-m-d H:i:s"); ?>'
	});
  
	form.on('radio(linktype)', function(data){
		if (data.value == 2) {
			$('#typeGroup').show();
		} else {
			$('#typeGroup').hide();
		}
	});  
	
	form.on('checkbox(is_modify_sendscore)', function(data){
		console.log(data.elem.checked)
	  if (data.elem.checked) {
			console.log(12);
			$("#send_score_divTip").css('display','inline');
			$("#send_score_divTip2").css('display','inline');
		} else {
			console.log(33);
			$("#send_score_divTip").hide();
			$("#send_score_divTip2").hide();
		}
		form.render('checkbox');
	});
	
	form.on('checkbox(xinrenckbox)', function(data){
	  if (data.elem.checked) {
			$("#xianshickbox").removeAttr("checked");
		} else {
			
		}
		form.render('checkbox');
	});
	
	form.on('checkbox(xianshickbox)', function(data){
		if (data.elem.checked) {
			$("#xinrenckbox").removeAttr("checked");
		} else {
			
		}
		form.render('checkbox');
	});
	
	form.on('checkbox(hascommission)', function(data){
		
		if (data.elem.checked) {
			$('#commission_div').show();
		} else {
			$('#commission_div').hide();
		}
	})
	//hascommission

	form.on('checkbox(has_mb_level_buy)', function(data){

		if (data.elem.checked) {
			$('#mb_level_div').show();
		} else {
			$('#mb_level_div').hide();
		}
	})

	form.on('checkbox(is_hx_member)', function(data){

		if (data.elem.checked) {
			$(this).parent().parent().find('.selectHxMember').show();
			$(this).parent().parent().find('.hx_smember_list').show();
		} else {
			$(this).parent().parent().find('.selectHxMember').hide();
			$(this).parent().parent().find('.hx_smember_list').hide();
		}
	})

	form.on('radio(hexiao_type)', function(data){
		if (data.elem.value == 1) {
			$('#hexiao_type_0').hide();
			$('#hexiao_type_1').show();
			$('#hx_goods_time').show();
		} else {
			$('#hexiao_type_0').show();
			$('#hexiao_type_1').hide();
			$('#hx_goods_time').hide();
		}
	})
	form.on('radio(hx_expire_type)', function(data){
		if (data.elem.value == 1) {
			$('#hx_expire_type_0').hide();
			$('#hx_expire_type_1').show();
		} else {
			$('#hx_expire_type_0').show();
			$('#hx_expire_type_1').hide();
		}
	})
	form.on('radio(hx_assign_salesroom)', function(data){
		if (data.elem.value == 1) {
			$('#hx_assign_salesroom_1').show();
			$('#hx_salesroom_list').show();
		} else {
			$('#hx_assign_salesroom_1').hide();
			$('#hx_salesroom_list').hide();
		}
	})
	//同城配送
	form.on('checkbox(is_only_distribution)', function (data) {
		if (data.elem.checked) {
			$("#is_only_hexiao").removeAttr("checked");
			$("#is_only_express").removeAttr("checked");
		}
		form.render('checkbox');
	});
	//仅快递
	form.on('checkbox(is_only_express)', function (data) {
		if (data.elem.checked) {
			$("#is_only_distribution").removeAttr("checked");
			$("#is_only_hexiao").removeAttr("checked");
		}
		form.render('checkbox');
	});
	//核销
	form.on('checkbox(is_only_hexiao)', function (data) {
		if (data.elem.checked) {
			$("#is_only_distribution").removeAttr("checked");
			$("#is_only_express").removeAttr("checked");
		}
		form.render('checkbox');
	});

	$('#chose_salesroom_id').click(function(){
		var supply_id = $('input[name="supply_id"]').val();
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('salesroom/query', array('template' => 'mult_goods'));?>", {supply_id:supply_id}, function(shtml){
			layer.open({
				type: 1,
				area: '930px',
				content: shtml //注意，如果str是object，那么需要字符拼接。
			});
		});
	})
	$('.chose_smember_id').live('click',function(){
		var room_id = $(this).parent().parent().parent().find('.mult_choose_roomid').attr('data-roomid');
        cur_open_div = $(this).attr('data-input');
        var post_url = "<?php echo U('salesroom_member/query', array('template' => 'mult_goods'));?>";
        $.post(post_url, {room_id:room_id}, function(shtml){
            layer.open({
                type: 1,
                area: '930px',
                content: shtml //注意，如果str是object，那么需要字符拼接。
            });
        });
	})
	
	/**
	<?php if($delivery_type_express == 2){?>
	form.on('checkbox(is_only_express111)', function(data){
		if (data.elem.checked) {
			$('#is_only_express').removeAttr("checked");
			layer.msg("启用仅快递配送模式，请在物流设置开启快递配送方式！",{icon: 2,time: 3000});
		}
		form.render('checkbox');
	})
	<?php } ?>
	**/
									
	$('#chose_label_id').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('goods/labelquery', array('ok' => 1));?>", {}, function(shtml){
		 layer.open({
			type: 1,
			area: '930px',
			content: shtml //注意，如果str是object，那么需要字符拼接。
		  });
		});
	})
	
	$('#chose_member_id').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('supply/zhenquery', array('ok' => 1));?>", {}, function(shtml){
		 layer.open({
			type: 1,
			area: '930px',
			content: shtml //注意，如果str是object，那么需要字符拼接。
		  });
		});
	})
	$('#chose_agent_id').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('communityhead/query_head_user', array('ok' => 1));?>", {}, function(shtml){
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
	
	$('.layui-tab-title li').click(function(){
		form.render('radio');
		form.render('checkbox');
	})
		
  //监听提交
  form.on('submit(formDemo)', function(data){
	var loadingIndex = layer.load();

	  $('input').blur(function () {
		  $(this).css('border','#e7e7eb 1px solid');
	  })

	  var goodsname = $.trim($('#goodsname').val());
	  if(goodsname == ''){
		  layer.msg('商品名称必须填写',{icon: 1,time: 2000});
		  $('#goodsname').focus();
		  $('#goodsname').css('border','red 2px solid');
		  layer.close(loadingIndex);
		  return false;
	  }

	  var price = $.trim($('#price').val());
	  if(price == ''){
		  layer.msg('售价必须填写',{icon: 1,time: 2000});
		  $('#price').focus();
		  $('#price').css('border','red 2px solid');
		  layer.close(loadingIndex);
		  return false;
	  }

	  var productprice = $.trim($('#productprice').val());
	  if(productprice == ''){
		  layer.msg('原价必须填写',{icon: 1,time: 2000});
		  $('#productprice').focus();
		  $('#productprice').css('border','red 2px solid');
		  layer.close(loadingIndex);
		  return false;
	  }

	  



	  if($('#hasoption').get(0).checked == false){
		  console.log(222);
		  var total =$('#total').val();
		  if(total == ''){
			  layer.msg('库存必须填写',{icon: 1,time: 2000});
			  $('#total').focus();
			  $('#total').css('border','red 2px solid');
			  layer.close(loadingIndex);
			  return false;
		  }
	  }







	  var goods_start_count = $.trim($('input[name="goods_start_count"]').val());
	  var r = /^\+?[1-9][0-9]*$/;　　//正整数
	  if(r.test(goods_start_count)){
		  var oneday_limit_count = $.trim($('input[name="oneday_limit_count"]').val());
		  if(parseInt(oneday_limit_count) > 0){
			  if(parseInt(goods_start_count) > parseInt(oneday_limit_count)){
				  layer.msg('起购数量必须小于每天限购',{icon: 1,time: 2000});
				  $('input[name="goods_start_count"]').focus();
				  layer.close(loadingIndex);
				  return false;
			  }
		  }
		  var one_limit_count = $.trim($('input[name="one_limit_count"]').val());
		  if(parseInt(one_limit_count) > 0){
			  if(parseInt(goods_start_count) > parseInt(one_limit_count)){
				  layer.msg('起购数量必须小于单次限购',{icon: 1,time: 2000});
				  $('input[name="goods_start_count"]').focus();
				  layer.close(loadingIndex);
				  return false;
			  }
		  }
		  var total_limit_count = $.trim($('input[name="total_limit_count"]').val());
		  if(parseInt(total_limit_count) > 0){
			  if(parseInt(goods_start_count) > parseInt(total_limit_count)){
				  layer.msg('起购数量必须小于历史限购',{icon: 1,time: 2000});
				  $('input[name="goods_start_count"]').focus();
				  layer.close(loadingIndex);
				  return false;
			  }
		  }
	  }
	  //判断付费会员价
	  var is_take_vipcard = $('input[name="is_take_vipcard"]').prop('checked');
	  if(is_take_vipcard){
		  var card_price = $.trim($('#card_price').val());
		  var price = $.trim($('#price').val());
		  var fix_amountTest=/^(([1-9]\d*)|\d)(\.\d{1,2})?$/;
		  if(card_price == '' || fix_amountTest.test(card_price)==false){
			  layer.msg('请填写正确的商品付费会员专享价');
			  layer.close(loadingIndex);
			  return false;
		  }
		  if(price == '' || fix_amountTest.test(price)==false){
			  layer.msg('请填写正确的商品价格售价');
			  layer.close(loadingIndex);
			  return false;
		  }
		  if(parseFloat(card_price) > parseFloat(price)){
			  layer.msg('付费会员专享价不能大于售价');
			  layer.close(loadingIndex);
			  return false;
		  }
		  var check_cardprice = true;
		  var check_market_price = true;
		  var check_card_market = true;
		  $('.option_cardprice').each(function(){
			  var cardprice = $.trim($(this).val());
			  var marketprice = $.trim($(this).parent().parent().find('.option_marketprice').val());
			  if(cardprice == '' || fix_amountTest.test(cardprice) == false || parseFloat(cardprice) < 0.01){
				  check_cardprice = false;
			  }
			  if(marketprice == '' || fix_amountTest.test(marketprice) == false || parseFloat(marketprice) < 0.01){
				  check_market_price = false;
			  }
			  if(parseFloat(cardprice) > parseFloat(marketprice)){
				  check_card_market = false;
			  }
		  })
		  if(!check_cardprice){
			  layer.msg('多规格付费会员专享价不能为空且最低0.01元');
			  layer.close(loadingIndex);
			  return false;
		  }
		  if(!check_market_price){
			  layer.msg('多规格商品售价不能为空且最低0.01元');
			  layer.close(loadingIndex);
			  return false;
		  }
		  if(!check_card_market){
			  layer.msg('多规格付费会员专享价不能大于售价');
			  layer.close(loadingIndex);
			  return false;
		  }

	  }

	var s_cates = $('#cates').val();
	var cate_mult = [];
	for(var i in s_cates)
	{
		cate_mult.push(s_cates[i]);
	}
	data.field.cate_mult = cate_mult;
	
	<?php if( !empty($is_open_goods_relative_goods) && $is_open_goods_relative_goods == 1 ){ ?>
	var gd_ar = [];
	var gd_str = '';
	$('.mult_choose_goodsid').each(function(){
		gd_ar.push( $(this).attr('data-gid') );
	})
	gd_str = gd_ar.join(',');
	
	data.field.limit_goods_list = gd_str;
	<?php } ?>
	
	var is_mult_option = $('input[name=hasoption]').is(':checked');


	if( is_mult_option )
	{
		var spec_item_all_count = 0;
		var spec_item_all = false;
		$('.spec_item').each(function(){
			spec_item_all_count++;
		});
		if(spec_item_all || spec_item_all_count == 0)
		{
			layer.msg('请填写商品的规格名称');
			layer.close(loadingIndex);
			return false;
		}
		var is_spec_break = false;
		$('.spec_item').each(function(){
			spec_item_all_count++;
			//检测商品规格是否配置
			var spec_val;
			var spec_item_val;
			var is_spec = false;
			var is_spec_item = false;
			var spec_count = 0;
			var spec_item_count = 0;
			
			$(this).find('.spec_title').each(function(){
				spec_val = $(this).val();
				spec_count++;
				if( spec_val == '' )
				{
					is_spec = true;
				}

				if(is_spec || spec_count == 0)
				{
					is_spec_break = true;
					layer.msg('请填写商品的规格名称',{icon:2});
					$(this).focus();
					$(this).css('border','2px solid #FF0000');
					layer.close(loadingIndex);
					return false;
				}
			})
			$(this).find('.spec_item_title').each(function(){
				spec_item_val = $(this).val();

				spec_item_count++;
				if( spec_item_val == '' )
				{
					is_spec_item = true;
				}
				if(is_spec_item || spec_item_count == 0){
					is_spec_break = true;
					$(this).focus();
					$(this).css('border','2px solid #FF0000');
					//$('.hasoption').focus();
					layer.msg('请填写商品的具体规格值',{icon:2});
					layer.close(loadingIndex);
					return false;
				}



			})


		})
		if(is_spec_break){
			layer.close(loadingIndex);
			return false;
		}

		var t_val;
		var is_pos = false;
		var s_total = 0;
		var is_break = false;
		$('.option_stock').each(function(){
			 t_val = $(this).val();
			 if( t_val == '' )
			 {
				 is_pos = true;

			 }
			if(is_pos)
			{
				layer.msg('多规格商品库存未填写',{icon:2});
				$(this).focus();
				$(this).css('border','red 2px solid');
				console.log(888);
				layer.close(loadingIndex);
				is_break = true;
				return false;



			}


			 s_total += parseInt( t_val );
		})


		if(is_break){
			return false;
		}

		
		var t_val2;
		var is_pos2 = false;
		$('.option_marketprice').each(function(){
			 t_val2 = $(this).val();
			 if( t_val2 == '' )
			 {
				is_pos2 = true;
			 }
			console.log(is_pos2);
			if(is_pos2)
			{
				layer.msg('多规格商品价格未填写',{icon:2});
				$(this).focus();
				$(this).css('border','red 2px solid');
				layer.close(loadingIndex);
				is_break = true;
				return false;
			}

		})
		if(is_break){
			return false;
		}


		var t_val3;
		var is_pos3 = false;
		$('.option_productprice').each(function(){
			t_val3 = $(this).val();
			if( t_val3 == '' )
			{
				is_pos3 = true;
			}
		})

		if(is_pos3)
		{
			layer.msg('多规格商品原价未填写',{icon:2});
			layer.close(loadingIndex);
			return false;
		}

		if( s_total > 100000 || s_total< 0 )
		{
			layer.msg('商品库存值的取值范围是1~100000',{icon:2});
			layer.close(loadingIndex); 
			return false;
		}
		
	}else{
		var g_total = $('#total').val();
		
		if( g_total > 100000 || g_total< 0 )
		{
			layer.msg('商品库存值的取值范围是1~100000',{icon:2});
			layer.close(loadingIndex); 
			return false;
		}
		
	}
/**
	  var supply_id = $('input[name=supply_id]').val();
	  var is_only_distribution = $('input[name=is_only_distribution]').is(':checked');
	  if(supply_id != '' && supply_id > 0){
		  if(is_only_distribution){
			  layer.msg('独立供应商不能开启同城配送');
			  layer.close(loadingIndex);
			  return false;
		  }
	  }**/
	  //商品核销
	  var is_only_hexiao = $('input[name=is_only_hexiao]').is(':checked');
	  if(is_only_hexiao){
		  var hx_expire_type = $('input:radio[name="hx_expire_type"]:checked').val();
		  if(hx_expire_type == 1){
			  if($.trim($('#hx_expire_end_time').val()) == ''){
				  layer.msg('指定过期时间不能为空');
				  layer.close(loadingIndex);
				  return false;
			  }
		  }

		  var goods_room = [];
		  var goods_room_smember = {};
		  var goods_is_hx_member = {};
		  var goods_room_ids = "";
		  $('#hx_salesroom_list').find('.mult_choose_room_list').each(function(){
			  var goods_room_sid = [];
			  var room_id = $(this).find('.mult_choose_roomid').attr('data-roomid');
			  $(this).find('.mult_choose_smemberid').each(function(){
				  var smember_id = $(this).attr('data-smemberid');
				  goods_room_sid.push(smember_id);
			  });
			  goods_room_smember[room_id] = goods_room_sid.join(',');
			  goods_room.push(room_id);

			  $(this).find('.is_hx_member').each(function(){
				  if($(this).is(':checked')){
					  goods_is_hx_member[room_id] = 1;
				  }else{
					  goods_is_hx_member[room_id] = 0;
				  }
			  });
		  });

		  goods_room_ids = goods_room.join(',');
		  data.field.goods_room_ids = goods_room_ids;
		  data.field.goods_room_smember = goods_room_smember;
		  data.field.goods_is_hx_member = goods_is_hx_member;
		  var hx_assign_salesroom = $('input:radio[name="hx_assign_salesroom"]:checked').val();
		  if(hx_assign_salesroom == 1){
			if(goods_room_ids == ''){
				layer.msg('请选择指定门店');
				layer.close(loadingIndex);
				return false;
			}
		  }
	  }
	 $.ajax({
		url: data.form.action,
		type: data.form.method,
		data: data.field,
		dataType:'json',
		success: function (info) {
			if(info.status == 0)
			{
				layer.msg(info.result.message,{icon: 1,time: 2000});
				layer.close(loadingIndex); 
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
  
  
  form.on('checkbox(hasoption)', function(data){
									
		if(data.elem.checked)
		{
			$('#goodssn').attr('readonly',true);
			$('#productsn').attr('readonly',true);
			$('#weight').attr('readonly',true);
			$('#total').attr('readonly',true);

			$("#tboption").show();
			$("#tbdiscount").show();
			$("#isdiscount_discounts").show();
			$("#isdiscount_discounts_default").hide();
			$("#commission").show();
			$("#commission_default").hide();
			$("#discounts_type1").show().parent().show();
			refreshOptions();
		}else{
			$('#weight').removeAttr('readonly');
			$('#total').removeAttr('readonly');
			$("#tboption").hide();
			refreshOptions();

			$("#isdiscount_discounts").hide();
			var isdiscount_discounts = $("#isdiscount_discounts").html();
			$("#isdiscount_discounts").html('');
			
			$("#isdiscount_discounts").html(isdiscount_discounts);
			

			$("#tbdiscount").hide();
			$("#isdiscount_discounts_default").show();

			$("#commission_default").show();

			$('#goodssn').removeAttr('readonly');
			$('#productsn').removeAttr('readonly');

			$("#discounts_type1").hide().parent().hide();
			$("#discounts_type0").click();	
			$(this).prop("checked", false);
		}
		
		form.render('checkbox');
	});	
	
	$('#chose_agent_id2').click(function(){
		cur_open_div = $(this).attr('data-input');
		$.post("<?php echo U('goods/query_normal', array('template' => 'mult', 'unselect_goodsid' => $id));?>", {}, function(shtml){
		 layer.open({
			type: 1,
			area: '930px',
			content: shtml //注意，如果str是object，那么需要字符拼接。
		  });
		});
	})
	
	
	form.on('checkbox(is_modify_head_commission)', function(data){
    
		if(data.elem.checked)
		{
			$("#head_commission_div").show();
		}else{
			$("#head_commission_div").hide();	
		}
		
		form.render('checkbox');
	});
	
	
	form.on('checkbox(is_community_head_commission)', function(data){
    
		if(data.elem.checked)
		{
			$("#head_commission_div2").show();
		}else{
			$("#head_commission_div2").hide();	
		}
		
		form.render('checkbox');
	});
	

	form.on('checkbox(is_take_vipcard)', function(data){
		if(data.elem.checked)
		{
			$(".card_price_txt").show();
		}else{
			$(".card_price_txt").hide();
		}

		form.render('checkbox');
		refreshOptions();
	});
	  
})


function cancle_bind(obj,sdiv)
{
	$('#'+sdiv).val('');
	$(obj).parent().parent().remove();
}
function cancle_room_bind(obj){
	$(obj).parent().parent().parent().remove();
}
</script> 


<script>
    $(function () {
        // 拖拽时开始滚动的间距
        var scrollingSensitivity = 20
        // 拖拽时滚动速度
        let scrollingSpeed = 20
        // 拖拽前的父级节点
        let dragBeforeParentNode = null
        // 初始化拖拽函数
        $('.multi-img-details').sortable({
            // 自适应placeholder的大小
            forceHelperSize: true,
            // 拖拽时的鼠标形状
            cursor: '-webkit-grabbing',
            // 拖拽的父级节点(该节点一定要注意，配置错误会导致当前屏幕外的元素没法自动滚动拖拽，两列之间拖拽的滚动也会出问题)
            appendTo: '.layui-form-item',
            // 拖拽时的倾斜度
            rotate: '5deg',
            // 延迟时间(毫秒)，避免和click同时操作时出现的冲突
            delay: 0,
            // 以clone方式拖拽
            helper: 'clone',
            // 拖拽到边框出现滚动的间距，
            scrollSensitivity: scrollingSensitivity,
            // 应用于拖拽空白区域的样式
            placeholder: 'portlet-placeholder ui-state-highlight',
            // 允许拖拽预留空白区域
            forcePlaceholderSize: false,
            // 多个列表之间的拖拽的dom元素
            connectWith: '.multi-img-details',
            // 鼠标到区域则填充
            tolerance: "pointer",
            // 可以拖拽的项
            items: '.multi-item',
            // 填充动画
            revert: 0,
            // 拖拽结束函数
            stop: (e, ui) => {
                // 当前拽入的元素
                let item = $(ui.item)
                // 当前拽入元素的下标
                let index = item.index()
                let kid = ''
                // xxxx 这里面可以操作数据更新
            },
            // 开始拖拽时的函数
            start: (e, ui) => {
                // 拖拽前的父级节点
                dragBeforeParentNode = ui.item[0].parentNode
                // 让placeholder和源高度一致
                ui.helper.addClass('item').width(110)
                // xxxx  这里可以记录一些拖拽前的元素属性
            },
            // 处理两列滚动条问题
            sort: function (event, ui) {
                var scrollContainer = ui.placeholder[0].parentNode
                // 设置拽入的列表的滚动位置
                var overflowOffset = $(scrollContainer).offset()
                if ((overflowOffset.top + scrollContainer.offsetHeight) - event.pageY <
                    scrollingSensitivity) {
                    scrollContainer.scrollTop = scrollContainer.scrollTop + scrollingSpeed
                } else if (event.pageY - overflowOffset.top < scrollingSensitivity) {
                    scrollContainer.scrollTop = scrollContainer.scrollTop - scrollingSpeed
                }
            }
        }).disableSelection()
    })
</script>



<script language="javascript">
						var chose_cate = -1;
						var chose_cate_id_arr = [];
							$(function(){
								
								$('#cates2').on('change',function(){
									var s_length = $("#cates2 option:selected").length -1;
									var options_name = $("#cates2 option:selected:eq("+s_length+")").text();
									var options_str =  $("#cates2 option:selected:eq("+s_length+")").attr('data-names');
									
									if(s_length > chose_cate)
									{
										chose_cate++;
										var cur_cate_id = '';
										$("#cates2 option:selected").each(function(){
											var tmp_cate_id = parseInt($(this).val());
											if( $.inArray( tmp_cate_id, chose_cate_id_arr ) == -1)
											{
												chose_cate_id_arr.push( parseInt(tmp_cate_id) );
												cur_cate_id = tmp_cate_id;
											}
										})
										addSpecList(options_name,options_str,cur_cate_id);
									}else{
										chose_cate--;
										var new_chose_cate_id_arr = [];
										if(chose_cate_id_arr.length == 1)
										{
											$('.spec_class_'+chose_cate_id_arr[0]).remove();
										}
										
										$("#cates2 option:selected").each(function(){
											var tmp_cate_id = parseInt( $(this).val() );
											if( $.inArray( tmp_cate_id, chose_cate_id_arr ) != -1)
											{
												new_chose_cate_id_arr.push( parseInt(tmp_cate_id) );
												chose_cate_id_arr.splice($.inArray( tmp_cate_id, chose_cate_id_arr ), 1);
											}
										})
										if(chose_cate_id_arr.length == 1)
										{
											$('.spec_class_'+chose_cate_id_arr[0]).remove();
										}
										
										chose_cate_id_arr = new_chose_cate_id_arr;
										refreshOptions();
									}
									
									
								})
								$(document).on('input propertychange change', '#specs input', function () {
									
									window.optionchanged = true;
									$('#optiontip').show();
								});
								
								$(document).on('input propertychange change', '#specs input', function () {
								
									window.optionchanged = true;
									$('#optiontip').show();
								});


								$(".spec_item_thumb").find('i').click(function(){
									var group  =$(this).parent();
									group.find('img').attr('src',"{SNAILFISH_LOCAL}static/images/nopic100.jpg");
									group.find(':hidden').val('');
									$(this).hide();
									group.find('img').popover('destroy');
								});

								
									
								
							});
							function selectSpecItemImage(obj){
								util.image('',function(val){
									$(obj).attr('src',val.url).popover({
										trigger: 'hover',
										html: true,
										container: $(document.body),
										content: "<img src='" + val.url  + "' style='width:100px;height:100px;' />",
										placement: 'top'
									});

									var group  =$(obj).parent();

									group.find(':hidden').val(val.attachment), group.find('i').show().unbind('click').click(function(){
										$(obj).attr('src',"{SNAILFISH_LOCAL}static/images/nopic100.jpg");
										group.find(':hidden').val('');
										group.find('i').hide();
										$(obj).popover('destroy');
									});
								});
							}
							function addSpecList(options_name,spec_str, cur_cate_id)
							{
							
								var len = $(".spec_item").length;
								$("#add-spec").html("正在处理...").attr("disabled", "true").toggleClass("btn-primary");
								var url = "<?php echo U('goods/mult_tpl',array('tpl'=>'spec'));?>";
								$.ajax({
									"url": url,
									type:'post',
									data:{options_name:options_name,spec_str:spec_str,cur_cate_id:cur_cate_id},
									success:function(data){
										$("#add-spec").html('<i class="fa fa-plus"></i> 新建规格').removeAttr("disabled").toggleClass("btn-primary"); ;
										$('#specs').append(data);
										var len = $(".add-specitem").length -1;
										$(".add-specitem:eq(" +len+ ")").focus();
										refreshOptions();
									}
								});
							}
							
							function addSpec(){
								var len = $(".spec_item").length;
								$("#add-spec").html("正在处理...").attr("disabled", "true").toggleClass("btn-primary");
								var url = "<?php echo U('goods/tpl',array('tpl'=>'spec'));?>";
								$.ajax({
									"url": url,
									success:function(data){
										$("#add-spec").html('<i class="fa fa-plus"></i> 新建规格').removeAttr("disabled").toggleClass("btn-primary"); ;
										$('#specs').append(data);
										var len = $(".add-specitem").length -1;
										$(".add-specitem:eq(" +len+ ")").focus();
										refreshOptions();
									}
								});
							}
							function removeSpec(specid){
								if (confirm('确认要删除此规格?')){
									$("#spec_" + specid).remove();
									refreshOptions();
								}
							}
							function addSpecItem(specid){
									 $("#add-specitem-" + specid).html("正在处理...").attr("disabled", "true");
								var url = "<?php echo U('goods/tpl',array('tpl'=>'specitem'));?>" + "&specid=" + specid;
								$.ajax({
									"url": url,
									success:function(data){
										$("#add-specitem-" + specid).html('<i class="fa fa-plus"></i> 添加规格项').removeAttr("disabled");
										$('#spec_item_' + specid).append(data);
										var len = $("#spec_" + specid + " .spec_item_title").length -1;
										$("#spec_" + specid + " .spec_item_title:eq(" +len+ ")").focus();
										refreshOptions
																								if(type==3 && virtual==0){
																											$(".choosetemp").show();
																								 }
									}
								});
							}
							function removeSpecItem(obj){
								$(obj).closest('.spec_item_item').remove();
								refreshOptions();
							}

							function refreshOptions(){
								// 刷新后重置
								window.optionchanged = false;
								$('#optiontip').hide();


						 var html = '<table class="table table-bordered table-condensed"><thead><tr class="active">';
							var specs = [];
								 if($('.spec_item').length<=0){
									 $("#options").html('');
									 $("#discount").html('');
									 $("#isdiscount_discounts").html('');
									 $("#commission").html('');
									
									 return;
								 }
							$(".spec_item").each(function(i){
								var _this = $(this);

								var spec = {
									id: _this.find(".spec_id").val(),
									title: _this.find(".spec_title").val()
								};

								var items = [];
								_this.find(".spec_item_item").each(function(){
									var __this = $(this);
									var item = {
										id: __this.find(".spec_item_id").val(),
										title: __this.find(".spec_item_title").val(),
																								virtual: __this.find(".spec_item_virtual").val(),
										show:__this.find(".spec_item_show").get(0).checked?"1":"0"
									}
									items.push(item);
								});
								spec.items = items;
								specs.push(spec);
							});
							specs.sort(function(x,y){
								if (x.items.length > y.items.length){
									return 1;
								}
								if (x.items.length < y.items.length) {
									return -1;
								}
							});

							var len = specs.length;
							var newlen = 1;
							var h = new Array(len);
							var rowspans = new Array(len);
							for(var i=0;i<len;i++){
								html+="<th>" + specs[i].title + "</th>";
								var itemlen = specs[i].items.length;
								if(itemlen<=0) { itemlen = 1 };
								newlen*=itemlen;

								h[i] = new Array(newlen);
								for(var j=0;j<newlen;j++){
									h[i][j] = new Array();
								}
								var l = specs[i].items.length;
								rowspans[i] = 1;
								for(j=i+1;j<len;j++){
									rowspans[i]*= specs[j].items.length;
								}
							}
							var is_take_vipcard = $('input[name="is_take_vipcard"]').prop('checked');
							html += '<th><div class=""><div style="padding-bottom:10px;text-align:center;">库存<label style="color:red;font-size:16px;font-weight:900">*</label></div><div class="input-group"><input type="text" class="form-control  input-sm option_stock_all" VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_stock\');"></a></span></div></div></th>';
							

							
							html += '<th class="type-4"><div class=""><div style="padding-bottom:10px;text-align:center;">售价<label style="color:red;font-size:16px;font-weight:900">*</label></div><div class="input-group"><input type="text" class="form-control  input-sm option_marketprice_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_marketprice\');"></a></span></div></div></th>';
							html+='<th class="type-4"><div class=""><div style="padding-bottom:10px;text-align:center;">原价<label style="color:red;font-size:16px;font-weight:900">*</label></div><div class="input-group"><input type="text" class="form-control  input-sm option_productprice_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_productprice\');"></a></span></div></div></th>';

							<?php if( !empty($is_open_vipcard_buy) && $is_open_vipcard_buy == 1){ ?>
									html += '<th class="type-4 cardprice_title"><div class=""><div style="padding-bottom:10px;text-align:center;">付费会员专享价</div><div class="input-group"><input type="text" class="form-control  input-sm option_cardprice_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_cardprice\');"></a></span></div></div></th>';
							<?php } ?>

							html+='<th class="type-4"><div class=""><div style="padding-bottom:10px;text-align:center;">成本价</div><div class="input-group"><input type="text" class="form-control  input-sm option_costprice_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_costprice\');"></a></span></div></div></th>';
							html+='<th><div class=""><div style="padding-bottom:10px;text-align:center;">编码</div><div class="input-group"><input type="text" class="form-control  input-sm option_goodssn_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_goodssn\');"></a></span></div></div></th>';
							
							html+='<th><div class=""><div style="padding-bottom:10px;text-align:center;">重量（克）</div><div class="input-group"><input type="text" class="form-control  input-sm option_weight_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'option_weight\');"></a></span></div></div></th>';
							html+='</tr></thead>';

							for(var m=0;m<len;m++){
								var k = 0,kid = 0,n=0;
								for(var j=0;j<newlen;j++){
									var rowspan = rowspans[m];
									if( j % rowspan==0){
										h[m][j]={title: specs[m].items[kid].title, virtual: specs[m].items[kid].virtual,html: "<td class='full' rowspan='" +rowspan + "'>"+ specs[m].items[kid].title+"</td>\r\n",id: specs[m].items[kid].id};
									}
									else{
									
											h[m][j]={title:specs[m].items[kid].title,virtual: specs[m].items[kid].virtual, html: "",id: specs[m].items[kid].id};
									}	
									n++;
									if(n==rowspan){
									kid++; if(kid>specs[m].items.length-1) { kid=0; }
									n=0;
									}
								}
							}

							var hh = "";
							for(var i=0;i<newlen;i++){
								hh+="<tr>";
								var ids = [];
								var titles = [];
								var virtuals = [];
								/*for(var j=0;j<len;j++){
									hh+=h[j][i].html;
									ids.push( h[j][i].id);
									titles.push( h[j][i].title);
												   virtuals.push( h[j][i].virtual);
								}*/
								for(var j=len-1;j >= 0;j--){
									hh+=h[j][i].html;
									ids.push( h[j][i].id);
									titles.push( h[j][i].title);
									virtuals.push( h[j][i].virtual);
								}
								ids =ids.join('_');
								titles= titles.join('+');

								var val ={ id : "",title:titles, stock : "",presell : "",costprice : "",productprice : "",<?php if( !empty($is_open_vipcard_buy) && $is_open_vipcard_buy == 1 ){ ?>cardprice:"",<?php } ?>marketprice : "",weight:"",productsn:"",goodssn:"",virtual:virtuals };

								if( $(".option_id_" + ids).length>0){
									val ={
										id : $(".option_id_" + ids+":eq(0)").val(),
										title: titles,
										stock : $(".option_stock_" + ids+":eq(0)").val(),
										presell : $(".option_presell_" + ids+":eq(0)").val(),
										costprice : $(".option_costprice_" + ids+":eq(0)").val(),
										<?php if( !empty($is_open_vipcard_buy) && $is_open_vipcard_buy == 1){ ?>
										cardprice : $(".option_cardprice_" + ids+":eq(0)").val(),
										cardprice_hi : $(".option_cardprice_hi_" + ids+":eq(0)").val(),
										<?php } ?>
										productprice : $(".option_productprice_" + ids+":eq(0)").val(),
										marketprice : $(".option_marketprice_" + ids +":eq(0)").val(),
															goodssn : $(".option_goodssn_" + ids +":eq(0)").val(),
															productsn : $(".option_productsn_" + ids +":eq(0)").val(),
										weight : $(".option_weight_" + ids+":eq(0)").val(),
														  virtual : virtuals
									}
								}

								hh += '<td>'
							
								hh += '<input name="option_stock_' + ids +'" type="text" class="form-control option_stock option_stock_' + ids +'" value="' +(val.stock=='undefined'?'':val.stock )+'"/></td>';
							
								hh += '<input name="option_id_' + ids+'" type="hidden" class="form-control option_id option_id_' + ids +'" value="' +(val.id=='undefined'?'':val.id )+'"/>';
								hh += '<input name="option_ids[]" type="hidden" class="form-control option_ids option_ids_' + ids +'" value="' + ids +'"/>';
								hh += '<input name="option_title_' + ids +'" type="hidden" class="form-control option_title option_title_' + ids +'" value="' +(val.title=='undefined'?'':val.title )+'"/></td>';
								hh += '<input name="option_virtual_' + ids +'" type="hidden" class="form-control option_virtual option_virtual_' + ids +'" value="' +(val.virtual=='undefined'?'':val.virtual )+'"/></td>';
								hh += '<input name="option_cardprice_hi_' + ids +'" type="hidden" class="form-control option_virtual option_cardprice_hi_' + ids +'" value="' +(val.cardprice=='undefined'?'':val.cardprice )+'"/></td>';
								hh += '</td>';
								//hh += '<td class="type-4"><input data-name="option_presell_' + ids+'" type="text" class="form-control option_presell option_presell_' + ids +'" value="' +(val.presell=='undefined'?'':val.presell )+'"/></td>';
								hh += '<td class="type-4"><input name="option_marketprice_' + ids+'" type="text" class="form-control option_marketprice option_marketprice_' + ids +'" value="' +(val.marketprice=='undefined'?'':val.marketprice )+'"/></td>';
								hh += '<td class="type-4"><input name="option_productprice_' + ids+'" type="text" class="form-control option_productprice option_productprice_' + ids +'" " value="' +(val.productprice=='undefined'?'':val.productprice )+'"/></td>';
								<?php if( !empty($is_open_vipcard_buy) && $is_open_vipcard_buy == 1){ ?>
										if(typeof(val.cardprice) == "undefined" || val.cardprice == 'undefined' || val.cardprice == null){
											val.cardprice = "";
										}
										if(val.cardprice == ""){
											if(typeof(val.cardprice_hi) == "undefined" || val.cardprice_hi == 'undefined' || val.cardprice_hi == null){
												val.cardprice = "";
											}else{
												val.cardprice = val.cardprice_hi;
											}
										}
										console.log(val.cardprice+'=='+val.cardprice_hi);
										hh += '<td class="type-4 cardprice_td"><input name="option_cardprice_' + ids + '" type="text" class="form-control option_cardprice option_cardprice_' + ids + '" " value="' + (val.cardprice=='undefined' ? '' : val.cardprice ) + '"/></td>';
								<?php } ?>
								hh += '<td class="type-4"><input name="option_costprice_' +ids+'" type="text" class="form-control option_costprice option_costprice_' + ids +'" " value="' +(val.costprice=='undefined'?'':val.costprice )+'"/></td>';
								hh += '<td><input name="option_goodssn_' +ids+'" type="text" class="form-control option_goodssn option_goodssn_' + ids +'" " value="' +(val.goodssn=='undefined'?'':val.goodssn )+'"/></td>';
								//hh += '<td><input data-name="option_productsn_' +ids+'" type="text" class="form-control option_productsn option_productsn_' + ids +'" " value="' +(val.productsn=='undefined'?'':val.productsn )+'"/></td>';
								hh += '<td><input name="option_weight_' + ids +'" type="text" class="form-control option_weight option_weight_' + ids +'" " value="' +(val.weight=='undefined'?'':val.weight )+'"/></td>';
								hh += "</tr>";
							}
							html+=hh;
							html+="</table>";
							$("#options").html(html);
								refreshDiscount();
								refreshIsDiscount();

								if(window.type=='4'){
									$('.type-4').hide();
								}else{
									$('.type-4').show();
								}

								if(is_take_vipcard) {
									$('.cardprice_td').show();
									$('.cardprice_title').show();
								}else{
									$('.cardprice_td').hide();
									$('.cardprice_title').hide();
								}
						}

							function refreshDiscount() {
								var html = '<table class="table table-bordered table-condensed"><thead><tr class="active">';
								var specs = [];

								$(".spec_item").each(function (i) {
									var _this = $(this);

									var spec = {
										id: _this.find(".spec_id").val(),
										title: _this.find(".spec_title").val()
									};

									var items = [];
									_this.find(".spec_item_item").each(function () {
										var __this = $(this);
										var item = {
											id: __this.find(".spec_item_id").val(),
											title: __this.find(".spec_item_title").val(),
											virtual: __this.find(".spec_item_virtual").val(),
											show: __this.find(".spec_item_show").get(0).checked ? "1" : "0"
										}
										items.push(item);
									});
									spec.items = items;
									specs.push(spec);
								});
								specs.sort(function (x, y) {
									if (x.items.length > y.items.length) {
										return 1;
									}
									if (x.items.length < y.items.length) {
										return -1;
									}
								});

								var len = specs.length;
								var newlen = 1;
								var h = new Array(len);
								var rowspans = new Array(len);
								for (var i = 0; i < len; i++) {
									html += "<th>" + specs[i].title + "</th>";
									var itemlen = specs[i].items.length;
									if (itemlen <= 0) {
										itemlen = 1
									}
									;
									newlen *= itemlen;

									h[i] = new Array(newlen);
									for (var j = 0; j < newlen; j++) {
										h[i][j] = new Array();
									}
									var l = specs[i].items.length;
									rowspans[i] = 1;
									for (j = i + 1; j < len; j++) {
										rowspans[i] *= specs[j].items.length;
									}
								}

								<?php foreach( $levels as $level ){ ?>
								<?php if( $level['key']=='default'){ ?>
								html += '<th><div class=""><div style="padding-bottom:10px;text-align:center;"><?php echo ($level['levelname']); ?></div><div class="input-group"><input type="text" class="form-control  input-sm discount_<?php echo ($level["key"]); ?>_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'discount_<?php echo ($level["key"]); ?>\');"></a></span></div></div></th>';
								<?php  }else{ ?>
								html += '<th><div class=""><div style="padding-bottom:10px;text-align:center;"><?php echo ($level['levelname']); ?></div><div class="input-group"><input type="text" class="form-control  input-sm discount_level<?php echo ($level['id']); ?>_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'discount_level<?php echo ($level['id']); ?>\');"></a></span></div></div></th>';
								<?php } ?>
								<?php } ?>
								html += '</tr></thead>';

								for (var m = 0; m < len; m++) {
									var k = 0, kid = 0, n = 0;
									for (var j = 0; j < newlen; j++) {
										var rowspan = rowspans[m];
										if (j % rowspan == 0) {
											h[m][j] = {
												title: specs[m].items[kid].title,
												virtual: specs[m].items[kid].virtual,
												html: "<td class='full' rowspan='" + rowspan + "'>" + specs[m].items[kid].title + "</td>\r\n",
												id: specs[m].items[kid].id
											};
										}
										else {
											h[m][j] = {
												title: specs[m].items[kid].title,
												virtual: specs[m].items[kid].virtual,
												html: "",
												id: specs[m].items[kid].id
											};
										}
										n++;
										if (n == rowspan) {
											kid++;
											if (kid > specs[m].items.length - 1) {
												kid = 0;
											}
											n = 0;
										}
									}
								}

								var hh = "";
								for (var i = 0; i < newlen; i++) {
									hh += "<tr>";
									var ids = [];
									var titles = [];
									var virtuals = [];
									for (var j = 0; j < len; j++) {
										hh += h[j][i].html;
										ids.push(h[j][i].id);
										titles.push(h[j][i].title);
										virtuals.push(h[j][i].virtual);
									}
									ids = ids.join('_');
									titles = titles.join('+');
									var val = {
										id: "",
										title: titles,
										<?php foreach( $levels as $level ){ ?>
										<?php if( $level['key']=='default'){ ?>
										level<?php echo ($level['key']); ?>: '',
										<?php  }else{ ?>
										level<?php echo ($level['id']); ?>: '',
										<?php } ?>
										<?php } ?>
										costprice: "",
										presell: "",
										productprice: "",
										<?php if( !empty($is_open_vipcard_buy) && $is_open_vipcard_buy == 1){ ?>
										cardprice: "",
										<?php } ?>
										marketprice: "",
										weight: "",
										productsn: "",
										goodssn: "",
										virtual: virtuals
									};

									var val ={ id : "",title:titles,<?php foreach( $levels as $level ){ if( $level['key']=='default'){ ?> level<?php echo ($level['key']); ?>: '',<?php  }else{ ?> level<?php echo ($level['id']); ?>: '',<?php } } ?>costprice : "",productprice : "",marketprice : "",weight:"",productsn:"",goodssn:"",virtual:virtuals };
									if ($(".discount_id_" + ids).length > 0) {
										val = {
											id: $(".discount_id_" + ids + ":eq(0)").val(),
											title: titles,
											<?php foreach( $levels as $level ){ ?>
										<?php if( $level['key']=='default'){ ?>
											level<?php echo ($level['key']); ?>: $(".discount_<?php echo ($level['key']); ?>_" + ids + ":eq(0)").val(),
										<?php  }else{ ?>
											level<?php echo ($level['id']); ?>: $(".discount_level<?php echo ($level['id']); ?>_" + ids + ":eq(0)").val(),
										<?php } ?>
											<?php } ?>
											costprice: $(".discount_costprice_" + ids + ":eq(0)").val(),
											presell: $(".discount_presell_" + ids + ":eq(0)").val(),
											productprice: $(".discount_productprice_" + ids + ":eq(0)").val(),
											<?php if( !empty($is_open_vipcard_buy) && $is_open_vipcard_buy == 1){ ?>
											cardprice: $(".discount_cardprice_" + ids + ":eq(0)").val(),
											<?php } ?>
											marketprice: $(".discount_marketprice_" + ids + ":eq(0)").val(),
											presell: $(".discount_presell_" + ids + ":eq(0)").val(),
											goodssn: $(".discount_goodssn_" + ids + ":eq(0)").val(),
											productsn: $(".discount_productsn_" + ids + ":eq(0)").val(),
											weight: $(".discount_weight_" + ids + ":eq(0)").val(),
											virtual: virtuals
										}
									}

									<?php foreach( $levels as $level ){ ?>
									hh += '<td>'
									<?php if( $level['key']=='default'){ ?>
									hh += '<input data-name="discount_level_<?php echo ($level['key']); ?>_' + ids +'"type="text" class="form-control discount_<?php echo ($level['key']); ?> discount_<?php echo ($level['key']); ?>_' + ids +'" value="' +(val.level<?php echo ($level['key']); ?>=='undefined'?'':val.level<?php echo ($level['key']); ?> )+'"/>';
									<?php  }else{ ?>
									hh += '<input data-name="discount_level_<?php echo ($level['id']); ?>_' + ids +'"type="text" class="form-control discount_level<?php echo ($level['id']); ?> discount_level<?php echo ($level['id']); ?>_' + ids +'" value="' +(val.level<?php echo ($level['id']); ?>=='undefined'?'':val.level<?php echo ($level['id']); ?> )+'"/>';
									<?php } ?>
									hh += '</td>';
									<?php } ?>
									hh += '<input data-name="discount_id_' + ids+'"type="hidden" class="form-control discount_id discount_id_' + ids +'" value="' +(val.id=='undefined'?'':val.id )+'"/>';
									hh += '<input data-name="discount_ids"type="hidden" class="form-control discount_ids discount_ids_' + ids +'" value="' + ids +'"/>';
									hh += '<input data-name="discount_title_' + ids +'"type="hidden" class="form-control discount_title discount_title_' + ids +'" value="' +(val.title=='undefined'?'':val.title )+'"/></td>';
									hh += '<input data-name="discount_virtual_' + ids +'"type="hidden" class="form-control discount_virtual discount_virtual_' + ids +'" value="' +(val.virtual=='undefined'?'':val.virtual )+'"/></td>';
									hh += "</tr>";
								}
								html += hh;
								html += "</table>";
								$("#discount").html(html);
							}

							function refreshIsDiscount() {
								var html = '<table class="table table-bordered table-condensed"><thead><tr class="active">';
								var specs = [];

								$(".spec_item").each(function (i) {
									var _this = $(this);

									var spec = {
										id: _this.find(".spec_id").val(),
										title: _this.find(".spec_title").val()
									};

									var items = [];
									_this.find(".spec_item_item").each(function () {
										var __this = $(this);
										var item = {
											id: __this.find(".spec_item_id").val(),
											title: __this.find(".spec_item_title").val(),
											virtual: __this.find(".spec_item_virtual").val(),
											show: __this.find(".spec_item_show").get(0).checked ? "1" : "0"
										}
										items.push(item);
									});
									spec.items = items;
									specs.push(spec);
								});
								specs.sort(function (x, y) {
									if (x.items.length > y.items.length) {
										return 1;
									}
									if (x.items.length < y.items.length) {
										return -1;
									}
								});

								var len = specs.length;
								var newlen = 1;
								var h = new Array(len);
								var rowspans = new Array(len);
								for (var i = 0; i < len; i++) {
									html += "<th>" + specs[i].title + "</th>";
									var itemlen = specs[i].items.length;
									if (itemlen <= 0) {
										itemlen = 1
									}
									;
									newlen *= itemlen;

									h[i] = new Array(newlen);
									for (var j = 0; j < newlen; j++) {
										h[i][j] = new Array();
									}
									var l = specs[i].items.length;
									rowspans[i] = 1;
									for (j = i + 1; j < len; j++) {
										rowspans[i] *= specs[j].items.length;
									}
								}

								<?php foreach( $levels as $level ){ ?>
								<?php if( $level['key']=='default'){ ?>
								html += '<th><div class=""><div style="padding-bottom:10px;text-align:center;"><?php echo ($level['levelname']); ?></div><div class="input-group"><input type="text" class="form-control  input-sm isdiscount_discounts_<?php echo ($level['key']); ?>_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'isdiscount_discounts_<?php echo ($level['key']); ?>\');"></a></span></div></div></th>';
								<?php  }else{ ?>
								html += '<th><div class=""><div style="padding-bottom:10px;text-align:center;"><?php echo ($level['levelname']); ?></div><div class="input-group"><input type="text" class="form-control  input-sm isdiscount_discounts_level<?php echo ($level['id']); ?>_all"VALUE=""/><span class="input-group-addon"><a href="javascript:;" class="fa fa-angle-double-down" title="批量设置" onclick="setCol(\'isdiscount_discounts_level<?php echo ($level['id']); ?>\');"></a></span></div></div></th>';
								<?php } ?>
								<?php } ?>
								html += '</tr></thead>';

								for (var m = 0; m < len; m++) {
									var k = 0, kid = 0, n = 0;
									for (var j = 0; j < newlen; j++) {
										var rowspan = rowspans[m];
										if (j % rowspan == 0) {
											h[m][j] = {
												title: specs[m].items[kid].title,
												virtual: specs[m].items[kid].virtual,
												html: "<td class='full' rowspan='" + rowspan + "'>" + specs[m].items[kid].title + "</td>\r\n",
												id: specs[m].items[kid].id
											};
										}
										else {
											h[m][j] = {
												title: specs[m].items[kid].title,
												virtual: specs[m].items[kid].virtual,
												html: "",
												id: specs[m].items[kid].id
											};
										}
										n++;
										if (n == rowspan) {
											kid++;
											if (kid > specs[m].items.length - 1) {
												kid = 0;
											}
											n = 0;
										}
									}
								}

								var hh = "";
								for (var i = 0; i < newlen; i++) {
									hh += "<tr>";
									var ids = [];
									var titles = [];
									var virtuals = [];
									for (var j = 0; j < len; j++) {
										hh += h[j][i].html;
										ids.push(h[j][i].id);
										titles.push(h[j][i].title);
										virtuals.push(h[j][i].virtual);
									}
									ids = ids.join('_');
									titles = titles.join('+');
									var val = {
										id: "",
										title: titles,
									<?php foreach( $levels as $level ){ ?>
									<?php if( $level['key']=='default'){ ?>
									level<?php echo ($level['key']); ?>: '',
									<?php  }else{ ?>
									level<?php echo ($level['if']); ?>: '',
									<?php } ?>
									<?php } ?>
									costprice: "",
											presell: "",
											productprice: "",
											marketprice: "",
											weight: "",
											productsn: "",
											goodssn: "",
											virtual: virtuals
								};

									var val ={ id : "",title:titles,<?php foreach( $levels as $level ){ if( $level['key']=='default'){ ?> level<?php echo ($level['key']); ?>: '',<?php  }else{ ?> level<?php echo ($level['id']); ?>: '',<?php } } ?>costprice : "",productprice : "",marketprice : "",weight:"",productsn:"",goodssn:"",virtual:virtuals };
									if ($(".isdiscount_discounts_id_" + ids).length > 0) {
										val = {
											id: $(".isdiscount_discounts_id_" + ids + ":eq(0)").val(),
											title: titles,
										<?php foreach( $levels as $level ){ ?>
										<?php if( $level['key']=='default'){ ?>
										level<?php echo ($level['key']); ?>: $(".isdiscount_discounts_<?php echo ($level['key']); ?>_" + ids + ":eq(0)").val(),
										<?php  }else{ ?>
										level<?php echo ($level['id']); ?>: $(".isdiscount_discounts_level<?php echo ($level['id']); ?>_" + ids + ":eq(0)").val(),
										<?php } ?>
										<?php } ?>
										costprice: $(".isdiscount_discounts_costprice_" + ids + ":eq(0)").val(),
												productprice: $(".isdiscount_discounts_productprice_" + ids + ":eq(0)").val(),
												marketprice: $(".isdiscount_discounts_marketprice_" + ids + ":eq(0)").val(),
												presell: $(".isdiscount_discounts_presell_" + ids + ":eq(0)").val(),
												goodssn: $(".isdiscount_discounts_goodssn_" + ids + ":eq(0)").val(),
												productsn: $(".isdiscount_discounts_productsn_" + ids + ":eq(0)").val(),
												weight: $(".isdiscount_discounts_weight_" + ids + ":eq(0)").val(),
												virtual: virtuals
									}
									}

									<?php foreach( $levels as $level ){ ?>
									hh += '<td>'
									<?php if( $level['key']=='default'){ ?>
									hh += '<input data-name="isdiscount_discounts_level_<?php echo ($level['key']); ?>_' + ids +'"type="text" class="form-control isdiscount_discounts_<?php echo ($level['key']); ?> isdiscount_discounts_<?php echo ($level['key']); ?>_' + ids +'" value="' +(val.level<?php echo ($level['key']); ?>=='undefined'?'':val.level<?php echo ($level['key']); ?> )+'"/>';
									<?php  }else{ ?>
									hh += '<input data-name="isdiscount_discounts_level_<?php echo ($level['id']); ?>_' + ids +'"type="text" class="form-control isdiscount_discounts_level<?php echo ($level['id']); ?> isdiscount_discounts_level<?php echo ($level['id']); ?>_' + ids +'" value="' +(val.level<?php echo ($level['id']); ?>=='undefined'?'':val.level<?php echo ($level['id']); ?> )+'"/>';
									<?php } ?>
									hh += '</td>';
									<?php } ?>
									hh += '<input data-name="isdiscount_discounts_id_' + ids+'"type="hidden" class="form-control isdiscount_discounts_id isdiscount_discounts_id_' + ids +'" value="' +(val.id=='undefined'?'':val.id )+'"/>';
									hh += '<input data-name="isdiscount_discounts_ids"type="hidden" class="form-control isdiscount_discounts_ids isdiscount_discounts_ids_' + ids +'" value="' + ids +'"/>';
									hh += '<input data-name="isdiscount_discounts_title_' + ids +'"type="hidden" class="form-control isdiscount_discounts_title isdiscount_discounts_title_' + ids +'" value="' +(val.title=='undefined'?'':val.title )+'"/></td>';
									hh += '<input data-name="isdiscount_discounts_virtual_' + ids +'"type="hidden" class="form-control isdiscount_discounts_virtual isdiscount_discounts_virtual_' + ids +'" value="' +(val.virtual=='undefined'?'':val.virtual )+'"/></td>';
									hh += "</tr>";
								}
								html += hh;
								html += "</table>";
								$("#isdiscount_discounts").html(html);
							}

							function refreshCommission() {
								var commission_level = <?php echo json_encode($commission_level);?>;
								var html = '<table class="table table-bordered table-condensed"><thead><tr class="active">';
								var specs = [];

								$(".spec_item").each(function (i) {
									var _this = $(this);

									var spec = {
										id: _this.find(".spec_id").val(),
										title: _this.find(".spec_title").val()
									};

									var items = [];
									_this.find(".spec_item_item").each(function () {
										var __this = $(this);
										var item = {
											id: __this.find(".spec_item_id").val(),
											title: __this.find(".spec_item_title").val(),
											virtual: __this.find(".spec_item_virtual").val(),
											show: __this.find(".spec_item_show").get(0).checked ? "1" : "0"
										}
										items.push(item);
									});
									spec.items = items;
									specs.push(spec);
								});
								specs.sort(function (x, y) {
									if (x.items.length > y.items.length) {
										return 1;
									}
									if (x.items.length < y.items.length) {
										return -1;
									}
								});

								var len = specs.length;
								var newlen = 1;
								var h = new Array(len);
								var rowspans = new Array(len);
								for (var i = 0; i < len; i++) {
									html += "<th>" + specs[i].title + "</th>";
									var itemlen = specs[i].items.length;
									if (itemlen <= 0) {
										itemlen = 1
									}
									;
									newlen *= itemlen;

									h[i] = new Array(newlen);
									for (var j = 0; j < newlen; j++) {
										h[i][j] = new Array();
									}
									var l = specs[i].items.length;
									rowspans[i] = 1;
									for (j = i + 1; j < len; j++) {
										rowspans[i] *= specs[j].items.length;
									}
								}

								$.each(commission_level,function (key,level) {
									html += '<th><div class=""><div style="padding-bottom:10px;text-align:center;">'+level.levelname+'</div></div></th>';
								})
								html += '</tr></thead>';

								for (var m = 0; m < len; m++) {
									var k = 0, kid = 0, n = 0;
									for (var j = 0; j < newlen; j++) {
										var rowspan = rowspans[m];
										if (j % rowspan == 0) {
											h[m][j] = {
												title: specs[m].items[kid].title,
												virtual: specs[m].items[kid].virtual,
												html: "<td class='full' rowspan='" + rowspan + "'>" + specs[m].items[kid].title + "</td>\r\n",
												id: specs[m].items[kid].id
											};
										}
										else {
											h[m][j] = {
												title: specs[m].items[kid].title,
												virtual: specs[m].items[kid].virtual,
												html: "",
												id: specs[m].items[kid].id
											};
										}
										n++;
										if (n == rowspan) {
											kid++;
											if (kid > specs[m].items.length - 1) {
												kid = 0;
											}
											n = 0;
										}
									}
								}
								var hh = "";
								for (var i = 0; i < newlen; i++) {
									hh += "<tr>";
									var ids = [];
									var titles = [];
									var virtuals = [];
									for (var j = 0; j < len; j++) {
										hh += h[j][i].html;
										ids.push(h[j][i].id);
										titles.push(h[j][i].title);
										virtuals.push(h[j][i].virtual);
									}
									ids = ids.join('_');
									titles = titles.join('+');

									var val = {
										id: "",
										title: titles,
									<?php foreach( $commission_level as $level ){ ?>
									<?php if( $level["key"] == "default"){ ?>
									level<?php echo ($level['key']); ?>: '',
									<?php  }else{ ?>
									level<?php echo ($level['id']); ?>: '',
									<?php } ?>
									<?php } ?>
									costprice: "",
											presell: "",
											productprice: "",
											marketprice: "",
											weight: "",
											productsn: "",
											goodssn: "",
											virtual: virtuals
								};

									var val ={ id : "",title:titles,<?php foreach( $commission_level as $level ){ ?> <?php if( $level["key"] == "default"){ ?>level<?php echo ($level['key']); ?>: '',<?php  }else{ ?>level<?php echo ($level['id']); ?>: '',<?php } } ?>costprice : "",productprice : "",marketprice : "",weight:"",productsn:"",goodssn:"",virtual:virtuals };
									<?php foreach( $commission_level as $level ){ ?>
									<?php if( $level["key"] == "default"){ ?>
									var level<?php echo ($level['key']); ?> = new Array(3);
									$(".commission_<?php echo ($level['key']); ?>_"+ ids).each(function(index,val){
										level<?php echo ($level['key']); ?>[index] = val;
									})
									<?php  }else{ ?>
									var level<?php echo ($level['id']); ?> = new Array(3);
									$(".commission_level<?php echo ($level['id']); ?>_"+ ids).each(function(index,val){
										level<?php echo ($level['id']); ?>[index] = val;
									})
									<?php } ?>
									<?php } ?>
									if ($(".commission_id_" + ids).length > 0) {
										val = {
											id: $(".commission_id_" + ids + ":eq(0)").val(),
											title: titles,
											costprice: $(".commission_costprice_" + ids + ":eq(0)").val(),
											presell: $(".commission_presell_" + ids + ":eq(0)").val(),
												productprice: $(".commission_productprice_" + ids + ":eq(0)").val(),
												marketprice: $(".commission_marketprice_" + ids + ":eq(0)").val(),
												goodssn: $(".commission_goodssn_" + ids + ":eq(0)").val(),
												productsn: $(".commission_productsn_" + ids + ":eq(0)").val(),
												weight: $(".commission_weight_" + ids + ":eq(0)").val(),
												virtual: virtuals
										}
									}
									<?php foreach( $commission_level as $level ){ ?>
									hh += '<td>';
									var level_temp = <?php if( $level['key'] == 'default'){ ?>level<?php echo ($level['key']); }else{ ?>level<?php echo ($level['id']); } ?>;
									if (len >= i && typeof (level_temp) != 'undefined')
									{
										if('<?php echo ($level['key']); ?>' == 'default')
										{
											for (var li = 0; li<<?php echo ($shopset_level); ?>;li++)
											{
												if (typeof (level_temp[li])!= "undefined")
												{
													hh += '<input data-name="commission_level_<?php echo ($level['key']); ?>_' +ids+ '"  type="text" class="form-control commission_<?php echo ($level['key']); ?> commission_<?php echo ($level['key']); ?>_' +ids+ '" value="' +$(level_temp[li]).val()+ '" style="display:inline;width: '+96/parseInt(<?php echo ($shopset_level); ?>)+'%;"/> ';
												}
												else
												{
													hh += '<input data-name="commission_level_<?php echo ($level['key']); ?>_' +ids+ '"  type="text" class="form-control commission_<?php echo ($level['key']); ?> commission_<?php echo ($level['key']); ?>_' +ids+ '" value="" style="display:inline;width: '+96/parseInt(<?php echo ($shopset_level); ?>)+'%;"/> ';
												}
											}
										}
										else
										{
											for (var li = 0; li<<?php echo ($shopset_level); ?>;li++)
											{
												if (typeof (level_temp[li])!= "undefined")
												{
													hh += '<input data-name="commission_level_<?php echo ($level['id']); ?>_' +ids+ '"  type="text" class="form-control commission_level<?php echo ($level['id']); ?> commission_level<?php echo ($level['id']); ?>_' +ids+ '" value="' +$(level_temp[li]).val()+ '" style="display:inline;width: '+96/parseInt(<?php echo ($shopset_level); ?>)+'%;"/> ';
												}
												else
												{
													hh += '<input data-name="commission_level_<?php echo ($level['id']); ?>_' +ids+ '"  type="text" class="form-control commission_level<?php echo ($level['id']); ?> commission_level<?php echo ($level['id']); ?>_' +ids+ '" value="" style="display:inline;width: '+96/parseInt(<?php echo ($shopset_level); ?>)+'%;"/> ';
												}
											}
										}
									}
									else
									{
										if('<?php echo ($level['key']); ?>' == 'default')
										{
											for (var li = 0; li<<?php echo ($shopset_level); ?>;li++)
											{
												if (typeof (level_temp[li])!= "undefined")
												{
													hh += '<input data-name="commission_level_<?php echo ($level['key']); ?>_' +ids+ '"  type="text" class="form-control commission_<?php echo ($level['key']); ?> commission_<?php echo ($level['key']); ?>_' +ids+ '" value="' +$(level_temp[li]).val()+ '" style="display:inline;width: '+96/parseInt(<?php echo ($shopset_level); ?>)+'%;"/> ';
												}
												else
												{
													hh += '<input data-name="commission_level_<?php echo ($level['key']); ?>_' +ids+ '"  type="text" class="form-control commission_<?php echo ($level['key']); ?> commission_<?php echo ($level['key']); ?>_' +ids+ '" value="" style="display:inline;width: '+96/parseInt(<?php echo ($shopset_level); ?>)+'%;"/> ';
												}
											}
										}
										else
										{
											for (var li = 0; li<<?php echo ($shopset_level); ?>;li++)
											{
												if (typeof (level_temp[li])!= "undefined")
												{
													hh += '<input data-name="commission_level_<?php echo ($level['id']); ?>_' +ids+ '"  type="text" class="form-control commission_level<?php echo ($level['id']); ?> commission_level<?php echo ($level['id']); ?>_' +ids+ '" value="' +$(level_temp[li]).val()+ '" style="display:inline;width: '+96/parseInt(<?php echo ($shopset_level); ?>)+'%;"/> ';
												}
												else
												{
													hh += '<input data-name="commission_level_<?php echo ($level['id']); ?>_' +ids+ '"  type="text" class="form-control commission_level<?php echo ($level['id']); ?> commission_level<?php echo ($level['id']); ?>_' +ids+ '" value="" style="display:inline;width: '+96/parseInt(<?php echo ($shopset_level); ?>)+'%;"/> ';
												}
											}
										}
									}
									hh += '</td>';
									<?php } ?>
									hh += '<input data-name="commission_id_' + ids+'"type="hidden" class="form-control commission_id commission_id_' + ids +'" value="' +(val.id=='undefined'?'':val.id )+'"/>';
									hh += '<input data-name="commission_ids"type="hidden" class="form-control commission_ids commission_ids_' + ids +'" value="' + ids +'"/>';
									hh += '<input data-name="commission_title_' + ids +'"type="hidden" class="form-control commission_title commission_title_' + ids +'" value="' +(val.title=='undefined'?'':val.title )+'"/></td>';
									hh += '<input data-name="commission_virtual_' + ids +'"type="hidden" class="form-control commission_virtual commission_virtual_' + ids +'" value="' +(val.virtual=='undefined'?'':val.virtual )+'"/></td>';
									hh += "</tr>";
								}
								html += hh;
								html += "</table>";
								$("#commission").html(html);
							}

						function setCol(cls){
							$("."+cls).val( $("."+cls+"_all").val());
						}
						function showItem(obj){
							var show = $(obj).get(0).checked?"1":"0";
							$(obj).parents('.spec_item_item').find('.spec_item_show:eq(0)').val(show);
						}
						function nofind(){
							var img=event.srcElement;
							img.src="./resource/image/module-nopic-small.jpg";
							img.onerror=null;
						}

							function choosetemp(id){
							$('#modal-module-chooestemp').modal();
							$('#modal-module-chooestemp').data("temp",id);
						}
						function addtemp(){
							var id = $('#modal-module-chooestemp').data("temp");
							var temp_id = $('#modal-module-chooestemp').find("select").val();
							var temp_name = $('#modal-module-chooestemp option[value='+temp_id+']').text();
							//alert(temp_id+":"+temp_name);
							$("#temp_name_"+id).val(temp_name);
							$("#temp_id_"+id).val(temp_id);
							$('#modal-module-chooestemp .close').click();
							refreshOptions()
						}

						function setinterval(type)
						{
							var intervalfloor =$('#intervalfloor').val();
							if(intervalfloor=="")
							{
								intervalfloor=0;
							}
							intervalfloor = parseInt(intervalfloor);

							if(type=='plus')
							{
								if(intervalfloor==3)
								{
									tip.msgbox.err("最多添加三个区间价格");
									return;
								}
								intervalfloor=intervalfloor+1;
							}
							else if(type=='minus')
							{
								if(intervalfloor==0)
								{
									tip.msgbox.err("请最少添加一个区间价格");
									return;
								}
								intervalfloor=intervalfloor-1;
							}else
							{
								return;
							}

							if(intervalfloor<1)
							{

								$('#interval1').hide();
								$('#intervalnum1').val("");
								$('#intervalprice1').val("");
							}else
							{
								$('#interval1').show();
							}

							if(intervalfloor<2)
							{

								$('#interval2').hide();
								$('#intervalnum2').val("");
								$('#intervalprice2').val("");
							}else
							{
								$('#interval2').show();
							}

							if(intervalfloor<3)
							{

								$('#interval3').hide();
								$('#intervalnum3').val("");
								$('#intervalprice3').val("");
							}else
							{
								$('#interval3').show();
							}


							$('#intervalfloor').val(intervalfloor);

						}


						</script>
						<script language="javascript">
							$(function() {
								
								
									
								
							})
						</script>


<script>
	var heads_page = 1;

	$("body").delegate("#batchheads_page .pagination a","click",function(){
		heads_page = $(this).attr('page');
		search_heads_do();
	})
	function search_heads()
	{
		heads_page = 1;
		search_heads_do();
	}
	function search_heads_do()
	{
		var province_name = $('#sel-provance').val();
		var city_name = $('#sel-city').val();
		var area_name = $('#sel-area').val();
		var country_name = $('#sel-street').val();
		var keyword = $('#supply_id_input').val();

		$.post("<?php echo U('communityhead/query_head');?>",{page:heads_page,'province_name':province_name,'city_name': city_name,'area_name':area_name,'country_name':country_name,'keyword':keyword},
				function (ret) {
					if (ret.status == 1) {
						$('#batchheads_content').html(ret.html);
						$('#batchheads_page').html(ret.page_html);
						return
					} else {
						layer.msg('修改失败');
					}
				}, 'json');
	}
	//显示批量分类
	$('#batchcatesbut').click(function () {
		//  var index = layer.load(1);
		var index = layer.open({
			type: 1,
			area: '500px',
			title: '选取分类'
			,content: $('#batchcates_html').html(),
			yes: function(index, layero){
				//do something
				layer.close(index); //如果设定了yes回调，需进行手工关闭
			}
		});
	})

	$('#batch_head_group').click(function () {
		//  var index = layer.load(1);
		var index = layer.open({
			type: 1,
			area: '500px',
			title: '选取团长分组'
			,content: $('#batchcates_headgroup_html').html(),
			yes: function(index, layero){
				//do something
				layer.close(index); //如果设定了yes回调，需进行手工关闭
			}
		});
	})

	$('#batch_head_group2').click(function () {
		//  var index = layer.load(1);
		var index = layer.open({
			type: 1,
			area: '500px',
			title: '选取团长分组'
			,content: $('#batchcates_headgroup_html').html(),
			yes: function(index, layero){
				//do something
				layer.close(index); //如果设定了yes回调，需进行手工关闭
			}
		});
	})


	$('.check_heads_all').click(function(){
		//head_id
		if($(this).is(':checked')){
			$('.head_id').prop('checked',true);
		}else{
			$('.head_id').prop('checked',false);
		}
	})
	$(".radio_sale").click(function(){
		var checkedvalue = $("input[name='is_all_sale']:checked").val();
		if(checkedvalue == 1){

		}else{
			cascdeInit("1","1","","","","");
			search_heads_do();


			var offs_lf = ( $(window).width() -720 )/2;
			var offs_ht = ( $(window).height() -690 )/2;


			$('#batchheads .modal-dialog').css('top',offs_ht+'px');
			$('#batchheads .modal-dialog').css('margin-top','0px');

			$('#batchheads .modal-dialog').css('left',offs_lf+'px');
			$('#batchheads .modal-dialog').css('margin-left','0px');

			$('#batchheads').show();
		}

	})



	$('#batchcatesbut2').click(function () {
		var index = layer.open({
			type: 1,
			area: '500px',
			title: '选取分类'
			,content: $('#batchcates_html').html(),
			yes: function(index, layero){
				//do something
				layer.close(index); //如果设定了yes回调，需进行手工关闭
			}
		});
	})

	//关闭批量分类
	$('.modal-header .close').click(function () {
		$('#batchcates').hide();
		$('#batchheads').hide();
		$('#batch_time').hide();
	})

	// 取消批量分类
	$('.modal-footer .btn.btn-default').click(function () {
		$('#batchcates').hide();
		$('#batchheads').hide();
		$('#batch_time').hide();
	})
	$('.model_heads').click(function(){
		var head_id_arr = [];
		$('.head_id').each(function(){
			if($(this).is(':checked')) {
				head_id_arr.push( $(this).val() )
			}
		})

		//modal-group-head
		var is_clear_old = 0;

		if( $('#is_cancle_old').is(':checked') )
		{
			is_clear_old = 1;
		}

		var is_cancle_allhead2 = 0;

		if( $('#is_cancle_allhead').is(':checked') )
		{
			is_cancle_allhead2 = 1;
		}
		is_cancle_allhead2 = 1;
		//is_cancle_allhead2


		if(head_id_arr.length > 0)
		{
			var goodsids = [];
			var goods_id = $('#goods_id').val();
			goodsids.push(goods_id);
			if(goods_id != '')
			{
				$.post("<?php echo U('goods/ajax_batchheads');?>",{'goodsids':goodsids,'head_id_arr': head_id_arr,'is_cancle_allhead':is_cancle_allhead2,'is_clear_old':is_clear_old}, function (ret) {
					if (ret.status == 1) {
						$('#batchheads').hide();
						layer.msg('分配成功', {
							time: 1000
						}, function(){
							window.location.reload();
						});

						return
					} else {
						layer.msg('修改失败');
					}
				}, 'json');
			}else{
				$('#head_id_arr').val(head_id_arr);
				$('#batchheads').hide();
				layer.msg('团长选择成功', {
					time: 1000
				});
			}
		}else{
			layer.msg('请选择团长');
		}
	})
	//确认
	var cates2 = 0;
	$("body").delegate("#cates2","click",function(){

		cates2 =  $(this).val() ;
	})

	var group_heads2 = 'default';
	$("body").delegate("#group_heads","click",function(){
		group_heads2 =  $(this).val() ;
	})


	$("body").delegate(".cancle","click",function(){
		layer.closeAll();
	})



	$("body").delegate(".modal-group-head","click",function(){

		var group_heads=$('#group_heads').val();
		if(group_heads2 != 'default')
		{
			group_heads = group_heads2;
		}

		var selected_checkboxs = $('.table-responsive tbody tr td:first-child [type="checkbox"]:checked');
		var goodsids = selected_checkboxs.map(function () {
			return $(this).val()
		}).get();

		if(goodsids.length <=0 )
		{
			layer.msg('请先选择商品');
			return false;
		}


		var is_clear_old = 0;

		$('.is_cancle_old2').each(function(){
			if( $(this).is(':checked') )
			{
				is_clear_old = 1;
			}
		})

		var is_cancle_allhead = 0;

		$('.is_cancle_allhead2').each(function(){
			if( $(this).is(':checked') )
			{
				is_cancle_allhead = 1;
			}
		})

		var iscover=$('input[name="iscover"]:checked').val();
		$.post("<?php echo U('goods/ajax_batchcates_headgroup');?>",{'goodsids':goodsids,'groupid': group_heads,'is_cancle_allhead':is_cancle_allhead,'is_clear_old' : is_clear_old }, function (ret) {
			if (ret.status == 1) {

				layer.msg('分配成功', {
					time: 1000
				}, function(){
					window.location.reload();
				});

				return
			} else {
				layer.msg('分配失败');
			}
		}, 'json');
	})

	$('.layui-table-sort').click(function(){
		$(this).attr('lay-sort','asc');
	})

	$("body").delegate(".modal-fenlei","click",function(){

		var cates=$('#cates2').val();
		if(cates2 != 0)
		{
			cates = cates2;
		}


		var selected_checkboxs = $('.table-responsive tbody tr td:first-child [type="checkbox"]:checked');
		var goodsids = selected_checkboxs.map(function () {
			return $(this).val()
		}).get();
		//id="cates"
		var iscover=$('input[name="iscover"]:checked').val();
		$.post("<?php echo U('goods/ajax_batchcates');?>",{'goodsids':goodsids,'cates': cates,'iscover':iscover}, function (ret) {
			if (ret.status == 1) {
				$('#batchcates').hide();

				layer.msg('修改成功', {
					time: 1000
				}, function(){
					window.location.reload();
				});

				return
			} else {
				layer.msg('修改失败');
			}
		}, 'json');
	})
	//----

	//显示时间设置
	$('#batchtime,#batchtime2').click(function () {

		var offs_lf = ( $(window).width() -720 )/2;
		var offs_ht = ( $(window).height() -290 )/2;

		$('#batch_time .modal-dialog').css('top',offs_ht+'px');
		$('#batch_time .modal-dialog').css('margin-top','0px');

		$('#batch_time .modal-dialog').css('left',offs_lf+'px');
		$('#batch_time .modal-dialog').css('margin-left','0px');

		$('#batch_time').show();
	})

	$('.modal-time').click(function () {
		var selected_checkboxs = $('.table-responsive tbody tr td:first-child [type="checkbox"]:checked');
		var goodsids = selected_checkboxs.map(function () {
			return $(this).val()
		}).get();

		var begin_time=$('#batch_time input[name="setsametime[start]"]').val();
		var end_time=$('#batch_time input[name="setsametime[end]"]').val();
		$.post("<?php echo U('goods/ajax_batchtime');?>",{'goodsids':goodsids,'begin_time': begin_time,'end_time':end_time}, function (ret) {
			if (ret.status == 1) {
				$('#batch_time').hide();
				layer.msg('设置成功');
				window.location.reload();
				return
			} else {
				layer.msg('设置失败');
			}
		}, 'json');
	})

	$(document).on("click", '[data-toggle="ajaxEdit"]', function(e) {
		var obj = $(this),
				url = obj.data('href') || obj.attr('href'),
				data = obj.data('set') || {},
				html = $.trim(obj.text()),
				required = obj.data('required') || true,
				edit = obj.data('edit') || 'input';
		var oldval = $.trim($(this).text());
		e.preventDefault();
		submit = function() {
			e.preventDefault();
			var val = $.trim(input.val());
			if (required) {
				if (val == '') {
					layer.msg(tip.lang.empty);
					return
				}
			}
			if (val == html) {
				input.remove(), obj.html(val).show();
				return
			}
			if (url) {
				$.post(url, {
					value: val
				}, function(ret) {
					ret = eval("(" + ret + ")");
					if (ret.status == 1) {
						obj.html(val).show()
					} else {
						layer.msg(ret.result.message, ret.result.url)
					}
					input.remove()
				}).fail(function() {
					input.remove(),  layer.msg(tip.lang.exception)
				})
			} else {
				input.remove();
				obj.html(val).show()
			}
			obj.trigger('valueChange', [val, oldval])
		}, obj.hide().html('<i class="fa fa-spinner fa-spin"></i>');
		var input = $('<input type="text" class="form-control input-sm" style="width: 80%;display: inline;" />');
		if (edit == 'textarea') {
			input = $('<textarea type="text" class="form-control" style="resize:none" rows=3 ></textarea>')
		}
		obj.after(input);
		input.val(html).select().blur(function() {
			submit(input)
		}).keypress(function(e) {
			if (e.which == 13) {
				submit(input)
			}
		})
	})
</script>
</body>