<?php hide_module();
echo "<div class=\"h\">".word(68)."</div>";
$resultp = mysql_query("SELECT `title`,`id` FROM `news` WHERE 1 ORDER BY  `news`.`id` DESC LIMIT 0 , ".setting('l_n'))  or die (mysql_error());
$myrow7 = mysql_fetch_array($resultp);
echo "<ul  class=\"ul_null ul_left\">";
do {
printf ("<li><a  href='view_a.php?id=%s' class=\"a_menu\"><span class=\"rtr\">".cut($myrow7['title'],0)."</span></a></li>",$myrow7 ['id']);}
while ($myrow7 = mysql_fetch_array($resultp));
echo "</ul>";
?>