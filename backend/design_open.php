<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$id =    $_REQUEST['id'];
$upl1 = "";
if (user("u14")){
if ($id==1) {
$fl = fopen("../blocks/head.php","r");
if (filesize("../blocks/head.php")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../blocks/head.php"));}
fclose($fl);
$upl1 = "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">head.php</p><textarea style=\"width:100%;\" id=\"content1\" >".$file."</textarea></div>
<input type=\"button\" class=\"button\" style=\"margin-left:10px; width:200px;\" value=\"Зберегти\" onclick=\"design_save_1()\" />";
}
if ($id==2) {
$fl = fopen("../blocks/up.php","r");
if (filesize("../blocks/up.php")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../blocks/up.php"));}
fclose($fl);
$upl1 = "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">up.php</p><textarea style=\"width:100%;\" id=\"content2\">".$file."</textarea></div>";
/**/
$fl = fopen("../blocks/down.php","r");
if (filesize("../blocks/down.php")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../blocks/down.php"));}
fclose($fl);
$upl1 .= "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">down.php</p><textarea style=\"width:100%;\" id=\"content3\">".$file."</textarea></div>
<input type=\"button\" class=\"button\" style=\"margin-left:10px; width:200px;\" value=\"Зберегти\" onclick=\"design_save_2()\" />";
}
if ($id==3) {
$upl1 = "";
$fl = fopen("../css/content.css","r");
if (filesize("../css/content.css")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../css/content.css"));}
fclose($fl);
$upl1 .= "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">content.css</p><textarea style=\"width:100%; \" id=\"content4\">".$file."</textarea></div>";
$fl = fopen("../css/text.css","r");
if (filesize("../css/text.css")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../css/text.css"));}
fclose($fl);
$upl1 .= "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">text.css</p><textarea style=\"width:100%; \" id=\"content5\">".$file."</textarea></div>";
$fl = fopen("../css/style.css","r");
if (filesize("../css/style.css")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../css/style.css"));}
fclose($fl);
$upl1 .= "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">style.css</p><textarea style=\"width:100%; \" id=\"content6\">".$file."</textarea></div>";
$fl = fopen("../css/modal.css","r");
if (filesize("../css/modal.css")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../css/modal.css"));}
fclose($fl);
$upl1 .= "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">modal.css</p><textarea style=\"width:100%; \" id=\"content7\">".$file."</textarea></div>";
$fl = fopen("../css/navigator.css","r");
if (filesize("../css/navigator.css")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../css/navigator.css"));}
fclose($fl);
$upl1 .= "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">navigator.css</p><textarea style=\"width:100%; \" id=\"content8\">".$file."</textarea></div>";
$fl = fopen("../css/pstrnav.css","r");
if (filesize("../css/pstrnav.css")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../css/pstrnav.css"));}
fclose($fl);
$upl1 .= "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">pstrnav.css</p><textarea style=\"width:100%; \" id=\"content9\">".$file."</textarea></div>";
$fl = fopen("../css/form.css","r");
if (filesize("../css/form.css")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../css/form.css"));}
fclose($fl);
$upl1 .= "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">form.css</p><textarea style=\"width:100%; \" id=\"content10\"> ".$file."</textarea></div>";
$fl = fopen("../css/article.css","r");
if (filesize("../css/article.css")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("../css/article.css"));}
fclose($fl);
$upl1 .= "<div style=\"margin-left:10px; margin-right:17px;\">
<p class=\"placeholder\">article.css</p><textarea style=\"width:100%; \" id=\"content11\">".$file."</textarea></div>
<input type=\"button\" class=\"button\" style=\"margin-left:10px; width:200px;\" value=\"Зберегти\" onclick=\"design_save_3()\" />";
}
}
$GLOBALS['_RESULT'] = array(
      "str1"   => $upl1,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>