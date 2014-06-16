<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$title =   filt_form($_REQUEST['title']);
$meta_d = filt_form($_REQUEST['meta_d']);
$meta_k = filt_form($_REQUEST['meta_k']);
$desk =  filt_f($_REQUEST['desk']);
$text =  filt_f($_REQUEST['text']);
$sourse = filt_form($_REQUEST['sourse']);

$an1 = filt_form($_REQUEST['an_1']);
$a1 = filt_form($_REQUEST['a_1']);

$an2 = filt_form($_REQUEST['an_2']);
$a2 = filt_form($_REQUEST['a_2']);

$an3 = filt_form($_REQUEST['an_3']);
$a3 = filt_form($_REQUEST['a_3']);

$an4 = filt_form($_REQUEST['an_4']);
$a4 = filt_form($_REQUEST['a_4']);

$an5 = filt_form($_REQUEST['an_5']);
$a5 = filt_form($_REQUEST['a_5']);
$spec =  $_REQUEST['spec'];
preg_filt($spec);
$upl1 = "<img src=\"img/navh.png\" onload=\"bool_283()\">";
$upl2 = "";
if (user("u9")){
if (strlen($title)<6) {$upl2 = word(72);} else {
if (strlen($title)>255) {$upl2 = word(73);}}
if (strlen($meta_d)>255) {$upl2 = word(74);}
if (strlen($meta_k)>255) {$upl2 = word(75);}
if (strlen($desk)<0) {$upl2 = word(76);} else {
if (strlen($desk)>50000) {$upl2 = word(77);}}
if (strlen($text)<0) {$upl2 = word(78);} else {
if (strlen($text)>6553000) {$upl2 = word(79);}}
$date = date("Y-m-d H:i:s");
$name = filt_form($_COOKIE["obafgkm"]);
if (user("u21")){
if (user("u7")) {$show = 1;} else {$show = 0; $text = filt_form($text);}
if ($upl2 == "") {
$result = mysql_query("INSERT INTO  `articles` (
`id` ,`title` ,`date` ,`meta_d` ,`meta_k` ,`author` ,`views` ,`show` ,`desk` ,`text`,`cat`,`sourse`,`a1`,`a2`, `a3`,`a4`,`a5`,`an1`,`an2`, `an3`, `an4`,`an5`)
VALUES (NULL ,  '$title',  '$date',  '$meta_d',  '$meta_k',  '$name',  '0',  '$show', '$desk', '$text', '$spec','$sourse','$a1','$a2', '$a3', '$a4','$a5','$an1','$an2', '$an3', '$an4','$an5');");
if ($result===false){
$upl2 = word(91);} else{
if (user("u7")) { 
$query = mysql_query("SELECT `id` FROM `articles` ORDER BY `articles`.`id` DESC LIMIT 0, 1");
$idd = mysql_fetch_array($query);
$upl2 = word(92)." (<a href=\"view_a.php?id=".$idd['id']."\" target=\"_blank\">".$title."</a>)";}
else { $upl2 = word(93);}}
}}} else {$upl2 = "";}
$GLOBALS['_RESULT'] = array(
      "str1"   => $upl1,
      "str2"   => $upl2,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
