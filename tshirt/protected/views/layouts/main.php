<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta name="MobileOptimized" content="100" />

    <link rel="canonical" href="<?php echo SITE_TSHIRT_URL.Yii::app()->request->url;?>" />
    <meta name="robots" content="follow, index" />
	<title><?php echo CHtml::encode($this->pageTitle)." | ".Yii::app()->name; ?></title>
    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="/font-awesome/css/font-awesome.min.css" />
    <link rel="stylesheet" type="text/css" href="/css/nice-select.css" />
    <link rel="stylesheet" type="text/css" href="/css/verticalmenu.css" />
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <?php
    $cs = Yii::app()->getClientScript();
    $cs->registerMetaTag('Funny pics, GIFs, videos, memes, cute', 'title', NULL);
    $cs->registerMetaTag('You are looking at the Fan2Meme.com! Fan2Meme.com is the easiest way to have fun!', 'description', NULL);
    $cs->registerMetaTag('fan2meme,jokes,interesting,cool,fun collection, prank, admire,fun,humor,humour,just for fun.', 'keywords', NULL);
    ?>
</head>
<body class="mobile-screen">
<style>
    @media (min-width: 0px) and (max-width: 600px)  {
        .col-f{
            width: 100%;
        }
        .col-hide{
            display: none;
        }
    }
    @media only screen and (min-device-width: 320px) and (max-device-width: 568px){
        /* Styles */
        .mobile-screen .wrr-s{
            width: 100%
        }
        .mobile-screen .items-listview .video-item-list .col-66{
            width: 40%
        }
        .mobile-screen .items-listview .video-item-list .col-33{
            width: 58%
        }
        .col-f{
            width: 100%;
        }
        .col-hide{
            display: none;
        }
    }

</style>
<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&appId=417326001770427&version=v2.0";
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>
<?php include_once("analyticstracking.php") ?>
	<div id="main"><?php echo $content;?></div>
    <div id="footer">
        <div class="wrr-footer bggreen">
            <div class="container">
                <div class="wr-ftl">&#169; Copyright HOTTSHIRTUSA.COM 2016</div>
                <div class="wr-ftr">
                    <ul class="term op">
                        <li><a href="<?php echo Yii::app()->createUrl('/site/contact')?>">Contacts</a></li>
                        <li><a href="#">Privacy</a></li>
                        <li><a href="#">Term</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript" src="/js/verticalmenu.js"></script>
<script type="text/javascript" src="/js/jquery.nice-select.min.js"></script>
<script>

    jQuery(function(){
        amazonmenu.init({
            menuid: 'mysidebarmenu'
        })
    })
    $(document).ready(function() {
        $('select').niceSelect();
    });
</script>
<!--<script type="text/javascript" src="/js/core.js"></script>-->
</body>
</html>
