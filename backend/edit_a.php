<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$id =   $_REQUEST['id'];
preg_filt($id);
$title =   filt_form($_REQUEST['title']);
$meta_d = filt_form($_REQUEST['meta_d']);
$meta_k = filt_form($_REQUEST['meta_k']);
$author = filt_form($_REQUEST['author']);
$date = filt_form($_REQUEST['date']);
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
$views =  $_REQUEST['views'];
$upl1 = "<img src=\"img/navh.png\" onload=\"bool_283()\">";
$upl2 = "";
if (!int1($views)) {
$upl2 = word(140);
} 
else {
if (user("u6")){
if (strlen($title)<6) {$upl2 = word(72);} else {
if (strlen($title)>255) {$upl2 = word(73);}}
if (strlen($meta_d)>255) {$upl2 = word(74);}
if (strlen($meta_k)>255) {$upl2 = word(75);}
if (strlen($desk)<50) {$upl2 = word(76);} else {
if (strlen($desk)>5000) {$upl2 = word(77);}}
if (strlen($text)<50) {$upl2 = word(78);} else {
if (strlen($text)>6553000) {$upl2 = word(79);}}
if (is_set()){
$name = filt_form($_COOKIE["obafgkm"]);
if (user("u21")){
if (user("u7")) {$show = 1;} else {$show = 0; $text = filt_form($text);}
if ($upl2 == "") {
$re_date = date("Y-m-d");
$result = mysql_query("UPDATE `articles` SET `title`='$title', `date`='$date', `author`='$author', `views`='$views', `desk`='$desk', `text`='$text', `meta_k`='$meta_k', `meta_d`='$meta_d', `cat`='$spec', `lostmode`='$re_date', `sourse`='$sourse', `a1`='$a1', `a2`='$a2', `a3`='$a3', `a4`='$a4',`a5`='$a5', `an1`='$an1',`an2`='$an2', `an3`='$an3', `an4`='$an4', `an5`='$an5' WHERE `id`='$id'");
if ($result==false){
$upl2 = word(136);} else{
if (user("u7")) {
$upl2 = word(137)." (<a href=\"view_a.php?id=".$id."\" target=\"_blank\">".$title."</a>)";}
else { $upl2 = word(93);}}
}}} else {$upl2 = word(138);}} else  {$upl2 = word(139);}}
$GLOBALS['_RESULT'] = array(
      "str1"   => $upl1,
      "str2"   => $upl2,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
