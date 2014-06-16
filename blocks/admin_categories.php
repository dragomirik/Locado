<?php hide_module();
if (user('u14')) {
$query1 = mysql_query("SELECT * FROM `categories` WHERE 1 ORDER BY  `id` ASC ");
$manka = mysql_num_rows($query1);
if ($manka!=0){
$stul = 2;
$echo3 = "<table class='table_m' cellspacing='0' style='width:97%;' id=\"fr_table\"><tr style=\"font-weight:bold;\">
<th class='table".($stul)."' style=\"width:70%;\">
Категорії статей
</th>
<th class='table".($stul)."'>
Статей в категорії
</th>
<th class='table".($stul+2)."'  style=\"width:34px; text-align:right;\">
<img alt=\"\" title=\"Додати нову категорію\" style=\"cursor:pointer;\" src=\"img/icon/plus.png\" onclick=\"add_a_cat_ask()\" />
</th>
</tr>";
$stul = 1;
$row2 = mysql_fetch_array($query1);
$lamp = 0;
do {
$lamp++;
$balda = "";
if ($lamp!=1){
$balda .= "<img alt=\"\" title=\"Вверх\" src=\"img/icon/up.png\" style=\"cursor:pointer;\" onclick=\"a_cat_up(".$row2["id"].")\" /> ";
}
if ($lamp!=$manka){
$balda .= "<img alt=\"\" title=\"Вниз\" src=\"img/icon/down.png\" style=\"cursor:pointer;\" onclick=\"a_cat_down(".$row2["id"].")\"  /> ";
}
if ($lamp==$manka){
$balda .= "<img alt=\"\" title=\"\" src=\"img/icon/null.png\" /> ";
}
$wew = mysql_fetch_array(mysql_query("SELECT COUNT(*) FROM `articles` WHERE `cat`='$row2[id]'"));
$count = $wew[0];
$echo3 .= "<tr id=\"d".$row2["id"]."\">
<td class='table".($stul)."'><a href=\"articles.php?categ=".$row2["id"]."\">".$row2['cat']."</a>
</td>
<td class='color1' style=\"text-align:center; font-weight:bold;\">".$count."</a>
</td>
<td class='table".($stul+2)."'  style=\"width:73px; text-align:right;\">".$balda."
<img alt=\"Редагувати\" title=\"Редагувати\" style=\"cursor:pointer;\" src=\"img/icon/red.png\" onclick=\"a_cat_red_ask(".$row2['id'].", '".$row2['cat']."')\" />
<img alt=\"Видалити\" title=\"Видалити\" src=\"img/icon/del.png\" onclick=\"a_cat_del_ask(".$row2['id'].")\" style=\"cursor:pointer;\"/>
</td>
</tr>";
} while ($row2 = mysql_fetch_array($query1));
$echo3 .= "</table>";
echo $echo3;}} else {echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>";}
?>