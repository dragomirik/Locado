<?php hide_module(); 
$query1 = mysql_query("SELECT * FROM `friends` WHERE 1");
if (mysql_num_rows($query1)!=0){
echo "<ul style=\"margin:0; margin-right: 3px; padding-left:30px; list-style-image: url('img/list.png');\">";
$row2 = mysql_fetch_array($query1);
do {
echo "<li style=\"margin:0; padding:0px; padding-top:3px;\"><a href=\"".$row2["url"]."\">".$row2['title']."</a></li>";
} while ($row2 = mysql_fetch_array($query1));
echo "</ul>";}
?>