<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
// Init JsHttpRequest and specify the encoding. It's important!
$JsHttpRequest = new JsHttpRequest("utf-8");
// Fetch request parameters.
$id = $_REQUEST['id'];
include("../blocks/db.php");
include("../blocks/functions.php");
$this_ar = mysql_query("SELECT * FROM `articles` WHERE `id`='$id'");
if (mysql_num_rows($this_ar) > 0){
$my_a = mysql_fetch_array($this_ar);}//remote array of this article
$symb = count_chars($my_a["like_ip"], 0);
$tit = $symb[46]/3;//integer of IP that pressed plus
$symb = count_chars($my_a["dislike_ip"], 0);
$bit = $symb[46]/3;//integer of IP that pressed minus
$my_ip = $_SERVER['REMOTE_ADDR']; //remote user IP
$arr_ip1 = explode(" ", $my_a["like_ip"]);
$arr_ip2 = explode(" ", $my_a["dislike_ip"]);

if ((substr_count($my_a["like_ip"],$my_ip)>0)&&
(substr_count($my_a["dislike_ip"],$my_ip)==0))  {
$j1 = 0;
for ($i1 = 0;$i1<count($arr_ip1);$i1++) {
if ($my_ip!=$arr_ip1[$i1]) {$array_p[$j1] = $arr_ip1[$i1]; $j1++;}}
/*$array_p = array($arr_ip1, " ", $my_ip);*/
$new_ip = trim(implode(" ", $array_p));
$update = mysql_query ("UPDATE `articles` SET `like_ip`='$new_ip' WHERE `id`='$id'");
$upl = $tit-$bit-1;
} // if nearly press plus
if ((substr_count($my_a["dislike_ip"],$my_ip)>0)&&
(substr_count($my_a["like_ip"],$my_ip)==0))  {
for ($i1 = 0;$i1<count($arr_ip2);$i1++) {
if ($my_ip==$arr_ip2[$i1]) {$arr_ip2[$i1] = '';}}
$new_ip1 = trim(implode(" ", $arr_ip2));
$new_ip2 = $my_a["like_ip"]." ".$my_ip;
$update = mysql_query ("UPDATE `articles` SET `dislike_ip`='$new_ip1' WHERE `id`='$id'");
$update = mysql_query ("UPDATE `articles` SET `like_ip`='$new_ip2' WHERE `id`='$id'");
$upl = $tit-$bit+2;
} // if nearly press minus
if ((substr_count($my_a["dislike_ip"],$my_ip)==0)&&
(substr_count($my_a["like_ip"],$my_ip)==0))  {
$new_ip = $my_a["like_ip"]." ".$my_ip;
$update = mysql_query ("UPDATE `articles` SET `like_ip`='$new_ip' WHERE `id`='$id'");
$upl = $tit-$bit+1;
} // if nearly press no button
//update table in DB not here
$upl = word(70).": ".$upl;
$GLOBALS['_RESULT'] = array(
      "str"   => $upl,
    );
if ($_REQUEST['str'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
