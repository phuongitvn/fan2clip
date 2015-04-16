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
                <h1><a href="<?php echo $link;?>"><?php echo $video->title;?></a></h1>
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
                </div>
                <div class="pos">
                    <span class="see pos-l" style="margin: 3px 10px 0 0;"><?php echo $video->views;?></span>
                    <div class="social pos-r">
                        <?php $this->widget('common.widgets.social.ShareButtonWidget', array(
                            'url_share'=>SITE_MEME_URL.$link,
                            'title_share'=>$video->title
                        ));?>
                    </div>
                </div>
            </div>
            <div class="vil-thumb col-100">
                <div class="wrr-thumb">
                    <a href="<?php echo $link;?>"><img alt="<?php echo $video->title;?>" width="100%" src="<?php echo $image;?>" /></a>
                </div>
            </div>
        </li>
<?php
    }
    echo '</ul>';
    echo '</div>';
}