<?php

class ManagerController extends Controller
{
    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id)
    {
        $this->render('view',array(
            'model'=>$this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate()
    {
        $model=new AdminTshirtModel();

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['AdminTshirtModel']))
        {
            $model->attributes=$_POST['AdminTshirtModel'];
            $model->created_time = date('Y-m-d H:i:s');
            $model->updated_time = date('Y-m-d H:i:s');
            if($model->save())
                $this->redirect(array('view','id'=>$model->_id));
        }

        $this->render('create',array(
            'model'=>$model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id)
    {
        $model=$this->loadModel($id);

        // Uncomment the following line if AJAX validation is needed
        // $this->performAjaxValidation($model);

        if(isset($_POST['AdminTshirtModel']))
        {
            $model->attributes=$_POST['AdminTshirtModel'];
            $model->updated_time = date('Y-m-d H:i:s');
            if($model->save())
                $this->redirect(array('view','id'=>$model->_id));
        }

        $this->render('update',array(
            'model'=>$model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id)
    {
        if(Yii::app()->request->isPostRequest)
        {
            // we only allow deletion via POST request
            $this->loadModel($id)->delete();

            // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
            if(!isset($_GET['ajax']))
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
        else
            throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
    }

    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $model = new AdminTshirtModel();
        $userInfo=null;
        if(isset($_GET['AdminTshirtModel']))
        {
            $model->attributes = $_GET['AdminTshirtModel'];
            /*$user_phone = Formatter::formatPhone($_GET['AdminCategoryModel']['phone']);
            $sql = "select c1.fullname,c2.point,c1.phone
                    from user c1
                    INNER JOIN user_extra c2 ON c1.id=c2.user_id
                    where c1.phone='$user_phone'";
            $crit = new CDbCriteria();
            $crit->select = "t.fullname,c2.point,t.phone,c2.updated_time";
            $crit->join = "INNER JOIN user_extra c2 ON t.id=c2.user_id";
            $crit->condition = "t.phone=:phone";
            $crit->params = array(':phone'=>$user_phone);
            $userInfo = GUserModel::model()->find($crit);*/
        }
        $this->render('index',array(
            'model'=>$model,
            //'userInfo'=>$userInfo
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin()
    {
        $model = new AdminTshirtModel('search');
        $model->unsetAttributes();

        if(isset($_GET['AdminTshirtModel']))
            $model->setAttributes($_GET['AdminTshirtModel']);

        $this->render('admin', array(
            'model'=>$model
        ));
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer the ID of the model to be loaded
     */
    public function loadModel($id)
    {
        $model=AdminTshirtModel::model()->findByPk(new MongoId($id));
        if($model===null)
            throw new CHttpException(404,'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param CModel the model to be validated
     */
    protected function performAjaxValidation($model)
    {
        if(isset($_POST['ajax']) && $_POST['ajax']==='admin-tshirt-model-form')
        {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }
}
