<!-- portfolio-box -->

<section class="portfolio-box">
	<span class="image">
		<img width="620" src="<?php echo AvatarHelper::getAvatarUrl($data->id, "s0", "news")?>" alt="<?php echo $data->title;?>" />
		<span class="mask"></span>
		<a href="<?php echo AvatarHelper::getAvatarUrl($data->id, "s0", "news")?>" class="btn-photo" data-rel="prettyPhoto[pp_gallery1]">Photo</a> 										
	</span>
	<div class="text-box">
		<h4><?php echo $data->title;?></h4>
		<?php echo $data->introtext;?>
		<div><a href="<?php echo $link = Yii::app()->createUrl('/casestudies/view', array('id'=>$data->id, 'url_key'=>Common::makeFriendlyUrl($data->title)));;?>" class="btn red">Xem thêm</a></div>
	</div>
</section>