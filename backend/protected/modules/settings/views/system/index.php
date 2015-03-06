<div class="form">
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'system-settings-model-form',
	'enableAjaxValidation' => false,
));
?>
<div class="row">
	<label><?php echo Yii::t('main','Site Name');?></label>
	<?php echo CHtml::textField('System[SYS_SITE_NAME]', $settings['SYS_SITE_NAME']['value_code'])?>
</div>
<div class="row">
	<label><?php echo Yii::t('main','Frontend Language');?></label>
	<?php 
	$data = array(
			'vi'=>'Tiếng Việt',
			'en'=>'Tiếng Anh',
	);
		echo CHtml::dropDownList('System[SYS_FRONTEND_LANG]', $settings['SYS_FRONTEND_LANG']['value_code'], $data)
	?>
</div>
<div class="row">
	<label><?php echo Yii::t('main','Keywords Meta');?></label>
	<?php echo CHtml::textArea('System[SYS_META_KEYWORDS]', $settings['SYS_META_KEYWORDS']['value_code'], array('style'=>'width: 500px; height: 150px'))?>
</div>
<div class="row">
	<label><?php echo Yii::t('main','Description Meta');?></label>
	<?php echo CHtml::textArea('System[SYS_META_DESCRIPTION]', $settings['SYS_META_DESCRIPTION']['value_code'], array('style'=>'width: 500px; height: 150px'))?>
</div>
<div class="row">
<label>&nbsp;</label>
<?php echo CHtml::submitButton(Yii::t('main','Save'), array('class'=>'btn btn-primary btn-sm'))?>
</div>
<?php
$this->endWidget();
?>
</div><!-- form -->