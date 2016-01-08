<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('admin-user-model-grid', {
		data: $(this).serialize()
	});
	return false;
});
");

?>


<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('application.widgets.iGridView', array(
	'id'=>'admin-category-model-grid',
	'dataProvider'=>new EMongoDocumentDataProvider($model->search(array('order'=>'ordering ASC')), array(
		'sort'=>array(
			'attributes'=>array(
				//'_id',
				'name',
				'code',
				'parent',
				'ordering',
				'status',
				'created_time',
				'updated_time',
			),
		),
	)),
	//'filter'=>$model,
	'columns'=>array(
		//'_id',
		'name',
		'code',
		'parent',
		'ordering',
		'status',
		'created_time',
		'updated_time',
		array(
			'class'=>'application.widgets.iButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>