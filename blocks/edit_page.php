<?php hide_module();
if (setting("q23")) {
if (isset($_GET['id'])) {$id = $_GET['id'];};
if (!isset($id)) {$id = 1;}
if (!preg_match("|^[\d]+$|",$id)){
$buba = 0;
} else {$buba = 1;}
if ($buba==1){
$result = mysql_query("SELECT * FROM `settings` WHERE `id`='$id'");
$red_page = mysql_fetch_array($result);
if ($red_page["module"]==0){
if (setting('wysiwyg')) {$wysiwyg = "";} else  {$wysiwyg = "";}
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
<p class="placeholder">Заголовок сторінки</p>
<input type="text" style="width:543px;" name="title" id="title" value="$red_page[title]" required="required">
<p class="placeholder">URL сторінки</p>
<input type="text" style="width:543px;background: rgba(0,0,255,0.05);" name="title" id="url" value="$red_page[url]">
<p class="placeholder">Короткий опис сторінки</p>
<input type="text" style="width:543px;" id="meta_d"  value="$red_page[meta_d]" onchange="add_error(2)">
<p class="placeholder">Теги сторінки</p>
<input type="text" style="width:543px;" name="title" id="meta_k"  value="$red_page[meta_k]" onchange="add_error(3)"><span id="error3" class="false"> </span>
<p class="placeholder">Вміст сторінки</p>
<div class="editor"><textarea name="text" style="width:543px;"  rows="10" id="text" onchange="add_error(5)" required="required">$red_page[text]</textarea>    
<script type="text/javascript">
            var myEditor2 = new InnovaEditor("myEditor2");
            myEditor2.REPLACE("text");
    </script>
	</div><span id="error5" class="false"> </span>
<div style="width:550px; display:none;"><textarea name="text1" id="id654"></textarea></div>

</fieldset>
<input type="submit" style="width:260px; margin-left:20%;" class="button" name="roshen" value="     Редагувати вміст сторінки    " required="required" onclick="edit_page($id)" id="blank">
</form></p>
HERE;
}
if ($buba==0) {echo "<div style=\"font-size:120px; color:red;text-align:center;\">404</div><div style=\"font-size:50px;text-align:center;\">Заданої сторінки не існує</div>";}
} else {echo "<p class='view_title'>Ця сторінка є частиною модуля!</p>";
}} else {echo "<p class='view_title'>ПОМИЛКА! У Вас немає достатньо прав для перегляду даної сторінки!</p>";
}
?>