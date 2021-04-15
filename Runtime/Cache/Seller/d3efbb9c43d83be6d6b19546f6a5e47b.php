<?php if (!defined('THINK_PATH')) exit(); if( $type=='good'){ ?>
	<?php if( empty($list)){ ?>
		<div class="tip">抱歉！未查询到<?php if( !empty($kw)){ ?>与“<?php echo ($kw); ?>”<?php } ?>相关的商品，请更换关键字后重试。</div>
	<?php  }else{ ?>
		<?php foreach( $list as $item ){ ?>
			<div class="line good">
				<div class="image"><img src="<?php echo ($item['thumb']); ?>"/></div>
				<nav title="选择" class="choose_dan_link_url btn btn-default btn-sm" data-href="/lionfish_comshop/pages/goods/goodsDetail?id=<?php echo ($item['id']); ?>">选择</nav>
				<div class="text">
					<p class="name"><?php echo ($item['title']); ?></p>
					<p class="price">原价: <?php echo ($item['productprice']); ?>元 <?php if( $item['type'] == 'integral' ){ ?>现价: <?php echo ($item['marketprice']); ?>积分<?php }else{ ?>现价: <?php echo ($item['marketprice']); ?>元<?php } ?></p>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
<?php } ?>
<?php if( $type=='article'){ ?>
	<?php if( empty($list)){ ?>
		<div class="tip">抱歉！未查询到<?php if( !empty($kw)){ ?>与“<?php echo ($kw); ?>”<?php } ?>相关的文章，请更换关键字后重试。</div>
	<?php  }else{ ?>
		<?php foreach( $list as $item ){ ?>
			<div class="line good">
				<nav title="选择" class="choose_dan_link_url btn btn-default btn-sm" data-href="/lionfish_comshop/pages/user/articleProtocol?id=<?php echo ($item['id']); ?>">选择</nav>
				<div class="text">
					<p class="name"><?php echo ($item['title']); ?></p>
					
				</div>
			</div>
		<?php } ?>
	<?php } ?>
<?php } ?>

<?php if( $type=='url'){ ?>
	<?php if( $list['no_data']==1){ ?>
		<div class="tip">抱歉！未查询到<?php if( !empty($kw)){ ?>与“<?php echo ($kw); ?>”<?php } ?>相关的链接，请更换关键字后重试。</div>
	<?php  }else{ ?>
		<?php foreach( $list['list'] as $item ){ ?>
			<?php if( !empty($item['list'])){ ?>
			<div class="page-head"><h4><i class="fa fa-folder-open-o"></i> <?php echo ($item['name']); ?></h4></div>
			<?php } ?>
			<?php foreach( $item['list'] as $child ){ ?>
				<nav data-href="<?php echo $platform?$child['url_wxapp']:$child['url']; ?>" class="choose_dan_link_url btn btn-default btn-sm" title="商城首页"><?php echo ($child['name']); ?></nav>
			<?php } ?>
		<?php } ?>
	<?php } ?>
<?php } ?>


<?php if($type=='special'){ ?>
	<?php if(empty($list)){ ?>
		<div class="tip">抱歉！未查询到<?php if(!empty($kw)){ ?>与“<?php echo ($kw); ?>”<?php } ?>相关的链接，请更换关键字后重试。</div>
	<?php }else{ ?>
		<?php foreach($list as $item){ ?>
			<div class="line">
				<div title="选择" class="choose_dan_link_url btn btn-default btn-sm" data-href="/lionfish_comshop/moduleA/special/index?id=<?php echo ($item['id']); ?>">选择</div>
				<div class="text">
					<p class="name"><?php echo ($item['name']); ?></p>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
<?php } ?>


<?php if($type=='category'){ ?>
	<?php if(empty($list)){ ?>
		<div class="tip">抱歉！未查询到<?php if( !empty($kw)){ ?>与“<?php echo ($kw); ?>”<?php } ?>相关的链接，请更换关键字后重试。</div>
	<?php }else{ ?>
		<?php foreach($list as $item){ ?>
			<div class="line">
				<div title="选择" class="choose_dan_link_url btn btn-default btn-sm" data-href="/lionfish_comshop/pages/type/details?id=<?php echo ($item['id']); ?>">选择</div>
				<div class="text">
					<p class="name"><?php echo ($item['name']); ?></p>
				</div>
			</div>
		<?php } ?>
	<?php } ?>
<?php } ?>

<?php if($type=='solitaire'){ ?>
<?php if(empty($list)){ ?>
<div class="tip">抱歉！未查询到<?php if( !empty($kw)){ ?>与“<?php echo ($kw); ?>”<?php } ?>相关的链接，请更换关键字后重试。</div>
<?php }else{ ?>
<?php foreach($list as $item){ ?>
<div class="line">
	<div title="选择" class="choose_dan_link_url btn btn-default btn-sm" data-href="/lionfish_comshop/moduleA/solitaire/details?id=<?php echo ($item['id']); ?>">选择</div>
	<div class="text">
		<p class="name"><?php echo ($item['name']); ?></p>
	</div>
</div>
<?php } ?>
<?php } ?>
<?php } ?>


<?php if($type=='coupon'){ ?>
<?php if(empty($list)){ ?>
<div class="tip">抱歉！未查询到<?php if( !empty($kw)){ ?>与“<?php echo ($kw); ?>”<?php } ?>相关的链接，请更换关键字后重试。</div>
<?php }else{ ?>
<?php foreach($list as $item){ ?>
<div class="line">
	<div title="选择" class="choose_dan_link_url btn btn-default btn-sm" data-href="/lionfish_comshop/moduleA/solitaire/details?id=<?php echo ($item['id']); ?>">选择</div>
	<div class="text">
		<p class="name"><?php echo ($item['voucher_title']); ?></p>
	</div>
</div>
<?php } ?>
<?php } ?>
<?php } ?>

<?php if( $type=='pintuan'){ ?>
<?php if( empty($list)){ ?>
<div class="tip">抱歉！未查询到<?php if( !empty($kw)){ ?>与“<?php echo ($kw); ?>”<?php } ?>相关的商品，请更换关键字后重试。</div>
<?php  }else{ ?>
<?php foreach( $list as $item ){ ?>
<div class="line good">
	<div class="image"><img src="<?php echo ($item['thumb']); ?>"/></div>
	<nav title="选择" class="choose_dan_link_url btn btn-default btn-sm" data-href="/lionfish_comshop/moduleA/pin/goodsDetail?id=<?php echo ($item['id']); ?>">选择</nav>
	<div class="text">
		<p class="name"><?php echo ($item['title']); ?></p>
		<p class="price">原价: <?php echo ($item['productprice']); ?>元 <?php if( $item['type'] == 'integral' ){ ?>现价: <?php echo ($item['marketprice']); ?>积分<?php }else{ ?>现价: <?php echo ($item['marketprice']); ?>元<?php } ?></p>
	</div>
</div>
<?php } ?>
<?php } ?>
<?php } ?>