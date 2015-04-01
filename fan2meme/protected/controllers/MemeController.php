<?php
class MemeController extends Controller
{
    public $layout = '2column';
    public function actionIndex()
    {
        die('dcm');
    }
    public function actionView()
    {
        $id = Yii::app()->request->getParam('id');
        $id = new MongoId($id);
        $meme = Meme::model()->findByPk($id);
        if(!$meme){
            throw new CHttpException('404','Your request is not found');
        }
        if(!isset(Yii::app()->session['visit.'.$id]) || (time() - Yii::app()->session['visit.'.$id])>300) {
            $meme->views = intval($meme->views + 1);
            if ($meme->save()) {
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
        $data = Meme::model()->findAll($c);
        $this->render('view', compact('meme','data'));
    }
    public function actionGenre()
    {
        $page = Yii::app()->request->getParam('page',1);
        $genre = Yii::app()->request->getParam('genre_key','news');
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
    }
}