<script type="text/javascript" src="lib/JsHttpRequest/JsHttpRequest.js"></script>
<?php
/*include("blocks/db.php");
include("blocks/functions.php");
$search = array ("'&#(\d+);'e");
$replace = array ("chr(\\1)");
$text = "<?php echo \"denikeweb\";?>";
$text = preg_replace($search, $replace, $text);
echo $text;*/
function int1 ($var){
	if (preg_match("|^[\(\)\-+\ 0-9]+$|",$var)) {
		return true;
	} else {
		return false;
		}
	}
	$int = "+38 (097) 874-24-45";
	if (int1($int)) {echo "1";} else {echo "0";}
/*
$start_time = microtime(5);
echo "<span style=\"display:none;\">";
for ($i = 1; $i<=1000; $i++) {
$result_l = mysql_fetch_array(mysql_query("SELECT `ip` FROM `site` WHERE 1"));
/*echo $result_l['text'];
}
echo "</span>";
$end_time = microtime(5);
echo "<span class=\"microtime\">Витрачений час: <br />".$time = $end_time-$start_time."</span>";
$start_time = microtime(4);
echo "<span style=\"display:none;\">";
for ($i = 1; $i<=1000; $i++) {
$f = fopen("blocks/head.php","r");
$head = fileread($f,"blocks/functions.php");
fclose($f);
/*echo $head;
}
echo "</span>";
$end_time = microtime(4);
echo "<span class=\"microtime\">Витрачений час: <br />".$time = $end_time-$start_time."</span>";*/




