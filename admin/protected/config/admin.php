<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/17/2015
 * Time: 8:43 PM
 */
return CMap::mergeArray(
    require_once dirname(__FILE__).'../../../../common/config/common.php',
    array(
        'basePath'=>dirname(__FILE__).DS.'..',
        'name'=>'Admin Control Panel',
        'defaultController'=>'site',
        'language'=>'en',
        'import'=>array(
            'application.components.*',
            'application.models.*',
            //'common.ext.mongodb.*',
        ),
        'modules'=>array(
            'gii' => array(
                'class' => 'system.gii.GiiModule',
                'password'=>'111',
                'generatorPaths' => array(
                    'ext.giix-core', // giix generators
                ),
                'ipFilters'=>array('127.0.0.1','::1'),
            ),
        ),
        'components'=>array(),
    )
);