<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$word = filt_a($_REQUEST['word']);
$file =    filt_f($_REQUEST['file']);
$desk =    filt_f($_REQUEST['desk']);
$include =    $_REQUEST['include'];

$upl1 = "";
$upl2 = "";

if (user("u14")){
$name = filt_form($_COOKIE["obafgkm"]);
if ($file[0]=="b" AND $file[1]=="l" AND $file[2]=="o" AND $file[3]=="c" AND $file[4]=="k" AND $file[5]=="s" AND $file[6]=="/") {$file = substr($file,7);}
$word = substr(str_replace('$', '', $word),0,60);
$file = substr($file,0,60);
if (empty($word) or empty($file)) {$upl2 = "error1";}
if (!preg_code($word)) {$upl2 = "error2";}
$word = '$'.$word.'$';
if (!filename($file)) {if (fname($file)) {$file .= ".php";} else {$upl2 = "Error3";}}
$file = "blocks/".$file;
if ($upl2 == "") {
$query1 = mysql_query("SELECT `id` FROM `preg` WHERE `file`='$file' OR `word`='$word'");
if (mysql_num_rows($query1)>0) {
$rnd_code = generate(6,1);
$file = "blocks/".$rnd_code.substr($file,7);
$word = "$".$rnd_code.substr($word,1);
}
$query1 = mysql_query("SELECT `id` FROM `preg` WHERE `file`='$file' OR `word`='$word'");
if (mysql_num_rows($query1)>0) {
$rnd_code = generate(6,1);
$file = "blocks/".$rnd_code.substr($file,7);
$word = "$".$rnd_code.substr($word,1);
}
$updater = mysql_query("INSERT INTO `preg` (`id`,`word`,`file`,`desk`) VALUES (NULL,'$word','$file','$desk')");
$h = fopen("../".$file,"w");
if (fwrite($h,$include))
$ert = true; else $ert = false;
fclose($h);
if ($updater && $ert) {$upl2 = "Зміни збережено";} else {$upl2 = "Error";}
}

$query1 = mysql_query("SELECT * FROM `preg` WHERE `show`='1' ORDER BY  `id` DESC");
$manka = mysql_num_rows($query1);
if ($manka!=0){
$stul = 2;
$echo3 = "<table class=\"table_m\" cellspacing=\"0\" style=\"width:97%;\" id=\"fr_table\"><tr style=\"font-weight:bold;\">
<th class=\"table".($stul)."\">
Слово-заміщувач</th>
<th class=\"table".($stul)."\">
Файл</th>
<th class=\"table".($stul)."\">
Опис модуля</th>
<th class=\"table".($stul+2)."\" style=\"width:35px; text-align:right;\">
<img alt=\"\" title=\"Створити модуль\" style=\"cursor:pointer;\" src=\"img/icon/plus.png\" onclick=\"add_module_ask()\" />
</th>
</tr>";
$stul = 1;
$row2 = mysql_fetch_array($query1);
do {
$echo3 .= "<tr id=\"d".$row2["id"]."\">
<td class='table".($stul)."'>".$row2["word"]."</a>
</td>
<td class='table".($stul)."'>".$row2["file"]."</a>
</td>
<td class='table".($stul)."'>".$row2["desk"]."</a>
</td>
<td class='table".($stul+2)."'  style=\"width:34px; text-align:right;\" id=\"a".$row2["id"]."\">";
if ($row2['check']==1)
{$echo3 .= "<img alt=\"Редагувати\" title=\"Редагувати\" style=\"cursor:pointer;\" src=\"img/icon/red.png\" onclick=\"module_edit(".$row2['id'].", '".$row2['title']."', '".$row2['url']."')\" />
<img alt=\"Видалити\" title=\"Видалити\" src=\"img/icon/del.png\" onclick=\"module_del_ask(".$row2['id'].")\" style=\"cursor:pointer;\"/>";}
$echo3 .="
</td>
</tr>";
} while ($row2 = mysql_fetch_array($query1));
$echo3 .= "</table>";
$upl1 = $echo3;}
} else {$upl2 = "Ви не маєте права редагувати статті";}
/*$upl1 = "";*/
$GLOBALS['_RESULT'] = array(
      "str"   => $upl1,
      "str2"   => $upl2,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>