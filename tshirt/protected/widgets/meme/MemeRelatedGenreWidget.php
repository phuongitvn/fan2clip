<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/14/2015
 * Time: 8:23 PM
 */
class MemeRelatedGenreWidget extends CWidget
{
    public $meid;
    public $genre='';
    public $limit=10;
    public $title='Meme Related';
    public $keywors = '';
    public $layout = 'mini';
    public function run()
    {
        $memeRelated = Meme::model()->getRelatedMeme($this->meid,$this->keywors,$this->genre);
        $count = $this->limit-count($memeRelated);
        if($count>0){
            foreach($memeRelated as $vr){
                $meIds[]=$vr->_id;
            }
            $meIds[] = $this->meid;
            $memeMore = Meme::model()->getLastestNew($this->genre, $meIds, $count);
            $memeRelated = (object) array_merge((array) $memeRelated, (array) $memeMore);
        }
        $title = $this->title;
        $this->render('meme_related_by_genre', compact('memeRelated','title'));
    }
}