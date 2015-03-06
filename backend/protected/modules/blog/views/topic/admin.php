<?php

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('blog-topic-model-grid', {
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
	'id' => 'blog-topic-model-grid',
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
		'name',
		'description',
		array(
			'name' => 'status',
			'value' => '($data->status === 0) ? Yii::t(\'app\', \'No\') : Yii::t(\'app\', \'Yes\')',
			'filter' => array('0' => Yii::t('app', 'No'), '1' => Yii::t('app', 'Yes')),
		),
		'id',
		array(
			'class'=>'application.widgets.iButtonColumn',
			'htmlOptions'=>array('width'=>'50'),
		),
	),
)); ?>