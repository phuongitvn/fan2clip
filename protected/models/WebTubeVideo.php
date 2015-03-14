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
    public static function formatKeywordsPatternSearch($keyword)
    {
        $keyFilter = preg_replace('/[^\da-z\ ]/i', '', $keyword);
        $keyRegexPattern = explode(' ',$keyFilter);
        $keyArr = array();
        foreach($keyRegexPattern as $key){
            if(strlen($key)>4){
                $keyArr[]=$key;
            }
        }
        $keyArr = array_unique($keyArr);
        if(count($keyArr)>0) {
            $keyArr = implode('|', $keyArr);
            $regexPattern = '/(' . $keyArr . ')/i';
        }else{
            $regexPattern='';
        }
        return $regexPattern;
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
    public function getLastestNew($genre='',$meId,$limit=10)
    {
        $c = array(
            'conditions'=>array(
                'status'=>array('equals' => 1),
            ),
            'sort'=>array('_id'=>EMongoCriteria::SORT_DESC),
            'limit'=> $limit,
        );
        if(!is_array($meId) && $meId<>''){
            $meId = array($meId);
            $c['conditions']['_id']=array('notIn'=>$meId);
        }elseif(is_array($meId)){
            $c['conditions']['_id']=array('notIn'=>$meId);
        }
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
        $keyRegexPattern = self::formatKeywordsPatternSearch($keySearch);
        if($keyRegexPattern<>''){
                $regexObj = new MongoRegex($keyRegexPattern);
                $c['conditions']['name'] = array('equals'=>$regexObj);
        }
        return self::model()->findAll($c);
    }
}