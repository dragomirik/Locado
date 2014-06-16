<?php hide_module();
if (isset($_POST['bottom'])){
$tero = $_POST['tero'];
$update = mysql_query("UPDATE `site` SET `ip`='$tero' WHERE 1");
if ($update) {echo "<p style=\"color:green;\">Зміни збережено!</p>";} else  {echo "<p style=\"color: red;\"> Зміни не збережено!</p>";}
}
$result555 = mysql_query("SELECT `ip` FROM `site` WHERE 1");
$myrow555 = mysql_fetch_array($result555);
printf("<p>Введіть, будь ласка, список заблокованих ІР через пропуски:<br /><form method='post'><fieldset id='inputs'><textarea name='tero' style=\"margin-left:0px;\">".$myrow555['ip']."</textarea>
</fieldset>
<input name='bottom' value='    Зберегти    ' type='submit'  style='margin-left:5px;margin-top:0px;' class=\"button\" /> 
</form></p>");
?>