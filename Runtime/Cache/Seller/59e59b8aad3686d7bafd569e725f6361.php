<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
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
<link href="/static/css/snailfish.css?v=32" rel="stylesheet">
<style>
    tbody tr td{
        position: relative;
    }
    tbody tr  .icow-weibiaoti--{
        visibility: hidden;
        display: inline-block;
        color: #fff;
        height:18px;
        width:18px;
        background: #e0e0e0;
        text-align: center;
        line-height: 18px;
        vertical-align: middle;
    }
    tbody tr:hover .icow-weibiaoti--{
        visibility: visible;
    }
    tbody tr  .icow-weibiaoti--.hidden{
        visibility: hidden !important;
    }
    .full .icow-weibiaoti--{
        margin-left:10px;
    }
    .full>span{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        vertical-align: middle;
        align-items: center;
    }
    tbody tr .label{
        margin: 5px 0;
    }
    .goods_attribute a{
        cursor: pointer;
    }
    .newgoodsflag{
        width: 22px;height: 16px;
        background-color: #ff0000;
        color: #fff;
        text-align: center;
        position: absolute;
        bottom: 70px;
        left: 57px;
        font-size: 12px;
    }
	.a{cursor: pointer;}
	.img-40 {
		width: 40px;
		height: 40px;
	}
	.daterangepicker select.ampmselect, .daterangepicker select.hourselect, .daterangepicker select.minuteselect{
		width:auto!important;
	}
	.list-tb-div th .tDiv{color:#000;}
	.ul_left{float:right;}
	.ul_left li{margin: 5px 10px;float:left;}
	.ts_delivery_btn,.renew_delivery_btn{cursor:pointer;}
</style>

</head>
<body layadmin-themealias="default">

<table id="demo" lay-filter="test"></table>


<div class="layui-fluid">
	<div class="layui-card">
		<div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">订单管理
    <span>&nbsp;&nbsp;&nbsp;&nbsp;订单数:  <span class='text-danger'><?php echo ($total); ?></span> 订单金额:  <span class='text-danger'><?php echo ($total_money); ?></span> 
	</span></span>
	</div>
		
		<?php if($order_status_id != 12){ ?>
	
		<div class="layui-tab layui-tab-brief" >
		  <ul class="layui-tab-title">
			<?php if($is_community == 1){ ?>
				<li  <?php if( empty($order_status_id) || $order_status_id=='0'){ ?>class="layui-this"<?php } ?>><a href="<?php echo U($cur_controller, array('order_status_id' => 0,'headid'=>$headid));?>">全部订单（<?php echo ($all_count); ?>）</a></li>
				<li  <?php if( $order_status_id=='3'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 3,'headid'=>$headid));?>">待付款（<?php echo ($count_status_3); ?>）</a></li>
				<li  <?php if( $order_status_id=='1'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 1,'headid'=>$headid));?>">待发货（<?php echo ($count_status_1); ?>）</a></li>
				<li  <?php if( $order_status_id=='14'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 14,'headid'=>$headid ));?>">配送中（<?php echo ($count_status_14); ?>）</a></li>
				<li  <?php if( $order_status_id=='4'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 4,'headid'=>$headid ));?>">待收货（<?php echo ($count_status_4); ?>）</a></li>
				<li  <?php if( $order_status_id=='11'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 11,'headid'=>$headid ));?>">已完成（<?php echo ($count_status_11); ?>）</a></li>
				<li  <?php if( $order_status_id=='5'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 5,'headid'=>$headid ));?>">已取消（<?php echo ($count_status_5); ?>）</a></li>
				<li  <?php if( $order_status_id=='7'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 7,'headid'=>$headid ));?>">已退款（<?php echo ($count_status_7); ?>）</a></li>
			
			<?php } else if($_GPC['is_fenxiao'] == 1 && $_GPC['commiss_member_id'] > 0){ ?>
				<li  <?php if( empty($order_status_id) || $order_status_id =='0' ){ ?>class="layui-this"<?php } ?>><a href="<?php echo U($cur_controller, array('is_fenxiao' => 1,'commiss_member_id' => $_GPC['commiss_member_id'],'order_status_id' => 0));?>">全部订单（<?php echo ($all_count); ?>）</a></li>
				<li  <?php if( $_GPC['order_status_id']=='3' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 3,'is_fenxiao' => 1,'commiss_member_id' => $_GPC['commiss_member_id']));?>">待付款（<?php echo ($count_status_3); ?>）</a></li>
				<li  <?php if( $_GPC['order_status_id']=='1' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 1,'is_fenxiao' => 1,'commiss_member_id' => $_GPC['commiss_member_id']));?>">待发货（<?php echo ($count_status_1); ?>）</a></li>
				<li  <?php if( $_GPC['order_status_id']=='14' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 14,'is_fenxiao' => 1,'commiss_member_id' => $_GPC['commiss_member_id']));?>">配送中（<?php echo ($count_status_14); ?>）</a></li>
				<li  <?php if( $_GPC['order_status_id']=='4' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 4,'is_fenxiao' => 1,'commiss_member_id' => $_GPC['commiss_member_id']));?>">待收货（<?php echo ($count_status_4); ?>）</a></li>
				<li  <?php if( $_GPC['order_status_id']=='11' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 11,'is_fenxiao' => 1,'commiss_member_id' => $_GPC['commiss_member_id']));?>">已完成（<?php echo ($count_status_11); ?>）</a></li>
				<li  <?php if( $_GPC['order_status_id']=='5' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 5,'is_fenxiao' => 1,'commiss_member_id' => $_GPC['commiss_member_id']));?>">已取消（<?php echo ($count_status_5); ?>）</a></li>
				<li  <?php if( $_GPC['order_status_id']=='7' ){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 7,'is_fenxiao' => 1,'commiss_member_id' => $_GPC['commiss_member_id']));?>">已退款（<?php echo ($count_status_7); ?>）</a></li>
			
			
			<?php } else { ?>
				<li  <?php if( empty($order_status_id) || $order_status_id=='0'){ ?>class="layui-this"<?php } ?>><a href="<?php echo U($cur_controller, array('order_status_id' => 0));?>">全部订单（<?php echo ($all_count); ?>）</a></li>
				<li  <?php if( $order_status_id=='3'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 3));?>">待付款（<?php echo ($count_status_3); ?>）</a></li>
				<li  <?php if( $order_status_id=='1'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 1));?>">待发货（<?php echo ($count_status_1); ?>）</a></li>
				<li  <?php if( $order_status_id=='14'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 14));?>">配送中（<?php echo ($count_status_14); ?>）</a></li>
				<li  <?php if( $order_status_id=='4'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 4));?>">待收货（<?php echo ($count_status_4); ?>）</a></li>
				<li  <?php if( $order_status_id=='11'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 11));?>">已完成（<?php echo ($count_status_11); ?>）</a></li>
				<li  <?php if( $order_status_id=='5'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 5));?>">已取消（<?php echo ($count_status_5); ?>）</a></li>
				<li  <?php if( $order_status_id=='7'){ ?>class="layui-this"<?php } ?> ><a href="<?php echo U($cur_controller, array('order_status_id' => 7));?>">已退款（<?php echo ($count_status_7); ?>）</a></li>
			<?php } ?>
		  </ul>
		</div>
	  
		<?php } ?>
		<div class="layui-card-body" style="padding:15px;">
		
			<form action="" method="get" class="form-horizontal form-search layui-form" role="form">
				
				<?php if($order_status_id != 12 && empty($is_fenxiao) && empty($is_community)){ ?>
					<input type="hidden" name="c" value="order" />
					<input type="hidden" name="a" value="index" />
				 <?php }else if($is_fenxiao == 1){ ?>
				 	<input type="hidden" name="c" value="distribution" />
					<input type="hidden" name="a" value="distributionorder" />
				 <?php }else if($is_community == 1){ ?>
					<input type="hidden" name="headid" value="<?php echo ($headid); ?>" />
					<input type="hidden" name="c" id="c" value="communityhead" />
					<input type="hidden" name="a" id="a" value="distributionorder" />
				 <?php }else{ ?>
					 <input type="hidden" name="c" value="order" />
					 <input type="hidden" name="a" value="orderaftersales" />
				 <?php } ?>
				<input type="hidden" name="order_status_id" value="<?php echo ($order_status_id); ?>" />
				
				<div class="layui-form-item">
				  <div class="layui-inline">
				  
					<div class="layui-input-inline" style="width:100px;">
						<select name='type'  class='layui-input layui-unselect' lay-ignore style="width:100px;padding:0 5px;"  id="type">
							<option value=''>订单类型</option>
							<option value='normal' <?php if( $type=='normal'){ ?>selected<?php } ?>>普通订单</option>
							<option value='integral' <?php if( $type=='integral'){ ?> selected <?php } ?>>积分订单</option>
							<option value='soli' <?php if( $is_soli==1){ ?> selected <?php } ?>>接龙订单</option>
							
						</select>
					</div>
					<div class="layui-input-inline" style="width:100px;">
						<select name='searchtime' lay-ignore  class='layui-input layui-unselect' style="width:100px;padding:0 5px;"  id="searchtime">
							<option value=''>不按时间</option>
							<option value='create' <?php if( $searchtime=='create'){ ?>selected<?php } ?>>下单时间</option>
							<option value='pay' <?php if( $searchtime=='pay'){ ?>selected<?php } ?>>付款时间</option>
							<option value='send' <?php if( $searchtime=='send'){ ?>selected<?php } ?>>发货时间</option>
							<option value='finish' <?php if( $searchtime=='finish'){ ?>selected<?php } ?>>完成时间</option>
						</select>
					</div>
					<div class="layui-input-inline" style="width:280px;">
						<?php echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d H:i', $endtime)),true);;?>
					</div>
					<div class="layui-input-inline" style="width:100px;">
						<select name='delivery' lay-ignore class='layui-input layui-unselect' style="width:100px;padding:0 5px;"  id="type">
							<option value=''>配送方式</option>
							<option value='pickup' <?php if( $delivery=='pickup'){ ?>selected<?php } ?>>社区自提</option>
							<option value='tuanz_send' <?php if( $delivery=='tuanz_send'){ ?>selected<?php } ?>>团长配送</option>
							<option value='express' <?php if( $delivery=='express'){ ?>selected<?php } ?>>快递</option>
							<option value='localtown_delivery' <?php if( $delivery=='localtown_delivery'){ ?>selected<?php } ?>>同城配送</option>
							<option value='hexiao' <?php if( $delivery=='hexiao'){ ?>selected<?php } ?>>到店核销</option>
						</select>	
					</div>
					<div class="layui-input-inline" style="width:110px;">
						<select name='searchfield' lay-ignore class='layui-input layui-unselect'   style="width:110px;padding:0 5px;"  >
							<option value='ordersn' <?php if( $searchfield=='ordersn'){ ?>selected<?php } ?>>订单号</option>
							<option value='member' <?php if( $searchfield=='member'){ ?>selected<?php } ?>>会员信息</option>
							<option value='mobile' <?php if( $searchfield=='mobile'){ ?>selected<?php } ?>>手机号</option>
							<option value='address' <?php if( $searchfield=='address'){ ?>selected<?php } ?>>收件人信息</option>
							<option value='location' <?php if( $searchfield=='location'){ ?>selected<?php } ?>>地址信息</option>
							<option value='shipping_no' <?php if( $searchfield=='shipping_no'){ ?>selected<?php } ?>>快递单号</option>
							<option value='goodstitle' <?php if( $searchfield=='goodstitle'){ ?>selected<?php } ?>>商品名称</option>
							<option value='trans_id' <?php if( $searchfield=='trans_id'){ ?>selected<?php } ?>>微信支付单号</option>
							<?php if($is_community != 1){ ?>
							<option value='head_name' <?php if( $searchfield=='head_name'){ ?>selected<?php } ?>>团长姓名</option>
							<option value='head_address' <?php if( $searchfield=='head_address'){ ?>selected<?php } ?>>小区名称</option>
							<?php } ?>
							<?php  if (!defined('ROLE') || ROLE != 'agenter' ) { ?>
							<option value='supply_name' <?php if( $searchfield=='supply_name'){ ?>selected<?php } ?>>供应商名称</option>
							<?php } ?>
							<option value='member_id' <?php if( $searchfield=='member_id'){ ?>selected<?php } ?>>会员ID</option>
							
							<!--<option value='goodssn' <?php if( $searchfield=='goodssn'){ ?>selected<?php } ?>>商品编码</option>-->
						   
						</select>
					</div>
					<div class="layui-input-inline" >
						<input type="text" class="layui-input"  name="keyword" value="<?php echo ($keyword); ?>" placeholder="请输入关键词"/>
					</div>
					 <input type="hidden" name="export" id="export" value="0">
					
					<div class="layui-input-inline" style="width:585px;">
						<button class="layui-btn layui-btn-sm unbtn_export" data-export="0" type="submit"> 搜索</button>
						<button type="submit" name=""  data-export="1" value="1" class="layui-btn layui-btn-sm  btn-submit">导出</button>				
						<button type="submit" name="" data-export="2" value="2" class="layui-btn layui-btn-sm btn-submit">按订单导出</button>
						
						<?php if(!empty($open_feier_print) && $open_feier_print >=1){ ?>
						<a href="javascript:;" class="layui-btn layui-btn-sm btn_all_print">批量打印小票</a>
						<?php } ?>
						<?php if($data['kdniao_status'] == 1 && $order_status_id=='1'){ ?>
						<a href="javascript:;" class="layui-btn layui-btn-sm kdn_select_btn" id="kdn_exit_btn">打印选中电子面单(<span id="kdn_select_num">0</span>)</a>
						<a href="javascript:;" class="layui-btn layui-btn-sm kdn_all_btn">打印所有电子面单(<span id="kdn_all_num"><?php echo ($count_status_express); ?></span>)</a>
						<a href="javascript:;" class="kdn_print_list" style="color:#428bca;"><span id="kdn_print_content">打印成功</span></a>
						<?php }else{ ?>
						<a href="javascript:;" class="layui-btn layui-btn-sm kdn_select_btn" id="kdn_other_btn" style="display:none;">打印选中电子面单(<span id="kdn_select_num">0</span>)</a>
						<?php }?>
					</div>
               
				  </div>
				</div>
			</form>
			<form action="" class="layui-form" lay-filter="example" method="post" >
       
				
				<div class="row">
					<div class="list-div list-tb-div">
						<table cellpadding="0" cellspacing="0" border="0">
                            <thead>
                                <tr>
                                    <th width="3%" class="sign"><div class="tDiv">
										<input type='checkbox' name="checkall" lay-skin="primary" lay-filter="checkboxall"  />
										</div>
									</th>
                                    <th width="25%"><div class="tDiv">订单号</div></th>
                                    <th width="9%"><div class="tDiv">单价/数量</div></th>
                                    <th width="12%"><div class="tDiv">买家</div></th>
                                    <th width="8%"><div class="tDiv">支付/配送</div></th>
                                    <th width="14%"><div class="tDiv">小区/团长</div></th>
                                    <th width="10%"><div class="tDiv">价格</div></th>
                                    <th width="9%"><div class="tDiv">操作</div></th>
                                    <th width="8%"><div class="tDiv">状态</div></th>
                                </tr>
                            </thead>
                        </table>
						
						<table cellpadding="0" cellspacing="0" border="0">
                            <colgroup>
                                <col width="28%">
                                <col width="9%">
                                <col width="12%">
                                <col width="8%">
                                <col width="14%">
                                <col width="10%">
                                <col width="9%">
                                <col width="8%">
                            </colgroup>
                            <tbody>
								<?php foreach( $list as $item ){ ?>
                                <tr class="tr-order-sn">
                                    <td colspan="10">
                                        <div class="tDiv ml10">
                                            <span class="sign">
												<input type='checkbox' name="item_checkbox" class="checkone" lay-skin="primary" value="<?php echo ($item['order_id']); ?>" lay-filter="item_checkbox" order_delivery="<?php echo ($item['delivery']); ?>" order_status="<?php echo ($item['order_status_id']); ?>"/>
                                            </span>
											<span class="words">流水号： #<?php echo ($item['day_paixu']); ?></span>
											
												<?php if( $item['type']=='pintuan'){ ?>
														<span class="layui-badge" type="margin:0,15px,0,0;">拼团</span>
												<?php } ?>
												
												<?php foreach($item['goods'] as $k => $g){ ?>		
													<?php if( $item['type']=='normal' && $g['goods_type']['type']=='pin' ){ ?>
															<span class="layui-badge" type="margin:0,15px,0,0;">单独购买</span>
													<?php } ?>
												<?php } ?>
												
												<?php if( !empty($item['soli_id'])){ ?>
														<span class="layui-badge" type="margin:0,15px,0,0;">接龙</span>		
												<?php } ?>
												
                                            <span class="words">订单号： <?php echo ($item['order_num_alias']); ?></span>
                                            <span class="words">下单时间：<?php echo date('Y-m-d',$item['date_added']);?>&nbsp <?php echo date('H:i:s',$item['date_added']);?></span>
											<span class="words">
												<?php if( in_array($item['order_status_id'], array(1,2,4,6,11,14))){ ?>&nbsp;<span class="label label-success"><?php echo ($order_status_arr[$item['order_status_id']]); ?></span><?php } ?>
                            
												<?php if( in_array($item['order_status_id'], array(7,8,9))){ ?><label class='label label-danger'><?php echo ($order_status_arr[$item['order_status_id']]); ?></label><?php } ?>
												
												<?php if( in_array($item['order_status_id'], array(3,5,10,12,13))){ ?><label class='label label-default'><?php echo ($order_status_arr[$item['order_status_id']]); ?></label><?php } ?>
												
											</span>
											<span style='background:#fdeeee;color:red;'>
												<?php if( !empty($item['remarksaler']) ){ ?>
													卖家备注：<?php echo ($item['remarksaler']); ?>
												<?php } ?>			
											</span>
												
											<div style='text-align:right;font-size:12px;display:inline-block;' >
													<a class='op'  data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('order/opremarksaler', array('id' => $item['order_id']));?>" >
													<?php if( !empty($item['remarksaler'])){ ?>
													<i class="icow icow-flag-o" style="color: #df5254;display: inline-block;vertical-align: middle" title="  查看备注"></i>
													备注
													&nbsp
													<?php  }else{ ?>
													<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="  添加备注" ></i>
													备注
													&nbsp
													<?php } ?>
												</a>
												<?php if($item['order_status_id'] != 3 ){ ?>
												 <a href="<?php echo U('order/order_print_dan', array('id' => $item['order_id']));?>" class="text-primary" target="_blank">打印</a>
												 <?php }?>
												 <?php $is_printer_list = D('Home/Front')->get_config_by_name('is_printer_list'); ?>
												<?php if( ( empty($open_feier_print) && !empty($is_printer_list) ) || $open_feier_print >=1 && !in_array($item['order_status_id'], array(3))){ ?>
												<a href="javascript:;"  data-confirm="确认打印订单小票吗？" class="deldom" data-href="<?php echo U('order/opprint',array('id'=>$item['order_id']));?>">
												  &nbsp;&nbsp;打印小票
												</a>&nbsp;&nbsp;
												<?php } ?>
												<?php if( $item['is_print_suc'] == 0 ){ ?>
												<span class="layui-badge">打印失败</span>
												<?php } ?>
												
												
												<?php if( in_array($item['order_status_id'], array(1,4,6,10,11,12,14)) && $is_can_nowrfund_order ){ ?>
												<a href="javascript:;" style="display:none;" data-confirm="确认立即退款吗？" class="deldom" data-href="<?php echo U('order/oprefund_do',array('id'=>$item['order_id']));?>">
												  &nbsp;&nbsp;立即退款
												</a>&nbsp;&nbsp;
												
												<a class='op' <?php if($item['is_statements_state'] == 1){ ?>data-confirm="订单已结算，再发生退款，佣金不可追回" <?php } ?>  data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('order/oprefund_do', array('id' => $item['order_id']));?>" >
													<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="  立即退款" ></i>
													整个订单立即退款
												</a>&nbsp;&nbsp;
												<?php } ?>
												
												
												
												<?php if( ( in_array($item['order_status_id'], array(1,4,7)) && $item['delivery']== 'delivery') ){ ?>
													<a class="op" data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('order/op/changeexpress', array('id' => $item['order_id']));?>">
														<i class="icow icow-wuliu" title="修改物流" style="color: #999;display: inline-block;vertical-align: middle"></i>
														修改物流
														&nbsp
													</a>
												<?php } ?>
												<?php if( $item['order_status_id'] == 3){ ?>
													<a class='op'  data-toggle='ajaxModal' href="javascript:;" style="display:none;" data-href="<?php echo U('order/opchangeprice',array('id'=>$item['order_id']));?>">
														<i class="icow icow-gaijia" title="订单改价"  style="color: #999;display: inline-block;vertical-align: middle"></i>
														订单改价
														&nbsp
													</a>
													<a class='op'  data-toggle='ajaxModal' href="javascript:;" data-href="<?php echo U('order/opclose',array('id'=>$item['order_id']));?>" >
														<i class="icow icow-shutDown" title="删除订单"  style="color: #999;margin-right: 3px;display: inline-block;vertical-align: middle"></i>
														删除订单
														&nbsp
													</a>
												<?php } ?>

												<?php if($data['kdniao_status'] == 1 && $item['delivery'] == 'express'){ ?>
													<?php if($item['is_kdn_print'] == 1){ echo '<span style="color:#009688;">面单打印成功</span>'; }else if($item['is_kdn_print'] == 2){ echo '<span style="color:red;">面单打印失败,请检查物流接口是否支持此快递面单，稍后重新打印</span>'; }?>
												<?php } ?>
											</div>
                                        </div>
                                    </td>
                                </tr>
                                <tr class="">
                                    <td class="td-product">
                                    		
										
										<?php $i =1; $member_youhui = 0; foreach($item['goods'] as $k => $g){ $member_youhui += ($g['oldprice'] - $g['price'])*$g['quantity']; ?>
										<div class="tDiv relative tpinfo <?php if($i == count($item['goods'])){ ?>last<?php } ?> ">
                                            <div class="img"><img width="70" src="<?php echo tomedia($g['goods_images']);?>" alt="" /></div>
                                            <div class="product-info">
                                                <div class="name mb5">
                                                    <?php echo ($g['name']); ?>&nbsp;&nbsp;
													<?php if( !empty($g['hexiao_info'])){ ?>
													<?php if($g['hexiao_info']['hexiao_type'] == 0){?>
													(订单核销)
													<?php }else{ ?>
													(按次核销)
													<?php } ?>
													<?php } ?>
                                                </div>
                                                <div>
													<?php if( !empty($g['option_sku'])){ echo ($g['option_sku']); } ?>
												</div>
                                                <div class="order_icon_items">  
													<?php if($item['order_status_id'] == 7){ ?>
														已退款
													<?php }else if($g['is_refund_state'] == 1 && !empty($g['refund_info']) ){ ?>		
														退款金额：<?php echo $g['refund_info']['ref_money']; ?> 元,
														<?php if($g['refund_info']['state'] == 0 ){ ?>
															<span class="layui-badge">申请中</span>
														<?php }else if($g['refund_info']['state'] == 3){ ?>
															<span class="label label-success">退款成功</span>
														<?php }else if($g['refund_info']['state'] == 4){ ?>
															<span class="label label-default">退款失败</span>
														<?php  } ?>
														<br/><br/>
														<a class="btn btn-primary btn-xs " href="<?php echo U('order/oprefund', array('id' => $item['order_id'], 'ref_id' => $g['refund_info']['ref_id'] ));?>" >退款详情</a>
														
													<?php  } ?>	
                                                </div>
												
												
                                            </div>
										</div>
										<?php $i++; } ?>
                                    </td>
                                    <td class="td-price" style="vertical-align: top;">
										<?php $i =1; foreach($item['goods'] as $k => $g){ ?>		
										<div class="tDiv tpinfo <?php if($i == count($item['goods'])){ ?>last<?php } ?>" style="display: flex;align-items: center;">￥<?php echo round($g['old_total']/$g['quantity'],2); ?> 
										x <?php echo ($g['quantity']); ?> <?php if($g['has_refund_quantity'] > 0){ ?>(已退<?php echo ($g['has_refund_quantity']); ?>个)<?php } ?> </br>
										
											<?php if($g['is_level_buy'] == 1){ ?>
												<?php if( $g['member_disc'] < 100 ){ ?>
												<!--<span class="label label-primary">会员折扣：<?php echo ($g['member_disc']); ?>%</span>-->
												<?php } ?>
											<?php } ?>
										</div>
										<?php $i++; } ?>
									</td>
                               
                                    <td>
										<div class="tDiv" >
												<font style="color: #999;"><?php echo ($item['shipping_name']); ?></font><br/><font style="color: #999;"><?php echo ($item['shipping_tel']); ?></font>
												<br/>
												
												<?php if (defined('ROLE') && ROLE == 'agenter' ){ ?>
												<font style="color: #999;">会员名：</font><?php echo ($item['nickname']); ?>
												<?php if( !empty($item['member_content']) ){ ?>
												 <br/><font class="text-danger"><?php echo ($item['member_content']); ?></font>
												<?php } ?>
												<?php }else{ ?>
												<?php if($s_id == 1){ ?>
														<a class="text-primary" href="<?php echo U('user/detail',array('id'=>$item['member_id']));?>"><font style="color: #999;">会员名：</font><?php echo ($item['nickname']); ?><font style="color: #999;"><br>会员ID：<?php echo ($item['member_id']); ?></font></a>
												<?php }else{ ?>
														<a class="text-primary user"><font style="color: #999;">会员名：</font><?php echo ($item['nickname']); ?><font style="color: #999;"><br>会员ID：<?php echo ($item['member_id']); ?></font></a>
												<?php } ?>
												<?php if( !empty($item['member_content']) ){ ?>
												 <br/><font class="text-danger"><?php echo ($item['member_content']); ?></font>
												<?php } ?>
												
												<?php } ?>
												<br/>
												
										</div>
									</td>
                                    <td>
                                    <div class="tDiv" style="height: 100px;">
                                    	<!-- 已支付 -->
										<?php if( $item['order_status_id'] != 3 && $item['order_status_id'] != 5){ ?>
											<?php if( $item['payment_code']=='yuer'){ ?>
											   <span> <i class="text-warning" style="font-size: 17px;"></i><span>余额支付</span></span>
											
											<?php }else if( $item['payment_code']=='admin' ){ ?>
											   <span> <i class=" text-danger" style="font-size: 17px"></i>后台付款</span>
											<?php }else if( $item['payment_code']=='supply_mobile' ){ ?>
												<span> <i class=" text-danger" style="font-size: 17px"></i>供应商手机端付款</span>
											<?php  }else{ ?>
											   <span class="line-text"> 微信支付</span>
											<?php } ?>
										<?php }elseif( $item['order_status_id'] == 3 || $item['order_status_id'] == 5 ){ ?>
											<!-- 未支付 -->
											
											<?php if($item['payment_code']=='yuer'){ ?>
											    <span> <i class="text-warning" style="font-size: 17px;"></i><span>余额支付</span></span>
											<?php }elseif($item['payment_code']=='admin'){ ?>
											    <span> <i class=" text-danger" style="font-size: 17px"></i>后台付款</span>
											<?php }else if($item['payment_code']=='weixin'){ ?>
											    <span class="line-text"> 微信支付</span>
											<?php }else{ ?>
												<label class='label label-default'>未支付</label>
											<?php } ?>
												
										<?php } ?>
										<br/>
										<?php if( $item['delivery']=='pickup'){ ?><font class="text-danger">(社区自提)</font><?php } ?>
										<?php if( $item['delivery']=='express'){ ?><font class="text-danger">(快递)</font><?php } ?>
										<?php if( $item['delivery']=='localtown_delivery'){ ?><font class="text-danger">(同城配送)</font><?php } ?>
										<?php if( $item['delivery']=='tuanz_send'){ ?><font class="text-danger">(团长配送)</font><?php } ?>
										<?php if( $item['delivery']=='hexiao'){ ?><font class="text-danger">(到店核销)</font><?php } ?>
                                    </div>
                                    </td>
									<?php if($is_can_look_headinfo){ ?>
                                    <td>
										<div class="tDiv" style="text-align: left;">
											<div style='margin-top:5px;display:block;float:left;'>
												<?php echo ($item['head_name']); ?>
											</div>
											<div style='margin-top:5px;display:block;float:left;'>
												电话：<?php echo ($item['head_mobile']); ?>
											</div>
											 <div style='margin-top:5px;display:block;float:left;cursor: pointer;' >
												<font style="color: #999;">小区：</font>  <font class="line-text"><?php echo ($item['community_name']); ?>   (<?php echo ($item['province']); ?> <?php echo ($item['city']); ?>)
											</div>
										</div>
									
									</td>
									<?php }else{ ?>
									 <td>
										<div class="tDiv" style="text-align: left;">
											<div style='margin-top:5px;display:block; text-align: center;'>
												<?php echo ($item['head_name']); ?>
											</div>
											
										</div>
									</td>
									<?php } ?>
                                    <td>
                                    	<div class="tDiv" style="">
											<?php if($member_youhui >0){ ?>
												<span style='margin-top:5px;margin-left:5px;display:block;'>
												商品合计：<?php echo round($item['old_price']+$member_youhui,2);?>
												</span>
											<?php }else{ ?>
												<span style='margin-top:5px;margin-left:5px;display:block;'>
												商品合计：<?php echo round($item['old_price'],2);?>
												</span>
											<?php } ?>
											<?php if($item['is_free_shipping_fare'] == 1){ ?>
											<span style='margin-top:5px;margin-left:5px;display:block;'>
											运　费：+<?php echo round( $item['fare_shipping_free'],2);?>
											</span>
											<span style='margin-top:5px;margin-left:5px;display:block;'>
											满<?php echo ($item['man_e_money']); ?>免运费：-<?php echo round( $item['fare_shipping_free'],2);?>
											</span>
											<?php }else{ ?>
											<span style='margin-top:5px;margin-left:5px;display:block;'>
											运　费：+<?php echo round( $item['shipping_fare'],2);?>
											</span>
											<?php } ?>

											<?php if($item['packing_fare'] > 0){ ?>
											<span style='margin-top:5px;margin-left:5px;display:block;'>
											<?php echo ($localtown_modifypickingname); ?>：+<?php echo round( $item['packing_fare'],2);?>
											</span>
											<?php } ?>
											<?php if($item['voucher_credit'] >0){ ?>
											<span style='margin-top:5px;margin-left:5px;display:block;'>
											优惠券：-<?php echo round( $item['voucher_credit'],2);?>
											</span>
											<?php } ?>
											<?php if($item['fullreduction_money'] >0){ ?>
											<span style='margin-top:5px;margin-left:5px;display:block;'>
											满减优惠：-<?php echo round( $item['fullreduction_money'],2);?>
											</span>
											<?php } ?>
											<?php if( $item['score_for_money']>0 ){ ?>
											<span style='margin-top:5px;margin-left:5px;display:block;'>
											积分抵扣：-￥<?php echo ($item['score_for_money']); ?>
											</span>
											<?php } ?>
                                            

											<?php if($member_youhui >0){ ?>
											<span style='margin-top:5px;margin-left:5px;display:block;'>
											会员等级折扣优惠：-<?php echo round( $member_youhui,2);?>
											</span>
											<?php } ?>

											<?php
 if($item['is_change_price'] == 1){ $change_price = $item['total'] - $item['old_price']; if($change_price > 0){ ?>
													<span style='margin-top:5px;margin-left:5px;display:block;'>
													商家改价：+<?php echo round( $change_price,2);?>
													</span>
											<?php }else if($change_price < 0){ ?>
													<span style='margin-top:5px;margin-left:5px;display:block;'>
													商家改价：<?php echo round( $change_price,2);?>
													</span>
											<?php } } ?>
											<?php if(!empty($item['localtown_add_shipping_fare']) && $item['localtown_add_shipping_fare'] > 0){ ?>
											<span style='margin-top:5px;margin-left:5px;display:block;'>
											加价配送：+<?php echo round($item['localtown_add_shipping_fare'],2);?>
											</span>
											<?php }?>

											
											<span style='margin-top:5px;margin-left:5px;display:block;'>
											<?php if($item['shipping_fare'] <= 0 ){ $item['fare_shipping_free'] = 0; } ?>
											<?php $free_tongji = $item['total']+$item['packing_fare']+$item['shipping_fare']-$item['voucher_credit']-$item['fullreduction_money']- $item['score_for_money']+$item['localtown_add_shipping_fare']- $item['fare_shipping_free']; if($free_tongji < 0){ $free_tongji = 0; } ?>
											实付款：<?php echo round($free_tongji ,2);?>
											</span>
                                        </div>    
                                    </td>
                                    <td>
                                        <div class="tDiv" style="">
											<?php
 if(empty(cookie('is_new_backadmin')) || cookie('is_new_backadmin') == 1){ ?>
                                            <a class='op text-primary'  href="<?php echo U('order/detail', array('id' => $item['order_id'], 'ok' => 1));?>">查看详情</a>
											<?php
 }else{ ?>
											<a class='op text-primary'  href="javascript:void(0);" onclick="window.parent.layui.index.openTabsPage('<?php echo U('order/detail', array('id' => $item['order_id'], 'ok' => 1));?>', '查看详情')">查看详情</a>
											<?php } ?>
											<?php if( $item['addressid']!=0 && $item['statusvalue']>=2 && $item['sendtype']==0){ ?>
											<a class='op text-primary'  data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('util/express', array('id' => $item['order_id'],'express'=>$item['express'],'expresssn'=>$item['expresssn']));?>"   >物流信息</a>
											<?php } ?>
											<br/>
											<?php
 if($item['order_status_id'] == 1 && $data['kdniao_status'] == 1 && $item['delivery'] == 'express'){ if($item['is_kdn_print'] == 0 || $item['is_kdn_print'] == 2){ ?>
											<a class='op text-primary print_order' href="javascript:void(0);" order_id="<?php echo ($item['order_id']); ?>">打印面单</a>
											<?php
 }else if($item['is_kdn_print'] == 1){ ?>
											<a class='op text-primary print_kdn' href="javascript:void(0);" order_id="<?php echo ($item['order_id']); ?>">打印面单</a>
											<?php
 } } ?>
											<?php if($item['delivery'] == 'localtown_delivery' && $item['order_status_id'] == 4 && $item['orderdistribution_order']['state'] == 1){ ?>
												<br/>
												<?php if(($item['orderdistribution_order']['delivery_type'] == 0 && empty($item['third_distribution_type'])) || $item['orderdistribution_order']['delivery_type'] == 1){ ?>
													<a class='btn btn-primary btn-xs ajaxPost'  data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('orderdistribution/choosemember', array('id' => $item['order_id'] ));?>"   >指定配送员配送</a>
												<?php } ?>
											<?php } ?>

											<?php if(($item['orderdistribution_order']['state'] == 1 && empty($item['third_distribution_type'])) || (!empty($item['third_distribution_type']) && $item['orderdistribution_order']['state'] == 5)){ ?>
											<?php } ?>

											<?php if($item['delivery'] == 'localtown_delivery' && $item['order_status_id'] == 4 && $item['orderdistribution_order']['state'] != 1 && $item['orderdistribution_order']['orderdistribution_id'] > 0){ ?>
												<br/>
												配送员：<?php echo ($item['orderdistribution_order']['username']); ?>
											<?php } ?>
											<?php if($is_can_third_delivery){ ?>
											<?php
 $third_name = ""; if($item['third_distribution_type'] == 'imdada'){ $third_name = '达达平台'; }else if($item['third_distribution_type'] == 'sf'){ $third_name = '顺丰同城'; }else if($item['third_distribution_type'] == 'make'){ $third_name = '码科配送'; }else if($item['third_distribution_type'] == 'uupt'){ $third_name = 'UU跑腿'; }else if($item['third_distribution_type'] == 'dianwoda'){ $third_name = '点我达'; }else if($item['third_distribution_type'] == 'ele'){ $third_name = '蜂鸟即配'; } ?>
											<?php if($item['delivery'] == 'localtown_delivery' && $item['order_status_id'] == 4 && !empty($item['third_distribution_type']) && $item['orderdistribution_order']['delivery_type'] != 1 && $item['orderdistribution_order']['state'] != 5){ ?>
											<br/>
											<span style="color: #009688;">
											<a href="javascript:void(0)" data-orderid="<?php echo $item['order_id'];?>" class="third_log"><?php
 echo $third_name; ?>配送中</a></span>
											<?php }?>

											<?php if($item['delivery'] == 'localtown_delivery' && $item['order_status_id'] == 4 && !empty($item['third_distribution_type']) && $item['orderdistribution_order']['delivery_type'] != 1 && $item['orderdistribution_order']['state'] == 5){ ?>
											<br/>
											<a style="color: #009688;" class="renew_delivery_btn" data-type="<?php echo ($item['third_distribution_type']); ?>" data-order-id="<?php echo ($item['order_id']); ?>">重新配送</a>
											<?php }?>
											<?php }?>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="tDiv" style="">
                                           <span class='text-<?php echo ($item[order_status_id]); ?>'><?php echo ($order_status_arr[$item['order_status_id']]); ?></span><br/>
											<?php  $is_ops_show = true; if (defined('ROLE') && ROLE == 'agenter' ) { $supper_info = get_agent_logininfo(); if( $supper_info['type'] != 1) { $is_ops_show = false; } } ?>
											<?php if($is_ops_show){ ?>
											<!---操作开始-->
											
											
											<?php if( $item['order_status_id'] == 3){ ?>
											<!--未付款-->
											<?php  $is_pay_show = true; if (defined('ROLE') && ROLE == 'agenter' ) { $supper_info = get_agent_logininfo(); $is_pay_show = false; } ?>
											<?php
 if($is_pay_show){ if(!isset($data['open_admin_payment']) || $data['open_admin_payment']=='1'){ ?>
												<a class="btn btn-primary btn-xs deldom" data-toggle="ajaxPost" href="javascript:;" data-href="<?php echo U('order/oppay', array('id' => $item['order_id']));?>" data-confirm="确认此订单已付款吗？">确认付款</a>
											<?php
 } } ?>
											<?php }elseif( $item['order_status_id'] == 1 ){ ?>
											<!--已付款-->
												<?php if( $item['order_status_id'] == 1 && $item['delivery'] == 'express' ){ ?>
												<!--快递 发货-->
																						
												<a class="btn btn-primary btn-xs ajaxPost" data-toggle='ajaxModal' href="javascript:;" data-href="<?php echo U('order/opsend', array('id' => $item['order_id']));?>" data-confirm="确认此订单发货吗？">确认发货</a>

												<?php }elseif( $item['order_status_id'] == 1 && ($item['delivery'] == 'pickup' || $item['delivery'] == 'tuanz_send' ) ){ ?>
												
												  <a class="btn btn-primary btn-xs deldom" href="javascript:;"   data-confirm="确认此订单发货吗？" data-href="<?php echo U('order/opsend_tuanz', array('id' => $item['order_id']));?>">确认配送</a>
											
												<?php  }else if( $item['order_status_id'] == 1 && $item['delivery'] == 'localtown_delivery' ){ ?>
														
												  <a class="btn btn-primary btn-xs deldom" href="javascript:;"   data-confirm="确认此订单发货吗？" data-href="<?php echo U('order/opsend_localtown', array('id' => $item['order_id']));?>">确认配送</a>	

												<?php }?>


												
											
											<?php }elseif( $item['order_status_id'] == 14 && ($item['delivery'] == 'pickup' || $item['delivery'] == 'tuanz_send') ){ ?>
													
													
													<?php if($is_can_confirm_delivery){ ?>
														<a class="btn btn-primary btn-xs deldom" href="javascript:;" data-href="<?php echo U('order/opsend_tuanz_over', array('id' => $item['order_id']));?>" data-confirm="确认送达团长吗？">确认送达团长</a>
													<?php }else{ ?>
														
													<?php } ?>
											
											<?php }elseif( $item['order_status_id'] == 14 && ($item['delivery'] == 'express') ){ ?>
												<a class="btn btn-primary btn-xs deldom" href="javascript:;" data-href="<?php echo U('order/opreceive', array('id' => $item['order_id']));?>" data-confirm="确认订单收货吗？">确认收货</a><br />

											<?php }elseif( $item['order_status_id'] == 4 || $item['order_status_id'] == 6 ){ ?>
											<!--已发货-->
												<?php if( $item['order_status_id'] == 4){ ?>
											<!--快递 取消发货-->

												<?php if( $item['delivery'] == 'hexiao' ){ ?>
													<a class="btn btn-primary btn-xs deldom" href="javascript:;"   data-confirm="确认使用该订单吗？<br/><span style='color:#ad0909;font-size:13px;'>确认使用订单以后，订单下面全部商品默认核销成功。</span>" data-href="<?php echo U('order/order_hexiao', array('id' => $item['order_id']));?>">确认使用</a>
												<?php }else{ ?>
												
												
												<?php if($is_can_confirm_receipt){ ?>
														<a class="btn btn-primary btn-xs deldom" href="javascript:;" data-href="<?php echo U('order/opreceive', array('id' => $item['order_id']));?>" data-confirm="确认订单收货吗？">确认收货</a><br />
														<?php if($item['delivery'] == 'localtown_delivery' && $item['orderdistribution_order']['delivery_type'] == 0 && $item['orderdistribution_order']['state'] == 5){ ?>
															<br /><a class="btn btn-primary btn-xs deldom" href="javascript:;"   data-confirm="确认此订单发货吗？" data-href="<?php echo U('order/opsend_localtown', array('id' => $item['order_id']));?>">平台配送</a>
														<?php } ?>
												<?php }else{ ?>
														
												<?php }} ?>
												
												
												
												<?php if( $item['delivery'] == 'express'){ ?>
												<a class="text-primary " data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('order/opchangeexpress', array('id' => $item['order_id']));?>">修改物流</a>
												
												<?php } ?>
												
												<?php  }else{ ?>
												  
												  <a class="btn btn-primary btn-xs deldom"  style="display:none;" href="javascript:;" data-href="<?php echo U('order/opfinish', array('id' => $item['order_id']));?>" data-confirm="确认完成订单吗？">确认完成</a>
												<?php } ?>
											<?php }elseif($item['order_status_id'] == 3){ ?>

											<?php } ?>
											<!---操作结束--->
											<?php } ?>
                                        </div>
                                    </td>
                                </tr>
								<tr>
									<td colspan="8">
										<font style="color: #999;padding-left: 10px;">供应商：</font>
										<?php if(!empty($g['shopname']['shopname']) ){ ?> 
												<?php echo ($g['shopname']['shopname']); if( $g['shopname']['type'] == 1 ){ ?>(独立供应商)<?php }else{ ?>(平台供应商)<?php } ?>
										<?php }else{ ?>
												平台自营(自营)
										<?php  } ?>
										<?php if( $item['soli_id'] > 0 ){ ?>
										(接龙商品)
										<?php } ?>
										<?php if($is_can_third_delivery){ ?>
										<?php if($item['delivery'] == 'localtown_delivery' && $item['order_status_id'] == 1 && empty($item['third_distribution_type']) && $item['orderdistribution_order']['delivery_type'] != 1){ ?>
										<ul style="float:right;" class="ul_left">
											<?php if($is_localtown_mk_status == 1){ ?>
											<li>
												<a class="ts_delivery_btn" data-type="make" data-order-id="<?php echo $item['order_id']?>">推送到码科配送</a>
												<?php if($is_make_prequery_status == 1){ ?>
												<br/>
												<span style="color: rgb(0, 150, 136);">预计配送费：<?php echo !empty($item['pre_mk_delivery_fee']) ? $item['pre_mk_delivery_fee'] : 0; ?></span>
												<?php } ?>
											</li>
											<?php } ?>
											<?php if($is_localtown_imdada_status == 1){ ?>
											<li>
												<a class="ts_delivery_btn" data-type="imdada" data-order-id="<?php echo $item['order_id']?>">推送到达达配送</a>
												<?php if($is_imdada_prequery_status == 1){ ?>
												<br/>
												<span style="color: rgb(0, 150, 136);">预计配送费：<?php echo !empty($item['pre_imdada_delivery_fee']) ? $item['pre_imdada_delivery_fee'] : 0; ?></span>
												<?php } ?>
											</li>
											<?php } ?>
											<?php if($is_localtown_sf_status == 1){ ?>
											<li>
												<a class="ts_delivery_btn" data-type="sf" data-order-id="<?php echo $item['order_id']?>">推送到顺丰同城</a>
												<?php if($is_sf_prequery_status == 1){ ?>
												<br/>
												<span style="color: rgb(0, 150, 136);">预计配送费：<?php echo !empty($item['pre_sf_delivery_fee']) ? $item['pre_sf_delivery_fee'] : 0; ?></span>
												<?php } ?>
											</li>
											<?php } ?>
											<?php if($is_localtown_ele_status == 1){ ?>
											<li>
												<a class="ts_delivery_btn" data-type="ele" data-order-id="<?php echo $item['order_id']?>">推送到蜂鸟即配</a>
											</li>
											<?php } ?>
										</ul>
										<?php } ?>

										<?php if($item['delivery'] == 'localtown_delivery' && $item['order_status_id'] == 4 && !empty($item['third_distribution_type']) && $item['orderdistribution_order']['state'] == 5 && $item['orderdistribution_order']['delivery_type'] != 1){ ?>
										<ul style="float:right;" class="ul_left">
											<?php if($is_localtown_imdada_status == 1){ ?>
												<?php if($item['third_distribution_type'] == 'imdada'){ ?>
													<li>
														<a class="ts_delivery_error_btn" style="color:red;">达达配送平台：<?php echo ($item['orderdistribution_order']['cancel_reason']); ?></a>
														<?php if($is_imdada_prequery_status == 1){ ?>
														<br/>
														<span style="color: rgb(0, 150, 136);">预计配送费：<?php echo !empty($item['pre_imdada_delivery_fee']) ? $item['pre_imdada_delivery_fee'] : 0; ?></span>
														<?php } ?>
													</li>
												<?php }else{ ?>
													<li>
														<a class="ts_delivery_btn" data-type="imdada" data-order-id="<?php echo $item['order_id']?>">推送到达达配送</a>
														<?php if($is_imdada_prequery_status == 1){ ?>
														<br/>
														<span style="color: rgb(0, 150, 136);">预计配送费：<?php echo !empty($item['pre_imdada_delivery_fee']) ? $item['pre_imdada_delivery_fee'] : 0; ?></span>
														<?php } ?>
													</li>
												<?php } ?>
											<?php } ?>
											<?php if($is_localtown_sf_status == 1){ ?>
												<?php if($item['third_distribution_type'] == 'sf'){ ?>
													<li>
														<a class="ts_delivery_error_btn" style="color:red;">顺丰同城平台：<?php echo ($item['orderdistribution_order']['cancel_reason']); ?></a>
														<?php if($is_sf_prequery_status == 1){ ?>
														<br/>
														<span style="color: rgb(0, 150, 136);">预计配送费：<?php echo !empty($item['pre_sf_delivery_fee']) ? $item['pre_sf_delivery_fee'] : 0; ?></span>
														<?php } ?>
													</li>
												<?php }else{ ?>
													<li>
														<a class="ts_delivery_btn" data-type="sf" data-order-id="<?php echo $item['order_id']?>">推送到顺丰同城</a>
														<?php if($is_sf_prequery_status == 1){ ?>
														<br/>
														<span style="color: rgb(0, 150, 136);">预计配送费：<?php echo !empty($item['pre_sf_delivery_fee']) ? $item['pre_sf_delivery_fee'] : 0; ?></span>
														<?php } ?>
													</li>
												<?php } ?>
											<?php } ?>
											<?php if($is_localtown_mk_status == 1){ ?>

											<?php if($item['third_distribution_type'] == 'make'){ ?>

												<li>
													<a class="ts_delivery_error_btn" style="color:red;">码科配送：<?php echo ($item['orderdistribution_order']['cancel_reason']); ?></a>
													<?php if($is_sf_prequery_status == 1){ ?>
													<br/>
													<span style="color: rgb(0, 150, 136);">预计配送费：<?php echo !empty($item['pre_mk_delivery_fee']) ? $item['pre_mk_delivery_fee'] : 0; ?></span>
													<?php } ?>
												</li>

											<?php }else{ ?>
												<li>
													<a class="ts_delivery_btn" data-type="make" data-order-id="<?php echo $item['order_id']?>">推送到码科配送</a>
													<?php if($is_make_prequery_status == 1){ ?>
													<br/>
													<span style="color: rgb(0, 150, 136);">预计配送费：<?php echo !empty($item['pre_mk_delivery_fee']) ? $item['pre_mk_delivery_fee'] : 0; ?></span>
													<?php } ?>
												</li>
											<?php } ?>

											<?php } ?>

											<?php if($is_localtown_ele_status == 1){ ?>
											<?php if($item['third_distribution_type'] == 'ele'){ ?>
											<li>
												<a class="ts_delivery_error_btn" style="color:red;">蜂鸟即配平台：<?php echo ($item['orderdistribution_order']['cancel_reason']); ?></a>
											</li>
											<?php }else{ ?>
											<li>
												<a class="ts_delivery_btn" data-type="ele" data-order-id="<?php echo $item['order_id']?>">推送到蜂鸟即配</a>
											</li>
											<?php } ?>
											<?php } ?>
										</ul>
										<?php }?>
										<?php }?>
									</td>
								</tr>
								<?php if( !empty($item['comment'])){ ?>
								<tr>
									<td colspan="8"><div style='background:#fdeeee;color:red;'>买家备注: <?php echo ($item['comment']); ?></div></td>
								</tr>
								<?php } ?>
								 <tr>
									<td colspan="8">
										<div style="height:20px;">&nbsp;</div>
									</td>
								 </tr>
								
								<?php } ?>
                            </tbody>
							<tfoot>
							<tr>
								<td colspan="0">
									<div class="page-table-header">
										
									</div>
								</td>
								<td colspan="8" style="text-align: right">
									<?php echo ($pager); ?>
								</td>
							</tr>
							</tfoot>
                        </table>
					</div>
				</div>
				<input type="hidden" id="imdada_has_send" name="imdada_has_send" value="<?php echo $item['imdada_has_send']; ?>"/>
				<input type="hidden" id="sf_has_send" name="sf_has_send" value="<?php echo $item['sf_has_send']; ?>"/>
				
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

