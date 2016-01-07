<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/14/2015
 * Time: 8:23 PM
 */
class VideoHotGenreWidget extends CWidget
{
    public $genre='';
    public $limit=10;
    public $title='Video Hot';
    public function run()
    {
        if($this->beginCache('video_hot_week_'.$this->genre, array('duration'=>86400))) {
            $week = date('W');
            $year = date('Y');
            $time = Common::getFirstDayOfWeek($year,$week);
            $endTime = date('Y-m-d 23:59:59', strtotime("+7 day", $time));
            $startTime = date('Y-m-d 00:00:00', $time);
            $videoHot = WebTubeVideo::model()->getHotVideo($this->genre, $this->limit, $startTime, $endTime);
            if(!$videoHot){
                $videoHot = WebTubeVideo::model()->getHotVideo($this->genre, $this->limit);
            }
            $title = $this->title;
            $this->render('video_hot_by_genre', compact('videoHot','title'));
            $this->endCache();
        }
    }
}