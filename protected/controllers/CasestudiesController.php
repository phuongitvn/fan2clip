<?php
class CasestudiesController extends FrontendController
{
	public function actionIndex()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "status=:status AND type='post'";
		$criteria->order = "ordering ASC, id DESC";
		$criteria->params = array(':status'=>WebArticleModel::STATUS_PUBLISHED);
		
		$dataProvider=new CActiveDataProvider('WebArticleModel', array(
				'pagination'=>array(
						'pageSize'=>Yii::app()->params['postsPerPage'],
				),
				'criteria'=>$criteria,
		));
		
		$this->render('index', compact('dataProvider'));
	}
	public function actionView()
	{
		$id = Yii::app()->request->getParam('id');
		$data = WebArticleModel::model()->findByPk($id);
		$this->render('view', compact('data'));
	}
}