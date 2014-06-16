<?php hide_module();
echo "<div class=\"h\">Меню</div>
<ul class=\"ul_null\">";
/*echo "
<li><a href=\"index.php\" class=\"a_menu\"><span class=\"rtr\">Головна</span></a></li>";*/
$result1 = mysql_query("SELECT `url`,`cpurl`,`title` FROM `settings` WHERE `show_v`='1' ORDER BY `id` ASC");
$myrow2 = mysql_fetch_array($result1);
do{ 
echo "<li>";
if ($my_pages["url"]==$myrow2["url"]) {echo "<strong>";}
$url1 = $myrow2["url"];
if (!empty($myrow2["cpurl"])) {$url1 = $myrow2["cpurl"];}
if ($url1=='index.php') {$url1 = "";}
echo "<a href=\"".sitename()."".$url1."\" class=\"a_menu\"><span class=\"rtr\">".$myrow2["title"]."</span></a>";
if ($my_pages["url"]==$myrow2["url"]) {echo "</strong>";}
echo "</li>";
}
while ($myrow2 = mysql_fetch_array($result1));
echo "</ul>";
?>