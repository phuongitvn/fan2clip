<?php

Yii::import('application.widgets.base.GPortlet');

class Topics extends GPortlet
{
	public $title='Blog Topics';

	protected function renderContent()
	{
		$topics = WebBlogTopicModel::model()->findAll();
		if($topics){
			echo '<ul class="links-list">';
			foreach($topics as $key=>$topic)
			{
				$url = Yii::app()->createUrl('/topic/view', array('id'=>$topic->id, 'url_key'=>Common::makeFriendlyUrl($topic->name)));
				$link = CHtml::link(CHtml::encode($topic->name), $url);
				echo '<li>'.$link.'</li>';
			}
			echo '</ul>';
		}
	}
	protected function renderDecoration()
	{
		if($this->title!==null)
		{
			echo "<h3>{$this->title}</h3>\n";
		}
	}
}