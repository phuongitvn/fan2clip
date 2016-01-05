<?php
class BaseTshirtModel extends EMongoDocument
{
    public $_id;
    public $name;
    public $code;
    public $price;
    public $url;
    public $thumb_image;
    public $large_image;
    public $description;
    public $site;
    public $ordering;
    public $views;
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
        return 'tshirt';
    }
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('name','required'),
            array('name,code,price,url,thumb_image,large_image,site,ordering,description,views,created_time,updated_time,status', 'safe'),
            array('name,code,description', 'safe', 'on'=>'search'),
        );
    }
    public function attributeLabels()
    {
        return array(
            'name'=>Yii::t('admin','Name'),
            'price'=>Yii::t('admin','Price'),
            'description'=>Yii::t('admin','Description'),
            'code'=>Yii::t('admin','SKU Code'),
            'ordering'=>Yii::t('admin','Ordering'),
            'status'=>Yii::t('admin','Status'),
        );
    }
}