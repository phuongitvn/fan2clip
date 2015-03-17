<?php
class SiteController extends FrontendController
{
    public $layout = 'column1';
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}
    public function actionChecktimeliked(){
        $timeLiked = Yii::app()->session['last_time_liked'];
        if($timeLiked && $timeLiked < (time() - 5)){
            Yii::app()->session['last_time_liked']=time();
            die('1');
        }
        die('0');
        /*$memcache = new Memcache();
        $memcache->connect("localhost", 11211);
        $last_session_request = $memcache->get('last_time_liked');
        if($last_session_request < (time() - 5)){
            $memcache->set('last_time_liked', time());
            $memcache->close();
            die('1');
        }
        $memcache->close();
        die('0');*/
    }
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
        $page = Yii::app()->request->getParam('page',1);
        $limit = 10;
        $offset = ($page-1)*$limit;
        $c = array(
            'conditions'=>array(
                'status'=>array('==' => 1),
                //'genre'=>array('notExists'),
            ),
            'sort'=>array('_id'=>EMongoCriteria::SORT_DESC),
            'limit'=> $limit,
            'offset'=> $offset
        );
		$video = TubeVideo::model()->findAll($c);
        $videoHot = WebTubeVideo::model()->getHotVideo();
		$this->render('index', array(
            'data'=>$video,
            'page'=>$page,
            'videoHot'=>$videoHot
        ));
	}
	/**
	 * page html dynamic
	 */
	public function actionPage()
	{
		$alias = Yii::app()->request->getParam('alias');
		$pageDetail = FrontendPagesModel::getPageByAlias($alias);
		$this->render('page', array('pageDetail'=>$pageDetail));
	}
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
	
	public function actionAbout()
	{
		$this->render('about');
	}
}