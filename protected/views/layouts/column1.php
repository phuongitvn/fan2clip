<?php $this->beginContent('//layouts/main'); ?>
    <div id="wrr-main">
        <div id="header">
            <div id="menu">
                <div class="wr-menu wrr-s">
                    <ul>
                        <li><a href="/">Home</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'funny'));?>">Funny</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'music'));?>">Music</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'game'));?>">Game</a></li>
                        <li><a href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'tv'));?>">Movie & TV</a></li>
                    </ul>
                </div>
            </div>
            <div id="logo">
                <div class="wrr-header wrr-s">
                    <div class="logo col-3">
                        <a href="/"><img width="155" src="/images/logo.png" /></a>
                    </div>
                    <div class="search col-7">
                        <div class="wrr-search">
                            <form action="/search" method="get">
                                <input type="text" id="keyword" name="key" value="<?php echo isset($_GET['key'])?$_GET['key']:'';?>" />
                                <input type="submit" value="Search" />
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="main-body">
            <div class="wrap-inner container wrr-s">
                <div class="wrr-page-content">
                    <div class="col-66">
                        <div class="wr-col-c">
                            <?php echo $content; ?>
                        </div>
                    </div>
                    <div class="col-33">
                        <div class="wr-col-r"><?php echo $this->clips['sidebar-r'];?></div>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
    </div><!-- content -->
<?php $this->endContent(); ?>