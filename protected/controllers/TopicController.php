<?php
class TopicController extends FrontendController
{
	public $layout='//layouts/column1';
	public function init()
	{
		$this->pageTitle = "Blog Topic";
		parent::init();
	}
	public function actionView()
	{
		$id = Yii::app()->request->getParam('id');
		$this->pageTitle = "Topic: ".WebBlogTopicModel::model()->findByPk($id)->name;
		$criteria=new CDbCriteria(array(
				'condition'=>'status='.WebPostModel::STATUS_PUBLISHED,
				'order'=>'update_time DESC',
				'with'=>'commentCount',
		));
		$criteria->join = "LEFT JOIN tbl_blog_to_topic tb ON tb.blog_id=t.id";
		$criteria->addCondition("tb.topic_id=".$id);
		if(isset($_GET['tag']))
			$criteria->addSearchCondition('tags',$_GET['tag']);
		
		$dataProvider=new CActiveDataProvider('WebPostModel', array(
				'pagination'=>array(
						'pageSize'=>Yii::app()->params['postsPerPage'],
				),
				'criteria'=>$criteria,
		));
		$this->render('view',array(
				'dataProvider'=>$dataProvider,
		));
	}
}