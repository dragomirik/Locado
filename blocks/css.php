<?php hide_module();?>
<link rel="shortcut icon" href="<?php echo sitename();?>img/favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="author" content="<?php echo setting('author');?>" />
<meta name="copyright" lang="<?php echo setting('lang');?>" content="<?php echo setting('copyright');?>" />
<meta name="document-state" content="Dynamic" />
<meta name="resource-type" content="document" />
<meta name="revisit" content="7" />
<meta name="robots" content="all" />
<meta http-equiv="content-language" content="<?php echo setting('lang');?>" />
<?php
$query = mysql_query('SELECT * FROM `css` WHERE 1');
$q_row = mysql_fetch_array($query);
do {
echo '<link href="'.site_name().'/css/'.$q_row['url'].'" rel="stylesheet" type="text/css" />';
} while ($q_row = mysql_fetch_array($query));
$query = mysql_query('SELECT * FROM `js` WHERE 1');
$q_row = mysql_fetch_array($query);
do {
echo '<script type="text/javascript" src="'.site_name().'/'.$q_row['url'].'"></script>';
} while ($q_row = mysql_fetch_array($query));
if (setting('wysiwyg')){
/*echo '<script src="//tinymce.cachefly.net/4.0/tinymce.min.js"></script>
<script>
        tinymce.init({selector:\'textarea\'});
</script>';*/
}
echo "<link rel=\"alternate\" type=\"application/rss+xml\" title=\"Articles RSS\" href=\"".site_name()."/rss.php\" />";
?>