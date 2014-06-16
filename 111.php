<?php
include("blocks/db.php");
include("blocks/functions.php");
echo $result_l = mysql_query("INSERT INTO `conspect`.`friends` (`id`, `url`, `title`) VALUES (NULL, '213321', '132213')");
?>
