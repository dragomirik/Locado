<?php hide_module();
if (is_set()) {
if (user('u14')) {
if (isset($_GET['id'])) {
if (int1($_GET['id'])) {$id = $_GET['id'];} else {$id = 2;}
} else {$id = 2;}
if ($id == 1) {$id = 2;}
if (mysql_num_rows(mysql_query("SELECT `id` FROM `users` WHERE `id`='$id'"))!=0){

if (isset($_POST['btn']))
{
$error = "";
if (isset($_POST["sex"])) {
if ($_POST["sex"] == "t2") {$sex = 0;} else {$sex = 1;}
}
if (isset($_POST["login"]) && !empty($_POST["login"]) && strlen($_POST["login"])>4 && strlen($_POST["login"])<25) {
if (preg_code($_POST["login"])) {$login = $_POST["login"];} else {$error = "error1";}
} else {$error = "error1";}
if (isset($_POST["pass"]) and !empty($_POST["pass"]) && strlen($_POST["pass"])>4 && strlen($_POST["pass"])<60) {
if (preg_code($_POST["pass"])) {$pass = mask($_POST["pass"]);} else {$error = "error2";}
} else {$error = "error2";}
if (isset($_POST["email"]) && !empty($_POST["email"]) && strlen($_POST["email"])>5 && strlen($_POST["email"])<60) {
if (preg_mail($_POST["email"])) {$email = $_POST["email"];} else {$error = "error4";}
} else {$error = "error4-";}

if (isset($_POST["group"]) && !empty($_POST["group"])) {
if (int1(substr($_POST["group"],1))) {$group = substr($_POST["group"],1);
/*echo $group;*/} else {$error = "error5"; $group = "-1";}
if (mysql_num_rows(mysql_query("SELECT `id` FROM `user_groups` WHERE `id`='$group'"))==0) {$error = "error6";}
} else {$error = "error6";}
if (isset($_POST["reg_date"])) {
if (preg_date($_POST["reg_date"])) {$reg_date = $_POST["reg_date"];} else {$error = "error7";}
} else {$error = "error7";}
if (isset($_POST["birth_date"])) {
if (preg_date($_POST["birth_date"])) {$birth_date = $_POST["birth_date"];} else {$error = "error8";}
} else {$error = "error8";}
if (isset($_POST["fullname"])) {
if (preg_kiril($_POST["fullname"])) {$fullname = $_POST["fullname"];} else {$error = "error9";}
} else {$error = "error9";}
if (isset($_POST["town"])) {
if (preg_kiril($_POST["town"])) {$town = $_POST["town"];} else {$error = "error10";}
} else {$error = "error10";}
if (empty($error)) {
//echo $_POST["login"]." ".$login." ".$pass." ".$fullname." ".$town." ".$email." ".$birth_date." ".$reg_date." ".$sex." ".$group;
$update = mysql_query("UPDATE `users` SET `login`='$login', `pass`='$pass',`fullname`='$fullname',`town`='$town', `email`='$email', `birth_date`='$birth_date', `reg_date`='$reg_date', `sex`='$sex', `group`='$group' WHERE `id`='$id'");
if ($update) {$error = "True";} else {$error = "False";}
}
echo "  <script type=\"text/javascript\">
		document.getElementById('modal_window').innerHTML = '".$error."';
		</script>";
}
$user_info = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id`='$id'"));
$group_q = mysql_query("SELECT * FROM `user_groups` WHERE 1 ORDER BY `id` ASC");
$group_r = mysql_fetch_array($group_q);
$grow1 = "<select name=\"group\" class=\"inputs\" required=\"required\" style=\"width:214px;\">";
do{
if ($group_r["id"]!=999){
$grow1 .= "<option value=\"t".$group_r["id"]."\"";
if ($user_info["group"]==$group_r["id"]) 
{$grow1 .= " selected=\"selected\" ";}
$grow1 .= ">".$group_r["name"]."</option>";
}
} while ($group_r = mysql_fetch_array($group_q));
$grow1 .= "</select>";
$grow2 = "<select name=\"sex\" class=\"inputs\" required=\"required\" style=\"width:214px;\">
    <option value=\"t1\"  ";
	if ($user_info["sex"]==1) {$grow2 .= "selected=\"selected\"";};
$grow2 .= ">чоловіча</option>
    <option value=\"t2\" "; 
	if ($user_info["sex"]==0) {$grow2 .= "selected=\"selected\"";};
$grow2 .= ">жіноча</option>
</select>";
echo "<form action=\"".page_print()."?".$_SERVER['QUERY_STRING']."#php_report\" method=\"post\"><table class=\"table_none\"style=\"width:97%; margin-left:10px; margin-right: 10px;\">
<tr><td style=\"width:50%; text-align: left;\">
<fieldset  class=\"inputs\">
<p class=\"placeholder\">Логін</p>
<input type=\"text\" name=\"login\" style=\"background: #ffffcc;\" value=\"".$user_info["login"]."\">
<p class=\"placeholder\">Пароль</p>
<input type=\"text\" name=\"pass\" value=\"".demask($user_info["pass"])."\">
<p class=\"placeholder\">E-mail</p>
<input type=\"text\" name=\"email\" value=\"".$user_info["email"]."\">
<p class=\"placeholder\">Група</p>
".$grow1."
<p class=\"placeholder\">Дата реєстрації</p>
<input type=\"date\" name=\"reg_date\" value=\"".$user_info["reg_date"]."\">
</fieldset>
</td><td style=\"text-align: left; vertical-align:top;\">
<fieldset  class=\"inputs\">
<p class=\"placeholder\">Повне ім'я</p>
<input type=\"text\" name=\"fullname\" value=\"".$user_info["fullname"]."\">
<p class=\"placeholder\">Місто</p>
<input type=\"text\" name=\"town\" value=\"".$user_info["town"]."\">
<p class=\"placeholder\">Стать</p>
".$grow2."
<p class=\"placeholder\">Дата народження</p>
<input type=\"text\" name=\"birth_date\" value=\"".$user_info["birth_date"]."\">
</fieldset>
</td></tr>
</table>
<input type=\"submit\" class=\"button\" name=\"btn\" value=\"Зберегти дані\" style=\"margin-left: 18px; margin-top:-5px;\"></form>";
} else {echo "<p class='view_title'>"."Користувач не існує!"."</p>";}
} else {echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>";}} else {echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>";}
?>