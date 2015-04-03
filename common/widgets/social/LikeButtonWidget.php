<?php
class LikeButtonWidget extends CWidget
{
    public $url_like = '';
    public $class = '';
    public function run()
    {
        $this->render('like_button',array(
            'url_like'=>$this->url_like,
            'class'=>$this->class
        ));
    }
}