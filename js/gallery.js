	function add_image_ask(){
		document.getElementById("modal_window").innerHTML = "<form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return false\"><fieldset><p class=\"placeholder\">Назва картинки</p><input type=\"text\" id=\"title\" style=\"width:200px;\" /><p class=\"placeholder\">Посилання на зображення</p><input type=\"text\" id=\"urlfull\" style=\"width:200px;\" /><p class=\"placeholder\">Посилання на мініатюру</p><input type=\"text\" id=\"prview\" style=\"width:200px;\" /></fieldset><input type=\"button\" class=\"button\" onclick=\"add_image()\" style=\"width:80px; margin-left:5px; \" value=\"   Go   \" /></form>";
			window.location = "#php_report";
	}
	function add_image(){
	JsHttpRequest.query(
     '../backend/add_image.php',
     { 
		'title': document.getElementById("title").value,
		'prview'  : document.getElementById("prview").value,
		'urlfull'  : document.getElementById("urlfull").value,
		'rand': Math.random(0,65530)
     }, 
     function(result, errors) {
         document.getElementById("debug").innerHTML = errors; 
         if (result) {
		 window.location = "#";
         document.getElementById("modal_window").innerHTML = result["str"];
			window.location = "#php_report";
         }
     },false);}