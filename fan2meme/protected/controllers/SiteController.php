<?php
class SiteController extends Controller
{
    public function actionIndex()
    {
        $page = Yii::app()->request->getParam('page',1);

        $limit = 10;
        $offset = ($page-1)*$limit;
        $c = array(
            'conditions'=>array(
                'status'=>array('==' => 1),
            ),
            'sort'=>array('_id'=>EMongoCriteria::SORT_DESC),
            'limit'=> $limit,
            'offset'=> $offset
        );
        $meme = Meme::model()->findAll($c);
        $this->render('index', array(
            'data'=>$meme,
            'page'=>$page
        ));
    }
    public function actionChecktimeliked(){
        $timeLiked = Yii::app()->session['last_time_liked'];
        if($timeLiked < (time() - 5)){
            Yii::app()->session['last_time_liked']=time();
            die('1');
        }
        die('0');
    }
}