<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
// Init JsHttpRequest and specify the encoding. It's important!
$JsHttpRequest = new JsHttpRequest("utf-8");
// Fetch request parameters.
$id = $_REQUEST['id'];
include("../blocks/db.php");
include("../blocks/functions.php");
if (user('u6')) {
preg_filt($id);
$mresult = mysql_query("SELECT * FROM `articles` WHERE `id`='$id'");
$mmyrow = mysql_fetch_array($mresult);
if (mysql_num_rows($mresult)>0) {
if ($mmyrow["show"]==0) 
{$mupdate = mysql_query("UPDATE `articles` SET `show`='1' WHERE `id`='$id'"); 
$upl = "img/icon/hidet.png";
} else 
{$mupdate = mysql_query("UPDATE `articles` SET `show`='0' WHERE `id`='$id'");
$upl = "img/icon/hidef.png";
}}/*
$rand = mt_rand(0,1);
if ($rand==1){$upl = "img/icon/hidet.png";} else
{$upl = "img/icon/hidef.png";}*/
$GLOBALS['_RESULT'] = array(
      "str"   => $upl,
    );}
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
