<?php hide_module();

if (is_set()) {if (user('u9')) {
$from = "";
$author = "";
$mindate = "";
$maxdate = "";
$and = "";
if (/*isset($_GET["m_btn"])*/1==1) {
$get = "";
if (isset($_GET["from"])){
if (!empty($_GET["from"])) {
if (preg_code($_GET["from"])) {$from = $_GET["from"]; $and .= "AND `from`='".$_GET["from"]."' ";$get .= "&from=".$_GET["from"];}}}
if (isset($_GET["author"])){
if (!empty($_GET["author"])) {
if (preg_code($_GET["author"])) {$author = $_GET["author"]; $and .= "AND `login`='".$_GET["author"]."' ";$get .= "&author=".$_GET["author"];}}}
if (isset($_GET["mindate"])) {
if (!empty($_GET["mindate"])) {
if (1==1) {$mindate = $_GET["mindate"]; $and .= "AND `date`>='".$_GET["mindate"]."' "; $get .= "&mindate=".$_GET["mindate"];}}}
if (isset($_GET["maxdate"])) {
if (!empty($_GET["maxdate"])) {
if (1==1) {$maxdate = $_GET["maxdate"]; $and .= "AND `date`<='".$_GET["maxdate"]."' ";$get .= "&maxdate=".$_GET["maxdate"];}}}
}
echo "<div style=\"width:100%; background-color:rgba(54,143,219,0.1);\">
<form method=\"get\" action=\"\">
<table class=\"table_none\"><tr><td><p class=\"placeholder\">Розділ</p>
<select style=\"width:155px;\">
 <option selected=\"selected\" value=\"0\">Всі розділи</option>
<option value=\"1\">Статті</option>
</select>
<p class=\"placeholder\">Логін коментатора</p>
<input type=\"text\" name=\"author\" value=\"".$author."\"/></td><td width=\"50px\"></td><td>
<p class=\"placeholder\">Обрати коментарі, що були отримані після:</p>
<input type=\"date\" name=\"mindate\"  value=\"".$mindate."\"/>
<p class=\"placeholder\">Обрати коментарі, що були отримані до:</p>
<input type=\"date\" name=\"maxdate\"  value=\"".$maxdate."\"/></td></tr></table>
<input type=\"submit\" style=\"margin-left:5px; width:200px;\" class=\"button\" value=\"Фільтрувати\" name=\"m_btn\" />

<input type=\"reset\" style=\"margin-left:5px;\" class=\"button\" value=\"    Очистити фільтр     \" name=\"name123\" onclick=\"reset_mess()\"/>

<input type=\"reset\" style=\"margin-left:5px;\" class=\"button\" value=\"    Очистити корзину     \" name=\"name123\" onclick=\"clear_comment()\"/>
</form>
</div>";
$result67 = mysql_query("SELECT `id` FROM `comments` WHERE 1 ".$and." ORDER BY `id` DESC");
$num = setting('nav')*2;
@$page = $_GET['page'];
$posts = mysql_num_rows($result67);
$total = (($posts - 1) / $num) + 1;
 $total =  intval($total);
 $page = intval($page);
if(empty($page) or $page <= 0) {$page = 1;}
  if($page > $total) $page = $total;
  $start = $page * $num - $num;	
if ($posts>0){
$result67 = mysql_query("SELECT * FROM `comments` WHERE 1 ".$and." ORDER BY `id` DESC LIMIT $start, $num");
$myrow67 = mysql_fetch_array ($result67);
$stul = 2;
if ($page != 1) $pervpage = '<a class="hor_menu" style="color:#000;"  href=admin_comments.php?page=1'.$get.'>«</a> | 
<a class="hor_menu" style="color:#000;"  href=admin_comments.php?page='. ($page - 1) .$get.'><</a> | ';
if ($page != $total) $nextpage = ' | <a class="hor_menu" style="color:#000;"  href=admin_comments.php?page='. ($page + 1) .$get.'>></a> |
 <a class="hor_menu" style="color:#000;"  href=admin_comments.php?page=' .$total.$get. '>»</a>';
if($page - 5 > 0) $page5left = ' <a class="hor_menu" style="color:#000;" href=admin_comments.php?page='. ($page - 5) .$get.'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a class="hor_menu" style="color:#000;" href=admin_comments.php?page='. ($page - 4) .$get.'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a class="hor_menu" style="color:#000;" href=admin_comments.php?page='. ($page - 3) .$get.'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a class="hor_menu" style="color:#000;" href=admin_comments.php?page='. ($page - 2) .$get.'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = ' <a class="hor_menu" style="color:#000;" href=admin_comments.php?page='. ($page - 1) .$get.'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a class="hor_menu" style="color:#000;" href=admin_comments.php?page='. ($page + 5) .$get.'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a class="hor_menu" style="color:#000;" href=admin_comments.php?page='. ($page + 4) .$get.'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a class="hor_menu" style="color:#000;" href=admin_comments.php?page='. ($page + 3) .$get.'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a class="hor_menu" style="color:#000;" href=admin_comments.php?page='. ($page + 2) .$get.'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a class="hor_menu" style="color:#000;" href=admin_comments.php?page='. ($page + 1) .$get.'>'. ($page + 1) .'</a>';

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav color1\" style=\"float:right;\">";
echo '<p style="margin-top:0;margin-bottom:5px;padding-right:15px;">'.$pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'</p>';
echo "</div>";
}
echo "<table class='table_m' cellspacing='0'style='width:97%;'><tr  style=\"font-weight:bold;\">
<th class='table".($stul)."'>
Розділ
</th>
<th class='table".($stul)."' >
Коментар
</th>
<th class='table".($stul)."' >
Дата
</th>
<th class='table".($stul)."' >
ІР
</th>
<th class='table".($stul)."'>
Логін
</th>
<th class='table".($stul)."' >
Стаття
</th>
<th class='table".($stul+2)."' >

</th>
</tr>";
$stul = 1;
if (mysql_num_rows($result67)>0) {
do {
$rozdil = "";
if ($myrow67["article"]>0) {$rozdil = "Статті";}
if ($myrow67["news"]>0) {$rozdil = "Новини";}
/*!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!WARNING!!!!!!!!!!!".$myrow67["article"]."*/
if ($myrow67["hide"]==1) {$var1 = "<img alt=\"Відновити\" title=\"Відновити\" style=\"cursor:pointer;\" src=\"img/icon/basket.png\" onclick=\"redel_comment_admin(".$myrow67["id"].")\" />";} else {$var1 = "<img alt=\"\" title=\"\" src=\"img/icon/null.png\"/>";}
echo "<tr id=\"d".$myrow67["id"]."\">
<td class='table".($stul)."'>
".$rozdil."
</td>
<td class='table".($stul)."' >
".$myrow67["text"]."
</td>
<td class='table".($stul)."' >
".$myrow67["date"]."
</td>
<td class='table".($stul)."' >
".$myrow67["ip"]."
</td>
<td class='table".($stul)."'>
".$myrow67["login"]."
</td>
<td class='table".($stul)."' style=\"text-align:center; width:10px;\">
<a target=\"_blank\" href=\"view_a.php?id=".$myrow67["article"]."\"><img title=\"\" alt=\"\" src=\"img/icon/earth.png\" /></a>
</td>
<td class='table".($stul+2)."' style=\"text-align:center; width:35px;\" id=\"sr".$myrow67["id"]."\">
<span id=\"bs".$myrow67["id"]."\">".$var1."</span> <!--<img alt=\"Редагувати\" title=\"Редагувати\" style=\"cursor:pointer;\" src=\"img/icon/red.png\" onclick=\"comment_admin_edit_ask(".$myrow67["id"].")\"/> --><img alt=\"Видалити\" title=\"Видалити\" style=\"cursor:pointer;\" src=\"img/icon/del.png\" onclick=\"del_comment_admin(".$myrow67["id"].")\"/><span class=\"hidden\" id=\"c".$myrow67["id"]."\"></span><span class=\"hidden\" id=\"t".$myrow67["id"]."\"></span>
</td>
</tr>";
if ($stul == 2) {$stul = 1;}
}
while ($myrow67 = mysql_fetch_array ($result67));
echo "</table>";

} else {echo "<p class='view_title'>"."Немає сторінок"."</p>";}
}else {echo "<p class='view_title'>"."Записи вітсутні"."</p>";}} else { echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>"; }} else {echo "<p class='view_title'>".word(62)."</p>";}

?>
