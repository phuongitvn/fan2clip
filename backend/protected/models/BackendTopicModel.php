<?php

Yii::import('common.models.db.BlogTopicModel');

class BackendTopicModel extends BlogTopicModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function scopes()
	{
		return array(
			'published'=>array('condition'=>'status='.self::STATUS_ACTIVE),	
			'unpublished'=>array('condition'=>'status='.self::STATUS_DEACTIVE),	
		);
	}
}