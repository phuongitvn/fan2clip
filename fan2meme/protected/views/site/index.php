<?php $this->widget('application.widgets.meme.ListviewWidget', array('data'=>$data));?>
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
<?php $this->widget('application.widgets.meme.MemeHotGenreWidget', array('title'=>'Meme Hot'));?>
<?php $this->endWidget();?>