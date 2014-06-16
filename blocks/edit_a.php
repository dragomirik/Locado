<?php hide_module();
if (user('u9')) {
if (isset($_GET['id'])) {$id = $_GET['id'];};
if (!isset($id)) {$id = 1;}
if (!preg_match("|^[\d]+$|",$id)){
$buba = 0;
} else {$buba = 1;}
if ($buba==1){
$result = mysql_query("SELECT * FROM `articles` WHERE `id`='$id'");
$red_a = mysql_fetch_array($result);


if (!setting('q28')) {$special = "";} else {
$special = "<select style=\"width:185px;\" id=\"spec\">";
$result = mysql_query("SELECT * FROM `categories` WHERE 1");
$opt = mysql_fetch_array($result);
do {
if ($red_a["cat"]==$opt['id']) {$sel = "selected=\"selected\"";} else {$sel = "";}
$special .= "<option value=\"".$opt['id']."\" ".$sel.">".$opt['cat']."</option>";
} while ($opt = mysql_fetch_array($result));
$special .= "</select>";
}

if (setting('wysiwyg')) {$wysiwyg = "<p>&nbsp;</p>";} else  {$wysiwyg = "";}
print <<<HERE
 <script type="text/javascript" src="InnovaEditor/scripts/innovaeditor.js"></script>
    <script type="text/javascript" src="/spellcheck/proxy/sproxy.aspx?cmd=script&doc=scayt"></script>
    <script type="text/javascript">
        //<!--
            window.onload = function(){
                if(SCAYT){
                    var oMyEditor = document.getElementById('idContent' + 'myEditor');
                    var sMySCAYTName = 'myEditorSCAYT';
                    var sInitialLanguage = 'en';
                    var oMySCAYT = new SCAYT({
                        editor:oMyEditor,
                        name:sMySCAYTName,
                        lang:sInitialLanguage
                    });}}
        //-->
    </script>
<style> .editor table,.editor td{border:0 !important;}</style>
<p><form method="post" enctype="multipart/form-data" onsubmit="return false">
<fieldset class="inputs">
<p class="placeholder">Заголовок статті</p>
<input type="text" style="width:354px;" name="title" id="title" onchange="add_error(1)" value="$red_a[title]" required="required">
$special<span id="error1" class="false"></span>
<p class="placeholder">Дата додавання</p>
<input type="text" style="width:543px;" name="title" id="date" value="$red_a[date]">
<p class="placeholder">Додавач</p>
<input type="text" style="width:543px;" name="title" id="author" value="$red_a[author]">
<p class="placeholder">Короткий опис статті</p>
<input type="text" style="width:543px;" id="meta_d"  value="$red_a[meta_d]" onchange="add_error(2)"><span id="error2" class="false"> </span>
<p class="placeholder">Теги статті</p>
<input type="text" style="width:543px;" name="title" id="meta_k"  value="$red_a[meta_k]" onchange="add_error(3)"><span id="error3" class="false"> </span>
<p class="placeholder">Опис статті</p>
<div class="editor"><textarea name="text" style="width:543px; height:100px;"  rows="2" id="desk"  onchange="add_error(4)" required="required">$red_a[desk]</textarea>
    <script type="text/javascript">
            var myEditor2 = new InnovaEditor("myEditor2");
            myEditor2.REPLACE("desk");
    </script>
</div><span id="error4" class="false"> </span>
<p class="placeholder">Текст статті</p>
<div class="editor"><textarea name="text" style="width:500px;"  rows="10" id="text" onchange="add_error(5)" required="required">$red_a[text]</textarea>
    <script type="text/javascript">
            var myEditor = new InnovaEditor("myEditor");
            myEditor.REPLACE("text");
    </script>
	</div><span id="error5" class="false"> </span>

<p class="placeholder">Джерело статті:</p>
<input type="text" style="width:543px;" name="title" id="sourse" value="$red_a[sourse]">

<p class="placeholder">Кількість переглядів</p>
<input type="text" style="width:543px;" name="title" id="views" value="$red_a[views]">
</fieldset>


<fieldset class="inputs2">
<p class="placeholder">Назви статей подібної тематики:</p>
<input type="text" style="width:543px;" name="title" id="an_1" value="$red_a[an1]">
<input type="text" style="width:543px;" name="title" id="an_2" value="$red_a[an2]">
<input type="text" style="width:543px;" name="title" id="an_3" value="$red_a[an3]">
<input type="text" style="width:543px;" name="title" id="an_4" value="$red_a[an4]">
<input type="text" style="width:543px;" name="title" id="an_5" value="$red_a[an5]">
                                                                      
															          
<p class="placeholder">Посилання на статті відповідно до назв: </p>   
 <input type="text" style="width:543px;" name="title" id="a_1" value="$red_a[a1]"> 
 <input type="text" style="width:543px;" name="title" id="a_2" value="$red_a[a2]"> 
 <input type="text" style="width:543px;" name="title" id="a_3" value="$red_a[a3]"> 
 <input type="text" style="width:543px;" name="title" id="a_4" value="$red_a[a4]"> 
 <input type="text" style="width:543px;" name="title" id="a_5" value="$red_a[a5]"> 



</fieldset>
<input type="submit" style="width:200px; margin-left:20%;" class="button" name="roshen" value="     Редагувати статтю    " required="required" onclick="edit_a($id)" id="blank">
</form></p>
HERE;
}
if ($buba==0) {echo "<div style=\"font-size:120px; color:red;text-align:center;\">404</div><div style=\"font-size:50px;text-align:center;\">Заданої сторінки не існує</div>";}
} else {echo "<p class='view_title'>ПОМИЛКА! У Вас немає достатньо прав для перегляду даної сторінки!</p>";
}
?>