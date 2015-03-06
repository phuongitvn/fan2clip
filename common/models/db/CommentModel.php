<?php

Yii::import('common.models.db._base.BaseCommentModel');

class CommentModel extends BaseCommentModel
{
	const STATUS_PENDING=1;
	const STATUS_APPROVED=2;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	/**
	 * @param Post the post that this comment belongs to. If null, the method
	 * will query for the post.
	 * @return string the permalink URL for this comment
	 */
	public function getUrl($post=null)
	{
		if($post===null)
			$post=$this->post;
		return $post->url.'#c'.$this->id;
	}
	
	/**
	 * @return string the hyperlink display for the current comment's author
	 */
	public function getAuthorLink()
	{
		if(!empty($this->url))
			return CHtml::link(CHtml::encode($this->author),$this->url);
		else
			return CHtml::encode($this->author);
	}
	
	/**
	 * @return integer the number of comments that are pending approval
	 */
	public function getPendingCommentCount()
	{
		return $this->count('status='.self::STATUS_PENDING);
	}
	
	/**
	 * @param integer the maximum number of comments that should be returned
	 * @return array the most recently added comments
	 */
	public function findRecentComments($limit=10)
	{
		return $this->with('post')->findAll(array(
				'condition'=>'t.status='.self::STATUS_APPROVED,
				'order'=>'t.create_time DESC',
				'limit'=>$limit,
		));
	}
	
	/**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if($this->isNewRecord)
			$this->create_time=new CDbExpression("NOW()");
		parent::beforeSave();
	}
}