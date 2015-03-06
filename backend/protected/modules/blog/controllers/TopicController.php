<?php

class TopicController extends BackendApplicationController {

	public function init()
	{
		parent::init();
		$this->pageTitle = Yii::t("main","Topics Manager");
	}
	public function actionView($id) {
		$this->render('view', array(
			'model' => $this->loadModel($id, 'BlogTopicModel'),
		));
	}

	public function actionCreate() {
		$model = new BlogTopicModel;


		if (isset($_POST['BlogTopicModel'])) {
			$model->setAttributes($_POST['BlogTopicModel']);

			if ($model->save()) {
				if (Yii::app()->getRequest()->getIsAjaxRequest())
					Yii::app()->end();
				else
					$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('create', array( 'model' => $model));
	}

	public function actionUpdate($id) {
		$model = $this->loadModel($id, 'BlogTopicModel');


		if (isset($_POST['BlogTopicModel'])) {
			$model->setAttributes($_POST['BlogTopicModel']);

			if ($model->save()) {
				$this->redirect(array('view', 'id' => $model->id));
			}
		}

		$this->render('update', array(
				'model' => $model,
				));
	}

	public function actionDelete($id) {
		if (Yii::app()->getRequest()->getIsPostRequest()) {
			$this->loadModel($id, 'BlogTopicModel')->delete();

			if (!Yii::app()->getRequest()->getIsAjaxRequest())
				$this->redirect(array('admin'));
		} else
			throw new CHttpException(400, Yii::t('app', 'Your request is invalid.'));
	}

	public function actionIndex() {
		$dataProvider = new CActiveDataProvider('BlogTopicModel');
		$this->render('index', array(
			'dataProvider' => $dataProvider,
		));
	}

	public function actionAdmin() {
		$model = new BlogTopicModel('search');
		$model->unsetAttributes();

		if (isset($_GET['BlogTopicModel']))
			$model->setAttributes($_GET['BlogTopicModel']);

		$this->render('admin', array(
			'model' => $model,
		));
	}

}