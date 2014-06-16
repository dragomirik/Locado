<?php hide_module();
if ($thispage=="view_a.php") {$qu = "`article`";}
if ($thispage=="view_news.php") {$qu = "`news`";}
$result3 = mysql_query ("SELECT * FROM `comments` WHERE ".$qu."='$id' AND `hide`='0' ORDER BY `id` DESC");
echo "<p class=\"a_comment color1\" style=\"font-size:18px;\" id=\"comments\">".word(82)." (".mysql_num_rows($result3)."):</p>";
/*comment add form begin*/
$capcha = mt_rand(10,17);
$result4 = mysql_query ("SELECT `img` FROM `comments_settings` WHERE `id`='$capcha'");
$myrow4 = mysql_fetch_array($result4);
$echo = "<div id=\"com_add_form\" class=\"a_div marg_0 padd_0\"><p class=\"marg_0 padd_0 color1 a_comment\" style=\"font-size:14px;\">".word(86).":</p>
<form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return false\" class=\"marg_0 padd_0\"><fieldset class=\"inputs marg_0 padd_0\">";
 if (!user('u22')) { $echo .= "<p class=\"placeholder\">".word(87).":</p><input name='author' id='author' type='text' size='30' maxlength='30' />";}
if (!user('u3')) {$echo .= "<p>".word(88)."</p>";} 
if (user('u3')){ $echo .= "<p class=\"placeholder\">".word(89).": </p> <textarea class=\"comment_textarea\" name='texter' id='text'></textarea>"; }
 if (!user('u22')) { $echo .= "<p class=\"placeholder\" style=\"padding-top:5px;\">Введіть у поле суму чисел на картинці:</p><label><input style=\"margin-left:0px; width:87px;\" name='pr' id='pr' type='text' size='5' maxlength='5' /><img src='$myrow4[img]' style=\"width:80; height:40; padding:0; margin:0; margin-top:0px; float:left;\" alt=\"capcha\" /></label>";}
$echo .= "</fieldset><input name=\"id\" id=\"id\"  class=\"hidden\" value=\"".$id."\" /><input name=\"capcha\" id=\"capcha\" class=\"hidden\" value=\"".$capcha."\" />";
  if (user('u3')) { 
  if (is_set()){
  $vart = 0;
  } else {$vart = 1;}
  $echo .= "<input name='sub_com' id='sub_com' type='submit' class='button' value='   ".word(90)."   ' style=\"margin-top:10px; margin-left:0px; margin-bottom:0px;\" onclick=\"comment(".$vart.",'".$thispage."',1)\" />";}
$echo .= "</form></div>";
echo $echo;
/*comment add form end*/
if ($thispage=="view_a.php") {$qu = "`article`";}
if ($thispage=="view_news.php") {$qu = "`news`";}
$result3 = mysql_query ("SELECT * FROM `comments` WHERE ".$qu."='$id' AND `hide`='0' AND `re_com_id`='0' ORDER BY `id` DESC");
echo "<div id=\"com_block\">";
if (mysql_num_rows($result3) > 0)
{
$myrow3 = mysql_fetch_array($result3);
do 
{		
		$idr = $myrow3["id"];
		$result_re = mysql_query ("SELECT * FROM `comments` WHERE ".$qu."='$id' AND `hide`='0'  AND `re_com_id`='$idr' ORDER BY `id` ASC");
		$answer = "";
		if (mysql_num_rows($result_re)>0){
		$myrow_re = mysql_fetch_array($result_re);
		do{
		if (is_set()) {$login1 = filt($_COOKIE['obafgkm']);} else { $login1 = "";}
		if ((user('u14')) or (($myrow_re['login']==$login1)&&($rights > 0))) {
		$ctext = "<div class=\"mod_comment\" id=\"t".$myrow_re["id"]."\">
		<img src=\"img/icon/ip.png\" alt=\"ip\" title=\"IP\" onclick=\"alert('".$myrow_re["ip"]."')\" style=\"cursor:pointer;\"/> <img src=\"img/icon/red.png\" alt=\"edit\" title=\"".word(3)."\" onclick=\"edit_comment(".$myrow_re["id"].")\" style=\"cursor:pointer;\"/> <img src=\"img/icon/del.png\" alt=\"del\" title=\"".word(4)."\" onclick=\"del_comment(".$myrow_re["id"].")\" style=\"cursor:pointer;\"/></div>";} else {$ctext = "";}
		$answer .= "<div class=\"a_div\" id=\"c".$myrow_re["id"]."\">".$ctext."<p class=\"a_comment_add color1\"><strong class=\"color1\">$myrow_re[author]</strong> (".$myrow_re["date"].")</p>
		<p class=\"a_comm\" id=\"txt".$myrow_re["id"]."\">".$myrow_re["text"]."</p></div><span id=\"sr".$myrow3["id"]."\" style=\"hidden\"></span>";
		} while ($myrow_re = mysql_fetch_array($result_re));}
		if (is_set()) {$login1 = filt($_COOKIE['obafgkm']);} else { $login1 = "";}
		if ((user('u14')) or (($myrow3['login']==$login1)&&($rights > 0))) {
		$ctext = "<div class=\"mod_comment\" id=\"t".$myrow3["id"]."\">
		<img src=\"img/icon/ip.png\" alt=\"ip\" title=\"IP\" onclick=\"alert('".$myrow3["ip"]."')\" style=\"cursor:pointer;\"/> <img src=\"img/icon/red.png\" alt=\"edit\" title=\"".word(3)."\" onclick=\"edit_comment(".$myrow3["id"].")\" style=\"cursor:pointer;\"/> <img src=\"img/icon/del.png\" alt=\"del\" title=\"".word(4)."\" onclick=\"del_comment(".$myrow3["id"].")\" style=\"cursor:pointer;\"/></div>";} else {$ctext = "";}
printf ("<div class=\"a_div\" id=\"c".$myrow3["id"]."\">".$ctext."<p class=\"a_comment_add color1\"><strong class=\"color1\">%s</strong> (%s)</p>
<p class=\"a_comm\" id=\"txt".$myrow3["id"]."\">%s</p></div>
<div style=\"margin-left:30px; \" id=\"abc".$myrow3["id"]."\">%s</div><span id=\"sr".$myrow3["id"]."\" class=\"hidden\"></span>",$myrow3["author"], $myrow3["date"], $myrow3["text"],$answer);
}
while ($myrow3 = mysql_fetch_array($result3));
} else {
printf ("<div class='a_div'><p>".word(85)."</p></div>");
}
echo "</div>";

  ?> 