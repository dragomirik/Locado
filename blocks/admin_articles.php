<?php hide_module();

if (is_set()) {if (user('u9')) {
$result67 = mysql_query("SELECT `id` FROM `articles` WHERE 1 ORDER BY `id` DESC");
$num = setting('nav')*2;
@$page = $_GET['page'];
$posts = mysql_num_rows($result67);
$total = (($posts - 1) / $num) + 1;
 $total = intval($total);
  $page = intval($page);
if(empty($page) or $page <= 0) {$page = 1;}
  if($page > $total) $page = $total;
  $start = $page * $num - $num;	
$result67 = mysql_query("SELECT `id`,`date`,`title`,`show` FROM `articles` WHERE 1 ORDER BY `id` DESC LIMIT $start, $num");
if ($posts!=0) {
$myrow67 = mysql_fetch_array ($result67);
$stul = 2;
if ($page != 1) $pervpage = '<a class="hor_menu" style="color:#000;"  href=admin_articles.php?page=1>«</a> | 
<a class="hor_menu" style="color:#000;"  href=admin_articles.php?page='. ($page - 1) .'><</a> | ';
if ($page != $total) $nextpage = ' | <a class="hor_menu" style="color:#000;"  href=admin_articles.php?page='. ($page + 1) .'>></a> |
 <a class="hor_menu" style="color:#000;"  href=admin_articles.php?page=' .$total. '>»</a>';
if($page - 5 > 0) $page5left = ' <a class="hor_menu" style="color:#000;" href=admin_articles.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a class="hor_menu" style="color:#000;" href=admin_articles.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a class="hor_menu" style="color:#000;" href=admin_articles.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a class="hor_menu" style="color:#000;" href=admin_articles.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = ' <a class="hor_menu" style="color:#000;" href=admin_articles.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a class="hor_menu" style="color:#000;" href=admin_articles.php?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a class="hor_menu" style="color:#000;" href=admin_articles.php?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a class="hor_menu" style="color:#000;" href=admin_articles.php?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a class="hor_menu" style="color:#000;" href=admin_articles.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a class="hor_menu" style="color:#000;" href=admin_articles.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div style=\"text-align:right; margin-top:0; margin-bottom:5px; padding-right:15px;\">[ <a class=\"hor_menu\" style=\"color:#000;\" href=\"add_a.php\">Додати статтю</a> ]</div>";
echo "<div class=\"pstrnav color1\" style=\"float:right;\">";
echo '<p style="margin-top:0;margin-bottom:5px;padding-right:15px;">'.$pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'</p>';
echo "</div>";
}
echo "<table class='table_m' cellspacing='0'style='width:97%;'><tr  style=\"font-weight:bold;\">
<th class='table".($stul)."' width=\"50%\">
Заголовок статті
</th>
<th class='table".($stul)."' >Додана
</th>
<th class='table".($stul+2)."'  style=\"width:53px;\">

</th>
</tr>";
$stul = 1;
if (mysql_num_rows($result67)>0) {
do {
if ($myrow67["show"]==1) {$href = "hidet";} else {$href = "hidef";}
printf("<tr id=\"d".$myrow67["id"]."\">
<td class='table".($stul)."' width='50%s'>
<a href=\"view_a.php?id=%s\">%s</a>
"."
</td>
<td class='table".($stul)."' >
%s
</td>
<td class='table".($stul+2)."'  style=\"width:54px;\" id=\"a".$myrow67["id"]."\">
<img style='cursor:pointer;' title=\"".word(2)."\" src='img/icon/".$href.".png' onclick=\"change(".$myrow67['id'].")\" id=\"".$myrow67['id']."\"> <a href='edit_a.php?id=".$myrow67['id']."' title=\"".word(3)."\"><img src='img/icon/red.png'></a><a href='articles.php'  ></a>
<img style='cursor:pointer;' title='".word(4)."' src='img/icon/del.png' onclick=\"del_a(".$myrow67['id'].")\">
</td>
</tr>
",'%',$myrow67['id'],$myrow67["title"],$myrow67["date"]);
if ($stul == 2) {$stul = 1;}
}
while ($myrow67 = mysql_fetch_array ($result67));
echo "</table>";

}} else {echo "<p class='view_title'>"."Немає статей"."</p>";}
} else { echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>"; }} else {echo "<p class='view_title'>".word(62)."</p>";}

?>
