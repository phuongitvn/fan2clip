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
		'sort'=>array(
			'defaultOrder'=>'_id DESC',
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
		array(
			'name'=>'name',
			'value'=>'CHtml::link($data->name,Yii::app()->createUrl("/MogVideo/manager/update",array("id"=>$data->_id)))',
			'type'=>'raw'
		),
		'code',
		'genre',
		array(
			'name'=>'views',
			'value'=>'CHtml::tag(\'span\',array(\'class\'=>\'label label-info\'),$data->views)',
			'type'=>'raw'
		),
		array(
			'name'=>'status',
			'value'=>'$data->status==1?CHtml::tag(\'span\',array(\'class\'=>\'label label-success\'),\'Published\'):CHtml::tag(\'span\',array(\'class\'=>\'label label-success\'),\'Not Published\')',
			'type'=>'raw'
		),
		'created_datetime',
		'updated_datetime',
		array(
			'class'=>'application.widgets.iButtonColumn',
			'htmlOptions'=>array('style'=>'width: 50px'),
		),
	),
)); ?>