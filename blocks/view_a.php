<?php hide_module();
if ($my_a["show"]==1) {$href = "hidet";} else {$href = "hidef";}
if ($rights<8) {$admin = "";} else
{$admin = "<div style='float:right; display:inline;margin-right:15px;'><img style='cursor:pointer;' title=\"".word(2)."\" src='".sitename()."img/icon/".$href.".png' onclick=\"change(".$my_a['id'].")\" id=\"".$my_a['id']."\"> 
<a href='".sitename()."edit_a.php?id=".$my_a['id']."' title='".word(3)."'><img src='".sitename()."img/icon/red.png'></a>
<a href='".sitename()."articles.php' title='".word(4)."' >
<img style='cursor:pointer;' src='".sitename()."img/icon/del.png' onclick=\"del_a(".$my_a['id'].")\" id=\"d".$my_a['id']."\"></a></div>";
}
$com_count = mysql_num_rows(mysql_query("SELECT * FROM `comments` WHERE `hide`='0' AND `article`='".$my_a['id']."'"));
$cat_name = mysql_query("SELECT * FROM `categories` WHERE `id`='".$my_a['cat']."'");
if (mysql_num_rows($cat_name)==0) {$cat_name = word(13);} else {$cat_name = mysql_fetch_array($cat_name); $cat_name = $cat_name['cat'];}
if (!empty($my_a['sourse'])) {
if (($my_a['sourse'][0]=="h")&&($my_a['sourse'][1]=="t")&&($my_a['sourse'][2]=="t")&&($my_a['sourse'][3]=="p")&&($my_a['sourse'][4]==":")&&($my_a['sourse'][5]=="/")&&($my_a['sourse'][6]=="/")) {
$www8 = "<p class=\"color1\">Джерело: <a href=\"".$my_a['sourse']."\" title=\"Sourse\" target=\"_blank\">".$my_a['sourse']."</a></p>";} else
{
$www8 = "<p class=\"color1\">Джерело: ".$my_a['sourse']."</p>";}
} else {$www8 = "";}
if (!empty($my_a['an1']) or !empty($my_a['an2']) or !empty($my_a['an3']) or !empty($my_a['an4']) or !empty($my_a['an5']))
{$www1 = "
<p class=\"color1\" style=\"margin:0;\">Подібні статті:
<ul style=\"margin:0; list-style-image: url('img/list.png');\">";
$www7 = "</ul></p>";} else {$www1 = ""; $www7 = "";}
if (!empty($my_a['an1'])) {$www2 = "<li style=\"margin:0; padding:0px;\"><a href=\"".$my_a['a1']."\">".$my_a['an1']."</a></li>";} else {$www2 = "";}
if (!empty($my_a['an2'])) {$www3 = "<li style=\"margin:0; padding:0px;\"><a href=\"".$my_a['a2']."\">".$my_a['an2']."</a></li>";} else {$www3 = "";}
if (!empty($my_a['an3'])) {$www4 = "<li style=\"margin:0; padding:0px;\"><a href=\"".$my_a['a3']."\">".$my_a['an3']."</a></li>";} else {$www4 = "";}
if (!empty($my_a['an4'])) {$www5 = "<li style=\"margin:0; padding:0px;\"><a href=\"".$my_a['a4']."\">".$my_a['an4']."</a></li>";} else {$www5 = "";}
if (!empty($my_a['an5'])) {$www6 = "<li style=\"margin:0; padding:0px;\"><a href=\"".$my_a['a5']."\">".$my_a['an5']."</a></li>";} else {$www6 = "";}
printf("
<div class='v_title'><h1>".$admin."%s</h1><div class='line-h'></div></div>
<div class='v_info'>".word(11).": %s | ".word(6).": %s | ".word(5).": %s</div> <div class='line-f'></div>
<p>".$my_a['text']."</p>".$www8.$www1.$www2.$www3.$www4.$www5.$www6.$www7,$my_a['title'],$cat_name,$my_a['author'],$my_a['date']);
include('blocks/rank.php');
echo"<div class='line-h'></div><div class='v_views'>".word(7).": ".$my_a['views']."</div>";
include('blocks/comments.php');
?>