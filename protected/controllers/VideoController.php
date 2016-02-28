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
        if(!$video || $video->status!=1){
            $this->redirect('/');
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
    public function actionGenre()
    {
        $page = Yii::app()->request->getParam('page',1);
        $genre = Yii::app()->request->getParam('genre_key','news');
        $cacheId = 'video_genre_'.str_replace(' ','',$genre).$page;
        if($this->beginCache($cacheId, array('duration'=>10000))) {
            $c = array(
                'conditions'=>array(
                    'status'=>array('==' => 1),
                    'genre'=>array('equals'=>$genre),
                ),
            );
            $total = TubeVideo::model()->count($c);
            $pager = new CPagination($total);
            $itemOnPaging = 5;
            $pager->pageSize = 15;
            $limit = $pager->getLimit();
            $offset = $pager->getOffset();
            $c = array(
                'conditions'=>array(
                    'status'=>array('==' => 1),
                    'genre'=>array('equals'=>$genre),
                ),
                'sort'=>array('_id'=>EMongoCriteria::SORT_DESC),
                'limit'=> $limit,
                'offset'=> $offset
            );
            $video = TubeVideo::model()->findAll($c);
            $this->render('genre', array(
                'data'=>$video,
                'page'=>$page,
                'genre'=>$genre,
                'pager'=>$pager,
                'itemOnPaging'=>$itemOnPaging
            ));
            $this->endCache();
        }
    }
}