<?php hide_module();
if (is_set()){
echo "<div id=\"nav_a\">
<img style=\"display:block; position:fixed; z-index:20000; right:1px; top:1px; height: 20px; width:20px; cursor:pointer;\" src=\"".sitename()."img/nav_close.png\" alt=\"close\" onclick=\"close_admin()\">
<ul id=\"nav\" style=\"margin-right:50px;\">
		<li>
			<a href=\"/\" title=\"\">Головна</a>
		</li>
		<li>
			<a href=\"#\" title=\"\">Кабінет</a>
			<ul>
				<li><a href=\"".site_name()."/cabinet.php\">Мій кабінет</a></li>
				<li><a href=\"".site_name()."/users.php\">Список користувачів</a></li>
				<li><a href=\"".site_name()."/mail.php\">Повідомлення</a></li>
				<li><a href=\"".site_name()."/mailto.php\">Написати повідомлення</a></li>
			</ul>
		</li>
		<li>
			<a href=\"#\" title=\"\">Поділитись</a>
			<ul>
				<li><a href=\"#\" onclick=\"openwin('http://my.ya.ru/posts_add_link.xml?URL=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."',800,600);\">							<img src=\"".sitename()."img/s_01.png\" alt=\"\" title=\"Яндекс\" /> 		Яндекс</a></li>
				<li><a href=\"#\" onclick=\"openwin('http://vk.com/share.php?url=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."',800,600);\">										<img src=\"".sitename()."img/s_02.png\" alt=\"\" title=\"Вконтакте\" /> 	Вконтакте</a></li>
				<li><a href=\"#\" onclick=\"openwin('https://www.facebook.com/sharer/sharer.php?u=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."',800,600);\">						<img src=\"".sitename()."img/s_03.png\" alt=\"\" title=\"Facebook\" /> 	Facebook</a></li>
				<li><a href=\"#\" onclick=\"openwin('https://twitter.com/intent/tweet?status=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']." ".$my_pages["meta_d"]."',800,600);\">	<img src=\"".sitename()."img/s_04.png\" alt=\"\" title=\"Twitter\" /> 	Twitter</a></li>
				<li><a href=\"#\" onclick=\"openwin('http://connect.mail.ru/share?url=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."',800,600);\">									<img src=\"".sitename()."img/s_05.png\" alt=\"\" title=\"Mail.ru\" /> 	Mail.ru</a></li>
				<li><a href=\"#\" onclick=\"openwin('https://plus.google.com/share?url=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."',800,600);\">									<img src=\"".sitename()."img/s_06.png\" alt=\"\" title=\"Google plus\" /> Google plus</a></li>
				</ul>
		</li>
				";
if (user('u14')){
if (setting("q3") or setting("q19") or setting("q39") or setting("q40") or setting("q45")) {
echo "		
		<li>
			<a href=\"#\" title=\"\">Загальне</a>
			<ul>";
		
$c = 2;
if (setting("q45")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
$c = 3;
if (setting("q40")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
$c = 4;
if (setting("q39")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
$c = 11;
if (setting("q19")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
$c = 9;
if (setting("q3")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
			echo "	</ul>
		</li>";		
}	

if (setting("q28") or setting("q2") or setting("q9")) {
		echo "<li>
			<a href=\"#\" title=\"\">Контент</a>
			<ul>";
$c = 12;
if (setting("q9") && setting("q8")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
$c = 13;
if (setting("q2")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
$c = 14;
if (setting("q28")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
		echo"	</ul>
		</li>		
		<li>";
}	/*	
if (setting("q11") or setting("q10")) {
		echo "<a href=\"#\" title=\"\">Меню</a>
			<ul>";
			
$c = 5;
if (setting("q10")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
$c = 6;
if (setting("q11")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
			
		echo"	</ul>
		</li>";	
}*/
if (setting("q5") or setting("q4") or setting("q6")) {		
		echo "<li>
			<a href=\"#\" title=\"\">Архіви</a>
			<ul>";
$c = 7;
if (setting("q5")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
$c = 8;
if (setting("q6")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
$c = 10;
if (setting("q4")) {
$admin_row = mysql_fetch_array(mysql_query("SELECT * FROM `admin` WHERE `id` = '$c'"));
echo "<li><a href=\"".sitename()."".$admin_row["url"]."\">".$admin_row["title"]."</a></li>";}
			echo"</ul>
		</li>";
		}
		if (user("u14")){
		echo "<li>
			<a href=\"".site_name()."/admin_log.php\" title=\"\">Логи сервера</a>
		</li>";}
		}
	echo "</ul></div><div id=\"nav_place\"></div>";}
?>