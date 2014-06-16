<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$upl1 = "";
if (user("u14")){
if (setting('logs')) {$qr = mysql_query("UPDATE `site` SET `logs`='0' WHERE 1");} else {$qr = mysql_query("UPDATE `site` SET `logs`='1' WHERE 1");}
if (setting('logs')) {$status = "ON"; $mmm = "";} else {$status = "OFF";$mmm = "Логування вимкнено";}
$upl1 = "<span style=\"margin-left:10px;\">".$mmm."</span><div style=\"float:right; margin-right:10px; \"><input  class=\"button\" style=\"width:40px; background-color:green; margin-top:0px;\" value=\"".$status."\" onclick=\"logs_change()\" readonly=\"readonly\"> <input class=\"button\" style=\"width:150px;margin-top:0px;\" value=\"Очистити логи\" onclick=\"clear_all_logs()\" readonly=\"readonly\"></div>";
}
$GLOBALS['_RESULT'] = array(
      "str1"   => $upl1,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>