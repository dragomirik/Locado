<?php hide_module();
echo "<div class=\"h\">".word(69)."</div>";
$resultp = mysql_query("SELECT `title`,`id` FROM `articles` WHERE `show`='1' ORDER BY  `articles`.`id` DESC LIMIT 0 , ".setting('l_a'))  or die (mysql_error());
if (mysql_num_rows($resultp)){
$myrow7 = mysql_fetch_array($resultp);
echo "<ul class=\"ul_null ul_left\">";
do {
printf ("<li><a  href='".sitename()."article/%s' class=\"a_menu\"><span class=\"rtr\">".cut($myrow7['title'],0)."</span></a></li>",$myrow7 ['id']);}
while ($myrow7 = mysql_fetch_array($resultp));
echo "</ul>";}
?>