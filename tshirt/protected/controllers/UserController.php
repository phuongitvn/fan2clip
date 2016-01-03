<?php
class UserController extends Controller
{
    public $layout='//layouts/main2';
    public function actionLogin(){
        $this->render('login');
    }

}