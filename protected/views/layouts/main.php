<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
    <meta name="MobileOptimized" content="100" />

    <link rel="canonical" href="<?php echo SITE_URL.Yii::app()->request->url;?>" />
    <meta name="robots" content="follow, index" />
	<title><?php echo CHtml::encode($this->pageTitle)." | ".Yii::app()->name; ?></title>
    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/css/offside.css" />
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/core.js"></script>
    <?php
    $cs = Yii::app()->getClientScript();
    $cs->registerMetaTag('Video Hot, Video News, Funny', 'title', NULL);
    $cs->registerMetaTag('You are looking at the Fan2Clip.com! Fan2Clip.com is the easiest way to have fun!', 'description', NULL);
    $cs->registerMetaTag('fan2clip,tv,video,jokes,interesting,cool,fun collection, prank, admire,fun,humor,humour,just for fun.', 'keywords', NULL);
    $controller = Yii::app()->controller->id;
    $action = Yii::app()->controller->action->id;
    include_once '_facebook.php';
    ?>
</head>
<body class="mobile-screen">
<?php
$genre_key = Yii::app()->request->getParam('genre_key');
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=417326001770427&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
</script>
    <nav id="menu-1" class="offside">
        <div class="top_nav">
            <a href="/" class="logo2 fll"><img width="125" src="/images/logo.png" alt="logo"></a>
        </div>
        <ul>
            <li><a <?php if($controller=='site' && $action=='index') echo 'class="active"'?> href="/">Home</a></li>
            <li><a <?php if($controller=='video' && $action=='genre' && $genre_key =='funny') echo 'class="active"'?> href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'funny'));?>">Funny</a></li>
            <li><a <?php if($controller=='video' && $action=='genre' && $genre_key =='nsfw') echo 'class="active"'?> href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'nsfw'));?>">NSFW</a></li>
            <li><a <?php if($controller=='video' && $action=='genre' && $genre_key =='music') echo 'class="active"'?> href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'music'));?>">Music</a></li>
            <li><a <?php if($controller=='video' && $action=='genre' && $genre_key =='game') echo 'class="active"'?> href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'game'));?>">Game</a></li>
            <li><a <?php if($controller=='video' && $action=='genre' && $genre_key =='tv') echo 'class="active"'?> href="<?php echo Yii::app()->createUrl('/video/genre', array('genre_key'=>'tv'));?>">Movie & TV</a></li>
            <li><a href="http://fan2meme.com/" target="_blank">Meme</a></li>
        </ul>
        <div class="bottom_nav">
            <div class="wr-ftl">&#169; Copyright 2015 Fan2Clip.com</div>
        </div>
    </nav>
	<div id="main" class="offside-sliding-element"><?php echo $content;?></div>
    <div id="footer">
        <div class="wrr-footer">
            <div class="wr-ftl">Fan2Clip &#169;2015</div>
            <div class="wr-ftr">
                <ul class="term op">
                    <li><a href="<?php echo Yii::app()->createUrl('/site/contact')?>">Contacts</a></li>
                    <li><a href="#">Privacy</a></li>
                    <li><a href="#">Term</a></li>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="/js/offside.js"></script>
<script>
    var offsideMenu1 = offside( '#menu-1', {

        slidingElementsSelector: '#container, #results',    // String: Sliding elements selectors
        debug: true,                                        // Boolean: If true, print errors in console
        width: '200px',                                     // jQuery fallback menu width

        buttonsSelector: '.menu-btn-1',                     // String: Menu toggle buttons selectors
        slidingSide: 'left',                                // String: Off canvas menu on left or right
        init: function(){},                                 // Function: After init callback
        beforeOpen: function(){
            $('#overlay').css({
                'display': 'block',
                'position': 'fixed',
                'top': '45px',
                'bottom': '0px',
                'left': '0px',
                'right': '0px',
                'opacity': '0.6',
                'z-index': '990',
                'background': 'rgb(51, 51, 51)'
            });
            $('#overlay').on('click', function(){
                offsideMenu1.close();
            })
        },                           // Function: Before open callback
        afterOpen: function(){},                            // Function: After open callback
        beforeClose: function(){},                          // Function: Before close callback
        afterClose: function(){
            $('#overlay').css('display','none');
        },                           // Function: After close callback
    });

    console.log(offsideMenu1);
</script>
<?php include_once("analyticstracking.php") ?>
<div id="overlay"></div>
</body>
</html>
