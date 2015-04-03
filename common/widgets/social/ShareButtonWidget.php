<?php
class ShareButtonWidget extends CWidget{
    public $url_share = '';
    public $title_share = '';
    public function init()
    {
        Yii::app()->clientScript->registerScriptFile('https://apis.google.com/js/platform.js');
        parent::init();
    }
    public function run(){
        $this->render('share_button', array(
            'url_share'=>$this->url_share,
            'title_share'=>$this->title_share
        ));
    }
}