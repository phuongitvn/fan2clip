<div class="video-detail">
    <div class="video-info">
        <?php if(isset($video->type) && $video->type=='vimeo'){?>
            <iframe id="media-player" src="https://player.vimeo.com/video/<?php echo $video->code;?>?autoplay=1&color=ffffff&title=0&byline=0&portrait=0" width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        <?php }else{?>
        <iframe width="100%" id="media-player" frameborder="0" allowfullscreen="1" src="http://www.youtube.com/embed/<?php echo $video->code;?>?rel=0&showinfo=0&iv_load_policy=3&modestbranding=1&nologo=1&vq=large&autoplay=0&ps=docs" ></iframe>
        <?php }?>
    </div>
    <h1><?php echo $video->name;?></h1>
    <div class="fb-like" data-href="<?php echo SITE_URL.Yii::app()->request->url;?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    <div><span class="see"><?php echo $video->views;?></span></div>
    <div class="description">
        <p><?php echo $video->description;?></p>
    </div>
    <div class="fb-comments" data-href="<?php echo SITE_URL.Yii::app()->request->url;?>" data-numposts="5" data-colorscheme="light"></div>
</div>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar-r')); ?>
<?php $this->widget('application.widgets.video.VideoRelatedGenreWidget', array('meid'=>$video->_id,'keywors'=>$video->name,'genre'=>$video->genre));?>
<?php $this->endWidget();?>