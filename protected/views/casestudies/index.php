<?php $themeUrl = Yii::app()->theme->baseUrl;?>
<?php 
Yii::app()->getClientScript()->registerCssFile("$themeUrl/css/prettyPhoto.css");
Yii::app()->getClientScript()->registerScriptFile("$themeUrl/js/jquery.prettyPhoto.js");
Yii::app()->getClientScript()->registerScript(
		'pretty',
		"$(document).ready(function(){
			$(\"a[rel^='prettyPhoto']\").prettyPhoto({
				animation_speed: 'fast', /* fast/slow/normal */
				slideshow: 5000, /* false OR interval time in ms */
				autoplay_slideshow: false, /* true/false */
				opacity: 0.70, /* Value between 0 and 1 */
				show_title: true, /* true/false */
				allow_resize: true, /* Resize the photos bigger than viewport. true/false */
				default_width: 500,
				default_height: 344,
				counter_separator_label: '/', /* The separator for the gallery counter 1 \"of\" 2 */
				theme: 'pp_default' /* light_rounded / dark_rounded / light_square / dark_square / facebook */
			});
		})",
		CClientScript::POS_HEAD
);
?>
<div id="main">
	<!-- content-panel -->
	<div class="content-panel">
		<div class="page-title">
			<!-- breadcrumbs -->
			<ul class="breadcrumbs">
				<li><a href="<?php echo Yii::app()->createUrl('/site/index');?>">Trang Chủ</a></li>
				<li>/</li>	
				<li><a href="<?php echo Yii::app()->createUrl('/casestudies');?>">Casestudies</a></li>
			</ul>
		</div>
	</div>
	<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
	'pager'=>array(
		'htmlOptions'=>array('class'=>'paging')
	)	
	)); ?>
</div>