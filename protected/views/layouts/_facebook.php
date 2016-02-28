<?php
if(!Yii::app()->params['local_mode']){
$trackMore='';
if($controller=='video' && $action=='view'){
    $trackMore = 'fbq(\'track\', "VideoView");';
}
?>
<!-- Facebook Pixel Code -->
<script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
        n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
        n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
        t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
        document,'script','//connect.facebook.net/en_US/fbevents.js');

    fbq('init', '530346247144178');
    fbq('track', "PageView");
    <?php echo $trackMore;?>
</script>
<noscript><img height="1" width="1" style="display:none"
               src="https://www.facebook.com/tr?id=530346247144178&ev=PageView&noscript=1"
    /></noscript>
<!-- End Facebook Pixel Code -->
<?php }?>