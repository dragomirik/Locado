<?php hide_module();
if (user('u14')) {
$query1 = mysql_query("SELECT * FROM `preg` WHERE `show`='1' ORDER BY  `id` DESC");
$manka = mysql_num_rows($query1);
if ($manka!=0){
$stul = 2;
$echo3 = "<table class='table_m' cellspacing='0' style='width:97%;' id=\"fr_table\"><tr style=\"font-weight:bold;\">
<th class='table".($stul)."'>
Слово-заміщувач</th>
<th class='table".($stul)."'>
Файл</th>
<th class='table".($stul)."'>
Опис модуля</th>
<th class='table".($stul+2)."'  style=\"width:35px; text-align:right;\">
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
echo $echo3;}} else {echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>";}
?>