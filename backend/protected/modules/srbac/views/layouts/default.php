<?php
$css='srbac.css';
$cssFile = Yii::getPathOfAlias("application.modules.srbac.css") . DS . $css;
$cssDir = Yii::getPathOfAlias("application.modules.srbac.css");
if (is_file($cssFile)) {
	$published = Yii::app()->assetManager->publish($cssDir,false, -1, YII_DEBUG);
	$cssFile = $published . "/" . $css;
	Yii::app()->clientScript->registerCssFile($cssFile);
}

$this->beginContent('application.views.layouts.body');
echo $content;
$this->endContent();
?>