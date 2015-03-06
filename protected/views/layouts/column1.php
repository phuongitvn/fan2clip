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
			<li>Blog</li>
		</ul>
	</div>
</div>
<!-- content -->
<div class="container">
<div id="content"><div class="c1"><?php echo $content; ?></div></div>
<aside id="sidebar">
	<div class="widget">
		<!-- search-form -->
		<form action="#" class="search-form" />
			<fieldset>
				<input type="submit" value="submit" />
				<span class="text"><input type="text" placeholder="Click or type here to search" /></span>
			</fieldset>
		</form>
	</div>							
	<!-- widget -->
	<div class="widget">
	<?php $this->widget('application.portlets.Topics');?>
	</div>
	<!-- widget -->
	<div class="widget">
		<h3>Photostream</h3>
		<!-- photos -->
		<ul class="photos">
			<li><a href="#"><img src="<?php echo $themeUrl;?>/images//popular-post-1.jpg" alt="image description" /></a></li>
			<li><a href="#"><img src="<?php echo $themeUrl;?>/images//popular-post-2.jpg" alt="image description" /></a></li>
			<li><a href="#"><img src="<?php echo $themeUrl;?>/images//popular-post-3.jpg" alt="image description" /></a></li>
			<li><a href="#"><img src="<?php echo $themeUrl;?>/images//popular-post-4.jpg" alt="image description" /></a></li>
			<li><a href="#"><img src="<?php echo $themeUrl;?>/images//popular-post-5.jpg" alt="image description" /></a></li>
			<li><a href="#"><img src="<?php echo $themeUrl;?>/images//popular-post-6.jpg" alt="image description" /></a></li>
		</ul>
	</div>
	<!-- widget -->
	<!--
	<div class="widget">
		<h3>Popular Posts</h3>
		<ul class="posts-list">
			<li>
				<img class="image" src="<?php echo $themeUrl;?>/images//popular-post-1.jpg" alt="image description" />
				<div class="text-box">
					<h6><a href="./blog-single-post.html">No Mobile Website? You're Probably Turning Customers ...</a></h6>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ...</p>
				</div>
			</li>
			<li>
				<img class="image" src="<?php echo $themeUrl;?>/images//popular-post-2.jpg" alt="image description" />
				<div class="text-box">
					<h6><a href="./blog-single-post.html">What Facebook's Page Post Targeting Means to Your ...</a></h6>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ...</p>
				</div>
			</li>
			<li>
				<img class="image" src="<?php echo $themeUrl;?>/images//popular-post-3.jpg" alt="image description" />
				<div class="text-box">
					<h6><a href="./blog-single-post.html">What Entrepreneurs Need to Know About Their Brains</a></h6>
					<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ... </p>
				</div>
			</li>
		</ul>
	</div>
	-->
	<!-- widget -->
	<?php $this->widget('TagCloud', array(
		'maxTags'=>Yii::app()->params['tagCloudCount'],
	)); ?>
</aside>
</div>
<?php $this->endContent(); ?>