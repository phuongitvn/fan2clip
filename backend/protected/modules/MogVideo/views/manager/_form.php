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
		<?php echo $form->labelEx($model,'type'); ?>
		<?php echo $form->textField($model,'type'); ?>
		<?php echo $form->error($model,'type'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textField($model,'tags'); ?>
		<?php echo $form->error($model,'tags'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'genre'); ?>
		<?php echo $form->textField($model,'genre'); ?>
		<?php echo $form->error($model,'genre'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'description'); ?>
		<?php echo $form->textField($model,'description'); ?>
		<?php echo $form->error($model,'description'); ?>
	</div>
	<!--<fieldset>
		<legend>Seo Meta</legend>
		<div class="row">
			<?php /*echo $form->labelEx($model,'meta_title'); */?>
			<?php /*echo $form->textField($model,'meta_title'); */?>
			<?php /*echo $form->error($model,'meta_title'); */?>
		</div>
		<div class="row">
			<?php /*echo $form->labelEx($model,'meta_keywords'); */?>
			<?php /*echo $form->textArea($model,'meta_keywords'); */?>
			<?php /*echo $form->error($model,'meta_keywords'); */?>
		</div>
		<div class="row">
			<?php /*echo $form->labelEx($model,'meta_description'); */?>
			<?php /*echo $form->textArea($model,'meta_description'); */?>
			<?php /*echo $form->error($model,'meta_description'); */?>
		</div>
	</fieldset>-->
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