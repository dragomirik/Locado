<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$id =   $_REQUEST['id'];
preg_filt($id);
$title =   filt_form($_REQUEST['title']);
$meta_d = filt_form($_REQUEST['meta_d']);
$meta_k = filt_form($_REQUEST['meta_k']);
$text =  filt_a($_REQUEST['text']);
$url = filt_form($_REQUEST['url']);

$upl1 = "<img src=\"img/navh.png\" onload=\"bool_283()\">";
$upl2 = "";

if (user("u6")){
if (strlen($title)<6) {$upl2 = word(72);} else {
if (strlen($title)>255) {$upl2 = word(73);}}
if (strlen($meta_d)>255) {$upl2 = word(74);}
if (strlen($meta_k)>255) {$upl2 = word(75);}
if (strlen($text)<0) {$upl2 = word(78);} else {
if (strlen($text)>6553000) {$upl2 = word(79);}}
if (is_set()){
$name = filt_form($_COOKIE["obafgkm"]);
if (user("u21")){
$mm_book = mysql_fetch_array(mysql_query("SELECT `url` FROM `settings` WHERE `id`='$id'"));
if (($mm_book["url"]=="index.php")&&($url!="index.php")) 
{$upl2 = "Error1";}
if (!filename($url)) {if (fname($url)) {$url .= ".php";} else {$upl2 = "Error3"; $url = "";}}
$query = mysql_query("SELECT `id` FROM `settings` WHERE `url`='$url' AND `id`!='$id'");
if (mysql_num_rows($query)!=0) {$upl2 = "Error2";}
if (!filename($url)) {if (fname($url)) {$url .= ".php";} else {$url = "Error3";}}
if ($upl2 == "") {
if ($mm_book["url"]!=$url) {
unlink("../".$mm_book["url"]);
$h = fopen("../".$url,"w");
$tmp = "<?php
include(\"blocks/functions.php\");
ob_start();
preg_echo();
ob_end_flush();
?>";
if (fwrite($h,$tmp))
echo ""; else echo "";
fclose($h);}
$re_date = date("Y-m-d");
$result = mysql_query("UPDATE `settings` SET `title`='$title', `url`='$url', `text`='$text', `meta_k`='$meta_k', `meta_d`='$meta_d', `lostmode`='$re_date' WHERE `id`='$id'");
if ($result==false){
$upl2 = word(91);} else{
if (user("u7")) {
$upl2 = word(92)." (<a href=\"".$url."\" target=\"_blank\">".$title."</a>)";}
else { $upl2 = word(93);}}
}}} else {$upl2 = "cookie";}} else {$upl2 = "Ви не маєте права редагувати статті";}
$GLOBALS['_RESULT'] = array(
      "str1"   => $upl1,
      "str2"   => $upl2,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
