<?php $themeUrl = Yii::app()->theme->baseUrl;?>
<?php 
Yii::app()->getClientScript()->registerCssFile("$themeUrl/css/prettyPhoto.css");
Yii::app()->getClientScript()->registerScriptFile("$themeUrl/js/jquery.prettyPhoto.js");
?>
<script type="text/javascript">
  $(document).ready(function(){
	$("a[rel^='prettyPhoto']").prettyPhoto({
		animation_speed: 'fast', /* fast/slow/normal */
		slideshow: 5000, /* false OR interval time in ms */
		autoplay_slideshow: false, /* true/false */
		opacity: 0.70, /* Value between 0 and 1 */
		show_title: true, /* true/false */
		allow_resize: true, /* Resize the photos bigger than viewport. true/false */
		default_width: 500,
		default_height: 344,
		counter_separator_label: '/', /* The separator for the gallery counter 1 "of" 2 */
		theme: 'pp_default' /* light_rounded / dark_rounded / light_square / dark_square / facebook */
	});
  });
</script>
<div id="main">
	<?php $this->widget('application.widgets.SlidePhotos.SlidePhotosWidget')?>
	<!-- boxes -->
	<section class="boxes">
		<div class="holder">
			<!-- title-box -->
			<div class="title-box">
				<h2>ISM - THÔNG TIN QUẢN LÝ</h2>
				<p>Phương châm tư vấn của chúng tôi là chú trọng đến sự phù hợp. Phát triển và triển khai giải pháp thật sự tin cậy cho doanh nghiệp. Đồng thời, với sự đam mê nghề chúng tôi hoàn toàn có thể cam kết với Quý khách hàng về việc hỗ trợ dài lâu.</p>
			</div>
			<!-- boxes-section -->
			<div class="boxes-section">
				<article class="col">
					<a href="#"><div class="icon ico1"></div></a>
					<div class="text-box">
						<h3>Tư vấn sự phù hợp</h3>
						<p>Chúng tôi chú trọng sự phù hợp của giải pháp cho doanh nghiệp hơn là sự tốt nhất.</p>
						<a href="#" class="btn">Đọc thêm</a>
					</div>
				</article>
				<article class="col">
					<a href="#"><div class="icon ico2"></div></a>
					<div class="text-box">
						<h3>Cung ứng giải pháp tin cậy</h3>
						<p>Đề cao tinh thần trách nhiệm, chúng tôi luôn mang giải pháp thực đến Quý khách hàng</p>
						<a href="#" class="btn">Đọc thêm</a>
					</div>
				</article>
				<article class="col last">
					<a href="#"><div class="icon ico3"></div></a>
					<div class="text-box">
						<h3>Hỗ trợ khách hàng lâu dài</h3>
						<p>Đây là phương châm sống còn của chúng tôi!</p>
						<a href="#" class="btn">Đọc thêm</a>
					</div>
				</article>
			</div>
		</div>
	</section>
	<div class="main-container holder">
		<!-- grid-cols -->
		<div class="grid-cols">
			<!-- col67 -->
			<div class="col67">
				<div class="col-holder">
					<?php $this->widget('application.widgets.CustomHtml.customHtml', array('_wID'=>20));?>
				</div>
			</div>					
							<!-- col33 -->
			<div class="col33">
				<div class="col-holder">
				<?php $this->widget('application.widgets.tab.TabWidget', array('_wID'=>21));?>
				</div>
			</div>
		</div>
		<!-- grid-cols -->
		<div class="grid-cols">
			<!-- col67 -->
			<div class="col67">
				<div class="col-holder">
					<?php $this->widget('application.widgets.CustomHtml.customHtml', array('_wID'=>22));?>
				</div>
			</div>						
			<!-- col33 -->
			<div class="col33">
				<div class="col-holder testimonials">
					<!-- testimonials-item -->
					<div class="social">
						<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Fthongtinquanly&amp;width=300&amp;height=248&amp;colorscheme=light&amp;show_faces=true&amp;border_color=%23E5E5E5&amp;stream=false&amp;header=false" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:300px; height:250px;" ></iframe>
					</div>
					<!-- <h3>Client Testimonials</h3>
					<ul>
						<li>
							<img class="image" src="<?php echo $themeUrl; ?>/images/testimonial-2.jpg" alt="image description" />
							<blockquote>
								<q>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.</q>
								<cite>- John, <a href="#">The Bright Agency</a></cite>
							</blockquote>
						</li>
					</ul>
					-->
				</div>
			</div>
		</div>
	</div>
	<!-- clients -->
	<?php $this->widget('application.widgets.partner.PartnerWidget')?>
</div>