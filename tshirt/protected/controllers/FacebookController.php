<?php
include_once SITE_PATH.DS.'common'.DS.'extensions'.DS.'facebook-php-sdk-master'.DS.'src'.DS.'base_facebook.php';
include_once SITE_PATH.DS.'common'.DS.'extensions'.DS.'facebook-php-sdk-master'.DS.'src'.DS.'facebook.php';
class FacebookController extends Controller
{
    public $layout='//layouts/main2';
    public function actionChannel()
    {
        $this->layout=false;
        $cache_expire = 60*60*24*365;
        header("Pragma: public");
        header("Cache-Control: max-age=".$cache_expire);
        header('Expires: ' . gmdate('D, d M Y H:i:s', time()+$cache_expire) . ' GMT');
        Yii::app()->getClientScript->registerScriptFile('//connect.facebook.net/en_US/all.js');
        exit;
    }
    public function actionProcess()
    {
        $appId = Yii::app()->params['facebook']['appId'];
        $appSecret = Yii::app()->params['facebook']['appSecret'];
        $return_url=Yii::app()->params['facebook']['return_url'];
        //initialize facebook sdk
        $facebook = new Facebook(array(
            'appId' => $appId,
            'secret' => $appSecret,
        ));

        $fbuser = $facebook->getUser();
        if ($fbuser) {
            try {
                // Proceed knowing you have a logged in user who's authenticated.
                $me = $facebook->api('/me'); //user
                $uid = $facebook->getUser();
            }
            catch (FacebookApiException $e)
            {
                //echo error_log($e);
                $fbuser = null;
            }
        }

        // redirect user to facebook login page if empty data or fresh login requires
        if (!$fbuser){
            $loginUrl = $facebook->getLoginUrl(array('redirect_uri'=>$return_url, false));
            header('Location: '.$loginUrl);
        }

        //user details
        $fullname = $me['first_name'].' '.$me['last_name'];
        $email = $me['email'];
        echo '<pre>';print_r($me);
        exit;
    }
}