<?php
$this->pageTitle .= " - Update ";
$this->renderPartial('_form', array(
		'model' => $model,
		'topic' => $topic
));
?>