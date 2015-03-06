<div class="form">
<?php $form = $this->beginWidget('GxActiveForm', array(
	'id' => 'backend-post-model-form',
	'enableAjaxValidation' => false,
));
?>
	<?php echo $form->errorSummary($model); ?>
		<div class="row">
		<div id="img_tmp"><img src="<?php echo AvatarHelper::getAvatarUrl($model->id, "s1","blog")?>" /></div>
		<?php $this->widget('ext.EAjaxUpload.EAjaxUpload',
			array(
			        'id'=>'uploadFile',
			        'config'=>array(
			               'action'=>Yii::app()->createUrl('/site/upload'),
			               'allowedExtensions'=>array("jpg"),//array("jpg","jpeg","gif","exe","mov" and etc...
			               'sizeLimit'=>10*1024*1024,// maximum file size in bytes
			               'minSizeLimit'=>1,// minimum file size in bytes
			               'onComplete'=>"js:function(id, fileName, responseJSON){ 
			        			$('#img_tmp').html('<img width=\"200\" src=\"".Yii::app()->params['storage_url']."/tmp/"."'+fileName+'\" />'); 
								$('#BackendPostModel_file').attr('value',fileName)
							}",
			               //'messages'=>array(
			               //                  'typeError'=>"{file} has invalid extension. Only {extensions} are allowed.",
			               //                  'sizeError'=>"{file} is too large, maximum file size is {sizeLimit}.",
			               //                  'minSizeError'=>"{file} is too small, minimum file size is {minSizeLimit}.",
			               //                  'emptyError'=>"{file} is empty, please select files again without it.",
			               //                  'onLeave'=>"The files are being uploaded, if you leave now the upload will be cancelled."
			               //                 ),
			               //'showMessage'=>"js:function(message){ alert(message); }"
			              )
			)); 
		?>
		<?php echo CHtml::hiddenField('BackendPostModel[file]')?>
		</div>
		<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model, 'title', array('maxlength' => 128)); ?>
		<?php echo $form->error($model,'title'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'intro_text'); ?>
		<?php echo $form->textArea($model, 'intro_text'); ?>
		<?php echo $form->error($model,'intro_text'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo CHtml::label('Topic', 'topic'); ?>
		<?php 
			$data = CHtml::listData(BackendTopicModel::model()->published()->findAll(), 'id', 'name');
			$select = array();
			if(isset($topic)){
				foreach ($topic as $topicId){
					$select[]=$topicId['topic_id'];
				}
			}
			echo CHtml::checkBoxList('topic', $select, $data);
		?>
		<?php echo $form->error($model,'intro_text'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'content'); ?>
		<?php
		$this->widget('ext.elrte.elRTE', array(
		    'selector'=>'BackendPostModel_content',
		    'doctype' => '<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">',
		    'cssClass' => 'el-rte',
		    'absoluteURLs' => 'false',
		    'allowSource' => 'true',
		    'lang' => 'en',
		    'styleWithCSS' => 'true',
		    'height' => '500',
		    'width' => '100%',
		    'fmAllow' => 'true',
		    'toolbar' => 'maxi',
		 ));
	?>
		<?php echo $form->textArea($model, 'content'); ?>
		<?php echo $form->error($model,'content'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'tags'); ?>
		<?php echo $form->textArea($model, 'tags'); ?>
		<?php echo $form->error($model,'tags'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php 
		$data = array(
				BackendPostModel::STATUS_PUBLISHED => 'Public',
				BackendPostModel::STATUS_DRAFT => 'Draft',
				BackendPostModel::STATUS_ARCHIVED => 'Archived'
		);
		echo $form->dropDownList($model, 'status', $data);
		?>
		<?php echo $form->error($model,'status'); ?>
		</div><!-- row -->
		<div class="row">
		<?php echo $form->labelEx($model,'author_id'); ?>
		<?php echo $form->dropDownList($model, 'author_id', GxHtml::listDataEx(UserWebModel::model()->findAllAttributes(null, true))); ?>
		<?php echo $form->error($model,'author_id'); ?>
		</div><!-- row -->


<?php
$this->endWidget();
?>
</div><!-- form -->