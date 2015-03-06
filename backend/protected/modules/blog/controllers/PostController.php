<?php

class PostController extends BackendApplicationController {

	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Blog Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BackendPostModel'),
		));
	}

	public function actionCreate() {
		$model = new BackendPostModel;
		if (isset($_POST['BackendPostModel'])) {
			$model->setAttributes($_POST['BackendPostModel']);
			if ($model->save()) {
				if(isset($_POST['BackendPostModel']['file']) && $_POST['BackendPostModel']['file']!=''){
					$filePath = Yii::app()->params['tmp_upload'].DS.$_POST['BackendPostModel']['file'];
					if(file_exists($filePath)){
						AvatarHelper::processAvatar($model->id, $filePath, 'blog');
					}
				}
				
				if(isset($_POST['topic'])){
					$this->updateTopic($_POST['topic'], $model->id);
				}
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}
	private function updateTopic($post, $post_id)
	{
		if(count($post)>0){
			$topicId = implode(',', $post);
			$sql = "DELETE FROM tbl_blog_to_topic WHERE topic_id IN ($topicId) and blog_id={$post_id}";
			$res = Yii::app()->db->createCommand($sql)->execute();
			$insert = array();
			foreach ($post as $topic){
				$insert[] = "($topic, $post_id)";
			}
			$sql = "INSERT INTO tbl_blog_to_topic(topic_id,blog_id) VALUES";
			$sql .= implode(',', $insert);
			return Yii::app()->db->createCommand($sql)->execute();
		}
	}
	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BackendPostModel');
		$topic = BackendPostModel::getTopic($id);
		if (isset($_POST['BackendPostModel'])) {
			$model->setAttributes($_POST['BackendPostModel']);

			if ($model->save()) {
				if(isset($_POST['BackendPostModel']['file']) && $_POST['BackendPostModel']['file']!=''){
					$filePath = Yii::app()->params['tmp_upload'].DS.$_POST['BackendPostModel']['file'];
					if(file_exists($filePath)){
						AvatarHelper::processAvatar($model->id, $filePath, 'blog');
					}
				}
				if(isset($_POST['topic'])){
					$this->updateTopic($_POST['topic'], $model->id);
				}
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				'topic' => $topic
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'BackendPostModel')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BackendPostModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BackendPostModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BackendPostModel']))
			$model->setAttributes($_GET['BackendPostModel']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}