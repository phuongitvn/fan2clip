<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/10/2015
 * Time: 10:01 PM
 */
class WebTubeVideo extends TubeVideo
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function getHotVideo($limit=10)
    {
        $c = array(
            'conditions'=>array(
                'status'=>array('equals' => 1)
            ),
            'sort'=>array('views'=>EMongoCriteria::SORT_DESC),
            'limit'=> $limit,
        );
        return self::model()->findAll($c);
    }
}