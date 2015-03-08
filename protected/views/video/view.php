<div class="video-detail">
    <div class="video-info">
        <iframe width="100%" id="media-player" frameborder="0" allowfullscreen="1" src="http://www.youtube.com/embed/<?php echo $video->code;?>?rel=0&showinfo=0&iv_load_policy=3&modestbranding=1&nologo=1&vq=large&autoplay=0&ps=docs" ></iframe>
    </div>
    <h1><?php echo CHtml::encode($video->name);?></h1>
    <div><span class="see">1298</span></div>
    <div class="description">
        <p><?php echo $video->description;?></p>
    </div>
</div>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar-r')); ?>
<div class="nar-title"><h1>Video Other</h1></div>
<?php $this->widget('application.widgets.video.ListviewWidget', array('data'=>$data,'layout'=>'mini'));?>
<?php $this->endWidget();?>