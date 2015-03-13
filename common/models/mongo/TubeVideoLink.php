<?php

/**
 * This is the MongoDB Document model class based on table "tube_video_link".
 */
class TubeVideoLink extends EMongoDocument
{
	public $_id;
	public $title;
	public $code;
	public $link;
	public $thumb;
	public $type;
	public $genre;
	public $tags;
    public $related;
	public $cat_id;
	public $status;
	public $created_datetime;
	public $updated_datetime;

	/**
	 * Returns the static model of the specified AR class.
	 * @return TubeVideoLink the static model class
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
		return 'tube_video_link';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cat_id, status', 'numerical', 'integerOnly'=>true),
			array('title, link, thumb', 'length', 'max'=>255),
			array('code', 'length', 'max'=>100),
			array('created_datetime', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, code, link, thumb, cat_id, status, created_datetime, updated_datetime', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'title' => 'Title',
			'code' => 'Code',
			'link' => 'Link',
			'thumb' => 'Thumb',
			'cat_id' => 'Cat',
			'status' => 'Status',
			'created_datetime' => 'Created Datetime',
			'updated_datetime' => 'Updated Datetime',
		);
	}
}