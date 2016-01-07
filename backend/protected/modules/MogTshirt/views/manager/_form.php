<div class="content-body">
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'admin-tshirt-model-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'name'); ?>
		<?php echo $form->textField($model,'name'); ?>
		<?php echo $form->error($model,'name'); ?>
	</div>
    <div class="row">
        <?php echo $form->labelEx($model,'code'); ?>
        <?php echo $form->textField($model,'code'); ?>
        <?php echo $form->error($model,'code'); ?>
    </div>
	<div class="row">
		<?php echo $form->labelEx($model,'price'); ?>
		<?php echo $form->textField($model,'price'); ?>
		<?php echo $form->error($model,'price'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url'); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'thumb_image'); ?>
		<?php echo $form->textField($model,'thumb_image'); ?>
		<?php echo $form->error($model,'thumb_image'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'ordering'); ?>
		<?php echo $form->textField($model,'ordering'); ?>
		<?php echo $form->error($model,'ordering'); ?>
	</div>
	<fieldset>
		<legend>Seo Meta</legend>
		<div class="row">
			<?php echo $form->labelEx($model,'meta_title'); ?>
			<?php echo $form->textField($model,'meta_title'); ?>
			<?php echo $form->error($model,'meta_title'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'meta_keywords'); ?>
			<?php echo $form->textArea($model,'meta_keywords'); ?>
			<?php echo $form->error($model,'meta_keywords'); ?>
		</div>
		<div class="row">
			<?php echo $form->labelEx($model,'meta_description'); ?>
			<?php echo $form->textArea($model,'meta_description'); ?>
			<?php echo $form->error($model,'meta_description'); ?>
		</div>
	</fieldset>
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php
		$status = array(
			0=>'Un Published',
			1=>'Published'
		);
		echo $form->dropDownList($model,'status', $status);
		?>
		<?php echo $form->error($model,'status'); ?>
	</div>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
    </div>