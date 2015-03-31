<?php
$image = Meme::model()->getAvatarUrl($meme->content);
$cs = Yii::app()->getClientScript();
$cs->registerMetaTag('Fan2Clip', NULL, NULL, array('property'=>'og:site_name'));
//$cs->registerMetaTag('https://www.facebook.com/pages/Fan2Clip/1571931466409541', NULL, NULL, array('property'=>'fb:admins'));
$cs->registerMetaTag('417326001770427', NULL, NULL, array('property'=>'fb:app_id'));
$cs->registerMetaTag(SITE_URL.Yii::app()->request->url, NULL, NULL, array('property' =>'og:url'));
$cs->registerMetaTag($meme->title, NULL, NULL, array('property'=>'og:title'));
$cs->registerMetaTag('blog', NULL, NULL, array('property'=>'og:type'));
$cs->registerMetaTag($image, NULL, NULL, array('property'=>'og:image'));
$cs->registerMetaTag(time(), NULL, NULL, array('property'=>'og:updated_time'));
$cs->registerMetaTag($meme->title.Yii::app()->params['metaTags']['description'], NULL, NULL, array('property'=>'og:description'));
$link = Yii::app()->createUrl('/video/view', array('id'=>$meme->_id, 'url_key'=>Common::makeFriendlyUrl($meme->title)));
?>
<div class="video-detail">
    <h1><?php echo $meme->title;?></h1>
    <div class="video-info">
        <img width="100%" src="<?php echo $image;?>" />
    </div>
    <div style="margin: 10px;">
        <span class="author"><?php
            $users = WebUsers::model()->getAllUsers();
            echo 'post by ';
            echo '<span class="author-name">';
            if(array_key_exists($meme->created_by,$users)){
                echo $users[$meme->created_by]['first_name'].' '.$users[$meme->created_by]['last_name'];
            }else{
                echo 'Fan2Meme';
            }
            echo '</span>';
            ?></span>
    </div>
    <div class="extra-info">
        <span class="see" style="float: right"><?php echo $meme->views;?></span>
    <!--<div class="fb-like" data-href="<?php /*echo SITE_URL.Yii::app()->request->url;*/?>" data-layout="standard" data-action="like" data-show-faces="true" data-share="true"></div>-->
        <span class="twitter">
            <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo SITE_URL.$link;?>" data-text="<?php echo CHtml::encode($meme->title);?>" data-size="large" data-count="none">Tweet</a>
            <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
        </span>
        <span>
            <a title="<?php echo CHtml::encode($meme->title);?>" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(SITE_URL.$link);?>&amp;t=<?php echo urlencode($meme->title);?>" target="_blank">
                <img style="vertical-align: top;height: 28px" src="/images/facebook.png" />
            </a>
        </span>
    </div>
    <div class="fb-comments" data-href="<?php echo SITE_URL.Yii::app()->request->url;?>" data-numposts="5" data-colorscheme="light" width="100%" data-width="100%"></div>
</div>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar-r')); ?>
<?php $this->widget('application.widgets.meme.MemeRelatedGenreWidget', array('meid'=>$meme->_id,'keywors'=>$meme->title,'genre'=>$meme->genre));?>
<?php $this->endWidget();?>