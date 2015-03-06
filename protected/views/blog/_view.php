<?php 
$controller = Yii::app()->controller->id;
$action = Yii::app()->controller->action->id;
?>
<!-- post-box -->
<article class="post-box">
<?php if(($controller=='blog' && $action=='index') || ($controller=='topic' && $action=='view')){?>
	<span class="image alignleft listing"><img src="<?php echo AvatarHelper::getAvatarUrl($data->id, "s1", "blog");?>" alt="image description" /></span>
	<?php }?>
	<div class="text-box">
		<div class="meta">
			<h3><?php echo CHtml::link(CHtml::encode($data->title), $data->url); ?></h3>
			<p>Đăng bởi <?php echo $data->author->username . ', Ngày ' . date('d/m/Y',strtotime($data->create_time)); ?>, <?php echo CHtml::link("Bình luận ({$data->commentCount})",$data->url.'#comments'); ?></p>
		</div>
		<p>
			<?php
			$this->beginWidget('CMarkdown', array('purifyOutput'=>true));
			if(($controller=='blog' && $action=='index') || ($controller=='topic' && $action=='view')){
				echo $data->intro_text;
			}else{
				echo $data->content;
			}
			$this->endWidget();
			?>
		</p>
		<?php 
		if($controller=='blog' && $action=='index'):?>
		<p><?php echo CHtml::link('Xem tiếp', $data->url); ?></p>
		<?php endif;?>
	</div>
</article>