<?php

function fileread($f,$filename) {
$len = filesize($filename);
return fread($f,$len);
}
function preg_echo($page = "0") {
$start_time = microtime(3);
include("blocks/db.php");
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\" xml:lang=\"".setting("lang")."\" lang=\"".setting("lang")."\">";
$f = fopen("blocks/head.php","r");
$head = explode("\$", fileread($f,"blocks/head.php"));
fclose($f);
$f = fopen("blocks/up.php","r");
$up = explode("\$", fileread($f,"blocks/up.php"));
fclose($f);
$f = fopen("blocks/down.php","r");
/*$down = str_replace("</body>", "", $down);*/
$down = explode("\$", fileread($f,"blocks/down.php"));
fclose($f);
$resulty = mysql_query("SELECT `word` FROM `preg` WHERE `right`='1'");
$i = 0;
$arr_pregy = mysql_fetch_array($resulty);
do {
$arr_preg[$i] = $arr_pregy["word"];
$i++;
}
while ($arr_pregy = mysql_fetch_array($resulty));
//print_r($arr_preg);
/***/
$thispage = $_SERVER['PHP_SELF'];
$l = strlen($thispage);
for ($i=$l;$thispage[$i]!="/";$i--);
$thispage = substr($thispage,$i+1,$l);
if ($page!="0") {$thispage = $page;}
if (isset($_GET['page']) and $thispage == 'index.php') {if (fname($_GET['page'])) {$thispage = $_GET['page'];}}
$result = mysql_query("SELECT * FROM `settings` WHERE `cpurl`='$thispage' OR `url`='$thispage'");
$my_pages = mysql_fetch_array($result);
$rights = 0;/***/
for ($i = 0; $i<count($head); $i++){
$str = "\$".$head[$i]."\$";
if (in_array($str,$arr_preg)) 
{
$result_preg = mysql_query("SELECT * FROM `preg` WHERE `word`='$str'");
$myrow_preg = mysql_fetch_array($result_preg);
$buba = $myrow_preg['file'];
include($buba);
} else {echo $head[$i];}
}
for ($i = 0; $i<sizeof($up); $i++){
$str = "\$".$up[$i]."\$";
if (in_array($str,$arr_preg)&&check_module($str)) 
{
$myrow_preg = mysql_fetch_array(mysql_query("SELECT `file` FROM `preg` WHERE `word`='$str'"));
include($myrow_preg['file']);
} else {echo $up[$i];}
}
$content = explode("\$", $my_pages["text"]);
for ($i = 0; $i<count($content); $i++){
$str = "\$".stripslashes($content[$i])."\$";
$l = 0;
if (strlen($str)<150) {
if (in_array($str,$arr_preg)&&check_module($str)) {$l=1;}
}
if ($l>0) 
{
$myrow_preg = mysql_fetch_array(mysql_query("SELECT `file` FROM `preg` WHERE `word`='$str'"));
include($myrow_preg['file']);
} else {echo $content[$i];}
}
for ($i = 0; $i<sizeof($down); $i++){
$str = "\$".$down[$i]."\$";
if (in_array($str,$arr_preg)&&check_module($str)) 
{
$myrow_preg = mysql_fetch_array(mysql_query("SELECT `file` FROM `preg` WHERE `word`='$str'"));
include($myrow_preg['file']);
} else {echo $down[$i];}
}
$end_time = microtime(3);
$time = $end_time-$start_time;
echo "<span class=\"microtime\">Витрачений час: <br />".$time."</span></body></html>";
$log = setting('logs');
mysql_close;
/*if ($logfile)
{
$start_time = microtime(1);*/
if ($log){
$logfile = 'log.txt';
	$handle = @fopen($logfile, 'a');
	if ($handle)
	{
		$ip =		$_SERVER['REMOTE_ADDR'];
		$host =		$_SERVER['HTTP_HOST'];
		$script =	$_SERVER['SCRIPT_NAME'];
		$method =	$_SERVER['REQUEST_METHOD'];
		$user =	$_SERVER['HTTP_USER_AGENT'];
		$date = 	date('Y.m.d H:i:s');
		
		@fwrite($handle, "$date $ip $method $host $user $script - $time\r\n");
		@fclose($handle);
	}}
/*$end_time = microtime(1);
echo $time = $end_time-$start_time;
} */
}

		function filt($word) {
		return stripslashes(htmlspecialchars($word));
		}
				
	function mask($password) {
	$ln = 62;
	$key = mt_rand(1,32);
	switch ($key){
	case 1: $ctrl = "Aw34KX8tJRSYZqrLDEIvH2klmnbxcdefyz01BC6sNOPQghijFGMVW7TUop5ua9";
	case 2: $ctrl = "Aw34KX8tJRSYZqrLDEIvH2klmnbcxdefyz01BC6sNOPQghijFGMVW7TUop5ua9"; case 3: $ctrl = "NVZMIpU3PsJoTyCuWBv87fS6tebExQ9KDwH0qgaX42lkF1zcnjYOLAGhrmid5R"; case 4: $ctrl = "cXulZDmInCj3i4aWFbvpkd0PAzKt5frU7EV29ySx1oYRhN6BMwJOg8LeqGQsTH"; case 5: $ctrl = "kmKa3V8CgyXJwZ57njNIRFcU91PzMY4huLrxGisvWBHT6qodQfDS0peOl2AbEt"; case 6: $ctrl = "IdW2hazvBCnTgZOArbq8LmGuwFVJosj9x73SfcMY54ypHkNX0EQDletRiPU61K"; case 7: $ctrl = "Fhgf8H5JsajeuIpB7vSwWD02yCt6rbZEzlKRokXVidUOx3LYm4TN9GP1MnqAcQ"; case 8: $ctrl = "UKm4krIeH3CqvsjZ1MpYgyGBSNJtW2LnE7VAhFflx85Qud6XRiTDzobw9aOcP0"; case 9: $ctrl = "N0EKMpHmqwtjiCYPLeruDJSzR7d9clXO5s4bThvfxG2Z138VFWoagUAkBIQyn6"; case 10: $ctrl = "80TAWnrpDhsYeOBglK4uCHocIzLaqdmUb2i9NG3yjx75E1SMtRVQZfkF6JvPwX"; case 11: $ctrl = "RndwKNOP0I7bLv9k3rBqmX145GhWgVsyJYzCZjp82fxeiAlDuTQHaFE6ocUtSM"; case 12: $ctrl = "h5zM2be06kjGa1KInATw9QvC8rcWifyBEmuYStsqFdxlHZR73gXpVP4UDLoOJN"; case 13: $ctrl = "PvtX6IGBNhqwbpKzUmWodyJiaxEOlFSHC9Ag15DeMr40uL7R8nTjYk2Vc3fZsQ"; case 14: $ctrl = "CuDhRAH8LcxGKBYplZgmtPi2zE45qoyfTe3W1r97JSswMI0kv6jQbdNUaOVXnF"; case 15: $ctrl = "Md1eQK5pbxY0TnuWoUj8wOCy2Z3fSVi7Dagl9Eh4kGJNmvFrcAqBXLszPR6tIH"; case 16: $ctrl = "2eQyICxSOlnXGMZ9rYDVubHzjm3o58ANFUvsiW7Lg46RfcPdBaTq1htKp0wJEk"; case 17: $ctrl = "7560Rw8xdsazjtWoPFCScTNUh1AqDE4Z9u3kHQiKY2grJeGnbIBvpmLOMlXfyV"; case 18: $ctrl = "V1BM2Dx6ZfnmvOlF3A0GUtki5duaqz8EjsLWe9yIR7r4bwXYChHTSoPKJgpNQc"; case 19: $ctrl = "Sqk8dVxrp5yHwesB3QlgAJa1vRLIDTn4Zz0uP2tWMCNXY6foGFOjUi9E7cmbhK"; case 20: $ctrl = "GC9DqxnFaYsMKEupfyeSRNWiZrwt5J3Ov264c7TVHPUghL81kXzBlQoIdbjm0A"; case 21: $ctrl = "UIQcaKxr1jzo9Z2Sg8Nmehd7tJMf436E0RiFYXVwHDvACpbG5yquPLWkOlnTBs"; case 22: $ctrl = "EtJTrpxw81lVi7ORc0LU6aNvPWfhgys45q3YGuFXbm2zk9dCMQBeSDIAHKZjno"; case 23: $ctrl = "6dOR9C3xAy8ZYWM0tGwsB7mh5kNHVXqopKgDfEJcenjvI2zSluFQUr1iPbTL4a"; case 24: $ctrl = "igVcXOhxmp9vLqC3YPDjfUrBM6eQuotRwEZs52Gz0yWKSn8ab1ANI74lTFdkHJ"; case 25: $ctrl = "Ms1tpLxvIFUcPklAgzn2QGJyDBXdfh9ajeRSi53rOuV7YHTZKm0ob46NCw8WqE"; case 26: $ctrl = "2HiWEjxpPAImDKTBCfGqSgZ4t6Yko35Ja8zX9Ov1clLr0nbMhsRw7VuQyFedNU"; case 27: $ctrl = "h4KTcPxz9CXmEZrRaFtJI8GS53nO2Vw7iuvQe6BDAl0NgsYHkM1jyfdbWUopLq"; case 28: $ctrl = "vCa3LWxf5jmbOD0QEqTGHsXIyAeZV8Sz4N1hiY97rn2JBwMogpkURd6KcPFlut"; case 29: $ctrl = "pZLAiMTxhNkG3tcV91zlODJqFU5Pa84SvHRBKf7s0dEwXyoWu2jbCe6grYmIQn"; case 30: $ctrl = "F9Khw6ExuUkNMdvJ42gaZGeIpq5lzi83P0LDVnXY7yWcTCfoBQjOSbHmAtR1sr"; case 31: $ctrl = "AFs9tH1xv4uUhpIQ8nMYWB2SiNok5wRrqdzafL0JbDgVKcO6l3jEyGeTZ7mCPX"; case 32: $ctrl = "aCYmcjBxf2pi7HGNWLAeIzOJ9nV3buP1rK4D8TRUtXS0ywgZodEFkslv5q6hQM";
	}
	$keyc = "vQWybtPeZA7NYDk0FTwfad48jLSHROcp6EzGqoMJClhmUBrIusX25Vig13Kn9";
	$mpass = $ctrl[mt_rand(0,$ln-1)];
	$mpass .= $ctrl[pos_c($ctrl,$password[0])];
	for ($i = 1; $i<=strlen($password); $i++) {
	$mpass .= $ctrl[pos_c($ctrl,$password[$i])];
	for ($j = 0; $j<=$i; $j++){
	$mpass .= $ctrl[mt_rand(0,$ln-1)];}}
	$k = mt_rand(5,strlen($password)*2);
	for ($j = 0; $j<=$k; $j++)
	{
	$mpass .= $ctrl[mt_rand(0,$ln-1)];
	}
	$mpass .= $keyc[$key];
	$mpass .= $ctrl[strlen($password)];
	$mpass .= $ctrl[mt_rand(0,$ln-1)];
	return $mpass;
	}
	
	function pos_c($ctrl1,$chr){
	for ($kkk = 0; $kkk <62; $kkk++){
	if ($chr==$ctrl1[$kkk]) {$mdb = $kkk;}
	}
	$mdb = $mdb - 4;
	if ($mdb<0) {$mdb = 62+$mdb;}
	return $mdb;
	}
	
	function pos_b($ctrl1,$chr){
	for ($kkk = 0; $kkk <62; $kkk++){
	if ($chr==$ctrl1[$kkk]) {$mdb = $kkk;}
	}
	$mdb = $mdb + 4;
	if ($mdb>61) {$mdb = $mdb-62;}
	return $mdb;
	}
	
	function pos_t($c1,$chr){
	for ($kkk = 0; $kkk <62; $kkk++){
	if ($chr==$c1[$kkk]) {$mdb = $kkk;}
	}
	return $mdb;
	}
	
