<?php

class MySQLPagedResultSet
{

  var $results;
  var $pageSize;
  var $page;
  var $row;
  
  function MySQLPagedResultSet($query,$pageSize,$cnx, $pageNumr)
  {
    //$resultpage = $_GET['resultpage'];
    if (isset($_GET['resultpage'])) {
        $resultpage = $_GET['resultpage'];
    } else {
        $resultpage = $pageNumr;
    }
    
    $this->results = @mysql_query($query,$cnx);
    $this->pageSize = $pageSize;
    if ((int)$resultpage <= 0) $resultpage = 1;
    if ($resultpage > $this->getNumPages())
      $resultpage = $this->getNumPages();
    $this->setPageNum($resultpage);
  }
  
  function getNumPages()
  {
    if (!$this->results) return FALSE;
    
    return ceil(mysql_num_rows($this->results) /
                (float)$this->pageSize);
  }
  
  function setPageNum($pageNum)
  {
    if ($pageNum > $this->getNumPages() or
        $pageNum <= 0) return FALSE;
  
    $this->page = $pageNum;
    $this->row = 0;
    mysql_data_seek($this->results,($pageNum-1) * $this->pageSize);
  }
  
  function getPageNum()
  {
    return $this->page;
  }
  
  function isLastPage()
  {
    return ($this->page >= $this->getNumPages());
  }
  
  function isFirstPage()
  {
    return ($this->page <= 1);
  }
  
  function fetchArray()
  {
    if (!$this->results) return FALSE;
    if ($this->row >= $this->pageSize) return FALSE;
    $this->row++;
    //return mysql_fetch_array($this->results); Trying a change - mm
    return mysql_fetch_array($this->results, MYSQL_ASSOC);
  }
  
  function getPageNav($queryvars = '')
  {
    $nav = '';
    if (!$this->isFirstPage())
    {
      //$nav .= "<a href=\"?resultpage=".($this->getPageNum()-1).'&'.$queryvars.'">Prev</a> '; --original line
      $pageVal = $this->getPageNum()-1;
      $nav .= "<a href=\"javascript:void(0);\" onclick='submitQuery($pageVal);'>Prev</a>";
    } else {
        $nav .= "<font size='2pt' face='verdana' color='#E1E1E1'>Prev</font>";
    }

    /*if ($this->getNumPages() > 1)
      for ($i=1; $i<=$this->getNumPages(); $i++)
      {
        if ($i==$this->page)
          $nav .= "$i ";
        else
          $nav .= "<a href=\"?resultpage={$i}&".$queryvars."\">{$i}</a> ";
      }*/

    /* Trying a change mm 022808 */
    if ($this->getNumPages() > 1)
      for ($i=$this->page-5; $i<=$this->page+5; $i++)
      {
        if ($i < 1) continue;
        if ( $i > $this->getNumPages() ) break;

        if ($i==$this->page)
          $nav .= " <a class=\"tabselected\">$i</a> ";
        else
          //$nav .= "<a href=\"?resultpage={$i}&".$queryvars."\">{$i}</a> "; -- original line
          $nav .= "&nbsp;<a href=\"javascript:void(0);\" onclick='submitQuery($i);'>{$i}</a>&nbsp;";
      }

    if (!$this->isLastPage())
    {
        //$nav .= "<a href=\"?resultpage=".($this->getPageNum()+1).'&'.$queryvars.'">Next</a> '; -- original line
        $pageVal = $this->getPageNum()+1;
        $nav .= "<a href=\"javascript:void(0);\" onclick='submitQuery($pageVal);'>Next</a>";
    } else {
        $nav .= "<font size='2pt' face='verdana' color='#E1E1E1'>Next</font>";
    }
    
    return $nav;
  }
}

?>
