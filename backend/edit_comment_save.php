<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$id =   $_REQUEST['id'];
$comment =   filt_f($_REQUEST['comment']);
preg_filt($id);
$upl = "";
if (is_set()) {$log = $_COOKIE['obafgkm'];} else {$log = "null-*";}
$query1 = mysql_fetch_array(mysql_query("SELECT `login`,`hide` FROM `comments` WHERE `id`='$id'"));
if ((user("u14")) or ($query1['login']==$log)){
if (mysql_query("UPDATE `comments` SET `text`='$comment' WHERE `id`='$id'")) {$upl = $comment;}
} else {$upl2 = "Помилка санкціонованого доступу! Ви не маєте права видалити цей коментар.";}
$GLOBALS['_RESULT'] = array(
      "str"   => $upl,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
