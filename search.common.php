<?php
require_once('/homepages/9/d91581201/htdocs/search/xajax/xajax.inc.php');
session_start();
$xajax = new xajax("search.server.php");
$xajax->registerFunction("searchQuery");
?>
