<?php
$appId=Yii::app()->params['facebook']['appId'];
if(!isset($_SESSION['logged_in']))
{
    echo '<div id="results">';
    echo '<!-- results will be placed here -->';
    echo '</div>';
    echo '<div id="LoginButton">';
    echo '<a href="#" rel="nofollow" class="fblogin-button" onClick="javascript:CallAfterLogin();return false;">Login with Facebook</a>';
    echo '</div>';

}
else
{
    echo 'Hi '. $_SESSION['user_name'].'! You are Logged in to facebook, <a href="?logout=1">Log Out</a>.';
}
?>

<div id="fb-root"></div>
<script type="text/javascript">
    window.fbAsyncInit = function() {
        FB.init({
            appId: '<?php echo $appId; ?>',
            cookie: true,xfbml: true,
            channelUrl: '<?php echo Yii::app()->createUrl('/facebook/channel'); ?>',
            oauth: true
        });
    };
    (function() {
        var e = document.createElement('script');
        e.async = true;e.src = document.location.protocol +'//connect.facebook.net/en_US/all.js';
        document.getElementById('fb-root').appendChild(e);}());

    function CallAfterLogin(){
        FB.login(function(response) {
                if (response.status === "connected")
                {
                    LodingAnimate(); //Animate login
                    FB.api('/me', function(data) {

                        if(data.email == null)
                        {
                            //Facbeook user email is empty, you can check something like this.
                            alert("You must allow us to access your email id!");
                            ResetAnimate();

                        }else{
                            AjaxResponse();
                        }

                    });
                }
            },
            {scope:'<?php echo Yii::app()->params['facebook']['fbPermissions']; ?>'});
    }

    //functions
    function AjaxResponse()
    {
        //Load data from the server and place the returned HTML into the matched element using jQuery Load().
        $( "#results" ).load( "<?php echo Yii::app()->createUrl('/facebook/process')?>" );
    }

    //Show loading Image
    function LodingAnimate()
    {
        $("#LoginButton").hide(); //hide login button once user authorize the application
        $("#results").html('<img src="img/ajax-loader.gif" /> Please Wait Connecting...'); //show loading image while we process user
    }

    //Reset User button
    function ResetAnimate()
    {
        $("#LoginButton").show(); //Show login button
        $("#results").html(''); //reset element html
    }

</script>

<a class="login" href="http://fan2meme.com/google/oauth2callback"><img src="/images/google_share.png" /></a>