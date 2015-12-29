<?php
require_once ('/homepages/9/d91581201/htdocs/common.inc');

function buildWEOptions() {

    $thisReturn = '<select tabindex="1" name="weo" id="weo">';

    $query      = 'SELECT * FROM we_details order by we_no';
    $results    = doQuery($query);

    while ($thisLine = mysql_fetch_array($results))
    {
        $thisReturn .= "<option value='".$thisLine['we_no']."'";
        $thisReturn .= '>'.$thisLine['we_no'].'  :'.$thisLine['themesong'].'</option>';
    }
    $thisReturn .= '</select>';
    return ($thisReturn);
}

function buildWEList() {

    $thisReturn  = '<table border="0" cellspacing="3" cellpadding="2" name="wel" id="wel" class="listing">';
    $thisReturn .= '<tr><td colspan="5" align="center">SEARCH Weekends Dallas, Texas</td></tr>';
    $thisReturn .= '<tr><td align="center">W/E #</td><td>Theme Song</td><td align="center">From</td><td align="center">To</td><td align="center">Location</td></tr>';

    $query      = 'SELECT * FROM we_details order by we_no';
    $results    = doQuery($query);

    while ($thisLine = mysql_fetch_array($results))
    {
        $thisReturn .= "<tr>";
        // $thisReturn .= '<td align="center"><a CLASS="noul" href="" onClick=\'submitQuery('.$thisLine['we_no'].'); return false\' onMouseOver="window.status = \'Go to the previous weekend\'; return true">'.$thisLine['we_no'].'</a></td><td>'.$thisLine['themesong'].'&nbsp;</td><td align="center">'.$thisLine['start_date'].'&nbsp;</td><td align="center">'.$thisLine['end_date'].'&nbsp;</td><td>'.$thisLine['location'].'&nbsp;</td>';
        $thisReturn .= '<td align="center">'.$thisLine['we_no'].'</td><td>'.$thisLine['themesong'].'&nbsp;</td><td align="center">'.$thisLine['start_date'].'&nbsp;</td><td align="center">'.$thisLine['end_date'].'&nbsp;</td><td>'.$thisLine['location'].'&nbsp;</td>';
        $thisReturn .= "</tr>";
    }
    $thisReturn .= '</table>';
    return ($thisReturn);
}
?>
