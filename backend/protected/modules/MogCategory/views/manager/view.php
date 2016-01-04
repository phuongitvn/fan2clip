<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'_id',
		'user_id',
		'point',
		'created_time',
		'updated_time',
	),
)); ?>