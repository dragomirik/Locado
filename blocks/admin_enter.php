<?php hide_module();

if (is_set()) {if (user('u9')) {
/**/
$result67 = mysql_query("SELECT * FROM `enter_hist` WHERE 1 ORDER BY `id` DESC");
$row = mysql_fetch_array($result67);
do {
if ((strtotime(date("Y-m-d")) - strtotime($row['date']." ".$row['time']))>(setting('hist_save')*24*3600)) {$barak = $row['id']; break;}
} while($row = mysql_fetch_array($result67));
if (isset($barak)) {
$mquery = mysql_query("DELETE FROM `enter_hist` WHERE `id`<'$barak'");}
/**/
$result67 = mysql_query("SELECT COUNT(*) FROM `enter_hist` WHERE 1 ORDER BY `id` DESC");
$num = setting('nav')*3;
@$page = $_GET['page'];
$mposts = mysql_fetch_array($result67);
$posts = $mposts[0];
$total = (($posts - 1) / $num) + 1;
 $total =  intval($total);
 $page = intval($page);
if(empty($page) or $page <= 0) {$page = 1;}
  if($page > $total) $page = $total;
  $start = $page * $num - $num;	
$result67 = mysql_query("SELECT * FROM `enter_hist` WHERE 1 ORDER BY `id` DESC LIMIT $start, $num");
$myrow67 = mysql_fetch_array ($result67);
$stul = 2;
if ($page != 1) $pervpage = '<a class="hor_menu" style="color:#000;"  href=admin_enter.php?page=1>«</a> | 
<a class="hor_menu" style="color:#000;"  href=admin_enter.php?page='. ($page - 1) .'><</a> | ';
if ($page != $total) $nextpage = ' | <a class="hor_menu" style="color:#000;"  href=admin_enter.php?page='. ($page + 1) .'>></a> |
 <a class="hor_menu" style="color:#000;"  href=admin_enter.php?page=' .$total. '>»</a>';
if($page - 5 > 0) $page5left = ' <a class="hor_menu" style="color:#000;" href=admin_enter.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a class="hor_menu" style="color:#000;" href=admin_enter.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a class="hor_menu" style="color:#000;" href=admin_enter.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a class="hor_menu" style="color:#000;" href=admin_enter.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = ' <a class="hor_menu" style="color:#000;" href=admin_enter.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a class="hor_menu" style="color:#000;" href=admin_enter.php?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a class="hor_menu" style="color:#000;" href=admin_enter.php?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a class="hor_menu" style="color:#000;" href=admin_enter.php?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a class="hor_menu" style="color:#000;" href=admin_enter.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a class="hor_menu" style="color:#000;" href=admin_enter.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav color1\" style=\"float:right;\">";
echo '<p style="margin-top:0;margin-bottom:5px;padding-right:15px;">'.$pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'</p>';
echo "</div>";
}
echo "<table class='table_m' cellspacing='0'style='width:97%;'><tr  style=\"font-weight:bold;\">
<th class='table".($stul)."' >
Логін
</th>
<th class='table".($stul)."' >Пароль
</th>
<th class='table".($stul)."' >IP
</th>
<th class='table".($stul)."' style=\"text-align:center; width:20px;\">Вхід
</th>
<th class='table".($stul)."' >Дата
</th>
<th class='table".($stul)."' >Час
</th>
<th class='table".($stul)."' >Cookie
</th>
<th class='table".($stul+2)."'  style=\"width:20px;\">

</th>
</tr>";
$stul = 1;
if (mysql_num_rows($result67)>0) {
do {

$pass = "";
for ($ioo = 0;$ioo<strlen(demask($myrow67["pass"]));$ioo++)
{$pass .= "•";}
if ($myrow67["enter"]==1) {$enter = "<img src=\"img/icon/plus.png\" alt=\"\" title=\"Користувач успішно зайшов до свого аккаунту\" />";} else {$enter = "<img src=\"img/icon/minus.png\" alt=\"\" title=\"Користувач не увійшов до свого аккаунту\"  style=\"text-align:center;\"/>";}
echo "<tr id=\"d".$myrow67["id"]."\">
<td class='table".($stul)."' >
".$myrow67["login"]."
</td>
<td class='table".($stul)."' >".$pass."
</td>
<td class='table".($stul)."' >".$myrow67["ip"]."
</td>
<td class='table".($stul)."' style=\"text-align:center;\">".$enter."
</td>
<td class='table".($stul)."' >".$myrow67["date"]."
</td>
<td class='table".($stul)."' >".$myrow67["time"]."
</td>
<td class='table".($stul)."' >".$myrow67["cookie"]."
</td>
<td class='table".($stul+2)."'  style=\"width:20px;\">
<a href=\"".$myrow67['page']."\" target=\"_blank\"><img src=\"img/icon/earth.png\" alt=\"\" title=\"Сторінка, з якої було здійснено вхід\" style=\"cursor:pointer;\" /></a>
</td>
</tr>
";
if ($stul == 2) {$stul = 1;}
}
while ($myrow67 = mysql_fetch_array ($result67));
echo "</table>";

} else {echo "<p class='view_title'>"."Немає сторінок"."</p>";}
} else { echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>"; }} else {echo "<p class='view_title'>".word(62)."</p>";}

?>
