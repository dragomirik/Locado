<?php hide_module();

if (is_set()) {if (user('u9')) {
$result67 = mysql_query("SELECT * FROM `settings` WHERE `module`='0' ORDER BY `id` DESC");
$num = setting('nav');
@$page = $_GET['page'];
$posts = mysql_num_rows($result67);
$total = (($posts - 1) / $num) + 1;
 $total =  intval($total);
 $page = intval($page);
if(empty($page) or $page <= 0) {$page = 1;}
  if($page > $total) $page = $total;
  $start = $page * $num - $num;	
$result67 = mysql_query("SELECT * FROM `settings` WHERE `module`='0' ORDER BY `id` DESC LIMIT $start, $num");
$myrow67 = mysql_fetch_array ($result67);
$stul = 2;
if ($page != 1) $pervpage = '<a class="hor_menu" style="color:#000;"  href=admin_page.php?page=1>«</a> | 
<a class="hor_menu" style="color:#000;"  href=admin_page.php?page='. ($page - 1) .'><</a> | ';
if ($page != $total) $nextpage = ' | <a class="hor_menu" style="color:#000;"  href=admin_page.php?page='. ($page + 1) .'>></a> |
 <a class="hor_menu" style="color:#000;"  href=admin_page.php?page=' .$total. '>»</a>';
if($page - 5 > 0) $page5left = ' <a class="hor_menu" style="color:#000;" href=admin_page.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a class="hor_menu" style="color:#000;" href=admin_page.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a class="hor_menu" style="color:#000;" href=admin_page.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a class="hor_menu" style="color:#000;" href=admin_page.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = ' <a class="hor_menu" style="color:#000;" href=admin_page.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a class="hor_menu" style="color:#000;" href=admin_page.php?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a class="hor_menu" style="color:#000;" href=admin_page.php?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a class="hor_menu" style="color:#000;" href=admin_page.php?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a class="hor_menu" style="color:#000;" href=admin_page.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a class="hor_menu" style="color:#000;" href=admin_page.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

echo "<div style=\"text-align:right; margin-top:0; margin-bottom:5px; padding-right:15px;\">[ <a class=\"hor_menu\" style=\"color:#000;\" href=\"add_page.php\">Додати сторінку</a> ]</div>";
echo "<div class=\"pstrnav color1\" style=\"float:right;\">";
if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo '<p style="margin-top:0;margin-bottom:5px;padding-right:15px;">'.$pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'</p>';
}
echo "</div>";
echo "<table class='table_m' cellspacing='0'style='width:97%;'><tr  style=\"font-weight:bold;\">
<th class='table".($stul)."' width=\"50%\">
Заголовок сторінки
</th>
<th class='table".($stul)."' >Посилання на сторінку
</th>
<th class='table".($stul+2)."'  style=\"width:34px;\">

</th>
</tr>";
$stul = 1;
if (mysql_num_rows($result67)>0) {
do {
$dele342 = "";
if ($myrow67["url"]!="index.php") {$dele342 = " <img alt=\"Видалити\" title=\"Видалити\" src=\"img/icon/del.png\" onclick=\"del_page_ask(".$myrow67["id"].",'".$myrow67["url"]."')\" style=\"cursor:pointer;\"/>";}
printf("<tr id=\"d".$myrow67["id"]."\">
<td class='table".($stul)."' width='50%s'>%s
"."
</td>
<td class='table".($stul)."' >
<a href='%s' target=\"blank\">%s</a>
</td>
<td class='table".($stul+2)."'  style=\"width:35px;\" id=\"a".$myrow67["id"]."\">
<a href=\"edit_page.php?id=".$myrow67["id"]."\"><img alt=\"Редагувати\" title=\"Редагувати\" src=\"img/icon/red.png\" /></a>".$dele342."</td>
</tr>
",'%',$myrow67["title"],$myrow67["url"],$myrow67['url']);
if ($stul == 2) {$stul = 1;}
}
while ($myrow67 = mysql_fetch_array ($result67));
echo "</table>";

} else {echo "<p class='view_title'>"."Немає сторінок"."</p>";}
} else { echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>"; }} else {echo "<p class='view_title'>".word(62)."</p>";}

?>
