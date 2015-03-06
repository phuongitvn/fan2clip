<?php
class BlogController extends FrontendController
{
	private $_model;
	public $layout='//layouts/column1';
	public function init()
	{
		$this->pageTitle = "Our Blog";
		parent::init();
	}
	public function actionIndex()
	{
		$criteria=new CDbCriteria(array(
				'condition'=>'status='.WebPostModel::STATUS_PUBLISHED,
				'order'=>'update_time DESC',
				'with'=>'commentCount',
		));
		if(isset($_GET['tag']))
			$criteria->addSearchCondition('tags',$_GET['tag']);
		
		$dataProvider=new CActiveDataProvider('WebPostModel', array(
				'pagination'=>array(
						'pageSize'=>Yii::app()->params['postsPerPage'],
				),
				'criteria'=>$criteria,
		));
		$this->render('index',array(
				'dataProvider'=>$dataProvider,
		));
	}
	public function actionView()
	{
		$post=$this->loadModel();
		$comment=$this->newComment($post);
		
		$this->render('view',array(
				'model'=>$post,
				'comment'=>$comment,
		));
	}
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 */
	public function loadModel()
	{
		if($this->_model===null)
		{
			if(isset($_GET['id']))
			{
				if(Yii::app()->user->isGuest)
					$condition='status='.WebPostModel::STATUS_PUBLISHED.' OR status='.WebPostModel::STATUS_ARCHIVED;
				else
					$condition='';
				$this->_model=WebPostModel::model()->findByPk($_GET['id'], $condition);
			}
			if($this->_model===null)
				throw new CHttpException(404,'The requested page does not exist.');
		}
		return $this->_model;
	}
	/**
	 * Creates a new comment.
	 * This method attempts to create a new comment based on the user input.
	 * If the comment is successfully created, the browser will be redirected
	 * to show the created comment.
	 * @param Post the post that the new comment belongs to
	 * @return Comment the comment instance
	 */
	protected function newComment($post)
	{
		$comment=new WebCommentModel();
		if(isset($_POST['ajax']) && $_POST['ajax']==='comment-form')
		{
			echo CActiveForm::validate($comment);
			Yii::app()->end();
		}
		if(isset($_POST['WebCommentModel']))
		{
			$comment->attributes=$_POST['WebCommentModel'];
			if($post->addComment($comment))
			{
				if($comment->status==WebCommentModel::STATUS_PENDING)
					Yii::app()->user->setFlash('commentSubmitted','Thank you for your comment. Your comment will be posted once it is approved.');
				$this->refresh();
			}
		}
		return $comment;
	}
}