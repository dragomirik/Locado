<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");

if (user("u14")){
$num = mysql_num_rows(mysql_query("SELECT `id` FROM `comments` WHERE `hide`='1'"));
$query = mysql_query("DELETE FROM `comments` WHERE `hide`='1'");
$send = "З корзини успішно видалено ".$num." елементів, для відображення результату оновіть сторінку";
} else {$send = "Помилка доступу: авторизуйтесь під логіном адміністратора!";}
$GLOBALS['_RESULT'] = array(
      "str"   => $send,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
