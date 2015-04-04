<ul class="social-share">
    <li class="share-facebook">
        <div class="fb-share-button" data-href="<?php echo $url_share;?>" data-layout="button_count"></div>
    </li>
    <li class="share-google">
        <g:plus action="share" annotation="bubble" data-href="<?php echo $url_share;?>"></g:plus>
    </li>
    <li class="share-twitter">
        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?php echo $url_share;?>" data-text="<?php echo CHtml::encode($title_share);?>" data-size="small" data-count="box">Tweet</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
    </li>
</ul>