<?php
require_once ("search.common.php");
require_once ("/homepages/9/d91581201/htdocs/common.inc");

function searchQuery($aFormValues, $weOverride){
	$objResponse = new xajaxResponse();
	
	if ($weOverride == null) {
		$weSubmit = $aFormValues['weo'];
	} else {
		$weSubmit = $weOverride;
	}
	
	$prevWE = $weSubmit-1;
	$nextWE = $weSubmit+1;
	
	if ($prevWE == 0) {
		$prevWELink = "&nbsp;";
	/*} else if ($prevWE == 19) {
		$prevWELink = "<font CLASS='noul'><a CLASS='blacklink' href='' onClick='submitQuery(18); return false' onMouseOver=\"window.status = 'Go to the previous weekend'; return true\"><img src=\"images/Back.png\" border=\"0\"><br>Go To W/E 18 !</a></font>";*/
	} else {
		$prevWELink = "<font CLASS='noul'><a CLASS='blacklink' href='' onClick='submitQuery($prevWE); return false' onMouseOver=\"window.status = 'Go to the previous weekend'; return true\"><img src=\"images/Back.png\" border=\"0\"><br>Go To W/E $prevWE</a></font>";
	}
	
	if ($nextWE == 71) {
		$nextWELink = "&nbsp;"; 
	/*} else if ($nextWE == 19) {
		$nextWELink = "<font CLASS='noul'><a CLASS='blacklink' href='' onClick='submitQuery(20); return false'><img src=\"images/Next.png\" border=\"0\"><br>Go To W/E 20 !</a></font>";*/
	} else {
		$nextWELink = "<font CLASS='noul'><a CLASS='blacklink' href='' onClick='submitQuery($nextWE); return false'><img src=\"images/Next.png\" border=\"0\"><br>Go To W/E $nextWE !</a></font>";
	}
	
	$pageHeader = array();
	$pageFooter = array();
	$pageBody = array();
	
	$tabsHeader = array();
	$tabsFooter = array();
	$tabsLi = array();
	$tabsDiv1 = array();
	$tabsDiv2 = array();
	$tabsDiv3 = array();
	$tabsDiv6 = array();
	// $tabsW = array();
	
	$tabsHeader[] = "<div id='tabs'>";
	$tabsFooter[] = "</div>";
	
	$pageHeader[] = "<table cellspacing='0' cellpadding=2 border='0' width='100%'><tr>";
	
	// $sql1 = "SELECT distinct st.rid FROM searchers s, statuses st, we_details wed, weekends w WHERE s.id = w.id AND st.rid = w.status AND wed.we_no = w.we_no AND w.we_no = '".$weSubmit."' order by 1";
	$sql1 = "select * from v_groups where we_no = '".$weSubmit."' order by 1";
	$groups = doQuery($sql1);
	
	if (mysql_num_rows($groups) == 0) {
		$pageBody[] = "<td valign='top'>
				<table name='searchView' id='searchView' width='100%'>
					<tr>
					<td align='left'>$prevWELink</td>
						<td colspan='8' align='center' bgcolor='#FFAA00'>
						<font face='arial' size='2'><b>No Entries Found</b></font>
						</td>
						<td align='right'>$nextWELink</td>
					</tr>
				</table>
				</td>";
	} else {
		while ($staff = mysql_fetch_array($groups)) {
			// $tsql = "SELECT w.we_no, DATE_FORMAT(wed.start_date, '%M %D') AS start_date, DATE_FORMAT(wed.end_date, '%M %D %Y')AS end_date, wed.themesong, wed.location, s.id, s.first_name, s.last_name, st.rid, st.status, wed.songfactsID, wed.wikipedia
			// FROM searchers s, statuses st, we_details wed, weekends w
			// WHERE s.id = w.id
			// AND st.rid = w.status
			// AND wed.we_no = w.we_no
			// AND w.we_no = '".$weSubmit."' 
			// and w.status = '".$staff['rid']."'
			// ORDER BY st.rid, s.last_name, s.first_name";
			
			$tsql = "select * from v_we_all_details where we_no = '".$weSubmit."' and rid = '".$staff['rid']."' ORDER BY rid, last_name, first_name";
			
			$stmt = doQuery($tsql);
			
			$staffRid = $staff['rid'];
			
			$compStatus = "";
			$bgpic = "images/bg-darkgray.gif";
			$cycleCount = 0;
			$pageBody[] = "<td valign='top'><table width='100%' name='".$staff['rid']."' id='".$staff['rid']."'>";
			// $tabsDiv1[] = "<div id='tabs-".$staff['rid']."'>";

				while ($row = mysql_fetch_array($stmt)) {
                    // Set up substitutions
					if (!is_null($row['wikipedia'])) {
						$wikilink = "<br><font CLASS='noul' size='2'><a href='".$row['wikipedia']."' target='_blank'>".$row['themesong']." on wikipedia.org</a></font>";
					} else {
						$wikilink = "";
					}
					
					if ($row['themesong'] == '' || $row['themesong'] == 'NO THEME SONG' || is_null($row['songfactsID'])) {
						$songlink = $row['themesong'].$wikilink;
					} else {
						$songlink = "<font CLASS='noul'><a href='http://www.songfacts.com/detail.php?id=".$row['songfactsID']."' target='_blank'>".$row['themesong']."</a>$wikilink</font>";
						//$songlink = $row['themesong'];
					}
					
                    if ($row['start_date'] == "") {
                        $weDates = " Dates Unavailable ";
                    } else {
                        $weDates = $row['start_date']." - ".$row['end_date'];
                    }
                    // Set up substitutions
                    $pageHeader2 = "<table width='100%'><tr><td align='left'>$prevWELink</td><td class='tk-museo' align='center'>Weekend #".$row['we_no']." - ".$weDates."<br>".$songlink."<br><font size='3'>".$row['location']."</font></td><td align='right'>$nextWELink</td></tr></table>";
					
					if ($row['searchers_pic']) {
						$tabsW = "Weekend #".$row['we_no']." - ".$weDates."<br>".$songlink."<br><font size='3'>".$row['location']."<br><img src='".$row['searchers_pic']."' border='0' />";
					} else {
						$tabsW = "Weekend #".$row['we_no']." <br /> ".$weDates."<br>".$songlink."<br><font size='3'>".$row['location'];
					}
					
					$status_id = $row['status'];
					$searcher_id = $row['id'];
					if ($status_id <> $compStatus) {
						$statusName = $row['status'];
						$pageBody[] = "<tr><td colspan='2'align='center' class='tk-museo'>$statusName</td></tr>";
						$tabsLi[] = "<li><a href='#tabs-".$staff['rid']."'>$statusName</a></li>";
						
						$num = 1;
					}
					
					$pageBody[] = "<tr><td class='listing'>".$num."</td>
					<td class='listing'><font CLASS='noul'><A class='blacklink' HREF=\"javascript:pUCenteredWindow('searcher_detail.php?searcher_id=$searcher_id', 800, 300);\">".$row['last_name'].", ".$row['first_name']."</a></font></td>
					</tr>";
					
					switch ($staffRid) {
						case 1:
							$tabsDiv1[] = "<font CLASS='noul'><A class='blacklink' HREF=\"javascript:pUCenteredWindow('searcher_detail.php?searcher_id=$searcher_id', 800, 300);\">".$row['last_name'].", ".$row['first_name']."</a></font></br>";
							break;
						case 2:
							$tabsDiv2[] = "<font CLASS='noul'><A class='blacklink' HREF=\"javascript:pUCenteredWindow('searcher_detail.php?searcher_id=$searcher_id', 800, 300);\">".$row['last_name'].", ".$row['first_name']."</a></font></br>";
							break;
						case 3:
							$tabsDiv3[] = "<font CLASS='noul'><A class='blacklink' HREF=\"javascript:pUCenteredWindow('searcher_detail.php?searcher_id=$searcher_id', 800, 300);\">".$row['last_name'].", ".$row['first_name']."</a></font></br>";
							break;
						case 4:
							$tabsDiv4[] = "<font CLASS='noul'><A class='blacklink' HREF=\"javascript:pUCenteredWindow('searcher_detail.php?searcher_id=$searcher_id', 800, 300);\">".$row['last_name'].", ".$row['first_name']."</a></font></br>";
							break;
						case 6:
							$tabsDiv6[] = "<font CLASS='noul'><A class='blacklink' HREF=\"javascript:pUCenteredWindow('searcher_detail.php?searcher_id=$searcher_id', 800, 300);\">".$row['last_name'].", ".$row['first_name']."</a></font></br>";
							break;
					}

					
					$compStatus = $row['status'];
					$rowCnt++;
					$num++;
					$cycleCount++;
				}
			$pageBody[] = "</table></td>";
			// $tabsDiv[] = "</div>";
		}
	}
	
	$pageFooter[] = "</tr></table>";
	
	$pageBody   = implode("", $pageBody);
	$pageHeader = implode("", $pageHeader);
	$pageFooter = implode("", $pageFooter);

	$tabsHeader = implode("", $tabsHeader);
	$tabsFooter = implode("", $tabsFooter);
	$tabsLi     = implode("", $tabsLi);
	$tabsDiv1   = implode("", $tabsDiv1);
	$tabsDiv2   = implode("", $tabsDiv2);
	$tabsDiv3   = implode("", $tabsDiv3);
	$tabsDiv4   = implode("", $tabsDiv4);
	$tabsDiv6   = implode("", $tabsDiv6);
	// $tabsW      = implode("", $tabsW);

	$tabsLi = "<ul>".$tabsLi."</ul>";
	

	$page = $pageHeader2.$pageHeader.$pageBody.$pageFooter;
	$pageTabs = $tabsHeader.$tabsLi.$tabsDiv.$tabsFooter;
	
	// $objResponse->assign("resultSet", "innerHTML", $pageTabs);
	$objResponse->assign("tabs-1", "innerHTML", $tabsDiv1);
	$objResponse->assign("tabs-2", "innerHTML", $tabsDiv2);
	$objResponse->assign("tabs-3", "innerHTML", $tabsDiv3);
	$objResponse->assign("tabs-4", "innerHTML", $tabsDiv4);
	$objResponse->assign("tabs-6", "innerHTML", $tabsDiv6);
	$objResponse->assign("tabs-w", "innerHTML", $tabsW);
	$objResponse->script( '$( "#tabs" ).tabs( "option", "active", 0 );' );
	
	// $objResponse->assign("weo", "value", $weSubmit);
	// if (mysql_num_rows($groups) <> 0) {
		// mysql_data_seek($groups, 0);
	// }
	// while ($staff = mysql_fetch_array($groups)) {
		// $objResponse->script("tigra_tables('".$staff['rid']."', 1, 0, '#ffffff', '#D4FF7F', '#ffcc66', 'yellow');");
	// }
	$objResponse->assign("submitButton","disabled",false);
	
	return $objResponse;
}

$xajax->processRequest();
