<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$content4 = php_filt($_REQUEST['content4']);
$content5 = php_filt($_REQUEST['content5']);
$content6 = php_filt($_REQUEST['content6']);
$content7 = php_filt($_REQUEST['content7']);
$content8 = php_filt($_REQUEST['content8']);
$content9 = php_filt($_REQUEST['content9']);
$content10 = php_filt($_REQUEST['content10']);
$content11 = php_filt($_REQUEST['content11']);
$upl1 = "";
if (user("u14")){
$fl = fopen("../css/content.css","w");
$fl2 = fopen("../css/text.css","w");
$fl3 = fopen("../css/style.css","w");
$fl4 = fopen("../css/modal.css","w");
$fl5 = fopen("../css/navigator.css","w");
$fl6 = fopen("../css/pstrnav.css","w");
$fl7 = fopen("../css/form.css","w");
$fl8 = fopen("../css/article.css","w");
if ((fwrite($fl,$content4))&&(fwrite($fl2,$content5))&&(fwrite($fl3,$content6))&&(fwrite($fl4,$content7))&&(fwrite($fl5,$content8))&&(fwrite($fl6,$content9))&&(fwrite($fl7,$content10))&&(fwrite($fl8,$content11))) {$upl1 = "Дані успішно збережено";} else {$upl1 = "Помилка доступу: неможливо збереги дані";}
fclose($fl);
fclose($fl3);
fclose($fl4);
fclose($fl5);
fclose($fl6);
fclose($fl7);
fclose($fl8);
fclose($fl2);
}
$GLOBALS['_RESULT'] = array(
      "str"   => $upl1,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>