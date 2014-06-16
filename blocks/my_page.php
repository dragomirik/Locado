<?php hide_module();
$thispage = $_SERVER['PHP_SELF'];
$l = strlen($thispage);
for ($i=$l;$thispage[$i]!="/";$i--);
$thispage = substr($thispage,$i+1,$l);
if (isset($_GET['page']) and $thispage == 'index.php') {if (fname($_GET['page'])) {$thispage = $_GET['page'];}}
$result = mysql_query("SELECT * FROM `settings` WHERE `cpurl`='$thispage' OR `url`='$thispage'");
$my_pages = mysql_fetch_array($result);
$rights = 0;
?>