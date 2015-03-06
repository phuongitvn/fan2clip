<?php
class support_W extends CWidget
{
	public $title = 'Hỗ trợ trực tuyến';
	public function init()
	{
		parent::init();
	}
	public function run()
	{
		$this->render('default', array(
					'title'=>$this->title,
				));
	}
}