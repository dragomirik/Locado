<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
// Init JsHttpRequest and specify the encoding. It's important!
$JsHttpRequest = new JsHttpRequest("utf-8");
// Fetch request parameters.
$id = $_REQUEST['id'];
include("../blocks/db.php");
include("../blocks/functions.php");
if (user('u8')) {
preg_filt($id);
$mresult = mysql_query("SELECT * FROM `articles` WHERE `id`='$id'");
if (mysql_num_rows($mresult)>0) {
$mdelete = mysql_query("DELETE FROM `articles` WHERE `id`='$id'");
$upl = "rgba(111, 111, 111, 0.6)";
$GLOBALS['_RESULT'] = array(
      "str"   => $upl,
    );}}
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
