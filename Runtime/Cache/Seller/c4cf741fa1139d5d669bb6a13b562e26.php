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
	body.dragging, body.dragging * {
		cursor: move !important;
	}
	.dragged {
		position: absolute;
		opacity: 0.5;
		z-index: 2000;
		border: 1px solid #ccc;
		border-radius: 5px;
		background: #fff;
	}
	#sortable li {
		border-top: 1px solid #c5c5c5;
		padding-top: 20px;
	}
	#sortable li:first-child {
		border: 0;
	}
	#sortable li.placeholder {
		position: relative;
	}
	#sortable li.placeholder:before {
		position: absolute;
	}
</style>

	<script type="text/javascript" src="/static/js/dist/area/cascade.js"></script>
	<script src="https://map.qq.com/api/js?v=2.exp&key=6R4BZ-WAB3W-JITRG-OE7GY-R2753-P3BZ2" type="text/javascript" charset="utf-8"></script>
</head>
<body layadmin-themealias="default">

<div class="layui-fluid">
    <div class="layui-card">
        <div class="layui-card-header layui-elem-quote">同城配送设置</div>
        <div class="layui-card-body" style="padding:15px;">
            <div class="layui-tab layui-tab-brief" lay-filter="docDemoTabBrief">
                <ul class="layui-tab-title">
                    <li><a href="<?php echo U('express/localtownconfig');?>">商家配送</a></li>
                    <li><a href="<?php echo U('express/localtown_imdada_config');?>">达达配送平台</a></li>
                    <li><a href="<?php echo U('express/localtown_sf_config');?>">顺丰同城</a></li>
                    <li><a href="<?php echo U('express/localtown_mk_config');?>">码科跑腿</a></li>
                    <li class="layui-this">蜂鸟即配</li>
                </ul>
                <div class="layui-tab-content" style="height: 100%;">
                    <form action="" method="post" class="layui-form" lay-filter="component-layui-form-item" enctype="multipart/form-data" >

                        <div class="layui-form-item">
                            <label class="layui-form-label">
                                蜂鸟即配对接
                            </label>
                            <div class="layui-input-block">
                                <label class='radio-inline'>
                                    <input type='radio' title="开启" name='parameter[is_localtown_ele_status]' value='1' <?php if( isset($data['is_localtown_ele_status']) && $data['is_localtown_ele_status'] ==1 ){ ?> checked<?php }else{ ?> <?php } ?>  />
                                </label>
                                <label class='radio-inline'>
                                    <input type='radio' title="关闭" name='parameter[is_localtown_ele_status]' value='0' <?php if(!isset($data['is_localtown_ele_status']) || $data['is_localtown_ele_status'] ==0){ ?> checked<?php }else{ ?> <?php } ?> />
                                </label>
                                <div></div>
                                <div class="layui-form-mid layui-word-aux">开启此功能需要向蜂鸟即配开发平台申请，具体配送费和接口信息请咨询<a href="https://open.ele.me/" target="_blank" style="color:#009688;">蜂鸟即配开发平台</a></div>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">商户APPID</label>
                            <div class="layui-input-block">
                                <input type="text" name="parameter[localtown_ele_app_id]" class="form-control" value="<?php echo ($data['localtown_ele_app_id']); ?>" placeholder="商户AppId">
                                <span class="layui-form-mid layui-word-aux"></span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">商户SecretKey</label>
                            <div class="layui-input-block">
                                <input type="text" name="parameter[localtown_ele_secret_key]" class="form-control" value="<?php echo ($data['localtown_ele_secret_key']); ?>" placeholder="商户SecretKey">
                                <span class="layui-form-mid layui-word-aux"></span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">门店编号</label>
                            <div class="layui-input-block">
                                <input type="text" name="parameter[localtown_ele_store_code]" class="form-control" value="<?php echo ($data['localtown_ele_store_code']); ?>" placeholder="门店编号" maxlength="32">
                                <span class="layui-form-mid layui-word-aux">门店编号（仅支持数字、字母的组合）</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">门店名称</label>
                            <div class="layui-input-block">
                                <input type="text" name="parameter[localtown_ele_transport_name]" class="form-control" value="<?php echo ($data['localtown_ele_transport_name']); ?>" placeholder="门店名称" maxlength="32">
                                <span class="layui-form-mid layui-word-aux">门店名称（测试门店名称必须含有“测试”或“test”文字，正式门店名称不得含有“测试”或“test”文字！否则影响结算！）</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">取货点地址</label>
                            <div class="layui-input-block">
                                <input type="text" name="parameter[localtown_ele_transport_address]" class="form-control" value="<?php echo ($data['localtown_ele_transport_address']); ?>" placeholder="取货点地址" maxlength="64">
                                <span class="layui-form-mid layui-word-aux">取货点地址</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">取货点经度</label>
                            <div class="layui-input-block">
                                <input type="text" name="parameter[localtown_ele_transport_longitude]" class="form-control" value="<?php echo ($data['localtown_ele_transport_longitude']); ?>" placeholder="取货点经度" maxlength="16">
                                <span class="layui-form-mid layui-word-aux">取货点经度</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">取货点纬度</label>
                            <div class="layui-input-block">
                                <input type="text" name="parameter[localtown_ele_transport_latitude]" class="form-control" value="<?php echo ($data['localtown_ele_transport_latitude']); ?>" placeholder="取货点纬度" maxlength="16">
                                <span class="layui-form-mid layui-word-aux">取货点纬度</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">取货点联系方式</label>
                            <div class="layui-input-block">
                                <input type="text" name="parameter[localtown_ele_transport_tel]" class="form-control" value="<?php echo ($data['localtown_ele_transport_tel']); ?>" placeholder="取货点联系方式" maxlength="20">
                                <span class="layui-form-mid layui-word-aux">取货点联系方式</span>
                            </div>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">取货点经纬度来源</label>
                            <div class="layui-input-block">
                                <label class='radio-inline'>
                                    <input type='radio' title="腾讯地图" name='parameter[localtown_ele_position_source]' value='1' <?php if( isset($data['localtown_ele_position_source']) && $data['localtown_ele_position_source'] == 1 ){ ?> checked<?php }else{ ?> <?php } ?>  />
                                </label>
                                <label class='radio-inline'>
                                    <input type='radio' title="百度地图" name='parameter[localtown_ele_position_source]' value='2' <?php if( isset($data['localtown_ele_position_source']) && $data['localtown_ele_position_source'] == 2 ){ ?> checked<?php }else{ ?> <?php } ?>  />
                                </label>
                                <label class='radio-inline'>
                                    <input type='radio' title="高德地图" name='parameter[localtown_ele_position_source]' value='3' <?php if( empty($data['localtown_ele_position_source']) || $data['localtown_ele_position_source'] == 3 ){ ?> checked<?php }else{ ?> <?php } ?>  />
                                </label>
                            </div>
                            <span class="layui-form-mid layui-word-aux" style="margin-left: 30px;">取货点经纬度来源（蜂鸟建议使用高德地图）</span>
                        </div>
                        <div class="layui-form-item">
                            <label class="layui-form-label">取货点备注</label>
                            <div class="layui-input-block">
                                <input type="text" name="parameter[localtown_ele_transport_remark]" class="form-control" value="<?php echo ($data['localtown_ele_transport_remark']); ?>" placeholder="取货点备注" maxlength="250">
                                <span class="layui-form-mid layui-word-aux">取货点备注</span>
                            </div>
                        </div>

                        <div class="layui-form-item">
                            <label class="layui-form-label"></label>
                            <div class="layui-input-block">
                                <input type="submit" value="提交" lay-submit lay-filter="formDemo" class="btn btn-primary"  />
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/layuiadmin/layui/layui.js"></script>
<script src="/static/js/jquery-sortable.js"></script>
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
</html>