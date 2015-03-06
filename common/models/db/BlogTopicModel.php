<?php

Yii::import('common.models.db._base.BaseBlogTopicModel');

class BlogTopicModel extends BaseBlogTopicModel
{
	const STATUS_ACTIVE=1;
	const STATUS_DEACTIVE=0;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}