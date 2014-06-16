<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$content3 = php_filt($_REQUEST['content3']);
$content2 = php_filt($_REQUEST['content2']);
$upl1 = "";
if (user("u14")){
$fl = fopen("../blocks/up.php","w");
$fl2 = fopen("../blocks/down.php","w");
if ((fwrite($fl,$content2))&&(fwrite($fl2,$content3))) {$upl1 = "Дані успішно збережено";} else {$upl1 = "Помилка доступу: неможливо збереги дані";}
fclose($fl);
fclose($fl2);
}
$GLOBALS['_RESULT'] = array(
      "str"   => $upl1,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>