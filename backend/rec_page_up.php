<?php
require_once "../lib/JsHttpRequest/JsHttpRequest.php";
$JsHttpRequest = new JsHttpRequest("utf-8");
include("../blocks/db.php");
include("../blocks/functions.php");
$id =  filt_form($_REQUEST['id']);
preg_filt($id);

$upl1 = "<img src=\"img/navh.png\" onload=\"bool_283()\">";
$upl2 = "";

if (user("u6")){
if (is_set()){
if (user("u21")){
$select = mysql_query("SELECT * FROM `friends` WHERE `id`<'$id' ORDER BY  `friends`.`id` DESC ");
$blend = mysql_fetch_array($select);
$id1 = $blend["id"];
$url1 = $blend["url"];
$title1 = $blend["title"];
$select = mysql_query("SELECT * FROM `friends` WHERE `id`='$id' ORDER BY  `friends`.`id` ASC ");
$blend1 = mysql_fetch_array($select);
$id2 = $blend1["id"];
$url2 = $blend1["url"];
$title2 = $blend1["title"];
$update3 = mysql_query("UPDATE `friends` SET `title`='$title2', `url`='$url2' WHERE `id`='$id1'");
$update2 = mysql_query("UPDATE `friends` SET `title`='$title1', `url`='$url1' WHERE `id`='$id2'");
if ($updater) {$upl2 = "Зміни збережено";} else {$upl2 = "Error";}
}} else {$upl2 = "cookie";}} else {$upl2 = "Ви не маєте права редагувати статті";}
$query1 = mysql_query("SELECT * FROM `friends` WHERE 1 ORDER BY  `friends`.`id` ASC ");
$manka = mysql_num_rows($query1);
if ($manka!=0){
$stul = 2;
$echo3 = "<table class='table_m' cellspacing='0' style='width:97%;' id=\"fr_table\"><tr style=\"font-weight:bold;\">
<td class='table".($stul)."'>
Список рекомендованих сайтів
</td>
<td class='table".($stul+2)."'  style=\"width:34px; text-align:right;\">
<img alt=\"\" title=\"Додати до списку\" style=\"cursor:pointer;\" src=\"img/icon/plus.png\" onclick=\"add_r_page_ask()\" />
</td>
</tr>";
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
<td class='table".($stul+2)."'  style=\"width:72px; text-align:right;\">".$balda."
<img alt=\"Редагувати\" title=\"Редагувати\" style=\"cursor:pointer;\" src=\"img/icon/red.png\" onclick=\"edit_rec_page_ask(".$row2['id'].", '".$row2['title']."', '".$row2['url']."')\" />
<img alt=\"Видалити\" title=\"Видалити\" src=\"img/icon/del.png\" onclick=\"del_rec_page(".$row2['id'].")\" style=\"cursor:pointer;\"/>
</td>
</tr>";
} while ($row2 = mysql_fetch_array($query1));
$echo3 .= "</table>";
$upl1 = $echo3;}
$GLOBALS['_RESULT'] = array(
      "str1"   => $upl1,
      "str2"   => $upl2,
    );
if ($_REQUEST['id'] == 'error') {
  error_demonstration__make_a_mistake_calling_undefined_function();
}
?>