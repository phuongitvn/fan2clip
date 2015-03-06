<div class="tabs-vertical">
<?php if($childPages):?>
<div style="overflow: hidden;float: left;height: 100%;">
<ul class="tabset">
<?php foreach ($childPages as $key => $item):
	$link = Yii::app()->controller->createUrlPage($item->id);
	$active = ($_SERVER['REQUEST_URI']==$link)?"active":"";
?>
	<li class="<?php echo $active;?>"><a href="<?php echo $link;?>"><?php echo $item->title;?></a></li>
<?php endforeach;?>
</ul>
</div>
<?php endif;?>
<div class="page_content" style="width: 710px;float: left;border-left:1px solid #e4e4e4;padding-left: 10px">
<!--<h3><?php echo $page->title?></h3>-->
<?php echo $page->fulltext;?>
</div>
</div>
