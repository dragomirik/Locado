<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$title = ($_REQUEST['title']);
$meta_d = ($_REQUEST['meta_d']);
$meta_k = ($_REQUEST['meta_k']);
$desk = ($_REQUEST['desk']);
$text = ($_REQUEST['text']);
$cub = $_REQUEST['cub'];
$upl1 = $_REQUEST['upl1'];
$upl2 = $_REQUEST['upl2'];
$upl3 = $_REQUEST['upl3'];
$upl4 = $_REQUEST['upl4'];
$upl5 = $_REQUEST['upl5'];
if (($cub!="2")&&($cub!="3")&&($cub!="4")&&($cub!="5"))
 {if (strlen($title)<6) {$upl1 = "<br>".word(72);} else {
if (strlen($title)>255) {$upl1 = "<br>".word(73);} else {$upl1 = "";}}}
if (($cub!="1")&&($cub!="3")&&($cub!="4")&&($cub!="5"))
 {//if (str_len($meta_d)<4) {$upl2 = word(74);}
if (strlen($meta_d)>255) {$upl2 = "<br>".word(74);} else {$upl2 = "";}}
if (($cub!="2")&&($cub!="1")&&($cub!="4")&&($cub!="5"))
 {//if (str_len($meta_k)<4) {$upl3 = word(76);}
if (strlen($meta_k)>255) {$upl3 = "<br>".word(75);} else {$upl3 = "";}}
if (($cub!="2")&&($cub!="3")&&($cub!="1")&&($cub!="5"))
 {if (strlen($desk)<50) {$upl4 = "<br>".word(76);} else {
if (strlen($desk)>5000) {$upl4 = "<br>".word(77);} else {$upl4 = "";}}}
if (($cub!="2")&&($cub!="3")&&($cub!="4")&&($cub!="1"))
 {if (strlen($text)<50) {$upl5 = "<br>".word(78);} else {
if (strlen($text)>65530) {$upl5 = "<br>".word(79);} else {$upl5 = "";}}}
$GLOBALS['_RESULT'] = array(
      "str1"   => $upl1,
      "str2"   => $upl2,
      "str3"   => $upl3,
      "str4"   => $upl4,
      "str5"   => $upl5,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();}
?>
