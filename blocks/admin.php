<?php hide_module();
if (user('u14')){
echo "<div class=\"left_td left_admin\"><div class=\"h h2\">".word(1)."</div><ul class=\"ul_null\">";
$c = 1;
if (!setting("cons")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 2;
if (setting("q45")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 3;
if (setting("q40")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 4;
if (setting("q39")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
/*$c = 5;
if (setting("q10")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 6;
if (setting("q11")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}*/
$c = 7;
if (setting("q5")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 8;
if (setting("q6")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 9;
if (setting("q3")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 10;
if (setting("q4")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 11;
if (setting("q19")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 12;
if (setting("q9") && setting("q8")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 13;
if (setting("q2")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 14;
if (setting("q28")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 15;
if (setting("q37")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 16;
if (setting("q29")) {
echo "<li>";
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
if (page_print()==$admin_row["url"]){ echo "<strong>";}
echo "<a href=\"".site_name()."".$admin_row["url"]."\" class=\"a_menu\"><span class=\"rtr\">".$admin_row["title"]."</span></a>";
if (page_print()==$admin_row["url"]){ echo "</strong>";}}
$c = 17;
echo "</ul></div>";}
?>