<?php hide_module();

if (is_set()) {if (user('u9')) {
$from = "";
$whom = "";
$mindate = "";
$mintime = "";
$maxdate = "";
$maxtime = "";
$and = "";
if ( 1==1 /*isset($_GET["m_btn"])*/) {
$get = "";
if (isset($_GET["from"])){
if (!empty($_GET["from"])) {
if (preg_code($_GET["from"])) {$from = $_GET["from"]; $and .= "AND `from`='".$_GET["from"]."' "; $get .= "&from=".$_GET["from"];}}}
if (isset($_GET["whom"])){
if (!empty($_GET["whom"])) {
if (preg_code($_GET["whom"])) {$whom = $_GET["whom"]; $and .= "AND `whom`='".$_GET["whom"]."' "; $get .= "&whom=".$_GET["whom"];}}}
if (isset($_GET["mindate"])&&isset($_GET["mintime"])){
if (!empty($_GET["mindate"])&&!empty($_GET["mintime"])) {
if (1==1) {$mindate = $_GET["mindate"]; $mintime = $_GET["mintime"]; $and .= "AND `time`>='".$_GET["mindate"]." ".$_GET["mintime"]."' "; $get .= "&mindate=".$_GET["mindate"]."&mintime=".$_GET["mintime"];}}}
if (isset($_GET["maxdate"])&&isset($_GET["maxtime"])){
if (!empty($_GET["maxdate"])&&!empty($_GET["maxtime"])) {
if (1==1) {$maxdate = $_GET["maxdate"]; $maxtime = $_GET["maxtime"];  $and .= "AND `time`<='".$_GET["maxdate"]." ".$_GET["maxtime"]."' "; $get .= "&maxdate=".$_GET["maxdate"]."&maxtime=".$_GET["maxtime"];}}}
}
echo "<div style=\"width:100%; background-color:rgba(54,143,219,0.1);\">
<form method=\"get\" action=\"\">
<table class=\"table_none\"><tr><td><p class=\"placeholder\">Адресант</p>
<input type=\"text\" name=\"from\" value=\"".$from."\"/>
<p class=\"placeholder\">Отримувач</p>
<input type=\"text\" name=\"whom\" value=\"".$whom."\"/></td><td width=\"50px\"></td><td>
<p class=\"placeholder\">Обрати листи, що були отримані після:</p>
<input type=\"date\" name=\"mindate\"  value=\"".$mindate."\"/><input type=\"time\" name=\"mintime\"  value=\"".$mintime."\"/>
<p class=\"placeholder\">Обрати листи, що були отримані до:</p>
<input type=\"date\" name=\"maxdate\"  value=\"".$maxdate."\"/><input type=\"time\" name=\"maxtime\" value=\"".$maxtime."\" /></td></tr></table>
<input type=\"submit\" style=\"margin-left:5px;margin-right:7px; width:200px;\" class=\"button\" value=\"Фільтрувати\" name=\"m_btn\" />

<input type=\"reset\" style=\"margin-left:5px;\" class=\"button\" value=\"    Очистити фільтр     \" name=\"name123\" onclick=\"reset_mess()\"/>
</form>
</div>";
$result67 = mysql_query("SELECT * FROM `messages` WHERE 1 ".$and." ORDER BY `id` DESC");
$num = setting('nav');
@$page = $_GET['page'];
$posts = mysql_num_rows($result67);
$total = (($posts - 1) / $num) + 1;
 $total =  intval($total);
 $page = intval($page);
if(empty($page) or $page <= 0) {$page = 1;}
  if($page > $total) $page = $total;
  $start = $page * $num - $num;	
$result67 = mysql_query("SELECT * FROM `messages` WHERE 1 ".$and." ORDER BY `id` DESC LIMIT $start, $num");
$myrow67 = mysql_fetch_array ($result67);
$stul = 2;
if ($page != 1) $pervpage = '<a class="hor_menu" style="color:#000;"  href=admin_messages.php?page=1'.$get.'>«</a> | 
<a class="hor_menu" style="color:#000;"  href=admin_messages.php?page='. ($page - 1) .$get.'><</a> | ';
if ($page != $total) $nextpage = ' | <a class="hor_menu" style="color:#000;"  href=admin_messages.php?page='. ($page + 1) .$get.'>></a> |
 <a class="hor_menu" style="color:#000;"  href=admin_messages.php?page=' .$total.$get. '>»</a>';
if($page - 5 > 0) $page5left = ' <a class="hor_menu" style="color:#000;" href=admin_messages.php?page='. ($page - 5) .$get.'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a class="hor_menu" style="color:#000;" href=admin_messages.php?page='. ($page - 4) .$get.'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a class="hor_menu" style="color:#000;" href=admin_messages.php?page='. ($page - 3) .$get.'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a class="hor_menu" style="color:#000;" href=admin_messages.php?page='. ($page - 2) .$get.'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = ' <a class="hor_menu" style="color:#000;" href=admin_messages.php?page='. ($page - 1) .$get.'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a class="hor_menu" style="color:#000;" href=admin_messages.php?page='. ($page + 5) .$get.'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a class="hor_menu" style="color:#000;" href=admin_messages.php?page='. ($page + 4) .$get.'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a class="hor_menu" style="color:#000;" href=admin_messages.php?page='. ($page + 3) .$get.'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a class="hor_menu" style="color:#000;" href=admin_messages.php?page='. ($page + 2) .$get.'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a class="hor_menu" style="color:#000;" href=admin_messages.php?page='. ($page + 1) .$get.'>'. ($page + 1) .'</a>';

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav color1\" style=\"float:right;\">";
echo '<p style="margin-top:0;margin-bottom:5px;padding-right:15px;">'.$pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'</p>';
echo "</div>";
}
echo "<div style=\"margin-left:10px;margin-right:10px; margin-top:10px; \">";
/*
echo "<table class='table_m' cellspacing='0'style='width:97%;'><tr  style=\"font-weight:bold;\">
<td class='table".($stul)."' width=\"50%\">
Заголовок сторінки
</td>
<td class='table".($stul)."' >Посилання на сторінку
</td>
<td class='table".($stul+2)."'  style=\"width:34px;\">

</td>
</tr>";*/
$stul = 1;
if (mysql_num_rows($result67)>0) {
do {/*
printf("<tr id=\"d".$myrow67["id"]."\">
<td class='table".($stul)."' width='50%s'>%s
"."
</td>
<td class='table".($stul)."' >
<a href='%s' target=\"blank\">%s</a>
</td>
<td class='table".($stul+2)."'  style=\"width:34px;\" id=\"a".$myrow67["id"]."\">
<a href=\"edit_page.php?id=".$myrow67["id"]."\"><img alt=\"Редагувати\" title=\"Редагувати\" src=\"img/icon/red.png\" /></a>
<img alt=\"Видалити\" title=\"Видалити\" src=\"img/icon/del.png\" onclick=\"del_page_ask(".$myrow67["id"].",'".$myrow67["url"]."')\" style=\"cursor:pointer;\"/>
</td>
</tr>
",'%',$myrow67["title"],$myrow67["url"],$myrow67['url']);
if ($stul == 2) {$stul = 1;}*/
$delec = "";
if ($myrow67['del']==0) {$color = "rgba(0,255,0,0.2)";} else  {$color = "rgba(255,0,0,0.1)"; $delec = "#Видалено";}
if ($myrow67['new']==0) {$read = "прочитано";} else  {$read = "не прочитано";}
printf("
<table class=\"table_none\" style='background-color: %s; width: 100%s;' >
<tr><td><span style=\"float:right;margin-right:5px;\">".$delec."</span><b>%s</b> надіслав повідомлення <b>%s</b> - %s (%s)</td></tr>
<tr><td><hr>Тема: <b>%s</b></td></tr>
<tr><td>%s</td></tr>
</table><br />",$color,'%',$myrow67['from'],$myrow67['whom'],$myrow67['time'],$read,$myrow67['title'],$myrow67['mail']);
}
while ($myrow67 = mysql_fetch_array ($result67));
echo "</div>";

} else {echo "<p class='view_title'>"."Немає сторінок"."</p>";}
} else { echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>"; }} else {echo "<p class='view_title'>".word(62)."</p>";}

?>
