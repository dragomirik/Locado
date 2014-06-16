<?php hide_module();
if ($thispage=="view_a.php"){
if (isset($_GET['id'])) {$id = $_GET['id'];};
if (!isset($id)) {$id = 1;}
preg_filt($id);
$this_ar = mysql_query("SELECT * FROM `articles` WHERE `id`='$id'");
if (mysql_num_rows($this_ar) > 0)
{
$my_a = mysql_fetch_array($this_ar) or die (mysql_error());
$new_view = $my_a["views"] + 1;
$my_a["views"] ++;
$update = mysql_query("UPDATE `articles` SET `views`='$new_view' WHERE `id`='$id'");
}
else
{
echo "<p>".word(8)."</p>";
exit();
}
$my_pages["title"] = $my_a["title"];
$my_pages["meta_k"] = $my_a["meta_k"];
$my_pages["meta_d"] = $my_a["meta_d"];
$my_pages["text"] = "<div class=\"menu\"><a class=\"a_menu\" href=\"".sitename()."\" >".word(15)."</a> »	<a class=\"a_menu\" href=\"".sitename()."articles.php\">".word(16)."</a> » ".$my_a["title"]."</div>\$VIEW_A\$";
}
?>
