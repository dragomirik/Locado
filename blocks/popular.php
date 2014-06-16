<?php hide_module();
echo "<div class=\"h\">".word(28)."</div>";
$resultp = mysql_query("SELECT `title`,`id`,`like_ip`,`dislike_ip` FROM `articles` WHERE `show`='1'") 
 or die (mysql_error());
 if (mysql_num_rows($resultp)){
$myrow7 = mysql_fetch_array($resultp);
$k = 0;
do {
$arr_ip[$k] = rank($myrow7);
$a_like [$k] [0] = $myrow7["title"];
$a_like [$k] [1] = $myrow7["id"];
$a_like [$k] [2] = $arr_ip[$k];
$k++;
}
while ($myrow7 = mysql_fetch_array($resultp));
rsort($arr_ip);
$k1 = setting('t_a');
echo "<ul class=\"ul_null ul_left\">";
for ($k = 0;$k<$k1;$k++) {
for ($j = 0;$j<count($arr_ip);$j++) {
if ($a_like [$j] [2]== $arr_ip[$k]) {
printf ("<li><a  href='".sitename()."article/%s' class=\"a_menu\"><span class=\"rtr\">".cut($a_like [$j] [0],0)."</span></a></li>",$a_like [$j] [1]);
$a_like [$j] [2] = -1;
$j = count($arr_ip);
}}
}
echo "</ul>";}
?>