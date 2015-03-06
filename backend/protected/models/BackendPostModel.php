<?php
class BackendPostModel extends PostModel
{
	public static function model($className=__CLASS__) {
		return parent::model($className);
	}
	public function attributeLabels() {
		return array(
				'id' => Yii::t('app', 'ID'),
				'title' => Yii::t('app', 'Title'),
				'intro_text' => Yii::t('app', 'Intro Text'),
				'content' => Yii::t('app', 'Content'),
				'tags' => Yii::t('app', 'Tags'),
				'status' => Yii::t('app', 'Status'),
				'create_time' => Yii::t('app', 'Create Time'),
				'update_time' => Yii::t('app', 'Update Time'),
				'author_id' => Yii::t('app', 'Post By'),
				'author' => null,
		);
	}
	public static function getTopic($id)
	{
		$sql = "select topic_id from tbl_blog_to_topic where blog_id=:id";
		$command = Yii::app()->db->createCommand($sql);
		$command->bindParam(':id',$id,PDO::PARAM_INT);
		return $command->queryAll();
	}
}