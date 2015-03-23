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
<?php $this->widget('application.widgets.video.VideoHotGenreWidget', array('title'=>'Video Hot'));?>
<?php $this->endWidget();?>