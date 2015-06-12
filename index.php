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
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Frameset//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd'>
        <meta http-equiv='Content-Language' content='en-us'>
        <meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
        <title>Search for Christian Maturity, Dallas Texas</title>
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
							<font CLASS='noul'><a CLASS='blacklink' href='' onClick='submitQuery(70); return false' onMouseOver="window.status = 'Go to the previous weekend'; return true"><img src="images/Back.png" border="0"><br>Go To W/E 70</a></font>
						</div>
                        <hr />
                        <div id="nextWELink">
							<font CLASS='noul'><a CLASS='blacklink' href='' onClick='submitQuery(1); return false'><img src="images/Next.png" border="0"><br>Go To W/E 1</a></font>
						</div>
            </td>
            <td width='90%' rowspan="2" valign='top'>
				<div id="tabs">
				  <ul>
					<li><a href="#tabs-w"><div id="weName">Choose a Weekend</div></a></li>
					<li><a href="#tabs-1">Searchers</a></li>
					<li><a href="#tabs-2">Palanca</a></li>
					<li><a href="#tabs-3">Presenting</a></li>
					<li><a href="#tabs-4">Recruiting / Emmaus</a></li>
				  </ul>
				  <div id="tabs-w" align="center">
						<p align="justify">Search for Christian Maturity is a catholic program for young people aged 16 and over.  It is one of the first youth retreats to grow out of the Cursillo movement, with a 'youth talking with youth' approach referred to as Peer Ministry, small group and follow-up program.</p>
						<p align="justify">During the Search retreat, youth are given an experience of Christian community; something they may, or may not, experience in their homes, school, or parish.  An atmosphere of openness and caring is created on the weekend so young people can let down their defences. This hopefully allows them to take an honest look at themselves, along with their relationship with God. The emphasis of the weekend is not to overload young people with info and doctrine, but to try and take the things we already know and believe as Christians and make them alive. Many young people come to discover for the first time, that God loves them and that they can reach Him.</p>
						<p align="justify">Search for Christian Maturity came in the 1960's from the CYO (Catholic Youth Organization) of San Francisco, California.   In May of 1966, the Search for Christian Maturity was adopted by the National Catholic Youth Organization as the official retreat program for the United States of America. In the ensuing years, the Search was initiated in over 75 diocese in the U.S. as well as in other countries. Much like Cursillo and other 3 day events, it spread quickly.</p>
						<p align="justify">Search is a strong program which helps Catholic young people take up the Holy Father's challenge to be the future evangelizers in the Church.  They witness to God's love and goodness to them and develop a spirituality of service whether it be through giving talks, leading a discussion, cooking, cleaning, listening, sharing or praying. What better evangelizers could there be, than teens, touched by God's love, spreading that fire, to their peers.</p>
						<?php echo buildWEList(); ?>
					</div>
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
			$( "#tabs" ).tabs( "option", "disabled", [ 1, 2, 3, 4 ] )
		});
	</script>
</html>
