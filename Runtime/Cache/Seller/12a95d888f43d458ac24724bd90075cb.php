<?php if (!defined('THINK_PATH')) exit();?><style>
    .recharge_info{
        display: -webkit-box;
        display: -webkit-flex;
        display: -ms-flexbox;
        display: flex;
        justify-content: space-around;
        margin-bottom: 10px;
    }
    .recharge_info>div{
        -webkit-box-flex: 1;
        -webkit-flex: 1;
        -ms-flex: 1;
        flex: 1;
        border:1px solid #efefef;
        margin: 0 10px;
        padding:10px 22px;
        line-height: 25px;
        color: #333;
    }
</style>



<form action="" method="post" class="form-horizontal form-validate" enctype="multipart/form-data">

    <input type="hidden" name="c" value="user" />
    <input type="hidden" name="a" value="recharge" />
    
    <input type='hidden' name='type' value="<?php echo ($type); ?>" id="leixing"/>
    <input type='hidden' name='id' value="<?php echo ($id); ?>" />
    <input type="hidden" name="final_type" value="<?php echo ($type); ?>" id="final_type">

    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">会员充值</h4>
            </div>
            <div class="modal-body">



                <div class="recharge_info">
                    <div>
                        <label class="pull-left" style="margin-right: 25px">粉丝</label>
                        <div class="pull-left">
                            <img class="radius50" src='<?php echo ($profile['avatar']); ?>' style='width:20px;height:20px;padding:1px;border:1px solid #ccc'/>
                            <?php echo ($profile['username']); ?>
                        </div>
                    </div>
                    <div>
                        <label class="pull-left " style="margin-right: 25px">会员信息</label>
                            <div class="pull-left">
                                ID: <?php echo ($profile['id']); ?></br>
                                姓名: <?php echo ($profile['realname']); ?></br>
                                手机号: <?php echo ($profile['mobile']); ?>
                            </div>
                    </div>

                </div>
                <div class="tabs-container">

                    <div class="tabs">
                        <ul class="nav nav-tabs">
                            
                            <li <?php if( $type=='score'){ ?>class="active"<?php } ?>><a data-toggle="tab" href="#tab-1" data-rechargetype="score" aria-expanded="true"> 充值积分</a></li>
                           
                            <li <?php if( $type=='account_money'){ ?>class="active"<?php } ?>><a data-toggle="tab" href="#tab-2"  data-rechargetype="account_money" aria-expanded="false"> 充值余额</a></li>
                           
                        </ul>
                        <div class="tab-content ">
                            <div id="tab-1" class="tab-pane <?php if( $type=='score'){ ?>active<?php } ?>">
                                <div class="form-group"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">当前积分</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <div class="form-control-static"><?php echo ($profile['score']); ?></div>
                                    </div>
                                </div>
                            </div>
                            <div id="tab-2" class="tab-pane <?php if( $type=='account_money'){ ?>active<?php } ?>">
                                <div class="form-group"></div>
                                <div class="form-group">
                                    <label class="col-sm-2 control-label">当前余额</label>
                                    <div class="col-sm-9 col-xs-12">
                                        <div class="form-control-static"><?php echo ($profile['account_money']); ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="col-sm-2 control-label">变化</label>
                    <div class="col-sm-9 col-xs-12">
                        <label class='radio-inline'>
                            <input type='radio' name='changetype' value='0' checked /> 增加
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' name='changetype' value='1' /> 减少
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' name='changetype' value='2' /> 最终<span class='name'><?php if( $type=='score'){ ?>积分<?php  }else{ ?>余额<?php } ?></span>
                        </label>
                    </div>
                </div>


                <div class="form-group">
                    <label class="col-sm-2 control-label mustl">充值数目</label>
                    <div class="col-sm-9 col-xs-12">
                        <input type="text" name="num" class="form-control" value="" data-rule-number='true' data-rule-required='true' data-rule-min='0.01' />
                    </div>
                </div>

                <div class="form-group">
                    <label class="col-sm-2 control-label">备注</label>
                    <div class="col-sm-9 col-xs-12">
                        <textarea name="remark" class="form-control richtext" cols="70"></textarea>
                    </div>
                </div>

            </div> <div class="modal-footer">
            <button class="btn btn-info btn-submit" type="submit" id="recharge">确认充值<?php if( $type=='score'){ ?>积分<?php  }else{ ?>余额<?php } ?></button>
            <button data-dismiss="modal" class="btn btn-default" type="button">取消</button>
        </div>
        </div>
    </div>

</form>
<script language='javascript'>
    $(function(){
        $('[data-toggle="tab"]').click(function(){
            var type =$(this).data('rechargetype');
            console.log(type);
            if(type=='score') {
                $('.name').html('积分');
                $(".btn-submit").text('确认充值积分');
            }else{
                $('.name').html('余额');
                $(".btn-submit").text('确认充值余额');
            }
            $("#leixing").val( type) ;
        });


        $("#recharge").click(function(){
            var myurl = $(this).attr('data-href');

            var s_data = $('#ajaxModal form').serialize();
            $.ajax({

                url:myurl,
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

    })
	
	

    // $('.btn-submit').click(function() {
    //     var d = {};
    //     var t = $('form').serializeArray();
    //     //t的值为[{name: "a1", value: "xx"},
    //     //{name: "a2", value: "xx"}...]
    //     $.each(t, function() {
    //         d[this.name] = this.value;
    //     });
    //     alert(JSON.stringify(d));
    // });
</script>