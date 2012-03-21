<!DOCTYPE HTML>
<html lang="en">
    <head>
        <title>Gulli Cricket</title>
        <meta charset="utf-8">
        <link href="/cakephp/css/style.css" rel="stylesheet">
<!--        <link href="/cakephp/css/bootstrap.min.css" rel="stylesheet">-->
        <script src="/cakephp/js/script.js"></script>
        <link rel="stylesheet" type="text/css" media="screen" href="/cakephp/sf/css/style.css">
        <script src="http://connect.facebook.net/en_US/all.js"></script>
        <script type="text/javascript" src="/cakephp/sf/js/jquery.roundabout.js"></script>
        <script type="text/javascript" src="/cakephp/sf/js/jquery.roundabout-shapes.js"></script>
        <script>
            $(document).ready(function() {
                $('.round').roundabout({
                    btnNext: ".next",
                    btnPrev: ".prev",
                    duration: 300,
                    reflect: true,
                    shape: 'square'
                });
                $(function(){
                    $(".social a").easyTooltip();
                })
            });
        </script>

        <script>
      FB.init({
        appId  : <?php echo "'".Configure::read('appId')."'"?>,
      });
      //to-do: set a better message 
      function sendRequestViaMultiFriendSelector() {
        FB.ui({method: 'apprequests',
          message: 'Check this app and we shall win great rewards together',
          filters: ['app_non_users']
        }, requestCallback);
      }

      function requestCallback(response) {
        // to-do: response object has the ids for which the request is sent. try storing it and build BI.
        // add points to the user for every friend invited.
      }
    </script>
        <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId=377158482294713";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
        <!--[if lt IE 9]>
                <script type="text/javascript" src="js/html5.js"></script>
		<![endif]-->
        <!--[if lt IE 8]>
			<div style=' clear: both; text-align:center; position: relative;'><a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode"><img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg" border="0" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today." /></a></div>
		<![endif]-->
    </head>

    <body>
        <!--<div id="spinner"></div>-->
        <div id="wrapper">
            <!--header-->
            <header>
                <!--logo-->
                <div class="leftheader">
                <h1><a href=""><img src="/cakephp/images/gulli_logo.png" height="150"/></a></h1>
                </div>
                <div class="rightheader">
                    
                <h1><a>Menu</a></h1>
                </div>
                <div style="clear:both;"></div>

            </header>

            <div id = "main">
                <!--Splash Menu-->
                
                <nav id="splashMenu">
                    <ul>
                        <li><a href="#!/splash">splash</a></li>

                        
                        <!--<li><a href="#!/about-studio">Play</a></li>
						<li><a href="#!/creative">Rewards</a></li>
						-->

                        <li><a href="#!/news">Play</a></li>
                    </ul>
                </nav>
                
                <!--content-->
                
                <?php
 echo $content_for_layout; 
                //include 'static.html';
?>
                <!--Pages menu-->
                
            </div>
            <!--footer-->
            <footer>
                Gullicricket.com reserves all the rights. The rules of the game, the rewards and the winners are decided by the gullicricket.com and holds the rights to change any of these without any prior notice.
				www.gullicricket.com &copy; 2012 &bull; <a href="#!/privacy-policy">privacy policy</a>
                <!--{%FOOTER_LINK} -->
            </footer>

        </div>

    </body>
</html>