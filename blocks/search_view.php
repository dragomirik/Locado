<?php hide_module();
$exit = '';
if (isset($_POST['searchb']))
{$searchb = $_POST['searchb'];}
if (isset($_POST['search']))
{$search = filt(trim($_POST['search']));
$value = $search;}
$variable1 = word(27);
echo 
<<<HERE
<form align="center" method="post" action="" >
<label class="inputs"><input name="search" type="text" style="width:500px;" placeholder="$variable1" value="$value"></label>
<input name="searchb" type="submit" value="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Шукати&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" class="button">
</form>
HERE;

if (!isset($searchb))
{$exit = "<span class='false'>Ви некоректно звернулись до пошукового запиту!</span>";}
 else   {if (empty($search) or strlen($search) < 3){
$exit="<span class='false'>Пошуковий запит заданий довжиною менше 3-х символів!</span>";
} else
{
$time_start = microtime(1);
$resultp = mysql_query("SELECT * FROM `articles` WHERE `show`='1'");
$myrow7 = mysql_fetch_array($resultp);
$k = 0;
$max = 0;
do {
$arr_sub[$k] = substr_count($myrow7["text"],$search);
$a_sub [$k] [0] = $arr_sub[$k];
$a_sub [$k] [1] = $myrow7["id"];
$a_sub [$k] [2] = 'articles';
if ($arr_sub[$k]>$max) {$max = $arr_sub[$k];}
$k++;
}
while ($myrow7 = mysql_fetch_array($resultp));
$resultp = mysql_query("SELECT * FROM `news` WHERE 1");
$myrow7 = mysql_fetch_array($resultp);
do {
$arr_sub[$k] = substr_count($myrow7["text"],$search);
$a_sub [$k] [0] = $arr_sub[$k];
$a_sub [$k] [1] = $myrow7["id"];
$a_sub [$k] [2] = 'news';
if ($arr_sub[$k]>$max) {$max = $arr_sub[$k];}
$k++;
}
while ($myrow7 = mysql_fetch_array($resultp));
$resultp = mysql_query("SELECT * FROM `settings` WHERE `module`='0'");
$myrow7 = mysql_fetch_array($resultp);
do {
$arr_sub[$k] = substr_count($myrow7["text"],$search);
$a_sub [$k] [0] = $arr_sub[$k];
$a_sub [$k] [1] = $myrow7["id"];
$a_sub [$k] [2] = 'settings';
if ($arr_sub[$k]>$max) {$max = $arr_sub[$k];}
$k++;
}
while ($myrow7 = mysql_fetch_array($resultp));
rsort($arr_sub);
$k = 0;
$flag = 1;
if ($max!=0) {
do 
{
for ($tema=0;(($a_sub[$tema] [0]!=$arr_sub[$k]));$tema++);
$result0p = mysql_query("SELECT * FROM `".$a_sub[$tema] [2]."` WHERE `id`='".$a_sub[$tema] [1]."'");
$my_a = mysql_fetch_array($result0p);
$rank = rank($my_a);
$result_preg = mysql_query("SELECT * FROM `preg` WHERE 1");
$myrow_preg = mysql_fetch_array($result_preg);
do{
$arr_index [$myrow_preg["word"]] = "";
} while ($myrow_preg = mysql_fetch_array($result_preg));
if ($a_sub[$tema] [2]=='articles') {$txt=$my_a['desk'];} else 
{
$txt="...".substr(strip_tags(strtr($my_a['text'],$arr_index)),20,300)."...";
}
printf("<div class='a_'>
<div class='a_title'><a name='%' class='a_menu' href='/view_a.php?id=%s'>%s</a></div>
<div class='a_text'>".$txt."</div>
<div class='a_date'>Кількість входжень: ".$arr_sub[$k]." (http://".$_SERVER['HTTP_HOST']."/view_a.php?id=%s)</div>
</div><br>",$my_a['id'],$my_a['id'],$my_a['title'],$my_a['id']);
$a_sub[$tema] [0] = 0;
$k++;
} while ($arr_sub[$k]>0);
} else {$exit = "<span class='false'>Співпадiнь не виявлено!</span>";}
$time_end = microtime(1);
echo "<span class='true'>Затрачено часу на запит: ".round($time = $time_end - $time_start,6)." (cек.)</span>";
}
}
echo $exit; 
?>