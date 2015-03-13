<?php

/**
 * This is the MongoDB Document model class based on table "tube_video".
 */
class TubeVideo extends EMongoDocument
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

	/**
	 * Returns the static model of the specified AR class.
	 * @return TubeVideo the static model class
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
		return 'tube_video';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cat_id, views, status, created_by', 'numerical', 'integerOnly'=>true),
			array('name', 'length', 'max'=>255),
			array('code', 'length', 'max'=>100),
			array('link_id', 'length', 'max'=>100),
			array('created_datetime, updated_datetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('_id, name, code, description, link_id, cat_id, status, created_datetime, updated_datetime, created_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'name' => 'Name',
			'code' => 'Code',
			'description' => 'Description',
			'link_id' => 'Link',
			'cat_id' => 'Cat',
			'status' => 'Status',
			'created_datetime' => 'Created Datetime',
			'updated_datetime' => 'Updated Datetime',
			'created_by' => 'Created By',
		);
	}
}