<?php hide_module();
if (!isset($_POST['press']))
{
echo "<center>
<form method=\"post\" align=\"center\">
<fieldset class=\"inputs\">
   <!--[if IE]>
  ".word(37).":<br>
<![endif]-->
 <input id=\"login\" type=\"text\" name=\"login\"  placeholder=\"".word(37)."\" required><br>
   <!--[if IE]>
  ".word(38).":<br>
<![endif]-->
  <input id=\"password\" type=\"password\" name=\"pass\" placeholder=\"".word(38)."\" required><br>
   <!--[if IE]>
  ".word(39).":<br>
<![endif]-->
  <input id=\"password\" type=\"password\" name=\"pass_repeat\" placeholder=\"".word(39)."\" required><br>
   <!--[if IE]>
  ".word(40).":<br>
<![endif]-->
  <input type=\"email\" name=\"email\" placeholder=\"".word(40)."\" required><br>
  
   <!--[if IE]>
  ".word(41).":<br>
<![endif]-->
  <input type=\"text\" name=\"fullname\" placeholder=\"".word(41)."\" required><br>
   <!--[if IE]>
  ".word(42).":<br>
<![endif]-->
  <input type=\"text\" name=\"town\"  placeholder=\"".word(42)."\" required><br>
   <!--[if IE]>
  ".word(43).":<br>
<![endif]-->
 <input type=\"date\" name=\"date\" min=\"1900-01-01\" max=\"2145-01-01\" name=\"birth_date\"
  required><br>

   <!--[if IE]>
  ".word(44).":<br>
<![endif]-->
  <select style=\"width:214px;\" name=\"sex\" class=\"inputs\" required>
    <option value=\"t1\" selected >".word(45)."</option>
    <option value=\"t2\">".word(46)."</option>
</select><br>
  </fieldset>
 <input class=\"button\" name=\"press\" style=\"width:200px;\" type=\"submit\" value=\"".word(47)."\">

  </form>
</center>";
} else {
$pass=$_POST['pass'];
$pass = filt($pass);
$pass_repeat=$_POST['pass_repeat'];
$pass_repeat = filt($pass_repeat);
$new_login=$_POST['login'];
$new_login = filt($new_login);
$email=$_POST['email'];
$email = filt($email);
$fullname=$_POST['fullname'];
$fullname = filt($fullname);
$town=$_POST['town'];
$town = filt($town);
$date=$_POST['date'];
$date = filt($date);
if ($_POST['sex']=="t1") {$sex = 1;}
if ($_POST['sex']=="t2") {$sex = 0;}
//echo $date;
if (strlen($date)==0 or strlen($pass)==0 or strlen($pass_repeat)==0 
or strlen($new_login)==0 or strlen($email)==0 or strlen($fullname)==0 or strlen($town)==0 or !preg_code($new_login) or !preg_code($pass)){
echo "<p class='false'>".word(48)."</p>";
} else 
{
if ($pass_repeat!=$pass){
echo "<p class='false'>".word(49)."</p>";
} else 
{
include("blocks/db.php");
$result18=mysql_query("SELECT * FROM `users` WHERE `login`='".$new_login."'");
$n=mysql_num_rows($result18);
if($n==0)
{
$today = date("Y-m-d");
$pass = mask($pass);
$insert1 = mysql_query("INSERT INTO `users` (`login` , `pass` , `town`, `birth_date`,`fullname`,`email`,`sex`,`rights`,`reg_date`) 
VALUES ('$new_login' , '$pass' , '$town','$date','$fullname','$email', '$sex', '1','$today')") or die (mysql_error());
echo " <p class=\"true\">".word(50)."</p>";
}else	
						{
						$log=$new_login;
						echo"<p class=\"false\">".word(51)."$log".word(52)."</p>
						<p style='cursor:pointer;' onclick='javascript:history.back();'><strong>".word(53)."</strong></p>";
						}
};
}}/*
if (isset($_POST["roshen"])) {
$report = "";
if (isset($_POST["login"])) {$login = $_POST["login"];
$login = htmlspecialchars($login);
$login = stripslashes($login);}
if (isset($_POST["pass"])) {$pass = $_POST["pass"];
$pass = htmlspecialchars($pass);
$pass = stripslashes($pass);}
if (isset($_POST["mail"])) {$mail = $_POST["mail"];
$mail = htmlspecialchars($mail);
$mail = stripslashes($mail);}
if (strlen($pass)<4) {$report = "<p class=\"false\">Пароль занадто короткий!</p>";}
if (strlen($pass)>40) {$report = "<p class=\"false\">Пароль занадто довгий!</p>";}
if (strlen($login)<4) {$report = "<p class=\"false\">Логін занадто короткий!</p>";}
if (strlen($login)>40) {$report = "<p class=\"false\">Логін занадто довгий!</p>";}
if (mysql_query("SELECT COUNT(*) FROM `users` WHERE `email`='$mail'")==0) {
$report = "<p class=\"false\">Користувач з таким e-mail існує!</p>";}
if (mysql_query("SELECT COUNT(*) FROM `users` WHERE `login`='$login'")==0) {
$report = "<p class=\"false\">Користувач з таким логіном існує!</p>";}
if ($report == "") {
$result = mysql_query("INSERT INTO  `concurs`.`users` (
`login` ,
`pass` ,
`email` ,
`rights`
)
VALUES (
'$login',  '$pass',  '$mail',  '1'
);");
if ($result==false){
$report = "<p class=\"false\">Помилка! Ви не можете зареєструватись на сайті!</p>";} else{
$report = "<p class=\"true\">Ви успішно зареєструвались!</p>";}}
echo $report;
} 
print <<<HERE
<p><form action="" method="POST">
<input type="login" style="width:300px;" placeholder="Введіть логін" name="login" id="lg" required><br>
<input type="password" style="width:300px;" placeholder="Введіть пароль" name="pass" id="lg" required><br>
<input type="email" style="width:300px;" placeholder="Введіть e-mail" name="mail" id="lg" required><br>
<input type="submit" style="width:200px;" name="roshen" value="
     Зареєструватись    
	 " required>
</form></p>
HERE;*/
?>