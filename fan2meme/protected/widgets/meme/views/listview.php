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
        $link = Yii::app()->createUrl('/meme/view', array('id'=>$video->_id, 'url_key'=>Common::makeFriendlyUrl($video->title)));
        $image = Meme::model()->getAvatarUrl($video->content);
?>
        <li class="video-item-list <?php if($i==count($data)) echo 'last_item';?>">
            <div class="vil-info col-100">
                <h1><a href="<?php echo $link;?>" target="_blank"><?php echo $video->title;?></a></h1>
                <div>
                    <span class="author"><?php
                        echo 'post by ';
                        echo '<span class="author-name">';
                        if(array_key_exists($video->created_by,$users)){
                            echo $users[$video->created_by]['first_name'].' '.$users[$video->created_by]['last_name'];
                        }else{
                            echo 'Fan2Meme';
                        }
                        echo '</span>';
                        ?></span>
                    <span class="see"><?php echo $video->views;?></span>
                </div>
                <div class="social">
                    <span class="twitter">
                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo SITE_MEME_URL.$link;?>" data-text="<?php echo CHtml::encode($video->title);?>" data-size="large" data-count="none">Tweet</a>
                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                    </span>
                    <span>
                        <a title="<?php echo CHtml::encode($video->title);?>" href="http://www.facebook.com/sharer.php?u=<?php echo urlencode(SITE_MEME_URL.$link);?>&amp;t=<?php echo urlencode($video->title);?>" target="_blank">
                            <img style="vertical-align: top;height: 28px" src="/images/facebook.png" />
                        </a>
                    </span>
                </div>
            </div>
            <div class="vil-thumb col-100">
                <div class="wrr-thumb">
                    <a target="_blank" href="<?php echo $link;?>"><img alt="<?php echo $video->title;?>" width="100%" src="<?php echo $image;?>" /></a>
                </div>
            </div>
        </li>
<?php
    }
    echo '</ul>';
    echo '</div>';
}