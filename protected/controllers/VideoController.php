<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/8/2015
 * Time: 9:49 PM
 */
class VideoController extends FrontendController
{
    public $layout = 'column1';
    public function actionIndex()
    {
        //
    }
    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        $id = new MongoId($id);
        $video = TubeVideo::model()->findByPk($id);
        if(!$video){
            throw new CHttpException('404','Your request is not found');
        }
        if(!isset(Yii::app()->session['visit.'.$id]) || (time() - Yii::app()->session['visit.'.$id])>300) {
            $video->views = intval($video->views + 1);
            if ($video->save()) {
                Yii::app()->session['visit.' . $id] = time();
            }
        }
        $c = array(
            'conditions'=>array(
                'status'=>array('equals' => 1)
            ),
            'sort'=>array('_id'=>EMongoCriteria::SORT_DESC),
            'limit'=>10
        );
        $data = TubeVideo::model()->findAll($c);
        $this->render('view', compact('video','data'));
    }
}