<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"> 
<style>
.package-status{padding:18px 0 0 0}
.package-status .status-list{margin:0;padding:0;margin-top:-5px;padding-left:8px;list-style:none;}
.package-status .status-list li{border-left:2px solid #d9d9d9;text-align:left;}
.package-status .status-list li:before{ /* 流程点的样式 */
	content:'';
	border:3px solid #f3f3f3;
	background-color:#d9d9d9;
	display:inline-block;
	width:10px;
	height:10px;
	border-radius:10px;
	margin-left:-9px;
	margin-right:10px
}
.package-status .status-list .latest:before{background-color:#0dad12;border-color:#f8e9e4;}
.package-status .status-box{overflow:hidden}
.package-status .status-list li{height:auto;}
.package-status .status-list{margin-top:-8px}
.package-status .status-box{position:relative}
.package-status .status-box:before{content:" ";background-color:#f3f3f3;display:block;position:absolute;top:-8px;left:20px;width:10px;height:4px}
.package-status .status-list{margin-top:0px;}
/* .package-status .status-list .latest{border:none} */
/* .package-status .status-list li{margin-bottom:-2px} */
 
 
 
.status-list li:not(:first-child){
	padding-top:10px;
}
 
.status-content-before{
	text-align:left;
	margin-left:25px;
	margin-top:-20px;
}
.status-content-latest{
	text-align:left;
	margin-left:25px;
	color:green;
	margin-top:-20px;
}
.status-time-before{
	text-align:left;
	margin-left:25px;
	font-size:10px;
	margin-top:5px;
	
}
.status-time-latest{
	text-align:left;
	margin-left:25px;
	color:green;
	font-size:10px;
	margin-top:5px;
}
.status-line{
	border-bottom:1px solid #ccc;
	margin-left:25px;
	margin-top:10px;
	
}
</style>
</head>
<body>

	<div class="modal-dialog">
           <div class="modal-content">
            <div class="modal-header">
                <button data-dismiss="modal" class="close" type="button">×</button>
                <h4 class="modal-title">快递信息</h4>
            </div>
			<?php  if($code == 2){ ?>
			<div style="padding-top: 10px;padding-left: 30px;font-size:16px;color:red;"><?php echo ($reason); ?></div>
			<?php }?>
			<div class="package-status">
			</div>	
			
            <div class="package-status">
				<div class="status-box" >
					<?php foreach( $list as $item ){ ?>
						<ul  class="status-list">
								<li style="padding-top: 10px;">
									<div></div>
									<div class="status-content-before"><?php echo ($item['AcceptStation']); ?></div>
									<div class="status-time-before"><?php echo ($item['AcceptTime']); ?></div>
									<div class="status-line"></div>
								</li>
						</ul>
					<?php } ?>
					<li style="padding-top: 10px;"></li>
				</div>
			</div>	
		</div>	
	</div>	

</body>
</html>