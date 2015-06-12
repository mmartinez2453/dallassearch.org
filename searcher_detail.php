<?php
    //ini_set('error_reporting','E_ALL & ~E_NOTICE');

    require ('/homepages/9/d91581201/htdocs/common.inc');
    $searcher_id = $_GET['searcher_id'];
    
    $page = array();
    $page[] = "<html><head>
    	<link href='http://fonts.googleapis.com/css?family=Droid+Sans+Mono' rel='stylesheet' type='text/css'>
    	<link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Strict//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd'>
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
        <!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Frameset//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-frameset.dtd'>
	<meta http-equiv='Content-Language' content='en-us'>
	<meta http-equiv='Content-Type' content='text/html; charset=windows-1252'>
	<title>Searcher Detail</title>
	<style> @import \"c-css.php\"; </style>
        <script language='JavaScript' src='tigra_tables.js'></script>
	</head><body>";

    $query = "SELECT w.we_no, DATE_FORMAT(wed.start_date, '%c/%e/%y') AS start_date, DATE_FORMAT(wed.end_date, '%c/%e/%y') AS end_date, wed.themesong, wed.location, s.first_name, s.last_name, st.status
    FROM searchers s, statuses st, we_details wed, weekends w
    WHERE s.id = w.id
    AND st.rid = w.status
    AND wed.we_no = w.we_no
    AND s.id = '".$searcher_id."'
    ORDER BY w.we_no";

    $results = doQuery($query);

    $page[] = "<table width='100%' id=vendDet cellpadding='0' cellspacing='2' border='0'>
                    <tr>
                        <td class='tk-cody'><strong>&nbsp;</strong></td>
                        <td class='tk-cody'><strong>Status</strong></td>
                        <td class='tk-cody' align='center'><strong>W/E</strong></td>
                        <td class='tk-cody' align='center'><strong>From</strong></td>
                        <td class='tk-cody' align='center'><strong>To</strong></td>
                        <td class='tk-cody'><strong>Theme Song</strong></td>
                        <td class='tk-cody'><strong>Location</strong></td>
                    </tr>";

	if (mysql_num_rows($results) == null) {
		$page[] = "<tr><td colspan='6' align='center' bgcolor='pink'><font face='arial' size='2'><b>No Entries Found</b></font></td></tr>";
		$page = implode("", $page);
		echo $page;
		exit;
	} else {
		$num = 1;
		while ($row = mysql_fetch_array($results))
		{
			if ($row['status'] == 'Searchers') {
				$status = 'Searcher';
			} else {
				$status = $row['status'];
			}
            $header = "<div class='tk-museo' align='center'>".$row['first_name']." ".$row['last_name']."'s Search W/E History</div><br>";
                $page[] = "<tr>
                					<td class='tk-cody'>".$num."</td>
                                    <td class='tk-cody'>".$status."</td>
                                    <td class='tk-cody' align='center'>".$row['we_no']."</td>
                                    <td class='tk-cody' align='center'>".$row['start_date']."</td>
                                    <td class='tk-cody' align='center'>".$row['end_date']."</td>
                                    <td class='tk-cody'>".$row['themesong']."&nbsp;</td>
                                    <td class='tk-cody'>".$row['location']."&nbsp;</td>
                           </tr>";
                $num++;
        }
    }

	$page[] = "</table><script language='JavaScript'>
			<!-- 
				tigra_tables('vendDet', 0, 0, '#ffffff', '#BFD9D3', '#ffcc66', 'yellow'); 
			// -->
			</script>
			</font>
			<!--<center><font face=\"arial\" size=\"1\"><a href=\"javascript:window.close()\" onmouseover=\"window.status='';return true\" onmouseout=\"window.status='';return true\">Close Window</a></font></center>-->";

	$page = implode("", $page);
	echo $header.$page;
?>
