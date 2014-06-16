<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$id = filt_a($_REQUEST['id']);
preg_filt($id);
$upl = "";
if (user('u14')){
$query1 = mysql_fetch_array(mysql_query("SELECT `file` FROM `preg` WHERE `id`='$id' AND `check`='1' AND `show`='1' AND `right`='1'"));
$query = mysql_query("DELETE FROM `preg` WHERE `id`='$id' AND `check`='1' AND `show`='1' AND `right`='1'");
unlink("../".$query1['file']);
if ($query) { $upl = "#"; }
}
$GLOBALS['_RESULT'] = array(
      "str"   => $upl,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>