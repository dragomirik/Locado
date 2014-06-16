<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$upl1 = "";
if (user("u14")){
$fl = fopen("../log.txt","w");
fwrite($fl,"");
fclose($fl);
$upl1 = "";
}
$GLOBALS['_RESULT'] = array(
      "str1"   => $upl1,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>