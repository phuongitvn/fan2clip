<?php
Yii::import('application.modules.MogCategory.models._base.BaseCategoryModel');
class AdminCategoryModel extends BaseCategoryModel
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}