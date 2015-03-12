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
    $i=0;
    foreach($data as $video){
        $i++;
        $link = Yii::app()->createUrl('/video/view', array('id'=>$video->_id,'url_key'=>Common::makeFriendlyUrl($video->name)));
        if(isset($video->type) && $video->type=='vimeo'){
            $thumb = $video->thumb;
        }else{
            $thumb = 'https://i.ytimg.com/vi/'.$video->code.'hqdefault.jpg';
        }
?>
        <li class="video-item-list <?php if($i==count($data)) echo 'last_item';?>">
            <div class="vil-thumb col-3">
                <div class="wrr-thumb">
                    <a href="<?php echo $link;?>"><img alt="<?php echo $video->name;?>" width="100%" src="<?php echo $thumb;?>" /></a>
                </div>
            </div>
            <div class="vil-info col-7">
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