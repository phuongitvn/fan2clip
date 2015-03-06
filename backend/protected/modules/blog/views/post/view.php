<?php $this->widget('zii.widgets.CDetailView', array(
	'data' => $model,
	'attributes' => array(
	'id',
	'title',
	'intro_text',
	'content',
	'tags',
	'status',
	'create_time',
	'update_time',
	array(
			'name' => 'author',
			'type' => 'raw',
			'value' => $model->author !== null ? GxHtml::link(GxHtml::encode(GxHtml::valueEx($model->author)), array('userWebModel/view', 'id' => GxActiveRecord::extractPkValue($model->author, true))) : null,
			),
	),
)); ?>

<h2><?php echo GxHtml::encode($model->getRelationLabel('comments')); ?></h2>
<?php
	echo GxHtml::openTag('ul');
	foreach($model->comments as $relatedModel) {
		echo GxHtml::openTag('li');
		echo GxHtml::link(GxHtml::encode(GxHtml::valueEx($relatedModel)), array('commentModel/view', 'id' => GxActiveRecord::extractPkValue($relatedModel, true)));
		echo GxHtml::closeTag('li');
	}
	echo GxHtml::closeTag('ul');
?>