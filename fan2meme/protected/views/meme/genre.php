<?php
$cs = Yii::app()->getClientScript();
$description = 'You are looking at '.$genre.' Channel on Fan2Clip.com!';
$keywords = 'fan2clip,tv,video,jokes,interesting,cool,fun collection,fun portfolio, admire,fun,humor,humour,have fun, just for fun '.$genre;
$cs->registerMetaTag($description, NULL, NULL, array('property'=>'description'));
$cs->registerMetaTag($keywords, NULL, NULL, array('property'=>'keywords'));
?>
<?php $this->widget('application.widgets.video.ListviewWidget', array('data'=>$data));?>
    <div class="paging">
        <?php
        $this->widget('application.widgets.Pagination',
            array(
                'pages' => $pager,
                'maxButtonCount'=>$itemOnPaging,
            ));
        ?>
    </div>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar-r')); ?>
<?php $this->widget('application.widgets.video.VideoHotGenreWidget', array('genre'=>$genre,'title'=>'Video Hot'));?>
<?php $this->endWidget();?>