<?php hide_module(); 
if (!isset($_POST['con']))
{
echo "<form action=\"\" method=\"post\">
<fieldset class=\"inputs\">
<p class=\"placeholder\">Ім'я:</p>
<input type=\"text\" name=\"name\" maxlength=\"30\" /><br/>
<p class=\"placeholder\">Ваш e-mail:</p>
<input type=\"text\" name=\"email\" maxlength=\"30\" /><br/>
</fieldset>
<p class=\"placeholder\" style=\"margin-left:0px;\">Введіть текст звернення:</p>
<textarea rows=\"8\" cols=\"70\" name=\"info\" style=\"margin-left:5px;\"></textarea><br/>
<input type=\"submit\" name=\"con\" class=\"button\" style=\"margin-left:5px;\" value=\"  Надіслати листа  \" />
  </form>";
} else {
$name = $_POST['name'];
$umail = $_POST['email'];
$txt= $_POST['info'];
$name = stripslashes($name);
$name = htmlspecialchars($name);
$umail = stripslashes($umail);
$umail = htmlspecialchars($umail);
$txt= stripslashes($txt);
$txt= htmlspecialchars($txt);
$adminemail="webdz2011@mail.ru";
$text = "Доброго дня, адмніністраторе. До Вас звертається ".$username." (".$umail.") \n".$txt.""; 
$message = wordwrap($text, 70);
$caption = "Letter for sate admin";
mail($adminemail, $caption, $message, null, umail);
echo "Ваше повідомлення успішно відправлено. <a href=\"contacts.php\">Повернутися назад</a>.";
}
?>