layui.use(['jquery', 'layer','form'], function(){ 
  $ = layui.$;
  var form = layui.form;
	var element = layui.element;
  
	$('.deldom').click(function(){
		var s_url = $(this).attr('data-href');
		var lock = false;
		layer.confirm($(this).attr('data-confirm'), function(index){
			if(!lock){
				lock = true;
				$.ajax({
					url:s_url,
					type:'post',
					dataType:'json',
					success:function(info){
						$('#ajaxModal').removeClass('in');
						$('.modal-backdrop').removeClass('in');
						if(info.status == 0)
						{
							layer.msg(info.result.msg,{icon: 1,time: 2000});
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
			}
		},function(){
			$('#ajaxModal').removeClass('in');
			$('.modal-backdrop').removeClass('in');
		});

	})
	
	$('.btn-operation').click(function(){
		var ids_arr = [];
		var obj = $(this);
		var s_toggle = $(this).attr('data-toggle');
		var s_url = $(this).attr('data-href');
		
		
		$("input[name=item_checkbox]").each(function() {
			
			if( $(this).prop('checked') )
			{
				ids_arr.push( $(this).val() );
			}
		})
		if(ids_arr.length < 1)
		{
			layer.msg('请选择要操作的内容');
		}else{
			var can_sub = true;
			if( s_toggle == 'batch-remove' )
			{
				can_sub = false;
				
				layer.confirm($(obj).attr('data-confirm'), function(index){
					 $.ajax({
						url:s_url,
						type:'post',
						dataType:'json',
						data:{ids:ids_arr},
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
				}); 
			}else{
				$.ajax({
					url:s_url,
					type:'post',
					dataType:'json',
					data:{ids:ids_arr},
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
			}
		}
	})

	form.on('switch(restwsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var rest = 1;
	  if(data.elem.checked)
	  {
		rest = 1;
	  }else{
		rest = 0;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{rest:rest},
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
	}); 
	form.on('switch(enablewsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var enable = 1;
	  if(data.elem.checked)
	  {
		enable = 1;
	  }else{
		enable = 0;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{enable:enable},
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
	}); 
	
	form.on('switch(statewsitch)', function(data){
	  
	  var s_url = $(this).attr('data-href')
	  
	  var state = 1;
	  if(data.elem.checked)
	  {
		state = 1;
	  }else{
		state = 0;
	  }
	  
	  $.ajax({
			url:s_url,
			type:'post',
			dataType:'json',
			data:{state:state},
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
	});  
	form.on('checkbox(checkboxall)', function(data){
	  var count = 0;
	  var kdn_count = 0;
	  if(data.elem.checked)
	  {
		$("input[name=item_checkbox]").each(function() {
			var delivery = $(this).attr("order_delivery");
			var order_status = $(this).attr("order_status");
			if(delivery == 'express' && order_status == 1){
				if($('#kdn_exit_btn').length == 0){
					$('#kdn_other_btn').show();
				}
				kdn_count++;
			}
			count++;
			$(this).prop("checked", true);
		});
		$("input[name=checkall]").each(function() {
			$(this).prop("checked", true);
		});

	  }else{
		$("input[name=item_checkbox]").each(function() {
			$(this).prop("checked", false);
		});
		$("input[name=checkall]").each(function() {
			$(this).prop("checked", false);
		});
	  }
	  $('#kdn_select_num').html(kdn_count);
	  form.render('checkbox');
	});

	form.on('checkbox(item_checkbox)', function(data){
		var count = 0;
		$("input[name=item_checkbox]").each(function() {
			if($(this).prop("checked")){
				var delivery = $(this).attr("order_delivery");
				var order_status = $(this).attr("order_status");
				if(delivery == 'express' && order_status == 1){
					if($('#kdn_exit_btn').length == 0){
						$('#kdn_other_btn').show();
					}
					count++;
				}
			}
		});
		$('#kdn_select_num').html(count);
		form.render('checkbox');
	});
  
  //监听提交
  form.on('submit(formDemo)', function(data){
	 var loadingIndex = layer.load();
	
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
})

</script>  
<script>
var ajax_url = "";
$(function(){

	$("[data-toggle='ajaxModal']").click(function () {
        var s_url = $(this).attr('data-href');
		ajax_url = s_url;
		console.log(23);
		//
		var s_confirm = $(this).attr('data-confirm');
		
		console.log(s_confirm);
		
		if( s_confirm )
		{
		
			layer.confirm(s_confirm, function(index){
					layer.close(index);
					$.ajax({
						url:s_url,
						type:"get",
						success:function(shtml){
							$('#ajaxModal').html(shtml);
							$("#ajaxModal").modal();
						}	
				})
			})
		}else{
			$.ajax({
				url:s_url,
				type:"get",
				success:function(shtml){
					$('#ajaxModal').html(shtml);
					$("#ajaxModal").modal();
				}	
			})
		}
		
       
    });
	$(document).delegate(".modal-footer .btn-primary","click",function(){
		var loadingIndex = layer.load();
	//
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
		})
		return false;
	})
	
	
})
</script>
<div id="ajaxModal" class="modal fade" style="display: none;">

</div>

<script>
    //没有选中时间段不能导出
    $(function () {

		$('.btn-submit').click(function(){
			//
			var e = $(this).data('export');
            if(e>0 ){
                if($('#keyword').val() !='' ){
                    $('#export').val(e);
                   
                }else if($('#searchtime').val()!=''){
                    $('#export').val(e);
                   
                }else{
                    layer.msg('请先选择时间段!');
                    return false;
                }
            }else{
                $('#export').val(0);
                
            }
			
			var form_data = $('.form-search').serialize();
			
				
				
				var a = form_data.replace('c=order&a=index','');
				var s = a.replace('c=communityhead&a=distributionorder','');
				
				s = s.replace('c=distribution&a=distributionorder','');
				
				
				$.post("<?php echo U('order/export_form', array('sec' => 1) );?>", s, function(shtml){
				 layer.open({
					type: 1,
					area: '930px',
					content: shtml //注意，如果str是object，那么需要字符拼接。
				  });
				});
			   return false;
			
		})
		$('.unbtn_export').click(function(){
			//
			$('#export').val(0);
			
			
		})
		
	
	
		$('.btn_all_print').click(function(){
			var loadingIndex = layer.load();
			var ids_arr = [];
			
			$("input[name=item_checkbox]").each(function() {
			
				if( $(this).prop('checked') )
				{
					ids_arr.push( $(this).val() );
				}
			})
			
			if(ids_arr.length < 1)
			{
				layer.close(loadingIndex); 
				layer.msg('请选择要打印的订单');
				return false;
			}else{
				layer.close(loadingIndex); 
				layer.confirm('确认要批量打印这些订单小票吗', function(index){
					 $.post("<?php echo U('order/all_opprint', array('sec' => 1) );?>", {order_arr:ids_arr}, function(shtml){
						layer.open({
							type: 1,
							area: '930px',
							content: shtml //注意，如果str是object，那么需要字符拼接。
						});
					});
				}); 
				
				
			   return false;
			
			}
			
		})
		
	
        $('.btn-submit').click(function () {
            var e = $(this).data('export');
            if(e==1 ){
				
				
                if($('#keyword').val() !='' ){
                    $('#export').val(1);
                    $('#search').submit();
                }else if($('#searchtime').val()!=''){
                    $('#export').val(1);
                    $('#search').submit();
                }else{
                   $('#export').val(1);
                    $('#search').submit();
                    return;
                }
            }else{
			
                $('#export').val(0);
                $('#search').submit();
            }
        })


		$('.print_order').click(function(){
			var order_id = $(this).attr("order_id");
			$.ajax({
				url:"<?php echo U('order/check_kdniao');?>",
				type:'post',
				dataType:'json',
				success:function(info){
					if(info.status == 0)
					{
						kdniao_set();
					}else if(info.status == 1){
						$.post("<?php echo U('order/express_list');?>", {type:'one',order_id:order_id}, function(shtml){
							layer.open({
								type: 1,
								area: '930px',
								content: shtml //注意，如果str是object，那么需要字符拼接。
							});
						});
					}
				}
			})
			return false;
		})

		$('.print_kdn').click(function(){
			var order_id = $(this).attr("order_id");
			$.post("<?php echo U('order/kdn_info');?>", {order_id:order_id}, function(shtml){
				layer.open({
					title: "快递面单",
					type: 1,
					area: ['450px', '700px'],
					content: shtml
				});
			});
		});

		$('.kdn_all_btn').click(function(){
			$.ajax({
				url:"<?php echo U('order/check_kdniao');?>",
				type:'post',
				dataType:'json',
				success:function(info){
					if(info.status == 0)
					{
						kdniao_set();
					}else if(info.status == 1){
						kdn_all_print();
					}
				}
			})
			return false;
		});

		$('.kdn_select_btn').click(function(){
			$.ajax({
				url:"<?php echo U('order/check_kdniao');?>",
				type:'post',
				dataType:'json',
				success:function(info){
					if(info.status == 0)
					{
						kdniao_set();
					}else if(info.status == 1){
						kdn_select_print();
					}
				}
			})
			return false;
		});

		$('#kdn_print_content').click(function(){
			$.post("<?php echo U('order/kdn_print_log_list');?>", {}, function(shtml){
				layer.open({
					type: 1,
					area: '500px',
					content: shtml //注意，如果str是object，那么需要字符拼接。
				});
			});
		});
		
		
		$('.user').click(function(){
				layer.msg('权限不足!',{icon: 2,time: 1200});
		})
		
		

		$('.ts_delivery_btn').click(function(){
			var data_type = $(this).attr("data-type");
			var order_id = $(this).attr("data-order-id");
			$.ajax({
				url:"<?php echo U('order/check_delivery_config');?>",
				type:'post',
				dataType:'json',
				data: {data_type:data_type},
				success:function(res){
					if(res.status == 0)
					{
						var html = '推送失败，平台参数设置错误请重新设置';
						layer.confirm(html, {
							btn: ['确定','取消'] //按钮
						}, function(){
							layer.closeAll();
						}, function(){
							layer.closeAll();
						});
					}else if(res.status == 1){
						thirth_delivery_order(data_type,order_id,1);
					}
				}
			})
		});

		$('.renew_delivery_btn').click(function(){
			var data_type = $(this).attr("data-type");
			var order_id = $(this).attr("data-order-id");
			$.ajax({
				url:"<?php echo U('order/check_delivery_config');?>",
				type:'post',
				dataType:'json',
				data: {data_type:data_type},
				success:function(res){
					if(res.status == 0)
					{
						var html = '推送失败，平台参数设置错误请重新设置';
						layer.confirm(html, {
							btn: ['确定','取消'] //按钮
						}, function(){
							layer.closeAll();
						}, function(){
							layer.closeAll();
						});
					}else if(res.status == 1){
						thirth_delivery_order(data_type,order_id,2);
					}
				}
			})
		});

		$('.third_log').click(function(){
			var order_id = $(this).attr("data-orderid");
			$.post("<?php echo U('order/third_delivery_log_list');?>", {order_id:order_id}, function(shtml){
				layer.open({
					type: 1,
					area: ['900px', '600px'],
					content: shtml //注意，如果str是object，那么需要字符拼接。
				});
			});
		});
    })

	function thirth_delivery_order(data_type,order_id,state){
		var thirth_name = "达达平台";
		var has_send = 0;
		if(data_type == 'imdada'){
			thirth_name = "达达平台";
			has_send = $('#imdada_has_send').val();
		}else if(data_type == 'sf'){
			thirth_name = "顺丰同城";
			has_send = $('#sf_has_send').val();
		}else if(data_type == 'make'){
			thirth_name = "码科配送";
			//has_send = $('#sf_has_send').val();
		}else if(data_type == 'ele'){
			thirth_name = "蜂鸟即配";
			//has_send = $('#sf_has_send').val();
		}
		var html = "";
		var post_url = "";
		if(state == 1){
			html = "确认推送到"+thirth_name+"配送吗？";
			if(has_send == 1){
				post_url = "<?php echo U('order/thirth_renew_delivery_order');?>";
			}else{
				post_url = "<?php echo U('order/thirth_delivery_order');?>";
			}
		}else{
			html = "确认重新推送到"+thirth_name+"配送吗？";
			post_url = "<?php echo U('order/thirth_renew_delivery_order');?>";
		}
		layer.confirm(html, {
			btn: ['确定','取消'] //按钮
		}, function(index){
			layer.close(index);
			$.ajax({
				url:post_url,
				type:'post',
				dataType:'json',
				data: {data_type:data_type,order_id:order_id},
				success:function(res){
					console.log(res);
					if(res.status == 0)
					{
						layer.msg(res.result.msg,{icon: 2,time: 2000});
						return false;
					}else if(res.status == 1){
						var go_url = location.href;

						layer.msg('推送成功',{time: 1000,
							end:function(){
								location.href = go_url;
							}
						});
					}
				}
			})
		}, function(){
			layer.closeAll();
		});
	}

	function kdn_all_print(){
		var count = $('#kdn_all_num').html();
		var html = '批量打印面单，面单打印成功，即为自动发货成功，打印失败，即为自动发货失败，共计<span style="color:red;">'+count+'</span>个快递订单，确认将全部快递订单打印电子面单自动发货？';
		layer.confirm(html, {
			btn: ['确定打印','取消'] //按钮
		}, function(index){
			layer.close(index);
			$.post("<?php echo U('order/express_list');?>", {type:"all"}, function(shtml){
				layer.open({
					type: 1,
					area: '930px',
					content: shtml //注意，如果str是object，那么需要字符拼接。
				});
			});
		}, function(){
			layer.closeAll();
		});
	}

	function kdn_select_print(){
		var count = $('#kdn_select_num').html();
		if(count == 0){
			layer.msg("请在左侧选中待发货快递订单",{icon: 2,time: 2000});
			return false;
		}else{
			var order_ids = "";
			$("input[name=item_checkbox]").each(function() {

				if( $(this).prop('checked') )
				{
					var delivery = $(this).attr("order_delivery");
					var order_status = $(this).attr("order_status");
					if(delivery == 'express' && order_status == 1){
						if(order_ids == ''){
							order_ids = $(this).val();
						}else{
							order_ids = order_ids+','+$(this).val();
						}
					}
				}
			})
			var html = '批量打印面单，面单打印成功，即为自动发货成功，打印失败，即为自动发货失败，确认将<br/>选中的<span style="color:red;">'+count+'</span>个快递订单打印成电子面单自动发货？';
			layer.confirm(html, {
				btn: ['确定打印','取消'] //按钮
			}, function(index){
				layer.close(index);
				$.post("<?php echo U('order/express_list');?>", {type:"select",order_id:order_ids}, function(shtml){
					layer.open({
						type: 1,
						area: '930px',
						content: shtml //注意，如果str是object，那么需要字符拼接。
					});
				});
			}, function(){
				layer.closeAll();
			});
		}
	}

	function kdniao_set(){
		var html = '暂未设置"快递鸟"电子面单物流接口，请先到后台<br/><span style="color:#428bca;">设置</span>——<span style="color:#428bca;">物流设置</span>——<span style="color:#428bca;">物流接口设置</span>，设置好参数后，再进行打印面单操作';
		layer.confirm(html, {
			btn: ['去设置','取消'] //按钮
		}, function(){
			window.location.href = "<?php echo U('logistics/inface');?>";
		}, function(){
			layer.closeAll();
		});
	}
</script>
</body>