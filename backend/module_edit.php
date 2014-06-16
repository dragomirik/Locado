<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$id = filt_a($_REQUEST['id']);
preg_filt($id);
$upl = "";
if (user('u14')){
$query = mysql_query("SELECT * FROM `preg` WHERE `id`='$id' AND `check`='1' AND `show`='1'");
$queryr = mysql_fetch_array($query);
if  (mysql_num_rows($query)!=0) {
$h = fopen("../".$queryr['file'],"r");
$content = fread($h, filesize("../".$queryr['file']));
fclose($h);
}
$upl = "<form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return false\"><fieldset><p class=\"placeholder\">Слово-заміщувач</p><input type=\"text\" id=\"word\" style=\"width:200px;\" value=\"".$queryr['word']."\"/><p class=\"placeholder\">Файл</p><input type=\"text\" id=\"file\" style=\"width:200px;\" value=\"".$queryr['file']."\" /></fieldset><p class=\"placeholder\">Опис модуля</p><textarea id=\"desk\" style=\"height:50px; width:400px; margin-left:5px; \">".$queryr['desk']."</textarea><br/><p class=\"placeholder\">Вміст модуля</p><textarea id=\"include\" style=\"height:150px; margin-left:5px; width:400px;\">".$content."</textarea><br/><input type=\"button\" class=\"button\" onclick=\"module_edit_save(".$queryr['id'].")\" style=\"width:80px; margin-left:5px; \" value=\"   Go   \" /></form>";
}
$GLOBALS['_RESULT'] = array(
      "str"   => $upl,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>