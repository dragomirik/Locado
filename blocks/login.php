<?php
$l_out = $_POST['login_out'];
$p_out = $_POST['pass_out'];
$mem = $_POST['mem'];
$l_out = filt($l_out);
$p_out = filt($p_out);
$log_btn = $_POST['log_btn'];
$nb = mysql_fetch_array(mysql_query("SELECT `pass` FROM `users` WHERE `login`='$l_out'"));
if (demask($nb["pass"])==$p_out) {$n = 1;} else  {$n = 0;}
if (($n==0)&&(isset($_POST['login_out']) or isset($_POST['pass_out']))) {$flag01 = "sk"; $cookie111 = 0; }
if ($n==1) {
if ($mem.checked=="checked") 
{
$cookie111 = 3600;
} else 
{
$cookie111 = 1005000;
}
$time = time() + $cookie111;
 $control = generate(16,1);
setcookie("obafgkm", $control, $time);
setcookie("obafgkm", $_POST['login_out'], $time);
$query = mysql_query("UPDATE `users` SET `enter_id`='$control', `enter_time`='$time' WHERE `login`='$l_out'");
$URL=$_SERVER['HTTP_REFERER'];
header("Location:$URL");
}
if (isset($log_btn)){
include("blocks/db.php");
$URL=$_SERVER['HTTP_REFERER'];
$login111 =$_POST['login_out'];
$pass111 =mask($_POST['pass_out']);
$date111 = date("Y-m-d");
$time111 = date("H:i:s");
if ($cookie111 == 0) {$enter111 = 0;} else {$enter111 = 1;}
$ip111 = $_SERVER['REMOTE_ADDR'];
$resutl1 = mysql_query("INSERT INTO `enter_hist` (`login`,`pass`,`ip`,`enter`,`time`,`date`,`page`,`cookie`)
 VALUES ('$login111','$pass111','$ip111','$enter111','$time111','$date111','$URL','$cookie111')");}
if (is_set()) {
$login = filt($_COOKIE["obafgkm"]);
$result17 = mysql_query("SELECT * FROM `users` WHERE `login`='$login'");
$myrow17 = mysql_fetch_array($result17);
$rights = $myrow17["rights"];
 if  (($_SERVER['REQUEST_URI']=="/register.php") or ($_SERVER['REQUEST_URI']=="/remind.php")) {
header("Location:cabinet.php");}
}
if (isset($_POST['exit']))
{setcookie("obafgkm", $_POST['login_out'], 0);
$URL=$_SERVER['HTTP_REFERER'];
header("Location:$URL");}
?>