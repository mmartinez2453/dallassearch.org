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
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.9.2/themes/base/jquery-ui.css" />
		<script src="http://code.jquery.com/jquery-1.8.3.js"></script>
		<script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
        <script type="text/javascript">
        	function submitQuery($weOverride) {
        		xajax.$('submitButton').disabled=true;
        		xajax.$('resultSet').innerHTML="<center><img src='images/ajax-loader.gif'><br><br>Please wait while the data loads...</center>";
        		xajax_searchQuery(xajax.getFormValues("search"), $weOverride);
        		return false;
        	}

            function pUCenteredWindow(myURL, mWidth, mHeight) {
            	var iMyWidth;
            	var iMyHeight;
            	iMyWidth = (window.screen.width/2) - ((mWidth/2) + 10);
            	iMyHeight = (window.screen.height/2) - ((mHeight/2) + 50);
            	var win2 = window.open(myURL,"Window2","status,height=" + mHeight + ",width=" + mWidth + ",resizable=yes,left=" + iMyWidth + ",top=" + iMyHeight + ",screenX=" + iMyWidth + ",screenY=" + iMyHeight + ",scrollbars=yes");
            	win2.focus();
            }

			$(function() {
				$( "#tabs" ).tabs({
					beforeLoad: function( event, ui ) {
						ui.jqXHR.error(function() {
							ui.panel.html(
							"Couldn't load this tab. We'll try to fix this as soon as possible. " +
							"If this wouldn't be a demo." );
						});
					}
				});
			});
        </script>
        <?php $xajax->printJavascript("xajax"); ?>
        <style> @import "c-css.php"; </style>
        <script language='JavaScript' src='tigra_tables.js'></script>
    </head>
    <body>
    <form method='POST' target='_self' id='search' name='search'>
    <table border='0' cellspacing='0' align='left' width='100%'>
        <tr>
            <td align='center' valign='top' class='matty'>
                        Search for Christian Maturity<br>
                        Dallas Texas<br>
                        <a href=""><img src='images/searchILYHand.jpg' border=0></a><br>
                        Choose a Weekend<br>
                        <?php echo buildWEOptions(); ?><br>
                        <INPUT type="button" value="Go To Selected W/E"  id="submitButton" name="submitButton" onClick='submitQuery(null);'>
            </td>
            <td width='90%' rowspan="2" valign='top' align="center" class='tk-museo'>
                <div name="resultSet" id="resultSet"><?php echo BuildWEList(); ?></div>
            </td>
        </tr>
    </table>
    </form>   
    </body>
</html>
