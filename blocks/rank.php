<?php hide_module();
$arr_row = mysql_fetch_array(mysql_query("SELECT * FROM `articles` WHERE `show`='1'"));
echo "<input id=\"id\" value='".$id."' class=\"hidden\" />
<div class=\"view_date\" style=\"float:right; padding-right:5px;\"><form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return false\" action=\"\">
<img alt=\"minus\" src=\"".sitename()."img/icon/minus.png\" style=\"padding-top:4px; cursor:pointer;\" onclick=\"rank_m()\" />
<span id=\"integer\" class=\"v_rank\">".word(70).": ".rank($my_a)."</span>
<img alt=\"plus\" src=\"".sitename()."img/icon/plus.png\" style=\"padding-top:4px; cursor:pointer;\" onclick=\"rank_p()\" />
</form></div>";
?>
