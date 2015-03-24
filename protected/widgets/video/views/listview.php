<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/8/2015
 * Time: 8:22 PM
 */
if(!empty($data)){
    echo '<div class="listview">';
    echo '<ul class="items-listview">';
    $i=0;
    foreach($data as $video){
        $i++;
        $link = Yii::app()->createUrl('/video/view', array('id'=>$video->_id, 'url_key'=>Common::makeFriendlyUrl($video->name)));
        if(isset($video->type) && $video->type=='vimeo'){
            $thumb = $video->thumb;
        }else{
            $thumb = 'https://i.ytimg.com/vi/'.$video->code.'/hqdefault.jpg';
        }
?>
        <li class="video-item-list <?php if($i==count($data)) echo 'last_item';?>">
            <div class="vil-thumb col-66">
                <div class="wrr-thumb">
                    <a target="_blank" href="<?php echo $link;?>"><img alt="<?php echo $video->name;?>" width="100%" src="<?php echo $thumb;?>" /></a>
                </div>
            </div>
            <div class="vil-info col-33">
                <h1><a href="<?php echo $link;?>" target="_blank"><?php echo $video->name;?></a></h1>
                <div>
                    <span class="see"><?php echo $video->views;?></span>
                </div>
                <div class="social">
                    <span class="twitter">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo SITE_URL.$link;?>" data-text="<?php echo CHtml::encode($video->name);?>" data-size="large" data-count="none">Tweet</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </span>
                    <span>
                        <a title="<?php echo CHtml::encode($video->name);?>" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(SITE_URL.$link);?>&amp;t=<?php echo urlencode($video->name);?>" target="_blank">
                            <img style="vertical-align: top;height: 28px" src="/images/facebook.png" />
                        </a>
                    </span>
                </div>
            </div>
        </li>
<?php
    }
    echo '</ul>';
    echo '</div>';
}