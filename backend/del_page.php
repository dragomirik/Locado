<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$id =   $_REQUEST['id'];
preg_filt($id);

$upl1 = "#";
$upl2 = "";

$back = mysql_query("SELECT `url` FROM `settings` WHERE `id`='$id' AND `module`='0'");
if (user("u6")&&mysql_num_rows($back)){
$mm_book = mysql_fetch_array($back);
$query = mysql_query("DELETE FROM `settings` WHERE `id`='$id'");
if (!$query) {$upl2 = "Неможливо видалити сторінку"; $upl1 = "#php_report"; } else {
if (unlink("../".$mm_book["url"])===false) {$upl2 = "Неможливо видалити сторінку"; $upl1 = "#php_report";}
}
} else {$upl2 = "Ви не маєте права редагувати сторінки";}
$GLOBALS['_RESULT'] = array(
      "str1"   => $upl1,
      "str2"   => $upl2,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
