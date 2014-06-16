<?php hide_module();
echo "<p class='color1' style='text-align:center;'>".word(108)." <strong>".online()."</strong> ".word(178);
$online = online_users();
if ($online != 0) {
echo word(107)."<strong>".$online."</strong>".word(106);
}
echo"</p>";
?>