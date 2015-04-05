<?php
class UserController extends Controller
{
    public $layout='main2';
    public function actionLogin(){
        $this->render('login');
    }
}