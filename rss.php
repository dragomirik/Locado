<?php
 header("Content-Type: text/xml");
 echo "<?xml version=\"1.0\" encoding=\"utf-8\"?>";
 include("blocks/functions.php");
 include("blocks/db.php");
?>

<rss version="2.0">
<channel>
<title><? echo word(110).site_name();?></title>
<link>http://<? echo site_name(); ?>/</link>
<description><? echo word(110).setting('name');?></description>
<language><? echo setting('lang');?></language>
<?php 
$result = mysql_query("SELECT `id`,`title`,`desk` FROM `articles` WHERE `show`='1' ORDER BY `id` DESC");
$myrow = mysql_fetch_array($result);
if (mysql_num_rows($result))
{
do
{
printf ("<item>
<title>%s</title>
 <link>http://%s/view_a.php?id=%s</link>
<description>%s</description>
<author>%s</author>
<guid>http://%s/view_a.php?id=%s</guid>
</item>", filt($myrow["title"]),site_name(),$myrow["id"],html_tags(filt($myrow["desk"])),setting('a_mail'),site_name(),$myrow["id"]);
}
while ($myrow = mysql_fetch_array($result));
}
?>
</channel>
</rss>
