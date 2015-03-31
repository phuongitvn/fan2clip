<?php
/**
 * This is the MongoDB Document model class based on table "tube_video".
 */
class BaseMeme extends EMongoDocument
{
	public $_id;
	public $code;
	public $title;
    public $content;
	public $type;
	public $link_id;
    public $tags;
    public $genre;
	public $status;
	public $views;
    public $source;
	public $created_datetime;
	public $updated_datetime;
    public $active_datetime;
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
		return 'meme';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('_id ,code ,title ,content ,type ,link_id ,tags ,genre ,status ,views ,source ,created_datetime ,updated_datetime ,active_datetime ,created_by', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
		);
	}
}