function demask($mask) {
$n = strlen($mask);
	$keyc = "vQWybtPeZA7NYDk0FTwfad48jLSHROcp6EzGqoMJClhmxUBrIusX25Vig13Kn9";
$ln = 62;
$key = pos_t($keyc,$mask[$n-3]);
$ctrl = "101010101110110111111011011100101111101101011101111010010111010011110";
switch ($key){
	case 1: $ctrl = "Aw34KX8tJRSYZqrLDEIvH2klmnbxcdefyz01BC6sNOPQghijFGMVW7TUop5ua9";
	case 2: $ctrl = "Aw34KX8tJRSYZqrLDEIvH2klmnbcxdefyz01BC6sNOPQghijFGMVW7TUop5ua9"; case 3: $ctrl = "NVZMIpU3PsJoTyCuWBv87fS6tebExQ9KDwH0qgaX42lkF1zcnjYOLAGhrmid5R"; case 4: $ctrl = "cXulZDmInCj3i4aWFbvpkd0PAzKt5frU7EV29ySx1oYRhN6BMwJOg8LeqGQsTH"; case 5: $ctrl = "kmKa3V8CgyXJwZ57njNIRFcU91PzMY4huLrxGisvWBHT6qodQfDS0peOl2AbEt"; case 6: $ctrl = "IdW2hazvBCnTgZOArbq8LmGuwFVJosj9x73SfcMY54ypHkNX0EQDletRiPU61K"; case 7: $ctrl = "Fhgf8H5JsajeuIpB7vSwWD02yCt6rbZEzlKRokXVidUOx3LYm4TN9GP1MnqAcQ"; case 8: $ctrl = "UKm4krIeH3CqvsjZ1MpYgyGBSNJtW2LnE7VAhFflx85Qud6XRiTDzobw9aOcP0"; case 9: $ctrl = "N0EKMpHmqwtjiCYPLeruDJSzR7d9clXO5s4bThvfxG2Z138VFWoagUAkBIQyn6"; case 10: $ctrl = "80TAWnrpDhsYeOBglK4uCHocIzLaqdmUb2i9NG3yjx75E1SMtRVQZfkF6JvPwX"; case 11: $ctrl = "RndwKNOP0I7bLv9k3rBqmX145GhWgVsyJYzCZjp82fxeiAlDuTQHaFE6ocUtSM"; case 12: $ctrl = "h5zM2be06kjGa1KInATw9QvC8rcWifyBEmuYStsqFdxlHZR73gXpVP4UDLoOJN"; case 13: $ctrl = "PvtX6IGBNhqwbpKzUmWodyJiaxEOlFSHC9Ag15DeMr40uL7R8nTjYk2Vc3fZsQ"; case 14: $ctrl = "CuDhRAH8LcxGKBYplZgmtPi2zE45qoyfTe3W1r97JSswMI0kv6jQbdNUaOVXnF"; case 15: $ctrl = "Md1eQK5pbxY0TnuWoUj8wOCy2Z3fSVi7Dagl9Eh4kGJNmvFrcAqBXLszPR6tIH"; case 16: $ctrl = "2eQyICxSOlnXGMZ9rYDVubHzjm3o58ANFUvsiW7Lg46RfcPdBaTq1htKp0wJEk"; case 17: $ctrl = "7560Rw8xdsazjtWoPFCScTNUh1AqDE4Z9u3kHQiKY2grJeGnbIBvpmLOMlXfyV"; case 18: $ctrl = "V1BM2Dx6ZfnmvOlF3A0GUtki5duaqz8EjsLWe9yIR7r4bwXYChHTSoPKJgpNQc"; case 19: $ctrl = "Sqk8dVxrp5yHwesB3QlgAJa1vRLIDTn4Zz0uP2tWMCNXY6foGFOjUi9E7cmbhK"; case 20: $ctrl = "GC9DqxnFaYsMKEupfyeSRNWiZrwt5J3Ov264c7TVHPUghL81kXzBlQoIdbjm0A"; case 21: $ctrl = "UIQcaKxr1jzo9Z2Sg8Nmehd7tJMf436E0RiFYXVwHDvACpbG5yquPLWkOlnTBs"; case 22: $ctrl = "EtJTrpxw81lVi7ORc0LU6aNvPWfhgys45q3YGuFXbm2zk9dCMQBeSDIAHKZjno"; case 23: $ctrl = "6dOR9C3xAy8ZYWM0tGwsB7mh5kNHVXqopKgDfEJcenjvI2zSluFQUr1iPbTL4a"; case 24: $ctrl = "igVcXOhxmp9vLqC3YPDjfUrBM6eQuotRwEZs52Gz0yWKSn8ab1ANI74lTFdkHJ"; case 25: $ctrl = "Ms1tpLxvIFUcPklAgzn2QGJyDBXdfh9ajeRSi53rOuV7YHTZKm0ob46NCw8WqE"; case 26: $ctrl = "2HiWEjxpPAImDKTBCfGqSgZ4t6Yko35Ja8zX9Ov1clLr0nbMhsRw7VuQyFedNU"; case 27: $ctrl = "h4KTcPxz9CXmEZrRaFtJI8GS53nO2Vw7iuvQe6BDAl0NgsYHkM1jyfdbWUopLq"; case 28: $ctrl = "vCa3LWxf5jmbOD0QEqTGHsXIyAeZV8Sz4N1hiY97rn2JBwMogpkURd6KcPFlut"; case 29: $ctrl = "pZLAiMTxhNkG3tcV91zlODJqFU5Pa84SvHRBKf7s0dEwXyoWu2jbCe6grYmIQn"; case 30: $ctrl = "F9Khw6ExuUkNMdvJ42gaZGeIpq5lzi83P0LDVnXY7yWcTCfoBQjOSbHmAtR1sr"; case 31: $ctrl = "AFs9tH1xv4uUhpIQ8nMYWB2SiNok5wRrqdzafL0JbDgVKcO6l3jEyGeTZ7mCPX"; case 32: $ctrl = "aCYmcjBxf2pi7HGNWLAeIzOJ9nV3buP1rK4D8TRUtXS0ywgZodEFkslv5q6hQM";
	}
$plen = pos_t($ctrl,$mask[$n-2]);
$password = $ctrl[pos_b($ctrl,$mask[1])];
$j = 2;
for ($i = 1;$i<$plen;$i++){
$password .= $ctrl[pos_b($ctrl,$mask[$j])];
$j = $j+$i+2;
}
return $password;
}
	function cut($text,$m) {
	if ($m==0) {$m = setting("m_s");}
	if (length($text)<=$m) { return $text;} else{
	$arr = explode(" ", $text);
	$opp = 0;
	$txt = '';
	$space = '';
	do
	{
	$txt .= $space.$arr[$opp];
	$space = " ";
	$opp++;
	$count = strlen($txt);
	} while ($count<$m);
	return $txt."...";
	}
	}
	
	function length($str) {
	$len = strlen($str);
	$n = $len;
	for ($i = 0; $i<$n; $i++) {
	if (ord($str[$i])==208) {$len --;}
	}
	}

		function rank($arr){
		$symb = count_chars($arr["like_ip"], 0); 
		$tit = $symb[46]/3;
		$symb = count_chars($arr["dislike_ip"], 0); 
		$bit = $symb[46]/3;
		return $tit-$bit;
		}

