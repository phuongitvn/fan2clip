<?php if(!empty($_GET['tag'])): ?>
<h1>Posts Tagged with <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>
<?php $themeUrl = Yii::app()->theme->baseUrl;?>
<!-- posts -->
	<div class="posts">
<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'/blog/_view',
	'template'=>"{items}\n{pager}",
	'pager'=>array(
		'htmlOptions'=>array('class'=>'paging')
	)	
)); ?>
	</div>
