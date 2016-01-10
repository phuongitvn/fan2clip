<?php
$controller = Yii::app()->controller->id;
$action = Yii::app()->controller->action->id;
?>
<?php $this->beginContent('//layouts/main'); ?>
    <div id="wrr-main">
        <div class="wrr-header bggreen">
            <!--<div id="header-top">
                <div class="container">
                    <div class="top-bar-social"><a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-pinterest"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a></div>
                    <div class="top-bar-account">
                        <a href="#">My Account</a>
                    </div>
                </div>
            </div>-->
            <div id="header-main">
                <div class="wrr-header-main container">
                    <div id="logo">
                        <h1><img src="/images/logo.png" width="175" /></h1>
                    </div>
                    <div id="nav-search">
                        <?php $form = $this->beginWidget('GxActiveForm', array(
                            'id' => 'search-form',
                        ));
                        ?>
                            <div class="nav-left">
                                <?php
                                $categories = WebCategoryModel::model()->getAllCategories();
                                //$categories=null;
                                ?>
                                <select>
                                    <option value="">All</option>
                                    <?php if($categories) foreach($categories as $cat){?>
                                        <option value="<?php echo $cat->code;?>"><?php echo $cat->name;?></option>
                                    <?php }?>
                                </select>
                            </div>
                            <div class="nav-right">
                                <div class="nav-search-submit nav-sprite">

                                    <span id="nav-search-submit-text" class="nav-search-submit-text nav-sprite"><i class="fa fa-search"></i></span>
                                    <input type="submit" class="nav-input" value="Go" tabindex="20">
                                </div>
                            </div>
                            <div class="nav-fill">
                                <div class="nav-search-field">
                                    <input type="text" id="twotabsearchtextbox" value="" name="field-keywords" autocomplete="off" class="nav-input" tabindex="19">
                                </div>
                                <div id="nav-iss-attach"></div>
                            </div>
                        <?php
                        $this->endWidget();
                        ?>
                    </div>
                </div>
            </div>
            <!--<header>
                <div class="wrr-header container">
                    <?php /*include_once '_top_menu.php'*/?>
                </div>
            </header>-->
        </div>
        <div id="main-body">
            <div class="wrap-inner container">
                <div class="wrr-page-content">
                    <div class="col-pre-main">
                        <div class="wr-col-c">
                            <?php echo $content; ?>
                        </div>
                    </div>
                    <div class="col-left">
                        <?php include_once '_top_menu.php'?>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div><!-- content -->
<?php $this->endContent(); ?>