function add_module_ask(){
document.getElementById("modal_window").innerHTML = "<form method=\"post\" enctype=\"multipart/form-data\" onsubmit=\"return false\"><fieldset><p class=\"placeholder\">Слово-заміщувач</p><input type=\"text\" id=\"word\" style=\"width:200px;\" /><p class=\"placeholder\">Файл</p><input type=\"text\" id=\"file\" style=\"width:200px;\" /></fieldset><p class=\"placeholder\">Опис модуля</p><textarea id=\"desk\" style=\"height:50px; width:400px; margin-left:5px; \"></textarea><br/><p class=\"placeholder\">Вміст модуля</p><textarea id=\"include\" style=\"height:150px; margin-left:5px; width:400px;\"></textarea><br/><input type=\"button\" class=\"button\" onclick=\"module_add()\" style=\"width:80px; margin-left:5px; \" value=\"   Go   \" /></form>";
	window.location = "#php_report";}
	
	function module_add(){
	JsHttpRequest.query(
     '../backend/module_add.php',
     { 
		'word': document.getElementById("word").value,
		'file'  : document.getElementById("file").value,
		'desk'  : document.getElementById("desk").value,
		'include'  : document.getElementById("include").value,
		'rand': Math.random(0,65530)
     }, 
     function(result, errors) {
         document.getElementById("debug").innerHTML = errors; 
         if (result) {
         document.getElementById("fr_table").innerHTML = result['str'];
		 window.location = "#";
         document.getElementById("modal_window").innerHTML = result["str2"];
         }
     },false);}

function module_edit(id){
	JsHttpRequest.query(
     '../backend/module_edit.php',
     { 
		'id': id,
		'rand': Math.random(0,65530)
     }, 
     function(result, errors) {
         document.getElementById("debug").innerHTML = errors; 
         if (result) {
         document.getElementById("modal_window").innerHTML = result["str"];
		 window.location = "#php_report";
         }
     },false);
	}

	function module_edit_save(id){
	JsHttpRequest.query(
            '../backend/module_edit_save.php',
            { 
		'id': id,
		'word': document.getElementById("word").value,
		'file'  : document.getElementById("file").value,
		'desk'  : document.getElementById("desk").value,
		'include'  : document.getElementById("include").value,
		'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
         document.getElementById("fr_table").innerHTML = result['str'];
		 window.location = "#";
         document.getElementById("modal_window").innerHTML = result["str2"];
                }
            },
            false
        );
	}
	
function module_del_ask(id) {
document.getElementById("modal_window").innerHTML = "Видалити модуль?<br\> <center><a onclick=\"module_del("+id+")\">Так</a>&nbsp;&nbsp;&nbsp;<a alt=\"\" title=\"\" href=\"#\">Ні</a></center>";
window.location = "#php_report";
}

	function module_del(id){
	JsHttpRequest.query(
            '../backend/module_del.php',
            { 
					'id': id,
					'rand': Math.random(0,65530)
            }, 
            function(result, errors) {
                document.getElementById("debug").innerHTML = errors; 
                if (result) {
				window.location = result["str"];
                document.getElementById("d"+id).style.opacity = "0.5";
                document.getElementById("a"+id).innerHTML = "";
                }
            },
            false
        );
	}