<?php hide_module();
if (isset($_GET['categ'])&&is_numeric($_GET['categ'])) {
$id = filt($_GET['categ']);
$result1 = mysql_query("SELECT * FROM `categories` WHERE `id`='$id'");
$and = mysql_fetch_array($result1);
$and = $and['cat'];
if (mysql_num_rows($result)!=0){
echo " (".word(11).": ".$and.")";}
}
 ?>