<?php
Yii::import('application.widgets.base.GPortlet');

class RecentBlogPosts extends GPortlet
{
	public $title='Bài viết mới';
	public $maxPosts=2;
	public function init()
	{
		$this->contentCssClass = 'blog-links';
		parent::init();
	}
	protected function renderContent()
	{
		$criteria = new CDbCriteria();
		$criteria->condition = "status=".PostModel::STATUS_PUBLISHED;
		$criteria->order="id DESC";
		$criteria->limit = $this->maxPosts;
		$posts=WebPostModel::model()->findAll($criteria);
		echo '<ul>';
		foreach($posts as $key=>$post)
		{
			echo '<li>';
			echo '<h6>';
			echo CHtml::link(CHtml::encode($post->title), array('blog/view','id'=>$post->id));
			echo '</h6>';
			echo '<p>'.CHtml::encode($post->intro_text).'</p>';
			echo '</li>';
		}
		echo '</ul>';
	}
	/**
	 * Renders the decoration for the portlet.
	 * The default implementation will render the title if it is set.
	 */
	protected function renderDecoration()
	{
		if($this->title!==null)
		{
			echo "<h4>{$this->title}</h4>\n";
		}
	}
}