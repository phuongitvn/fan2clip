<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/14/2015
 * Time: 8:23 PM
 */
class VideoHotGenreWidget extends CWidget
{
    public $genre='news';
    public $limit=10;
    public $title='Video Hot';
    public function run()
    {
        $videoHot = WebTubeVideo::model()->getHotVideo($this->genre, $this->limit);
        $title = $this->title;
        $this->render('video_hot_by_genre', compact('videoHot','title'));
    }
}