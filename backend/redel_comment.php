<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$id =   $_REQUEST['id'];
preg_filt($id);
if (is_set()) {$log = $_COOKIE['obafgkm'];} else {$log = "null-*";}
$query1 = mysql_fetch_array(mysql_query("SELECT `login` FROM `comments` WHERE `id`='$id' AND `hide`='1'"));
if ((user("u14")) or ($query1['login']==$log)){
$query = mysql_query("UPDATE `comments` SET `hide`='0' WHERE `id`='$id' AND `hide`='1'");
} else {$upl2 = "Помилка санкціонованого доступу! Ви не маєте права видалити цей коментар.";}
if ($query) {
$send = "<img src=\"img/icon/del.png\" alt=\"del\" title=\"".word(4)."\" onclick=\"del_comment(".$id.")\" style=\"cursor:pointer;\"/>";
$op = "1";
}
$GLOBALS['_RESULT'] = array(
      "str"   => $send,
      "op"   => $op,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
