<?php hide_module();
if (user('u14')) {
$query1 = mysql_query("SELECT * FROM `friends` WHERE 1 ORDER BY  `friends`.`id` ASC ");
$manka = mysql_num_rows($query1);
$stul = 2;
$echo3 = "<table class='table_m' cellspacing='0' style='width:97%;' id=\"fr_table\"><tr style=\"font-weight:bold;\">
<th class='table".($stul)."'>
Список рекомендованих сайтів
</th>
<th class='table".($stul+2)."'  style=\"width:34px; text-align:right;\">
<img alt=\"\" title=\"Додати до списку\" style=\"cursor:pointer;\" src=\"img/icon/plus.png\" onclick=\"add_r_page_ask()\" />
</th>
</tr>";
if ($manka!=0){
$stul = 1;
$row2 = mysql_fetch_array($query1);
$lamp = 0;
do {
$lamp++;
$balda = "";
if ($lamp!=1){
$balda .= "<img alt=\"\" title=\"Вверх\" src=\"img/icon/up.png\" style=\"cursor:pointer;\" onclick=\"rec_page_up(".$row2["id"].")\" /> ";
}
if ($lamp!=$manka){
$balda .= "<img alt=\"\" title=\"Вниз\" src=\"img/icon/down.png\" style=\"cursor:pointer;\" onclick=\"rec_page_down(".$row2["id"].")\"  /> ";
}
if ($lamp==$manka){
$balda .= "<img alt=\"\" title=\"\" src=\"img/icon/null.png\" /> ";
}
$echo3 .= "<tr id=\"d".$row2["id"]."\">
<td class='table".($stul)."'><a href=\"".$row2["url"]."\">".$row2['title']."</a>
</td>
<td class='table".($stul+2)."'  style=\"width:73px; text-align:right;\">".$balda."
<img alt=\"Редагувати\" title=\"Редагувати\" style=\"cursor:pointer;\" src=\"img/icon/red.png\" onclick=\"edit_rec_page_ask(".$row2['id'].", '".$row2['title']."', '".$row2['url']."')\" />
<img alt=\"Видалити\" title=\"Видалити\" src=\"img/icon/del.png\" onclick=\"del_rec_page(".$row2['id'].")\" style=\"cursor:pointer;\"/>
</td>
</tr>";
} while ($row2 = mysql_fetch_array($query1));}
$echo3 .= "</table>";
echo $echo3;} else {echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>";}
?>