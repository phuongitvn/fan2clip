<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/14/2015
 * Time: 8:23 PM
 */
class VideoRelatedGenreWidget extends CWidget
{
    public $meid;
    public $genre='';
    public $limit=10;
    public $title='Video Related';
    public $keywors = '';
    public $layout = 'mini';
    public function run()
    {
        $videoRelated = WebTubeVideo::model()->getRelatedVideo($this->meid,$this->keywors,$this->genre);
        $count = $this->limit-count($videoRelated);
        if($count>0){
            foreach($videoRelated as $vr){
                $meIds[]=$vr->_id;
            }
            $meIds[] = $this->meid;
            $videoMore = WebTubeVideo::model()->getLastestNew($this->genre, $meIds, $count);
            $videoRelated = (object) array_merge((array) $videoRelated, (array) $videoMore);
        }
        $title = $this->title;
        $this->render('video_related_by_genre', compact('videoRelated','title'));
    }
}