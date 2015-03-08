<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/8/2015
 * Time: 8:22 PM
 */
if(!empty($data)){
    echo '<div class="listview">';
    echo '<ul class="items-listview items-listview-'.$this->layout.'">';
    foreach($data as $video){
        $link = Yii::app()->createUrl('/video/view', array('id'=>$video->_id,'url_key'=>Common::makeFriendlyUrl($video->name)));
?>
        <li class="video-item-list">
            <div class="vil-thumb col-3">
                <div class="wrr-thumb">
                    <a href="<?php echo $link;?>"><img alt="<?php echo $video->name;?>" width="100%" src="https://i.ytimg.com/vi/<?php echo $video->code;?>/mqdefault.jpg" /></a>
                </div>
            </div>
            <div class="vil-info col-7">
                <h1><a href="<?php echo $link;?>"><?php echo $video->name;?></a></h1>
                <div>
                    <span class="see">1298</span>
                </div>
            </div>
        </li>
<?php
    }
    echo '</ul>';
    echo '</div>';
}