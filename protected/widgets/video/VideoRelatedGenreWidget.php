<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/14/2015
 * Time: 8:23 PM
 */
class VideoRelatedGenreWidget extends CWidget
{
    public $genre='news';
    public $limit=10;
    public $title='Video Related';
    public $keywors = '';
    public $layout = 'mini';
    public function run()
    {
        $videoRelated = WebTubeVideo::model()->getRelatedVideo($this->keywors,$this->genre);
        $title = $this->title;
        $this->render('video_related_by_genre', compact('videoRelated','title'));
    }
}