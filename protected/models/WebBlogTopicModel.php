<?php

Yii::import('common.models.db.BlogTopicModel');

class WebBlogTopicModel extends BlogTopicModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}