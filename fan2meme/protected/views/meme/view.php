<?php
$image = Meme::model()->getAvatarUrl($meme->content);
$cs = Yii::app()->getClientScript();
$cs->registerMetaTag('Fan2Meme', NULL, NULL, array('property'=>'og:site_name'));
//$cs->registerMetaTag('https://www.facebook.com/pages/Fan2Clip/1571931466409541', NULL, NULL, array('property'=>'fb:admins'));
$cs->registerMetaTag('417326001770427', NULL, NULL, array('property'=>'fb:app_id'));
$cs->registerMetaTag(SITE_MEME_URL.Yii::app()->request->url, NULL, NULL, array('property' =>'og:url'));
$cs->registerMetaTag(preg_replace("/&#?[a-z0-9]+;/i","",$meme->title), NULL, NULL, array('property'=>'og:title'));
$cs->registerMetaTag('blog', NULL, NULL, array('property'=>'og:type'));
$cs->registerMetaTag($image, NULL, NULL, array('property'=>'og:image'));
$cs->registerMetaTag(time(), NULL, NULL, array('property'=>'og:updated_time'));
$cs->registerMetaTag(strip_tags($meme->title).' '.Yii::app()->params['metaTags']['description'], NULL, NULL, array('property'=>'og:description'));
$link = Yii::app()->createUrl('/meme/view', array('id'=>$meme->_id, 'url_key'=>Common::makeFriendlyUrl($meme->title)));
?>
<div class="video-detail">
    <h1><?php echo $meme->title;?></h1>
    <div class="video-info">
        <img width="100%" src="<?php echo $image;?>" />
    </div>
    <div class="extra-info pos">
        <span class="author pos-l"><?php
            $users = WebUsers::model()->getAllUsers();
            echo 'post by ';
            echo '<span class="author-name">';
            if(array_key_exists($meme->created_by,$users)){
                echo $users[$meme->created_by]['first_name'].' '.$users[$meme->created_by]['last_name'];
            }else{
                echo 'Fan2Meme';
            }
            echo '</span>';
            ?>
        </span>
        <div class="pos-r">
            <span class="see fl" style="margin: 3px 10px 0 0;"><?php echo $meme->views;?></span>
            <?php $this->widget('common.widgets.social.LikeButtonWidget', array(
                'url_like'=>SITE_MEME_URL.$link,
                'class'=>'fl'
            ));?>
        </div>
    </div>
    <div class="share-info">
        <?php $this->widget('common.widgets.social.ShareButtonWidget', array(
            'url_share'=>SITE_MEME_URL.$link,
            'title_share'=>$meme->title
        ));?>
    </div>
    <div class="fb-comments" data-href="<?php echo SITE_MEME_URL.Yii::app()->request->url;?>" data-numposts="5" data-colorscheme="light" width="100%" data-width="100%"></div>
</div>
<?php $this->beginWidget('system.web.widgets.CClipWidget', array('id'=>'sidebar-r')); ?>
<?php $this->widget('application.widgets.meme.MemeRelatedGenreWidget', array('meid'=>$meme->_id,'keywors'=>$meme->title,'genre'=>$meme->genre));?>
<?php $this->endWidget();?>