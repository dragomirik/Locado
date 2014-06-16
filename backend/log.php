<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
// Init JsHttpRequest and specify the encoding. It's important!
$JsHttpRequest = new JsHttpRequest("utf-8");
// Fetch request parameters.
$str = $_REQUEST['str'];
$str1 = $_REQUEST['str1'];
$l_out = stripslashes($str);
$l_out = htmlspecialchars($l_out);
$p_out = stripslashes($str1);
$p_out = htmlspecialchars($p_out);
include("../blocks/db.php");
include("../blocks/functions.php");
$upl1 = '';
$n = mysql_num_rows(mysql_query
("SELECT * FROM `users` WHERE `login`='$l_out' AND `pass`='$p_out'"));
if (($n==0)&&(isset($l_out) or isset($p_out))) 
{$upl1 = 'Ви невірно ввели логін або пароль!';}
	if ($n!=0) {if ($mem.checked=="checked") 
{
setcookie("obafgkm", $_POST['login_out'], time() + 3600);
$cookie111 = 3600;
} else 
{
setcookie("obafgkm", $_POST['login_out'], time() + 1005000);
$cookie111 = 1005000;
} /*
$URL=$_SERVER['HTTP_REFERER'];
header("Location:$URL");*/}
$upl = <<<HERE
<div class="h">Форма входу</div>

<div id="enter" class="alertf"></div>
	<form align="center" method="POST" 
	enctype="multipart/form-data" onsubmit="return false">
	<!--[if IE]>Логін:<![endif]-->
	<fieldset id="inputs" style="margin-bottom:0;">
<input id="username" type="login" name="login_out" placeholder="Логін"  
style="width:200px;" required><br><!--[if IE]>
  Пароль:<br>
<![endif]--> 
<input id="password" type="password" name="pass_out" 
placeholder="Пароль"  style="width:200px;" required>
</fieldset>
<table style="width:200px; margin-top:0;" align="center">
<tr>
<td style="vertical-align:top; text-align:right;">
<input type="submit" id="submit" class="button" 
style="width:90px;" value="Вхід" name="log_btn" onclick="login()"><br></td>
<td style="text-align:right; font-size:14px;">
<label style="font-size: 14px; color:#319D0D; margin-right:10px;">
  <input type="checkbox" name="mem" class="check"> Запам'ятати </label>
 </td>
</tr><tr>
<td colspan="2" style="text-align:right; font-size:14px;">
<a href="reg.php">Зареєструватися</a><br>
  <a href="remind.php">Нагадати пароль</a>
 </td>
</tr>
</table><p style="text-align:right; margin:0;padding:0;font-size:14px;">
	</p>
	</form> 
HERE;
if (isset($_COOKIE["obafgkm"])) {
$login = $_COOKIE["obafgkm"];
$result17 = mysql_query("SELECT * FROM `users` WHERE `login`='$login'");
$myrow17 = mysql_fetch_array($result17);
$rights = $myrow17["rights"];
$cookie = $_COOKIE['obafgkm'];
$result16 = mysql_query("SELECT * FROM `users` WHERE `login`='$cookie'");
$myrow16 = mysql_fetch_array($result16);
if ($myrow16["rights"]==1) { $titul = "Користувач";}
if ($myrow16["rights"]==3) { $titul = "Перевірений користувач";}
if ($myrow16["rights"]==8) { $titul = "Модератор";}
if ($myrow16["rights"]==10) { $titul = "Адміністратор";}
if ($myrow16["rights"]==11) {$titul = "Головний адміністратор";}
if ($myrow16["rights"]==0) {$titul = "Гість";}
if ($myrow16["rights"]==-1) {$titul = "Заблокований";}
if ($myrow16["sex"]==1) {$sex = "чоловіча";}
if ($myrow16["sex"]==0) {$sex = "жіноча";}
$result_count = mysql_query("SELECT * FROM `messages` WHERE `whom`='$cookie' AND `new`='1' AND `del`='0'");
if (mysql_num_rows($result_count)>0) {$mmk = "_new";} else {$mmk = "";}
$upl = "<div class=\"h\">".$myrow16["login"]."</div>
<p>Група: ".$titul.";<br>
Ім'я: ".$myrow16["fullname"].";<br>
Стать: ".$sex.";<br>
День народження: ".$myrow16["birth_date"].";<br>
Місто: ".$myrow16["town"].";<br>
IP: ".$_SERVER['REMOTE_ADDR']."; 
<div style='float:right;'>
<a href='cabinet.php'><img title='Мій кабінет' src='img/icon/cab.png'></a>
<a href='users.php'><img title='Список користувачів' src='img/icon/users.png'></a>
<a href='mail.php'><img title='Список повідомлень' src='img/icon/mail".$mmk.".png'></a>
</div><br>
<form align='center' method='post'>
<input type='submit' class='button' name='exit' 
value='   Вихід   ' style='float:center; width:150px;'></form>";
}
$GLOBALS['_RESULT'] = array(
      "str"   => $upl1,
      "obm"   => $upl,
    );
if ($_REQUEST['str'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
