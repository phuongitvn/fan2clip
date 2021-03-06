<?php
Yii::import('common.models.mongo.CategoryModel');
class WebCategoryModel extends CategoryModel
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
    public function getAllCategories()
    {
        $c = array(
            'conditions'=>array(
                'status'=>array('==' => 1),
            ),
            'sort'=>array('ordering'=>EMongoCriteria::SORT_ASC),
        );
        $category = self::model()->findAll($c);
        return $category;
    }
    public function getCategory()
    {
        $c = array(
            'conditions'=>array(
                'status'=>array('==' => 1),
            ),
            'sort'=>array('ordering'=>EMongoCriteria::SORT_ASC),
        );
        $category = self::model()->findAll($c);
        $result = array();
        if($category){
            foreach($category as $cat){
                if(empty($cat->parent)){
                    $result[] = array(
                        'label'=>$cat->name,
                        'code'=>$cat->code,
                        'parent'=>$cat->parent,
                        'subs'=>$this->getSubsMenuItem($cat, $category)
                    );
                }
            }
        }
        return $result;
    }
    private function getSubsMenuItem($menuObject, $allMenu)
    {
        $allSubs = array();
        foreach($allMenu as $menu){
            if($menu->parent==$menuObject->code){
                $allSubs[] = array(
                    'label'=>$menu->name,
                    'code'=>$menu->code,
                    'parent'=>$menu->parent,
                    'subs'=>$this->getSubsMenuItem($menu,$allMenu)
                );
            }
        }
        return $allSubs;
    }
}