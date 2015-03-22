<?php
$cs = Yii::app()->getClientScript();
$description = 'You are looking at '.$genre.' Channel on Fan2Clip.com!';
$keywords = 'fan2clip,tv,video,jokes,interesting,cool,fun collection,fun portfolio, admire,fun,humor,humour,have fun, just for fun '.$genre;
$cs->registerMetaTag($description, NULL, NULL, array('property'=>'description'));
$cs->registerMetaTag($keywords, NULL, NULL, array('property'=>'keywords'));
?>
<?php $this->widget('application.widgets.video.ListviewWidget', array('data'=>$data));?>
    <div class="pagination"><div class="wr-paging">
            <a class="btn2 prev" href="<?php echo ($page>1)?Yii::app()->createUrl('/site/index', array('page'=>$page-1)):Yii::app()->createUrl('/site/index')?>">Prev<span class="icon-arr icon-arr-l"></span></a>
            <a class="btn2 next" href="<?php echo Yii::app()->createUrl('/site/index', array('page'=>$page+1))?>">Next<span class="icon-arr icon-arr-r"></span></a>
        </div>
    </div>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar-r')); ?>
<?php $this->widget('application.widgets.video.VideoHotGenreWidget', array('genre'=>$genre,'title'=>'Video Hot'));?>
<?php $this->endWidget();?>