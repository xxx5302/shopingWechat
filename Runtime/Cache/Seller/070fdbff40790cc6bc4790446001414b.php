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
    .layui-table[lay-size=lg] td, .layui-table[lay-size=lg] th {
      padding: 15px 10px;
    }
  </style>
</head>
<body layadmin-themealias="default">
<div class="layui-fluid">
  <div class="layui-card">
    <div class="layui-card-header layui-elem-quote">当前位置：<span class="line-text">门店管理</span></div>
    <div class="layui-tab layui-tab-brief">
      <ul class="layui-tab-title">
        <li <?php if(empty($state)){ ?>class="layui-this"<?php } ?>><a href="<?php echo U('salesroom/index');?>">全部</a></li>
        <li <?php if(!empty($state) && $state == 1){ ?>class="layui-this"<?php } ?>><a href="<?php echo U('salesroom/index', array('state' => 1));?>">已启用</a></li>
        <li <?php if(!empty($state) && $state == 2){ ?>class="layui-this"<?php } ?>><a href="<?php echo U('salesroom/index', array('state' => 2));?>">已禁用</a></li>
      </ul>
    </div>
    <div class="layui-card-body" style="padding:15px;">
      <form action="" method="get" class="form-horizontal form-search layui-form" role="form">
        <input type="hidden" name="c" value="salesroom" />
        <input type="hidden" name="type" value="<?php echo ($type); ?>" />
        
        <div class="layui-form-item">
          <div class="layui-inline">
          <div class="layui-input-inline">
            <input type="text" class="layui-input" name='keyword' value="<?php echo ($keyword); ?>" placeholder="门店地址/名称/电话">
          </div>
          <div class="layui-input-inline">
            <button class="layui-btn layui-btn-sm"  type="submit"> 搜索</button>
          </div>
          </div>
        </div>
        
      </form>
      <form action="" class="layui-form" lay-filter="example" method="post" >
        <div class="row">
          <div class="col-md-12">
            <div class="page-table-header">
              <span>
                <a href="<?php echo U('salesroom/add', array('ok' => 1));?>" class="layui-btn layui-btn-sm"><i class="fa fa-plus"></i> 新增门店</a>
              </span>
            </div>
            <table class="layui-table" lay-skin="line" lay-size="lg">
              <thead>
                <tr>
                  <th style="width:100px;">排序</th>
                  <th style="">门店名称</th>
                  <th style="width:20%;">门店电话/地址</th>
                  <th style="">所属供应商</th>
                  <th style="">核销人员</th>
                  <th style="width: 200px;">门店状态</th>
                  <th style="width: 250px;">操作</th>
                </tr>
              </thead>
              <tbody>
              <?php foreach( $list as $item ){ ?>
                <tr>
                  <td>
                    <?php echo ($item['displayorder']); ?>
                  </td>
                  <td>
                    <?php echo ($item['room_name']); ?>
                  </td>
                  <td>
                    <?php echo ($item['mobile']); ?><br/><?php echo ($item['room_address']); ?>
                  </td>
                  <td>
                    <?php echo ($item['supply_name']); ?>
                  </td>
                  <td>
                    <?php if($item['member_count'] > 0){ ?>
                    <a style="color:#428bca;" href="<?php echo U('salesroom_member/index', array('salesroom_id'=>$item['id'],'ok' => 1));?>" >
                      <?php echo ($item['member_count']); ?>
                    </a>
                    <?php }else{ ?>
                    <?php echo ($item['member_count']); ?>
                    <?php } ?>
                  </td>
                  <td>
                    <input type="checkbox" name="" lay-filter="statewsitch" data-href="<?php echo U('salesroom/change',array('type'=>'state','id'=>$item['id']));?>" <?php if( $item['state']==1){ ?>checked<?php  }else{ } ?> lay-skin="switch" lay-text="启用|禁用">
                    <?php if($item['state'] == 0){ ?>
                    <br/><span style="font-size: 12px;color: #c3c3c3;">禁用时间:<?php echo ($item['disable_time']); ?></span>
                    <?php } ?>
                  </td>
                  <td style="overflow:visible;position:relative">
                    <a class='layui-btn layui-btn-xs' href="<?php echo U('salesroom_order/index', array('salesroom_id'=>$item['id']));?>" >
                      核销统计
                    </a>
                    <a class='layui-btn layui-btn-xs' href="<?php echo U('salesroom/add', array('id'=>$item['id'],'ok' => 1));?>" >
                      <i class="layui-icon layui-icon-edit"></i>编辑
                    </a>
                    <a class='layui-btn layui-btn-xs deldom' href="javascript:;" data-href="<?php echo U('salesroom/delete',array('id'=>$item['id']));?>" data-confirm='门店删除后，门店所属的所有商品将变为普通商品，确认删除？'>
                      <i class="layui-icon">&#xe640;</i>删除
                    </a>
                  </td>
                </tr>
              <?php } ?>
              </tbody>
              <tfoot>
              <tr>
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
//由于模块都一次性加载，因此不用执行 layui.use() 来加载对应模块，直接使用即可：
var layer = layui.layer;
var $;

layui.use(['jquery', 'layer','form'], function(){ 
  $ = layui.$;
  var form = layui.form;
  
  
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
  
  form.on('switch(statewsitch)', function(data){
    
    var s_url = $(this).attr('data-href')
    
    var s_value = 1;
    if(data.elem.checked)
    {
    s_value = 1;
    }else{
    s_value = 0;
    }
    if(s_value == 0){
      layer.confirm('门店禁用后，门店所属的所有商品将变为普通商品，确认禁用门店？', function(index){
        $.ajax({
          url:s_url,
          type:'post',
          dataType:'json',
          data:{value:s_value},
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
      }, function () {
        location.href = location.href;
      });
    }else{
      $.ajax({
        url:s_url,
        type:'post',
        dataType:'json',
        data:{value:s_value},
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
  });

})

</script>  
</body>
</html>