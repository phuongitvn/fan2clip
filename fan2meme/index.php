<?php
define('SITE_MEME_URL', 'http://fan2meme.com');
// change the following paths if necessary
include_once '../define.php';
$config=dirname(__FILE__).'/protected/config/web.php';

// remove the following lines when in production mode
defined('YII_DEBUG') or define('YII_DEBUG',false);
// specify how many levels of call stack should be shown in each log message
defined('YII_TRACE_LEVEL') or define('YII_TRACE_LEVEL',3);

require_once($yii);
Yii::createWebApplication($config)->run();