function preg_filt($var){
if (!preg_match("|^[\d]+$|",$var)){
exit("<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head><p>".word(8)."</p>");}
}

function int1 ($var){
if (preg_match("|^[\d]+$|",$var)) {return true;} else {return false;}
}

function filename($str){
if (preg_match("|^[.A-Za-z0-9_-]+.php$|",$str)) {return true;} else {return false;}}

function fname($str){
if (preg_match("|^[.A-Za-z0-9_-]+$|",$str)) {return true;} else {return false;}}

function preg_code($var){
if (!preg_match("/^[a-zA-Z0-9]+$/",$var)){return false;} else {return true;}
}

function preg_mail($var){
if (preg_match("/[^(\w)|(\@)|(\.)|(\-)]/",$var)){return false;} else {return true;}
}

function preg_kiril($var){
if (preg_match("/[^(\w)|(\x7F-\xFF)|(\s)]/",$var)) {return false;} else {return true;}
}

function preg_date($var){
if (!preg_match("/[0-9]{4}-[0-9]{2}-[0-9]{2}/",$var)){return false;} else {return true;}
}

	function setting($label){
	$result_l = mysql_fetch_array(mysql_query("SELECT `".$label."` FROM `site` WHERE 1"));
	if ($result_l[$label]=='0'){return false;} else {if ($result_l[$label]=='1') {return true;} else {return $result_l[$label];}}
	}

