<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return CMap::mergeArray(
	require_once dirname(__FILE__) . '../../../../common/config/common.php',
	array(
	'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
	'name'=>'Fan2Meme',
	'theme'=>'default',
	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
        'common.ext.facebook-php-sdk-master.src.base_facebook',
        'common.ext.facebook-php-sdk-master.src.facebook',
	),

	'modules'=>array(
		// uncomment the following to enable the Gii tool
	),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		
		'urlManager'=>array(
			'urlFormat'=>'path',
			'rules'=>array(
				'home'=>'site/index',
				'<action:(login|logout|about|index|checktimeliked|contact)>' => 'site/<action>',
                'meme/<genre_key:[a-zA-Z0-9-]+>' => 'meme/genre',
                '<_c:\w+>/<url_key:[a-zA-Z0-9-]+>,<id:\w+>' => '<_c>/view',
                '<_c:\w+>' => '<_c>/index',
				'<_c:\w+>/<_a:\w+>/<id:\w+>' => '<_c>/<_a>',
				'<_c:\w+>/<_a:\w+>' => '<_c>/<_a>',
			),
			'urlSuffix'		=>	'.html',
			'showScriptName'=>false,
		),
		
		// uncomment the following to use a MySQL database
		/* 'errorHandler'=>array(
			// use 'site/error' action to display errors
			'errorAction'=>'site/error',
		), */
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning, traces',
				),
				// uncomment the following to show log messages on web pages
				/*
				array(
					'class'=>'CWebLogRoute',
				),
				*/
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
        'facebook'=>array(
            'appId'=>'1378047459169699',
            'appSecret'=>'e40e73cf1353003fb16f64f7f2a898ed',
            'return_url'=>'http://fan2meme.com/user/profile',
            'fbPermissions'=>'publish_actions,email'
        ),
        'google'=>array(
            'google_client_id'=>'948402294570-j7n1ka7lmpro0hsmem6vid0gr335eom5.apps.googleusercontent.com',
            'google_client_secret'=>'wPUfdCqwR7s7kPXVWUPwxO19',
            'google_redirect_url'=>'http://fan2meme.com/google/login',
            'google_developer_key'=>'AIzaSyAXBSAj7G_AYd03AJwS8OilfRRPPWnZysA'
        ),
		// this is used in contact page
		'adminEmail'=>'webmaster@example.com',
		'postsPerPage'=>20,
		'tagCloudCount'=>20,
        'metaTags'=>array(
            'description'=>'Fan2Meme has the best funny pics, GIFs, videos, memes, cute, wtf, geeky, cosplay photos on the web. We are your best source of happiness and awesomeness.'
        )
	),
	)
);
