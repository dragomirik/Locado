<?php hide_module();
if (user('u14')) {
if (setting('logs')) {$status = "ON"; $mmm = "";} else {$status = "OFF";$mmm = "Логування вимкнено";}
echo "<div style=\"height:50px;\" id=\"admin_logs\"><span style=\"margin-left:10px;\">".$mmm."</span><div style=\"float:right; margin-right:10px; margin-left:10px;\"><input  class=\"button\" style=\"width:40px; background-color:green; margin-top:0px;\" value=\"".$status."\" onclick=\"logs_change()\" readonly=\"readonly\"> <input class=\"button\" style=\"width:150px;margin-top:0px;\" value=\"Очистити логи\" onclick=\"clear_all_logs()\" readonly=\"readonly\"></div></div>";
$fl = fopen("log.txt","r");
if (filesize("log.txt")==0) {$file = "Log file is empty";} else 
{$file = fread($fl,filesize("log.txt"));}
fclose($fl);
$file = str_replace("\n", "<hr />", $file);
echo '<span id="logs" style="margin-left:10px;margin-right:10px; display:block;">'.$file.'</span>';} else {echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>";}
?>