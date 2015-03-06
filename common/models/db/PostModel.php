<?php

Yii::import('common.models.db._base.BasePostModel');

class PostModel extends BasePostModel
{
	const STATUS_DRAFT=1;
	const STATUS_PUBLISHED=2;
	const STATUS_ARCHIVED=3;
	
	private $_oldTags;
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
				'author' => array(self::BELONGS_TO, 'UserWebModel', 'author_id'),
				'comments' => array(self::HAS_MANY, 'CommentModel', 'post_id', 'condition'=>'comments.status='.CommentModel::STATUS_APPROVED, 'order'=>'comments.create_time DESC'),
				'commentCount' => array(self::STAT, 'CommentModel', 'post_id', 'condition'=>'status='.CommentModel::STATUS_APPROVED),
		);
	}
	/**
	 * @return string the URL that shows the detail of the post
	 */
	public function getUrl()
	{
		return Yii::app()->createUrl('/blog/view', array(
				'id'=>$this->id,
				'url_key'=>Common::makeFriendlyUrl($this->title),
		));
	}
	
	/**
	 * @return array a list of links that point to the post list filtered by every tag of this post
	 */
	public function getTagLinks()
	{
		$links=array();
		foreach(WebTagModel::string2array($this->tags) as $tag)
			$links[]=CHtml::link(CHtml::encode($tag), array('post/index', 'tag'=>$tag));
		return $links;
	}
	/**
	 * Normalizes the user-entered tags.
	 */
	public function normalizeTags($attribute,$params)
	{
		$this->tags=WebTagModel::array2string(array_unique(WebTagModel::string2array($this->tags)));
	}
	/**
	 * Adds a new comment to this post.
	 * This method will set status and post_id of the comment accordingly.
	 * @param Comment the comment to be added
	 * @return boolean whether the comment is saved successfully
	 */
	public function addComment($comment)
	{
		if(Yii::app()->params['commentNeedApproval'])
			$comment->status=CommentModel::STATUS_PENDING;
		else
			$comment->status=CommentModel::STATUS_APPROVED;
		$comment->post_id=$this->id;
		return $comment->save();
	}
	/**
	 * This is invoked when a record is populated with data from a find() call.
	 */
	protected function afterFind()
	{
		parent::afterFind();
		$this->_oldTags=$this->tags;
	}
	/**
	 * This is invoked before the record is saved.
	 * @return boolean whether the record should be saved.
	 */
	protected function beforeSave()
	{
		if(parent::beforeSave())
		{
			if($this->isNewRecord)
			{
				$this->create_time=$this->update_time = date('Y-m-d H:i:s');
				$this->author_id=Yii::app()->user->id;
			}
			else
				$this->update_time=date('Y-m-d H:i:s');
			return true;
		}
		else
			return false;
	}
	/**
	 * This is invoked after the record is saved.
	 */
	protected function afterSave()
	{
		parent::afterSave();
		TagModel::model()->updateFrequency($this->_oldTags, $this->tags);
	}
	
	/**
	 * This is invoked after the record is deleted.
	 */
	protected function afterDelete()
	{
		parent::afterDelete();
		CommentModel::model()->deleteAll('post_id='.$this->id);
		TagModel::model()->updateFrequency($this->tags, '');
	}
	
	/**
	 * Retrieves the list of posts based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the needed posts.
	 */
	public function search()
	{
		$criteria=new CDbCriteria;
	
		$criteria->compare('title',$this->title,true);
	
		$criteria->compare('status',$this->status);
	
		return new CActiveDataProvider('PostModel', array(
				'criteria'=>$criteria,
				'sort'=>array(
						'defaultOrder'=>'status, update_time DESC',
				),
		));
	}
}