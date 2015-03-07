<?php
include 'E:\phuongnv\fan2clip\trunk\console\components\simple_html_dom.php';
class SiteController extends FrontendController
{
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
	public function actionDemo()
{
set_time_limit (0);
	function crawl_robot($url='http://www.webgalli.com/', $depth = 5){
		$seen = array();
		if(($depth == 0) or (in_array($url, $seen))){
			return;
		}
		$seen[] = $url;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_TIMEOUT, 30);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
		$result = curl_exec ($ch);
		curl_close ($ch);
		if( $result ){
			$stripped_file = strip_tags($result, "<a>");
			preg_match_all("/<a[\s]+[^>]*?href[\s]?=[\s\"\']+"."(.*?)[\"\']+.*?>"."([^<]+|.*?)?<\/a>/", $stripped_file, $matches, PREG_SET_ORDER );
			foreach($matches as $match){
				$href = $match[1];
				if (0 !== strpos($href, 'http')) {
					$path = '/' . ltrim($href, '/');
					if (extension_loaded('http')) {
						$href = http_build_url($href, array('path' => $path));
					} else {
						$parts = parse_url($href);
						$href = $parts['scheme'] . '://';
						if (isset($parts['user']) && isset($parts['pass'])) {
							$href .= $parts['user'] . ':' . $parts['pass'] . '@';
						}
						$href .= $parts['host'];
						if (isset($parts['port'])) {
							$href .= ':' . $parts['port'];
						}
						$href .= $path;
					}
				}
				crawl_robot($href, $depth - 1);
			}
		}
		print_r(array_unique($seen));
	}
}
	public function actionTest()
	{
		$query = "'youtube.com: Football Goals youtube.com'";
		$query = urlencode("$query");
		$acctKey = '2DMyWLEqWts08+Mh9YI+RUanuOx2l3DHw2LLse2DfqQ';
		$rootUri = 'https://api.datamarket.azure.com/Bing/Search';
		// Encode the credentials and create the stream context.
	// Get the selected service operation (Web or Image).
		$serviceOp = 'Web';
	// Construct the full URI for the query.
		$requestUri = $rootUri.'/'.$serviceOp.'?$format=json&Query='.$query;
		//exit;
		$auth = base64_encode("$acctKey:$acctKey");
		$data = array(
			'http' => array(
				'request_fulluri' => true,
// ignore_errors can help debug – remove for production. This option added in PHP 5.2.10
				'ignore_errors' => true,
				'header' => "Authorization: Basic $auth")

		);
		$context = stream_context_create($data);
// Get the response from Bing.
		$response = file_get_contents($requestUri, 0, $context);
		echo '<pre>';print_r($response);exit;
		// Decode the response.
		$jsonObj = json_decode($response);
		$resultStr = '';
		// Parse each result according to its metadata type.
		foreach($jsonObj->d->results as $value) {
			switch ($value->__metadata->type) {
				case 'WebResult': $resultStr .= "<a href=\"{$value->Url}\">{$value->Title}</a><p>{$value->Description}</p>";
					break;
				case 'ImageResult': $resultStr .= "<h4>{$value->Title} ({$value->Width}x{$value->Height}) " . "{$value->FileSize} bytes)</h4>" . "<a href=\"{$value->MediaUrl}\">" . "<img src=\"{$value->Thumbnail->MediaUrl}\"></a><br />";
					break;
			}
		}
		// Substitute the results placeholder. Ready to go.
		echo $contents = str_replace('{RESULTS}', $resultStr, $contents);
		exit;


		$url = 'http://www.bing.com/videos/search?pq=football+goals&sc=8-14&sp=-1&sk=&q=Football+Goals&qft=+filterui:videoage-lt1440&FORM=R5VR5';
		echo file_get_contents($url);exit;
		$curl = curl_init($url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 3);
		curl_setopt($curl,CURLOPT_CONNECTTIMEOUT, 15);
		curl_setopt($curl, CURL, true);
		$curlResult  = curl_exec($curl);
		echo $result;
		exit;
		//$url=urlencode($url);
		$html = file_get_html($url);
		//echo $d = $html->find("noscript",0)->innertext;exit;
		for ($i = 0; $i < 10; $i++) {
			/*echo $html->find('noscript .dg_u .tl', $i)->innertext;
			echo '<br >';
			echo '--- ';*/
			echo $html->find('noscript .dg_u a', $i)->vrhm;
			echo '<br />';
		}
		echo 'test';
		$this->render('index');
	}
	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		$user = new UsersMongo();
		$user->name="Phương";
		$user->login="phuongnv";
		$user->pass="123";
		$res = $user->save(false);
		var_dump($res);
		$users = UsersMongo::model()->findAll();
		foreach($users as $user){
			echo $user->name."<br />";
		}
		$this->render('index');
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