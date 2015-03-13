<?php $this->widget('application.widgets.video.ListviewWidget', array('data'=>$data));?>
<div class="pagination"><div class="wr-paging">
        <a class="btn2 prev" href="<?php echo ($page>1)?Yii::app()->createUrl('/site/index', array('page'=>$page-1)):Yii::app()->createUrl('/site/index')?>">Prev<span class="icon-arr icon-arr-l"></span></a>
        <a class="btn2 next" href="<?php echo Yii::app()->createUrl('/site/index', array('page'=>$page+1))?>">Next<span class="icon-arr icon-arr-r"></span></a>
    </div></div>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar-r')); ?>
<div class="nar-title"><h1>Video Hot</h1></div>
<?php $this->widget('application.widgets.video.ListviewWidget', array('data'=>$videoHot,'layout'=>'mini'));?>
<?php $this->endWidget();?>