<?php

Yii::import('common.models.db._base.BaseSettingsModel');

class SettingsModel extends BaseSettingsModel
{
	const SYSTEM = 0;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public static function getSetting($key)
	{
		return self::model()->findByAttributes($key)->value_code;
	}
	public static function setSetting($key, $value)
	{
		$model = self::model()->findByPk($key);
		if($model){
			$model->setAttribute('value_code', $value);
			return $model->save(false);
		}
		return false;
	}
	public static function getAll()
	{
		$list = self::model()->findAll();
		$results = array();
		foreach ($list as $item){
			$results[$item->key_code] = $item;
		}
		return $results;
	}
}