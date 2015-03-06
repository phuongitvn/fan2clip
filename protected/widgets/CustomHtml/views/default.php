<div class="<?php echo $csClass;?>">
<?php 
if(!empty($params)):
	$data = @unserialize($params->params);
?>
<?php if($params->show_title>0):?>
<h3><?php echo $params->title;?></h3>
<?php endif;?>
<div class="wg-content">
<?php echo $data['content'];?>
</div>
<?php endif;?>
</div>
