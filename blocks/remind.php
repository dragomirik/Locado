<?php hide_module();
if (!isset($_POST['remind_btn'])){
$variable1 = word(30);
$variable2 = word(32);
print <<<HERE
<form method="post">
<fieldset class="inputs"><input type="text" name="remind_pass" placeholder="$variable1"> </fieldset>
<input type="submit" class="button" name="remind_btn" style="width:140px; margin-left:5px;" value="$variable2">
</form>
HERE;
} else
{
$remind=$_POST['remind_pass'];
$remind= filt($remind);
$subject = "Remind password ".setting('name');
$result66 = mysql_query("SELECT * FROM `users` WHERE `email`='$remind'");
if (mysql_num_rows($result66) > 0){
$myrow66 = mysql_fetch_array($result66);
$message = word(34).": ".$myrow66["login"].", ".word(33).": ".$myrow66["pass"];
mail($remind,$subject,$message,"Content-type:text/plain; Charset=utf-8\r\n");
echo "<span class='true'>".word(35)."</span>";} else
{echo "<span class='false'>".word(36)."</span>";}
}
?>