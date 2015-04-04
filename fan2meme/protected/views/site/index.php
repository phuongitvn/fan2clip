<?php $this->widget('application.widgets.meme.ListviewWidget', array('data'=>$data));?>
<?php if($data):?>
<div class="loadmore">
    <a class="btn btn-blue" href="<?php echo Yii::app()->createUrl('/site/index', array('page'=>$page+1))?>">Load More</a>
</div>
    <?php endif;?>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar-r')); ?>
<?php $this->widget('application.widgets.meme.MemeHotGenreWidget', array('title'=>'Meme Hot'));?>
<?php $this->endWidget();?>