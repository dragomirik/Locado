<?php hide_module();
if (isset($_COOKIE['obafgkm'])){
$from = filt($_COOKIE['obafgkm']);
 $rebuild1 = mysql_query("SELECT * FROM `users` WHERE `login`='$from'");
$myrow111 = mysql_fetch_array($rebuild1);
if ($myrow111["rights"]>0) {
if (isset($_POST["whomp"])) 	{$whomp = $_POST["whomp"];} else {$whomp = "";}
if (isset($_GET["user"])) 	{
$varr = $_GET["user"];
preg_filt($varr);
if (mysql_query("SELECT COUNT(*) FROM `users` WHERE `id`='$varr'")!=0) 
{
$resultt = mysql_query("SELECT `login` FROM `users` WHERE `id`='$varr'");
$myroww = mysql_fetch_array($resultt);
 $whomp = $myroww['login'];
}
}
if (isset($_POST["send_btn"])) 	{
$time_s = date ("Y-m-d H:i:s");
$from = filt($_COOKIE['obafgkm']);
if (isset($_POST['whom_s']))    
{$whom_s = filt($_POST['whom_s']);
if (($ruul = mysql_query("SELECT COUNT(*) FROM `users` WHERE `login`='$whom_s'"))==0) {unset($whom_s);}}
If ($whom_s!=$from) {
if (isset($_POST['title_s']))   {$title_s = filt($_POST['title_s']); if ($title_s == '') {unset($title_s);}}
if (isset($_POST['text_s']))      {$text_s = filt($_POST['text_s']); if ($text_s == '') {unset($text_s);}}
$send = mysql_query("INSERT INTO `messages` (`from`,`whom`,`title`,`mail`,`new`,`time`,`del`) 
VALUES ('$from','$whom_s','$title_s','$text_s','1','$time_s','0')"); 
if ($send == true) 
{$stext = "<p class=\"true\">".word(54)."</p>";} else 
{$stext = "<p class=\"false\">".word(55)."</p>";}} else {
@$echou = "<p class=\"false\">".word(56)."</p>";
}
}} else 
{@$echou = "<p class=\"view_title\">".word(57)."</p>";}} else 
{@$echou = "<p class=\"view_title\">".word(58)."</p>";}
echo $myrow['text']; 
if (isset($_COOKIE['obafgkm'])) {
if (isset($_POST["send_btn"])) {
echo $stext;
echo $echou;
} else {
printf("<form method=\"post\">
<table class=\"table_none\">
<tr>
<fieldset class=\"inputs\"><td>".word(59).": </td>
<td class=\"inputs\"> <input type=\"text\" value=\"%s\" placeholder=\"\" name=\"whom_s\" required></td>
</tr></fieldset>
<tr>
<fieldset class=\"inputs\"><td>".word(60).": </td>
<td class=\"inputs\"> <input type=\"text\" value=\"\" placeholder=\"\" name=\"title_s\" required></td>
</tr>
</table></fieldset>
<fieldset class=\"inputs\"><textarea name=\"text_s\" class=\"text\" cols=\"40\" rows=\"20\" placeholder=\"".word(61)."\" required></textarea>
</fieldset>
<input type=\"submit\" name=\"send_btn\" class=\"button\" style=\"width:200px;\" value=\"".word(21)."\">
<input type=\"hidden\" name=\"send_hide\">

</form>",$whomp);
}} else {echo "<p class=\"view_title\">".word(62)."</p>";}
?>