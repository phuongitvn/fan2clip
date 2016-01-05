<?php
Yii::import('common.models.mongo._base.BaseCategoryModel');
class CategoryModel extends BaseCategoryModel
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}