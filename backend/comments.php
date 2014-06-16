<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
// Init JsHttpRequest and specify the encoding. It's important!
$JsHttpRequest = new JsHttpRequest("utf-8");
// Fetch request parameters.
include("../blocks/db.php");
include("../blocks/functions.php");
$mode = $_REQUEST['mode'];
$host = filt_f($_REQUEST['host']);
if ($mode==1){
if (isset($_REQUEST['author'])) {$author = $_REQUEST['author'];}
if (isset($_REQUEST['text1'])) {$text = $_REQUEST['text1'];}
if (isset($_REQUEST['pr'])) {$pr = $_REQUEST['pr'];}
if (isset($_REQUEST['id'])) {$id = $_REQUEST['id'];}
if (isset($_REQUEST['capcha'])) {$capcha = $_REQUEST['capcha'];}
if (isset($author)) {trim($author);} else {$author = "";}
if (isset($text)) {trim($text);   }
else {$text = "";}
if (is_set()) {$author = "name";}
if (empty($author) or empty($text))
{
exit ("<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head><p>Ви заповнили не всі поля. <br> <input name='back' type='button' value='Повернутись назад' onclick='javascript:history.back();'>");
}

$author = filt($author);
$text = filt_form($text);

$result5 = mysql_query ("SELECT `sum` FROM `comments_settings` WHERE `id`='$capcha'");
$myrow = mysql_fetch_array($result5);

if (is_set()) {
$cookie = $_COOKIE['obafgkm'];
$result8 = mysql_query ("SELECT `fullname`,`id` FROM `users` WHERE `login`='$cookie'");
$myrow8 = mysql_fetch_array($result8);} else {
$cookie = "";}
if ($pr == $myrow["sum"] or is_set())
{
if (is_set()){ $author = $myrow8['fullname'];}
$date = date("Y-m-d");
$ip = ip();
/*work with text*/
$text = wordwrap($text, 30, " ", 1);
$text = substr($text,0,1000);
/*end work with text*/
$login_id = $myrow8['id'];
$result2 = mysql_query ("INSERT INTO `comments` (`article`,`author`,`text`,`date`,`ip`,`login`,`login_id`) VALUES 
('$id','$author','$text','$date','$ip','$cookie','$login_id')");
$ttt = mysql_fetch_array(mysql_query("SELECT * FROM `site` WHERE 1"));
$address = $ttt["a_mail"];
$subject = "New comment";
$result3 = mysql_query ("SELECT `title` FROM `articles` WHERE id='$id'");
$myrow3 = mysql_fetch_array ($result3);
$post_title = $myrow3["title"];
$message = "На сайт ".$_SERVER['HTTP_HOST']." додано новий коментар - ".$post_title." \nКоментар залишив: ".$author."(".$ip.") \nТекст комментаря: ".
$text."\nПосилання на статтю: ".$_SERVER['HTTP_HOST'].$host."?id=".$id;
 /*<a href=\"http://pritchi.vv.si/view_article.php?id=".$id."\">http://pritchi.vv.si/view_article.php?id=".$id."</a>";*/
mail($address,$subject,$message,"Content-type:text/plain; Charset=utf-8\r\n");
/*
echo "<html><head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'>
<meta http-equiv='Refresh' content='0; URL=view_a.php?id=$id'>
</head></html>";
exit();*/
}
else 
{
exit ("<head><meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head><p>Ви невірно підрахували суму цифр на картинці. <br>
 <input name='back' type='button' value='Повернутись назад' onclick='javascript:history.back();'>");
}
$result3 = mysql_query ("SELECT * FROM `comments` ORDER BY `id` DESC LIMIT 0,1");
$myrow3 = mysql_fetch_array($result3);
/**/if (is_set()) {$login1 = filt($_COOKIE['obafgkm']);} else { $login1 = "";}
		if ((user('u6')) or (($myrow3['login']==$login1)&&(user('u6')))) {
		$ctext = "<div class=\"mod_comment\" id=\"t".$myrow3["id"]."\">
		<img src=\"img/icon/ip.png\" alt=\"ip\" title=\"IP\" onclick=\"alert('".$myrow3["ip"]."')\" style=\"cursor:pointer;\"/> <img src=\"img/icon/red.png\" alt=\"edit\" title=\"".word(3)."\" onclick=\"edit_comment(".$myrow3["id"].")\" style=\"cursor:pointer;\"/> <img src=\"img/icon/del.png\" alt=\"del\" title=\"".word(4)."\" onclick=\"del_comment(".$myrow3["id"].")\" style=\"cursor:pointer;\"/></div>";}
$upl = "<div class=\"a_div_new\" id=\"c".$myrow3["id"]."\">".$ctext."<p class=\"a_comment_add color1\"><strong class=\"color1\">".$myrow3["author"]."</strong> (".$myrow3["date"].")</p>
<p class=\"a_comm\" id=\"txt".$myrow3["id"]."\">".$myrow3["text"]."</p></div>
<div style=\"margin-left:30px; \" id=\"abc".$myrow3["id"]."\"></div><span id=\"sr".$myrow3["id"]."\" class=\"hidden\"></span>";
/*comment add form begin*/
$capcha = mt_rand(10,17);
$result4 = mysql_query ("SELECT `img` FROM `comments_settings` WHERE `id`='$capcha'");
$myrow4 = mysql_fetch_array($result4);
$echo = "<p class=\"marg_0 padd_0 color1 a_comment\" style=\"font-size:20px;\">".word(86).":</p>
<form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return false\" class=\"marg_0 padd_0\"><fieldset class=\"inputs marg_0 padd_0\">";
 if (!user('u22')) { $echo .= "<p class=\"placeholder\">".word(87).":</p><input name='author' id='author' type='text' size='30' maxlength='30' />";}
if (!user('u3')) {$echo .= "<p>".word(88)."</p>";} 
if (user('u3')){ $echo .= "<p class=\"placeholder\">".word(89).": </p> <textarea class=\"comment_textarea\" name='text' id='text1'></textarea>"; }
 if (!user('u22')) { $echo .= "<p class=\"placeholder\" style=\"padding-top:5px;\">Введіть у поле суму чисел на картинці:</p><label><input style=\"margin-left:0px; width:87px;\" name='pr' id='pr' type='text' size='5' maxlength='5' /><img src='$myrow4[img]' style=\"width:80; height:40; padding:0; margin:0; margin-top:0px; float:left;\" alt=\"capcha\" /></label>";}
$echo .= "</fieldset><input name=\"id\" id=\"id\"  class=\"hidden\" value=\"".$id."\" /><input name=\"capcha\" id=\"capcha\" class=\"hidden\" value=\"".$capcha."\" />";
  if (user('u3')) { 
  if (is_set()){
  $vart = 0;
  } else {$vart = 1;}
  $echo .= "<input name='sub_com' id='sub_com' type='submit' class='button' value='   ".word(90)."   ' style=\"margin-top:10px; margin-left:0px; margin-bottom:0px;\" onclick=\"comment(".$vart.",'".$host."',1)\" />";}
$echo .= "</form>";
$upl2 = $echo;
/*comment add form end*/
$GLOBALS['_RESULT'] = array(
      "str"   => $upl,
      "str2"   => $upl2,
    );
}
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>
