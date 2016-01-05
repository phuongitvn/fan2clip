<?php
Yii::import('common.models.mongo.CategoryModel');
class WebCategoryModel extends CategoryModel
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}