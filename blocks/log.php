<?php hide_module();
echo "<a href=\"#\" class=\"overlay\" id=\"login_432\" ></a>
        <div class=\"popup hidden\" >
		<span id=\"modal_w_243324343\">&nbsp;&nbsp;&nbsp;".word(71)."&nbsp;&nbsp;&nbsp;</span>
            <a class=\"close\" href=\"#close\"></a>
        </div>";
echo '<div id="ajax_frame" >';
if (!isset($_COOKIE['obafgkm'])) {
$word95 = word(95);
$word38 = word(38);
$word37 = word(37);
$word97 = word(97);
$word47 = word(47);
$word98 = word(98);
$word26 = word(26);
print <<<HERE
<div class="h">$word95</div>

<div id="enter" class="alertf"></div>
	<form method="post" enctype="multipart/form-data" action="">
	<fieldset class="inputs" style="margin-bottom:0;">
	<p class="placeholder">$word37:</p>
<input id="username" type="text" name="login_out" title="Логін"  
style="width:206px;" />
<p class="placeholder">$word38:</p>
<input id="password" type="password" name="pass_out" 
title="$word38"  style="width:206px;" /> <!--required="required"-->
</fieldset>
<table style="width:100%; margin-top:0; margin-left:5px; margin-right:5px; border:0;" align="center">
<tr>
<td style="vertical-align:top; text-align:right; border:0; width:90px; padding-left: 0px;">
<input type="submit" id="submit" class="button" 
style="width:90px;" value="$word97" name="log_btn" onclick="login()" /><br/></td>
<td style="text-align:right; font-size:12px; border:0;">
<label style="font-size: 12px; vertical-align:middle; color:#009AE1; margin-right:10px;">
  <input type="checkbox" name="mem" id="check" style=\"display:inline;\" /> $word98 </label>
 </td>
</tr><tr>
<td colspan="2" style="text-align:right; font-size:14px; border:0; padding-right:15px;">
<a href="reg.php">$word47</a><br/>
  <a href="remind.php">$word26</a>
 </td>
</tr>
</table><p style="text-align:right; margin:0;padding:0;font-size:14px;">
	</p>
	</form> 
HERE;
} else {
$cookie = filt($_COOKIE['obafgkm']);
$result16 = mysql_query("SELECT * FROM `users` WHERE `login`='$cookie'");
$myrow16 = mysql_fetch_array($result16);
$log23 = $myrow16['login'];
	$result787 = mysql_fetch_array(mysql_query("SELECT `group` FROM `users` WHERE `login`='$log23'"));	
$result_up = mysql_fetch_array(mysql_query("SELECT `name` FROM `user_groups` WHERE `id`='".$result787["group"]."'"));
$group = $result_up['name'];
if ($myrow16["sex"]==1) {$sex = word(99);}
if ($myrow16["sex"]==0) {$sex = word(100);}
$result_count = mysql_query("SELECT * FROM `messages` WHERE `whom`='$cookie' AND `new`='1' AND `del`='0'");
if (mysql_num_rows($result_count)>0) {$mmk = "_new";} else {$mmk = "";}
printf("<div class=\"h\"><div style='float:right; margin-right:5px;'>
<div onclick=\"window.location.href = 'cabinet.php'\" title=\"".word(102)."\" class=\"icon\" style=\"background:url('img/icon/cab.png');\"></div>
<div onclick=\"window.location.href = 'users.php'\" title=\"".word(22)."\" class=\"icon\" style=\"background:url('img/icon/users.png');\"></div>
<div onclick=\"window.location.href = 'mail.php'\" title=\"".word(20)."\" class=\"icon\" style=\"background:url('img/icon/mail%s.png');\" ></div>
</div><span style=\"margin-right:-52px;\">%s (<form style=\"text-align: center; margin:0px; padding:0px; display:inline;\" method='post'><input type='submit' class='button' name='exit' value='Вийти' style='float:center; margin:0px; padding:0px; text-decoration:underline; border:0; background:none; color: #fff; box-shadow:none;'></form>)</span></div>
<p class=\"userinfo\">".word(87).": <b>%s</b>;<br/>
".word(105).": <b>%s</b>;<br/>
".word(44).": <b>%s</b>;<br/>
".word(104).": <b>%s</b>;<br/>
".word(103).": <b>%s</b>;<br/>
".word(101).": <b>%s</b>; 
</p>", $mmk, $myrow16["login"], $myrow16["fullname"], $group, $sex, $myrow16["birth_date"], $myrow16["town"], $_SERVER['REMOTE_ADDR']);
}
?></div>