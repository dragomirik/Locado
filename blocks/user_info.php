<?php hide_module();
if (is_set()) {
if (!isset($_GET['user'])) {$user = 2;} ELSE {
$user = $_GET['user'];}
/*security*/
if (!preg_match("|^[\d]+$|",$user)){
exit("<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head><p>Помилка! Ви звернулися не за адресою!</p>");
}
/*security end*/
if (mysql_num_rows(mysql_query("SELECT `id` FROM `users` WHERE `id`='$user'"))!=0) {$user = 2;
$result68 = mysql_query ("SELECT * FROM `users` WHERE `id`='$user'");
$myrow68 = mysql_fetch_array($result68);
$log23 = $myrow68['login'];
	$result787 = mysql_fetch_array(mysql_query("SELECT `group` FROM `users` WHERE `login`='$log23'"));	
$result_up = mysql_fetch_array(mysql_query("SELECT `name` FROM `user_groups` WHERE `id`='".$result787["group"]."'"));
$group = $result_up['name'];
if ($myrow68["sex"]==1) {@$sex = "чоловіча";}
if ($myrow68["sex"]==0) {@$sex = "жіноча";}
$admin="";
if (user("u14")){
$admin = "
<tr>
<td>
День народження: 
</td>
<td><b>".$myrow68['birth_date']."</b>
</td>
</tr>
<tr>
<td>
E-mail: 
</td>
<td><b>".$myrow68['email']."</b>
</td>
</tr>";
}
printf("<p class='view_title'>%s</p> 
<center><table align='center' class=\"table_none\">
<tr>
<td></td><td>
<form align='right' method='post' action='mailto.php'>
<input type='hidden' value='%s' name='whomp'>
<input type='submit'  style='width:200px;'
 class='button' value='Надіслати листа' name='submit_user_btn'>
</form></td></tr>
<tr>
<td>
Логін: 
</td>
<td><b>%s</b>
</td>

</tr>
<tr>
<td>
Група: 
</td>
<td><b>%s</b>
</td>
</tr>
<tr>
<td>
Дата реєстрації: &nbsp;&nbsp;&nbsp;
</td>
<td><b>%s</b>
</td>
</tr>
<tr>
<td>
Повне ім'я: &nbsp;&nbsp;&nbsp;
</td>
<td><b>%s</b>
</td>
</tr>
<tr>
<td>
Місто: &nbsp;&nbsp;&nbsp;
</td>
<td><b>%s</b>
</td>
</tr>
<tr>
<td>
Стать: &nbsp;&nbsp;&nbsp;
</td>
<td><b>%s</b>
</td>
</tr>".$admin."
</table></center>",$myrow68['login'],$myrow68['login'],$myrow68['login'], $group,$myrow68['reg_date'],$myrow68['fullname'],$myrow68['town'],$sex);} else {echo "<p class='view_title'>"."Користувач не існує!"."</p>";} } else {echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>";}
 ?>
