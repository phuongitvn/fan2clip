<?php
Yii::import('application.modules.MogTshirt.models._base.BaseTshirtModel');
class AdminTshirtModel extends BaseTshirtModel
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function beforeSave()
    {
        if(parent::beforeSave())
        {
            $this->status = !empty($this->status)?(int) $this->status:0;
            $this->ordering = !empty($this->ordering)?(int) $this->ordering:0;
            $this->updated_time = (string) date('Y-m-d H:i:s');
            return true;
        }
        else return false;
    }
}