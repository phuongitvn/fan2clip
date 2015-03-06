<?php
$themeUrl = Yii::app()->theme->baseUrl;
?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="content-panel">
	<div class="page-title">
		<!-- breadcrumbs -->
		<ul class="breadcrumbs">
			<li><a href="<?php echo Yii::app()->createUrl('/site/index');?>">Trang chủ</a></li>
			<li>/</li>
			<li><?php echo $this->pageTitle;?></li>
		</ul>
	</div>
</div>
<!-- content -->
<div class="container">
<div id="content"><div class="c2"><?php echo $content; ?></div></div>
</div>
<?php $this->endContent(); ?>