<?php
class BaseVideoModel extends EMongoDocument
{
    public $_id;
    public $name;
    public $code;
    public $thumb;
    public $type;
    public $description;
    public $link_id;
    public $cat_id;
    public $tags;
    public $genre;
    public $status;
    public $views;
    public $created_datetime;
    public $updated_datetime;
    public $created_by;
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function primaryKey()
    {
        return '_id';
    }
    public function getCollectionName()
    {
        return 'tube_video';
    }
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name,code','required'),
            array('_id ,name ,code ,thumb ,type ,description ,link_id ,cat_id ,tags ,genre ,status ,views ,created_datetime ,updated_datetime ,created_by', 'safe'),
            array('_id ,name ,code ,description, tags', 'safe', 'on'=>'search'),
        );
    }
    public function attributeLabels()
    {
        return array(
            'name'=>Yii::t('admin','Tiêu đề video'),
            'code'=>Yii::t('admin','Mã'),
            'description'=>Yii::t('admin','Mô tả'),
            'status'=>Yii::t('admin','Trạng thái'),
        );
    }
}