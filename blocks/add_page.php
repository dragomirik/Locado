<?php hide_module();
if (setting("q23")) {
if (isset($_GET['id'])) {$id = $_GET['id'];};
if (!isset($id)) {$id = 1;}
if (!preg_match("|^[\d]+$|",$id)){
$buba = 0;
} else {$buba = 1;}
if ($buba==1){
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
<p class="placeholder">Заголовок сторінки</p>
<input type="text" style="width:543px;" name="title" id="title" value="" required="required">
<p class="placeholder">URL сторінки</p>
<input type="text" style="width:543px;background: rgba(0,0,255,0.05);" name="title" id="url" value="">
<p class="placeholder">Короткий опис сторінки</p>
<input type="text" style="width:543px;" id="meta_d"  value="">
<p class="placeholder">Теги сторінки</p>
<input type="text" style="width:543px;" name="title" id="meta_k"  value=""><span id="error3" class="false"> </span>
<p class="placeholder">Вміст сторінки</p>
<div class="editor"><textarea name="text" style="width:100%;"  rows="10" id="text" required="required"></textarea>
    <script type="text/javascript">
            var myEditor2 = new InnovaEditor("myEditor2");
            myEditor2.REPLACE("text");
    </script>
	</div><span id="error5" class="false"> </span>
</fieldset>
<label class="color2" style="margin-left:1px;margin-top:-5px;">
  <input type="checkbox" name="mem" id="menu" checked="checked"> Автоматизовано додати навігаційне меню </label><br />
<input type="submit" style="width:260px; margin-left:20%;" class="button" name="roshen" value="     Додати сторінку    " required="required" onclick="add_page()" id="blank">
</form></p>
HERE;
}
if ($buba==0) {echo "<div style=\"font-size:120px; color:red;text-align:center;\">404</div><div style=\"font-size:50px;text-align:center;\">Заданої сторінки не існує</div>";
}} else {echo "<p class='view_title'>ПОМИЛКА! У Вас немає достатньо прав для перегляду даної сторінки!</p>";
}
?>
