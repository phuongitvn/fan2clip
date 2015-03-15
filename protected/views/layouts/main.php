<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />
    <link rel="canonical" href="www.fan2clip.com" />
    <meta name="robots" content="follow, index" />
	<title><?php echo CHtml::encode($this->pageTitle)." | ".Yii::app()->name; ?></title>
    <link rel="icon" href="/images/favicon.ico">
    <link rel="stylesheet" type="text/css" href="/css/main.css" />
</head>
<body>
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
<script>
    (function(){

        var Xcord = 0,
            Ycord = 0,
            IE = document.all ? true : false;

        if (!IE) document.captureEvents(Event.MOUSEMOVE);

        var lbox = document.createElement('iframe');
        lbox.src = 'https://www.facebook.com/v2.0/plugins/like.php?href=' +  encodeURIComponent('https://www.facebook.com/pages/Fan2Clip/1571931466409541') +  '&amp;layout=standard&amp;show_faces=true&amp;width=53&amp;action=lbox&amp;colorscheme=light&amp;height=80';
        lbox.scrolling = 'no';
        lbox.frameBorder = 0;
        lbox.allowTransparency = 'true';
        lbox.style.border = 0;
        lbox.style.overflow = 'hidden';
        lbox.style.cursor = 'pointer';
        lbox.style.width = '53px';
        lbox.style.height =  '23px';
        lbox.style.position = 'absolute';
        lbox.style.opacity = 0;
        document.getElementsByTagName('body')[0].appendChild(lbox);

        window.addEventListener('mousemove', mouseMove, false);

        setTimeout(function(){
            document.getElementsByTagName('body')[0].removeChild(lbox);
            window.removeEventListener('mousemove', mouseMove, false);
        }, 20000);

        function mouseMove(e) {
            if (IE) {
                Xcord = event.clientX + document.body.scrollLeft;
                Ycord = event.clientY + document.body.scrollTop;
            } else {
                Xcord = e.pageX;
                Ycord = e.pageY;
            }

            if (Xcord < 0) Xcord = 0;
            if (Ycord < 0) Ycord = 0;

            lbox.style.top = (Ycord - 8) + 'px';
            lbox.style.left = (Xcord - 25) + 'px';

            return true
        }
    })();
</script>
</body>
</html>
