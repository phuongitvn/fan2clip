<ul>
<?php foreach($comments as $comment): ?>
<li class="comment" id="c<?php echo $comment->id; ?>">
	<div class="comment-box">
	<div class="info">
		<strong class="name"><a href="<?php echo $comment->getUrl($post);?>"><?php echo $comment->authorLink; ?></a></strong>
		<em class="date">
		<?php echo date('d/m/Y H:i:s',strtotime($comment->create_time)); ?>
		</em>
	</div>


	<div class="text-box">
		<?php echo nl2br(CHtml::encode($comment->content)); ?>
	</div>
	</div>
</li><!-- comment -->
<?php endforeach; ?>
</ul>