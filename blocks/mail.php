<?php hide_module();
if (isset($_POST["delete_btn"])) { $delete1 = filt_form($_POST["delete5"]);
$update = mysql_query("UPDATE `messages` SET `del`='1' WHERE `id`='$delete1'");}
if (isset($_COOKIE['obafgkm'])) {
$loggin = filt($_COOKIE['obafgkm']);
if (isset($_GET["idf"])) { 
$idf = $_GET["idf"];
preg_filt($idf);
if (mysql_query("SELECT COUNT(*) FROM `messages` WHERE `whom`='$loggin' AND `del`='0' AND `id`='$idf'")==0) {
echo " <p class='view_title'>".word(63)."</p>";
}
else {
$result67 = mysql_query("SELECT * FROM `messages` WHERE `whom`='$loggin' AND `del`='0' AND `id`='$idf'");
$myrow67 = mysql_fetch_array ($result67);
$myrowwer = mysql_fetch_array (mysql_query("SELECT `id` FROM `users` WHERE `login`='$loggin'"));
Printf("<br><table class=\"table_none\" style=\"margin-left:10px; margin-bottom:10px;\"> <tr><td width='200px' class='admin_color'> Від кого: </td> <td> <b><a href='user_info.php?user=%s'>".$myrow67['from']."</a></b></td> </tr>
<tr><td width='200px' class='admin_color'> ".word(64).": </td> <td>".$myrow67['time']."</td> </tr>
<tr><td width='200px' class='admin_color'> ".word(65).": </td> <td> ".$myrow67['title']."</td> </tr>
<tr><td width='200px' class='admin_color'> ".word(66).": </td> <td> ".$myrow67['mail']."</td> </tr> 
<tr><td width='200px' class='admin_color'>  </td> <td> 
<u style='float:right; cursor:pointer;'> <b> <a href='/mail.php'>".word(53)."</a> </b></u>
</td> </tr> </table>",$myrowwer['id']);
$update = mysql_query("UPDATE `messages` SET `new`='0' WHERE `id`='$idf'");
}
} else {
$result67 = mysql_query("SELECT * FROM `messages` WHERE `whom`='$loggin' AND `del`='0'");
$num = setting('nav');
@$page = $_GET['page'];
$posts = mysql_num_rows($result67);
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
$start = $page * $num - $num;	
$result67 = mysql_query("SELECT * FROM `messages` WHERE `whom`='$loggin' AND `del`='0' ORDER BY `id` DESC LIMIT $start, $num");
$myrow67 = mysql_fetch_array ($result67);
$stul = 2;




if ($page != 1) $pervpage = '<a class="hor_menu" style="color:#000;"  href=mail.php?page=1>«</a> | 
<a class="hor_menu" style="color:#000;"  href=mail.php?page='. ($page - 1) .'><</a> | ';
if ($page != $total) $nextpage = ' | <a class="hor_menu" style="color:#000;"  href=mail.php?page='. ($page + 1) .'>></a> |
 <a class="hor_menu" style="color:#000;"  href=mail.php?page=' .$total. '>»</a>';
if($page - 5 > 0) $page5left = ' <a class="hor_menu" style="color:#000;" href=mail.php?page='. ($page - 5) .'>'. ($page - 5) .'</a> | ';
if($page - 4 > 0) $page4left = ' <a class="hor_menu" style="color:#000;" href=mail.php?page='. ($page - 4) .'>'. ($page - 4) .'</a> | ';
if($page - 3 > 0) $page3left = ' <a class="hor_menu" style="color:#000;" href=mail.php?page='. ($page - 3) .'>'. ($page - 3) .'</a> | ';
if($page - 2 > 0) $page2left = ' <a class="hor_menu" style="color:#000;" href=mail.php?page='. ($page - 2) .'>'. ($page - 2) .'</a> | ';
if($page - 1 > 0) $page1left = ' <a class="hor_menu" style="color:#000;" href=mail.php?page='. ($page - 1) .'>'. ($page - 1) .'</a> | ';

if($page + 5 <= $total) $page5right = ' | <a class="hor_menu" style="color:#000;" href=mail.php?page='. ($page + 5) .'>'. ($page + 5) .'</a>';
if($page + 4 <= $total) $page4right = ' | <a class="hor_menu" style="color:#000;" href=mail.php?page='. ($page + 4) .'>'. ($page + 4) .'</a>';
if($page + 3 <= $total) $page3right = ' | <a class="hor_menu" style="color:#000;" href=mail.php?page='. ($page + 3) .'>'. ($page + 3) .'</a>';
if($page + 2 <= $total) $page2right = ' | <a class="hor_menu" style="color:#000;" href=mail.php?page='. ($page + 2) .'>'. ($page + 2) .'</a>';
if($page + 1 <= $total) $page1right = ' | <a class="hor_menu" style="color:#000;" href=mail.php?page='. ($page + 1) .'>'. ($page + 1) .'</a>';

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<div class=\"pstrnav color1\" style=\"float:right;\">";
echo '<p>'.$pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<b>'.$page.'</b>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'</p>';
echo "</div>";
}




echo "<table class='table_m' cellspacing='0'><tr >
<th class='table".($stul)."' style='=width:20px; vertical-align:middle;'>
</th>
<th class='table".($stul)."' width='50%'>
Назва листа
</th>
<th class='table".($stul)."' width='20%'>Користувач
</th>
<th class='table".($stul+2)."' >
Дата
</th>
</tr>";
$stul = 1;
if (mysql_num_rows($result67)>0) {
do {
if ($myrow67["new"]==1) {$stext="<b><a href='mail.php?idf=%s'>%s</a></b>";} else  {$stext="<a href='mail.php?idf=%s'>%s</a>";}
$myrowwer = mysql_fetch_array (mysql_query("SELECT `id` FROM `users` WHERE `login`='$loggin'"));
printf("<tr >
<td class='table".($stul)."' style='=width:20px; vertical-align:top;'>
<form method='post'>
<input type='submit' class='delete' value='' name='delete_btn'>
<input type='hidden' value='%s' name='delete5'>
</form>
</td>
<td class='table".($stul)."' width='50%s'>
".$stext."
</td>
<td class='table".($stul)."' width='20%s'>
<a href='user_info.php?user=%s'>%s</a>
</td>
<td class='table".($stul+2)."' >
%s
</td>
</tr>
",$myrow67["id"],'%',$myrow67["id"],$myrow67["title"],'%',$myrowwer['id'],$myrow67["from"],$myrow67["time"]);
if ($stul == 2) {$stul = 1;}
}
while ($myrow67 = mysql_fetch_array ($result67));
echo "</table>";

} else {echo "<p class='view_title'>".word(67)."</p>";}}
} else { echo "<p class='view_title'>".word(62)."</p>"; }

?>