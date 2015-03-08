<?php

/**
 * This is the MongoDB Document model class based on table "tube_category".
 */
class TubeCategory extends EMongoDocument
{
	public $_id;
	public $name;
	public $url_key;
	public $created_datetime;
	public $status;

	/**
	 * Returns the static model of the specified AR class.
	 * @return TubeCategory the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * returns the primary key field for this model
	 */
	public function primaryKey()
	{
		return '_id';
	}

	/**
	 * @return string the associated collection name
	 */
	public function getCollectionName()
	{
		return 'tube_category';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('_id', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('_id', 'length', 'max'=>20),
			array('name, url_key', 'length', 'max'=>100),
			array('created_datetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('_id, name, url_key, created_datetime, status', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'_id' => 'ID',
			'name' => 'Name',
			'url_key' => 'Url Key',
			'created_datetime' => 'Created Datetime',
			'status' => 'Status',
		);
	}
}