/*
echo "<div id=\"debug\" style=\"height:0px;\" class=\"hidden\"></div>";
$i = 1;
$arr[$i][1] = "admin_book";
$arr[$i][2] = "ADMIN_";
$i = 2;
$arr[$i][1] = "edit_book";
$arr[$i][2] = "ADMIN_MODULES";
$i = 3;
$arr[$i][1] = "add_books";
$arr[$i][2] = "REG_MODULE";
$i = 4;
$arr[$i][1] = "admin_music";
$arr[$i][2] = "ADMIN_DESIGN";
$i = 5;
$arr[$i][1] = "edit_music";
$arr[$i][2] = "ADMIN_USERS";
$i = 6;
$arr[$i][1] = "add_music";
$arr[$i][2] = "ADMIN_HMENU";
$i = 7;
$arr[$i][1] = "admin_shop";
$arr[$i][2] = "ADMIN_VMENU";
$i = 8;
$arr[$i][1] = "edit_product";
$arr[$i][2] = "ADMIN_COMMENTS";
$i = 9;
$arr[$i][1] = "add_product";
$arr[$i][2] = "ADMIN_MESSAGES";
$i = 10;
$arr[$i][1] = "news";
$arr[$i][2] = "ADMIN_NAM";
$i = 11;
$arr[$i][1] = "admin_publics";
$arr[$i][2] = "ADMIN_ENTER";
$i = 12;
$arr[$i][1] = "edit_publics";
$arr[$i][2] = "ADMIN_FRIENDS";
$i = 13;
$arr[$i][1] = "add_publics";
$arr[$i][2] = "ADMIN_PAGES";
$i = 14;
$arr[$i][1] = "admin_videos";
$arr[$i][2] = "ADD_PAGE";
$i = 15;
$arr[$i][1] = "edit_videos";
$arr[$i][2] = "EDIT_PAGE";
$i = 16;
$arr[$i][1] = "add_videos";
$arr[$i][2] = "ADMIN_ARTICLES";
$i = 17;
$arr[$i][1] = "admin_blog";
$arr[$i][2] = "ADMIN_CATEGORIES";
$i = 18;
$arr[$i][1] = "edit_blog";
$arr[$i][2] = "ADMIN_HOSTBOOK";
$i = 19;
$arr[$i][1] = "add_blog";
$arr[$i][2] = "EDIT_HOST";
$i = 20;
$arr[$i][1] = "admin_bio";
$arr[$i][2] = "ADMIN_NEWS";
$i = 21;
$arr[$i][1] = "edit_bio";
$arr[$i][2] = "EDIT_NEWS";
$i = 22;
$arr[$i][1] = "add_bio";
$arr[$i][2] = "ADD_NEWS";
$i = 23;
$arr[$i][1] = "admin_gallery";
$arr[$i][2] = "EDIT_USER";
$i = 24;
$arr[$i][1] = "edit_image";
$arr[$i][2] = "ADD_A";
$i = 25;
$arr[$i][1] = "add_image";
$arr[$i][2] = "EDIT_A";
$i = 26;
$arr[$i][1] = "admin_sites";
$arr[$i][2] = "EDIT_USER";
$i = 27;
$arr[$i][1] = "edit_site";
$arr[$i][2] = "EDIT_USER";
$i = 28;
$arr[$i][1] = "add_site";
$arr[$i][2] = "EDIT_USER";
$i = 29;
$arr[$i][1] = "e";
$arr[$i][2] = "EDIT_USER";
$i = 30;
$arr[$i][1] = "edit_user";
$arr[$i][2] = "EDIT_USER";
$i = 31;
$arr[$i][1] = "edit_user";
$arr[$i][2] = "EDIT_USER";
$i = 32;
$arr[$i][1] = "edit_user";
$arr[$i][2] = "EDIT_USER";
$i = 33;
$arr[$i][1] = "edit_user";
$arr[$i][2] = "EDIT_USER";
$i = 34;
$arr[$i][1] = "edit_user";
$arr[$i][2] = "EDIT_USER";
$i = 35;
$arr[$i][1] = "edit_user";
$arr[$i][2] = "EDIT_USER";
$i = 36;
$arr[$i][1] = "edit_user";
$arr[$i][2] = "EDIT_USER";

for ($i = 1; $i<=36; $i++) {
$title =  word(140+$i);
$meta_d = "";
$meta_k = "";
$text = "<div class=\"menu\"><a class=\"a_menu\" href=\"/\">\$MO\$</a> » \$ABC".$i."O\$ </div>
<p>\$".$arr[$i][2]."\$</p>";
$url =    $arr[$i][1].".php";
$h = fopen($url,"w");
$tmp = "<?php
include(\"blocks/functions.php\");
ob_start();
preg_echo();
ob_end_flush();
?>";
if (fwrite($h,$tmp))
echo ""; else echo "";
fclose($h);
$re_date = date("Y-m-d");
$result = mysql_query("INSERT INTO `settings` (`id`,`title`, `url`, `text`, `meta_k`, `meta_d`, `lostmode`,`module`,`show_v`,`show_h`) VALUES (NULL, '$title','$url','$text','$meta_k','$meta_d','$re_date','1','0','0');");

$query = mysql_query("INSERT INTO  `concurs`.`preg` (`id` ,`word` ,`file` ,`right` ,`show` ,`check`)VALUES (NULL ,  '\$".$arr[$i][2]."\$',  'blocks/".$arr[$i][1].".php',  '1',  '0',  '0');");

$h = fopen("blocks/".$arr[$i][1].".php","w");
$text = "<?php hide_module();
?>";
if (fwrite($h,$text))
echo "+";
else
echo "-";
fclose($h);
}*/
/*
echo "<input type=\"date\" name=\"txt1\"><input type=\"time\" name=\"txt1\">";*/

