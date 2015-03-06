<div id="main">
	<!-- content-panel -->
	<div class="content-panel">
		<div class="page-title">
			<!-- breadcrumbs -->
			<ul class="breadcrumbs">
				<li><a href="<?php echo Yii::app()->createUrl('/site');?>">Trang chủ</a></li>
				<li>/</li>
				<li><a href="<?php echo Yii::app()->createUrl('/casestudies');?>">Casestudies</a></li>
				<li>/</li>
				<li><?php echo $data->title?></li>
			</ul>
		</div>
	</div>
	<div class="portfolio-box">
	<?php if($data){?>
	<h3><?php echo $data->title?></h3>
	<div>
		<?php echo $data->fulltext;?>
	</div>
	<?php }?>
	</div>
</div>