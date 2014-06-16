<?php hide_module();

if (is_set()) {if (1==1) /*user('u14')*/ {
$result67 = mysql_query("SELECT * FROM `users` WHERE `id`!='1' ORDER BY `id` DESC");
$num = setting('nav');
@$page = $_GET['page'];
$posts = mysql_num_rows($result67);
$total = (($posts - 1) / $num) + 1;
 $total =  intval($total);
 $page = intval($page);
if(empty($page) or $page <= 0) {$page = 1;}
  if($page > $total) $page = $total;
  $start = $page * $num - $num;	
$result67 = mysql_query("SELECT * FROM `users` WHERE `id`!='1' ORDER BY `id` DESC LIMIT $start, $num");
$myrow67 = mysql_fetch_array ($result67);
$stul = 2;
if ($page != 1) $pervpage = '<a class="hor_menu" style="color:#000;"  href=users.php?page=1>«</a> | 
<a class="hor_menu" style="color:#000;"  href=users.php?page='. ($page - 1) .'><</a> | ';
if ($page != $total) $nextpage = ' | <a class="hor_menu" style="color:#000;"  href=users.php?page='. ($page + 1) .'>></a> |
 <a class="hor_menu" style="color:#000;"  href=users.php?page=' .$total. '>»</a>';
if($page - 5 > 0) $page5left = ' <a class="hor_menu" style="color:#000;" href=users.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a class="hor_menu" style="color:#000;" href=users.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a class="hor_menu" style="color:#000;" href=users.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a class="hor_menu" style="color:#000;" href=users.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = ' <a class="hor_menu" style="color:#000;" href=users.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a class="hor_menu" style="color:#000;" href=users.php?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a class="hor_menu" style="color:#000;" href=users.php?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a class="hor_menu" style="color:#000;" href=users.php?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a class="hor_menu" style="color:#000;" href=users.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a class="hor_menu" style="color:#000;" href=users.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav color1\" style=\"float:right;\">";
echo '<p style="margin-top:0;margin-bottom:5px;padding-right:15px;">'.$pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'</p>';
echo "</div>";
}
if (mysql_num_rows($result67)!=0){
$qwerty = "";
if (user("u14")) {$qwerty = "<th>E-mail</th>";}
$qwerty2 = "15";
if (user("u14")) {$qwerty2 = "54";}
echo "<center><p style=' padding:3px 3px 3px 3px; text-align:center; margin:center;'><table style='width:97%; margin:10px;' cellspacing='0' cellpadding='0'>",
"<tr>
<th>Логін</th>
<th>Повне ім'я</th>
<th>Група</th>".$qwerty."
<th style=\"width:".$qwerty2."px;\"></th></tr>";
do {
	$log23 = $myrow67['login'];
	$result787 = mysql_fetch_array(mysql_query("SELECT `group` FROM `users` WHERE `login`='$log23'"));	
$result_up = mysql_fetch_array(mysql_query("SELECT `name` FROM `user_groups` WHERE `id`='".$result787["group"]."'"));
$group = $result_up['name'];
if ($myrow67["sex"]==1) {$sex = "чоловіча";}
if ($myrow67["sex"]==0) {$sex = "жіноча";}
$qwerty = "";
if (user("u14")) {$qwerty = "<td>".$myrow67['email']."</td>";}
$qwerty2 = "";
if (user("u14")) {$qwerty2 = " <div onclick=\"window.location.href = 'edit_user.php?id=".$myrow67['id']."'\" title=\"Редагувати дані користувача\" class=\"icon\" style=\"background:url('img/icon/red.png');\" ></div> <div onclick=\"user_del_ask()\" title=\"Видалити користувача з бази даних\" class=\"icon\" style=\"background:url('img/icon/del.png');\" ></div>";}
printf("<tr>
<td><a href='user_info.php?user=%s'>%s</a></td>
<td>%s</td>
<td>%s</td>
".$qwerty."
<td><div onclick=\"window.location.href = 'mailto.php?user=%s'\" title=\"Написати листа\" class=\"icon\" style=\"background:url('img/icon/write.png');\" ></div>".$qwerty2."</td>
</tr>",$myrow67['id'],$myrow67['login'],$myrow67['fullname'],$group,$myrowwer['id']);
} while ($myrow67 = mysql_fetch_array ($result67));
echo "</table></p></center>";}}} else {echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>";}
?>