function word($label){
$lan = "ua";
$result_k = mysql_fetch_array(mysql_query("SELECT `".$lan."` FROM `language` WHERE `id`='".$label."'"));
return filt($result_k[$lan]);
}

	function word_2($label){
	echo word($label);
	}

function r_user($label,$g_id){
$result_u = mysql_fetch_array(mysql_query("SELECT `".$label."` FROM `user_groups` WHERE `id`='".$g_id."'"));
if ($result_u[$label]=='0') {return false;} else {
if ($result_u[$label]=='1') {return true;} else {return $result_u[$label];}}
}

	function user($label){
	if (is_set()){
	$cookie = filt($_COOKIE['obafgkm']);
	$result = mysql_query("SELECT `group` FROM `users` WHERE `login`='$cookie'");
	$my_user = mysql_fetch_array($result);
	return r_user($label,$my_user['group']);
	} else
	{return r_user($label,1);}
	}

function check_module($label){
$result_e = mysql_fetch_array(mysql_query("SELECT `right` FROM `preg` WHERE `word`='".$label."' OR `file`='blocks/".$label."'"));
if ($result_e['right']=='0'){return false;} else {return true;}
}

	function hide_module(){
	if (!check_module(page_print())) {exit();}
	}

function my_page(){
$thispage = $_SERVER['PHP_SELF'];
$l = strlen($thispage);
for ($mi=$l;$thispage[$mi]!="/";$mi--);
$thispage = substr($thispage,$mi+1,$l);
$result = mysql_query("SELECT * FROM `settings` WHERE `url`='$thispage'");
$my_pages = mysql_fetch_array($result);
$rights = 0;}

	function page_print(){
	$thispage = $_SERVER['PHP_SELF'];
	$l = strlen($thispage);
	for ($i=$l;$thispage[$i]!="/";$i--);
	return $thispage = substr($thispage,$i+1,$l);}
	
