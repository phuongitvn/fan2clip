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
            <div class="vil-thumb col-60">
                <div class="wrr-thumb">
                    <a target="_blank" href="<?php echo $link;?>"><img alt="<?php echo $video->name;?>" width="100%" src="<?php echo $thumb;?>" /></a>
                </div>
            </div>
            <div class="vil-info col-40">
                <h1><a href="<?php echo $link;?>" target="_blank"><?php echo $video->name;?></a></h1>
                <div>
                    <span class="author"><?php
                        echo 'post by ';
                        echo '<span class="author-name">';
                        if(array_key_exists($video->created_by,$users)){
                            echo $users[$video->created_by]['first_name'].' '.$users[$video->created_by]['last_name'];
                        }else{
                            echo 'Fan2Clip';
                        }
                        echo '</span>';
                        ?></span>
                </div>
                <div class="pos">
                    <span class="see pos-l" style="margin: 3px 10px 0 0;"><?php echo $video->views;?></span>

                </div>
                <!--<div class="social">
                    <?php /*$this->widget('common.widgets.social.ShareButtonWidget', array(
                        'url_share'=>SITE_URL.$link,
                        'title_share'=>$video->name
                    ));*/?>
                </div>-->
            </div>
        </li>
<?php
    }
    echo '</ul>';
    echo '</div>';
}