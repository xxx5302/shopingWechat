<?php if (!defined('THINK_PATH')) exit();?><div style='max-height:500px;overflow:auto;min-width:850px;'>
	<div class="input-group layui-row" style="margin:10px;">
		<input type="text" placeholder="请输入昵称进行搜索" id="select-url-kw" value="" class="form-control">
		<span class="input-group-addon btn btn-default select-btn" data-type="url">搜索</span>
	</div>
    <div class="active" id="sut_shop">
        <div style="padding:0;margin-top:10px;" id="supplyquery">
            <?php foreach( $labels as $row ){ ?>
                <nav class="btn btn-default btn-sm choose_dan_link" data-id="<?php echo ($row['id']); ?>" data-json='<?php echo json_encode(array("id"=>$row["id"],"tagname"=>$row["tagname"]));?>'>
                    <?php echo ($row['tagname']); ?>
                </nav>
            <?php } ?>
        </div>
	
        <?php if( count($labels)<=0){ ?>
        <tr>
            <td colspan='2' align='center'>未找到</td>
        </tr>
        <?php } ?>
    </div>
</div>

<script>
var query_kwd = '<?php echo ($kwd); ?>';

var query_url = "<?php echo U('goods/labelquery', array('type' => $type));?>";

var can_next = true;

$(document).delegate(".choose_dan_link","click",function(){
	
	//data-json
	var json_obj = JSON.parse($(this).attr('data-json')); 
	var p_html = '';
	p_html+= '<div class="input-group " style="margin: 0;">';
	p_html+= '	<div class="layadmin-text-center choose_user">';
	p_html+= '		<div class="" style="">'+json_obj.tagname+'</div>';
	p_html+= '		<button type="button" class="layui-btn layui-btn-sm" onclick="cancle_bind(this)"><i class="layui-icon">&#xe640;</i></button>';
	p_html+= '	</div>';
	p_html+= '</div>';
	
	$(cur_open_div).parent().siblings().remove();
	$(cur_open_div).parent().after(p_html);
	
	$(cur_open_div).val( json_obj.id );
	layer.close(layer.index); 
});
				
$(".select-btn").click(function(){
	
	query_kwd = $.trim($("#select-url-kw").val());
	
	var s_page = $(this).attr('page');
	if(!can_next)
	{
		return false;
	}
	can_next = false;
	$.ajax({
		url:query_url,
		type:'post',
		dataType:'json',
		data:{keyword:query_kwd, page:1,is_ajax:1},
		success:function(ret){
			if(ret.code == 0)
			{
				$('#supplyquery').html(ret.html);
			}
			can_next = true;
		}
	})
});



</script>