<?php $this->beginContent('//layouts/main'); ?>
<?php
$controller = Yii::app()->controller->id;
$action = Yii::app()->controller->action->id;
$genre_key = Yii::app()->request->getParam('genre_key');
?>
    <div id="wrr-main">
        <header>
            <div class="wrr-header  wrr-s">
                <div id="logo">
                    <h1><a href="/"><img style="margin-top: 10px;margin-left: 5px;" width="155" src="/images/logo.png" /></a></h1>
                </div>
                <div id="menu">
                    <div class="wr-menu">
                        <ul>
                            <li><a <?php if($controller=='site' && $action=='index') echo 'class="active"'?> href="/">Hot</a></li>
                            <li><a <?php if($controller=='video' && $action=='genre' && $genre_key =='funny') echo 'class="active"'?> href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'funny'));?>">Funny</a></li>
                            <li><a <?php if($controller=='video' && $action=='genre' && $genre_key =='nsfw') echo 'class="active"'?> href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'nsfw'));?>">NSFW</a></li>
                            <li><a <?php if($controller=='video' && $action=='genre' && $genre_key =='music') echo 'class="active"'?> href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'music'));?>">Music</a></li>
                            <li><a <?php if($controller=='video' && $action=='genre' && $genre_key =='game') echo 'class="active"'?> href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'game'));?>">Game</a></li>
                            <li><a <?php if($controller=='video' && $action=='genre' && $genre_key =='tv') echo 'class="active"'?> href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'tv'));?>">Movie & TV</a></li>
                            <li><a href="http://fan2meme.com/" target="_blank">Meme</a></li>
                        </ul>
                    </div>
                </div>
                <span id="sb-mn" class="icon-app"><i></i></span>
            </div>
        </header>
        <div id="main-body">
            <div class="wrap-inner container wrr-s">
                <div class="wrr-page-content">
                    <div class="col-66 col-f">
						<!--<div class="wrr-search">
                            <form action="/search" method="get">
                                <input type="text" id="keyword" name="key" value="<?php //echo isset($_GET['key'])?$_GET['key']:'';?>" />
                                 <input type="submit" value="Search" />
                             </form>
                        </div>
						-->
                        <div class="wr-col-c">
                            <?php echo $content; ?>
                        </div>
                    </div>
                    <div class="col-33 col-hide">
                        <div class="wr-col-r">
                            <div class="search">
                                <div class="wrr-search">
                                    <form action="/search" method="get">
                                        <input type="text" id="keyword" name="key" value="<?php echo isset($_GET['key'])?CHtml::encode($_GET['key']):'';?>" />
                                        <input type="submit" value="Search" />
                                    </form>
                                </div>
                            </div>
                            <?php echo $this->clips['sidebar-r'];?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div><!-- content -->
<?php $this->endContent(); ?>