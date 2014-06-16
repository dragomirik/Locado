<?php hide_module();
if (user('u14')){
echo "<p style=\"font-family:Tahoma; margin-left:20px; font-size:14px;\" >Обрати розділ:<img style=\"display:none;\" src=\"img/nav.png\" onload=\"design_open(1)\" /><br />
&nbsp;&nbsp;&nbsp;§ 1. <span class=\"par_des\" onclick=\"design_open(1)\">&#60;head&#62;</span><br />
&nbsp;&nbsp;&nbsp;§ 2. <span  class=\"par_des\" onclick=\"design_open(2)\">Шаблони дизайну</span><br />
&nbsp;&nbsp;&nbsp;§ 3. <span  class=\"par_des\" onclick=\"design_open(3)\">Каскадні таблиці стилів</span><br /></p>
<div id=\"design_view\"></div>
<div id=\"window\"></div>";
} else {echo "<p class='view_title'>"."У Вас немає достатньо прав для перегляду даної сторінки!"."</p>";}
?>