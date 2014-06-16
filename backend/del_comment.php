<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$id =   $_REQUEST['id'];
preg_filt($id);
$snd2 = "";
$send = "";
$snd = "";
if (is_set()) {$log = $_COOKIE['obafgkm'];} else {$log = "null-*";}
$query1 = mysql_fetch_array(mysql_query("SELECT `login`,`hide` FROM `comments` WHERE `id`='$id'"));
if ((user("u14")) or ($query1['login']==$log)){
if ($query1['hide']==0) {
$query = mysql_query("UPDATE `comments` SET `hide`='1' WHERE `id`='$id' AND `hide`='0'");
$snd = "<span id=\"bs".$id."\"><img alt=\"Відновити\" title=\"Відновити\" style=\"cursor:pointer;\" src=\"img/icon/basket.png\" onclick=\"redel_comment_admin(".$id.")\" /></span> <!--<img alt=\"Редагувати\" title=\"Редагувати\" style=\"cursor:pointer;\" src=\"img/icon/red.png\" onclick=\"comment_admin_edit_ask(".$id.")\"/> --><img alt=\"Видалити\" title=\"Видалити\" style=\"cursor:pointer;\" src=\"img/icon/del.png\" onclick=\"del_comment_admin(".$id.")\"/>";
} else {
$query = mysql_query("DELETE FROM `comments` WHERE `id`='$id' AND `hide`='1'");
$snd = "";
}
} else {$upl2 = "Помилка санкціонованого доступу! Ви не маєте права видалити цей коментар.";}
if ($query) {$send = "<img src=\"img/icon/basket.png\" alt=\"del\" title=\"Відновити\" onclick=\"redel_comment(".$id.")\" style=\"cursor:pointer;\"/>";
$snd2 = "0.5";}
$GLOBALS['_RESULT'] = array(
      "str"   => $send,
      "op"    => $snd2,
      "out"   => $snd,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
