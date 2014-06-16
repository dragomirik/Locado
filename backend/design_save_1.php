<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$content1 = $_REQUEST['content1'];
$content1 = php_filt($content1);
$upl1 = "";
if (user("u14")){
$fl = fopen("../blocks/head.php","w");
if (fwrite($fl,$content1)) {$upl1 = "Дані успішно збережено";} else {$upl1 = "Помилка доступу: неможливо збереги дані";}
fclose($fl);
}
$GLOBALS['_RESULT'] = array(
      "str"   => $upl1,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>