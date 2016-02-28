<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'_id',
		'name',
		'code',
		'type',
		'genre',
		'views',
		'tags',
		'status',
		'created_datetime',
		'updated_datetime',
	),
)); ?>