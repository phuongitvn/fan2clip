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
?>
        <li class="video-item-list <?php if($i==count($data)) echo 'last_item';?>">
            <div class="vil-thumb col-66">
                <div class="wrr-thumb">
                    <a href="<?php echo $link;?>"><img alt="<?php echo $video->name;?>" width="100%" src="https://i.ytimg.com/vi/<?php echo $video->code;?>/hqdefault.jpg" /></a>
                </div>
            </div>
            <div class="vil-info col-33">
                <h1><a href="<?php echo $link;?>"><?php echo $video->name;?></a></h1>
                <div>
                    <span class="see"><?php echo $video->views;?></span>
                </div>
            </div>
        </li>
<?php
    }
    echo '</ul>';
    echo '</div>';
}