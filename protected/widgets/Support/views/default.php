<?php 
$data = array(
			0 => array(
					'name'  => 'Kinh doanh 01',
					'phone'	=> '0986 986 919',
					'yh'	=> 'Letuanvina1@yahoo.com'
					),
			1 => array(
					'name'  => 'Kinh doanh 02',
					'phone'	=> '0912 646 707',
					'yh'	=> 'lat777777@yahoo.com'
					),
		);
?>
<div class="iportlet">
<div class="iportlet-title">
<h3><?php echo $title;?></h3>
</div>
<div class="portlet-content">
<?php foreach($data as $key => $item):?>
<div class="s-item">
	<div class="s-item-wr">
		<div class="name"><?php echo $item['name'];?></div>
		<div class="phone"><?php echo $item['phone'];?></div>
		<div class="yh"><a title="<?php echo $item['yh'];?>" href="ymsgr:sendIM?<?php echo $item['yh'];?>"><img align="absmiddle" border="0" src="http://opi.yahoo.com/online?u=<?php echo $item['yh'];?>&amp;m=g&amp;t=0"></a></div>
		<div class="dot"><img width="10" align="absmiddle" border="0" src="<?php echo Yii::app()->theme->baseUrl;?>/images/orange_button.png" /></div>
	</div>
</div>
<?php endforeach;?>
</div>
</div>