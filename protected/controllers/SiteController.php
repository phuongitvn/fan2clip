<?php
include_once _APP_PATH_.DS.'console'.DS.'components'.DS.'simple_html_dom.php';
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
    public function actionYahoo()
    {
        $string = '<p><a href="http://news.yahoo.com/former-us-air-force-mechanic-charged-trying-join-190151585--abc-news-topstories.html"><img src="http://l3.yimg.com/bt/api/res/1.2/DbiH4vUk47AqjEQpx.Wvlw--/YXBwaWQ9eW5ld3M7Zmk9ZmlsbDtoPTg2O3E9NzU7dz0xMzA-/http://media.zenfs.com/en_us/gma/us.abcnews.go.com/gty_isis_lb_150220_16x9_992.jpg" width="130" height="86" alt="Former US Air Force Mechanic Charged With Trying to Join ISIS in Syria, Officials Say" align="left" title="Former US Air Force Mechanic Charged With Trying to Join ISIS in Syria, Officials Say" border="0" /></a>A veteran has been arrested by the FBI for allegedly trying to join ISIS, the brutal terrorist group wreaking havoc in Syria and Iraq.</p><br clear="all"/>';
        $string = preg_replace ("/<a(.*?)>(.*?)<\/a>/i", "", $string);
        $string = preg_replace ("/<br(.*?)>/i", "", $string);
        echo $string = preg_replace ("/<style>(.*?)<\/style>/i", "", $string);
        exit;
        $url = 'http://news.yahoo.com/many-u-boards-lack-vision-just-tick-boxes-161106618--sector.html';
        $html = file_get_html($url);
        echo $title = $html->find(".header h1",0)->innertext;
        echo $image = $html->find(".small-cover-wrap",0)->innertext;
        //remove element
        foreach ($html->find("#topics") as $e)
        {
            $e->outertext='';
        }
        //remove href tag a
        foreach ($html->find("a") as $e)
        {
            $innerText = $e->plaintext;
            //$e->outertext = $innerText;
            $e->href = '#';
        }

        echo $body = $html->find(".body",0)->innertext;
        exit;
    }
    public function actionChecktimeliked(){
        $timeLiked = Yii::app()->session['last_time_liked'];
        if($timeLiked < (time() - 5)){
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
        $cacheId = 'site_index_'.$page;
        //if($this->beginCache($cacheId, array('duration'=>10000))) {
            $c = array(
                'conditions'=>array(
                    'status'=>array('==' => 1),
                    //'genre'=>array('notExists'),
                ),
            );
            $total = TubeVideo::model()->count($c);
            $pager = new CPagination($total);
            $itemOnPaging = 5;
            $pager->pageSize = 15;
            $curr_page = $pager->getCurrentPage();

            $limit = $pager->getLimit();
            $offset = $pager->getOffset();
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

            $this->render('index', array(
                'data'=>$video,
                'pager'=>$pager,
                'itemOnPaging'=>$itemOnPaging
            ));
            //$this->endCache();
        //}
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

    public function actionContact()
    {
        $this->render('contact');
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