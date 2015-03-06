<?php

Yii::import('application.widgets.base.GPortlet');

class TagCloud extends GPortlet
{
	public $title='Tags';
	public $maxTags=20;

	protected function renderContent()
	{
		$tags=WebTagModel::model()->findTagWeights($this->maxTags);
		echo '<ul class="popularity">';
		foreach($tags as $tag=>$weight)
		{
			$link=CHtml::link(CHtml::encode($tag), array('blog/index','tag'=>$tag));
			echo CHtml::tag('li', array(
				'class'=>'tag',
				'style'=>"font-size:{$weight}pt",
			), $link)."\n";
		}
		echo '</ul>';
	}
}