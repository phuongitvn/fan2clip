<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/14/2015
 * Time: 8:23 PM
 */
class MemeHotGenreWidget extends CWidget
{
    public $genre='';
    public $limit=10;
    public $title='Meme Hot';
    public function run()
    {
        $memeHot = Meme::model()->getHotMeme($this->genre, $this->limit);
        $title = $this->title;
        $this->render('meme_hot_by_genre', compact('memeHot','title'));
    }
}