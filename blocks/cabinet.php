<?php hide_module(); 
include("blocks/db.php");
$echo ="";
if (!is_set($_COOKIE['obafgkm']))
{
//$echo = "Ви не увішли у свій аккаунт, тому не можете переглядати дану сторінку!";
}
else
{
$cookie = filt_form($_COOKIE['obafgkm']);
$result6 = mysql_query("SELECT * FROM `users` WHERE `login`='$cookie'");
$myrow6 = mysql_fetch_array($result6);
if ($myrow6["sex"]==1) {$sex = "чоловіча";}
if ($myrow6["sex"]==0) {$sex = "жіноча";}
$echom = "";
$echof = "";
if ($myrow6[sex]==1){ $echom = selected;}
if ($myrow6[sex]==0){ $echof = selected;}
if (isset($_POST['btn1']))
{
$new_pass = filt($_POST['new_pass']);
$new_pass_2 = filt($_POST['new_pass_2']);
$old_pass = filt($_POST['old_pass']);
if ($old_pass==demask($myrow6['pass']))
{
if ($new_pass==$new_pass_2){
if (preg_code($new_pass)) {
$new_pass = mask($new_pass);
$db_up_pass = mysql_query("UPDATE `users` SET `pass` = '$new_pass' WHERE `login` = '$cookie'");
if ($db_up_pass) {$echo = "Ваш пароль успішно змінено!";
/*header("Location:");*/} else
{$echo = "Помилка: пароль не змінено!";}} else {$echo = "Помилка: пароль може містити лише англійські літери та цифри!";}
}
else 
{$echo = "Ви невірно повторили пароль!";}}
else
{
$echo = "Пароль не змінено! Ви ввели невірний старий пароль!";
}
}
if (isset($_POST['btn2']))
{
$old_pass = filt($_POST['old_pass']);
$f_email = filt($_POST['f_email']);
if ($old_pass==demask($myrow6['pass']))
{
$db_up_pass = mysql_query("UPDATE `users` SET `email` = '$f_email' WHERE `login` = '$cookie'");
if ($db_up_pass) {$echo = "Ваш e-mail успішно змінено!"; 
/*header("Location:");*/} else
{$echo = "Помилка: e-mail не змінено!";}
} else {$echo = "Помилка: невірний пароль!";}

}
if (isset($_POST['btn3']))
{
if ($_POST['f_sex']=="t1") {$new_sex = 1;}
if ($_POST['f_sex']=="t2") {$new_sex = 0;}
$f_date = filt($_POST['f_date']);
$f_town = filt($_POST['f_town']);
$f_fullname = filt($_POST['f_fullname']);
$db_up_pass = mysql_query("UPDATE `users` SET `fullname` = '$f_fullname',`birth_date`='$f_date',`sex`='$new_sex',`town`='$f_town' WHERE `login` = '$cookie'");
if ($db_up_pass) {$echo = "Ваші персональні дані успішно змінено!"; 
/*
header("Location:");*/
} else
{$echo = "Помилка: дані не змінено!";}
}
}
echo "<p>", $echo, "</p>";
if (!isset($_COOKIE['obafgkm']))
{
echo "<p class='view_title'>ПОМИЛКА! Ви не увішли у свій аккаунт, тому не можете переглядати дану сторінку!</p>";
}
else
{ 
$cookie = filt_form($_COOKIE['obafgkm']);
$result6 = mysql_query("SELECT * FROM `users` WHERE `login`='$cookie'");
$myrow6 = mysql_fetch_array($result6);
if ($myrow6["sex"]==1) {$sex = "чоловіча";}
if ($myrow6["sex"]==0) {$sex = "жіноча";}
$echom = "";
$echof = "";
if ($myrow6[sex]==1){ $echom = selected;}
if ($myrow6[sex]==0){ $echof = selected;}

print <<<HERE
<div style='float:right;'>
[ <a href='users.php'>Список користувачів</a> ]
[ <a href='mail.php'>Список повідомлень</a> ]
[ <a href='mailto.php'>Написати повідомлення</a> ]
&nbsp;&nbsp;&nbsp;&nbsp;
</div><br>
<p class="view_title">Змінити пароль:</p>
<form method="post" style=\"text-align:center;\">
<table border="0" width="80%" class="table_none">
<tr> <td align="right" width="50%">Старий пароль:</td>	<td align="left"><fieldset class="inputs"><input type="password" name="old_pass" required></fieldset></td></tr>
<tr> <td align="right">Новий пароль:</td>	<td align="left"><fieldset class="inputs"><input type="password" name="new_pass" required></fieldset></td></tr>
<tr> <td align="right">Повторити:</td>		<td align="left"><fieldset class="inputs"><input type="password" name="new_pass_2" required></fieldset></td></tr>

</table>
<center><input type="submit" style="width:200px;" class="button" name="btn1" value="Змінити"></center>
</form>


<p class="view_title">Змінити e-mail:</p>
<form method="post" align="center">
<table border="0" width="80%" class="table_none">
<tr> <td align="right" width="50%">E-mail:</td>	<td align="left">
<fieldset class="inputs">
<input type="text" name="f_email" value="$myrow6[email]" required>

</fieldset></td></tr>
<tr> <td align="right">Пароль:</td>	<td align="left"><fieldset class="inputs"><input type="password" name="old_pass" required></fieldset></td></tr>

</table>
<center><input type="submit" style="width:200px;"  class="button" name="btn2" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Змінити&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" ></center>
</form>


<p class="view_title">Змінити персональні дані:</p>
<form method="post" align="center">
<table border=0 width="80%" class="table_none">
<tr> <td align="right" width="50%">Повне ім'я:</td>	<td align="left"><fieldset class="inputs">
<input type="text" name="f_fullname" value="$myrow6[fullname]" required></fieldset></td></tr>
<tr> <td align="right">Місто:</td>	<td align="left"><fieldset class="inputs"><input type="text" name="f_town" value="$myrow6[town]" required></fieldset></td></tr>
<tr> <td  align="right">День народження:</td>		<td align="left">
<fieldset class="inputs">
<input type="date" min="1900-01-01" max="2145-01-01" name="f_date"
   value="$myrow6[birth_date]" required>
</fieldset>
</td></tr>
<tr> <td align="right">Стать:</td>		<td align="left">
<fieldset  class="inputs" >
<select name="f_sex" class="inputs" required="required" style="width:214px;">
    <option value="t1"  $echom >чоловіча</option>
    <option value="t2"  $echof >жіноча</option>
</select>
</fieldset></td></tr>

</table>
<center><input type="submit"  style="width:200px;" class="button" name="btn3" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Змінити&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"></center>
</form>
HERE;
}?>