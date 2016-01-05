<?php
class BaseCategoryModel extends EMongoDocument
{
    public $_id;
    public $name;
    public $code;
    public $description;
    public $parent;
    public $ordering;
    public $created_time;
    public $updated_time;
    public $status;
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
        return 'category';
    }
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name', 'required'),
            array('name,code,description,parent,ordering,created_time,updated_time,status', 'safe'),
            array('name,code,description,parent', 'safe', 'on'=>'search'),
        );
    }
    public function attributeLabels()
    {
        return array(
            'name'=>Yii::t('admin','Tên chủ đề'),
            'description'=>Yii::t('admin','Mô tả'),
            'code'=>Yii::t('admin','Mã chủ đề'),
            'parent'=>Yii::t('admin','Chủ đề cha'),
            'ordering'=>Yii::t('admin','Thứ tự'),
            'status'=>Yii::t('admin','Trạng thái'),
        );
    }
}