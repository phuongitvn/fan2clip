<div class="signin-container">

		<!-- Left side -->
		<div class="signin-info">
			<a href="index.html" class="logo">
			<img width="150" class="logo" src="<?php echo Yii::app()->theme->baseUrl; ?>/images/logo_g.png" />
			</a> <!-- / .logo -->
			<div class="slogan">
				Simple. Flexible. Powerful.
			</div> <!-- / .slogan -->
			<ul>
				<li><i class="fa fa-sitemap signin-icon"></i> Flexible modular structure</li>
				<li><i class="fa fa-file-text-o signin-icon"></i> LESS &amp; SCSS source files</li>
				<li><i class="fa fa-outdent signin-icon"></i> RTL direction support</li>
				<li><i class="fa fa-heart signin-icon"></i> Crafted with love</li>
			</ul> <!-- / Info list -->
		</div>
		<!-- / Left side -->

		<!-- Right side -->
		<div class="signin-form">

			<!-- Form -->
			<?php echo CHtml::beginForm(); ?>
				<div class="signin-text">
					<span>Đăng nhập hệ thống</span>
				</div> <!-- / .signin-text -->

				<div class="form-group w-icon">
					<?php echo CHtml::activeTextField($model,'username', array('class'=>'form-control input-lg', 'placeholder'=>'Username or email')) ?>
					<span class="fa fa-user signin-form-icon"></span>
				</div> <!-- / Username -->

				<div class="form-group w-icon has-error">
					<?php echo CHtml::activePasswordField($model,'password', array('class'=>'form-control input-lg', 'placeholder'=>'Password')) ?>
					<span class="fa fa-lock signin-form-icon"></span>
				</div> <!-- / Password -->
				<div class="form-group w-icon has-error">
					<?php echo CHtml::activeCheckBox($model,'rememberMe'); ?>
					<label for="UserLogin_rememberMe"><?php echo Yii::t("main","Remember me next time");?></label>
				</div>
				<div class="form-actions">
					<a href="#" class="forgot-password" id="forgot-password-link"><?php echo Yii::t("main","Forgot your password?");?></a>
				</div> <!-- / .form-actions -->
			<!-- / Form -->

			<!-- "Sign In with" block -->
			<div class="signin-with">
				<!-- Facebook -->
				<!-- <a href="index.html" class="signin-with-btn" style="background:#4f6faa;background:rgba(79, 111, 170, .8);">Sign In with <span>Facebook</span></a>-->
				<div class="form-actions" style="margin: 0;">
					<input style="width: 100%" type="submit" value="<?php echo Yii::t("main","Login");?>" class="signin-btn bg-primary">
				</div>
			</div>
			<!-- / "Sign In with" block -->
<?php echo CHtml::endForm(); ?>
			<!-- Password reset form -->
			<div class="password-reset-form" id="password-reset-form">
				<div class="header">
					<div class="signin-text">
						<span>Password reset</span>
						<div class="close">×</div>
					</div> <!-- / .signin-text -->
				</div> <!-- / .header -->
				
				<!-- Form -->
				<form action="index.html" id="password-reset-form_id" novalidate="novalidate">
					<div class="form-group w-icon">
						<input type="text" name="password_reset_email" id="p_email_id" class="form-control input-lg" placeholder="Enter your email">
						<span class="fa fa-envelope signin-form-icon"></span>
					</div> <!-- / Email -->

					<div class="form-actions">
						<input type="submit" value="SEND PASSWORD RESET LINK" class="signin-btn bg-primary">
					</div> <!-- / .form-actions -->
				</form>
				<!-- / Form -->
			</div>
			<!-- / Password reset form -->
		</div>
		<!-- Right side -->
</div>
<?php 
	$cs = Yii::app()->getClientScript();
	$cs->registerCoreScript('jquery');
	$dir = Yii::getPathOfAlias('common').DS.'libs/bootstrap';
	$assets = Yii::app()->assetManager->publish($dir, false, -1, YII_DEBUG);
	$cs->registerScriptFile($assets.'/js/bootstrap.min.js');
	$cs->registerCssFile($assets.'/css/bootstrap.min.css');
	?>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/system/css/pages.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/system/css/pixel-admin.min.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/system/css/themes.min.css" />