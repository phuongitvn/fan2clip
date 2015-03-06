<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('backend-post-model-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<div class="search-form">
<?php $this->renderPartial('_search', array(
	'model' => $model,
)); ?>
</div><!-- search-form -->
<?php $this->widget('application.widgets.iGridView', array(
	'id' => 'backend-post-model-grid',
	'dataProvider' => $model->search(),
	'columns' => array(
		array(
				'type'	=>	'raw',
				'header'	=>'<div id="sl-row" onclick="CoreJs.checkAll(this.id);" status="1"><input type="checkbox" class="checkall" value="" /></div>',
				'value'	=>	'CHtml::checkBox("rad_ID[]", "", array("value"=>$data->id))',
				'htmlOptions'	=>	array(
						'width'	=>	'50',
				),
		),
		'title',
		'intro_text',
		'tags',
		'status',
		/*
		'create_time',
		'update_time',
		array(
				'name'=>'author_id',
				'value'=>'GxHtml::valueEx($data->author)',
				'filter'=>GxHtml::listDataEx(UserWebModel::model()->findAllAttributes(null, true)),
				),
		*/
		'id',
		array(
			'class'=>'application.widgets.iButtonColumn',
			'htmlOptions'=>array('width'=>'50'),
		),
	),
)); ?>