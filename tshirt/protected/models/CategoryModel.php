<?php
Yii::import('common.models.mongo.CategoryModel');
class WebCategoryModel extends CategoryModel
{
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
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
                if($cat->parent!=''){
                    $result[] = array(
                        'label'=>$cat->name,
                        'code'=>$cat->code,
                        'hassub'=>true,
                        'subs'=>$this->getSubsMenuItem($cat, $category)
                    );
                }else {
                    $result[] = array(
                        'label'=>$cat->name,
                        'code'=>$cat->code,
                        'hassub'=>false
                    );
                }
            }
        }
    }
    private function getSubsMenuItem($menuObject, $allMenu)
    {
        if($menuObject->parent!=''){
            $allSubs = array();
            foreach($allMenu as $menu){
                if($menu->parent==$menuObject->code){
                    $allSubs[] = array(
                        'label'=>$menu->name,
                        'code'=>$menu->code,
                        'hassub'=>$menu->parent!=''?true:false,
                        'subs'=>$this->getSubsMenuItem($menu,$allMenu)
                    );
                }
            }
        }else{
            $allSubs = array(
                'label'=>$menuObject->name,
                'code'=>$menuObject->code,
                'hassub'=>false
            );
        }
        return $allSubs;
    }
}