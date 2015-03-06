<?php

Yii::import('common.models.db._base.BaseUserWebModel');

class UserWebModel extends BaseUserWebModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
}