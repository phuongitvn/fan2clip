<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/13/2015
 * Time: 8:50 PM
 */
class ConsoleTubeLinkModel extends TubeVideoLink
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function add()
    {
        $this->created_datetime = date('Y-m-d H:i:s');
        $this->updated_datetime = date('Y-m-d H:i:s');
        return self::save();
    }
}