<?php hide_module(); 
if (($my_pages["url"]=='articles.php') or ($my_pages["url"]=='view_a.php')
 or ($my_pages["url"]=='edit_a.php') or ($my_pages["url"]=='add_a.php')) {
	echo "<div class=\"left_td\">";		
echo "<div class=\"h\">".word(94)."</div>
<ul class=\"ul_null\">";
$result1 = mysql_query("SELECT * FROM `categories` WHERE 1 ORDER BY `id` ASC");
$myrow2 = mysql_fetch_array($result1);
do{
echo "<li>";
if (substr_count($_SERVER['QUERY_STRING'],"categ=".$myrow2["id"])>0) {echo "<strong>";}
echo "<a href=\"".sitename()."articles/".$myrow2["id"]."\" class=\"a_menu\"><span class=\"rtr\">"
.$myrow2["cat"]."</span></a></li>";
if (substr_count($_SERVER['QUERY_STRING'],"categ=".$myrow2["id"])>0) {echo "</strong>";
echo "</li>";}
}
while ($myrow2 = mysql_fetch_array($result1));
echo "</ul>";
			echo "</div>";}	?>