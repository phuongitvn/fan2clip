<?php
/**
 * Created by PhpStorm.
 * User: phuongnv
 * Date: 3/8/2015
 * Time: 8:21 PM
 */
class ListviewWidget extends CWidget
{
    public $data = null;
    public $layout = '';
    public function run()
    {
        $data = $this->data;
        $this->render('listview'.$this->layout, compact('data','users'));
    }
}