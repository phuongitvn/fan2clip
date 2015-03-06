<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'comment-form',
	'enableAjaxValidation'=>true,
	'htmlOptions'=>array(
			'class'=>'comment-form',
	)
)); ?>
<fieldset>
	<div class="row">
		<?php echo $form->labelEx($model,'author'); ?>
		<span class="text">
		<?php echo $form->textField($model,'author',array('size'=>60,'maxlength'=>128)); ?>
		</span>
		<?php echo $form->error($model,'author'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<span class="text"><?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>128)); ?></span>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<span class="text"><?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>128)); ?></span>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<span class="textarea"><?php echo $form->textArea($model,'content',array('rows'=>6, 'cols'=>50)); ?></span>
		<?php echo $form->error($model,'content'); ?>
	</div>

	<div class="row buttons">
		<span class="submit">Gửi<?php echo CHtml::submitButton($model->isNewRecord ? 'Submit' : 'Save'); ?></span>
	</div>
</fieldset>
<?php $this->endWidget(); ?>

</div><!-- form -->