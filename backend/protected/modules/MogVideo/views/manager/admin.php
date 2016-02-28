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
	'id'=>'admin-video-model-grid',
	'dataProvider'=>new EMongoDocumentDataProvider($model->search(), array(
		'criteria'=>array('order'=>'_id DESC'),
		'sort'=>array(
			'attributes'=>array(
				'_id',
				'name',
				'code',
				'type',
				'genre',
				'views',
				'status',
				'created_datetime',
				'updated_datetime',
			),
		),
	)),
	//'filter'=>$model,
	'columns'=>array(
		'_id',
		'name',
		'code',
		'genre',
		'views',
		'status',
		'created_datetime',
		'updated_datetime',
		array(
			'class'=>'application.widgets.iButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>