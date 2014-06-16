<?php hide_module(); 
echo "<div id=\"hor_menu\"><div style=\"float:right; margin-right:5px; margin-top:8px; padding-right:0px; text-decoration: none; border:0px;\">
<img onclick=\"openwin('http://my.ya.ru/posts_add_link.xml?URL=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."',800,600);\" style=\"cursor:pointer;\" src=\"".sitename()."img/s_01.png\" alt=\"Яндекс\" title=\"Яндекс\" />
<img onclick=\"openwin('http://vk.com/share.php?url=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."',800,600);\" style=\"cursor:pointer;\" src=\"".sitename()."img/s_02.png\" alt=\"Вконтакте\" title=\"Вконтакте\" />
<img onclick=\"openwin('https://www.facebook.com/sharer/sharer.php?u=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."',800,600);\" style=\"cursor:pointer;\" src=\"".sitename()."img/s_03.png\" alt=\"Facebook\" title=\"Facebook\" />
<img onclick=\"openwin('https://twitter.com/intent/tweet?status=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']." ".$my_pages["meta_d"]."',800,600);\" style=\"cursor:pointer;\" src=\"".sitename()."img/s_04.png\" alt=\"Twitter\" title=\"Twitter\" />
<img onclick=\"openwin('http://connect.mail.ru/share?url=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."',800,600);\" style=\"cursor:pointer;\" src=\"".sitename()."img/s_05.png\" alt=\"Mail.ru\" title=\"Mail.ru\" />
<img onclick=\"openwin('https://plus.google.com/share?url=http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']."',500,350);\" style=\"cursor:pointer;\" src=\"".sitename()."img/s_06.png\" alt=\"Google plus\" title=\"Google plus\" />

<img onclick=\"openwin('rss.php',800,600);\" style=\"cursor:pointer;\" src=\"".sitename()."img/rss.png\" alt=\"rss\" title=\"Add RSS\" />
<img onclick=\"add_favorite(this);\" style=\"cursor:pointer;\" src=\"".sitename()."img/star.png\" alt=\"".word(80)."\" title=\"".word(80)."\" /></div><div>";
$result1 = mysql_query("SELECT `url`,`cpurl`,`title` FROM `settings` WHERE `show_h`='1'");
$myrow1 = mysql_fetch_array($result1);
$bull = true;
do{ 
$url1 = $myrow1["url"];
if ($url1=='index.php') {$url1 = "";}
if (!empty($myrow1["cpurl"])) {$url1 = $myrow1["cpurl"];}
if ($bull){
echo "&nbsp;<div><a href=\"".site_name()."/".$url1."\" class=\"horm\">",$myrow1["title"],"</a></div>";$bull = false;}
else {
echo " | <div><a href=\"".site_name()."/".$url1."\" class=\"horm\">",$myrow1["title"],"</a></div>";}
}
while ($myrow1 = mysql_fetch_array($result1));
echo "</div></div>";
?>