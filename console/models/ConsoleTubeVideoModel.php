<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/13/2015
 * Time: 8:50 PM
 */
class ConsoleTubeVideoModels extends TubeVideo
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function add()
    {
        $this->created_datetime = date('Y-m-d H:i:s');
        $this->updated_datetime = date('Y-m-d H:i:s');
        $this->views =  0;
        if(!isset($this->genre)){
            $this->genre = "news";
        }
        if(!isset($this->tags)){
            $this->tags = "funy";
        }
        if(!isset($this->related)){
            $this->related = 0;
        }
        return self::save();
    }
}