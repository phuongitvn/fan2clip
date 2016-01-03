<?php
$controller = Yii::app()->controller->id;
$action = Yii::app()->controller->action->id;
?>
<?php $this->beginContent('//layouts/main'); ?>
    <div id="wrr-main">
        <div class="wrr-header bggreen">
            <div id="header-top">
                <div class="container">
                    <div class="top-bar-social"><a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-pinterest"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a></div>
                    <div class="top-bar-account">
                        <a href="#">My Account</a>
                    </div>
                </div>
            </div>
            <div id="header-main">
                <div class="container">
                    <div id="logo">
                        <h1><i class="fa fa-thumbs-o-up"></i>&nbsp; The Best T-Shirt on SunFrog</h1>
                    </div>
                </div>
            </div>
            <header>
                <div class="wrr-header container">
                    <?php include_once '_top_menu.php'?>
                </div>
            </header>
        </div>
        <div id="main-body">
            <div class="wrap-inner container container">
                <div class="wrr-page-content">
                    <div class="col-pre">
                        <div class="wr-col-c">
                            <?php echo $content; ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div><!-- content -->
<?php $this->endContent(); ?>