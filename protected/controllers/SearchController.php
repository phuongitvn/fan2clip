<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/10/2015
 * Time: 10:26 PM
 */
class SearchController extends FrontendController
{
    public $layout='column1';
    public function actionIndex()
    {
        $keyword = Yii::app()->request->getParam('key','');
        $page = Yii::app()->request->getParam('page',1);
        $limit = 10;
        $offset = ($page-1)*$limit;
        // Find all records witch have first name starring on a, b and c, case insensitive search
        $keyRegexPattern = WebTubeVideo::formatKeywordsPatternSearch($keyword);
        if(empty($keyRegexPattern)){
            $data=null;
        }else {
            $regexObj = new MongoRegex($keyRegexPattern);

            $c = array(
                'conditions' => array(
                    'status' => array('equals' => 1),
                    'name' => array('equals' => $regexObj)
                ),
                'limit' => $limit,
                'offset' => $offset
            );
            $data = WebTubeVideo::model()->findAll($c);
        }
        $videoHot = WebTubeVideo::model()->getHotVideo();
        $this->render('index', compact('data','page','videoHot','keyword','limit'));
    }
}