function filt_form($word) {
$word = trim($word);
$word = htmlspecialchars($word);
$word = str_replace("#", "&#35;", $word);
$word = str_replace("'", "&#39;", $word);
$word = str_replace('$', "&#36;", $word);
$word = stripslashes(str_replace("%", "&#37;", $word));
return $word;
}
	
function filt_f($word) {
$word = trim($word);
$word = str_replace("#", "&#35;", $word);
$word = str_replace("'", "&#39;", $word);
$word = str_replace('$', "&#36;", $word);
$word = stripslashes(str_replace("%", "&#37;", $word));
return $word;
}	
function filt_a($word) {
$word = trim($word);
$word = str_replace("#", "&#35;", $word);
$word = str_replace("'", "&#39;", $word);
$word = stripslashes(str_replace("%", "&#37;", $word));
return $word;
}

	function generate($int, $type){
	if ((is_numeric($int)) && ($int > 0)  && (!is_null($int))  )
	{
	$word = '';
	if ($type == 1) {$char_array = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";}
	if ($type == 2) {$char_array = "abcdefghijklmnopqrstuvwxyz0123456789";}
	if ($type == 3) {$char_array = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";}
	if ($type == 4) {$char_array = "0123456789";}
	if ($type == 5) {$char_array = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";}
	if ($type == 6) {$char_array = "abcdefghijklmnopqrstuvwxyz";}
		for ($i = 0; $i<=$int; $i++){
		$rand_int = rand(0,(strlen($char_array)-1));
		$word .= $char_array[$rand_int];
		}
	return $word;
	}
	}

function ip(){
return $_SERVER['REMOTE_ADDR'];
}

/*function page(){
return $_SERVER['REMOTE_ADDR'];
}*/

function is_set(){
if (isset($_COOKIE['obafgkm'])) 
{return true;}
else {return false;}
}

function online () {
$ip = getenv("HTTP_X_FORWARDED_FOR");
if (empty($ip) || $ip=='unknown') { $ip=getenv("REMOTE_ADDR"); }
# уд. старые сессии
mysql_query ("DELETE FROM `online` WHERE UNIX_TIMESTAMP() - UNIX_TIMESTAMP(`time`) > 300") or die ("Can't delete old sess");

# проверка на присутстаие или занесение нового пользователя
$select = mysql_query ("SELECT `ip` FROM `online` WHERE `ip`='$ip'") or die ("Can't select duble");
$tmp = mysql_fetch_row ($select);
if ($ip == $tmp[0]) {
if (is_set()){$host = 1;} else {$host = 0;}
mysql_query ("UPDATE `online` SET `time`=NOW(),`host`='$host' WHERE `ip`='$ip'") or die ("Can't update");
} else {
if (is_set()){$host = 1;} else {$host = 0;}
mysql_query ("INSERT INTO `online` (`ip`,`time`,`host`) VALUES ('$ip',NOW(),'$host')") or die ("Can't insert");
}
# считывание результатов
$select = mysql_query ("SELECT COUNT(*) FROM `online` WHERE `host`!=1") or die ("Can't select result");
$tmp = mysql_fetch_row ($select);
$result = $tmp[0];
return $result;
}

function online_users(){
$select = mysql_query ("SELECT COUNT(*) FROM `online` WHERE `host`='1'") or die ("Can't select result");
$tmp = mysql_fetch_row ($select);
$result = $tmp[0];
return $result;
}

function site_name(){
return "http://".$_SERVER['HTTP_HOST'];
}

function sitename(){
return "http://".$_SERVER['HTTP_HOST']."/";
}

function php_filt($str){
$pattern = "/mysql_query/i";
$replacement = "mysql&#95;&#113;uery";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/mask/i";
$replacement = "&#109;ask";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/user/i";
$replacement = "use&#114;";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/fwrite/i";
$replacement = "fw&#114;ite";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/unlink/i";
$replacement = "unl&#105;nk";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/preg_echo/i";
$replacement = "p&#114;eg_echo";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/include/i";
$replacement = "&#105;nclude";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/chmod/i";
$replacement = "&#99;hmod";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/file/i";
$replacement = "f&#105;le";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/virtual/i";
$replacement = "v&#105;rtual";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/fpassthru/i";
$replacement = "fp&#97;ssthru";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/open/i";
$replacement = "&#111;pen";
$str = preg_replace($pattern, $replacement, $str);
$pattern = "/require/i";
$replacement = "req&#117;ire";
$str = preg_replace($pattern, $replacement, $str);
return $str;
}
?>