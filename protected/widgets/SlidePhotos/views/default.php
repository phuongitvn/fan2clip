<?php $themeUrl = Yii::app()->theme->baseUrl;?>
<div class="fullwidthbanner-container">
	<div class="fullwidthabnner">
		<ul>
			<!-- THE FIRST SLIDE -->
			<li data-transition="boxfade" data-slotamount="7" data-masterspeed="200">
				<!-- THE MAIN IMAGE IN THE FIRST SLIDE -->
				<img src="<?php echo $themeUrl; ?>/images/slider-revolution-1-bg.jpg" alt="" />
				<!-- THE CAPTIONS IN THIS SLDIE -->
				<div class="caption lfr" data-x="440" data-y="2" data-speed="1000" data-start="750" data-easing="easeOutQuad"><img src="<?php echo $themeUrl; ?>/images/slider-revolution-1.png" alt="Image 1" /></div>
				<div class="caption slide_title sfb" data-x="40" data-y="107" data-speed="1100" data-start="1300" data-easing="easeOutExpo">
					Giải pháp tin cậy, <br />hỗ trợ dài lâu!
				</div>
				<div class="caption slide_paragraph sfb" data-x="40" data-y="224" data-speed="700" data-start="1700" data-easing="easeOutExpo">
					Đề cao tinh thần trách nhiệm, <br />chúng tôi luôn mang giải pháp thực đến Quý khách hàng
				</div>
				<div class="caption slide_button sfb" data-x="40" data-y="339" data-speed="1000" data-start="2000" data-easing="easeOutExpo">
					<a href="#" class="btn">Xem thêm</a>
				</div>
			</li>
			<!-- THE SECOND SLIDE -->
			<li data-transition="boxfade" data-slotamount="10" data-masterspeed="300">
				<!-- THE MAIN IMAGE IN THE SECOND SLIDE -->
				<img src="<?php echo $themeUrl; ?>/images/slider-revolution-2-bg.jpg" alt="" />
				<!-- THE CAPTIONS IN THIS SLDIE -->
				<div class="caption lfl" data-x="0" data-y="2" data-speed="1000" data-start="750" data-easing="easeOutQuad"><img src="<?php echo $themeUrl; ?>/images/slider-revolution-2.png" alt="Image 2" /></div>
				<div class="caption slide_title sfb" data-x="564" data-y="107" data-speed="1100" data-start="1300" data-easing="easeOutQuad">
					Luôn mang đến<br />sự phù hợp!
				</div>
				<div class="caption slide_paragraph sfb" data-x="564" data-y="220" data-speed="700" data-start="1700" data-easing="easeOutQuad">
					Giải pháp linh hoạt để ứng dụng phù hợp hơn.<br />
					Chúng tôi chú trọng sự phù hợp của giải pháp cho doanh nghiệp hơn là sự tốt nhất
				</div>
				<div class="caption slide_button sfb" data-x="564" data-y="339" data-speed="1000" data-start="2000" data-easing="easeOutQuad">
					<a href="#" class="btn">Xem thêm</a>
				</div>
			</li>
			<!-- THE THIRD SLIDE -->
			<li data-transition="boxfade" data-slotamount="10" data-masterspeed="300">
				<!-- THE MAIN IMAGE IN THE THIRD SLIDE -->
				<img src="<?php echo $themeUrl; ?>/images/slider-revolution-3-bg.jpg" alt="" />
				<!-- THE CAPTIONS IN THIS SLDIE -->
				<div class="caption lfr" data-x="440" data-y="2" data-speed="800" data-start="1000" data-easing="easeOutQuad"><img src="<?php echo $themeUrl; ?>/images/slider-revolution-3.png" alt="Image 3" /></div>
				<div class="caption slide_title sfb" data-x="40" data-y="107" data-speed="1100" data-start="1300" data-easing="easeOutQuad">
					Quản trị theo mục tiêu,<br /> hiệu quả từng tác vụ!
				</div>
				<div class="caption slide_paragraph sfb" data-x="40" data-y="224" data-speed="700" data-start="1700" data-easing="easeOutQuad">
					Chúng tôi chú trọng sự phù hợp của giải pháp<br /> cho doanh nghiệp hơn là sự tốt nhất.
				</div>
				<div class="caption slide_button sfb" data-x="40" data-y="339" data-speed="1000" data-start="2000" data-easing="easeOutQuad">
					<a href="#" class="btn">Xem thêm</a>
				</div>
			</li>
		</ul>
		<!--div class="tp-bannertimer"></div-->
	</div>
</div>
<script>
	var api;
	jQuery(document).ready(function() {
		 api =  jQuery('.fullwidthabnner').revolution(
						{
							delay:5000,
							startwidth:980,
							startheight:491,

							hideThumbs:10,

							thumbWidth:100,							// Thumb With and Height and Amount (only if navigation Tyope set to thumb !)
							thumbHeight:50,
							thumbAmount:5,

							navigationType:"none",				// bullet, thumb, none
							navigationArrows:"solo",				// nexttobullets, solo (old name verticalcentered), none

							navigationStyle:"round",				// round,square,navbar,round-old,square-old,navbar-old, or any from the list in the docu (choose between 50+ different item), custom

							navigationHAlign:"center",				// Vertical Align top,center,bottom
							navigationVAlign:"bottom",					// Horizontal Align left,center,right
							navigationHOffset:0,
							navigationVOffset:20,

							soloArrowLeftHalign:"left",
							soloArrowLeftValign:"center",
							soloArrowLeftHOffset:20,
							soloArrowLeftVOffset:0,

							soloArrowRightHalign:"right",
							soloArrowRightValign:"center",
							soloArrowRightHOffset:20,
							soloArrowRightVOffset:0,

							touchenabled:"on",						// Enable Swipe Function : on/off
							onHoverStop:"on",						// Stop Banner Timet at Hover on Slide on/off

							stopAtSlide:-1,
							stopAfterLoops:-1,

							shadow:1,								//0 = no Shadow, 1,2,3 = 3 Different Art of Shadows  (No Shadow in Fullwidth Version !)
							fullWidth:"on"							// Turns On or Off the Fullwidth Image Centering in FullWidth Modus
						});
	});
</script>