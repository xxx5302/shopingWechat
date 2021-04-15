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
  <style type="text/css">
      .layui-btn-sm { line-height: 34px;height: 34px; }
      .layui-btn-group .layui-btn:first-child {border-radius: 0;}
      .text-green { color: #15d2b9 !important; }
	  .daterangepicker select.ampmselect, .daterangepicker select.hourselect, .daterangepicker select.minuteselect {
			width: auto!important;
		}
  </style>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">配送单管理</span></div>
        <div class="layui-card-body" style="padding:15px;">
        <div class="page-content">
            <form action="" method="get" class="form-horizontal form-search layui-form" role="form" id="search">
        		
				<input type="hidden" name="c" value="delivery" />
				<input type="hidden" name="a" value="delivery" />
                
                <div class="page-toolbar">
                    <div class="layui-form-item">
    					<span class="layui-input-inline">
    						<select name='searchtime' class='form-control' style="width:100px;padding:0 5px;"  id="searchtime">
    							<option value=''>不按时间</option>
    							<option value='create_time' <?php if( $gpc['searchtime']=='create_time'){ ?>selected<?php } ?>>创建清单时间</option>
    							<option value='express_time' <?php if( $gpc['searchtime']=='express_time'){ ?>selected<?php } ?>>配送时间</option>
    							<option value='head_get_time' <?php if( $gpc['searchtime']=='head_get_time'){ ?>selected<?php } ?>>送达时间</option>
    						</select>
    					</span>
    					<span class="layui-input-inline" style="width: 285px;">
    						<?php echo tpl_form_field_daterange('time', array('starttime'=>date('Y-m-d H:i', $starttime),'endtime'=>date('Y-m-d H:i', $endtime)),true);;?>
    					</span>
                        <div class="layui-input-inline">
                            <input type="hidden" name="export" id="export" value="0">
                        </div>
                        <div class="layui-input-inline" style="width: 400px;margin-right: 0px;">
				            <input type="text" class="layui-input" name='keyword' id="keyword" value="<?php echo ($gpc['keyword']); ?>" placeholder="输入编号/团长姓名/团长手机/线路/配送名称/配送手机然后回车">
                        </div>
                        <div class="layui-btn-group">
							<button class="layui-btn btn-submit layui-btn-sm" data-export="0" type="submit"> 搜索</button>
    						<button data-export="1" type="submit" class="layui-btn layui-btn-sm btn-submit layui-btn-primary">导出商品总单</button>
    						<button data-export="2" type="submit" class="layui-btn layui-btn-sm btn-submit layui-btn-primary">导出配送总单（样式1）</button>
    						<button data-export="3" type="submit" class="layui-btn layui-btn-sm btn-submit layui-btn-primary">导出配送总单（样式2）</button>
							
    						<button style="display:none;" data-export="3" type="submit" class="btn btn-info-o btn-submit">导出团长旗下订单</button>
    						<button style="display:none;" data-export="4" type="submit" class="btn btn-info-o btn-submit">导出配货单</button>
							
							
                        </div>
                    </div>
                </div>
            </form>
	
            <form action="" method="post" class="layui-form" role="form">
                <div class="row">
                    <div class="col-md-12">
						<div class="page-table-header">
						
							<div class="btn-group">	 
								<a class='btn btn-default btn-sm btn-op ' data-sec="1" data-confirm='确认批量配送操作吗?' data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('delivery/onekey_tosend', array('sec' => 1) );?>" >
									<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="批量配送操作" ></i>
									批量配送操作
								</a>
								
								<a class='btn btn-default btn-sm btn-op ' data-sec="0" data-confirm='确认要将所有待配送，全部变更为已配送?' data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('delivery/onekey_tosend', array('sec' => 0) );?>" >
									<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="确认要将所有待配送，全部变更为已配送?" ></i>
									一键配送操作
								</a>
								
								<a class='btn btn-default btn-sm btn-op ' data-sec="1" data-confirm='确认批量送达操作吗?' data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('delivery/onekey_tosendover', array('sec' => 1) );?>" >
									<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="批量送达操作" ></i>
									批量送达操作
								</a>
								
								<a class='btn btn-default btn-sm btn-op ' data-sec="0" data-confirm='确认要将所有配送中，全部变更为送达?' data-toggle="ajaxModal" href="javascript:;" data-href="<?php echo U('delivery/onekey_tosendover', array('sec' => 0) );?>" >
									<i class="icow icow-yibiaoji" style="color: #999;display: inline-block;vertical-align: middle" title="确认要将所有配送中，全部变更为已送达?" ></i>
									一键送达操作
								</a>
								
        					</div>
							
                               <span class="pull-right">
									<a  class='btn layui-btn  layui-btn-sm' id="delivery_allprint" data-target="_blank" href="javascript:;" data-href="<?php echo U('delivery/delivery_allprint');?>" >
										<span data-toggle="tooltip" data-placement="top" title="" data-original-title="一键打印所有团长配送清单">
											一键打印所有团长配送清单
										</span>
									</a>
									<a  class='btn layui-btn  layui-btn-sm' id="delivery_allprint_order" data-target="_blank" data-href="<?php echo U('delivery/delivery_allprint_order');?>" >
										<span data-toggle="tooltip" data-placement="top" title="" data-original-title="一键打印所有团长提货单样式1">
											一键打印所有团长提货单样式1
										</span>
									</a>
									<a  class='btn layui-btn  layui-btn-sm' id="delivery_allprint_order2" data-target="_blank" data-href="<?php echo U('delivery/delivery_allprint_order' , array('type' => 2) );?>" >
										<span data-toggle="tooltip" data-placement="top" title="" data-original-title="一键打印所有团长提货单样式2">
											一键打印所有团长提货单样式2
										</span>
									</a>
            				  </span>
                        </div>
                        <table class="layui-table" lay-skin="line" lay-size="lg">
                            <thead>
                                <tr>
            						<th style="width:25px;">
                                        <input type='checkbox' name="checkall" lay-skin="primary" lay-filter="checkboxall" />
                                    </th>
            						<th style="width:50px;text-align:center;">ID</th>
            						<th style="width: 200px;">清单编号</th>
            						<th style="width: 180px;">小区</th>
            						<th style="width: 100px;">团长/手机</th>
            						<th style="width: 140px;">线路名称</th>
            						<th style="width: 110px;">配送员/手机</th>
            						<th style="width: 120px;">商品数量/订单数量</th>
            						<th style="width: 160px;">生成时间/配送时间</th>
            						<th style="text-align:right;">操作</th>
            					</tr>
                            </thead>
                            <tbody>
                                <?php foreach( $list as $item ){ ?>
                                <tr>
                					<td style="width:25px;">
                						<input type='checkbox' value="<?php echo ($item['id']); ?>" name="item_checkbox" lay-skin="primary" />
                					</td>
                					<td style="width:100px;text-align:center;">
                						<?php echo ($item['id']); ?>
                					</td>
                					<td>
                						<?php echo ($item['list_sn']); ?>
                					</td>
                					<td>
                					<?php echo ($item['community_name']); ?>
                					</td>
                					<td>
                						<?php echo ($item['head_name']); ?><BR/>
                						<?php echo ($item['head_mobile']); ?>
                					</td>
                					<td>
                						<?php echo ($item['line_name']); ?>
                					</td>
                					<td>
                						<?php echo ($item['clerk_name']); ?><br/>
                						<?php echo ($item['clerk_mobile']); ?>
                					</td>
                					
                					<td>
                						<?php echo ($item['goods_count']); ?><br/>
                						<span class="text-primary"><?php echo ($item['order_count']); ?></span>
                					</td>
                					<td>
                						<span class="text-primary"><?php echo date('Y-m-d H:i:s', $item['create_time']);;?></span><br>
                						<?php if( !empty($item['express_time']) && $item['express_time'] > 0 ){ ?>
                						<?php echo date('Y-m-d H:i:s', $item['express_time']);;?><br>
                						<?php } ?>
                					</td>
            					
                					<td  style="overflow:visible;position:relative;text-align:right;">
                						<?php if($item['state'] == 0){ ?>
            							<a class='layui-btn layui-btn-primary layui-btn-xs deldom' href="javascript:;" data-href="<?php echo U('delivery/sub_song',array('id' => $item['id'],'ok' => 1));?>" data-confirm='确认配送吗?'>
                                            <span data-toggle="tooltip" data-placement="top" title="" data-original-title="点击配送">
                                                点击配送
                                            </span>
                                        </a>
                							
                						<?php }else if($item['state'] == 1){ ?>
                							<label class="text-green">配送中</label>
                						<?php }else if($item['state'] == 2){ ?>
                							<label class="text-success">已送达</label>
                						<?php } ?>
                						
                						<a class="layui-btn layui-btn-primary layui-btn-xs" href="<?php echo U('delivery/list_goodslist',array('list_id' => $item['id'],'ok'=>1));;?>">
                							<span data-toggle="tooltip" data-placement="top" title="" data-original-title="查看商品清单">
                								查看商品清单
                							</span>
                						</a>
                						<a class="layui-btn layui-btn-primary layui-btn-xs " href="<?php echo U('delivery/downexcel', array('list_id' => $item['id']));?>"  target='_blank'>
                							<span data-toggle="tooltip" data-placement="top" title="" data-original-title="导出配送清单">
                								导出配送清单
                							</span>
                						</a>
                						
                						<a class="layui-btn layui-btn-primary layui-btn-xs " href="<?php echo U('delivery/downorderexcel', array('list_id' => $item['id']));?>"  target='_blank'>
                							<span data-toggle="tooltip" data-placement="top" title="" data-original-title="导出相关订单">
                								导出相关订单
                							</span>
                						</a>
                					</td>
                                </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3" style="padding-left: 0;">
            							<!-- <div class="page-table-header">
            								<input type="checkbox">
            							</div> -->
                                    </td>
                                    <td colspan="7" style="text-align: right">
                                        <?php echo ($pager); ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
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
var layer = layui.layer;
var $;

layui.use(['jquery', 'layer','form'], function(){ 
    $ = layui.$;
    var form = layui.form;
	
	$("[data-toggle='ajaxModal']").click(function () {
        var s_url = $(this).attr('data-href');
		ajax_url = s_url;
		
		var ids_arr = [];
        var obj = $(this);
        
       var sec = $(this).attr('data-sec');
	   if( sec == 1 )
	   {
			$("input[name=item_checkbox]").each(function() {
				if( $(this).prop('checked') )
				{
					ids_arr.push( $(this).val() );
				}
			})
			console.log(ids_arr.length);
			
			if(ids_arr.length < 1)
			{
				layer.msg('请选择要操作的内容');
				return false;
			}
		
	   }
	  
	   layer.confirm($(this).attr('data-confirm'), function(index){
			$.post(ajax_url, {ids_arr:ids_arr,sec:sec}, function(shtml){
             layer.open({
                type: 1,
                area: '930px',
                content: shtml //注意，如果str是object，那么需要字符拼接。
              });
            });
	   })
	   	
    });
	
	
	
	$('#delivery_allprint,#delivery_allprint_order,#delivery_allprint_order2').click(function(){
	
	   		var searchtime = $('#searchtime').val();
		
			var start = $('input[name="time[start]"]').val();
			var end = $('input[name="time[end]"]').val();
		
			var s_url= $(this).attr('data-href');
			
			s_url += '&searchtime='+searchtime+"&start="+start+"&end="+end;
	   
			layer.confirm('确认对所有待配送状态的配送单进行统计和打印', function(index){
			
				window.open(s_url);
				layer.closeAll('dialog');
			});
		//console.log( start );
		//console.log(searchtime);
		//name="time[start]"
		//time[end]
	})
	
    $('.deldom').click(function(){
        var s_url = $(this).attr('data-href');
        layer.confirm($(this).attr('data-confirm'), function(index){
            $.ajax({
                url:s_url,
                type:'post',
                dataType:'json',
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
  
    form.on('switch(statewsitch)', function(data){
      
      var s_url = $(this).attr('data-href')
      
      var s_value = 1;
      if(data.elem.checked)
      {
        s_value = 1;
      }else{
        s_value = 0;
      }
      
      $.ajax({
            url:s_url,
            type:'post',
            dataType:'json',
            data:{state:s_value},
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
      if(data.elem.checked)
      {
        $("input[name=item_checkbox]").each(function() {
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
      
      form.render('checkbox');
    });
  
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

<script>
	$(function () {
        $('.btn-submit').click(function () {
            var e = $(this).data('export');
            if(e>0 ){
                if($('#keyword').val() !='' ){
                    $('#export').val(e);
                    $('#search').submit();
                }else if($('#searchtime').val()!=''){
                    $('#export').val(e);
                    $('#search').submit();
                }else{
                    layer.msg('请先选择时间段!');
                    return false;
                }
            }else{
                $('#export').val(0);
                $('#search').submit();
            }
        })
    })
</script>
</body>
</html>