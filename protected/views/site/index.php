<?php $this->widget('application.widgets.video.ListviewWidget', array('data'=>$data));?>

<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar-r')); ?>
<div class="nar-title"><h1>Video Hot</h1></div>
<?php $this->widget('application.widgets.video.ListviewWidget', array('data'=>$data,'layout'=>'mini'));?>
<?php $this->endWidget();?>