<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'_id',
		'name',
		'code',
		'price',
		'ordering',
		'status',
		'created_time',
		'updated_time',
	),
)); ?>