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
    public function getHotVideo($genre='',$limit=10)
    {
        $c = array(
            'conditions'=>array(
                'status'=>array('equals' => 1),
            ),
            'sort'=>array('views'=>EMongoCriteria::SORT_DESC),
            'limit'=> $limit,
        );
        if($genre!=''){
            $c['conditions']['genre']=array('equals'=>$genre);
        }
        return self::model()->findAll($c);
    }
    public function getRelatedVideo($meId,$keySearch,$genre='',$limit=10)
    {
        $c = array(
            'conditions'=>array(
                'status'=>array('equals' => 1),
                '_id'=>array('<>'=>new MongoId($meId))
            ),
            'sort'=>array('_id'=>EMongoCriteria::SORT_ASC),
            'limit'=>$limit
        );
        if($genre!=''){
            $c['conditions']['genre']=array('equals'=>$genre);
        }

        if($keySearch<>''){
            $keyFilter = preg_replace('/[^\da-z\ ]/i', '', $keySearch);
            $keyRegexPattern = explode(' ',$keyFilter);
            $keyArr = array();
            foreach($keyRegexPattern as $key){
                if(strlen($key)>4){
                    $keyArr[]=$key;
                }
            }
            $keyArr = array_unique($keyArr);
            if(count($keyArr)>0){
                $keyArr = implode('|',$keyArr);
                $keyword = '('.$keyArr.')';
                $regexObj = new MongoRegex('/'.$keyword.'/i');
                $c['conditions']['name'] = array('equals'=>$regexObj);
            }
        }
        return self::model()->findAll($c);
    }
}