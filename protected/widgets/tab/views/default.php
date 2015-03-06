<h3><?php echo $title;?></h3>
<ul id="accord" class="accordion">
<?php 
$i=0;
foreach($data as $key => $item):?>
<li>
	<a href="#" class="opener"><?php echo $item['title']?></a>
	<div class="slide">
		<?php echo $item['description']?>
	</div>
</li>
<?php $i++;endforeach;?>
</ul>