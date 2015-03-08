<?php
define('SITE_URL', 'http://localhost:8989');
define('SITE_PATH', dirname(dirname(dirname(__FILE__))));
Yii::setPathOfAlias('root', dirname(dirname(dirname(__FILE__))));
Yii::setPathOfAlias('common', dirname(dirname(dirname(__FILE__))) . DS . 'common');
Yii::setPathOfAlias('frontend', dirname(dirname(dirname(__FILE__))) . DS . 'protected');
Yii::setPathOfAlias('backend', dirname(dirname(dirname(__FILE__))) . DS . 'backend');
Yii::setPathOfAlias('console', dirname(dirname(dirname(__FILE__))) . DS . 'console');
//Yii::setPathOfAlias('system', dirname(dirname(dirname(__FILE__))) . DS . 'common'.DS.'libs'.DS.'framework');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return 
	array(
		'import'=>array(
				'common.components.*',
				'common.models.db.*',
                'common.models.mongo.*',
				'common.extensions.mongodb.*',
		),
	// application components
	'components'=>array(
		'db'=>array(
			'connectionString' => 'mysql:host=localhost;dbname=fan2clip',
			'emulatePrepare' => true,
			'username' => 'root',
			'password' => '123456',
			'charset' => 'utf8',
			'tablePrefix' => 'tbl_',
		),
		'mongodb' => array(
			'class'            => 'EMongoDB',
			'connectionString' => 'mongodb://localhost',
			'dbName'           => 'fan2clip',
			'fsyncFlag'        => true,
			'safeFlag'         => true,
			'useCursor'        => false
		),
	),
);
