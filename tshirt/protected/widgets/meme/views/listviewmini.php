<?php
if(!empty($data)){
    echo '<div class="listview">';
    echo '<ul class="items-listview items-listview-'.$this->layout.'">';
    $i=0;
    foreach($data as $video){
        $i++;
        $link = Yii::app()->createUrl('/meme/view', array('id'=>$video->_id,'url_key'=>Common::makeFriendlyUrl($video->title)));
        $image = Meme::model()->getAvatarUrl($video->content);
?>
        <li class="video-item-list <?php if($i==10) echo 'last_item';?>">
            <div class="vil-thumb col-100">
                <div class="wrr-thumb">
                    <a href="<?php echo $link;?>"><img alt="<?php echo $video->title;?>" width="100%" src="<?php echo $image;?>" /></a>
                </div>
            </div>
            <div class="vil-info col-100">
                <h1><a href="<?php echo $link;?>"><?php echo $video->title;?></a></h1>
                <!--<div>
                    <span class="author"><?php
/*                        echo 'post by ';
                        echo '<span class="author-name">';
                        if(array_key_exists($video->created_by,$users)){
                            echo $users[$video->created_by]['first_name'].' '.$users[$video->created_by]['last_name'];
                        }else{
                            echo 'Fan2Clip';
                        }
                        echo '</span>';
                        */?></span>
                    <span class="see"><?php /*echo $video->views;*/?></span>
                </div>-->
            </div>
        </li>
<?php
    }
    echo '</ul>';
    echo '</div>';
}