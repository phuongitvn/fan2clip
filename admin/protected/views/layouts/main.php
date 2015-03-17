<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->
    <link type="image/x-icon" rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/images/favicon.ico" >
    <?php
    $cs = Yii::app()->getClientScript();
    $cs->registerScriptFile(Yii::app()->request->baseUrl.'/js/jquery.min.js');
    //$cs->registerCoreScript('jquery');
    $dir = Yii::getPathOfAlias('common').DS.'libs/bootstrap';
    $assets = Yii::app()->assetManager->publish($dir, false, -1, YII_DEBUG);
    $cs->registerScriptFile($assets.'/js/bootstrap.min.js');
    $cs->registerCssFile($assets.'/css/bootstrap.min.css');
    $cs->registerCssFile(Yii::app()->request->baseUrl.'/css/main.css');
    ?>
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>
<body class="mongo">
<div id="header">
    <nav class="navbar navbar-default">
        <div class="container-fluid">
            <div class="navbar-header">
                <div class="btn-group btn-group-sm">
                    <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                        <b>Application</b>
                    </button>
                    <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                    </ul>
                </div>
            </div>
            <div class="collapse navbar-collapse" style="text-align: center">
                    <span class="pre-text"><a href="<?php echo SITE_URL;?>" target="_blank">Admin Control Panel</a></span>
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <div class="btn-group btn-group-sm">
                            <button style="padding: 0" type="button" class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                <img width="30" height="30" src="/admin/images/30.png" />
                                <b style="padding: 10px;">Nguyễn Văn Phương</b>
                            </button>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="#">Profile</a></li>
                                <li><a href="#">Settings</a></li>
                                <li><a href="<?php echo Yii::app()->createUrl('/gii');?>">Giix</a></li>
                                <li class="divider"></li>
                                <li><a href="#">Log Out</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
<div id="body"><?php echo $content; ?></div>
<div id="footer"></div>
</body>
</html>
