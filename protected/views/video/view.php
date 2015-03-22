<?php
if(isset($video->type) && $video->type=='vimeo') {
    $thumb = str_replace('_295x166.jpg','_640.jpg',$video->thumb);
}else {
    $thumb = 'https://i.ytimg.com/vi/' . $video->code . '/hqdefault.jpg';
}
$cs = Yii::app()->getClientScript();
$cs->registerMetaTag('Fan2Clip', NULL, NULL, array('property'=>'og:site_name'));
//$cs->registerMetaTag('https://www.facebook.com/pages/Fan2Clip/1571931466409541', NULL, NULL, array('property'=>'fb:admins'));
$cs->registerMetaTag('417326001770427', NULL, NULL, array('property'=>'fb:app_id'));
$cs->registerMetaTag(SITE_URL.Yii::app()->request->url, NULL, NULL, array('property' =>'og:url'));
$cs->registerMetaTag($video->name, NULL, NULL, array('property'=>'og:title'));
$cs->registerMetaTag('video.movie', NULL, NULL, array('property'=>'og:type'));
$cs->registerMetaTag($thumb, NULL, NULL, array('property'=>'og:image'));
$cs->registerMetaTag(time(), NULL, NULL, array('property'=>'og:updated_time'));
$cs->registerMetaTag('Clip video hot, funny, news on World '.$video->name, NULL, NULL, array('property'=>'og:description'));
?>
<div class="video-detail">
    <div class="video-info">
        <?php if(isset($video->type) && $video->type=='vimeo'){?>
            <iframe id="media-player" src="https://player.vimeo.com/video/<?php echo $video->code;?>?autoplay=1&color=ffffff&title=0&byline=0&portrait=0" width="100%" frameborder="0" webkitallowfullscreen mozallowfullscreen allowfullscreen></iframe>
        <?php }else{?>
        <iframe width="100%" id="media-player" frameborder="0" allowfullscreen="1" src="http://www.youtube.com/embed/<?php echo $video->code;?>?theme=light&rel=0&showinfo=0&iv_load_policy=3&modestbranding=1&nologo=1&vq=large&autoplay=0&ps=docs" ></iframe>
        <?php }?>
    </div>
    <h1><?php echo $video->name;?></h1>
    <div class="fb-like" data-href="<?php echo SITE_URL.Yii::app()->request->url;?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>
    <div><span class="see"><?php echo $video->views;?></span></div>
    <!--<div class="description">
        <p><?php /*echo $video->description;*/?></p>
    </div>-->
    <div class="fb-comments" data-href="<?php echo SITE_URL.Yii::app()->request->url;?>" data-numposts="5" data-colorscheme="light" width="100%" data-width="100%"></div>
</div>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar-r')); ?>
<?php $this->widget('application.widgets.video.VideoRelatedGenreWidget', array('meid'=>$video->_id,'keywors'=>$video->name,'genre'=>$video->genre));?>
<?php $this->endWidget();?>