<?php
    //ini_set('error_reporting','E_ALL & ~E_NOTICE');
    require_once("search.common.php");
    require_once ("includes.inc.php");
?>
<html>
    <head>
    	<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
    	<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Josefin+Sans+Std+Light' rel='stylesheet' type='text/css'>
		<link href='http://fonts.googleapis.com/css?family=Merriweather' rel='stylesheet' type='text/css'>
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Frameset//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd'>
        <meta http-equiv='Content-Language' content='en-us'>
        <meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
        <title>Search for Christian Maturity, Dallas Texas</title>

        <script type="text/javascript" id="www-widgetapi-script" src="https://s.ytimg.com/yts/jsbin/www-widgetapi-vflEEKrDp/www-widgetapi.js" async=""></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
        <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
        <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>

        <script type="text/javascript" src="js/fancybox/lib/jquery.mousewheel-3.0.6.pack.js"></script>
        <link rel="stylesheet" href="js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />

        <script type="text/javascript" src="js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
        <link rel="stylesheet" href="js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css" media="screen" />
        <script type="text/javascript" src="js/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
        <script type="text/javascript" src="js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>

        <link rel="stylesheet" href="js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css" media="screen" />
        <script type="text/javascript" src="js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>		
        <script type="text/javascript">
            function submitQuery($weOverride) {
                $("tabs-w").html("<img src='loader.png'>");
                xajax.$('submitButton').disabled=true;

                xajax_searchQuery(xajax.getFormValues("search"), $weOverride);
                return false;
            }
        </script>

        <?php $xajax->printJavascript("xajax"); ?>
        <style> @import "c-css.php"; </style>
    </head>
    <body>
    <form method='POST' target='_self' id='search' name='search'>
    <table border='0' cellspacing='0' align='left' width='100%'>
        <tr>
            <td align='center' valign='top' class='matty'>
                Search for Christian Maturity<br>
                Dallas Texas<br>
                <a href="/"><img src='images/searchILYHand.jpg' border=0></a><br>
                Choose a Weekend<br>
                <?php echo buildWEOptions(); ?><br>
                <INPUT type="button" value="Go To Selected W/E"  id="submitButton" name="submitButton" onClick='submitQuery(null);'>
                <hr />
                <div id="prevWELink">
                    <font CLASS='noul'>
                    <a CLASS='blacklink' href='' onClick='submitQuery(70); return false' onMouseOver="window.status = 'Go to the previous weekend'; return true">
                        <img src="images/Back.png" border="0"><br>Go To W/E 70
                    </a>
                    </font>
                </div>
                <div id="nextWELink">
                    <font CLASS='noul'>
                    <a CLASS='blacklink' href='' onClick='submitQuery(1); return false'>
                        <img src="images/Next.png" border="0"><br>Go To W/E 1
                    </a>
                    </font>
                </div>
                <hr />
                <div>
                    W/E Theme Song Playlist
                    <iframe id="player1" width="300" height="169" src="https://www.youtube.com/embed/videoseries?list=PLXWVBtATWdFSG-6Q1FbIZ5OOgICSD5ZM-&amp;showinfo=0&enablejsapi=1&origin=http://dallassearch.org" frameborder="0" allowfullscreen></iframe>
                    <p style="margin: 5px; text-align: justify;">
                        <font face="arial" size="2">
                        This playlist has the songs for each weekend in order from W/E #7 through W/E 53 and W/E's 60, 63, 64, and 65. There were no theme songs for W/E's 1 through 6 and no definitive information for the missing weekends.
                        </font>
                    </p>
                </div>
                <div>
                    <p style="text-align: center; margin: 5px; font-family: Times New Roman, Georgia, Serif; font-size: small;" >
                        This site is not associated with<br />The Diocese of Dallas or any of it's ministries.
                    </p>
                </div>
            </td>
            <td width='90%' rowspan="2" valign='top'>
                <div id="tabs">
                  <ul>
                        <li><a href="#tabs-about">About SEARCH in Dallas, TX</a></li>
                        <li><a href="#tabs-w"><div id="weName">Choose a Weekend</div></a></li>
                        <li><a href="#tabs-1">Searchers</a></li>
                        <li><a href="#tabs-2">Palanca</a></li>
                        <li><a href="#tabs-3">Presenting</a></li>
                        <li><a href="#tabs-4">Recruiting / Emmaus</a></li>
                  </ul>
                  <div id="tabs-about" align="center" class="tk-cody">
                        <?php 
                            if (!\strstr($_SERVER['HTTP_USER_AGENT'],'Mobi')) {
                                    echo ('<iframe style="float: right; margin: 25px;" width="640" height="480" allowfullscreen="" frameborder="0" src="http://s956.photobucket.com/user/randyhoenig/embed/slideshow/Search%20Photos"></iframe>');
                            }
                        ?>
                        <!--<p align="justify" style="text-indent: 50px;">"Search for Christian Maturity is a catholic program for young people aged 16 and over.  It is one of the first youth retreats to grow out of the Cursillo movement, with a 'youth talking with youth' approach referred to as Peer Ministry, small group and follow-up program.</p>
                        <p align="justify" style="text-indent: 50px;">During the Search retreat, youth are given an experience of Christian community; something they may, or may not, experience in their homes, school, or parish.  An atmosphere of openness and caring is created on the weekend so young people can let down their defences. This hopefully allows them to take an honest look at themselves, along with their relationship with God. The emphasis of the weekend is not to overload young people with info and doctrine, but to try and take the things we already know and believe as Christians and make them alive. Many young people come to discover for the first time, that God loves them and that they can reach Him.</p>-->
                        <p align="justify" style="text-indent: 50px;">"Search for Christian Maturity came in the 1960's from the CYO (Catholic Youth Organization) of San Francisco, California.   In May of 1966, the Search for Christian Maturity was adopted by the National Catholic Youth Organization as the official retreat program for the United States of America. In the ensuing years, the Search was initiated in over 75 diocese in the U.S. as well as in other countries. Much like Cursillo and other 3 day events, it spread quickly."</p>
                        <p align="justify" style="text-indent: 50px;">There were 70 SEARCH W/E's held in Dallas from June of 1978 through the 90's. Information for W/E's after # 50 is incomplete and/or sparse.</p>
                        <p align="justify" style="text-indent: 50px;">This site includes all data that has been compiled to date for the Dallas SEARCH W/E's. You can go through the list of weekends, view the rosters for those who participated in the W/E as well as those who were on staff and facilitated the W/E's. The names will be populated in the tabs as you naviagte to each W/E. Clicking on a name in any of the rosters will popup a list for all participation for that person in SEARCH W/E's.</p>
                        <p align="justify" style="text-indent: 50px;">Where available there will be pictures from the W/E for the SEARCHers as well as the staff on each tab. These images and more can be found in Randy Hoenig's Photobucket located <a href="http://s956.photobucket.com/user/randyhoenig/library/Search%20Photos?sort=3&page=1" target="_blank">here</a>. I haven't been able to associate all of the weekend pictures there with the appropriate W/E so feel free to help with that if you want. <?php if (!strstr($_SERVER['HTTP_USER_AGENT'],'Mobi')) : ?>The pictures in the slideshow are numbered so if you know which weekend and/or staff a particular pic belongs to then send it to "info at dallassearch dot org".<?php endif; ?></p>
                        <p align="justify" style="text-indent: 50px;">To the left is a YouTube playlist for all the known theme songs for each W/E (<a href="https://www.youtube.com/playlist?list=PLXWVBtATWdFSG-6Q1FbIZ5OOgICSD5ZM-" target="_blank">also available by clicking here</a>). You can start the playlist up to hear the songs in order of W/E or there will also be a YouTube player for each individual song on each W/E's page.</p>
                        <p align="justify" style="text-indent: 50px;">You can navigate this site by selecting a W/E from the drop-down selector to the left and clicking "Go To Selected W/E" below the drop-down to jump around the W/E's or by using the arrow icons to the left to go through the W/E's in order.</p>
                        <br /><hr />
                        <p align="center">A FEW NOTES<br />Using the back and forward buttons <i>of your browser</i>&nbsp;will navigate away from this site<br />This site is also a testing ground for my data hobby and so things here are in a state of flux as I experiment.<br />Currently this site is not made to be responsive or mobile-friendly so it may or may not be usable on your phone or device.<br />In other words: "changes aren't permanent...but change is!"<br />Finally: the data here is as it was given to me...while I have cleaned up the data and corrected what I knew to be wrong the general accuracy is "as is".<br />Depending on the requests and demand for this site I may provide a way for people to submit corrections and additions in the future.</p>
                        <hr />
                        <?php echo buildWEList(); ?>
                  </div>
                  <div id="tabs-w" align="center" class="tk-cody"></div>
                  <div id="tabs-1"></div>
                  <div id="tabs-2"></div>
                  <div id="tabs-3"></div>
                  <div id="tabs-4"></div>
                </div>
            </td>
        </tr>
    </table>
    </form>   
    </body>
	<script>
		$(document).ready(function() {
			$( "#tabs" ).tabs();
			$(".fancybox").fancybox();
			$('.fancybox-media').fancybox({
				openEffect  : 'none',
				closeEffect : 'none',
				helpers : {
					media : {}
				}
			});
			$(".various").fancybox({
				maxWidth	: 800,
				maxHeight	: 300,
				fitToView	: false,
				width		: '70%',
				height		: '50%',
				autoSize	: false,
				closeClick	: false,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
			$( "#tabs" ).tabs( "option", "disabled", [ 1, 2, 3, 4, 5 ] );
		});
	</script>
	<script type="text/javascript">
	
            var player1, player2;
            function onYouTubeIframeAPIReady() {
                player1 = new YT.Player('player1', {
                    events: {
                      'onStateChange': function(e) { if(e.data == YT.PlayerState.PLAYING) player2.stopVideo(); }
                    }
                });
                player2 = new YT.Player('player2', {
                    events: {
                      'onStateChange': function(e) { if(e.data == YT.PlayerState.PLAYING) player1.stopVideo(); }
                    }
                });
            }

	</script>	
	<script type="text/javascript" src="https://www.youtube.com/iframe_api"></script>
</html>
