<?php
class jwplayerWidget extends CWidget
{
    public $id='player';
    public $assetsPath;
    public $url;
    public $width='640';
    public $height='360';
    public function init()
    {
        $assets = dirname(__FILE__) . '/assets';
        $this->assetsPath  = Yii::app()->assetManager->publish($assets,false,1,YII_DEBUG);
        $cs = Yii::app()->clientScript;
        $cs->registerScriptFile($this->assetsPath . '/jwplayer.js', CClientScript::POS_END);
        $url = $this->url;
        $width = $this->width;
        $height = $this->height;
        $id = $this->id;
        $cs->registerScript('play_video',"
            jwplayer('$id').setup({
                file: '{$url}',
                height: $height,
                //image: 'bg.jpg',
                width: $width,
              });
        ",CClientScript::POS_END);
        parent::init();
    }
    public function run()
    {
        $this->render('default');
    }
}