/*
for ($i = 1; $i<=36; $i++) {
$v1 = "\$ABC".$i."O\$";
$query = mysql_query("INSERT INTO  `concurs`.`preg` (
`id` ,
`word` ,
`file` ,
`right` ,
`show` ,
`check`
)
VALUES (
NULL ,  '$v1',  'blocks/abc".$i."o.php',  '1',  '0',  '0'
);");

$h = fopen("blocks/abc".($i)."o.php","w");
$text = "<?php
echo word(".($i+140).");
?>";
if (fwrite($h,$text))
echo "+";
else
echo "-";
fclose($h);
}
/*
$h = fopen("aaaaaaaaaaaa.php","w");
$text = "Строка для записи в файл.";
if (fwrite($h,$text))
echo "Запись произведена успешно";
else
echo "Произошла ошибка при записи данных";
fclose($h);*/
/*echo time()."<br>";
echo $date = date("Y-m-d");
$rdate = date("Y-m-d",strtotime(date("Y-m-d")) - strtotime("2013-08-06"));
echo ($rdate)."<br>";
*/
/*echo $time = time()-1209600;
function echo1($page = "null") {
echo $page;
}
echo1("denike");*/
/*
$mquery = mysql_query("DELETE FROM `enter_hist` WHERE `id`<'329'");
$result67 = mysql_query("SELECT * FROM `enter_hist` WHERE 1 ORDER BY `id` DESC");
$row = mysql_fetch_array($result67);
do {
if ((strtotime(date("Y-m-d")) - strtotime($row['date']." ".$row['time']))>(7*24*3600)) {echo $row['id']." "; $barak = $row['id']; break;}
echo $row['date']." ".$row['time']." (".$row['id'].")<br />";
} while($row = mysql_fetch_array($result67));*/
/*echo "<br><br><br><br><br><br>";
$str = "inDDS.df.d.ft54b_-45.php";
if (preg_match("|^[.A-Za-z0-9_-]+.php$|",$str)) {echo 1;} else {echo 0;}
$a1 = '2013-06-25 05:06:11';
$a2 = '2013-06-25 05:07:12';
$a3 = '2013-07-03 05:07:12';
$a4 = (date("Y-m-d H:i:s"));
echo strtotime($a3)-strtotime($a4);
echo date("Y-m-d H:i:s");
echo'<br><br><br>';
$today = getdate(); 
print_r($today);
echo'<br><br><br>';
$today = getdate($a1); 
print_r($today);
echo'<br><br><br>';
$today = getdate($a2); 
print_r($today);
echo'<br><br><br>';
echo strtotime("now"), "\n";
echo strtotime("10 September 2000"), "\n";
echo strtotime("+1 day"), "\n";
echo strtotime("+1 week"), "\n";
echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
echo strtotime("next Thursday"), "\n";
echo strtotime("last Monday"), "\n";
echo $rand = mt_rand(0,1);
/*
$f = fopen("lib/JsHttpRequest/JsHttpRequest.js","r");
$file = fread($f,200000);
echo '<pre>'.trim($file).'</pre><br><br>';*/
/*$f = fopen("js.js","r");
$file = fread($f,200000);
echo trim($file).'<br><br>';*/

/*echo "<p class='comments'>Человек на сайте: ".online()."</p>"; 
 
$addr = "http://www.rbc.ru/index.html";  // адрес страницы
$begblock1 = "USD ЦБ РФ"; $begblock2 = "EUR ЦБ РФ"; // идентификатор начала блока

$begin = "<FONT SIZE=\"-2\">"; // фрагмент HTML-кода до полезных данных
$end = "</FONT>"; // фрагмент HTML-кода после полезных данных

$result = array();  // массив строк результата

$screen = file($addr);

$i = 0;
while ($i < sizeof($screen) && strpos($screen[$i], $begblock1) == false) {$i++;}
$temp = explode($begin, $screen[$i + 2]);
$temp = explode($end, $temp[1]);
$kursdollar = $temp[0];

$i = 0;
while ($i < sizeof($screen) && strpos($screen[$i], $begblock2) == false) {$i++;}
$temp = explode($begin, $screen[$i + 2]);
$temp = explode($end, $temp[1]);
$kurseuro = $temp[0];

echo "<p class='comments'>Доллар - <B>$kursdollar</B><BR>Евро &nbsp;&nbsp;&nbsp;&nbsp; - <B>$kurseuro</B></p>";*/
?>
