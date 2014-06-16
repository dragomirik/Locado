<?php hide_module();
if (user('u7')) {
echo "<p style='text-align:right;'>[ <a class='hor_menu' 
style='color:#000;'  href='".sitename()."add_a.php'>Додати статтю</a> ]</p>";} else {echo "<br />";}

$num = setting('nav');
@$page = $_GET['page'];				
if (isset($_GET['categ'])&&is_numeric($_GET['categ'])) {
$id = filt($_GET['categ']);
$and = " AND `cat`='$id'";
$id_sql = "&categ=".$id;
} else {$and = ""; $id_sql ="";}
if ($rights<7) {
$result00 = mysql_query("SELECT COUNT(*) FROM `articles` WHERE `show`='1'".$and);} else {
$result00 = mysql_query("SELECT COUNT(*) FROM `articles` WHERE 1".$and);}
$temp = mysql_fetch_array($result00);
$posts = $temp[0];
$total = (($posts - 1) / $num) + 1;
$total =  intval($total);
$page = intval($page);
if(empty($page) or $page < 0) $page = 1;
  if($page > $total) $page = $total;
$start = $page * $num - $num;	
if ($rights<8) {$result = mysql_query("SELECT `id`,`desk`,`title`, `author`, `views`,`author`,`date`,`cat`,`show` FROM `articles` WHERE `show`='1' ".$and." ORDER BY `articles`.`id` DESC LIMIT $start, $num");} else {
$result = mysql_query("SELECT  `id`,`desk`,`title`,`author`, `views`,`author`,`date`,`cat`,`show` FROM `articles` WHERE 1 ".$and." ORDER BY `articles`.`id` DESC LIMIT $start, $num");}
if ($posts!=0){
$my_a = mysql_fetch_array($result);
do {
if ($my_a["show"]==1) {$href = "hidet";} else {$href = "hidef";}
if ($rights<8) {$admin = "";} else
{$admin = "<div id=\"a".$my_a['id']."\" style='float:right; display:inline; margin-right:15px; text-decoration:none;' ><img style='cursor:pointer;' title=\"".word(2)."\" src='".sitename()."img/icon/".$href.".png' onclick=\"change(".$my_a['id'].")\" id=\"".$my_a['id']."\"> <a href='".sitename()."edit_a.php?id=".$my_a['id']."' title=\"".word(3)."\"><img src='".sitename()."img/icon/red.png'></a><a href='".sitename()."articles.php'  ></a>
<img style='cursor:pointer;' title='".word(4)."' src='".sitename()."img/icon/del.png' onclick=\"del_a(".$my_a['id'].")\"></div>";
}
$com_count = mysql_num_rows(mysql_query("SELECT * FROM `comments` WHERE `hide`='0' AND `article`='".$my_a['id']."'"));
$cat_name = mysql_query("SELECT * FROM `categories` WHERE `id`='".$my_a['cat']."'");
if (mysql_num_rows($cat_name)==0) {$cat_name = word(13);} else {$cat_name = mysql_fetch_array($cat_name); $cat_name = $cat_name['cat'];}
printf("<div style=\"padding-top:1px; background:url('".sitename()."img/7.png') no-repeat;\"><div class='a_' id=\"d".$my_a['id']."\">
<div class=\"a_title\">".$admin.
"<a name=\"%s\" class='a_menu a_main_title' href=\"".sitename()."articles/%s\">%s</a></div>
<div class='a_date' style='float:left;'>".word(11).": %s | ".word(6).": %s | ".word(7).": %s | ".word(10).": %s</div>
<div class='a_text'>".$my_a['desk']."</div>
<div class='a_date' style='float:left; width:60%s;'>".word(5).": %s</div>
<div class='a_date' style='margin-left:60%s; width:40%s;text-align:right;'>
<a style='text-decoration:none;' href='".sitename()."view_a.php?id=".$my_a['id']."#comments'><span class='span1'>&nbsp;".word(12)." </span><span class='span2'> (%s)</span></a>   &nbsp;&nbsp; </div>
</div></div><br />",$my_a['id'],$my_a['id'],$my_a['title'],$cat_name,$my_a['author'],$my_a['views'],rank($my_a),'%',$my_a['date'],'%','%',$com_count);
} while ($my_a = mysql_fetch_array($result));} else 
{echo "<div class='view_title'>".word(14)."</div>";}
$qs = $_SERVER['QUERY_STRING'];
$qs = preg_replace("/page=[0-9]+/","",$qs);
$qs = preg_replace("/&&/","&",$qs);
$qs = preg_replace("/&[^A-Za-z0-9=&]/","&",$qs);
if ($qs[strlen($qs)-1]!="&") {$qs .= "&";}
if ($qs[0]=="&") {$qs = substr_replace($qs, "", 0, 1);}
if ($page != 1) $pervpage = "<a href=\"".sitename()."articles.php?".$qs."page=1\"><span>«</span></a><a href=\"".sitename()."articles.php?".$qs."page=". ($page - 1) ."\"><span><</span></a>";
if ($page != $total) $nextpage = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page + 1) ."\"><span>></span></a><a href=\"".sitename()."articles.php?".$qs."page=" .$total. "\"><span>»</span></a>";
if($page - 5 > 0) $page5left = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page - 5) ."\"><span>". ($page - 5) ."</span></a>";
if($page - 4 > 0) $page4left = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page - 4) ."\"><span>". ($page - 4) ."</span></a>";
if($page - 3 > 0) $page3left = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page - 3) ."\"><span>". ($page - 3) ."</span></a>";
if($page - 2 > 0) $page2left = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page - 2) ."\"><span>". ($page - 2) ."</span></a>";
if($page - 1 > 0) $page1left = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page - 1) ."\"><span>". ($page - 1) ."</span></a>";

if($page + 5 <= $total) $page5right = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page + 5) ."\"><span>". ($page + 5) ."</span></a>";
if($page + 4 <= $total) $page4right = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page + 4) ."\"><span>". ($page + 4) ."</span></a>";
if($page + 3 <= $total) $page3right = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page + 3) ."\"><span>". ($page + 3) ."</span></a>";
if($page + 2 <= $total) $page2right = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page + 2) ."\"><span>". ($page + 2) ."</span></a>";
if($page + 1 <= $total) $page1right = "<a href=\"".sitename()."articles.php?".$qs."page=". ($page + 1) ."\"><span>". ($page + 1) ."</span></a>";

if ($total > 1)
{
Error_Reporting(E_ALL & ~E_NOTICE);
echo "<center><span id=\"pstrnav\"><span>";
echo ''.$pervpage.$page5left.$page4left.$page3left.$page2left.$page1left.'<span class="this">'.$page.'</span>'.$page1right.$page2right.$page3right.$page4right.$page5right.$nextpage.'';
echo "</span></span><br /></center>";
}
?>