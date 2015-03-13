<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/14/2015
 * Time: 12:16 AM
 */
class KidsController extends FrontendController
{
    public $layout = 'column1';
    public function actionIndex()
    {
        $page = Yii::app()->request->getParam('page',1);
        $limit = 10;
        $offset = ($page-1)*$limit;
        $c = array(
            'conditions'=>array(
                'status'=>array('equals' => 1),
                'genre'=>array('equals'=>'kids'),
            ),
            'sort'=>array('_id'=>EMongoCriteria::SORT_DESC),
            'limit'=> $limit,
            'offset'=> $offset
        );
        $video = TubeVideo::model()->findAll($c);
        $videoHot = WebTubeVideo::model()->getHotVideo('kids');
        $this->render('index', array(
            'data'=>$video,
            'page'=>$page,
            'videoHot'=>$videoHot
        ));
    }
}