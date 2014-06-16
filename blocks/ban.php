<?php hide_module(); 
$resultam = mysql_query("SELECT * FROM `site`");
		$myrowam = mysql_fetch_array($resultam);
		$ip_str = $myrowam['ip'];
		$pos = strpos($ip_str, $_SERVER['REMOTE_ADDR']);
if ($pos>0)
        {
		$a_email = $myrowam['a_mail'];
		$a_mail = str_replace("@", " at ", $a_email);
        exit("<head>
<meta http-equiv='Content-Type' content='text/html; charset=utf-8'></head>Ваша IP-адреса заблокована! З проханням зняття блокування Ви можете звернутись до адміністартора за адресою ".$a_mail);
        }?>