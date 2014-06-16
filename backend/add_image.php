<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$title = filt_form($_REQUEST['title']);
$prview =    filt_form($_REQUEST['prview']);
$urlfull =    filt_form($_REQUEST['urlfull']);
$upl = "";
if (user("u14")){
$insert = mysql_query("INSERT INTO `gallery` (`id`,`title`,`prview`,`urlfull`,`views`) VALUES (NULL,'$title','$prview','$urlfull','0')");
if ($insert) {$upl = "Зображення успішно додано: воно буде відображено при наступному оновленні сторінки";} else {$upl = "Помилка при додаванні зображення";}
} else {$upl = "Ви не маєте права редагувати статті";}
/*$upl1 = "";*/
$GLOBALS['_RESULT'] = array(
      "str"   => $upl,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>